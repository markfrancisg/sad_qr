<?php
include_once 'header.php';
require_once '../../../includes/Admin_model.inc.php';
require_once '../../../includes/dbh.inc.php';
// require_once '../../../includes/QrCodeListController.php';
include_once '../../../includes/admin/create_qr_view.inc.php';

$homeowner_email = get_homeowner_email($pdo);
?>


<style>
    .btn-remove {
        display: none;
    }

    .image-link img {
        transition: transform 0.3s ease;
    }

    .image-link:hover img {
        transform: scale(1.1);
    }
</style>

<!--  Header End -->
<div class="container-fluid">
    <div class="container-fluid">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Register Vehicle</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">

                <h2 class="fw-semibold mb-2 text-center mb-2">Register Vehicle</h2>

                <div class="container">
                    <form method="post" action="../../../includes/admin/create_qr.inc.php" id="qrForm" class="needs-validation" novalidate>

                        <div class="row">
                            <div class="col-12 col-md-12">
                                <?php
                                creation_success();
                                ?>
                            </div>
                        </div>

                        <?php if (empty($homeowner_email)) : ?>
                            <div class="row mt-3">
                                <div class="col-12 d-flex justify-content-center align-items-center flex-column">
                                    <a href="homeowners.php" class="image-link">
                                        <img src="../../images/add_homeowner.svg" alt="Add homeowner" width="200" height="200">
                                    </a>
                                    <h5 class="mt-3">Add a homeowner first</h5>
                                </div>
                            </div>
                        <?php else : ?>

                            <div class="row mt-3">
                                <div class="col-12 col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="email" id="email" list="emailOptions" placeholder="Email Address" required>
                                        <label for="email">Email Address</label>
                                        <datalist id="emailOptions">
                                            <?php foreach ($homeowner_email as $email) : ?>
                                                <option value="<?= $email['email'] ?>"></option>
                                            <?php endforeach; ?>
                                        </datalist>
                                        <div class="invalid-feedback" id="emailFeedback">Email is required.</div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Juan Dela Cruz" maxlength="50" value="" readonly required>
                                        <label for="name">Name</label>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Block 1, Lot 2, Margarita Street" maxlength="30" value="" readonly required>
                                        <label for="address">Address</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row vehicle">
                                <div class="col-12 col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="plate_number" name="plate_number" placeholder="NSA-1111" maxlength="8" required oninput="validateAndTransformInput(this)">
                                        <label for="plate_number">Plate Number</label>
                                        <div class="invalid-feedback" id="plateFeedback">Plate number is required</div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="vehicle_type" name="vehicle_type" placeholder="Car" maxlength="30" required oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '');">
                                        <label for="vehicle_type">Vehicle Type</label>
                                        <div class="invalid-feedback">Vehicle type is required</div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="vehicle_color" name="vehicle_color" placeholder="Red" maxlength="30" required oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '');">
                                        <label for="vehicle_color">Vehicle Color</label>
                                        <div class="invalid-feedback">Vehicle color is required</div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="wheel" name="wheel" placeholder="4" maxlength="1" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                        <label for="wheel">Wheels</label>
                                        <div class="invalid-feedback">Number of wheels is required</div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-1 mb-3">
                                <div class="d-flex justify-content-start">
                                    <small><i>
                                            <b>Note:</b> The name and address will be automatically filled in once the email address is selected.
                                        </i></small>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-12 col-md-6 offset-md-3 d-flex justify-content-center">
                                    <button class="btn btn-primary p-3 w-50 mb-2" type="submit" id="submitButton" disabled>Register Vehicle</button>
                                </div>
                                <div class="col-12">
                                    <?php
                                    check_create_vehicle_errors();
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>
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