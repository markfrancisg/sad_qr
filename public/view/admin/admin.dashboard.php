<?php
include_once 'header.php';
require_once '../../../includes/dbh.inc.php';
require_once '../../../includes/Admin_model.inc.php';

$results1 = get_account_list($pdo);
$results2 = get_five_paid_qr($pdo);
$results3 = get_five_unpaid_qr($pdo);
$admin_email = $_SESSION['account_email'];
$admin_name = get_admin_name($pdo, $admin_email);

?>


<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Content Row -->
    <div class="row mb-5">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4 mt-2 h-100">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">
                        <span class="text-white title-custom-color px-3 py-1 rounded">Accounts</span>
                    </h6>
                </div>

                <div class="card-body h-100 mb-2">
                    <div class="table-responsive mx-auto d-block">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">

                            <tbody>
                                <?php
                                foreach ($results1 as $row1) {
                                    if ($_SESSION["account_email"] === $row1['account_email']) {
                                        continue;
                                    }
                                    $name1 = $row1['account_name'];
                                    $email1 = $row1['account_email'];
                                ?>
                                    <tr>
                                        <td>O</td>
                                        <td><?php echo $name1; ?></td>
                                        <td><?php echo $email1; ?></td>

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

        <div class="col-xl-4 col-lg-5 order-sm-0 order-1">
            <div class="d-flex justify-content-center mt-1">
                <h1 class="text-center">Hello, <?php echo $admin_name; ?>!</h1>
            </div>
            <div class="card shadow m-2">
                <div class="card-body">
                    <?php
                    date_default_timezone_set('Asia/Manila'); // Set to Philippines Standard Time (PST)
                    $currentDay = date('l');
                    $currentTime = date('h:i a');
                    $currentDate = date('F jS');
                    ?>
                    <div class="container date-time-color">
                        <div>
                            <h3 class="text-center mt-5"><?php echo "$currentDay"; ?></h3>
                        </div>
                        <div>
                            <h1 class="text-center"><?php echo "$currentTime"; ?></h1>
                        </div>
                        <div>
                            <h3 class="text-center"><?php echo "$currentDate"; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row mt-5 ">
        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-7 mt-3">
            <div class="card shadow mb-4 h-100">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">
                        <span class="text-white title-custom-color px-3 py-1 rounded">Paid</span>
                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive mx-auto d-block">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                </tr>
                            </thead>

                            <?php
                            foreach ($results2 as $row2) {
                                $name2 = $row2['name'];
                                $address2 = $row2['address'];

                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $name2; ?></td>
                                        <td><?php echo $address2; ?></td>
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

        <!-- Pie Chart -->
        <div class="col-xl-6 col-lg-5 mt-3">
            <div class="card shadow mb-4 h-100">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">
                        <span class="text-white title-custom-color px-3 py-1 rounded">Unpaid</span>
                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive mx-auto d-block">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                </tr>
                            </thead>

                            <?php
                            foreach ($results3 as $row3) {

                                $name3 = $row3['name'];
                                $address3 = $row3['address'];

                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $name3; ?></td>
                                        <td><?php echo $address3; ?></td>
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
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->
<?php
include_once 'footer.php';
?>