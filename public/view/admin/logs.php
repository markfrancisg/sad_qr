<?php
include_once 'header.php';
require_once '../../../includes/dbh.inc.php';
require_once '../../../includes/RecordLogs_model.inc.php';

$results = get_record_logs($pdo);
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
                    <div class="row mb-2 justify-content-between">
                        <div class="col-md-4 order-md-1 order-2">
                            <form action="../../../includes/admin/logs_excel.inc.php" method="post">
                                <button type="submit" name="export_excel" class="btn btn-outline-primary w-100">
                                    <i class="fas fa-download"></i>Export Excel File
                                </button>
                            </form>
                        </div>

                        <div class="col-md-4 order-md-2 order-1 mb-2">
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
                                        <h6 class="fw-bolder text-light mb-0">Name </h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-bolder text-light mb-0">Complete Address</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-bolder text-light mb-0">Vehicle Type</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-bolder text-light mb-0">Plate Number</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-bolder text-light mb-0">Station</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-bolder text-light mb-0">Entry / Exit</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-bolder text-light mb-0">Date and Time</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($results as $row) {

                                ?>
                                    <tr>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="text-dark mb-0"><?php echo $row['first_name'] . " " . $row['last_name']; ?></h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="text-dark mb-0"><?php echo "Block " . $row['block'] . ", Lot " . $row['lot'] . ", " . $row['street'] . " Street"; ?></h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="text-dark mb-0"><?php echo $row['vehicle_type']; ?></h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="text-dark mb-0"><?php echo $row['plate_number']; ?></h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="text-dark mb-0"><?php echo $row['station']; ?></h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="text-dark mb-0"><?php echo $row['entry_exit']; ?></h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="text-dark mb-0"><?php echo $row['date'] . " | " .   $row['time'] ?></h6>
                                        </td>

                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>



                    <div class="row mt-5">
                        <!-- save for pagination -->
                    </div>

                </div>




            </div>
        </div>
    </div>
</div>


<script src="../../js/logs_admin.js"></script>

<?php
include_once 'footer.php';
?>