<?php
include_once 'header.php';
include_once '../../../includes/super_admin/create_account_view.inc.php';

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="d-block d-sm-none">
            <h3 class="h3 fw-b smallscreen-h3">Accounts</h3>
        </div>
    </div>

    <div class="row">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card shadow mb-8 smallscreen-card">
                <div class="d-sm-flex align-items-center justify-content-between ml-4 mt-4">
                    <h6 class="h3 text-gray-800 smallscreen-h6-text">Create Account</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php
                    check_create_account_errors();
                    account_creation_success();
                    ?>

                    <form class="user" method="post" action="../../../includes/super_admin/create_account.inc.php" id="createAccountForm">
                        <div class="row">
                            <!-- just change the mb to change the gap between fields vertically -->
                            <div class="col-sm-4 mb-3">
                                <input type="text" class="form-control form-control-user form-control-color" id="first_name" name="first_name" placeholder="First Name" required>
                                <div class="error-container"> <span class="error"></span></div>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <input type="text" class="form-control form-control-user form-control-color" id="last_name" name="last_name" placeholder="Last Name" required>
                                <div class="error-container"> <span class="error"></span></div>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <select class="form-control form-control-drop-down form-control-color" id="dropdownMenu" name="role_description" required>
                                    <option value="" disabled selected>Select a role</option>
                                    <option value="admin">Admin</option>
                                    <option value="guard">Guard</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <input type="email" class="form-control form-control-user form-control-color" id="email" name="account_email" placeholder="Email Address" required>
                                <div class="error-container"> <span class="error"></span></div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <input type="text" class="form-control form-control-user form-control-color" id="number" name="account_number" placeholder="Phone Number" required>
                                <div class="error-container"> <span class="error"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <input type="password" class="form-control form-control-user form-control-color" id="password" name="password" placeholder="Password" value="1234567890" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button class="btn custom-btn btn-user col-sm-3">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>






</div>

<script src="../../js/create_account.js"></script>

<?php
// include_once 'admin_js.php';
include_once 'footer.php';
?>