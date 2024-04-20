<?php
include_once 'header.php';
include_once '../../../includes/admin/homeowners_view.inc.php';
?>

<div class="container-fluid">

    <div class="row">
        <div class="d-block d-sm-none">
            <h3 class="h3 fw-b smallscreen-h3">Add Homeowner</h3>
        </div>
    </div>

    <div class="row">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card shadow mb-8 smallscreen-card">
                <div class="d-none d-sm-flex align-items-center justify-content-between ml-4 mt-4 mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Add Homeowner</h1>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form class="user" method="post" action="../../../includes/admin/homeowner.inc.php">
                        <div class="d-flex justify-content-start ">
                            <h5>Personal Details</h5>
                        </div>
                        <div>
                            <?php
                            check_add_homeowner_errors();
                            creation_success();
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <input type="text" class="form-control form-control-user form-control-color" id="first_name" name="first_name" placeholder="First Name">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <input type="text" class="form-control form-control-user form-control-color" id="last_name" name="last_name" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <input type="email" class="form-control form-control-user form-control-color" id="email" name="email" placeholder="Email Address">
                                <div class="mt-1 ml-2"><span id="emailValidationResult"></span></div>
                            </div>

                            <div class="col-sm-6 mb-3 homeowner-field">
                                <input type="tel" class="form-control form-control-user form-control-color" id="number" name="number" placeholder="Phone Number" minlength="11">
                                <div class="mt-1 ml-2"><span id="numberError" class="error"></span></div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-start ">
                            <h5>Address</h5>
                        </div>
                        <div class="row">

                            <div class="col-sm-3 mb-3">
                                <input type="text" class="form-control form-control-user form-control-color" id="block" name="block" placeholder="Block">
                            </div>
                            <div class="col-sm-3 mb-3">
                                <input type="text" class="form-control form-control-user form-control-color" id="lot" name="lot" placeholder="Lot">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <input type="text" class="form-control form-control-user form-control-color" id="street" name="street" placeholder="Street">
                            </div>
                        </div>
                        <div class="col-sm-12 text-center"> <!-- Center the button horizontally within its parent container -->
                            <button type="submit" class="btn custom-btn btn-user col-sm-3 mb-2 mb-sm-0" id="submitButton">
                                Create
                            </button>
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