<?php
include_once 'header.php';
include_once '../../../includes/dbh.inc.php';
include_once '../../../includes/Admin_contr.inc.php';
include_once '../../../includes/Admin_model.inc.php';
include_once '../../../includes/admin/qr_code_detail.inc.php';

$qr_id = check_qr_id();
$result = get_qr_detail($pdo, $qr_id);
?>



<!--  Header End -->
<div class="container-fluid">
    <div class="container-fluid">

        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="vehicle_list.php">Vehicle List</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Vehicle Details</li>
            </ol>
        </nav>

        <div class="card" id="">
            <div class="card-body">
                <h2 class="fw-semibold mb-4 text-center">Vehicle Details</h2>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="container">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="../../images/details.svg" width="20" alt="Details" class="detail-image">
                                    <h5 class="text-dark fw-bolder mb-0">Name: <span class="text-muted detail-value"><?php echo $result['first_name'] . " " . $result['last_name']; ?></span></h5>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <img src="../../images/details.svg" width="20" alt="Details" class="detail-image">
                                    <h5 class="text-dark fw-bolder mb-0">Address: <span class="text-muted detail-value"><?php echo "Block " . $result['block'] . ", Lot " . $result['lot'] . ", " . $result['street'] . " Street"; ?></span></h5>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <img src="../../images/details.svg" width="20" alt="Details" class="detail-image">
                                    <h5 class="text-dark fw-bolder mb-0">Plate Number: <span class="text-muted detail-value"><?php echo $result['plate_number']; ?></span></h5>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <img src="../../images/details.svg" width="20" alt="Details" class="detail-image">
                                    <h5 class="text-dark fw-bolder mb-0">Vehicle Wheels: <span class="text-muted detail-value"><?php echo $result['wheel']; ?></span></h5>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <img src="../../images/details.svg" width="20" alt="Details" class="detail-image">
                                    <h5 class="text-dark fw-bolder mb-0">Vehicle Type: <span class="text-muted detail-value"><?php echo $result['vehicle_type']; ?></span></h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="container">
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
                                            <h3 class="fw-bolder">Generate QR Code</h6>
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
                            </div>
                        </div>
                    </div>
                </div>







            </div>
        </div>



    </div>
</div>

<!-- MODALS -->
<div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Proceed to Payment?</h5>
            </div>
            <div class="modal-body">
                Select "Pay" below if you are sure.
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" id="pay-link" href="#">Pay</a>
            </div>
        </div>
    </div>
</div>


<script src="../../js/qr_code_detail.js"></script>

<?php
include_once 'footer.php';
?>