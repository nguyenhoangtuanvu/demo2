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
		<li class="active">Registration</li>
    </ul>
	<h3> Registration</h3>	
	<div class="well">
     
    	<?php  
			require_once("connectDB.php");
			if (isset ($_POST['submit']))
			{
			$cusName= $_POST['txthoten'];
			//echo'cusname: '. $cusName;
			$DOB= $_POST['txtngaysinh'];
			$getGender = $_POST['rdgioitinh'];
			if($getGender =='male')$gender=1; else $gender=0;
			$address= $_POST['txtaddress'];
			$phone= $_POST['txtphone'];
			$email= $_POST['txtemail'];
			$password= $_POST['txtpassword'];
			
			$insertcus = ("INSERT INTO customer (cusname,ngaysinh,gender,address,phone,email,password) VALUES('$cusName','$DOB',$gender,'$address','$phone','$email','$password')");
					  
					if (mysqli_query($conn, $insertcus)){
						echo '<script language="javascript">alert("Đăng ký thành công"); window.location="login.php";</script>';
					}
					else {
						echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
					}
			} 		
	?>
	<form class="form-horizontal" action="register.php" method="post">
		<h4>Your personal information</h4>
		<div class="control-group">
		</div>
		<div class="control-group">
			<label class="control-label" for="inputFname1">full name </label>
			<div class="controls">
			  <input type="text" name="txthoten">
			</div>
        </div>
         <div class="control-group">
			<label class="control-label" for="inputPassword1">Date of Birth</label>
			<div class="controls">
		  		<input type="text" name="txtngaysinh">
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLnam">Gender</label>
			<div class="controls">
			  <input type="radio" name="rdgioitinh" value="male">Male<input type="radio" name="rdGioiTinh" value="Female"/>Female
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="input_email">Phone</label>
		<div class="controls">
		  <input type="text" name="txtphone">
		</div>
	  </div>	  
	<div class="control-group">
		<label class="control-label" for="inputPassword1">Address</label>
		<div class="controls">
		  <input type="text" name="txtaddress">
		</div>
	  </div>
      		<div class="control-group">
		<label class="control-label" for="input_email">Email</label>
		<div class="controls">
		  <input type="text" name="txtemail">
		</div>
	  </div>	  
			<div class="control-group">
		<label class="control-label" for="inputPassword1">Password</label>
		<div class="controls">
		  <input type="text" name="txtpassword">
		</div>
	  </div>	
	<div class="control-group">
			<div class="controls">				
                <button name="submit" type="submit" class="btn btn-large btn-success">Register</button>
			</div>
		</div>		
	</form>
    
</div>

</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	<?php include"footer.php";
	?>