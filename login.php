<?php include"header.php";
?>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<?php include"sidebar.php";
?>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index3.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Login</li>
    </ul>
	<h3> Login</h3>	
	<hr class="soft"/>      
<?php
		require_once("connectDB.php");
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$user=$_POST["txtemail"];
			$pass =$_POST["txtpassword"];
			
			$queryCustomer=" SELECT * FROM customer WHERE email='$user'";
			$resultAcc = $conn->query($queryCustomer);
			while($row =mysqli_fetch_assoc($resultAcc)){
				if($row['password']==$pass){
					$_SESSION['User']=$user;
					echo '<script language="javascript">alert("login conplete"); window.location="index3.php";</script>';
				}
				else{
					echo '<script language="javascript">alert("login false"); window.location="register.php";</script>';
				}
			}
		
		}
	
	?>   
			</div>
		<div class="span4"> &nbsp;</div>
		<div class="span4">
			<div class="well">
			<form class="control-group" action="login.php" method="post" name="form login">
			  <div class="control-group">
				<label class="control-label">Email</label>
				<div class="controls">
				  <input class="span3"  type="text" name="txtemail">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label">Password</label>
				<div class="controls">
				  <input type="text" class="span3"  name="txtpassword">
				</div>
			  </div>
			  <div class="control-group">
				<div class="controls">
				  <button type="submit" class="btn">Sign in</button>
				<a href="(admin)login.php" class="btn"> Admin login </a>
                </div>
			  </div>

			</form>
		</div>
		</div>
	</div>	
	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

	<?php include"footer.php";
	?>