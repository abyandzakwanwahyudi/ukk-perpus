<?php
    session_start();
    include "../connect.php";

    if (isset($_POST['registrasi'])) {
        $NamaLengkap = $_POST['NamaLengkap'];
        $Username = $_POST['Username'];
        $Role = $_POST['Role'];
        $Email = $_POST['Email'];
        $Alamat = $_POST['Alamat'];
        $Password = $_POST['Password'];

        if ($Username == "") {
            $error_message_fill = "Data belum terisi.";
        } else {
            $query = mysqli_query($connect, "INSERT INTO user(NamaLengkap, Username, Role, Email, Alamat, Password) values('$NamaLengkap', '$Username', '$Role', '$Email', '$Alamat', '$Password')");
    
            if ($query) {
                $success_message = "Selamat! Registrasi berhasil.";
                header("refresh:2;url=login.php");
            } else {
                $error_message = "Error Registrasi gagal.";
            }
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
    <title>Sign-Up</title>
    <link rel="icon" href="../assets/images/logo-icon.png">
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
    <style>
        /* Style for select */
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            color: black;
        }
        select option {
            background-color: white;
            color: black;
        }
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

    <div class="card card-authentication1 mx-auto my-4">
        <div class="card-body">
            <div class="card-content p-2">
                <!-- Notification area -->
                <div class="notification-area">
                    <?php if(isset($error_message)): ?>
                        <p class="text-light mb-0 error-message"><?php echo $error_message; ?></p>
                    <?php endif; ?>
                    <?php if(isset($success_message)): ?>
                        <p class="text-light mb-0 success-message"><?php echo $success_message; ?></p>
                    <?php endif; ?>
                </div>
                <div class="text-center">
                    <img src="../assets/images/logo-icon.png" alt="logo icon">
                </div>
                <div class="card-title text-uppercase text-center py-3">Sign Up</div>
                <form method="post">
                    <div class="form-group">
                        <label for="exampleInputName" class="sr-only">Nama Lengkap</label>
                        <div class="position-relative has-icon-right">
                            <input type="text" class="form-control input-shadow" placeholder="Enter Your Full Name" name="NamaLengkap" required>
                            <div class="form-control-position">
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="sr-only">Username</label>
                        <div class="position-relative has-icon-right">
                            <input type="text" class="form-control input-shadow" placeholder="Enter Your Username" name="Username" required>
                            <div class="form-control-position">
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="Role">
                            <option name='admin'>admin</option>
                            <option name='user'>user</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="sr-only">Email ID</label>
                        <div class="position-relative has-icon-right">
                            <input type="email" name="Email" class="form-control input-shadow" placeholder="Enter Your Email ID" required>
                            <div class="form-control-position">
                                <i class="icon-envelope-open"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only">Alamat</label>
                        <div class="position-relative has-icon-right">
                            <input type="text" name="Alamat" class="form-control input-shadow" placeholder="Enter Your Alamat" required>
                            <div class="form-control-position">
                                <i class="zmdi zmdi-home"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword" class="sr-only">Password</label>
                        <div class="position-relative has-icon-right">
                            <input type="password" id="exampleInputPassword" class="form-control input-shadow" placeholder="Choose Password" name="Password" required>
                            <div class="form-control-position">
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="registrasi" class="btn btn-light btn-block waves-effect waves-light">Sign Up</button>

                    <div class="card-footer text-center py-3">
                        <p class="text-warning mb-0">Already have an account? <a href="login.php"> Sign In here</a></p>
                    </div>
                </form>
            </div>
        </div>

        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

    </div><!--wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- sidebar-menu js -->
    <script src="../assets/js/sidebar-menu.js"></script>

    <!-- Custom scripts -->
    <script src="../assets/js/app-script.js"></script>

</body>
</html>
