<?php
require_once '../../includes/config.session.inc.php';
// require_once '../../includes/authenticate.inc.php';
require_once '../../includes/reset_password_new_view.inc.php';

// redirectUser();

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom styles for this template-->
    <link href="../css/style.css" rel="stylesheet" />
</head>

<body style="background-image: url('../../entrance_pic.jpg')">

    <!-- <div class="spinner-wrapper">
        <div class="spinner-border text-success" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div> -->

    <div class="overlay"></div>
    <div class="container vh-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-8 col-lg-6">

                <form class="card p-4" action="../../includes/reset_password_new.inc.php" method="post">
                    <h3 class="card-title text-center mb-3">CHANGE PASSWORD</h3>

                    <input type="hidden" name="email" value="<?php if (isset($_GET['email'])) {
                                                                    echo $_GET['email'];
                                                                } ?>">

                    <input type="hidden" name="token" value="<?php if (isset($_GET['token'])) {
                                                                    echo $_GET['token'];
                                                                } ?>">

                    <div class="form-group input-field pt-1 mt-1">
                        <label for="password" class="form-label form-label-custom">Enter New Password</label>
                        <input type="password" class="form-control gray-background" id="password" name="password" placeholder="Enter New Password" />
                    </div>
                    <div class="form-group input-field pt-1 mt-2 mb-5 input-login-form-group-height">
                        <label for="confirm_password" class="form-label form-label-custom">Confirm Password</label>
                        <input type="password" class="form-control gray-background" id="confirm_password" name="confirm_password" placeholder="Confirm New Password" disabled />
                        <span id="passwordError" class="error-validation-js"></span>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn mt-3 custom-button" name="password_reset" id="changePasswordButton" disabled>
                            Change Password
                        </button>
                    </div>

                    <div class="d-flex justify-content-center pt-1 m-2">
                        <a href="reset_password.php" class="forgot-password-link">Cancel</a>
                    </div>

                    <?php
                    check_reset_password_errors();
                    ?>

                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/check_two_password.js"></script>

</body>

</html>