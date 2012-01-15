<?php

	class MessagesController extends AppController
	{
		public $name = 'Messages';
		public $uses = array('Message', 'Personne');
		
		public function beforeFilter() { parent::beforeFilter(); }
		
		// Liste des messages (tous)
		public function index()
		{
			$d['messages'] = $this->Message->findMyMessages($this->Auth->user('id'));
			$this->set($d);
		}
		
		// Lecture d'un message (tous)
		public function message ($id)
		{
			$message = $this->Message->find('first', array('conditions' => array('or' => array(
																					'destinataire_id' => $this->Auth->user('id'),
																					'personne_id' => $this->Auth->user('id')),
																				'Message.id' => $id), 'recursive' => -1));
			$supprime = array('supprime_dest' => $message['Message']['supprime_dest'],
								'supprime_exp' => $message['Message']['supprime_exp']);
			if (empty($message))
			{
				$this->Session->setFlash('Le message ne vous appartient pas', 'message');
				$this->redirect(array('action' => 'index'));
			}
			// Mis a jour des lectures du message
			$d['Message']['id'] = $id;
			if ($this->Auth->user('id') == $message['Message']['destinataire_id'])
				$d['Message']['lu_dest'] = 1;
			else
				$d['Message']['lu_exp'] = 1;
			$this->Message->validate = array();
			$this->Message->save($d);
			// mise à jour du cache des notifications
			$notifs = Cache::read('notifs', 'notifs');
			if (in_array($id, $notifs['messages']))
			{
				unset($notifs['messages'][$id]);
				$notifs['total'] = $notifs['total'] - 1;
				Cache::write('notifs', $notifs, 'notifs');
			}
			// Récupération des messages et parsage en tableau php
			$message = file_get_contents('files/messages/'.$message['Message']['fichier']);
			App::import('Core', 'Xml');
			$message = new Xml($message);
			$message = $message->toArray();
			if (!isset($message['Message']['Reponse'][0]))
				$message['Message']['Reponse'] = array($message['Message']['Reponse']);
			$this->set('message', $message);
			$this->set('supprime', $supprime);
		}
		
		// Envoi d'un nouveau message
		public function nouveau ()
		{
			if (isset($this->data))
			{
				// Création des champs dynamiques (qui, à qui, quand...)
				$date = new Datetime();
				$this->data['Message']['personne_id'] = $this->Auth->user('id');
				$this->data['Message']['date_envoi'] = $date->format('Y-m-d H:i:s');
				$this->data['Message']['fichier'] = uniqid('message_').'.xml';
				$this->data['Message']['lu_exp'] = 1;
				$pers = $this->Personne->find('first', array('conditions' => array('Personne.display' => $this->data['Message']['destinataire'])));
				$this->data['Message']['destinataire_id'] = $pers['Personne']['id'];
				
				$this->Message->set($this->data);
				if ($this->Message->validates())
				{	// Création du fichier pour le message
					$this->Message->save();
					App::import('Helper', 'Xml');
					$xml = new XmlHelper();
					$message['Message']['id'] = $this->Message->id;
					$message['Message']['titre'] = $this->data['Message']['titre'];
					$message['Message']['fichier'] = $this->data['Message']['fichier'];
					$message['Message']['Reponse'][0]['expediteur_id'] = $this->Auth->user('id');
					$message['Message']['Reponse'][0]['expediteur_nom'] = $this->Auth->user('prenom').' '.$this->Auth->user('nom');
					$message['Message']['Reponse'][0]['message'] = $this->data['Message']['message'];
					$message['Message']['Reponse'][0]['date_envoi'] = $this->data['Message']['date_envoi'];
					file_put_contents('files/messages/'.$this->data['Message']['fichier'], $xml->header().$xml->serialize($message));
					$this->Session->setFlash('Le message a bien été envoyé', 'message', array('class' => 'success'));
					$this->redirect(array('action' => 'message', $this->Message->id));
				}
				else
					$this->Session->setFlash('Le message comporte des erreurs', 'message');
			}
			// Nomes des destinataires possibles (tous sauf soi-meme)
			$d['Destinataires'] = $this->Message->Destinataire->find('list', array(	'recursive' => -1,
																					'conditions' => array(
																						'not' => array('id' => $this->Auth->user('id')))));
			$this->set($d);
		}
		
		// Répondre à un message
		public function repondre ($id)
		{
			$message = $this->Message->findById($id);
			if (empty($message))
			{
				$this->Session->setFlash('Ce message n\'existe pas', 'message');
				$this->redirect(array('action' => 'index'));
			}
			elseif ($this->Auth->user('id') != $message['Message']['personne_id']
					AND $this->Auth->user('id') != $message['Message']['destinataire_id'])
			{
				$this->Session->setFlash('Vous ne pouvez pas répondre à un message qui ne vous est pas destiné', 'message');
				$this->redirect(array('action' => 'index'));
			}
			
			if (isset($this->data))
			{
				$this->Message->set($this->data);
				$this->Message->validate = $this->Message->validateRep;
				if ($this->Message->validates())
				{
					// Chargement des helpers xml, ajout des champs dynamiques (qui, a qui, quand...)
					App::import('Helper', 'Xml');
					App::import('Core', 'Xml');
					$date = new Datetime();
					$contenuFichier = file_get_contents('files/messages/'.$message['Message']['fichier']);
					$this->data['Message']['expediteur_id'] = $this->Auth->user('id');
					$this->data['Message']['expediteur_nom'] = $this->Auth->user('prenom').' '.$this->Auth->user('nom');
					$this->data['Message']['date_envoi'] = $date->format('Y-m-d H:i:s');
					// Mise à jour des lecture du message
					$message = $this->Message->find('first', array('conditions' => array('id' => $this->data['Message']['id']), 'recursive' => -1));
					$d['Message']['id'] = $this->data['Message']['id'];
					if ($message['Message']['personne_id'] == $this->Auth->user('id'))
					{
						$d['Message']['lu_exp'] = 1;
						$d['Message']['lu_dest'] = 0;
					}
					else
					{
						$d['Message']['lu_exp'] = 0;
						$d['Message']['lu_dest'] = 1;
					}
					$this->Message->validate = array();
					$this->Message->save($d);
					unset($this->data['Message']['id']);
					
					// Mise à jour du fichier
					$xml = new XmlHelper();
					$message = new Xml($contenuFichier); // On passe du fichier xml a un tableau php
					$message = $message->toArray();
					if (!isset($message['Message']['Reponse'][0]))
						$message['Message']['Reponse'] = array($message['Message']['Reponse']);
					// On ajoute la réponse on l'enregistre
					$message['Message']['Reponse'] = array_merge($message['Message']['Reponse'], array($this->data['Message']));
					
					file_put_contents('files/messages/'.$message['Message']['fichier'], $xml->serialize($message));
					$this->Session->setFlash('La réponse a bien été ajoutée', 'message', array('class' => 'success'));
					$this->redirect(array('action' => 'message', $id));
				}
				else
					$this->Session->setFlash('Le message comporte des erreurs', 'message');
			}
			
			$this->set('message', $message['Message']);
		}
		
		// Suprression d'un message (tous)
		public function supprimer ($id)
		{
			$message = $this->Message->find('first', array('conditions' => array('Message.id' => $id)));
			if ($this->Auth->user('id') != $message['Message']['personne_id']
				AND $this->Auth->user('id') != $message['Message']['destinataire_id'])
			{
				$this->Session->setFlash('Le message ne vous appartient pas !', 'message');
				$this->redirect(array('action' => 'index'));
			}
			elseif ($message['Message']['supprime_dest'] == 1 OR $message['Message']['supprime_exp'] == 1)
			{	// Si on a supprimé le message des deux cotes, on supprime le fichier
				unlink('files/messages/'.$message['Message']['fichier']);
				$this->Message->delete($id);
			}
			else
			{	// On vérifie qui supprime le message
				if ($this->Auth->user('id') == $message['Message']['destinataire_id'])
					$message['Message']['supprime_dest'] = 1;
				else
					$message['Message']['supprime_exp'] = 1;
				$this->Message->validate = array();
				$this->Message->save($message);
			}
			$this->redirect(array('action' => 'index'));
		}
	}