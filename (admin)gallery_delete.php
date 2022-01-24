<?php include 'headeradmin.php'; ?>
<div class="main-content">
    <h1>Delete Products</h1>
    <div id="content-box">
    <?php
    $error = false;
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        include 'connectDB.php';
        $result = mysqli_query($conn, "DELETE FROM `image_library` WHERE `id` = ".$_GET['id']);
        if (!$result) {
            $error = "Can not delete image in library";
        }
        mysqli_close($conn);
        if ($error !== false) {
            ?>
            <div id="error-notify" class="box-content">
                <h2>Notification</h2>
                <h4><?= $error ?></h4>
                <a href="javascript:window.history.go(-1)">Back</a>
            </div>
        <?php } else { ?>
            <div id="success-notify" class="box-content">
                <h2>Successfully deleted the photo gallery of the product</h2>
                <a href="javascript:window.history.go(-1)">Back</a>
            </div>
        <?php } ?>
    <?php } ?>
    </div>
</div>
<?php include 'footer.php'; ?>