<?php
ob_start(); // Start output buffering

require_once 'header.php';
require_once '../../../includes/config.session.inc.php';
require_once '../../../includes/guard/vehicle_qr_detail.inc.php';
require_once '../../../includes/ScanResults_contr.inc.php';
require_once '../../../includes/guard/scan_results_view.inc.php';

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="container border border-1">

        <div class="d-sm-flex align-items-center justify-content-between ml-4 mt-4">
            <h6 class="h3 text-gray-800 smallscreen-h6-text">Details</h6>
        </div>

        <?php
        check_entry();

        if (isset($_GET['entry']) && $_GET['entry'] === 'success') {
        ?>
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <?php
                    $qrImageData = view_qr($qr_code); // Assuming this function properly returns QR code image data
                    echo '<img src="data:image/png;base64,' . base64_encode($qrImageData) . '" class="img-fluid" >';
                    ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h5>Full Name: <?php echo $name; ?></h5>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h5>Address: <?php echo $address; ?></h5>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h5>Plate Number: <?php echo $plate_number; ?></h5>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h5>Vehicle Wheels: <?php echo $wheel; ?></h5>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h5>Vehicle Type: <?php echo $vehicle_type; ?></h5>
                </div>
            </div>
        <?php
        } else if (isset($_GET['entry']) && $_GET['entry'] === 'denied') {
            echo '<div><img src="../../resources/access_denied.png" class="img-fluid"></div>';
        }
        ?>
    </div>
</div>

<?php
require_once 'footer.php';

// Redirect to another page after 10 seconds
header("refresh:10;url=scan_qr.php");
exit; // Ensure subsequent code is not executed

ob_end_flush(); // Flush the output buffer
?>