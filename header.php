<?php session_start();  ?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">
    Welcome! 
    </div>
	<div class="span6">
	<div class="pull-right">
		<span class="btn btn-mini btn-primary"> 
                <i class="icon-shopping-cart icon-white"></i> 
        <?php
$ok=1;
 if(isset($_SESSION['cart']))
 {
  foreach($_SESSION['cart'] as $k=>$v)
  {
   if(isset($v))
   {
   $ok=2;
   }
  }
 }
 if ($ok != 2)
  {
   echo'<a href="cart.php">(0 item)</a> ';
 } else {
  $items = $_SESSION['cart'];
  
   echo'<a href="cart.php"> ('.count($items).' item)</a> ';
 }
?> 		
</span></a>
	</div>
	</div>
</div>


<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="index3.php"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
    <ul id="topMenu" class="nav pull-right">
    <li class=""><a href="index3.php">Homme Page</a></li>
	 <li class=""><a href="products.php">Product</a></li>
	 <li class=""><a href="contact.php">Contact</a></li>
     <li class=""><a href="register.php">Register</a></li>
	 <li class="">
	 	 <a href="login.php" role="button"><span class="btn btn-large btn-success">Login</span></a>
	</li>
    <li class="">
    <a href="logout.php" role="button"><span class="btn btn-large btn-success">Logout</span></a>
    </li>
    </ul>
  </div>
</div>
</div>
</div>