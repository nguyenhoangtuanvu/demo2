<?php include"headeradmin.php";
?>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
		<?php include"sidebaradmin.php";
	?>
<!-- Sidebar end=============================================== -->
<?php
if (!empty($_SESSION['User'])) {
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 100;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $totalRecords = mysqli_query($conn, "SELECT * FROM `products`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    $products = mysqli_query($conn, "SELECT * FROM `products` ORDER BY `proid` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    mysqli_close($conn);
    ?>
<div class="span9">
    <h3>  List Products <a href="(admin)product_editing.php" class="btn btn-large pull-right"> Add Product </a></h3>	
	<hr class="soft"/>
	<form  method="post">
<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Price</th>
				</tr>
              </thead>   
              <tbody>                     
                <?php
                while ($row = mysqli_fetch_array($products)) {
				  $HINH = $row['photo'];       
				  $TEN = $row['proname'];
				  $GIA = $row['price'];
                    ?>
                    <tr>
                  <td> <img width="60" src=" <?php echo $row['photo']?>"/></td>
                  <td><?php echo $row['proname']?></td>
                  <td><?php echo $row['price']?></td>                
                  <td>
                   <div class="btn"><a href="(admin)product_delete.php?proid=<?php echo $row['proid'];?>">Delete|</a> </div>
                   <div class="btn"><a href="(admin)product_editing.php?proid=<?php echo $row['proid'];?>">Repair</a> </div>
                   <div class="btn"><a href="(admin)product_editing.php?proid=<?php echo $row['proid']; ?>&task=copy">Copy</a> </div>
                  </td>
                </tr>	
				<?php 
				} ?>
				</tbody>
            </table>
            </form>
                <?php } ?>
</div>
</div></div>
</div>
<!-- Footer ================================================================== -->
<?php include"footer.php"; ?>