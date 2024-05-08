<?php

require_once 'header.php';
require_once '../../../includes/SetStation_contr.inc.php';

if (isset($_GET['station'])) {
    set_station();
}
?>
<script type="text/javascript" src="../../js/instascan.min.js"></script>


<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1><?php echo $_SESSION['station']; ?></h1>
                <video id="preview" style="width: 100%; max-width: 700px; height: auto;"></video>
            </div>
        </div>
    </div>
    <script>
        let scanner = new Instascan.Scanner({
            video: document.getElementById("preview"),
        });
        scanner.addListener("scan", function(content) {
            window.location.href =
                "../../../includes/qr_code_scanner.inc.php?qr_text=" + encodeURIComponent(content);
        });
        Instascan.Camera.getCameras().then((cameras) => {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error("No camera detected!");
            }
        });
    </script>

</div>

<?php
require_once 'footer.php';

?>