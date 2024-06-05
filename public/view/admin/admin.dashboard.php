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
$total_log_daily = count_log_daily($pdo);
$total_log_weekly = count_log_weekly($pdo);

?>

<style>
    .hover-grow {
        transition: transform 0.3s ease;
    }

    .hover-grow:hover {
        transform: scale(1.10);
        /* Adjust the scale value as needed */
    }
</style>

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

                <div class="container-fluid">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="card bg-success border border-success border-1 rounded-2">
                                <div class="card-body ">
                                    <h4 class="card-title  text-light text-center">Daily Logs</h4>
                                    <h1 class="text-light text-center"><?php echo $total_log_daily ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="card bg-success border border-success border-1 rounded-2">
                                <div class="card-body">
                                    <h4 class="card-title text-light text-center">Weekly Logs</h4>
                                    <h1 class="text-light text-center"><?php echo $total_log_weekly ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <a href="homeowner_list.php">
                                <div class="card border border-success border-1 hover-grow">
                                    <div class="card-body">
                                        <h5 class="text-primary text-center">Homeowners</h5>
                                        <h1 class="text-primary text-center"><?php echo $total_homeowners ?></h1>
                                        <img src="../../images/homeowners.svg" class="img-fluid d-block mx-auto" width="80" alt="...">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <a href="vehicle_list.php">
                                <div class="card border border-success border-1 hover-grow">
                                    <div class="card-body">
                                        <h5 class="text-primary text-center">Total Vehicles</h5>
                                        <h1 class="text-primary text-center"><?php echo $total_vehicles ?></h1>
                                        <img src="../../images/vehicle.svg" class="img-fluid d-block mx-auto" width="80" alt="...">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <a href="vehicle_list_paid.php">
                                <div class="card border border-success border-1 hover-grow">
                                    <div class="card-body">
                                        <h5 class="text-primary text-center">Paid Vehicles</h5>
                                        <h1 class="text-primary text-center"><?php echo $total_paid ?></h1>
                                        <img src="../../images/paid.svg" class="img-fluid d-block mx-auto" width="80" alt="...">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <a href="vehicle_list_unpaid.php">
                                <div class="card border border-success border-1 hover-grow">
                                    <div class="card-body">
                                        <h5 class="text-primary text-center">Unpaid Vehicles</h5>
                                        <h1 class="text-primary text-center"><?php echo $total_unpaid ?></h1>
                                        <img src="../../images/unpaid.svg" class="img-fluid d-block mx-auto" width="80" alt="...">
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
include_once 'footer.php';
?>