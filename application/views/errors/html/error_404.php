<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<link rel="stylesheet" href="<?php echo config_item('base_url');?>assets/css/font-icons/entypo/css/entypo.css" id="style-resource-2">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic" id="style-resource-3">
    <link rel="stylesheet" href="<?php echo config_item('base_url');?>assets/css/bootstrap.css" id="style-resource-4">
    <link rel="stylesheet" href="<?php echo config_item('base_url');?>assets/css/neon-core.css" id="style-resource-5">
    <link rel="stylesheet" href="<?php echo config_item('base_url');?>assets/css/neon-theme.css" id="style-resource-6">
</head>
<body class="page-body loaded">
<div class="main-content">
 <div class="page-error-404">
  <div class="error-symbol"> 
  <i class="entypo-attention"></i>
   </div>
    <div class="error-text">
    <h2><?php echo $heading; ?></h2> <?php echo $message; ?>
		<p>Play some pacman instead :)</p>
		<br><hr>
		<object type="application/x-shockwave-flash" name="name" data="<?php echo config_item('base_url');?>assets/pacman.swf" width="100%" height="100%" style="min-height:400px" id="flash-404" style="visibility: visible;" title="Adobe Flash Player"><param name="quality" value="high"><param name="wmode" value="transparent"></object>
     </div>
      <hr /> 
</div>
</div>
	
</body>
</html>