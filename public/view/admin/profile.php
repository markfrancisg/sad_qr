<?php
include_once 'header.php';
require_once '../../../includes/dbh.inc.php';
require_once '../../../includes/Admin_model.inc.php';

//send arguments to get the admin_details
$results = get_admin_details($pdo, intval($_SESSION['account_id']));

foreach ($results as $result) {
    $account_email =  $result['account_email'];
    $role_description =  $result['role_description'];
    $account_first_name = $result['account_first_name'];
    $account_last_name = $result['account_last_name'];
    $account_number = $result['account_number'];
}

?>

<div class="container-fluid">

    <div class="row">
        <div class="d-block d-sm-none">
            <h3 class="h3 fw-b smallscreen-h3">Admin Profile</h3>
        </div>
    </div>

    <div class="row">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card shadow mb-8 smallscreen-card">
                <div class="d-sm-flex align-items-center justify-content-between ml-4 mt-4">
                    <h6 class="h3 text-gray-800 smallscreen-h6-text">Admin Profile</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 mb-3">
                            <label for="first_name" class="text-secondary">First Name</label>
                            <div class="form-control form-control-user form-control-color"><?php echo $account_first_name; ?></div>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="last_name" class="text-secondary">Last Name</label>
                            <div class="form-control form-control-user form-control-color"><?php echo $account_last_name; ?></div>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="role_description" class="text-secondary">Role Description</label>
                            <div class="form-control form-control-user form-control-color"><?php echo $role_description; ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="email" class="text-secondary">Email</label>
                            <div class="form-control form-control-user form-control-color"><?php echo $account_email; ?></div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="number" class="text-secondary">Phone Number</label>
                            <div class="form-control form-control-user form-control-color"><?php echo $account_number; ?></div>
                        </div>
                    </div>
                    <!-- <div class="row">
        <div class="col-sm-12 text-center">
            <button class="btn custom-btn btn-user col-sm-3">
                Edit Profile
            </button>
        </div>
    </div> -->
                </div>



            </div>
        </div>
    </div>




</div>





<?php
include_once 'footer.php';
?>