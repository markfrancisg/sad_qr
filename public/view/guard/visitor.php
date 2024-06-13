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
                                    <input type="text" class="form-control" id="visitor_plate_number" name="visitor_plate_number" placeholder="NSA-1111" maxlength="10" required>
                                    <label for="plate_number">Plate Number</label>
                                    <div class="invalid-feedback">Plate number is required</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="visitor_vehicle_type" name="visitor_vehicle_type" placeholder="1" maxlength="30" required>
                                    <label for="vehicle_type">Vehicle Type</label>
                                    <div class="invalid-feedback">Vehicle type is required</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="visitor_wheel" name="visitor_wheel" placeholder="1" maxlength="1" required>
                                    <label for="wheel">Vehicle Wheels</label>
                                    <div class="invalid-feedback">Number of wheels is required</div>
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