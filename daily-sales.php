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
                                        <a class="nav-link active" href="<?php echo BASE_URL;?>/daily-sales">Daily</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo BASE_URL;?>/monthly-sales">Monthly</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo BASE_URL;?>/yearly-sales">Yearly</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Row -->

                    <?php
                        $fetchSalesSql = "SELECT products.productID, products.productName, sales.id, sales.quantitySold, sales.priceEach, sales.discount, sales.totalAmount FROM products INNER JOIN sales ON products.productID=sales.productID WHERE sales.dateAdded = '$todayDate'";
                        $fetchSalesQuery = mysqli_query($db, $fetchSalesSql);

                        $_SESSION['totalAmountToday'] = 0;

                        if(mysqli_num_rows($fetchSalesQuery) == 0) {
                        echo '<div class="text-center p-2">
                                    <img src="'.BASE_URL.'/images/cover/cart.png" class="text-center" width="30%">
                                    <h5 class="my-4">You have not made any sales today yet!</h5>
                                    <a href="'.BASE_URL.'/point-of-sale" class="btn btn-primary">Go to Point-of-sale  <i class="fa fa-arrow-right"></i></a>
                                </div>';  
                        }
                        else {
        
                    
                    ?>

                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="daily">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 py-3">
                                        <span class="h3">Daily sales</span>
                                        <!--                                        <button type="button" class="btn btn-outline-primary float-right ml-1" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2"><i class="fa fa-expand"></i> Group</button>-->
                                    </div>
                                    <div class="col-lg-12 text-primary text-uppercase">
                                        <p><strong>Today: </strong><?php echo $todayDate;?></p>
                                    </div>

                                    <div class="col-lg-12" id="">
                                        <!--                                        <p class="small">Expanded</p>-->
                                        <div class="card mb-5">
                                            <div class="card-body p-0">
                                                <div class="row p-5">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover" id="dataTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Name</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity sold</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Price each</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Discount</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                    
                                                    while($row = mysqli_fetch_array($fetchSalesQuery)) { 

                                                    $_SESSION['totalAmountToday'] += $row['totalAmount'];

                                                    echo '<tr>
                                                    <td>'.$row['productName'].'</td>
                                                    <td>'.$row['quantitySold'].'</td>
                                                    <td>Tzs '.number_format($row['priceEach']).'/=</td>
                                                    <td>Tzs '.number_format($row['discount']).'/=</td>
                                                    <td>Tzs '.number_format($row['totalAmount']).'/=</td>
                                                    <td>
                                                    <a href="edit-sales?id='.$row['id'].'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-edit"></i></a>
                                                    </td>
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
                                                        <div class="mb-2">Total amount</div>
                                                        <div class="h2 font-weight-light">Tzs <?php echo number_format($_SESSION['totalAmountToday']); ?>/=</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>

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
