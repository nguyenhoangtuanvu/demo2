<?php include 'headeradmin.php'; 

if (!empty($_SESSION['User'])) {
    ?>
    <div class="mainBody">
        <h1><?= !empty($_GET['proid']) ? ((!empty($_GET['task']) && $_GET['task'] == "copy") ? "Copy product" : "Edit product") : "Add product" ?></h1>
<!-- Sidebar ================================================== -->
<?php include"sidebaradmin.php"; ?>
<!-- Sidebar end=============================================== -->
        <div class="container">
            <?php
            if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
                if (isset($_POST['proname']) && !empty($_POST['proname']) && isset($_POST['price']) && !empty($_POST['price'])) {
                    $galleryImages = array();
                    if (empty($_POST['proname'])) {
                        $error = "You must fill name product";
                    } elseif (empty($_POST['price'])) {
                        $error = "You must fill price product";
                    } elseif (!empty($_POST['price']) && is_numeric(str_replace('.', '', $_POST['price'])) == false) {
                        $error = "Price is invalid ";
                    }
                    if (isset($_FILES['photo']) && !empty($_FILES['photo']['proname'][0])) {
                        $uploadedFiles = $_FILES['photo'];
                        $result = uploadFiles($uploadedFiles);
                        if (!empty($result['errors'])) {
                            $error = $result['errors'];
                        } else {
                            $photo = $result['path'];
                        }
                    }
                    if ( !empty($_POST['photo'])) {
                        $photo = $_POST['photo'];
						echo $photo ;
                    }
                    if (isset($_FILES['gallery']) && !empty($_FILES['gallery']['proname'][0])) {
                        $uploadedFiles = $_FILES['gallery'];
                        $result = uploadFiles($uploadedFiles);
                        if (!empty($result['errors'])) {
                            $error = $result['errors'];
                        } else {
                            $galleryImages = $result['uploaded_files'];
                        }
                    }
                    if (!empty($_POST['gallery_image'])) {
                        $galleryImages = array_merge($galleryImages, $_POST['gallery_image']);
                    }
                    if (!isset($error)) { 
                        if ($_GET['action'] == 'edit' && !empty($_GET['proid'])) { echo $photo; //Cập nhật lại sản phẩm
                            $result = mysqli_query($conn, "UPDATE `products` SET `proname` = '" . $_POST['proname'] . "',`photo` =  '" . $photo . "', `price` = " . str_replace('.', '', $_POST['price']) . ", `description` = '" . $_POST['description'] . "' WHERE `products`.`proid` = " . $_GET['proid']);
                        } else { //Thêm sản phẩm
                          echo $photo;
                            $result = mysqli_query($conn, "INSERT INTO `products` (`proid`, `proname`, `photo`, `price`, `description`) VALUES (NULL, '" . $_POST['proname'] . "','" .$photo. "', " . str_replace('.', '', $_POST['price']) . ", '" . $_POST['description'] . "');");
							
                        }
                        if (!$result) { //Nếu có lỗi xảy ra
                            $error = "Have a error in the processing";
                        } else { //Nếu thành công
                            if (!empty($galleryImages)) {
                                $product_id = ($_GET['action'] == 'edit' && !empty($_GET['proid'])) ? $_GET['proid'] : $conn->insert_id;
                                $insertValues = "";
                                foreach ($galleryImages as $path) {
                                    if (empty($insertValues)) {
                                        $insertValues = "(NULL, " . $product_id . ", '" . $path . "')";
                                    } else {
                                        $insertValues .= ",(NULL, " . $product_id . ", '" . $path . "')";
                                    }
                                }
                                $result = mysqli_query($conn, "INSERT INTO `image_library` (`id`, `productid`, `path`) VALUES " . $insertValues . ";");
                            }
                        }
                    }
                } else {
                    $error = "You have not entered product information";
                }
                ?>
                <div class = "container">
                    <div class="error"><?= isset($error) ? $error : "Update successful" ?></div>
                    <a href = "(admin)product_listing.php">Back to list product</a>
                </div>
                <?php
            } else {
                if (!empty($_GET['proid'])) {
                    $result = mysqli_query($conn, "SELECT * FROM `products` WHERE `proid` = " . $_GET['proid']);
                    $product = $result->fetch_assoc();
                    $gallery = mysqli_query($conn, "SELECT * FROM `image_library` WHERE `productid` = " . $_GET['proid']);
                    if (!empty($gallery) && !empty($gallery->num_rows)) {
                        while ($row = mysqli_fetch_array($gallery)) {
                            $product['gallery'][] = array(
                                'id' => $row['id'],
                                'path' => $row['path']
                            );
                        }
                    }
                }
                ?>
                
                <div class="span4"> &nbsp;</div>
		<div class="span4">
			<div class="well">
			<form id="product-form" method="POST" action="<?= (!empty($product) && !isset($_GET['task'])) ? "?action=edit&proid=" . $_GET['proid'] : "?action=add" ?>"  enctype="multipart/form-data">
			  <div class="control-group">
				<label class="control-label">Product Name:</label>
				<div class="controls">
				  <input class="span3"  type="text" name="proname" value="<?= (!empty($product) ? $product['proname'] : "") ?>">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label">Price:</label>
				<div class="controls">
				  <input type="text" class="span3"  name="price" value="<?= (!empty($product) ? number_format($product['price'], 0, ",", ".") : "") ?>">
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label">Images:</label>
				<div class="controls">
        <?php if (!empty($product['photo'])) { ?>
                                <img src="<?php echo $product['photo']; ?>" /><br/>
                   				<input type="hidden" name="photo" value="<?php echo $product['photo']; ?>" />
        <?php } ?>    
                     <input type="file" name="photo" />          
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label">The library image:</label>
				<div class="controls">
<?php if (!empty($product['gallery'])) { ?>
                                <ul>
            <?php foreach ($product['gallery'] as $photo) { ?>
                                        <li>
                                            <img src="<?= $photo['photo'] ?>" />
                                            <a href="gallery_delete?proid=<?= $photo['proid'] ?>">Delete</a>
                                        </li>
                                <?php } ?>
                                </ul>
                            <?php } ?>
                            <?php if (isset($_GET['task']) && !empty($product['gallery'])) { ?>
                                <?php foreach ($product['gallery'] as $photo) { ?>
                                    <input type="hidden" name="gallery_image[]" value="<?= $photo['path'] ?>" />
                                <?php } ?>
        <?php } ?>
                            <input multiple="" type="file" name="gallery[]" />
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label">Description:</label>
				<div class="controls">
                   <textarea name="description"><?= (!empty($product) ? $product['description'] : "") ?></textarea>
				</div>
			  </div>
			  <div class="control-group">
				<div class="controls">
				  <button type="submit" class="btn">Save</button>
                </div>
			  </div>
			</form>
		</div>
		</div>
	</div>	                                        
    <?php } ?>
        </div>
    </div>
    <?php
} ?>

<!-- Footer ================================================================== -->
	<?php include"footer.php";
	?>