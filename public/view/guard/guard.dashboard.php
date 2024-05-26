<?php

require_once 'header.php';
require_once '../../../includes/dbh.inc.php';
require_once '../../../includes/CheckQrStatus_model.inc.php';
require_once '../../../includes/CheckQrStatus_contr.inc.php';

check_registration_status($pdo); //update all the payment records
?>

<!-- Begin Page Content -->
<div class="container-fluid">


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


</div>



<?php
require_once 'footer.php';
?>