<?php $this->title = "Intranet du département Informatique" ?>
        <script>
        $(function() {
          $("#datepicker").datepicker();
        });
        </script>
      <div class="page-header">
        <h1>Gestion du Compte</h1>
        <h5><?php echo $this->Html->link('Déconnexion', array('controller' => 'personnes','action' => 'deconnexion')); ?></h5>
      </div>

        <div class="container-fluid">
        <form action="">
          <fieldset>

              <h4>Informations</h4>
                <h7 style="color:red; font-size:85%;"><em>* Champs obligatoires</em></h7>
              <div class="clearfix">
                  <label>Nom</label>
                  <div class="input">
                      <input type="text" name="nom_eleve" value="PARRENO"><h6 style="color:red; display:inline;"> *</h6>
                  </div>
              </div>

              <div class="clearfix">
                  <label>Prénom</label>
                  <div class="input">
                      <input type="text" name="prenom_eleve" value="Florian"><h6 style="color:red; display:inline;"> *</h6>
                  </div>
              </div>

                <!-- a voir pour le name pour récupération-->
              <div class="clearfix">
                <label for="prependedInput">E-mail</label>
                  <div class="input">
                   <div class="input-append">
                    <input type="text" name="debut_mail"value="flohw" >
                      <span class="add-on">@</span>
                        <input class="medium" id="prependedInput" name="fin_mail" size="16" type="text" value="gmail.com"/><h6 style="color:red; display:inline;"> *</h6>
                    </div>
                  </div>
              </div>

              <div class="clearfix">
                  <label>Num&eacute;ro de T&eacute;l&eacute;phone</label>
                      <div class="input">
                          <input type="text" name="telephone" value="06 89 99 07 65">
                      </div>
              </div>

              <div class="clearfix">
                  <label>Informations compl&eacute;mentaires</label>
                  <div class="input">
                      <textarea name="message" class="xlarge"></textarea>
                      <span class="help-block">Visible uniquement par les professeurs</span>
                  </div>
              </div>

              <div class="clearfix">
                  <label>Date de Naissance</label>
                  <div class="input">
                    <input type="text" id="datepicker"><h6 style="color:red; display:inline;"> *</h6>
                  </div>
              </div>

              <h4>Adresse</h4>
              
              <div class="clearfix">
                  <label>Rue</label>
                  <div class="input">
                      <input type="text" name="ad_rue" value="66 Rue du Vercors">
                  </div>
              </div>
                
              <div class="clearfix">
                  <label>Rue</label>
                  <div class="input">
                      <input type="number" name="code_postal" value="38000">
                  </div>
              </div>

              <div class="clearfix">
                  <label>Ville</label>
                  <div class="input">
                      <input type="text" name="ville" value="Grenoble">
                  </div>
              </div>

              <div class="actions">
                  <input type="submit" value="Envoyer" class="btn primary">
                  <input type="reset" class="btn">
              </div>
          </fieldset>
        </form>


        </div> 



