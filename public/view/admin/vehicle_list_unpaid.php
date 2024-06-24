<?php
include_once 'header.php';
require_once '../../../includes/dbh.inc.php';
require_once '../../../includes/Admin_model.inc.php';
require_once '../../../includes/UnpaidQrCodeListController.php';
?>



<!--  Header End -->
<div class="container-fluid">
    <div class="container-fluid">

        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Vehicle List</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <h2 class="fw-semibold mb-4 text-center">Registered Vehicle List</h2>

                <!-- SEARCH BAR -->
                <?php if (!$searchPerformed) : ?>
                    <div class="container">
                        <div class="row mb-2 justify-content-between align-items-center">
                            <!-- Navigation links -->
                            <div class="col-md-4 order-md-1 order-2">
                                <nav class="navbar navbar-expand-lg mb-1">
                                    <div class="container-fluid">
                                        <ul class="nav nav-pills d-flex flex-row flex-nowrap">
                                            <li class="nav-item me-2">
                                                <a class="nav-link " aria-current="page" href="vehicle_list.php">All</a>
                                            </li>
                                            <li class="nav-item me-2">
                                                <a class="nav-link " href="vehicle_list_paid.php">Paid</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" href="vehicle_list_unpaid.php">Unpaid</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>

                            <!-- Search form -->
                            <div class="col-md-4 order-md-2 order-1">
                                <form id="searchForm" method="GET" action="">
                                    <div class="input-group">
                                        <input class="form-control mb-1 me-2" type="text" id="searchInput" name="searchInput" placeholder="Enter Plate Number" aria-label="Search" maxlength="10">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary mb-1" id="searchButton" name="searchButton" type="submit" <?php if (empty($results)) echo 'disabled'; ?>>Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="container">
                        <div class="row mb-2 justify-content-end align-items-center">
                            <div class="col-md-4 order-md-2 order-1 mb-2">
                                <a href="vehicle_list_unpaid.php" class="btn btn-warning w-100">
                                    <i class="fas fa-times"></i> Clear Search
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="container">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap mb-0 align-middle" id="dataTable">
                            <thead class="text-light fs-4 bg-success">
                                <tr>
                                    <th class="border-bottom-0 text-center">
                                        <button type="button" name="edit" id="edit" class="btn btn-light btn-circle btn-sm edit-btn p-1" style="margin-right: 5px;" disabled>
                                            <i class="fas fa-pencil-alt custom-edit-icon"></i>
                                        </button>
                                        <button type="button" name="delete_all" id="delete_all" class="btn btn-light btn-circle btn-sm delete-btn p-1" style="margin-left: 5px;" disabled>
                                            <i class="fas fa-trash fa-trash-dark"></i>
                                        </button>
                                    </th>
                                    <th class="border-bottom-0 text-center fw-bolder text-light mb-0">
                                        Name
                                    </th>
                                    <th class="border-bottom-0 text-center fw-bolder text-light mb-0">
                                        Complete Address
                                    </th>
                                    <th class="border-bottom-0 text-center fw-bolder text-light mb-0">
                                        Plate Number
                                    </th>
                                    <th class="border-bottom-0 text-center fw-bolder text-light mb-0">
                                        Vehicle Information
                                    </th>
                                    <th class="border-bottom-0 text-center fw-bolder text-light mb-0">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <?php if (empty($results)) : ?>
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            <div class="d-flex flex-column align-items-center justify-content-center">
                                                <img src="../../images/no_item.svg" class="mt-2">
                                                <h4 class="text-dark mt-3">No Data Available</h4>
                                            </div>
                                        </td>
                                    </tr>
                                <?php else : ?>

                                    <?php foreach ($results as $row) : ?>
                                        <tr id="row_<?php echo $row['qr_id']; ?>">
                                            <td class="border-bottom-0 text-center">
                                                <input type="checkbox" class="input_checkbox" value="<?php echo $row['qr_id']; ?>" />
                                            </td>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="text-dark mb-0"><?php echo $row['first_name'] . " " . $row['last_name']; ?></h6>
                                            </td>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="text-dark mb-0"><?php echo "Block " . $row['block'] . ", Lot " . $row['lot'] . " , " . $row['street'] . " Street"; ?></h6>
                                            </td>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="text-dark mb-0"><?php echo $row['plate_number']; ?></h6>
                                            </td>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="text-dark mb-0"><?php echo $row['vehicle_color'] . " " . $row['wheel'] . "-wheel " . $row['vehicle_type']; ?></h6>
                                            </td>
                                            <td class="border-bottom-0 text-center">
                                                <a href="qr_code_detail.php?qr_id=<?php echo $row['qr_id']; ?>">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <?php
                                                        echo '<span class="badge bg-primary rounded-3 fw-semibold w-100">';
                                                        echo ($row['registered'] == '1') ? 'View' : 'Pay';
                                                        echo '</span>';
                                                        ?>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>


                    <?php if (!empty($results) && !$searchPerformed) : ?>
                        <div class="row mt-5">
                            <div class="col">
                                <div class="d-flex align-items-center justify-content-between">
                                    <strong>Page <?php echo $page_no; ?> of <?php echo $total_no_of_pages; ?></strong>

                                    <!-- Pagination on the right -->
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination mb-0">
                                            <li class="page-item">
                                                <a class="page-link <?php echo ($page_no <= 1) ? 'disabled' : ''; ?>" <?php echo ($page_no > 1) ? 'href="?page_no=' . $previous_page . '#qr_pagination"' : ''; ?>>
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
                                                    <a class="page-link <?php echo ($page_no == $counter) ? 'bg-primary text-white' : ''; ?>" href="?page_no=<?php echo $counter; ?>#qr_pagination">
                                                        <?php echo $counter; ?>
                                                    </a>
                                                </li>
                                            <?php
                                            }
                                            ?>

                                            <li class="page-item">
                                                <a class="page-link <?php echo ($page_no >= $total_no_of_pages) ? 'disabled' : ''; ?>" <?php echo ($page_no < $total_no_of_pages) ? 'href="?page_no=' . $next_page . '#qr_pagination"' : ''; ?>>
                                                    <i class="fas fa-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                </div>
            <?php endif; ?>



            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Proceed to Delete Homeowner?</h5>
            </div>
            <div class="modal-body">
                Select "Delete" below if you are sure.
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" type="button" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Proceed to Edit Homeowner Details?</h5>
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

<script src="../../js/vehicle_list.js"></script>

<?php
include_once 'footer.php';
?>