<?php
include_once 'header.php';
include_once '../../../includes/super_admin/create_account_view.inc.php';

?>


<!--  Header End -->
<div class="container-fluid">
    <div class="container-fluid">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Add Account</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">

                <h2 class="fw-semibold mb-4">Create Account</h2>

                <div class="container">
                    <form method="post" action="../../../includes/super_admin/create_account.inc.php">

                        <div class="row">
                            <div class="col-12 col-md-12">
                                <?php
                                check_create_account_errors();
                                account_creation_success();
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="name@example.com" maxlength="30">
                                    <label for="floatingInput1">First Name</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="name@example.com" maxlength="30">
                                    <label for="floatingInput2">Last Name</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <select class="form-select form-select-md mb-3 rounded-1 p-3" name="role_description" aria-label=".form-select-lg example">
                                    <option disabled selected>Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="guard">Guard</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="account_email" placeholder="name@example.com" maxlength="50">
                                    <label for="floatingInput1">Email Address</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="number" name="account_number" placeholder="name@example.com" maxlength="11">
                                    <label for="floatingInput2">Phone Number</label>
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
                        <div class="row mt-3">
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary p-3 w-50 mb-2">Create</button>
                            </div>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>



    <script src="../../js/create_account.js"></script>

    <?php
    include_once 'footer.php';
    ?>