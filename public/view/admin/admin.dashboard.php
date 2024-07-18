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

$agreement = get_user_agreement($pdo, $_SESSION["account_id"]);

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
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
        <?php if ($_SESSION["role_description"] == "admin") : ?>

            <div class="modal-content">
                <div class="modal-header d-flex flex-column align-items-center">
                    <img src="../../images/logos/san_lorenzo_logo.svg" alt="Subdivision Logo" class="img-fluid mb-2" style="max-width: 100px;">
                    <h3 class="modal-title text-center" id="termsModalLabel">Terms and Conditions</h3>
                </div>
                <div class="modal-body">
                    <p class="text-primary text-justify">
                        As an admin of the San Lorenzo Phase 1 Subdivision SeQRity system, you agree to the following terms and conditions to ensure the safety and privacy of homeowners' data:
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
                    <form id="agreeForm" action="../../../includes/admin/terms.inc.php" method="POST" style="display: inline;">
                        <button type="submit" class="btn btn-primary">I Agree</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($_SESSION["role_description"] == "super_admin") : ?>
            <div class="modal-content">
                <div class="modal-header d-flex flex-column align-items-center">
                    <img src="../../images/logos/san_lorenzo_logo.svg" alt="Subdivision Logo" class="img-fluid mb-2" style="max-width: 100px;">
                    <h3 class="modal-title text-center" id="termsModalLabel">Terms and Conditions</h3>
                </div>
                <div class="modal-body">
                    <p class="text-primary text-justify">
                        As the Super Admin of the San Lorenzo Phase 1 Subdivision SeQRity system, you agree to the following terms and conditions to ensure the safety and privacy of admins' and guards' data:
                    </p>
                    <ul class="list-unstyled text-justify">
                        <li class="mb-2"><i class="bi bi-check-circle text-success"></i> The data collected, including personal information and other related details, will be used solely for the management and operation of the SeQRity system.</li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success"></i> You are responsible for ensuring that all collected data is stored securely and protected from unauthorized access.</li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Under no circumstances will the data be shared with third parties without the explicit consent of the individuals concerned, except as required by law.</li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success"></i> You will comply with all relevant data protection and privacy laws to maintain the confidentiality and integrity of the data.</li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success"></i> In the event of a data breach or security incident, you must promptly notify the affected individuals and take appropriate measures to mitigate any potential harm.</li>
                    </ul>
                    <p class="text-primary text-justify">
                        By accepting these terms, you commit to upholding the highest standards of data security and privacy for the benefit of the admins and guards of San Lorenzo Phase 1 Subdivision.
                    </p>
                </div>
                <div class="modal-footer">
                    <a href="../../../includes/logout.inc.php"><button type="button" class="btn btn-light">I Disagree (Log Out)</button></a>
                    <form id="agreeForm" action="../../../includes/super_admin/terms.inc.php" method="POST" style="display: inline;">
                        <button type="submit" class="btn btn-primary">I Agree</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
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
include_once 'footer.php';
?>