<!DOCTYPE html>
<html lang="en">

<?php 
    include 'includes/head.php';
    include 'db/dbConfig.php'; 
    $todayDate = date('d/m/Y');
    $todayMonth = date('F');
    $currentMonth = date('m');
    $currentYear = date('Y');
    
    if(isset($_SESSION['username'])) {
    ?>

<body id="page-top">
    <?php
  if(isset($_GET['delete-id'])) {

    $_SESSION['delete-id'] = $_GET['delete-id'];

    $deleteSaleSql = "DELETE FROM sales WHERE id='".$_SESSION['delete-id']."'";
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
                <div class="container" id="container-wrapper">
                    <div class="container-fluid mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Sales</h1>
                    </div>
                    <div class="container-fluid pb-4">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-pills nav-fill">
                                    <li class="nav-item">
                                        <a class="nav-link" href="daily-sales">Daily</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="monthly-sales" data-toggle="tab">Monthly</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="yearly-sales">Yearly</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Row -->
                    <?php
                        $defaultFilter = "";
                        $filteredDate = "";

                        if(isset($_POST['dateFilter'])) {
                            $filteredDate = $_POST['date'];
                            $defaultFilter = 'AND dateAdded = "'.$filteredDate.'"';
                        }
                    
                        $fetchMonthlySalesSql = "SELECT DISTINCT(dateAdded) FROM sales WHERE month(STR_TO_DATE(dateAdded,'%d/%m/%Y')) = $currentMonth $defaultFilter ORDER BY dateAdded DESC";
                        $fetchMonthlySalesQuery = mysqli_query($db, $fetchMonthlySalesSql);

                                if(mysqli_num_rows($fetchMonthlySalesQuery) == 0) {
                                    echo '<div class="text-center p-2">
                                    <img src="images/cover/cart.png" class="text-center" width="30%">
                                    <h5 class="my-4">You have not made any sales yet!</h5>
                                    <a href="point-of-sale" class="btn btn-primary">Go to Point-of-sale  <i class="fa fa-arrow-right"></i></a>
                                </div>';  
                                }
                        else {
        
        

                        ?>


                    <div class="tab-content">

                        <div class="tab-pane active" role="tabpanel" id="monthly">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 pt-3 pb-0">
                                        <span class="h3">Monthly sales</span>
                                        <form class="form-inline float-right" method="post" action="monthly-sales">
                                            <div class="form-group mx-sm-3 mb-2">
                                                <label for="filter" class="sr-only">Filter</label>
                                                <input type="text" class="form-control datetimepicker-input" id="datetimepicker1" data-toggle="datetimepicker" data-target="#datetimepicker1" name="date" placeholder="Date">
                                            </div>
                                            <input type="submit" class="btn btn-outline-primary mb-2" name="dateFilter" value="Filter">


                                        </form>
                                        <p class="my-3 text-primary text-uppercase"><strong>Month: </strong><?php echo $todayMonth?></p>
                                    </div>
                                    <?php
                                                    
                                    
                                            
                                    $totalAmount = 0;
                                    $totalProfitAmount = 0;
                                                    
                                    while($data = mysqli_fetch_array($fetchMonthlySalesQuery)) {
                                        $thisDate = $data['dateAdded'];                                        
                                        
                                                        
                                        echo '
                                        <div class="col-lg-12">
                                            <p><strong>Date: </strong>'.$thisDate.'</p>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card mb-5">
                                                <div class="card-body p-0">
                                                    <div class="row px-3 pt-3 pb-0">
                                                        <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover" id="">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Name</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity sold</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Buying Price</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Selling Price</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Discount</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Profit Earned</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    ';
                                                    
                                                $anotherSql = "SELECT products.productName, products.sellingPrice, products.buyingPrice, sales.productID,  SUM(sales.quantitySold), SUM(sales.discount), SUM(sales.totalAmount) FROM products INNER JOIN sales ON products.productID=sales.productID WHERE dateAdded = '$thisDate' GROUP BY productID";
                                                $anotherQuery = mysqli_query($db, $anotherSql);
                                                
                                                $subTotal = 0; 
                                                $_SESSION['totalProfitAmount'] = 0;
                                        
                                                while($deta = mysqli_fetch_array($anotherQuery)) {
                                                    
                                                    $profit = $deta['sellingPrice'] - $deta['buyingPrice'];
                                                    $profitEarned = ($profit * $deta['SUM(sales.quantitySold)']) - ($deta['SUM(sales.discount)']);
                                                    
                                                    $_SESSION['totalProfitAmount'] += $profitEarned;
                                                    
                                                    $subTotal += $deta['SUM(sales.totalAmount)'];
                                                    echo '
                                                            <tr>
                                                                <td>'.$deta['productName'].'</td>
                                                                <td>'.$deta['SUM(sales.quantitySold)'].'</td>
                                                                <td>Tzs '.number_format($deta['buyingPrice']).'/=</td>
                                                                <td>Tzs '.number_format($deta['sellingPrice']).'/=</td>
                                                                <td>Tzs '.number_format($deta['SUM(sales.discount)']).'/=</td>
                                                                <td><i class="fas fa-arrow-up text-success"></i> Tzs '.number_format($profitEarned).'/=</td>  
                                                                <td>Tzs '.number_format($deta['SUM(sales.totalAmount)']).'/=</td>                                           
                                                            </tr>
                                                            ';
                                                        }
                                        
                                                $totalAmount +=  $subTotal;        
                                                $totalProfitAmount +=   $_SESSION['totalProfitAmount'] ;        
                                                        
                                                echo '
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row-reverse bg-dark text-light p-3 rounded-bottom">
                                                        <div class="py-1 px-5 text-right">
                                                            <div class="mb-2">Sub-Total (Profit):</div>
                                                            <div class="h4 font-weight-light text-success"> <i class="fas fa-arrow-up text-success"></i> Tzs '.number_format($_SESSION['totalProfitAmount']).'/=</div>
                                                            <div class="mb-2">Sub-Total:</div>
                                                            <div class="h4 font-weight-light">Tzs '.number_format($subTotal).'/=</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';                                                        
                                                        
                                            }
                                    ?>
                                    <div class="col-lg-12 mb-5">
                                        <div class="d-flex flex-row-reverse bg-primary text-light rounded p-3">
                                            <div class="py-1 px-5 text-right">
                                                <div class="mb-2">Total Profit Amount:</div>
                                                <div class="h4 font-weight-light"><i class="fas fa-arrow-up"></i> Tzs <?php echo number_format($totalProfitAmount); ?>/=</div>
                                                <div class="mb-2">Total Amount:</div>
                                                <div class="h4 font-weight-light">Tzs <?php echo number_format($totalAmount); ?>/=</div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
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
