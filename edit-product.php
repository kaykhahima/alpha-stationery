<!DOCTYPE html>
<html lang="en">

<?php
include 'includes/head.php';
include 'db/dbConfig.php';
    
if(isset($_SESSION['username'])) {    

if(isset($_GET['id'])){
    $_SESSION['product-id'] = $_GET['id'];
    $fetch = "SELECT * FROM products WHERE productID = '".$_SESSION['product-id']."' ";
    $fetchQuery = mysqli_query($db, $fetch);

    while($row = mysqli_fetch_array($fetchQuery)) {
        $_SESSION['productName'] = $row['productName'];
        $_SESSION['productQuantity'] = $row['productQuantity'];
        $_SESSION['buyingPrice'] = $row['buyingPrice'];
        $_SESSION['sellingPrice'] = $row['sellingPrice'];
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
                    <div class="text-center my-3">
                        <h3 class="mb-0 text-uppercase text-primary"><strong>Edit Product</strong></h3>
                    </div>

                    <!-- Row -->
                    <div class="row">
                        <!-- Datatables -->
                        <!-- DataTable with Hover -->
                        <div class="col-lg-4 offset-lg-4">
                            <?php
                                    if(isset($_POST['update'])) {
                                        
                                       $productName = $_POST['name'];
                                       $productQuantity = $_POST['quantity'];
                                       $buyingPrice = $_POST['buyingPrice'];
                                       $sellingPrice = $_POST['sellingPrice'];
                                        
                                        $editSql = "UPDATE products SET productName = '$productName', productQuantity = '$productQuantity', buyingPrice = '$buyingPrice', sellingPrice = '$sellingPrice' WHERE productID = '".$_SESSION['product-id']."'";
                                        $editSqlQuery = mysqli_query($db, $editSql);
                                        
                                        if($editSqlQuery) {
                                            
                                                echo "<script>
                                                    swal.fire({
                                                            icon: 'success',
                                                            title: 'Success!',
                                                            text: 'Product Edited Successfully!',
                                                            timer: 1500,
                                                            buttons: false
                                                        });
                                                    </script>";
                                        
                                                $_SESSION['productName'] = $productName;
                                                $_SESSION['productQuantity'] = $productQuantity;
                                                $_SESSION['buyingPrice'] = $buyingPrice;
                                                $_SESSION['sellingPrice'] = $sellingPrice;
                                            }
                                    }
                                ?>
                            <form method="post" action="edit-product">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION['productName'];?>">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="quantity">Quantity Left</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $_SESSION['productQuantity'];?>">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="buyingPrice">Buying Price</label>
                                        <input type="number" class="form-control" id="buyingPrice" name="buyingPrice" value="<?php echo $_SESSION['buyingPrice'];?>">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="sellingPrice">Selling Price</label>
                                        <input type="number" class="form-control" id="sellingPrice" name="sellingPrice" value="<?php echo $_SESSION['sellingPrice'];?>">
                                    </div>
                                </div>
                                <input type="submit" role="button" name="update" class="btn btn-primary btn-block btn-lg" value="Update">
                            </form>

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
