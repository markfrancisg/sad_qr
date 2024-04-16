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


    <!-- Page Heading -->
    <div class="card shadow mb-4 h-100 sm-6">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 m-3 text-gray-800">QR Details</h1>
        </div>

        <div class="row col-12">
            <div class="col-sm-6">
                <div>
                    <h6 class="ml-5 mt-3 font-weight-bold">
                        Full Name: <?php echo $result['name']; ?>
                    </h6>
                </div>
                <div>
                    <h6 class="ml-5 mt-3 font-weight-bold">
                        Address: <?php echo $result['address']; ?>
                    </h6>
                </div>
                <div>
                    <h6 class="ml-5 mt-3 font-weight-bold">
                        Plate Number: <?php echo $result['plate_number']; ?>
                    </h6>
                </div>
                <div>
                    <h6 class="ml-5 mt-3 font-weight-bold">
                        Vehicle Wheels: <?php echo $result['wheel']; ?>
                    </h6>
                </div>
                <div>
                    <h6 class="ml-5 mt-3 font-weight-bold">
                        Vehicle Type: <?php echo $result['vehicle_type']; ?>
                    </h6>
                </div>
            </div>


            <div class="col-sm-6">
                <p class="card-text">
                    <?php
                    if ($result['qr_code'] != 'Not Registered') {
                        // If QR code data is available, display the QR code image
                        $qrImageData = view_qr($result['qr_code']); // Assuming this function properly returns QR code image data
                        echo '<img src="data:image/png;base64,' . base64_encode($qrImageData) . '" >';
                    } else {
                        // If QR code data is not available, display a link
                    ?>
                <div class="receipt">
                    <div class="receipt-header">
                        <h2>Generate QR Code</h2>
                    </div>
                    <div class="receipt-body">
                        <p><b>Date:</b> <?php echo date('F j, Y'); ?></p>
                        <p><b>Description:</b> Payment</p>
                        <p><b>Amount:</b> ₱200.00</p>
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

    <div class="back-button"><a href="qr_code.php" class="back-button-qr">Back </a></div>

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
include_once 'admin_js.php';
include_once 'footer.php';
?>