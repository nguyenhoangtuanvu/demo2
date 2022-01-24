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
<?php
	require_once("connectDB.php");
	if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
	}else{

		foreach($_SESSION['cart'] as $item=>$value){
			$arrayID[] =$item;
		}
		$str= join(",",$arrayID);
		//echo'aaa '. $str."<br>";
		
	
		if(!empty($_GET['id'])){
			$id =$_GET['id'];
			unset($_SESSION['cart'][$id]);
			header("location:cart.php");
		}
	}

	if(isset($_POST['checkout'])){
		if(isset($_SESSION['User']) && isset($_SESSION['cusid'])){
			$custID =$_SESSION['cusid'];
		}else{
			
			header("location:login.php");
		}
	}		
?>
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index3.php">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>  SHOPPING CART <a href="products.php" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft"/>
	<form  method="post">
<table class="table table-bordered">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Product</th>
                  <th>Name</th>
                  <th>Quantity</th>
				  <th>Price</th>                
                  <th>Total</th>
				</tr>
              </thead>
              <tbody>
              <?php
	  // lay du lieu tu database de hien thi lên trên table
	  	$sql ="SELECT * FROM products where proid in ($str)";
		//echo $sql;
	  	
	  	$result =$conn->query($sql);
	  if(!$result){
				die($conn->error);
			}
	  	$dem =0;
	  	$total =0;
	  
	  	foreach($result as $item){
			$dem = $dem+1;
			$id=$item['proid'];
			$name =$item['proname'];
			$image =$item['photo'];
			$price =$item['price'];
			$qty =$_SESSION['cart'][$id];
			$money =$price *$qty;
			$total =$total +$money;
					  ?>
                <tr>
                	<td><?php echo $dem;?></td>
                  <td> <img width="60" src=" <?php echo $item['photo'];?>"/></td>
                  <td><?php echo $item['proname'];?></td>
				  <td>
					<div class="input-append"><input class="span1" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text"><button class="btn" type="button"><i class="icon-minus"></i></button><button class="btn" type="button"><i class="icon-plus"></i></button>		</div>
				  </td>
                  <td><?php echo $item['price'];?></td>                
                  <td><?php echo $money ; ?></td>
                </tr>	
				<?php 
				} 
 ?>
				 <tr>
                  <td colspan="6" style="text-align:right"><strong>TOTAL </strong></td>
                  <td class="label label-important" style="display:block"> <strong><?php echo" $total"; ?></strong>VND</td>
                </tr>
				</tbody>
            </table>
            <button class="btn btn-large pull-right" name="checkout" type="button"> Checkout</button>
            </form>
          						

	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	<?php include"footer.php";
	?>