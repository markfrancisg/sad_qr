<?php
include_once 'header.php';
// include_once '../../../includes/admin/homeowners_view.inc.php';
include_once '../../../includes/guard/visitor_view.inc.php';
?>


<!--  Header End -->
<div class="container-fluid">
    <div class="container-fluid">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Add Visitor</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">

                <h2 class="fw-semibold mb-2 text-center">Add Visitor</h2>

                <div class="container">
                    <form method="post" action="../../../includes/guard/visitor.inc.php" id="" class="needs-validation" novalidate>

                        <div class="row mt-5">
                            <div class="col-12 col-md-12">

                            </div>
                        </div>

                        <div class="row">
                            <?php
                            visitor_success_message();
                            ?>
                            <h5 class="text-muted">Personal Details</h5>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="visitor_first_name" name="visitor_first_name" placeholder="Juanito" maxlength="30" required>
                                    <label for="first_name">First Name</label>
                                    <div class="invalid-feedback">First name is required</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="visitor_last_name" name="visitor_last_name" placeholder="Dela Cruz" maxlength="30" required>
                                    <label for="last_name">Last Name</label>
                                    <div class="invalid-feedback">Last name is required</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="purpose" name="purpose" placeholder="Visiting" maxlength="50" required>
                                    <label for="last_name">Purpose</label>
                                    <div class="invalid-feedback">Purpose is required</div>
                                </div>
                            </div>
                        </div>

                        <h5 class="text-muted mt-2">Vehicle Details</h5>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="visitor_plate_number" name="visitor_plate_number" placeholder="NSA-1111" maxlength="8" required oninput="validateAndTransformInput(this)">
                                    <label for="plate_number">Plate Number</label>
                                    <div class="invalid-feedback" id="plateFeedback">Plate number is required</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-floating mb-3">
                                    <select class="form-select form-select-md  rounded-1 p-3" name="visitor_vehicle_type" id="visitor_vehicle_type" aria-label="Vehicle Type" required>
                                        <option value="" disabled selected>Vehicle Type</option>
                                        <option value="Hatchback">Hatchback</option>
                                        <option value="Sedan">Sedan</option>
                                        <option value="Coupe">Coupe</option>
                                        <option value="Convertible">Convertible</option>
                                        <option value="SUV">SUV</option>
                                        <option value="MPV">MPV</option>
                                        <option value="Crossover">Crossover</option>
                                        <option value="Pick Up Truck">Pick Up Truck</option>
                                        <option value="Van">Van</option>
                                        <option value="Motorcycle">Motorcycle</option>
                                    </select>
                                    <div class="invalid-feedback">Vehicle Type is required</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="visitor_wheel" name="visitor_wheel" placeholder="4" maxlength="2" value="" readonly required>
                                    <label for="visitor_wheel">Wheels</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="visitor_vehicle_color" name="visitor_vehicle_color" placeholder="1" maxlength="30" required>
                                    <label for="vehicle_type">Vehicle Color</label>
                                    <div class="invalid-feedback">Vehicle color is required</div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 col-md-6 offset-md-3 d-flex justify-content-center">
                                <button class="btn btn-primary p-3 w-50 mb-2" type="submit" disabled>Add Visitor</button>
                            </div>
                            <div class="col-12">
                                <?php
                                visitor_error_message();
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../js/visitor.js"></script>

<?php
include_once 'footer.php';
?>