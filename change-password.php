<!DOCTYPE html>
<html lang="en">

<?php 
    include 'includes/head.php';
    include 'db/dbConfig.php';
    if(isset($_SESSION['username'])) {
?>

<body id="page-top">

    <?php
    $name = "";
    $getUser = "SELECT * FROM user WHERE id = '".$_SESSION['id']."'";
    $getUserQuery = mysqli_query($db, $getUser);
    
    while($row = mysqli_fetch_array($getUserQuery)) {
        $name = $row['username'];
        $pwd = $row['password'];
    }
    
    if(isset($_POST['update'])) {
        $username = $_POST['username'];
        $currentPassword = $_POST['password'];
        $newPassword = $_POST['newPassword'];
        $newPassword2 = $_POST['newPassword-2'];
        
        if ($currentPassword != $pwd) {
            echo "<script>
                swal.fire({
                    icon: 'error',
                    title: 'Sorry!',
                    text: 'Incorrect password!',
                    button: true
                    });
                    </script>";
            }
        elseif ($newPassword != $newPassword2) {
            echo "<script>
                swal.fire({
                    icon: 'error',
                    title: 'Sorry!',
                    text: 'The two passwords do not match!',
                    button: true
                    });
                    </script>";
        }
        elseif ($newPassword == $newPassword2 && $newPassword == $currentPassword) {
            echo "<script>
                swal.fire({
                    icon: 'error',
                    title: 'Sorry!',
                    text: 'Your new password can not be your old password!',
                    button: true
                    });
                    </script>";
        }
        elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $newPassword)) {
            echo '<script>
                Swal.fire({
                          title: "Error!",
                          text: "Your password does not meet the requirements.",
                          icon: "error",
                          showCancelButton: true,
                          cancelButtonText: "Ok",
                          confirmButtonColor: "#3085d6",
                          cancelButtonColor: "#ccc",
                          confirmButtonText: "Requirements"
                        }).then((result) => {
                          if (result.value) {
                            Swal.fire(
                              "Requirements:",
                              "- Must contain at least <b>1 number and 1 letter</b>. <br> - Must contain any of these characters: <b>!@#$%</b> <br>- Must be <b>more than 8 characters.</b>",
                              
                            )
                          }
                        });
                    </script>';
        }
        else {
            $updateUser = "UPDATE user SET username = '$username', password = '$newPassword'";
            $updateUserQuery = mysqli_query($db, $updateUser);
            
            echo "<script>
                swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Your information is updated successfully!',
                    timer: 2000,
                    button: false
                    });
                    </script>";
            
            if(!$updateUserQuery) {
            echo die(mysqli_error($db));
            }
        }
        
        
        
        
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
                    <div class="text-center mb-4">
                        <h1 class="h3 mb-0  text-gray-800">Change Password</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 offset-lg-4">
                            <form method="post" action="change-password">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="text">Username</label>
                                        <input type="text" class="form-control" id="text" name="username" value="<?php echo $name;?>" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="password">Current Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="newPassword">New Password</label>
                                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                                        <p class="text-xs my-0"><span class="text-danger">*</span> Must contain at least one number, one letter, any of these characters - (!@#$%) and more than 8 characters long.</p>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="newPassword-2">Retype New Password</label>
                                        <input type="password" class="form-control" id="newPassword-2" name="newPassword-2" required>
                                    </div>
                                </div>
                                <input type="submit" role="button" class="btn btn-primary btn-block btn-lg mb-3" value="Update" name="update">
                            </form>
                        </div>
                    </div>
                </div>
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
