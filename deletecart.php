<?php
var_dump($_GET['productid']);
session_start();
$cart=$_SESSION['card'];
$id=$_GET['productid'];
if($id == 0)
{
 unset($_SESSION['card']);
}
else
{
unset($_SESSION['card'][$id]);
}
header("location:card.php");
exit();
session_unset();
?>
