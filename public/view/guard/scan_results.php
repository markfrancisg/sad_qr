<?php
ob_start(); // Start output buffering

require_once 'header.php';
require_once '../../../includes/config.session.inc.php';
require_once '../../../includes/guard/vehicle_qr_detail.inc.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="container border border-1">

        <div class="d-sm-flex align-items-center justify-content-between ml-4 mt-4">
            <h6 class="h3 text-gray-800 smallscreen-h6-text">Details</h6>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <?php
                $qrImageData = view_qr($_SESSION['qr_code']); // Assuming this function properly returns QR code image data
                echo '<img src="data:image/png;base64,' . base64_encode($qrImageData) . '" class="img-fluid" >';
                ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h5>Full Name: <?php echo $_SESSION['name']; ?></h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h5>Address: <?php echo $_SESSION['address']; ?></h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h5>Plate Number: <?php echo $_SESSION['plate_number']; ?></h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h5>Vehicle Wheels: <?php echo $_SESSION['wheel']; ?></h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h5>Vehicle Type: <?php echo $_SESSION['vehicle_type']; ?></h5>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';

// Redirect to another page after 10 seconds
header("refresh:10;url=scan_qr.php");
exit; // Ensure subsequent code is not executed

ob_end_flush(); // Flush the output buffer
?>