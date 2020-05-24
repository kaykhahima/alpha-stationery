<!DOCTYPE html>
<html lang="en">

<?php
    include 'includes/head.php';
    include 'db/dbConfig.php';
?>

<body id="page-top">
    <?php 
    
    if(isset($_SESSION['username'])) {
    
    $productStockMinMsg = "";
    $productStockNunMsg = "";
    $currentMonth = date('m');
    
    $fetchMonthlySales = "SELECT products.productID, sales.totalAmount FROM products INNER JOIN sales ON products.productID=sales.productID WHERE month(STR_TO_DATE(dateAdded,'%d/%m/%Y')) = $currentMonth";
    $fetchMonthlySalesQuery = mysqli_query($db, $fetchMonthlySales);   
    $monthSales = 0;
        
    while($row = mysqli_fetch_array($fetchMonthlySalesQuery)) { $monthSales += $row['totalAmount']; }
    
    $noOfProducts = "SELECT COUNT(DISTINCT(productID)) FROM sales WHERE month(STR_TO_DATE(dateAdded,'%d/%m/%Y')) = $currentMonth";
    $noOfProductsQuery = mysqli_query($db, $noOfProducts);    
    while($number = mysqli_fetch_array($noOfProductsQuery)) {$thisNumber = $number['COUNT(DISTINCT(productID))'];}
    
    $lowProducts = "SELECT productID FROM products WHERE productQuantity <= 10";
    $lowProductsQuery = mysqli_query($db, $lowProducts);
    $numberOfLowProducts  = mysqli_num_rows($lowProductsQuery);
    if($numberOfLowProducts >= 1) {
        $productStockMinMsg = '
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Warning!</strong> You have <a href="'.BASE_URL.'/products?items=low-on-stock" style="color:#fff;font-weight:bold;text-decoration:underline">'.$numberOfLowProducts.' item(s)</a> low on stock.
        </div>';
    }
    
    
    $noProducts = "SELECT productID FROM products WHERE productQuantity <= 0";
    $noProductsQuery = mysqli_query($db, $noProducts);
    $numberOfNoProducts  = mysqli_num_rows($noProductsQuery);
    if($numberOfNoProducts >= 1) {
        $productStockNunMsg = '
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Warning!</strong> You have <a href="'.BASE_URL.'/products?items=out-of-stock" style="color:#fff;font-weight:bold;text-decoration: underline">'.$numberOfNoProducts.' item(s)</a> out of stock.
        </div>';
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <?php echo $productStockNunMsg.$productStockMinMsg;?>

                    <div class="row mb-3">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Earnings (Monthly)</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">Tzs <?php echo number_format($monthSales);?>/=</div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <span class="text-primary mr-2"><i class="fa fa-hand-point-right"></i></span>
                                                <span><a href="<?php echo BASE_URL;?>/monthly-sales" class="text-primary">View All</a></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Annual) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Sales (Monthly)</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo $thisNumber;?></div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <span class="text-success mr-2"><i class="fa fa-hand-point-right"></i></span>
                                                <span><a href="<?php echo BASE_URL;?>/monthly-sales" class="text-success">View All</a></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-cart fa-2x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Out of stock</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo $numberOfNoProducts;?></div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <span class="text-danger mr-2"><i class="fa fa-hand-point-right"></i></span>
                                                <span><a href="<?php echo BASE_URL;?>/products?items=out-of-stock" class="text-danger">View All</a></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-times-circle fa-2x text-danger"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Low on stock</div>
                                            <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $numberOfLowProducts;?></div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <span class="text-warning mr-2"><i class="fa fa-hand-point-right"></i></span>
                                                <span><a href="<?php echo BASE_URL;?>/products?items=low-on-stock" class="text-warning">View All</a></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-exclamation-triangle fa-2x text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Monthly Recap Report</h6>
                                </div>
                                <div class="card-body">
                                    <canvas id="transportChart" width="100" height="40"></canvas>
                                    <script>
                                        var ctx = document.getElementById('transportChart').getContext('2d');
                                        var chart = new Chart(ctx, {
                                            // type of chart
                                            type: 'bar',

                                            // data for  dataset
                                            data: {
                                                labels: [

                                                    <?php 
                                                        $monthlyStats = "SELECT DISTINCT(month(STR_TO_DATE(dateAdded,'%d/%m/%Y'))) FROM sales ORDER BY month(STR_TO_DATE(dateAdded,'%d/%m/%Y')) ASC";
                                                        $monthlyStatsQuery = mysqli_query($db, $monthlyStats);
                                                    
                                                        while($thisMonth = mysqli_fetch_array($monthlyStatsQuery)) {
                                                            $months = $thisMonth["(month(STR_TO_DATE(dateAdded,'%d/%m/%Y')))"];
                                                            echo "'".date('F', mktime(0, 0, 0, $months, 1, 2000))."',";
                                                        }
                                                    ?>

                                                ],
                                                datasets: [{
                                                    label: 'Tzs',
                                                    backgroundColor: '#ff92a9',
                                                    borderColor: '#ff6384',
                                                    borderWidth: 2,
                                                    data: [

                                                        <?php
                                                            $monthlyAmount = "SELECT SUM(totalAmount) FROM sales GROUP BY month(STR_TO_DATE(dateAdded,'%d/%m/%Y')) ORDER BY month(STR_TO_DATE(dateAdded,'%d/%m/%Y')) ASC";
                                                            $monthlyAmountQuery = mysqli_query($db, $monthlyAmount);
                                                        
                                                            while($thisAmount = mysqli_fetch_array($monthlyAmountQuery)) {
                                                                echo $thisAmount['SUM(totalAmount)'].',';
                                                            }
                                                        
                                                        ?>

                                                    ]
                                                }]
                                            },

                                            // Configuration options go here
                                            options: {
                                                title: {
                                                    display: true,
                                                    fontFamily: '"Lato", sans-serif',
                                                    fontColor: '#fff',
                                                    fontSize: 14

                                                },
                                                legend: {
                                                    display: true
                                                },

                                            }
                                        });

                                    </script>
                                </div>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-success">Most Sold Products</h6>
                                </div>
                                <div class="card-body">
                                    <?php
                                    
                                        $mostSoldProducts = "SELECT products.productName, products.productQuantity, sales.productID,  SUM(sales.quantitySold) FROM products INNER JOIN sales ON products.productID=sales.productID GROUP BY productID ORDER BY 
                                        ((SUM(sales.quantitySold) / (productQuantity + SUM(sales.quantitySold))) * 100) DESC LIMIT 10";
                                        $mostSoldProductsQuery = mysqli_query($db, $mostSoldProducts);
        
                                        if(mysqli_num_rows($mostSoldProductsQuery) == 0) {
                                            echo '<div class="text-center">
                                                    <img src="images/cover/empty.png" class="text-center w-50">
                                                    <h5 class="mt-4">Please make a few sales.</h5>
                                                     <a href="'.BASE_URL.'/point-of-sale" class="btn btn-primary my-3">Point-of-sale  <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                    ';
                                        }
                                        else {
                                    
                                        while($data = mysqli_fetch_array($mostSoldProductsQuery)) {
                                            echo '
                                                <div class="mb-3">
                                                    <div class="small text-gray-500">'.$data['productName'].'
                                                        <div class="small float-right"><b>'.$data['SUM(sales.quantitySold)'].' of '.($data['productQuantity']+$data['SUM(sales.quantitySold)']).' Items</b></div>
                                                    </div>
                                                    <div class="progress" style="height: 12px;">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: '.(($data['SUM(sales.quantitySold)'] / ($data['productQuantity']+$data['SUM(sales.quantitySold)'])) * 100).'%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                 ';
                                        }
                                            }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-danger">Least Sold Products</h6>
                                </div>
                                <div class="card-body">
                                    <?php
                                    
                                        $leastSoldProducts = "SELECT products.productName, products.productQuantity, sales.productID,  SUM(sales.quantitySold) FROM products INNER JOIN sales ON products.productID=sales.productID GROUP BY productID ORDER BY 
                                        ((SUM(sales.quantitySold) / (productQuantity + SUM(sales.quantitySold))) * 100) ASC LIMIT 10";
                                        $leastSoldProductsQuery = mysqli_query($db, $leastSoldProducts);
        
                                        if(mysqli_num_rows($leastSoldProductsQuery) == 0) {
                                            echo '<div class="text-center">
                                                    <img src="images/cover/empty.png" class="text-center w-50">
                                                    <h5 class="mt-4">Please make a few sales.</h5>
                                                     <a href="point-of-sale" class="btn btn-primary my-3">Point-of-sale  <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                    ';
                                        }
                                        else {
                                    
                                        while($data = mysqli_fetch_array($leastSoldProductsQuery)) {
                                            echo '
                                                <div class="mb-3">
                                                    <div class="small text-gray-500">'.$data['productName'].'
                                                        <div class="small float-right"><b>'.$data['SUM(sales.quantitySold)'].' of '.($data['productQuantity']+$data['SUM(sales.quantitySold)']).' Items</b></div>
                                                    </div>
                                                    <div class="progress" style="height: 12px;">
                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: '.(($data['SUM(sales.quantitySold)'] / ($data['productQuantity']+$data['SUM(sales.quantitySold)'])) * 100).'%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                 ';
                                        }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
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
    <?php include 'includes/scripts.php'?>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
</body>

</html>
<?php } else { header("Location: 404"); } ?>
