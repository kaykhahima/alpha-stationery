<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php';?>
<?php include 'db/dbConfig.php';?>

<body id="page-top">

    <?php    
    if(isset($_SESSION['username'])) {
        
    $todayDate = date('d/m/Y');
    
    if(isset($_POST['submit'])){
        $_SESSION['product-id'] = $_POST['name'];
        $_SESSION['quantity'] = $_POST['quantity'];
        $_SESSION['discount'] = $_POST['discount'];
        
        $fetch = "SELECT * FROM products WHERE productID = '".$_SESSION['product-id']."'";
        $fetchQuery = mysqli_query($db, $fetch);
        
        $data = mysqli_fetch_array($fetchQuery);
        $_SESSION['productName'] = $data['productName'];
        $_SESSION['sellingPrice'] = $data['sellingPrice'];
        $_SESSION['currentQuantiy'] = $data['productQuantity'];
        
        if($_SESSION['quantity'] > $_SESSION['currentQuantiy']) {
            echo "<script>
                    swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Sorry! The stock has less quantity!',
                            buttons: true
                            });
                </script>";
        }
        else {
        
        $_SESSION['total'] = ($_SESSION['quantity'] * $_SESSION['sellingPrice']) - $_SESSION['discount'];
        
        $saleSql = "INSERT INTO sales(productID, productName, quantitySold, priceEach, discount, totalAmount, dateAdded) VALUES('".$_SESSION['product-id']."', '".$_SESSION['productName']."', '".$_SESSION['quantity']."', '".$_SESSION['sellingPrice']."', '".$_SESSION['discount']."', '".$_SESSION['total']."', '$todayDate')";
        $saleSqlQuery = mysqli_query($db, $saleSql);
        
        $updatedQuantity = $_SESSION['currentQuantiy'] - $_SESSION['quantity'];
        
        $updateStockSql = "UPDATE products SET productQuantity = '$updatedQuantity' WHERE productID = '".$_SESSION['product-id']."'";
        $updateStockSqlQuery = mysqli_query($db, $updateStockSql);
        
//        if(!$saleSqlQuery) {
//        echo die(mysqli_error($db));
//        }
        
        echo "<script>
                swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Great. More Money.',
                        timer: 2000,
                        buttons: false
                        });
            </script>";
            }

    }
    
?>
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
                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 p-o-s">
                            <?php
                                $fetchProductsSql = "SELECT * FROM products ORDER BY productName";
                                $fetchProductsSqlQuery = mysqli_query($db, $fetchProductsSql);
                        
                                if(mysqli_num_rows($fetchProductsSqlQuery) == 0) {
                                    echo '<div class="text-center p-1">
                                            <img src="images/cover/empty.png" class="w-50 mt-4">
                                                    <h4 class="mt-4 text-dark">It feels a little lonely in here!</h4>
                                                    <p>Please add some products to make some sales.</p>
                                                     <a href="products" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Products</a>
                                                    </div>';
                                }
                                else {
        
                            ?>
                            <div class="text-center mt-2">
                                <img class="logo mb-3" src="images/logo/alpha-logo-vertical.png" alt="alpha stationery logo" width="250px" height="">
                                <h6 class="mb-2 text-uppercase text-primary"><strong>Point of Sale</strong></h6>
                            </div>

                            <form method="post" action="point-of-sale">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="name">Product Name</label>
                                        <select class="form-control selectpicker" name="name" data-live-search="true" id="name">
                                            <?php
                                                    
                                                    
                                                    while($row = mysqli_fetch_array($fetchProductsSqlQuery)) {
                                                        $status = "disabled";
                                                        echo '<option value="'.$row['productID'].'"'; 
                                                        if($row['productQuantity'] <= 0) {echo $status;}
                                                        if($row['sellingPrice'] == "") {
                                                            $row['sellingPrice'] = 0;
                                                        }
                                                        else {
                                                            $row['sellingPrice'] = $row['sellingPrice'];
                                                        }
                                                        echo '>'.$row['productName'].' @ Tzs '.number_format($row['sellingPrice']).'/=</option>';
                                                    }
                                                ?>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" value="1">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="Discount">Discount</label>
                                        <input type="number" class="form-control" id="Discount" name="discount" value="0">
                                    </div>
                                </div>
                                <input type="submit" role="button" name="submit" class="btn btn-primary btn-block btn-lg mb-1" value="Submit">
                            </form>
                            <?php }?>
                        </div>

                    </div>
                    <!--Row-->

                </div>
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
<?php
    } else { header("Location: 404"); }
?>
