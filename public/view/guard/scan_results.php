<?php
ob_start(); // Start output buffering

require_once '../../../includes/config.session.inc.php';
require_once '../../../includes/guard/vehicle_qr_detail.inc.php';
require_once '../../../includes/ScanResults_contr.inc.php';
require_once '../../../includes/guard/scan_results_view.inc.php';
require_once 'header.php';


?>
<style>
    .danger-text {
        color: red;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="container-fluid">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="guard.dashboard.php">Gate Selection</a></li>
                <li class="breadcrumb-item active" aria-current="page">Scan QR</li>
                <li class="breadcrumb-item active" aria-current="page">Scan Results</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <?php if (isset($_GET['entry']) && $_GET['entry'] === 'success') : ?>
                        <h1 class="text-bolder text-primary text-center mb-3">ACCESS GRANTED!</h1>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="container">
                                    <div class="card-body text-center mt-1">
                                        <img src="../../images/details.svg" width="120" alt="Details" class="mb-2">
                                        <h2 class="text-dark fw-bolder mb-0"><?= htmlspecialchars($name); ?></h2>
                                        <hr class="text-dark fw-bolder">
                                        <p class="text-muted fw-bolder mb-2"><?= htmlspecialchars($address); ?></p>
                                        <p class="text-muted fw-bolder mb-2">With Plate Number <u><?= htmlspecialchars($plate_number); ?></u></p>
                                        <p class="text-muted fw-bolder mb-0"><?= htmlspecialchars($wheel); ?>-wheel <?= htmlspecialchars($vehicle_type); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="container border border-2 border-primary shadow-sm">
                                    <div class="card-body text-center" style="min-height: 300px;">
                                        <?php
                                        $qrImageData = view_qr($qr_code);
                                        if ($qrImageData) : ?>
                                            <div class="mb-3">
                                                <img src="data:image/png;base64,<?= base64_encode($qrImageData); ?>" alt="QR Code" class="img-fluid" />
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php elseif (isset($_GET['entry']) && $_GET['entry'] === 'denied') : ?>
                        <h1 class="text-bolder danger-text text-center mb-3">ACCESS DENIED!</h1>
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <div><img src="../../images/stop.svg" class="img-fluid access-denied-image" height="450" width="450"></div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';

// Redirect to another page after 10 seconds
header("refresh:5;url=scan_qr.php");
exit; // Ensure subsequent code is not executed

ob_end_flush(); // Flush the output buffer
?>