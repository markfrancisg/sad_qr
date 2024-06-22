<?php
include_once 'header.php';
include_once '../../../includes/dbh.inc.php';
include_once '../../../includes/Admin_contr.inc.php';
include_once '../../../includes/Admin_model.inc.php';
include_once '../../../includes/admin/qr_code_detail.inc.php';
include_once '../../../includes/admin/balance_pay_view.inc.php';


$qr_id = check_qr_id();
$result = get_qr_detail($pdo, $qr_id);
payment_success();
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

                <div class="container mt-2 printable">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="container">
                                <div class="card-body text-center mt-1">
                                    <img src="../../images/details.svg" width="120" alt="Details" class="mb-2">
                                    <h2 class="text-dark fw-bolder mb-0"><?php echo $result['first_name'] . " " . $result['last_name']; ?></h2>
                                    <hr class="text-dark fw-bolder">
                                    <p class="text-muted fw-bolder mb-2"><?php echo "Block " . $result['block'] . ", Lot " . $result['lot'] . ", " . $result['street'] . " Street"; ?></p>
                                    <p class="text-muted fw-bolder mb-2">With Plate Number <u><?php echo $result['plate_number']; ?></u></p>
                                    <p class="text-muted fw-bolder mb-0"><?php echo $result['wheel']; ?>-wheel <?php echo $result['vehicle_type']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="container border border-2 border-primary shadow-sm">
                                <div class="card-body text-center" style="min-height: 350px;">
                                    <?php if ($result['qr_code'] != 'Not Registered') :
                                        $qrImageData = view_qr($result['qr_code']); ?>
                                        <div class="mb-3">
                                            <img src="data:image/png;base64,<?php echo base64_encode($qrImageData); ?>" alt="QR Code" class="img-fluid" />
                                        </div>
                                        <button onclick="window.print()" class="btn btn-outline-primary btn-print">
                                            <i class="fas fa-print"></i> Print
                                        </button>
                                    <?php else : ?>
                                        <div class="mb-3 mt-5">
                                            <h3 class="text-dark fw-bolder mb-0">Generate QR Code</h3>
                                        </div>
                                        <p class="text-muted fw-bolder mb-1"><b class="text-dark">Date:</b> <?php echo date('F j, Y'); ?></p>
                                        <p class="text-muted fw-bolder mb-1"><b class="text-dark">Description:</b> Payment</p>
                                        <p class="text-muted fw-bolder mb-1"><b class="text-dark">Amount:</b> ₱200.00</p>
                                        <a href="" class="view-qr-detail pay-option" data-toggle="modal" data-target="#payModal" data-qr="<?php echo $qr_id; ?>">
                                            <button class="btn btn-outline-primary mt-3">Pay</button>
                                        </a>
                                    <?php endif; ?>
                                </div>
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