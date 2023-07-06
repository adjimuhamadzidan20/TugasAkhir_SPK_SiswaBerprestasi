<?php
    session_start();  

    // // cegah masuk ke dashboard (index)
    if (isset($_SESSION['login'])) {
        header('Location: index.php');
        exit;
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
    <link rel="icon" type="image/x-icon" href="assets/img/SMKN9_Bekasi.ico">

    <title>SPK Siswa Berprestasi - Login</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style type="text/css">
        .container {
            margin-top: 86px;
        }
        
        .btn-success {
            background-color: #018ED6;
            border-color: #018ED6;
        }

        .btn-success:hover {
            background-color: #0080C2;
            border-color: #0080C2;
        }

    </style>

</head>

<body class="bg-gradient-white">

    <div class="container">
        <h4 class="text-dark text-center mb-2 text-uppercase">SPK Penentuan Siswa Berprestasi</h4>

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-12 col-md-8 col-lg-6 col-xl-5">

                <div class="card o-hidden border-0 shadow rounded-0">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col">
                                <div class="p-4 p-sm-5 p-md-5 p-lg-5 p-xl-5">
                                    <div class="text-center">
                                        <h1 class="h5 text-gray-800 mb-4">Admin Login</h1>
                                        <!-- <img src="assets/img/SMKN9_Bekasi.png" alt="" class="img-profile w-25"> -->
                                    </div>

                                    <?php 
                                        if (isset($_SESSION['status'])) {
                                            echo '<div class="alert alert-danger rounded-0 small" role="alert">'
                                                    . $_SESSION['status'] .
                                                  '</div>';
                                            unset($_SESSION['status']);
                                        }  
                                    ?>

                                    <form class="user" method="post" action="config/proses_login.php">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user rounded-0"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username" name="username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user rounded-0"
                                                id="exampleInputPassword" placeholder="Password" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block rounded-0" name="masuk">
                                            <i class="fas fa-sign-in-alt fa-fw"></i> Masuk
                                        </button>
                                        <hr>
                                       <!--  <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <!-- <hr> -->
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>