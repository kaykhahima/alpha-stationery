<!DOCTYPE html>
<html lang="en">

<?php
    include 'includes/head.php';
    include 'db/dbConfig.php';

    $todayDate = date('d/m/Y');

    if(isset($_SESSION['username'])) {
    ?>

<body id="page-top">
    <?php
        $dynamicWhereClause = "";
        if (isset($_GET['items'])) {
            $whereClause = $_GET['items'];
            if ($whereClause == 'out-of-stock') {
                $dynamicWhereClause = "WHERE productQuantity <= 0";
            }
            elseif ($whereClause == 'low-on-stock') {
                $dynamicWhereClause = "WHERE productQuantity <= 10";
            }

        }


        if(isset($_POST['add'])){
            $productName = ucwords($_POST['name']);
            $productQuantity = $_POST['quantity'];
            $buyingPrice = $_POST['buyingPrice'];
            $sellingPrice = $_POST['sellingPrice'];

            if($sellingPrice < $buyingPrice) {
                echo "  <script>
                    swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Sorry! The selling price cant be smaller than the buying price!',
                        buttons: true
                    });
                </script>";
            }
            else {

                $productSql = "INSERT INTO products(productName, productQuantity, buyingPrice, sellingPrice, dateCreated) VALUES('$productName', '$productQuantity', '$buyingPrice', '$sellingPrice', '$todayDate')";
                $productSqlquery = mysqli_query($db, $productSql);

                echo "    <script>
                    swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Product Added Successfully!',
                        timer: 1000,
                        buttons: false
                    });
                </script>";
            }
        }
        if(isset($_GET['delete-id'])) {

            $_SESSION['delete-id'] = $_GET['delete-id'];

            $fetchProduct = "SELECT * FROM products WHERE productID = '".$_SESSION['delete-id']."' ";
            $fetchProductQuery = mysqli_query($db, $fetchProduct);

            while($row = mysqli_fetch_array($fetchProductQuery)) {

                $_SESSION['productName'] = $row['productName'];
                $_SESSION['productQuantity'] = $row['productQuantity'];
                $_SESSION['buyingPrice'] = $row['buyingPrice'];
                $_SESSION['sellingPrice'] = $row['sellingPrice'];
                $_SESSION['dateCreated'] = $row['dateCreated'];
            }

            $productSql = "INSERT INTO trash(productID, productName, productQuantity, buyingPrice, sellingPrice, dateDeleted) VALUES('".$_SESSION['delete-id']."', '".$_SESSION['productName']."', '".$_SESSION['productQuantity']."', '".$_SESSION['buyingPrice']."', '".$_SESSION['sellingPrice']."', '".$_SESSION['dateCreated']."')";
            $productSqlquery = mysqli_query($db, $productSql);

            if(!$productSqlquery) {
                echo die(mysqli_error($db));
            }


            $deleteProductSql = "DELETE FROM products WHERE productID='".$_SESSION['delete-id']."'";
            $deleteProductSqlQuery = mysqli_query($db, $deleteProductSql);

            $deleteSaleSql = "DELETE FROM sales WHERE productID='".$_SESSION['delete-id']."'";
            $deleteSaleSqlQuery = mysqli_query($db, $deleteSaleSql);

            echo "<script>
                    swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Deleted Successfully!',
                        timer: 1500,
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
                        <h1 class="h3 mb-0 text-gray-800">Products</h1>
                    </div>
                    <!-- Row -->
                    <div class="row">
                        <!-- Datatables -->
                        <!-- DataTable with Hover -->
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                                </div>
                                <?php
        $fetchProducts = "SELECT * FROM products $dynamicWhereClause";
        $fetchProductsSql = mysqli_query($db, $fetchProducts);

        if(mysqli_num_rows($fetchProductsSql) == 0) {
            echo '<div class="text-center">
                                                    <img src="'.BASE_URL.'/images/cover/empty.png" class="text-center w-25">
                                                    <h5 class="my-4">You have no products yet!</h5>
                                                    </div>';
        }
        else {
                                    ?>

                                <div class="table-responsive p-3">
                                    <table class="table table-hover" id="dataTable">
                                        <thead>
                                            <tr>
                                                <!--                                                <th class="border-0 text-uppercase small font-weight-bold">ID</th>-->
                                                <th class="border-0 text-uppercase small font-weight-bold">Name</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Buying Price</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Selling Price</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Initial Stock</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Sold</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">On Stock</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Loss/Profit</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Amount</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

            while($row = mysqli_fetch_array($fetchProductsSql)) {

                if($row['sellingPrice'] == "") {
                        $row['sellingPrice'] = 0;
                    }
                    else {
                        $row['sellingPrice'] = $row['sellingPrice'];
                    }

                $sold = 0;
                $visuals = "";

                if($row['initialStock'] == ($sold + $row['productQuantity'])) {
                    $difference = ($sold + $row['productQuantity']) - $row['initialStock'];
                    $visuals = '<i class="fa fa-fw fa-check-circle text-success"></i>';
                }
                elseif($row['initialStock'] > ($sold + $row['productQuantity'])) {
                    $difference = ($sold + $row['productQuantity']) - $row['initialStock'];
                    $visuals = '<i class="fa fa-fw fa-times-circle  text-danger"></i>';
                }
                elseif($row['initialStock'] < ($sold + $row['productQuantity'])) {
                    $difference = ($sold + $row['productQuantity']) - $row['initialStock'];
                    $visuals = '<i class="fa fa-fw fa-arrow-alt-circle-up text-info"></i>';
                }

                echo '<tr>
                            <td>'.$row['productName'].'</td>
                            <td>Tzs '.$row['buyingPrice'].'/=</td>
                            <td>Tzs '.number_format($row['sellingPrice']).'/=</td>
                            <td>'.$row['initialStock'].'</td>
                            <td>'.$sold.'</td>
                            <td>'.$row['productQuantity'].'</td>
                            <td>'.$visuals. $difference.'</td>
                            <td>Tzs '.number_format($difference * $row['sellingPrice']).'/=</td>
                            <td>
                                <a href="'.BASE_URL.'/restock?product-id='.$row['productID'].'" class="btn btn-primary btn-sm">Restock</a>
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