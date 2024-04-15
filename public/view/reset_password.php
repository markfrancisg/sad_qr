<?php
require_once '../../includes/config.session.inc.php';
require_once '../../includes/authenticate.inc.php';
require_once '../../includes/reset_password_view.inc.php';

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

    <title>Forgot Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
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

                <form class="card p-4" action="../../includes/reset_password.inc.php" method="post">
                    <h3 class="card-title text-center mb-3">Reset Password</h3>
                    <div class="form-group input-field pt-1 m-2">
                        <label for="email" class="form-label"></label>
                        <input type="text" class="form-control gray-background" id="email" name="account_email" placeholder="Enter Email" />
                    </div>

                    <div class="d-flex justify-content-end pt-1 m-2">
                        <a href="../../index.php" class="forgot-password-link">Back</a>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn mt-3 custom-button">
                            Send Email Verification
                        </button>
                    </div>
                    <?php
                    check_reset_password_errors();
                    ?>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
</body>

</html>