<?php
include_once 'header.php';
include_once '../../../includes/dbh.inc.php';
include_once '../../../includes/Admin_contr.inc.php';
include_once '../../../includes/Admin_model.inc.php';


$account_id = check_account_id();
$result = get_qr_detail($pdo, $account_id);
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">QR Details</h1>
    </div>

    <!-- Content Row -->
    <!-- ../../includes/admin/create_qr.inc.php -->
    <div class="row col-12">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card mb-8">
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Full Name <?php echo $result['name']; ?>
                    </h6>
                    <h6 class="m-0 font-weight-bold text-primary">
                        Address <?php echo $result['address']; ?>
                    </h6>
                    <h6 class="m-0 font-weight-bold text-primary">
                        Vehicle Wheels <?php echo $result['wheel']; ?>
                    </h6>
                    <h6 class="m-0 font-weight-bold text-primary">
                        Vehicle Type <?php echo $result['vehicle_type']; ?>
                    </h6>
                    <p class="card-text">
                        QR Code: <?php echo $result['qr_code']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once 'footer.php';
    ?>