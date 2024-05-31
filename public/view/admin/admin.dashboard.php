<?php
require_once '../../../includes/dbh.inc.php';
require_once '../../../includes/Admin_model.inc.php';
require_once '../../../includes/Admin_contr.inc.php';
include_once 'header.php';

check_registration_status($pdo); //update all the payment records
$total_homeowners = count_homeowners($pdo);
$total_vehicles = count_vehicles($pdo);
$total_paid = count_paid_vehicles($pdo);
$total_unpaid = count_unpaid_vehicles($pdo);


?>

<!--  Header End -->
<div class="container-fluid">
    <div class="container-fluid">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card bg-success">
                            <div class="card-body">
                                <h5 class="text-light text-center">Homeowners</h5>
                                <h1 class="text-light text-center"><?php echo $total_homeowners ?></h1>
                                <img src="../../images/2.svg" class="img-fluid d-block mx-auto" width="80" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card bg-success">
                            <div class="card-body">
                                <h5 class="text-light text-center">Total Vehicles</h5>
                                <h1 class="text-light text-center"><?php echo $total_vehicles ?></h1>
                                <img src="../../images/1.svg" class="img-fluid d-block mx-auto" width="80" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card bg-success">
                            <div class="card-body">
                                <h5 class="text-light text-center">Paid Vehicles</h5>
                                <h1 class="text-light text-center"><?php echo $total_paid ?></h1>
                                <img src="../../images/1.svg" class="img-fluid d-block mx-auto" width="80" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card bg-success">
                            <div class="card-body">
                                <h5 class="text-light text-center">Unpaid Vehicles</h5>
                                <h1 class="text-light text-center"><?php echo $total_unpaid ?></h1>
                                <img src="../../images/1.svg" class="img-fluid d-block mx-auto" width="80" alt="...">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Logs This Day</h5>
                                <h1 class="text-dark text-center">350</h1>
                                <img src="../../images/2.svg" class="img-fluid d-block mx-auto" width="100" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Logs This Week</h5>
                                <h1 class="text-dark text-center">350</h1>
                                <img src="../../images/1.svg" class="img-fluid d-block mx-auto" width="100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">Mission</div>
                <div class="row">Vision</div>





            </div>
        </div>

        <!-- <div class="card">
            <div class="card-body">
            </div>
        </div> -->





    </div>

</div>


<?php
include_once 'footer.php';
?>