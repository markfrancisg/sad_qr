<?php
include_once 'header.php';
include_once '../../../includes/admin/homeowners_view.inc.php';
require_once '../../../includes/Homeowner_model.inc.php';
require_once '../../../includes/dbh.inc.php';
include_once '../../../includes/HomeownerListController.php';

?>

<div class="container-fluid">

    <div class="row">
        <div class="d-block d-sm-none">
            <h3 class="h3 fw-b smallscreen-h3">Add Homeowner</h3>
        </div>
    </div>

    <div class="row">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card shadow mb-8 smallscreen-card">
                <div class="d-none d-sm-flex align-items-center justify-content-between ml-4 mt-4 mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Add Homeowner</h1>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form class="user" method="post" action="../../../includes/admin/homeowner.inc.php" id="homeownerForm">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h6 class="h5 text-gray-800 smallscreen-h6-text">Personal Details</h6>
                        </div>
                        <div>
                            <?php
                            check_add_homeowner_errors();
                            creation_success();
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-3 homeowner-field">
                                <input type="text" class="form-control form-control-user form-control-color" id="first_name" name="first_name" placeholder="First Name" required>
                                <div class="error-container"> <span class="error"></span></div>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-3 homeowner-field">
                                <input type="text" class="form-control form-control-user form-control-color" id="last_name" name="last_name" placeholder="Last Name" required>
                                <div class="error-container"> <span class="error"></span></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6  mb-3 homeowner-field">
                                <input type="email" class="form-control form-control-user form-control-color" id="email" name="email" placeholder="Email Address" required>
                                <div class="error-container"> <span class="error"></span></div>
                            </div>
                            <div class="col-sm-6 mb-3 homeowner-field">
                                <input type="text" class="form-control form-control-user form-control-color" id="number" name="number" placeholder="Phone Number" minlength="11" required>
                                <div class="error-container"> <span class="error"></span></div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h6 class="h5 text-gray-800 smallscreen-h6-text">Address</h6>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 mb-3 homeowner-field">
                                <input type="text" class="form-control form-control-user form-control-color" id="block" name="block" placeholder="Block" required>
                                <div class="error-container"> <span class="error"></span></div>
                            </div>
                            <div class="col-sm-3 mb-3 homeowner-field">
                                <input type="text" class="form-control form-control-user form-control-color" id="lot" name="lot" placeholder="Lot" required>
                                <div class="error-container"> <span class="error"></span></div>
                            </div>
                            <div class="col-sm-6 mb-3 homeowner-field">
                                <input type="text" class="form-control form-control-user form-control-color" id="street" name="street" placeholder="Street" required>
                                <div class="error-container"> <span class="error"></span></div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center"> <!-- Center the button horizontally within its parent container -->
                            <button type="submit" class="btn custom-btn btn-user col-sm-3 mb-2 mb-sm-0" id="submitButton">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4" id="homeowner_pagination">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card shadow mb-8 smallscreen-card">
                <div class="d-sm-flex align-items-center justify-content-between ml-4 mt-4">
                    <h6 class="h3 text-gray-800 smallscreen-h6-text">Homeowner List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($results as $row) {
                                    // $qr_id = $row['qr_id'];
                                    $first_name = $row['first_name'];
                                    $last_name = $row['last_name'];
                                    $block = $row['block'];
                                    $lot = $row['lot'];
                                    $street = $row['street'];
                                    $email = $row['email'];
                                    $number = $row['number'];
                                ?>
                                    <tr>
                                        <td><?php echo $first_name . " " . $last_name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $number; ?></td>
                                        <td><?php echo "Block " . $block . ", Lot " . $lot . " , " . $street . " Street"; ?></td>
                                        <td>
                                            <a href="" class="view-qr-detail">
                                                <button class="btn btn-view-pay">View</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-circle btn-sm delete-btn" data-toggle="modal" data-target="#deleteModal" data-email="<?php echo $email; ?>">
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

                    <div class="d-flex justify-content-between pagination-qr">
                        <div class="p-10 d-none d-lg-block">
                            <strong>Page <?php echo $page_no; ?> of <?php echo $total_no_of_pages ?></strong>
                        </div>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link qr-code-pagination <?php echo ($page_no <= 1) ? 'disabled' : ''; ?>" <?php echo ($page_no > 1) ? 'href="?page_no=' . $previous_page . '#homeowner_pagination"' : ''; ?>>
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
                                        <a class="page-link qr-code-pagination <?php echo ($page_no == $counter) ? 'bg-secondary text-white' : ''; ?>" href="?page_no=<?php echo $counter; ?>#homeowner_pagination">
                                            <?php echo $counter; ?>
                                        </a>
                                    </li>
                                <?php
                                }
                                ?>

                                <li class="page-item">
                                    <a class="page-link qr-code-pagination <?php echo ($page_no >= $total_no_of_pages) ? 'disabled' : ''; ?>" <?php echo ($page_no < $total_no_of_pages) ? 'href="?page_no=' . $next_page . '#homeowner_pagination"' : ''; ?>>
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

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Proceed to Remove Homeowner?</h5>
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





<script src="../../js/add_homeowners.js"></script>
<?php

include_once 'footer.php';
?>