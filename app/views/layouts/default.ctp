<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $this->title; ?></title>
    <?php echo $this->Html->charset(); ?>
    <link rel="stylesheet/less" href="<?php echo $this->Html->url("/css/bootstrap.less"); ?>">
    <link rel="stylesheet/less" href="<?php echo $this->Html->url("/css/style.css"); ?>">
  </head>
    <body>

      <?php 
      echo $this->element("topBarUserLambda");

      ?>
           
      <div class="container">
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

      <?php echo $this->Html->script("less"); ?>
      <?php echo $this->Html->script("jquery"); ?>
      <?php echo $this->Html->script("menu"); ?>
      <?php echo $this->Html->script("bootstrap-modal"); ?>

    </body> 
</html>



