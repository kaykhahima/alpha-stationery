<!DOCTYPE html>
<html lang="en">

<?php 
    include 'includes/head.php';
    include 'db/dbConfig.php'
?>
<style>
    body {
        height: 100vh;
    }
    .error-section {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 0 !important;
    }
</style>

<body class="text-center">
    <div class="container">
        <div class="row">
            <div class="col error-section">
                    <h1 class="text-danger"><strong>Error 404!</strong></h1>
                    <h3 class="my-3">Sorry! You are not authorized to view this page.</h3>
                    <h5>Please <a href="login">click here to login.</a></h5>
            </div>
        </div>
    </div>

    <?php include 'includes/scripts.php';?>
</body>

</html>