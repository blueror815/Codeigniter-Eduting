<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html>
<head>
<title><?php echo $this->config->item('site_title'); if(isset($title))echo " ".$this->config->item('site_title_delimiter')." ".$title;?></title>
    <script src="<?php echo base_url();?>js/jquery.js" type="text/javascript"></script>
    <link type="text/css" href="<?php echo base_url();?>css/bootstrap.css" rel="Stylesheet" />
    <link type="text/css" href="<?php echo base_url();?>css/main.css" rel="Stylesheet" />
    <link type="text/css" href="<?php echo base_url();?>css/bootstrp-vertical-tabs.css" rel="Stylesheet" />
</head>
<body <?php if(isset($onload)){echo "onload=$onload";}?>>
	<div id="container">
        <div id="row">
			<?php echo $content;?>
		</div>
	</div>
</body>
</html>