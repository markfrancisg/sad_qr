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
    <!-- <div class="spinner-wrapper">
        <div class="spinner-border text-success" role="status">
        </div>
    </div> -->

    <div class="row">
        <div class="d-block d-sm-none">
            <h3 class="h3 fw-b smallscreen-h3">QR Details</h3>
        </div>
    </div>

    <!-- Page Heading -->
    <div class="card shadow mb-4 h-100 sm-6 smallscreen-card print-body">

        <div class="d-none d-sm-flex align-items-center justify-content-between ml-4 mt-4 mb-4">
            <h1 class="h3 mb-0 text-gray-800">QR Details</h1>
        </div>

        <div class="row col-12">
            <div class="col-sm-6 d-flex flex-column align-items-center">
                <div>
                    <h6 class="mt-3 font-weight-bold"><b>
                            Full Name: </b><?php echo $result['first_name'] . " " . $result['last_name']; ?>
                    </h6>
                </div>
                <div>
                    <h6 class="mt-3 font-weight-bold"><b>
                            Address: </b><?php echo "Block " . $result['block'] . ", Lot " . $result['lot'] . ", " . $result['street'] . " Street"; ?>
                    </h6>
                </div>
                <div>
                    <h6 class="mt-3 font-weight-bold"><b>
                            Plate Number: </b><?php echo $result['plate_number']; ?>
                    </h6>
                </div>
                <div>
                    <h6 class="mt-3 font-weight-bold"><b>
                            Vehicle Wheels: </b><?php echo $result['wheel']; ?>
                    </h6>
                </div>
                <div>
                    <h6 class="mt-3 font-weight-bold"><b>
                            Vehicle Type: </b><?php echo $result['vehicle_type']; ?>
                    </h6>
                </div>
            </div>


            <div class="col-sm-6 d-flex flex-column align-items-center">
                <p class="card-text ml-4">
                    <?php
                    if ($result['qr_code'] != 'Not Registered') {
                        // If QR code data is available, display the QR code image
                        $qrImageData = view_qr($result['qr_code']); // Assuming this function properly returns QR code image data
                        echo '<img src="data:image/png;base64,' . base64_encode($qrImageData) . '" >';
                        echo '<div class="mt-0 hide-printer-icon"><button onclick="window.print()"><i class="fas fa-print"></i> Print</button></div>';
                    } else {
                        // If QR code data is not available, display a link
                    ?>
                <div class="receipt">
                    <div class="d-sm-flex align-items-center justify-content-between ml-4 mt-4">
                        <h6 class="h3 text-gray-800 smallscreen-h6-text">Generate QR Code</h6>
                    </div>
                    <div class="receipt-body">
                        <p class="font-weight-bold"><b>Date:</b> <?php echo date('F j, Y'); ?></p>
                        <p class="font-weight-bold"><b>Description:</b> Payment</p>
                        <p class="font-weight-bold"><b>Amount:</b> ₱200.00</p>
                        <a href="" class="view-qr-detail pay-option" data-toggle="modal" data-target="#payModal" data-qr="<?php echo $qr_id; ?>">
                            <button class="btn btn-view-pay">Pay</button></a>
                        <!-- ../../../includes/admin/balance_pay.inc.php?qr_id=
                                                                                // echo $qr_id; 
                                                                                -->
                    </div>
                </div>
            <?php
                    }
            ?>
            </p>
            </div>

        </div>

    </div>

    <div class="back-button"><a href="qr_code.php" class="back-button-qr font-weight-bold">Back </a></div>

</div>

<div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Proceed to Payment?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Pay" below if you are sure.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn modal-pay-color" id="pay-link" href="#">Pay</a>
            </div>
        </div>
    </div>
</div>

<?php
// include_once 'admin_js.php';
include_once 'footer.php';
?>