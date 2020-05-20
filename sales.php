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
                                        <a class="nav-link active" href="#daily" data-toggle="tab">Daily</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#monthly" data-toggle="tab">Monthly</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#yearly" data-toggle="tab">Yearly</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Row -->
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="daily">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 py-3">
                                        <span class="h3">Daily sales</span>
                                        <button type="button" class="btn btn-outline-primary float-right ml-1" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2"><i class="fa fa-expand"></i> Expand</button>
                                    </div>
                                    <div class="col-lg-12 text-primary text-uppercase">
                                        <p><strong>Today: </strong><?php echo $todayDate;?></p>
                                    </div>
                                    
                                    <div class="col-lg-12 collapse" id="multiCollapseExample2">
                                       <p class="small">Expanded</p>
                                        <div class="card mb-5">
                                            <div class="card-body p-0">
                                                <div class="row p-5">
                                                    <div class="col-md-12">
                                                        <table class="table" id="dataTable">
                                                            <thead>
                                                                <tr>
                                                                    <th class="border-0 text-uppercase small font-weight-bold">Product ID</th>
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
                                                    $fetchSalesSql = "SELECT products.productID, products.productName, sales.id, sales.quantitySold, sales.priceEach, sales.discount, sales.totalAmount FROM products INNER JOIN sales ON products.productID=sales.productID WHERE sales.dateAdded = '$todayDate'";
                                                    $fetchSalesQuery = mysqli_query($db, $fetchSalesSql);

                                                    $_SESSION['totalAmountToday'] = 0;

                                                    if(mysqli_num_rows($fetchSalesQuery) == 0) {
                                                    echo '<caption class="text-center">-&times;-</caption>';
                                                    }
                                                    else {
                                                    while($row = mysqli_fetch_array($fetchSalesQuery)) { 

                                                    $_SESSION['totalAmountToday'] += $row['totalAmount'];

                                                    echo '<tr>
                                                    <td><a href="edit-sales?id='.$row['id'].'">ASP-'.$row['productID'].'</a></td>
                                                    <td>'.$row['productName'].'</td>
                                                    <td>'.$row['quantitySold'].'</td>
                                                    <td>Tzs '.number_format($row['priceEach']).'/=</td>
                                                    <td>Tzs '.number_format($row['discount']).'/=</td>
                                                    <td>Tzs '.number_format($row['totalAmount']).'/=</td>
                                                    <td>
                                                    <a href="edit-sales?id='.$row['id'].'" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a href="sales?delete-id='.$row['id'].'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
                                                        <div class="mb-2">Total amount</div>
                                                        <div class="h2 font-weight-light">Tzs <?php echo number_format($_SESSION['totalAmountToday']); ?>/=</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                       
                                        <p class="small">Grouped</p>
                                        <div class="card mb-5">
                                            <div class="card-body p-0">
                                                <div class="row p-5">
                                                    <div class="col-md-12">
                                                        <table class="table" id="">
                                                            <thead>
                                                                <tr>
                                                                    <th class="border-0 text-uppercase small font-weight-bold">Product ID</th>
                                                                    <th class="border-0 text-uppercase small font-weight-bold">Name</th>
                                                                    <th class="border-0 text-uppercase small font-weight-bold">Quantity sold</th>
                                                                    <th class="border-0 text-uppercase small font-weight-bold">Price each</th>
                                                                    <th class="border-0 text-uppercase small font-weight-bold">Discount</th>
                                                                    <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                       <?php
                                            $fetchSalesSql = "SELECT products.productName, products.sellingPrice, sales.productID,  SUM(sales.quantitySold), SUM(sales.discount), SUM(sales.totalAmount) FROM products INNER JOIN sales ON products.productID=sales.productID WHERE dateAdded = '$todayDate' GROUP BY productID";
                                            $fetchSalesQuery = mysqli_query($db, $fetchSalesSql);
                                            
                                            $_SESSION['totalAmountToday'] = 0;

                                            if(mysqli_num_rows($fetchSalesQuery) == 0) {
                                                echo '<caption class="text-center">-&times;-</caption>';
                                            }
                                            else {
                                                while($row = mysqli_fetch_array($fetchSalesQuery)) { 
                                                
                                                $_SESSION['totalAmountToday'] += $row['SUM(sales.totalAmount)'];
                                                    
                                                echo '<tr>
                                                        <td>ASP-'.$row['productID'].'</td>
                                                        <td>'.$row['productName'].'</td>
                                                        <td>'.$row['SUM(sales.quantitySold)'].'</td>
                                                        <td>Tzs '.number_format($row['sellingPrice']).'/=</td>
                                                        <td>Tzs '.number_format($row['SUM(sales.discount)']).'/=</td>
                                                        <td>Tzs '.number_format($row['SUM(sales.totalAmount)']).'/=</td>
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
                        <div class="tab-pane" role="tabpanel" id="monthly">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 pt-3 pb-0">
                                        <span class="h3">Monthly sales</span>
                                        <form class="form-inline float-right" method="post" action="sales">
                                            <div class="form-group mx-sm-3 mb-2">
                                                <label for="filter" class="sr-only">Filter</label>
                                                <input type="text" class="form-control datetimepicker-input" id="datetimepicker1" data-toggle="datetimepicker" data-target="#datetimepicker1" name="date" placeholder="Date" >
                                            </div>
                                            <input type="submit" class="btn btn-outline-primary mb-2" name="dateFilter" value="Filter">
                                            
                                            <?php
                                            $defaultFilter = "";
                                            
                                            if(isset($_POST['dateFilter'])) {
                                                $filteredDate = $_POST['date'];
                                                $defaultFilter = 'AND dateAdded = "'.$filteredDate.'"';
                                            }
                                            
                                            ?>
                                            
                                        </form>
                                        <p class="my-3 text-primary text-uppercase"><strong>Month: </strong><?php echo $todayMonth?></p>
                                    </div>
                                    <?php
                                                    
                                    $fetchMonthlySalesSql = "SELECT DISTINCT(dateAdded) FROM sales WHERE month(STR_TO_DATE(dateAdded,'%d/%m/%Y')) = '$currentMonth' $defaultFilter";
                                    $fetchMonthlySalesQuery = mysqli_query($db, $fetchMonthlySalesSql);
                                            
                                            if(mysqli_num_rows($fetchMonthlySalesQuery) == 0) {
                                                echo "<script>
                                                        swal.fire({
                                                                icon: 'error',
                                                                title: 'Sorry!',
                                                                text: 'Nothing Here!',
                                                                timer: 5000,
                                                                buttons: false
                                                                });
                                                        </script>";
                                            }
                                            
                                    $totalAmount = 0;
                                                    
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
                                                            <table class="table" id="">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Product ID</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Name</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity sold</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Price/product</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Discount</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    ';
                                                    
                                                $anotherSql = "SELECT * FROM sales WHERE dateAdded = '$thisDate' ORDER BY dateTimeAdded";
                                                $anotherQuery = mysqli_query($db, $anotherSql);
                                                
                                                $subTotal = 0;                                                
                                        
                                                while($deta = mysqli_fetch_array($anotherQuery)) {
                                                    $subTotal += $deta['totalAmount'];
                                                    echo '
                                                            <tr>                                       
                                                                <td>ASP-'.$deta['productID'].'</td>
                                                                <td>'.$deta['productName'].'</td>
                                                                <td>'.$deta['quantitySold'].'</td>
                                                                <td>Tzs '.number_format($deta['priceEach']).'/=</td>
                                                                <td>Tzs '.number_format($deta['discount']).'/=</td>
                                                                <td>Tzs '.number_format($deta['totalAmount']).'/=</td>
                                                                    
                                                            </tr>
                                                            ';
                                                        }
                                        
                                                $totalAmount +=  $subTotal;        
                                                        
                                                echo '
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row-reverse bg-dark text-light p-3 rounded-bottom">
                                                        <div class="py-1 px-5 text-right">
                                                            <div class="mb-2">Sub-Total:</div>
                                                            <div class="h2 font-weight-light">Tzs '.number_format($subTotal).'/=</div>
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
                                                <div class="mb-2">Total Amount:</div>
                                                <div class="h2 font-weight-light">Tzs <?php echo number_format($totalAmount); ?>/=</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="yearly">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 py-3">
                                        <span class="h3">Yearly sales</span>
                                        <form class="form-inline float-right" method="post" action="sales">
                                            <div class="form-group mx-sm-3 mb-2">
                                                <label for="filter" class="sr-only">Filter</label>
                                                <input type="text" class="form-control datetimepicker-input" id="datetimepicker2" data-toggle="datetimepicker" data-target="#datetimepicker2" name="month" placeholder="Month">
                                            </div>
                                            <input type="submit" class="btn btn-outline-primary mb-2" value="Filter" name="monthFilter">                                            
                                            <?php
                                            $defaultMonthFilter = "";
                                            
                                            if(isset($_POST['monthFilter'])) {
                                                $filteredMonth = date('n', strtotime($_POST['month']));
                                                $defaultMonthFilter = 'AND (month(STR_TO_DATE(dateAdded,"%d/%m/%Y"))) = "'.$filteredMonth.'"';
                                            }
                                            
                                            ?>
                                            
                                        </form>
                                    </div>
                                    <div class="col-lg-12">
                                        <p><strong>Year: </strong>2020</p>
                                    </div>
                                    <?php
                                                    
                                    $fetchYearlySalesSql = "SELECT DISTINCT(month(STR_TO_DATE(dateAdded,'%d/%m/%Y'))) FROM sales WHERE year(STR_TO_DATE(dateAdded,'%d/%m/%Y')) = '$currentYear' $defaultMonthFilter";
                                    $fetchYearlySalesQuery = mysqli_query($db, $fetchYearlySalesSql);
                                            
                                            if(mysqli_num_rows($fetchYearlySalesQuery) == 0) {
                                                echo "<script>
                                                        swal.fire({
                                                                icon: 'error',
                                                                title: 'Sorry!',
                                                                text: 'Nothing Here!',
                                                                timer: 5000,
                                                                buttons: false
                                                                });
                                                        </script>";
                                            }
                                            
                                    $totalAmount = 0;
                                                    
                                    while($data = mysqli_fetch_array($fetchYearlySalesQuery)) {
                                        $thisMonth = $data["(month(STR_TO_DATE(dateAdded,'%d/%m/%Y')))"];   
                                        
                                                        
                                        echo '
                                        <div class="col-lg-12">
                                            <p><strong>Month: </strong>'.date('F', mktime(0, 0, 0, $thisMonth, 1, 2000)).'</p>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card mb-5">
                                                <div class="card-body p-0">
                                                    <div class="row px-3 pt-3 pb-0">
                                                        <div class="col-md-12">
                                                            <table class="table" id="">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Product ID</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Name</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity sold</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Price/product</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Discount</th>
                                                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    ';
                                                    
                                                $anotherSql = "SELECT * FROM sales WHERE month(STR_TO_DATE(dateAdded,'%d/%m/%Y')) = '$thisMonth' ORDER BY dateTimeAdded";
                                                $anotherQuery = mysqli_query($db, $anotherSql);
                                                
                                                $subTotal = 0;                                                
                                        
                                                while($deta = mysqli_fetch_array($anotherQuery)) {
                                                    $subTotal += $deta['totalAmount'];
                                                    echo '
                                                            <tr>                                       
                                                                <td>ASP-'.$deta['productID'].'</td>
                                                                <td>'.$deta['productName'].'</td>
                                                                <td>'.$deta['quantitySold'].'</td>
                                                                <td>Tzs '.number_format($deta['priceEach']).'/=</td>
                                                                <td>Tzs '.number_format($deta['discount']).'/=</td>
                                                                <td>Tzs '.number_format($deta['totalAmount']).'/=</td>
                                                                    
                                                            </tr>
                                                            ';
                                                        }
                                        
                                                $totalAmount +=  $subTotal;        
                                                        
                                                echo '
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row-reverse bg-dark text-light p-3 rounded-bottom">
                                                        <div class="py-1 px-5 text-right">
                                                            <div class="mb-2">Sub-Total:</div>
                                                            <div class="h2 font-weight-light">Tzs '.number_format($subTotal).'/=</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';                                                        
                                                        
                                            }
                                    ?>

                                    <div class="col-lg-12 mb-5">
                                        <div class="d-flex flex-row-reverse bg-primary text-light p-3 rounded">
                                            <div class="py-1 px-5 text-right">
                                                <div class="mb-2">Total Amount:</div>
                                                <div class="h2 font-weight-light">Tzs <?php echo number_format($totalAmount); ?>/=</div>
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
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include 'includes/scripts.php'?>

</body>

</html>
<?php } else { header("Location: 404"); } ?>