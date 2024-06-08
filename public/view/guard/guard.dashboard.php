<?php

require_once 'header.php';
require_once '../../../includes/dbh.inc.php';
require_once '../../../includes/CheckQrStatus_model.inc.php';
require_once '../../../includes/CheckQrStatus_contr.inc.php';

check_registration_status($pdo); //update all the payment records
?>

<style>
    .card {
        height: 400px;
    }

    .hover-grow {
        transition: transform 0.3s ease;
    }

    .hover-grow:hover {
        transform: scale(1.10);
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

        <div class="card">
            <div class="card-body">

                <div class="row justify-content-center mb-3">
                    <div class="col-12 text-center">
                        <h2>Select Assigned Gate</h2>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3">
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
                        <div class="col-sm-12 col-md-6 col-lg-3">
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
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
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
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <a href="scan_qr.php?station=d">
                                <div class="card border border-success border-1 hover-grow">
                                    <div class="card-body">
                                        <img src="../../images/toll_gate.svg" class="img-fluid d-block mx-auto mt-5" height="200" alt="Toll Gate">
                                        <h1 class="text-primary text-center"> Gate 4</h1>
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





            </div>
        </div>

        <!-- <div class="card">
            <div class="card-body">
            </div>
        </div> -->





    </div>

</div>





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