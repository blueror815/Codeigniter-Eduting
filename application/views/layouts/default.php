<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $template['title'] ?></title>
    
    <?php echo $template['metadata'] ?>

  </head>

  <body class="<?php echo $body_class ?>">
  	<div class="wrapper">
		<?php echo $template['partials']['header'] ?>

		<?php //echo $template['partials']['flash_messages'] ?>

		<?php echo $template['partials']['asider']; ?>

		<?php echo $template['body'] ?>
		
		<?php echo $template['partials']['footer'] ?>	
  	</div><!-- /wrapper -->  
  </body>
</html>