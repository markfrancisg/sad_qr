<?php
include_once 'header.php';
require_once '../../../includes/dbh.inc.php';
require_once '../../../includes/Logs_model.inc.php';
include_once '../../../includes/LogsListDailyController.php';

?>



<!--  Header End -->
<div class="container-fluid">
    <div class="container-fluid">

        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="record_logs.php">Record Logs</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daily Record Logs</li>

            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <h2 class="fw-semibold mb-4 text-center">Daily Entry-Exit Record Logs</h2>

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
                                                <a class="nav-link " aria-current="page" href="record_logs.php">All</a>
                                            </li>
                                            <li class="nav-item me-2">
                                                <a class="nav-link active" href="record_logs_daily.php">Daily</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="record_logs_weekly.php">Weekly</a>
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
                                            <button class="btn btn-primary mb-1" id="searchButton" name="searchButton" type="submit">Search</button>
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
                                <a href="record_logs_daily.php" class="btn btn-warning w-100">
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
                                        Entry
                                    </th>
                                    <th class="border-bottom-0 text-center fw-bolder text-light mb-0">
                                        Exit
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
                                        <tr>
                                            <td class="border-bottom-0 text-center text-muted mb-0">
                                                <?php echo $row['log_name']; ?>
                                            </td>
                                            <td class="border-bottom-0 text-center text-muted mb-0">
                                                <?php echo $row['log_address']; ?>
                                            </td>
                                            <td class="border-bottom-0 text-center text-muted mb-0">
                                                <?php echo $row['log_plate_number']; ?>
                                            </td>
                                            <td class="border-bottom-0 text-center text-muted mb-0">
                                                <?php echo $row['log_vehicle']; ?>
                                            </td>
                                            <td class="border-bottom-0 text-center text-muted mb-0">
                                                <?php echo $row['entry_log']; ?>
                                            </td>
                                            <td class="border-bottom-0 text-center text-muted mb-0">
                                                <?php echo $row['exit_log']; ?>
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

<script>

</script>

<script src="../../js/logs.js"></script>

<?php
include_once 'footer.php';
?>