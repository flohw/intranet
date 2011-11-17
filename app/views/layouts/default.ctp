<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $this->title; ?></title>
    <?php echo $this->Html->charset(); ?>
       <?php echo $this->Html->css('style.css'); ?>
    <?php echo $this->Html->css('bootstrap.css'); ?>
  </head>
    <body>

      <?php 
      if ($this->Session->read('Auth.Personne.id'))
        echo $this->element("topBarEleve");
      else
        echo $this->element("topBarUserLambda");

      ?>
           
      <div class="container">
      <?php echo $this->Session->flash('auth'); ?>
      <?php echo $this->Session->flash(); ?>
        <?php echo $content_for_layout; ?>
      </div> 
      <div class="footer">
        <div class="container">
          <p class="pull-right"><a href="#">Haut de page</a></p>
          <p>
            Design par PJ, Marie, Flohw, Alexandra, Aurélie et Do'
            &copy; Tous droits réservés.
          </p>
        </div>
      </div> 

      <?php echo $this->Html->script("jquery"); ?>
      <?php echo $this->Html->script("menu"); ?>
      <?php echo $this->Html->script("bootstrap-modal"); ?>
      <?php echo $this->Html->script("alerts-elements"); ?>
      <?php echo $this->Html->script("tablesorter"); ?>

    </body> 
</html>



