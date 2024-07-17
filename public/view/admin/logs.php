<?php
require_once '../../../includes/dbh.inc.php';
require_once '../../../includes/Logs_model.inc.php';
include_once 'header.php';

?>



<!--  Header End -->
<div class="container-fluid">
    <div class="container-fluid">

        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Record Logs</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <h2 class="fw-semibold mb-4 text-center">Entry-Exit Record Logs</h2>

                <!-- SEARCH BAR -->
                <div class="container">
                    <div class="row mb-2 justify-content-between align-items-center">
                        <!-- Navigation links -->
                        <div class="col-md-4 order-md-1 order-3">
                            <nav class="navbar navbar-expand-lg mb-1">
                                <div class="container-fluid">
                                    <ul class="nav nav-pills d-flex flex-row flex-nowrap">
                                        <li class="nav-item me-2">
                                            <a class="nav-link active" aria-current="page" href="logs.php">All</a>
                                        </li>
                                        <li class="nav-item me-2">
                                            <a class="nav-link" href="logs_daily.php">Daily</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="logs_weekly.php">Weekly</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <!-- Export Excel button -->
                        <div class="col-md-4 order-md-2 order-2 text-center">
                            <form action="../../../includes/admin/logs_excel.inc.php?type=all" method="post">
                                <button type="submit" name="export_excel" id="exportExcelButton" class="btn btn-outline-primary w-100 mb-1">
                                    <i class="fas fa-download"></i> Export Excel File
                                </button>
                            </form>
                        </div>

                        <!-- Search form -->
                        <div class="col-md-4 order-md-3 order-1">
                            <div class="input-group">
                                <input class="form-control mb-1 me-2" type="text" id="searchInput" name="searchInput" placeholder="Enter Plate Number" aria-label="Search" maxlength="8">
                                <div class="input-group-append">
                                    <button class="btn btn-primary mb-1" type="button" id="searchButton">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


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
                                        Date
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

                            </tbody>
                        </table>
                    </div>

                    <nav class="d-flex justify-content-end mt-5">
                        <ul class="pagination" id="paginationControls">
                            <!-- Pagination controls will be inserted here -->
                        </ul>
                    </nav>
                </div>





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