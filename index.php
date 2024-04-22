<?php
require_once 'includes/config.session.inc.php';
require_once 'includes/login_view.inc.php';
require_once 'includes/authenticate.inc.php';

redirectUser();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>User Login</title>
    <link rel="icon" type="image/png" href="entrance_pic.jpg">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom styles for this template-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="public/css/style.css" rel="stylesheet" />

</head>

<body style="background-image: url('/entrance_pic.jpg')">

    <!-- <div class="spinner-wrapper">
        <div class="spinner-border text-success" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div> -->

    <div class="overlay"></div>
    <div class="container vh-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-8 col-lg-6">

                <form class="card p-4" action="includes/login.inc.php" id="loginForm" method="post">
                    <h3 class="card-title text-center mb-3">LOG IN</h3>
                    <div class="form-group input-field pt-1 m-2 input-login-form-group-height">
                        <input type="text" class="form-control gray-background" id="email" name="email" placeholder="Enter Email" required />
                        <span id="" class="error"></span>
                    </div>
                    <div class="form-group input-field pt-1 m-2 input-login-form-group-height">
                        <div class="password-wrapper">
                            <input type="password" class="form-control gray-background" id="password" name="password" placeholder="Enter Password" required />
                            <i class="toggle-password login-password-icon fas fa-eye-slash"></i>
                            <span id="" class="error"></span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end pt-1 m-2" id="forgotPasswordLink">
                        <a href="public/view/reset_password.php" class="forgot-password-link">Forgot your password?</a>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button id="loginButton" type="submit" class="btn mt-3 custom-button">
                            Log in
                        </button>
                    </div>
                    <!-- The library should be loaded first before using Sweetalert -->
                    <?php
                    check_login_errors();
                    check_reset_password();
                    ?>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="public/js/login.js"></script>

</body>

</html>