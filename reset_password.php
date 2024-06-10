<?php
include 'public/view/login_components/header.php';
?>
<style>
    .password-container {
        position: relative;
        width: 100%;
    }

    .password-toggle {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }
</style>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#" class="text-nowrap logo-img text-center d-block py-0 w-100">
                                    <img src="public/images/logos/san_lorenzo_logo.svg" width="70" alt="SeQRity Logo" />
                                </a>
                                <!-- <p class="text-center">Your SeQRity Gate Friend</p> -->
                                <h2 class="text-center mt-1">Reset Password</h2>
                                <form id="resetPasswordForm" action="/includes/reset_password_new.inc.php" method="post" novalidate>

                                    <div class="row">
                                        <div class="col">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="text-warning fw-bold" id="first_requirement">At least 8 characters long</p>
                                                <p class="text-warning fw-bold" id="second_requirement">At least 1 uppercase letter</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="text-warning fw-bold" id="third_requirement">At least 1 lowercase letter</p>
                                                <p class="text-warning fw-bold" id="fourth_requirement">At least 1 number</p>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="email" value="<?php if (isset($_GET['email'])) {
                                                                                    echo $_GET['email'];
                                                                                } ?>">

                                    <input type="hidden" name="token" value="<?php if (isset($_GET['token'])) {
                                                                                    echo $_GET['token'];
                                                                                } ?>">

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="new_password" class="form-label">New Password</label>
                                            <div class="password-container">
                                                <input type="password" class="form-control" id="password" name="password" maxlength="50" required>
                                                <div class="invalid-feedback">Please enter your new password.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <label for="confirm_password" class="form-label">Confirm Password</label>
                                            <div class="password-container">
                                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" maxlength="50" disabled required>
                                                <div class="invalid-feedback">Passwords do not match</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3 mb-3">
                                        <div class="col">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="showPassword">
                                                    <label class="form-check-label" for="showPassword">Show Password</label>
                                                </div>
                                                <div> <a class="text-primary fw-bold" href="login.php">Back to Login</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary w-100 fs-4 rounded-2 p-3">Reset Password</button>
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
    <script src="public/js/reset_password.js"></script>
    <script src="public/libs/jquery/dist/jquery.min.js"></script>
    <script src="public/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>