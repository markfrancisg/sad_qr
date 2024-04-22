<?php
include_once 'header.php';
require_once '../../../includes/dbh.inc.php';
require_once '../../../includes/Admin_model.inc.php';
require_once '../../../includes/Admin_contr.inc.php';

check_registration_status($pdo); //update all the payment records
$results1 = get_account_list($pdo);
$results2 = get_five_paid_qr($pdo);
$results3 = get_five_unpaid_qr($pdo);
$admin_email = $_SESSION['account_email'];
$admin_name = get_admin_name($pdo, $admin_email);

?>


<!-- Begin Page Content -->
<div class="container-fluid smallscreen-bg">

    <!-- This will be hidden in large and medium screens -->
    <div class="row">
        <div class="d-block d-sm-none">
            <h3 class="h3 fw-b smallscreen-h3">Dashboard</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <a href="accounts.php">
                <div class="card card-hover shadow mb-4 h-100 smallscreen-card">
                    <h6 class="mt-4 ml-4 font-weight-bold smallscreen-h6-title">
                        <span class="text-white title-custom-color rounded">Accounts</span>
                    </h6>
                    <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between smallscreen-card">

                </div> -->

                    <div class="card-body h-100 mb-2 mt-0">
                        <div class="table-responsive mx-auto d-block">
                            <table class="table" id="dataTable" width="100%" cellspacing="0">

                                <tbody>
                                    <?php
                                    $counter = 1;
                                    foreach ($results1 as $row1) {
                                        if ($_SESSION["account_email"] === $row1['account_email']) {
                                            continue;
                                        }
                                        $first_name1 = $row1['account_first_name'];
                                        $last_name1 = $row1['account_last_name'];
                                        $email1 = $row1['account_email'];
                                    ?>
                                        <tr>
                                            <td><?php echo $counter; ?></td>
                                            <td><?php echo $first_name1 . " " . $last_name1; ?></td>
                                            <td><?php echo $email1; ?></td>

                                        </tr>
                                    <?php
                                        $counter++;
                                    }
                                    ?>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- This will be hidden in large and medium screens -->
        <div class="col-xl-4 col-lg-5 order-sm-0 order-1 d-none d-lg-block">
            <div class="d-flex justify-content-center">
                <h3 class="text-center">Hello, <?php echo $admin_name; ?>!</h3>
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
                            <h3 class="text-center mt-5 day"><?php echo "$currentDay"; ?></h3>
                        </div>
                        <div>
                            <h1 class="text-center time"><?php echo "$currentTime"; ?></h1>
                        </div>
                        <div>
                            <h3 class="text-center date"><?php echo "$currentDate"; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-7 mt-3">
            <a href="balance.php#paid_accounts">
                <div class="card card-hover shadow mb-4 h-100 smallscreen-card">
                    <h6 class="mt-4 ml-4 font-weight-bold smallscreen-h6-title">
                        <span class="text-white title-custom-color rounded">Paid</span>
                    </h6>
                    <!-- Card Header - Dropdown -->
                    <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                </div> -->
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
                                    $name2 = $row2['first_name'] . " " . $row2['last_name'];
                                    $address2 = "Block " . $row2['block'] . ", Lot " . $row2['lot'] . ", " . $row2['street'] . " Street";

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
            </a>
        </div>

        <div class="col-xl-6 col-lg-7 mt-3">
            <a href="balance.php#unpaid_accounts">
                <div class="card card-hover shadow mb-4 h-100 smallscreen-card">
                    <!-- Card Header - Dropdown -->
                    <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                </div> -->
                    <h6 class="mt-4 ml-4 font-weight-bold smallscreen-h6-title">
                        <span class="text-white title-custom-color rounded">Unpaid</span>
                    </h6>
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

                                    $name3 = $row3['first_name'] . " " . $row3['last_name'];
                                    $address3 = "Block " . $row3['block'] . ", Lot " . $row3['lot'] . ", " . $row3['street'] . " Street";

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
            </a>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->
<?php
include_once 'footer.php';
?>