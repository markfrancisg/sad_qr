<?php
require_once 'header.php';
require_once '../../../includes/dbh.inc.php';
require_once '../../../includes/RecordLogs_model.inc.php';


$results = get_record_logs($pdo);

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row" id="paid_accounts">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card shadow mb-8 smallscreen-card">
                <div class="d-sm-flex align-items-center justify-content-between ml-4 mt-4">
                    <h6 class="h3 text-gray-800 smallscreen-h6-text">Vehicles</h6>
                </div>
                <div class="card-body mt-0">
                    <?php  ?>
                    <div class="table-responsive">
                        <?php if (empty($results)) : ?>
                            <p class="text-center">No record logs available.</p>
                        <?php else : ?>
                            <div class="d-sm-flex justify-content-end mr-5 mb-3">
                                <div class="mr-2">
                                    <form action="../../../includes/admin/logs_excel.inc.php" method="post">
                                        <button type="submit" name="export_excel">
                                            <i class="fas fa-download"></i> Export to Excel
                                        </button>
                                    </form>
                                </div>
                                <div class="filter-border">
                                    <p>Filter <i class="fas fa-filter"></i></p>
                                </div>
                            </div>
                            <table class="table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Complete Address</th>
                                        <th>Vehicle Type</th>
                                        <th>Plate Number</th>
                                        <th>QR Code</th>
                                        <th>Station</th>
                                        <th>Entry / Exit</th>
                                        <th>Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($results as $row) : ?>
                                        <tr>
                                            <td><?php echo "Block " . $row['block'] . ", Lot " . $row['lot'] . ", " . $row['street'] . " Street"; ?></td>
                                            <td><?php echo $row['vehicle_type']; ?></td>
                                            <td><?php echo $row['plate_number']; ?></td>
                                            <td><?php echo $row['qr_code']; ?></td>
                                            <td><?php echo $row['station']; ?></td>
                                            <td><?php echo $row['entry_exit']; ?></td>
                                            <td><?php echo $row['date_time']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>



                    </div>
                </div>

            </div>
        </div>
    </div>


</div>

<?php
require_once 'footer.php';

?>