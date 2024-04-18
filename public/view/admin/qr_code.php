<?php
include_once 'header.php';
include_once '../../../includes/admin/create_qr_view.inc.php';
require_once '../../../includes/Admin_model.inc.php';
require_once '../../../includes/dbh.inc.php';

//for the table
$results = get_qr_list($pdo);

//for the dropdown
$homeowner_email = get_homeowner_email($pdo);

?>

<div class="container-fluid">

    <div class="row">
        <div class="d-block d-sm-none">
            <h3 class="h3 fw-b smallscreen-h3">QR Code</h3>
        </div>
    </div>

    <div class="row">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card shadow mb-8 smallscreen-card">
                <div class="d-sm-flex align-items-center justify-content-between ml-4 mt-4">
                    <h6 class="h3 text-gray-800 smallscreen-h6-text">QR Code Register</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form class="user" method="post" action="../../../includes/admin/create_qr.inc.php">
                        <?php
                        check_create_vehicle_errors();
                        creation_success(); ?>
                        <div class="row ">
                            <div class="col-sm-6 mb-3">
                                <select class="form-control form-control-drop-down form-control-color" id="dropdownMenu" name="email">
                                    <option value="">Email Address</option>
                                    <?php foreach ($homeowner_email as $email) : ?>
                                        <option value="<?= $email['email'] ?>"><?= $email['email'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <input type="text" class="form-control form-control-user form-control-color readonly-color" id="address" name="address" placeholder="Address" value="Default Address" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <input type="text" class="form-control form-control-user form-control-color" id="vehicle_type" name="vehicle_type" placeholder="Vehicle Type">
                            </div>
                            <div class="col-sm-4 mb-3">
                                <input type="text" class="form-control form-control-user form-control-color" id="wheel" name="wheel" placeholder="Vehicle Wheels">
                            </div>
                            <div class="col-sm-4 mb-3">
                                <input type="text" class="form-control form-control-user form-control-color" id="plate_number" name="plate_number" placeholder="Plate No">
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <button class="btn custom-btn btn-user col-sm-3 mb-2 mb-sm-0">
                                Create
                            </button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card shadow mb-8 smallscreen-card">
                <div class="d-sm-flex align-items-center justify-content-between ml-4 mt-4">
                    <h6 class="h3 text-gray-800 smallscreen-h6-text">QR Code List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Plate Number</th>
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
                                    $qr_id = $row['qr_id'];
                                    $name = $row['name'];
                                    $address = $row['address'];
                                    $plate_number = $row['plate_number'];

                                    $vehicle_type = $row['vehicle_type'];

                                ?>
                                    <tr>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $address; ?></td>
                                        <td><?php echo $plate_number; ?></td>
                                        <td><?php echo $vehicle_type; ?></td>
                                        <td>
                                            <a href="qr_code_detail.php?qr_id=<?php echo $qr_id; ?>" class="view-qr-detail"> <button class="btn btn-view-pay">View</button></a>
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
</div>

<?php
// include_once 'admin_js.php';
include_once 'admin_js.php';
include_once 'footer.php';
?>