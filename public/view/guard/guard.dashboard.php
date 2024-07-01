<?php

require_once 'header.php';
require_once '../../../includes/dbh.inc.php';
require_once '../../../includes/CheckQrStatus_model.inc.php';
require_once '../../../includes/Guard_model.inc.php';
require_once '../../../includes/CheckQrStatus_contr.inc.php';

check_registration_status($pdo); //update all the payment records

$agreement = get_user_agreement($pdo, $_SESSION["account_id"]);
?>

<style>
    .card {
        height: 400px;
    }

    .hover-grow {
        transition: transform 0.3s ease;
    }

    .hover-grow:hover {
        transform: scale(1.05);
        /* Adjust the scale value as needed */
    }
</style>

<div class="container-fluid">
    <div class="container-fluid">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Gate Selection</li>
            </ol>
        </nav>



        <div class="row justify-content-center mb-3">
            <div class="col-12 text-center">
                <h2>Select Assigned Gate</h2>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <a href="scan_qr.php?station=a">
                        <div class="card border border-success border-1 hover-grow">
                            <div class="card-body">
                                <img src="../../images/toll_gate.svg" class="img-fluid d-block mx-auto mt-5" height="200" alt="Toll Gate">
                                <h1 class="text-primary text-center"> Gate 1</h1>
                                <h5 class="text-primary text-center">Entry Point</h5>
                                <h1 class="text-primary text-center"></h1>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="scan_qr.php?station=b">
                        <div class="card border border-success border-1 hover-grow">
                            <div class="card-body">
                                <img src="../../images/toll_gate.svg" class="img-fluid d-block mx-auto mt-5" height="200" alt="Toll Gate">
                                <h1 class="text-primary text-center"> Gate 2</h1>
                                <h5 class="text-primary text-center">Entry Point</h5>
                                <h1 class="text-primary text-center"></h1>
                            </div>
                        </div>
                    </a>
                </div> -->
                <!-- <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="scan_qr.php?station=c">
                        <div class="card border border-success border-1 hover-grow">
                            <div class="card-body">
                                <img src="../../images/toll_gate.svg" class="img-fluid d-block mx-auto mt-5" height="200" alt="Toll Gate">
                                <h1 class="text-primary text-center"> Gate 3</h1>
                                <h5 class="text-primary text-center">Exit Point</h5>
                                <h1 class="text-primary text-center"></h1>
                            </div>
                        </div>
                    </a>
                </div> -->
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <a href="scan_qr.php?station=d">
                        <div class="card border border-success border-1 hover-grow">
                            <div class="card-body">
                                <img src="../../images/toll_gate.svg" class="img-fluid d-block mx-auto mt-5" height="200" alt="Toll Gate">
                                <h1 class="text-primary text-center"> Gate 2</h1>
                                <h5 class="text-primary text-center">Exit Point</h5>
                                <h1 class="text-primary text-center"></h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>



        <!-- <div class="row">Mission</div>
                <div class="row">Vision</div> -->







        <!-- <div class="card">
            <div class="card-body">
            </div>
        </div> -->
    </div>
</div>


<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header d-flex flex-column align-items-center">
                <img src="../../images/logos/san_lorenzo_logo.svg" alt="Subdivision Logo" class="img-fluid mb-2" style="max-width: 100px;">
                <h3 class="modal-title text-center" id="termsModalLabel">Terms and Conditions</h3>
            </div>
            <div class="modal-body">
                <p class="text-primary text-justify">
                    As a guard of the San Lorenzo Phase 1 Subdivision SeQRity system, you agree to the following terms and conditions to ensure the safety and privacy of homeowners' data:
                </p>
                <ul class="list-unstyled text-justify">
                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> The data collected, including vehicle plate numbers, entry and exit times, and other related information, will be used solely for monitoring and tracking purposes.</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> You are responsible for ensuring that all collected data is stored securely and protected from unauthorized access.</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Under no circumstances will the data be shared with third parties without the explicit consent of the homeowners, except as required by law.</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> You will comply with all relevant data protection and privacy laws to maintain the confidentiality and integrity of the data.</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> In the event of a data breach or security incident, you must promptly notify the homeowners association and take appropriate measures to mitigate any potential harm.</li>
                </ul>
                <p class="text-primary text-justify">
                    By accepting these terms, you commit to upholding the highest standards of data security and privacy for the benefit of the homeowners of San Lorenzo Phase 1 Subdivision.
                </p>
            </div>
            <div class="modal-footer">
                <a href="../../../includes/logout.inc.php"><button type="button" class="btn btn-light">I Disagree (Log Out)</button></a>
                <form id="agreeForm" action="../../../includes/guard/terms.inc.php" method="POST" style="display: inline;">
                    <button type="submit" class="btn btn-primary">I Agree</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- shows the agreement modal when user hasnt agreed to the terms and conditions -->
<script>
    // Check agreement status here
    <?php if ($agreement == 0) : ?>
        $(document).ready(function() {
            $('#termsModal').modal('show');
        });
    <?php endif; ?>
</script>



<?php
require_once 'footer.php';
?>


<!-- Begin Page Content -->
<!-- <div class="container-fluid">


    <div class="row">


        <div class="col-3">
            <a href="scan_qr.php?station=a">
                <div class="card station-card card-hover">
                    <h3 class="h3-bold text-center">Station A</h3>
                </div>
            </a>
        </div>

        <div class="col-3">
            <a href="scan_qr.php?station=b">
                <div class="card station-card card-hover">
                    <h3 class="h3-bold text-center">Station B</h3>
                </div>
            </a>
        </div>

        <div class="col-3">
            <a href="scan_qr.php?station=c">
                <div class="card station-card card-hover">
                    <h3 class="h3-bold text-center">Station C</h3>
                </div>
            </a>
        </div>

        <div class="col-3">
            <a href="scan_qr.php?station=d">
                <div class="card station-card card-hover">
                    <h3 class="h3-bold text-center">Station D</h3>
                </div>
            </a>
        </div>

    </div>


</div> -->