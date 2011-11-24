<?php

	class MessagesController extends AppController
	{
		public $name = 'Messages';
		public $uses = array('Message', 'Personne');
		
		public function beforeFilter() { parent::beforeFilter(); }
		
		public function index()
		{
			
		}
		
		public function envoyes ()
		{
			$d['messages'] = $this->Message->find('all', array(	'conditions' => array('personne_id' => $this->Auth->user('id')),
																'recursive' => -1,
																'order' => 'titre'));
			$this->set($d);
		}
		
		public function message ($id)
		{
			$message = $this->Message->find('first', array('conditions' => array('or' => array(
																					'destinataire_id' => $this->Auth->user('id'),
																					'personne_id' => $this->Auth->user('id')),
																				'Message.id' => $id), 'recursive' => -1));
			if (empty($message))
			{
				$this->Session->setFlash('Le message ne vous appartient pas', 'message');
				$this->redirect(array('action' => 'index'));
			}
			$message = file_get_contents('files/messages/'.$message['Message']['fichier']);
			App::import('Core', 'Xml');
			$message = new Xml($message);
			$message = $message->toArray();
			$this->set('message', $message);
		}
		
		public function nouveau ()
		{
			if (isset($this->data))
			{
				$date = new Datetime();
				$this->data['Message']['personne_id'] = $this->Auth->user('id');
				$this->data['Message']['personne_nom'] = $this->Auth->user('login');
				$this->data['Message']['date_envoi'] = $date->format('Y-m-d H:i:s');
				$this->data['Message']['fichier'] = uniqid('message_').'.xml';

				$this->Message->set($this->data);
				if ($this->Message->validates())
				{
					$this->Message->save();
					$this->data['Message']['id'] = $this->Message->id;
					$nom = $this->Personne->find('first', array('conditions' => array('id' => $this->data['Message']['destinataire_id']), 'recursive' => -1));
					$this->data['Message']['destinataire_nom'] = $nom['Personne']['login'];
					App::import('Helper', 'Xml');
					$xml = new XmlHelper();
					file_put_contents('files/messages/'.$this->data['Message']['fichier'], $xml->header().$xml->serialize($this->data));
					$this->Session->setFlash('Le message a bien été envoyé', 'message', array('class' => 'success'));
					$this->redirect(array('action' => 'index'));
				}
				else
					$this->Session->setFlash('Le message comporte des erreurs', 'message');
			}
			$d['Destinataires'] = $this->Message->Destinataire->find('list', array(	'recursive' => -1,
																					'conditions' => array(
																						'not' => array('id' => $this->Auth->user('id')))));
			$this->set($d);
		}
		
		public function repondre ($id)
		{
			$message = $this->Message->find('first', array('conditions' => array('id' => $id), 'recursive' => -1));
			if (empty($message))
			{
				$this->Session->setFlash('Ce message n\'existe pas', 'message');
				$this->redirect(array('action' => 'index'));
			}
			elseif (!in_array($this->Auth->user('id'), array($message['Message']['personne_id'], $message['Message']['destinataire_id'])))
			{
				$this->Session->setFlash('Vous ne pouvez pas répondre à un message qui ne vous est pas destiné', 'message');
				$this->redirect(array('action' => 'index'));
			}
			
			if (isset($this->data))
			{
				$this->Message->set($this->data);
				if ($this->Message->validates())
				{
					$contenuFichier = file_get_contents('files/messages/'.$message['Message']['fichier']);
					$nom = $this->Personne->find('first', array('conditions' => array('id' => $this->Auth->user('id')), 'recursive' => -1));
					$this->data['Message']['personne_nom'] = $nom['Personne']['login'];
					$date = new Datetime();
					$this->data['Message']['date_envoi'] = $date->format('Y-m-d H:i:s');
					// Chargement des helpers xml
					App::import('Helper', 'Xml');
					App::import('Core', 'Xml');
					$xml = new XmlHelper();
					$message = new Xml($contenuFichier); // On passe du fichier xml a un tableau php
					$message = $message->toArray();
					// On ajoute la réponse on l'enregistre
					$message['Message']['Reponse'] = array_merge($message['Message']['Reponse'], array($this->data['Message']));
					file_put_contents('files/messages/'.$message['Message']['fichier'], $contenuFichier.$xml->serialize($this->data));
					$this->Session->setFlash('La réponse a bien été ajoutée', 'message', array('class' => 'success'));
					$this->redirect(array('action' => 'envoyes'));
				}
				else
					$this->Session->setFlash('Le message comporte des erreurs', 'message');
			}
			
			$this->set('message', $message['Message']);
		}
	}