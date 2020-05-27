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
                <div id="container-wrapper" class="p-2">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Stock</h1>
                    </div>
                    <!-- Row -->
                    <div class="row">
                        <!-- Datatables -->
                        <!-- DataTable with Hover -->
                        <div class="col-lg-12">
                            <div class="card mb-0">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                                </div>
                                <?php
                                    $fetchProducts = "SELECT products.productID, products.productName, products.buyingPrice, products.sellingPrice, products.initialStock, products.productQuantity,  SUM(sales.quantitySold) FROM products LEFT JOIN sales ON products.productID=sales.productID GROUP BY ProductID";
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
                                                <th class="border-0 text-uppercase small font-weight-bold">Sold Quantity</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Quantity Left</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Product Evaluation</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Amount</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $_SESSION['loss'] = 0;

            while($row = mysqli_fetch_array($fetchProductsSql)) {

                if($row['SUM(sales.quantitySold)'] == "") {
                    $row['SUM(sales.quantitySold)'] = 0;
                }
                else {
                    $row['SUM(sales.quantitySold)'] = $row['SUM(sales.quantitySold)'];
                }

                if($row['sellingPrice'] == "") {
                        $row['sellingPrice'] = 0;
                    }
                    else {
                        $row['sellingPrice'] = $row['sellingPrice'];
                    }
                if($row['buyingPrice'] == "") {
                        $row['buyingPrice'] = 0;
                    }
                    else {
                        $row['buyingPrice'] = $row['buyingPrice'];
                    }

                $visuals = "";

                if($row['initialStock'] == ($row['SUM(sales.quantitySold)'] + $row['productQuantity'])) {
                    $difference = ($row['SUM(sales.quantitySold)'] + $row['productQuantity']) - $row['initialStock'];
                    $visuals = '<i class="fa fa-fw fa-check-circle text-success"></i>';
                }
                elseif($row['initialStock'] > ($row['SUM(sales.quantitySold)'] + $row['productQuantity'])) {
                    $difference = ($row['SUM(sales.quantitySold)'] + $row['productQuantity']) - $row['initialStock'];
                    $visuals = '<i class="fa fa-fw fa-times-circle  text-danger"></i>';
                    $_SESSION['loss'] += ($difference * $row['sellingPrice']);
                }
                elseif($row['initialStock'] < ($row['SUM(sales.quantitySold)'] + $row['productQuantity'])) {
                    $difference = ($row['SUM(sales.quantitySold)'] + $row['productQuantity']) - $row['initialStock'];
                    $visuals = '<i class="fa fa-fw fa-arrow-alt-circle-up text-info"></i>';
                }

                echo '<tr>
                            <td>'.$row['productName'].'</td>
                            <td>Tzs '.number_format($row['buyingPrice']).'/=</td>
                            <td>Tzs '.number_format($row['sellingPrice']).'/=</td>
                            <td>'.$row['initialStock'].'</td>
                            <td>'.$row['SUM(sales.quantitySold)'].'</td>
                            <td>'.$row['productQuantity'].'</td>
                            <td>'.$visuals. $difference.'</td>
                            <td>Tzs '.number_format($difference * $row['sellingPrice']).'/=</td>
                            <td>
                                <a href="'.BASE_URL.'/restock?product-id='.$row['productID'].'" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Restock"><i class="fa fa-plus-circle"></i></a>
                            </td>
                        </tr>';
            }
        }

                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="d-flex flex-row-reverse bg-dark text-light p-3 rounded-bottom">
                                <div class="py-1 px-5 text-right">
                                    <div class="mb-2">Total Loss Amount:</div>
                                    <div class="h4 font-weight-bold text-danger"><i class="fas fa-arrow-down text-danger"></i>Tzs <?php echo number_format($_SESSION['loss']);?>/=</div>
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
