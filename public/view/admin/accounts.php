<?php
include_once 'header.php';
include_once '../../../includes/admin/create_account_view.inc.php';
require_once '../../../includes/dbh.inc.php';
require_once '../../../includes/Admin_model.inc.php';

$results = get_user_list($pdo);
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

                    <form class="user" method="post" action="../../../includes/admin/create_account.inc.php" id="createAccountForm">
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


    <div class="row mt-4">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card shadow mb-8 smallscreen-card">
                <div class="d-sm-flex align-items-center justify-content-between ml-4 mt-4">
                    <h6 class="h3 text-gray-800 smallscreen-h6-text">Account List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive mx-auto d-block">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Email Address</th>
                                    <th>Phone Number</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($results as $row) {
                                    if ($_SESSION["account_email"] === $row['account_email']) {
                                        continue;
                                    }
                                    $first_name = $row['account_first_name'];
                                    $last_name = $row['account_last_name'];
                                    $email = $row['role_description'];
                                    $role_description = $row['account_email'];
                                    $number = $row['account_number'];
                                ?>
                                    <tr>
                                        <td><?php echo $first_name . " " . $last_name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $role_description; ?></td>
                                        <td><?php echo $number; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-circle btn-sm delete-btn" data-toggle="modal" data-target="#deleteModal" data-email="<?php echo $row['account_email']; ?>">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>



</div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Proceed to Delete User Account?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Delete" below if you are sure.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn modal-delete-color" id="delete-link" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>



<script src="../../js/create_account.js"></script>

<?php
// include_once 'admin_js.php';
include_once 'footer.php';
?>