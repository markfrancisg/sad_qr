<?php
include 'public/view/login_components/header.php';
require_once 'includes/config.session.inc.php';
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
                                    <img src="public/images/logos/san_lorenzo_logo.svg" width="150" alt="SeQRity Logo" />
                                </a>
                                <!-- <p class="text-center">Your SeQRity Gate Friend</p> -->
                                <h3 class="text-center mt-1">Hi, User!</h3>
                                <h5 class="text-center">Please click or tap your destination</h5>
                                <div class="mt-4 mb-3">
                                    <a href="/includes/select_user.inc.php?type=admin"> <button type="button" class="btn btn-primary btn-lg w-100 p-3">
                                            <i class="ti ti-user"></i> Admin
                                        </button></a>
                                </div>
                                <div class="mb-4">
                                    <a href="/includes/select_user.inc.php?type=guard"><button type="button" class="btn btn-primary btn-lg w-100 p-3">
                                            <i class="ti ti-shield"></i> Guard
                                        </button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="public/libs/jquery/dist/jquery.min.js"></script>
    <script src="public/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>