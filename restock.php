<!DOCTYPE html>
<html lang="en">

<?php
include 'includes/head.php';
include 'db/dbConfig.php';
    
if(isset($_SESSION['username'])) {

if(isset($_GET['product-id'])){
    $_SESSION['product-id'] = $_GET['product-id'];
    $fetch = "SELECT * FROM products WHERE productID = '".$_SESSION['product-id']."' ";
    $fetchQuery = mysqli_query($db, $fetch);

    while($row = mysqli_fetch_array($fetchQuery)) {
        $_SESSION['productName'] = $row['productName'];
        $_SESSION['initialStock'] = $row['initialStock'];
    }
}
?>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php';?>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <?php include 'includes/topbar.php';?>
                <!-- Topbar -->
                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="text-center my-5">
                        <h6 class="h3 mb-0 text-uppercase text-primary">Restock Product</h6>
                    </div>

                    <!-- Row -->
                    <div class="row">
                        <!-- Datatables -->
                        <!-- DataTable with Hover -->
                        <div class="col-lg-4 offset-lg-4">
                            <?php
                                    if(isset($_POST['restock'])) {
                                        $quantity = $_POST['initStock'];
                                        $newQuantity = $_SESSION['initialStock'] + $quantity;
                                        $_SESSION['initialStock'] = $newQuantity;

                                        $restockSql = "UPDATE products SET initialStock = '$newQuantity'  WHERE productID = '".$_SESSION['product-id']."'";
                                        $restockSqlQuery = mysqli_query($db, $restockSql);

                                        if($restockSqlQuery) {
                                            echo "<script>
                                                    swal.fire({
                                                            icon: 'success',
                                                            title: 'Success!',
                                                            text: 'Restocked Successfully!',
                                                            timer: 1500,
                                                            buttons: false,
                                                        });

                                                        setTimeout(function () {
                                                        window.location.href='".BASE_URL."/stock';
                                                        }, 500);
                                                    </script>";
                                        }
                                    }
                            
                            ?>
                            <form method="post" action="<?php echo BASE_URL;?>/restock">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" value="<?php echo $_SESSION['productName'];?>" disabled>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="quantity">Initial Stock</label>
                                        <input type="number" class="form-control" id="quantity" name="initStock" placeholder="">
                                        <small class="text-primary">Currently: <strong><?php echo $_SESSION['initialStock'];?></strong></small>
                                    </div>
                                </div>
                                <input type="submit" role="button" name="restock" class="btn btn-primary btn-block btn-lg" value="Restock">
                            </form>

                        </div>
                    </div>
                    <!--Row-->

                </div>
                <!---Container Fluid-->
            </div>
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include 'includes/scripts.php'?>

</body>

</html>
<?php } else { header("Location: 404"); } ?>
