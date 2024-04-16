<?php
include_once 'header.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Content Row -->
    <div class="row mb-4">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4 mt-2 h-100">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">
                        <span class="text-white title-custom-color px-3 py-1 rounded">Accounts</span>
                    </h6>
                </div>

                <!-- Card Body -->
                <div class="card-body h-100 mb-2">
                    <div class="table-responsive mx-auto d-block">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">

                            <tbody>
                                <tr>
                                    <td>
                                        O
                                    </td>
                                    <td>a@gmail.com</td>
                                    <td>MJ</td>
                                </tr>
                                <tr>
                                    <td>
                                        O
                                    </td>
                                    <td>b@gmail.com</td>
                                    <td>Kia</td>
                                </tr>
                                <tr>
                                    <td>
                                        O
                                    </td>
                                    <td>c@gmail.com</td>
                                    <td>Tere</td>
                                </tr>
                                <tr>
                                    <td>
                                        O
                                    </td>
                                    <td>d@gmail.com</td>
                                    <td>Angelika</td>
                                </tr>
                                <tr>
                                    <td>
                                        O
                                    </td>
                                    <td>e@gmail.com</td>
                                    <td>Gorry</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5" style="height: 320px;">
            <div class="d-flex justify-content-center mt-2">
                <h1>Hello, Juan</h1>
            </div>
            <div class="card shadow mb-4 mt-2 mb-2 h-100  ">
                <!-- Card Header - Dropdown -->

                <!-- Card Body -->
                <div class="card-body h-100 m-2">
                    <?php
                    date_default_timezone_set('Asia/Manila'); // Set to Philippines Standard Time (PST)
                    $currentDay = date('l');
                    $currentTime = date('h:i a');
                    $currentDate = date('F jS');
                    ?>
                    <div class="container date-time-color">
                        <div>
                            <h3 class="d-flex justify-content-center mt-5"><?php echo "$currentDay"; ?></h3>
                        </div>
                        <div>
                            <h1 class="d-flex justify-content-center"><?php echo "$currentTime"; ?></h1>
                        </div>
                        <div>
                            <h3 class="d-flex justify-content-center"><?php echo "$currentDate"; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row mb-4 ">
        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-7">
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
                                    <th>Amount</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>MJ Limosinero</td>
                                    <td>200.00</td>
                                </tr>
                                <tr>
                                    <td>Ckeziah Madrid</td>
                                    <td>200.00</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-6 col-lg-5">
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
                                    <th>Amount</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Mark Gorreon</td>
                                    <td>200.00</td>
                                </tr>
                                <tr>
                                    <td>Maria Theresa Bisnar</td>
                                    <td>200.00</td>
                                </tr>
                                <tr>
                                    <td>Angelika Bariring</td>
                                    <td>200.00</td>
                                </tr>
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
include_once 'footer.php'
?>