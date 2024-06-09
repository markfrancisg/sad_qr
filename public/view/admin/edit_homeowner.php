<?php
include_once '../../../includes/dbh.inc.php';
include_once '../../../includes/Admin_model.inc.php';
include_once '../../../includes/EditHomeownerController.php';
include_once '../../../includes/admin/homeowners_view.inc.php';
include_once 'header.php';

?>


<!--  Header End -->
<div class="container-fluid">
    <div class="container-fluid">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="homeowner_list.php">Homeowner List </a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Homeowner</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">

                <h2 class="fw-semibold mb-2 text-center">Edit Homeowner</h2>

                <div class="container">
                    <form method="post" action="../../../includes/admin/edit_homeowners.inc.php" id="addHomeownerForm" class="needs-validation" novalidate>

                        <div class="row mt-5">
                            <div class="col-12 col-md-12">

                            </div>
                        </div>

                        <div class="row">
                            <?php
                            // creation_success();
                            ?>
                            <h5 class="text-muted">Personal Details</h5>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Juanito" value="<?php echo $first_name ?>" maxlength="30" required>
                                    <label for="first_name">First Name</label>
                                    <div class="invalid-feedback">First name is required</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Dela Cruz" value="<?php echo $last_name ?>" maxlength="30" required>
                                    <label for="last_name">Last Name</label>
                                    <div class="invalid-feedback">Last name is required</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?php echo $email ?>" maxlength="50" required>
                                    <label for="email">Email Address</label>
                                    <div class="invalid-feedback" id="emailFeedback">Email is required</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="number" name="number" placeholder="09XXXXXXXXX" value="<?php echo $number ?>" maxlength="11" required>
                                    <label for="number">Phone Number</label>
                                    <div class="invalid-feedback" id="numberFeedback">Phone number is required</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <h5 class="text-muted">Full Address</h5>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="block" name="block" placeholder="1" value="<?php echo $block ?>" maxlength="3" required>
                                    <label for="block">Block</label>
                                    <div class="invalid-feedback">Block number is required</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="lot" name="lot" placeholder="1" value="<?php echo $lot ?>" maxlength="3" required>
                                    <label for="lot">Lot</label>
                                    <div class="invalid-feedback">Lot number is required</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="street" name="street" placeholder="Peony" value="<?php echo $street ?>" maxlength="50" required>
                                    <label for="street">Street</label>
                                    <div class="invalid-feedback">Street is required</div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="old_email" name="old_email" value="<?php echo $old_email ?>">

                        <div class="row mt-3">
                            <div class="col-12 col-md-6 offset-md-3 d-flex justify-content-center">
                                <button class="btn btn-primary p-3 w-50 mb-2">Edit Homeowner</button>
                            </div>
                            <div class="col-12">
                                <?php
                                check_add_homeowner_errors();
                                ?>
                            </div>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>

</div>

<script src="../../js/add_homeowners.js"></script>

<?php
include_once 'footer.php';
?>