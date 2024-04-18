<?php
include_once 'header.php';
require_once '../../../includes/Admin_model.inc.php';
require_once '../../../includes/Admin_contr.inc.php';
require_once '../../../includes/dbh.inc.php';



$results = get_paid_qr($pdo);
$results2 = get_unpaid_qr($pdo);


?>

<div class="container-fluid">

    <div class="row">
        <div class="d-block d-sm-none">
            <h3 class="h3 fw-b smallscreen-h3">Balance</h3>
        </div>
    </div>

    <div class="row">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card shadow mb-8 smallscreen-card">
                <div class="d-sm-flex align-items-center justify-content-between ml-4 mt-4">
                    <h6 class="h3 text-gray-800 smallscreen-h6-text">Paid Accounts</h6>
                </div>
                <div class="card-body mt-0">
                    <div class="table-responsive">
                        <?php if (empty($results)) : ?>
                            <p class="text-center">No paid accounts available.</p>
                        <?php else : ?>
                            <table class="table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Vehicle Type</th>
                                        <th>Plate No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($results as $row) : ?>
                                        <tr>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['vehicle_type']; ?></td>
                                            <td><?php echo $row['plate_number']; ?></td>
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




    <div class="row mt-4">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card shadow mb-8 smallscreen-card">
                <div class="d-sm-flex align-items-center justify-content-between ml-4 mt-4">
                    <h6 class="h3 text-gray-800 smallscreen-h6-text">Unpaid Accounts</h6>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <?php if (empty($results2)) : ?>
                            <p class="text-center">No unpaid accounts available.</p>
                        <?php else : ?>
                            <table class="table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Vehicle Type</th>
                                        <th>Plate No</th>
                                        <th>PHP200</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($results2 as $row2) : ?>
                                        <tr>
                                            <td><?php echo $row2['name']; ?></td>
                                            <td><?php echo $row2['address']; ?></td>
                                            <td><?php echo $row2['vehicle_type']; ?></td>
                                            <td><?php echo $row2['plate_number']; ?></td>
                                            <td>
                                                <a href="qr_code_detail.php?qr_id=<?php echo $row2['qr_id']; ?>" class="view-qr-detail">
                                                    <button class="btn btn-view-pay">Pay</button>
                                                </a>
                                            </td>
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

include_once 'footer.php';

?>