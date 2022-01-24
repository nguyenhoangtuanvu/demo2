<?php
include 'headeradmin.php';
if (!empty($_SESSION['User'])) {
    ?>
    <div class="mainBody">
        <h1>Delete Products</h1>
        <div class="container">
            <?php
            $error = false;
            if (isset($_GET['proid']) && !empty($_GET['proid'])) {
                include 'connectDB.php';
                $result = mysqli_query($conn, "DELETE FROM `products` WHERE `proid` = " . $_GET['proid']);
                if (!$result) {
                    $error = "Can not delete product";
                }
                mysqli_close($conn);
                if ($error !== false) {
                    ?>
                        <div class="span4">
                            <div class="well">
                        <h2>Notification</h2>
                        <h4><?= $error ?></h4>
                        <a href="(admin)product_listing.php">List Product</a>
                    </div>
        <?php } else { echo 'aaaaa'?>
                        <h2>Delete product successful</h2>
                        <a href="(admin)product_listing.php">List Product</a>
              <?php } ?>
		</div>
	</div>	
    <?php } ?>
        </div>
    </div>
    <?php
}
include 'footer.php';
?>