<?php
include_once 'header.php';
include_once '../../../includes/super_admin/create_account_view.inc.php';
require_once '../../../includes/dbh.inc.php';
require_once '../../../includes/SuperAdmin_model.inc.php';

$results = get_user_list($pdo);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-8 smallscreen-card">
        <div class="d-sm-flex align-items-center justify-content-between ml-4 mt-4">
            <h6 class="h3 text-gray-800 smallscreen-h6-text">Account List</h6>
        </div>

        <div class="row justify-content-end mb-2 mr-1">
            <div class="col-5 col-sm-6 col-md-4">
                <input type="text" id="searchInput" class="form-control" placeholder="Search here">
            </div>
        </div>


        <div class="card-body">
            <div class="table-responsive mx-auto d-block">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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



<script src="../../js/account_list.js"></script>

<?php
// include_once 'admin_js.php';
include_once 'footer.php';
?>