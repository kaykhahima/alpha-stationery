<!DOCTYPE html>
<html lang="en">

<?php
    include 'includes/head.php';
    include 'db/dbConfig.php';
    
    if(isset($_SESSION['username'])) {
?>

<body id="page-top">
    <?php
if(isset($_GET['delete-id'])) {

    $_SESSION['delete-id'] = $_GET['delete-id'];

    $deleteProductSql = "DELETE FROM trash WHERE productID='".$_SESSION['delete-id']."'";
    $deleteProductSqlQuery = mysqli_query($db, $deleteProductSql);

    echo "<script>
    swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'The Product is Permanently Deleted!',
            timer: 3000,
            buttons: false
            });
            </script>";

}
    
if(isset($_GET['recover-id'])) {

    $_SESSION['recover-id'] = $_GET['recover-id'];

    $recoverProductSql = "SELECT * FROM trash WHERE productID='".$_SESSION['recover-id']."'";
    $recoverProductSqlQuery = mysqli_query($db, $recoverProductSql);
    
    $data = mysqli_fetch_array($recoverProductSqlQuery);
    $_SESSION['name'] = $data['productName'];
    $_SESSION['quantity'] = $data['productQuantity'];
    $_SESSION['buyingPrice'] = $data['buyingPrice'];
    $_SESSION['sellingPrice'] = $data['sellingPrice'];
    $_SESSION['dateRecovered'] = $data['dateDeleted'];
    
    $productSql = "INSERT INTO products(productName, productQuantity, buyingPrice, sellingPrice, dateCreated) VALUES('".$_SESSION['name']."', '".$_SESSION['quantity']."', '".$_SESSION['buyingPrice']."', '".$_SESSION['sellingPrice']."', '".$_SESSION['dateRecovered']."')";
    $productSqlquery = mysqli_query($db, $productSql);
    
    $deleteProductSql = "DELETE FROM trash WHERE productID='".$_SESSION['recover-id']."'";
    $deleteProductSqlQuery = mysqli_query($db, $deleteProductSql);
    
    echo "<script>
    swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'The Product is Successfully Recovered!',
            timer: 3000,
            buttons: false
            });
            </script>";

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Trash</h1>
                    </div>

                    <!-- Row -->
                    <div class="row">
                        <!-- Datatables -->
                        <!-- DataTable with Hover -->
                        <div class="col-lg-12">
                            <?php
                            
                                    $fetchProducts = "SELECT * FROM trash";
                                    $fetchProductsSql = mysqli_query($db, $fetchProducts);

                                    if(mysqli_num_rows($fetchProductsSql) == 0) {
                                        echo '<div class="text-center p-1">
                                                <img src="'.BASE_URL.'/images/cover/great.png" class="mt-4" width="30%">
                                                <h4 class="mt-4 text-dark">Great! No deleted products.</h4>
                                            </div>';
                                    }
                                    else {
                            ?>
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Deleted Products</h6>
                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table table-hover" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Name</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Selling Price</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Buying Price</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                                while($row = mysqli_fetch_array($fetchProductsSql)) {                    
                                                echo '<tr>
                                                        <td>ASP-'.$row['productID'].'</td>
                                                        <td>'.$row['productName'].'</td>
                                                        <td>'.$row['productQuantity'].'</td>
                                                        <td>'.$row['buyingPrice'].'</td>
                                                        <td>'.$row['sellingPrice'].'</td>
                                                        <td>
                                                            <a href="'.BASE_URL.'/trash?recover-id='.$row['productID'].'" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Recover"><i class="fa fa-redo"></i></a>
                                                            <a href="'.BASE_URL.'/trash?delete-id='.$row['productID'].'" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="left" title="Delete Permanently"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    </tr>';
                                                    }
                                            }
                                            
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
