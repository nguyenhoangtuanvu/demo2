<?php
	session_start();
	if(!empty($_GET['proid'])){
		$proid= $_GET['proid'];
		
		if(isset($_SESSION['cart'][$proid])){
			$qty=$_SESSION['cart'][$proid] +1;
		}else{
			$qty =1;
		}
	}else{
		header("Location:index.php");
	}
	
	$_SESSION['cart'][$proid] = $qty;
	header("location: cart.php");

?>