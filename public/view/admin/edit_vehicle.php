<?php
require_once '../../../includes/dbh.inc.php';

require_once '../../../includes/Admin_model.inc.php';
include_once '../../../includes/EditVehicleController.php';

// require_once '../../../includes/QrCodeListController.php';
include_once '../../../includes/admin/create_qr_view.inc.php';
include_once 'header.php';


$homeowner_email = get_homeowner_email($pdo);

?>


<!--  Header End -->
<div class="container-fluid">
    <div class="container-fluid">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="vehicle_list.php">Vehicle List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Vehicle</li>
            </ol>
        </nav>


        <div class="card">
            <div class="card-body">

                <h2 class="fw-semibold mb-2 text-center mb-2">Edit Vehicle</h2>

                <div class="container">
                    <form method="post" action="../../../includes/admin/edit_vehicle.inc.php" id="addHomeownerForm" class="needs-validation" novalidate>

                        <div class="row">
                            <div class="col-12 col-md-12">
                                <?php

                                ?>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Block 1, Lot 2, Margarita Street" maxlength="50" value="<?php echo $selectedEmail; ?>" readonly required>
                                    <label for="last_name">Email</label>
                                    <div class="invalid-feedback">Address is required</div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Block 1, Lot 2, Margarita Street" maxlength="30" value="" readonly required>
                                    <label for="last_name">Address</label>
                                    <div class="invalid-feedback">Address is required</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="plate_number" name="plate_number" placeholder="NSA-1111" value="<?php echo $plate_number; ?>" maxlength="10" required>
                                    <label for="plate_number">Plate Number</label>
                                    <div class="invalid-feedback">Plate number is required</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="vehicle_type" name="vehicle_type" placeholder="1" value="<?php echo $vehicle_type; ?>" maxlength="30" required>
                                    <label for="vehicle_type">Vehicle Type</label>
                                    <div class="invalid-feedback">Vehicle type is required</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="wheel" name="wheel" placeholder="1" value="<?php echo $wheel; ?>" maxlength="1" required>
                                    <label for="wheel">Vehicle Wheels</label>
                                    <div class="invalid-feedback">Number of wheels is required</div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="id" name="id" value="<?php echo $id ?>">

                        <div class="row mt-1 mb-3">
                            <div class="d-flex justify-content-start">
                                <small><i>
                                        <b>Note:</b> The email and address are automatically filled in.
                                    </i></small>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12 col-md-6 offset-md-3 d-flex justify-content-center">
                                <button class="btn btn-primary p-3 w-50 mb-2">Edit Vehicle</button>
                            </div>
                            <div class="col-12">
                                <?php
                                check_create_vehicle_errors();
                                ?>
                            </div>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>
</div>


<script src="../../js/qr_code.js"></script>

<?php
include_once 'footer.php';
?>