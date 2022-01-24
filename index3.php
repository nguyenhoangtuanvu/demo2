<?php include"header.php";
?>
<!-- Header End====================================================================== -->
<div id="carouselBlk">

</div>
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
		<?php include"sidebar.php";
	?>
<!-- Sidebar end=============================================== -->
			             <?php
        include 'connectDB.php';
        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:100;
        $current_page = !empty($_GET['page'])?$_GET['page']:1; 
        $offset = ($current_page - 1) * $item_per_page;
        $products = mysqli_query($conn, "SELECT * FROM `products` ORDER BY `proid` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
        $totalRecords = mysqli_query($conn, "SELECT * FROM `products`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        ?>
         <div class="tab-pane  active" id="blockView">
			<ul class="thumbnails">
        <?php
        while ($row = mysqli_fetch_array($products)) {

          $HINH = $row['photo'];       
          $TEN = $row['proname'];
          $GIA = $row['price'];
		  $mota = $row['description'];
          ?>
          	<li class="span3">
			  <div class="thumbnail">
				<a href="product_details.php"> <img src="<?php echo $row['photo'];?>" /></a>
				<div class="caption">
				  <h5><?php echo $row['proname']; ?></h5>
				  <p> 
					<?php echo $row['description']; ?>
				  </p>
				  <h4 style="text-align:center"><a class="btn" href="product_details.php">Detail<i class="icon-zoom-in"></i></a> <a class="btn" href="addcard.php?proid=<?php echo $row['proid']; ?>">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="product_details.php"><?php  echo $row['price']; ?></a></h4>
				</div>
			  </div>
			 </li>
             <?php } ?>
          </ul>
        </div>
        </ul>
</div> </div>
</div>
<!-- Footer ================================================================== -->
<?php include"footer.php"; ?>