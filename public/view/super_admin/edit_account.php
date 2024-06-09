<?php
include_once '../../../includes/dbh.inc.php';
include_once '../../../includes/SuperAdmin_model.inc.php';
include_once '../../../includes/EditAccountController.php';
include_once '../../../includes/super_admin/create_account_view.inc.php';
include_once 'header.php';


// var_dump($result);
?>


<!--  Header End -->
<div class="container-fluid">
    <div class="container-fluid">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="account_list.php">Account List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Account</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">

                <h2 class="fw-semibold mb-4 text-center">Edit Account</h2>

                <div class="container">
                    <form method="post" action="../../../includes/super_admin/edit_account.inc.php" id="createAccountForm" class="needs-validation" novalidate>

                        <div class="row">
                            <div class="col-12 col-md-12">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="name@example.com" value="<?php echo $first_name ?>" maxlength="30" required>
                                    <label for="floatingInput1">First Name</label>
                                    <div class="invalid-feedback">First name is required</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="name@example.com" value="<?php echo $last_name ?>" maxlength="30" required>
                                    <label for="floatingInput2">Last Name</label>
                                    <div class="invalid-feedback">Last name is required</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <select class="form-select form-select-md  rounded-1 p-3" name="role_description" id="role_description" aria-label="Role" required>
                                    <option value="" disabled <?php echo empty($role_description) ? 'selected' : ''; ?>>Role</option>
                                    <option value="admin" <?php echo ($role_description == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                    <option value="guard" <?php echo ($role_description == 'guard') ? 'selected' : ''; ?>>Guard</option>
                                </select>
                                <div class="invalid-feedback">Role is required</div>
                                <div class="mb-3"></div>
                                <!-- just an additional space so the fields would be aligned -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="account_email" value="<?php echo $email ?>" placeholder="name@example.com" maxlength="50" required>
                                    <label for="floatingInput1">Email Address</label>
                                    <div class="invalid-feedback" id="emailFeedback">Email is required</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="number" name="account_number" value="<?php echo $number ?>" placeholder="Phone Number" maxlength="11" required>
                                    <label for="number">Phone Number</label>
                                    <div class="invalid-feedback" id="numberFeedback">Phone number is required</div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-floating mb-2">
                                    <input type="password" class="form-control" id="floatingInput1" placeholder="name@example.com" value="12345678" readonly>
                                    <label for="floatingInput1">Password</label>
                                </div>
                                <i><small class="form-text text-muted"><b>Note:</b> Password is auto-generated by the system</small></i>
                            </div>
                        </div> -->

                        <input type="hidden" id="old_email" name="old_email" value="<?php echo $old_email ?>">

                        <div class="row mt-3">
                            <div class="col-12 col-md-6 offset-md-3 d-flex justify-content-center">
                                <button class="btn btn-primary p-3 w-50 mb-2">Edit</button>
                            </div>
                            <div class="col-12">
                                <?php
                                check_create_account_errors();
                                ?>
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
include_once 'footer.php';
?>