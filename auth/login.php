<?php
    session_start();
    include "../connect.php";

    if (isset($_POST['login'])) {
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];

        $check_user = mysqli_query($connect, "SELECT * FROM user WHERE Username='$Username' AND Password='$Password'");

        if (mysqli_num_rows($check_user) > 0) {
            $_SESSION['user'] = mysqli_fetch_array($check_user);
            $success_message = "Selamat datang! Anda berhasil login.";
            // Redirect to dashboard page after a delay
            echo "<meta http-equiv='refresh' content='2;url=../dashboard.php'>";
        } else {
            $error_message = "Login Gagal: Username atau password salah.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SignIn</title>
    <link rel="icon" href="../assets/images/logo-icon.png">
    <!-- Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- loader-->
    <link href="../assets/css/pace.min.css" rel="stylesheet">
    <script src="../assets/js/pace.min.js"></script>
    <!--favicon-->
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- animate CSS-->
    <link href="../assets/css/animate.css" rel="stylesheet" type="text/css">
    <!-- Icons CSS-->
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
    <!-- Custom Style-->
    <link href="../assets/css/app-style.css" rel="stylesheet">
    <link rel="icon" href="/assets/images/logo-icon.png">

    <style>
        .text-light {
            color: #fff !important;
        }
        .error-message {
            background-color: #dc3545;
            padding: 10px;
            color: #fff;
            border-radius: 5px;
        }
        .success-message {
            background-color: #28a745;
            padding: 10px;
            color: #fff;
            border-radius: 5px;
        }
        /* Notification area */
        .notification-area {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
    </style>
</head>

<body class="bg-theme bg-theme1">
    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">
        <div class="loader-wrapper">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <form method="post"> 
            <div class="card card-authentication1 mx-auto my-5">
                <div class="card-body">
                    <div class="card-content p-2">
                        <div class="text-center">
                            <img src="../assets/images/logo-icon.png" alt="logo icon">
                        </div>
                        <div class="card-title text-uppercase text-center py-3">Sign In</div>
                        <div class="form-group">
                            <label for="exampleInputUsername" class="sr-only">Username</label>
                            <div class="position-relative has-icon-right">
                                <input type="text" id="exampleInputUsername" class="form-control input-shadow" placeholder="Enter Username" name="Username" required>
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword" class="sr-only">Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" id="exampleInputPassword" class="form-control input-shadow" placeholder="Enter Password" name="Password" required>
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <div class="icheck-material-white">
                                    <input type="checkbox" id="user-checkbox" checked="" />
                                    <label for="user-checkbox">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group col-6 text-right">
                                <a href="">Reset Password</a>
                            </div>
                        </div>
                        <button type="submit" name="login" class="btn btn-light btn-block">Sign In</button>
                        <div class="text-center mt-3">Sign In With</div>
                        <div class="form-row mt-4">
                            <div class="form-group mb-0 col-6">
                                <button type="button" class="btn btn-light btn-block"><i class="fa fa-facebook-square"></i> Facebook</button>
                            </div>
                            <div class="form-group mb-0 col-6 text-right">
                                <button type="button" class="btn btn-light btn-block"><i class="fa fa-twitter-square"></i> Twitter</button>
                            </div>
                        </div>
                        <div class="card-footer text-center py-3">
                        <p class="text-warning mb-0">Doesnt have an account? <a href="register.php"> Sign Up here</a></p>
                      </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Notification area -->
        <div class="notification-area">
            <?php if(isset($error_message)): ?>
                <p class="text-light mb-0 error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <?php if(isset($success_message)): ?>
                <p class="text-light mb-0 success-message"><?php echo $success_message; ?></p>
            <?php endif; ?>
        </div>
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

    </div><!--wrapper-->
    
    <!-- Bootstrap core JavaScript and other scripts remain the same -->
</body>
</html>
