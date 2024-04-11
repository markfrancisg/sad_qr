<?php
include_once 'header.php';
include_once '../../../includes/admin/create_account_view.inc.php';
require_once '../../../includes/Admin_model.inc.php';
require_once '../../../includes/dbh.inc.php';

$results = get_user_list($pdo);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Account</h1>
    </div>

    <!-- Content Row -->

    <div class="row col-12">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card mb-8">
                <!-- Card Body -->
                <div class="card-body">
                    <form class="user" method="post" action="../../../includes/admin/create_account.inc.php">
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="first_name" name="first_name" placeholder="First Name">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="last_name" name="last_name" placeholder="Last Name">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <select class="form-control " id="dropdownMenu" name="role_description">
                                    <option value="">Select an option...</option>
                                    <option value="guard">Guard</option>
                                    <option value="homeowner">Homeowner</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
                            </div>

                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="number" name="number" placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 mb-6 mb-sm-0">
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" value="1234567890" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center"> <!-- Center the button horizontally within its parent container -->
                            <button class="btn btn-primary btn-user col-sm-3 mb-2 mb-sm-0">
                                Create
                            </button>
                        </div>
                    </form>
                    <?php check_create_account_errors() ?>
                </div>
            </div>
        </div>
    </div>


    <div class="d-sm-flex align-items-center justify-content-between mt-4">
        <h1 class="h3 mb-0 text-gray-800">Account List</h1>
    </div>


    <div class="row col-12">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card mb-8">
                <div class="card-body">
                    <div class="table-responsive">
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
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Email Address</th>
                                    <th>Phone Number</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                foreach ($results as $row) {
                                    $name = $row['name'];
                                    $email = $row['role_description'];
                                    $role_description = $row['email'];
                                    $number = $row['number'];
                                ?>
                                    <tr>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $role_description; ?></td>
                                        <td><?php echo $number; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-circle btn-sm delete-btn" data-toggle="modal" data-target="#deleteModal" data-email="<?php echo $row['email']; ?>">
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
                <a class="btn btn-primary" id="delete-link" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>






<?php
include_once 'admin_js.php';
include_once 'footer.php';
?>