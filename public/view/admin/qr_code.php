<?php
include_once 'header.php';
include_once '../../../includes/admin/create_qr_view.inc.php';
require_once '../../../includes/Admin_model.inc.php';
require_once '../../../includes/dbh.inc.php';

$results = get_qr_list($pdo);
$homeowner_email = get_homeowner_email($pdo);

?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">QR Code Register</h1>
    </div>

    <!-- Content Row -->
    <!-- ../../includes/admin/create_qr.inc.php -->
    <div class="row col-12">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card mb-8">
                <!-- Card Body -->
                <div class="card-body">
                    <form class="user" method="post" action="../../../includes/admin/create_qr.inc.php">
                        <div class="form-group row d-flex justify-content-between">
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                <select class="form-control" id="dropdownMenu" name="email">
                                    <option value="">Select email</option>
                                    <?php
                                    foreach ($homeowner_email as $email) {
                                        echo '<option value="' . $email['email'] . '">' . $email['email'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                <input type="number" class="form-control form-control-user" id="wheel" name="wheel" placeholder="Vehicle Wheels">
                            </div>
                        </div>
                        <div class="form-group row d-flex justify-content-between">
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="address" name="address" placeholder="Address">
                            </div>
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="vehicle_type" name="vehicle_type" placeholder="Vehicle Type">
                            </div>
                        </div>
                        <div class="col-sm-12 text-center"> <!-- Center the button horizontally within its parent container -->
                            <button class="btn btn-primary btn-user col-sm-3 mb-2 mb-sm-0">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
                <?php check_create_qr_errors() ?>
            </div>
        </div>
    </div>




    <div class="d-sm-flex align-items-center justify-content-between mt-4">
        <h1 class="h3 mb-0 text-gray-800">QR List</h1>
    </div>
    <div class="row col-12">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card mb-8">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Vehicle Type</th>
                                    <th>View</th>

                                </tr>
                            </thead>
                            <!-- <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Vehicle Type</th>
                                    <th>View</th>

                                </tr>
                            </tfoot> -->
                            <tbody>
                                <?php
                                foreach ($results as $row) {
                                    $name = $row['name'];
                                    $address = $row['address'];
                                    $vehicle_type = $row['vehicle_type'];
                                    $account_id = $row['account_id']
                                ?>
                                    <tr>
                                        <?php
                                        // echo $row['account_id'] . $row['name'] . $row['qr_code'] . $row['address'] . $row['wheel'] . $row['vehicle_type']; 
                                        ?>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $address; ?></td>
                                        <td><?php echo $vehicle_type; ?></td>
                                        <td>
                                            <a href="qr_code_detail.php?account_id=<?php echo $account_id; ?>">View</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- <div class=" modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Account</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Account ID: <span id="accountIdPlaceholder">N/A</span></p>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div> -->


    <?php
    // include_once 'admin_js.php';

    include_once 'footer.php';
    ?>