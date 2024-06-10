<?php
include 'public/view/login_components/header.php';
require_once 'includes/config.session.inc.php';
require_once 'includes/login_view.inc.php';
require_once 'includes/authenticate.inc.php';

redirectUser();
?>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="public/images/logos/san_lorenzo_logo.svg" width="100" alt="SeQRity Logo" />
                                </a>
                                <!-- <p class="text-center">Your SeQRity Gate Friend</p> -->
                                <h2 class="text-center mt-1">
                                    <?php
                                    if (isset($_SESSION['selected_user'])) {
                                        echo $_SESSION['selected_user'] . " Login";
                                    } else {
                                        echo "Login";
                                    }
                                    ?>
                                </h2>
                                <form id="loginForm" action="includes/login.inc.php" method="post" novalidate>
                                    <div class="row mb-3">

                                        <div class="col">
                                            <label for="email" class="form-label">E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" maxlength="50">
                                            <div class="invalid-feedback">Please enter a valid email address.</div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="password-container">
                                                <input type="password" class="form-control" id="password" name="password" maxlength="50" required>
                                                <div class="invalid-feedback">Please enter your password.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <a class="text-primary fw-bold" href="../index.php">Select User</a>
                                                <a class="text-primary fw-bold" href="forgot_password.php">Forgot Password ?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary w-100 fs-4 rounded-2 p-3 mb-2">Log In</button>
                                            <?php
                                            check_reset_password();
                                            check_login_errors();
                                            ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Remove the alert after 2 seconds
    </script>
    <script src="public/js/login.js"></script>
    <script src="public/libs/jquery/dist/jquery.min.js"></script>
    <script src="public/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>