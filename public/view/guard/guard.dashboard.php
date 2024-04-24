<?php

require_once 'header.php';

?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="row">


        <div class="col-3">
            <a href="scan_qr.php?station=a">
                <div class="card station-card card-hover">
                    Station A
                </div>
            </a>
        </div>

        <div class="col-3">
            <a href="scan_qr.php?station=b">
                <div class="card station-card card-hover">
                    Station B
                </div>
            </a>
        </div>

        <div class="col-3">
            <a href="scan_qr.php?station=c">
                <div class="card station-card card-hover">
                    Station C
                </div>
            </a>
        </div>

        <div class="col-3">
            <a href="scan_qr.php?station=d">
                <div class="card station-card card-hover">
                    Station D
                </div>
            </a>
        </div>







    </div>


</div>



<?php
require_once 'footer.php';
?>