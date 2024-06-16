<?php
include_once 'header.php';
include_once '../../../includes/admin/homeowner_list_view.inc.php';
require_once '../../../includes/Homeowner_model.inc.php';
require_once '../../../includes/dbh.inc.php';
include_once '../../../includes/HomeownerListController.php'; //for the pagination

?>



<!--  Header End -->
<div class="container-fluid">
    <div class="container-fluid">

        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Homeowner List</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <h2 class="fw-semibold mb-4 text-center">Homeowner List</h2>

                <!-- SEARCH BAR -->
                <?php if (!$searchPerformed) : ?>
                    <form id="searchForm" method="GET" action="">
                        <div class="container">
                            <div class="row mb-2 justify-content-end align-items-center">
                                <div class="col-md-4 order-md-2 order-1 mb-2">
                                    <div class="input-group">
                                        <input class="form-control me-2" type="text" id="searchInput" name="searchInput" placeholder="Enter Name" aria-label="Search" maxlength="15">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" id="searchButton" name="searchButton" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php else : ?>
                    <div class="container">
                        <div class="row mb-2 justify-content-end align-items-center">
                            <div class="col-md-4 order-md-2 order-1 mb-2">
                                <a href="homeowner_list.php" class="btn btn-warning w-100">
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
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-bolder text-light mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-bolder text-light mb-0">Email Address</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-bolder text-light mb-0">Phone Number</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-bolder text-light mb-0">Address</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <?php if (empty($results)) : ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No Data Available</td>
                                    </tr>
                                <?php else : ?>
                                    <?php foreach ($results as $row) : ?>
                                        <tr id="row_<?php echo $row['ho_id']; ?>">
                                            <td class="border-bottom-0 text-center">
                                                <input type="checkbox" class="input_checkbox" value="<?php echo $row['ho_id']; ?>" />
                                            </td>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="text-dark mb-0"><?php echo $row['first_name'] . " " . $row['last_name']; ?></h6>
                                            </td>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="text-dark mb-0"><?php echo htmlspecialchars(trim($row['email'])); ?></h6>
                                            </td>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="text-dark mb-0"><?php echo $row['number']; ?></h6>
                                            </td>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="text-dark mb-0"><?php echo "Block " . $row['block'] . ", Lot " . $row['lot'] . " , " . $row['street'] . " Street"; ?></h6>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <?php if (!$searchPerformed) : ?>
                        <div class="row mt-5">
                            <div class="col">
                                <div class="d-flex align-items-center justify-content-between">
                                    <strong>Page <?php echo $page_no; ?> of <?php echo $total_no_of_pages; ?></strong>

                                    <!-- Pagination controls -->
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination mb-0">
                                            <li class="page-item">
                                                <a class="page-link <?php echo ($page_no <= 1) ? 'disabled' : ''; ?>" <?php echo ($page_no > 1) ? 'href="?page_no=' . $previous_page . '#homeowner_pagination"' : ''; ?>>
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
                                                    <a class="page-link <?php echo ($page_no == $counter) ? 'bg-primary text-white' : ''; ?>" href="?page_no=<?php echo $counter; ?>#homeowner_pagination">
                                                        <?php echo $counter; ?>
                                                    </a>
                                                </li>
                                            <?php
                                            }
                                            ?>

                                            <li class="page-item">
                                                <a class="page-link <?php echo ($page_no >= $total_no_of_pages) ? 'disabled' : ''; ?>" <?php echo ($page_no < $total_no_of_pages) ? 'href="?page_no=' . $next_page . '#homeowner_pagination"' : ''; ?>>
                                                    <i class="fas fa-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
</div>


<!-- MODALS -->
<!-- <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the selected records?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div> -->
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

<script src="../../js/homeowner_list.js"></script>

<?php
homeowner_edit_success();
homeowner_delete_success();
include_once 'footer.php';
?>