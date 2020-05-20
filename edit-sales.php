<!DOCTYPE html>
<html lang="en">

<?php
include 'includes/head.php';
include 'db/dbConfig.php';
    
if(isset($_SESSION['username'])) {

if(isset($_GET['id'])){
    $_SESSION['sale-id'] = $_GET['id'];
    $fetch = "SELECT * FROM sales WHERE id = '".$_SESSION['sale-id']."' ";
    $fetchQuery = mysqli_query($db, $fetch);

    while($row = mysqli_fetch_array($fetchQuery)) {
        $_SESSION['productName'] = $row['productName'];
        $_SESSION['saleProductID'] = $row['productID'];
        $_SESSION['quantitySold'] = $row['quantitySold'];
        $_SESSION['discount'] = $row['discount'];
        $_SESSION['price'] = $row['priceEach'];
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
                        <h6 class="h3 mb-0 text-uppercase text-primary"><strong>Edit Sale</strong></h6>
                    </div>

                    <!-- Row -->
                    <div class="row">
                        <!-- Datatables -->
                        <!-- DataTable with Hover -->
                        <div class="col-lg-4 offset-lg-4">
                            <?php
                                if(isset($_POST['update'])) {
                                    
                                           $quantitySold = $_POST['quantitySold'];
                                           $saleDiscount = $_POST['saleDiscount'];
                                    
                                            $newAmount = ($_SESSION['price'] * $quantitySold) - $saleDiscount;

                                            $editSql = "UPDATE sales SET quantitySold = '$quantitySold', discount = '$saleDiscount', totalAmount = '$newAmount' WHERE id = '".$_SESSION['sale-id']."'";
                                            $editSqlQuery = mysqli_query($db, $editSql);
                                    
                                            $initSoldValue = $_SESSION['quantitySold'];
                                            $finalSoldValue = $quantitySold;
                                    
                                            $changeInProduct = $finalSoldValue - $initSoldValue;
                                    
                                            $fetchProduct = "SELECT * FROM products WHERE productID = '".$_SESSION['saleProductID']."'";
                                            $fetchProductQry = mysqli_query($db, $fetchProduct);
                                            while($idRow = mysqli_fetch_array($fetchProductQry)) {
                                                $_SESSION['thisProductID'] = $idRow['productID'];
                                                $_SESSION['thisProductQuantity'] = $idRow['productQuantity'];
                                            }
                                            
                                            $newEditedProduct = $_SESSION['thisProductQuantity'] - $changeInProduct;
                                            $editProductSql = "UPDATE products SET productQuantity = '$newEditedProduct' WHERE productID = '".$_SESSION['saleProductID']."'";
                                            $editProductQry = mysqli_query($db, $editProductSql);
                                            
                                    
                                    

                                            if($editSqlQuery) {

                                                    echo "<script>
                                                        swal.fire({
                                                                icon: 'success',
                                                                title: 'Success!',
                                                                text: 'Sale Edited Successfully!',
                                                                timer: 1500,
                                                                buttons: false
                                                            });
                                                        </script>";

                                                    $_SESSION['quantitySold'] = $quantitySold;
                                                    $_SESSION['discount'] = $saleDiscount;
                                                }
                                        }
                                ?>
                            <form method="post" action="edit-sales">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="name">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="saleName" value="<?php echo $_SESSION['productName'];?>" disabled>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" class="form-control" id="quantity" name="quantitySold" value="<?php echo $_SESSION['quantitySold'];?>">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="discount">Discount</label>
                                        <input type="number" class="form-control" id="discount" name="saleDiscount" value="<?php echo $_SESSION['discount'];?>">
                                    </div>
                                </div>
                                <input type="submit" role="button" name="update" class="btn btn-primary btn-block btn-lg" value="Update">
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
