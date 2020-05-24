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

    .form-signin {
        width: 100%;
        max-width: 330px;
        margin: 0 auto;
    }

    .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }

    .form-signin .form-control:focus {
        z-index: 2;
    }

    .login-form {
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
            <div class="col login-form">
                <form class="form-signin" method="post" action="login">
                    <?php
        $name = "";
    
        if(isset($_POST['login'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
            $result = mysqli_query($db, $query);

            if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);

                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                header("Location: point-of-sale");
            }
            else {
                $name = $username;

                echo "<script>
                swal.fire({
                    icon: 'error',
                    title: 'Sorry!',
                    text: 'Incorrect password!',
                    timer: 3000,
                    button: false
                    });
                    </script>";
        }
}
        
        ?>
                    <img class="logo mb-4" src="<?php echo BASE_URL;?>/images/logo/alpha-logo-vertical.png" alt="alpha stationery logo" width="250px" height="">
                    <label for="inputUsername" class="sr-only">Email address</label>
                    <input type="text" id="inputUsername" class="form-control mb-2" name="username" placeholder="Username" value="<?php echo $name;?>" autofocus required>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control mb-2" name="password" placeholder="Password" required>
                    <input role="button" class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Login" />
                </form>
            </div>
        </div>
    </div>

    <?php include 'includes/scripts.php';?>
</body>

</html>
