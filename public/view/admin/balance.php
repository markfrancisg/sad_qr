<?php
include_once 'header.php';
require_once '../../../includes/Admin_model.inc.php';
require_once '../../../includes/Admin_contr.inc.php';
require_once '../../../includes/dbh.inc.php';


check_registration_status($pdo);
$results = get_paid_qr($pdo);
$results2 = get_unpaid_qr($pdo);


?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Paid Accounts</h1>
    </div>
</div>

<div class="row col-12">
    <!-- Area Chart -->
    <div class="col-12">
        <div class="card mb-8">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Vehicle Type</th>
                                <th>Plate No</th>
                            </tr>
                        </thead>

                        <?php
                        foreach ($results as $row) {
                            $name = $row['name'];
                            $address = $row['address'];
                            $vehicle_type = $row['vehicle_type'];
                            $plate_number = $row['plate_number'];
                        ?>

                            <tbody>

                                <tr>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $address; ?></td>
                                    <td><?php echo $vehicle_type; ?></td>
                                    <td><?php echo $plate_number; ?></td>
                                </tr>
                            <?php
                        }
                            ?>



                            </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between m-4">
        <h1 class="h3 mb-0 text-gray-800">Unpaid Accounts</h1>
    </div>
</div>

<div class="row col-12">
    <!-- Area Chart -->
    <div class="col-12">
        <div class="card mb-8">
            <div class="card-body">
                <div class="table-responsive">
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

                        <?php
                        foreach ($results2 as $row2) {
                            $qr_id2 = $row2['qr_id'];
                            $name2 = $row2['name'];
                            $address2 = $row2['address'];
                            $vehicle_type2 = $row2['vehicle_type'];
                            $plate_number2 = $row2['plate_number'];
                        ?>

                            <tbody>

                                <tr>
                                    <td><?php echo $name2; ?></td>
                                    <td><?php echo $address2; ?></td>
                                    <td><?php echo $vehicle_type2; ?></td>
                                    <td><?php echo $plate_number2; ?></td>
                                    <td>
                                        <a href="../../../includes/admin/balance_pay.inc.php?qr_id=<?php echo $qr_id2; ?>" class="view-qr-detail"> <button class="btn btn-view-pay">Pay</button></a>
                                    </td>
                                </tr>
                            <?php
                        }
                            ?>



                            </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


<?php

include_once 'footer.php';

?>