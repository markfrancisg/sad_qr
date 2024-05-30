<?php
include_once 'header.php';
require_once '../../../includes/dbh.inc.php';
require_once '../../../includes/SuperAdmin_model.inc.php';

$results = get_user_list($pdo);

?>


<!--  Header End -->
<div class="container-fluid">
    <div class="container-fluid">

        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Account List</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <h2 class="fw-semibold mb-4">Account List</h2>

                <!-- SEARCH BAR -->
                <div class="row mb-3">
                    <div class="d-flex justify-content-end">
                        <div class="col-sm-3 col-md-4">
                            <input class="form-control me-2" type="text" id="searchInput" placeholder="Search here" aria-label="Search">
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle" id="dataTable">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0">Role</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0">Email Address</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0">Phone Number</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0">Account Status</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0">Delete</h6>
                                    </th>
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
                                    $email = $row['account_email'];
                                    $role_description = $row['role_description'];
                                    $number = $row['account_number'];
                                    $status = $row['verification_status'];
                                ?>
                                    <tr>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0"><?php echo $first_name . " " . $last_name; ?></h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0"><?php echo $email; ?></h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0"><?php echo $role_description; ?></h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0"><?php echo $number; ?></h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <div class="d-flex align-items-center gap-2">
                                                <?php
                                                if ($status == 1) {
                                                    echo '<span class="badge bg-primary rounded-3 fw-semibold w-100">Verified</span>';
                                                } else {
                                                    echo '<span class="badge bg-warning rounded-3 fw-semibold w-100">Unverified</span>';
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <a href="#" class="btn btn-light btn-circle btn-sm delete-btn" data-toggle="modal" data-target="#deleteModal" data-email="<?php echo $row['account_email']; ?>">
                                                <i class="fas fa-trash fa-trash-dark"></i>
                                            </a>
                                        </td>

                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- PAGINATION -->
                    <div class="mt-5">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>




                </div>
            </div>
        </div>
    </div>


    <!-- MODALS -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" id="delete-link" href="#">Delete</a>
                </div>
            </div>
        </div>
    </div>


    <script src="../../js/account_list.js"></script>

    <?php
    include_once 'footer.php';
    ?>