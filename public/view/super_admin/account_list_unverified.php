<?php
include_once 'header.php';
require_once '../../../includes/dbh.inc.php';
require_once '../../../includes/SuperAdmin_model.inc.php';
require_once '../../../includes/AccountListUnverifiedController.php';

?>


<!--  Header End -->
<div class="container-fluid">
    <div class="container-fluid">

        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="account_list.php">Account List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Unverified Account List</li>

            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <h2 class="fw-semibold mb-4 text-center" id="account_pagination">Unverified Account List</h2>

                <!-- SEARCH BAR -->
                <div class="container">
                    <div class="row mb-2 justify-content-between">
                        <div class="col-md-4 order-md-1 order-2 mb-1">
                            <nav class="navbar navbar-expand-lg">
                                <div class="container-fluid">
                                    <ul class="nav nav-pills d-flex flex-row flex-nowrap">
                                        <li class="nav-item me-2">
                                            <a class="nav-link " aria-current="page" href="account_list.php">All</a>
                                        </li>
                                        <li class="nav-item me-2">
                                            <a class="nav-link " href="account_list_verified.php">Verified</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="account_list_unverified.php">Unverified</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-4 order-md-2 order-1 mb-1">
                            <input class="form-control me-2" type="text" id="searchInput" placeholder="Search here" aria-label="Search">
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap mb-0 align-middle" id="dataTable">
                            <thead class="text-light fs-4 bg-success">
                                <tr>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-bolder text-light mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-bolder text-light mb-0">Role</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-bolder text-light mb-0">Email Address</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-bolder text-light mb-0">Phone Number</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-bolder text-light mb-0">Account Status</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-bolder text-light mb-0">Edit / Delete</h6>
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
                                            <h6 class="text-dark mb-0"><?php echo $first_name . " " . $last_name; ?></h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="text-dark mb-0"><?php echo $email; ?></h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="text-dark mb-0"><?php echo $role_description; ?></h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="text-dark mb-0"><?php echo $number; ?></h6>
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
                                            <a href="#" class="btn btn-light btn-circle btn-sm edit-btn" data-toggle="modal" data-target="#editModal" data-email="<?php echo $row['account_email']; ?>">
                                                <i class="fas fa-pencil-alt custom-edit-icon"></i>
                                            </a>
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
                    <div class="row mt-5">
                        <div class="col">
                            <div class="d-flex align-items-center justify-content-between">
                                <strong>Page <?php echo $page_no; ?> of <?php echo $total_no_of_pages; ?></strong>

                                <!-- Pagination on the right -->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination mb-0">
                                        <li class="page-item">
                                            <a class="page-link <?php echo ($page_no <= 1) ? 'disabled' : ''; ?>" <?php echo ($page_no > 1) ? 'href="?page_no=' . $previous_page . '#account_pagination"' : ''; ?>>
                                                <i class="fas fa-chevron-left"></i>
                                            </a>
                                        </li>

                                        <?php
                                        // Calculate start and end page numbers to display
                                        $start_page = max(1, $page_no - 1);
                                        $end_page = min($total_no_of_pages, $page_no + 1);

                                        for ($counter = $start_page; $counter <= $end_page; $counter++) {
                                        ?>
                                            <li class="page-item <?php echo ($page_no == $counter) ? 'active' : ''; ?>">
                                                <a class="page-link <?php echo ($page_no == $counter) ? 'bg-primary text-white' : ''; ?>" href="?page_no=<?php echo $counter; ?>#account_pagination">
                                                    <?php echo $counter; ?>
                                                </a>
                                            </li>
                                        <?php
                                        }
                                        ?>

                                        <li class="page-item">
                                            <a class="page-link <?php echo ($page_no >= $total_no_of_pages) ? 'disabled' : ''; ?>" <?php echo ($page_no < $total_no_of_pages) ? 'href="?page_no=' . $next_page . '#account_pagination"' : ''; ?>>
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>




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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Proceed to Edit User Account?</h5>
            </div>
            <div class="modal-body">
                Select "Edit" below if you are sure.
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" id="edit-link" href="#">Edit</a>
            </div>
        </div>
    </div>
</div>



<script src="../../js/account_list.js"></script>

<?php
include_once 'footer.php';
?>