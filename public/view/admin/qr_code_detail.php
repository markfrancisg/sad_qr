<?php
include_once 'header.php';
include_once '../../../includes/dbh.inc.php';
include_once '../../../includes/Admin_contr.inc.php';
include_once '../../../includes/Admin_model.inc.php';
include_once '../../../includes/admin/qr_code_detail.inc.php';



$qr_id = check_qr_id();
$result = get_qr_detail($pdo, $qr_id);

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
                        Plate Number <?php echo $result['plate_number']; ?>
                    </h6>
                    <h6 class="m-0 font-weight-bold text-primary">
                        Vehicle Wheels <?php echo $result['wheel']; ?>
                    </h6>
                    <h6 class="m-0 font-weight-bold text-primary">
                        Vehicle Type <?php echo $result['vehicle_type']; ?>
                    </h6>
                    <p class="card-text">
                        <?php
                        if ($result['qr_code'] != '0') {
                            // If QR code data is available, display the QR code image
                            $qrImageData = view_qr($result['qr_code']); // Assuming this function properly returns QR code image data
                            echo '<img src="data:image/png;base64,' . base64_encode($qrImageData) . '" >';
                        } else {
                            // If QR code data is not available, display a link
                        ?>
                            <a href="../../../includes/admin/balance_pay.inc.php?qr_id=<?php echo $qr_id; ?>">Pay</a>
                        <?php
                        }
                        ?>
                    </p>
                    <a href="qr_code.php"><-Back </a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once 'footer.php';
    ?>