<!DOCTYPE html>
<html lang="en">

<?php 
    include 'includes/head.php';
    include 'db/dbConfig.php';
    
    if(isset($_SESSION['username'])) {
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profit Earned per Sale</h1>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                            $fetchSalesSql = "SELECT products.productName, products.sellingPrice, products.buyingPrice, sales.productID,  SUM(sales.quantitySold), SUM(sales.discount), SUM(sales.totalAmount) FROM products INNER JOIN sales ON products.productID=sales.productID GROUP BY productID";
                                            $fetchSalesQuery = mysqli_query($db, $fetchSalesSql);
                                            
                                            $_SESSION['totalProfitAmount'] = 0;

                                            if(mysqli_num_rows($fetchSalesQuery) == 0) {
                                                echo '<div class="text-center p-5">
                                                        <img src="'.BASE_URL.'/images/cover/cart.png" class="text-center" width="39%">
                                                        <h5 class="my-4">You have not made any sales yet!</h5>
                                                        <a href="'.BASE_URL.'/point-of-sale" class="btn btn-primary">Go to Point-of-sale  <i class="fa fa-arrow-right"></i></a>
                                                    </div>';  
                                            }
                                            else {
                            ?>
                            <div class="card mb-5">
                                <div class="card-body p-0">
                                    <div class="row p-5">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table" id="dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-0 text-uppercase small font-weight-bold">Name</th>
                                                            <th class="border-0 text-uppercase small font-weight-bold">Buying Price</th>
                                                            <th class="border-0 text-uppercase small font-weight-bold">Selling Price</th>
                                                            <th class="border-0 text-uppercase small font-weight-bold">Quantity Sold</th>
                                                            <th class="border-0 text-uppercase small font-weight-bold">Profit Earned</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                            
                                                while($row = mysqli_fetch_array($fetchSalesQuery)) { 
                                                
                                                $profitEarned = $row['sellingPrice'] - $row['buyingPrice'];
                                                $_SESSION['totalProfitAmount'] += ($profitEarned * $row['SUM(sales.quantitySold)']);
                                                    
                                                echo '<tr>
                                                        <td>'.$row['productName'].'</td>
                                                        <td>Tzs '.number_format($row['buyingPrice']).'/=</td> 
                                                        <td>Tzs '.number_format($row['sellingPrice']).'/=</td>
                                                        <td>'.$row['SUM(sales.quantitySold)'].'</td>
                                                        <td><i class="fas fa-arrow-up text-success"></i> Tzs '.number_format($profitEarned * $row['SUM(sales.quantitySold)']).'/=</td>
                                                    </tr>';
                                                    }
                                            
                                            
                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row-reverse bg-dark text-light p-3 rounded-bottom">
                                        <div class="py-1 px-5 text-right">
                                            <div class="mb-2">Total Profit Earned</div>
                                            <div class="h2 font-weight-light">Tzs <?php echo number_format($_SESSION['totalProfitAmount']); ?>/=</div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--Row-->
                </div>
                <!---Container Fluid-->
            </div>
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include 'includes/scripts.php';?>

</body>

</html>
<?php } else { header("Location: 404"); } ?>
