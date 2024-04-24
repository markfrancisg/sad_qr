<?php

require_once 'header.php';
require_once '../../../includes/SetStation_contr.inc.php';

set_station();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="container">
        <h1>Scan QR Codes</h1>
        <div class="section">
            <div id="my-qr-reader">
            </div>
        </div>
    </div>

</div>

<script src="https://unpkg.com/html5-qrcode"></script>
<script src="../../js/scanner.js"></script>

<?php
require_once 'footer.php';

?>