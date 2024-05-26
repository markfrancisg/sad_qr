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
        let scanner = null; // Declare scanner variable globally

        // Function to start the scanner
        function startScanner() {
            Instascan.Camera.getCameras().then((cameras) => {
                if (cameras.length > 0) {
                    scanner = new Instascan.Scanner({
                        video: document.getElementById("preview"),
                    });

                    // Define scan event listener
                    scanner.addListener("scan", function(content) {
                        window.location.href = "../../../includes/qr_code_scanner.inc.php?qr_text=" + encodeURIComponent(content);
                    });

                    scanner.start(cameras[0]); // Start scanning with the first camera
                } else {
                    console.error("No camera detected!");
                }
            });
        }

        // Function to stop the scanner
        function stopScanner() {
            if (scanner !== null) {
                scanner.stop(); // Stop the scanner if it's active
            }
        }

        // Check if the page is visible
        function handleVisibilityChange() {
            if (document.hidden) {
                stopScanner(); // Stop the scanner if the page is not visible
            } else {
                startScanner(); // Start the scanner if the page becomes visible
            }
        }

        // Add event listener for visibility change
        document.addEventListener("visibilitychange", handleVisibilityChange, false);

        // Start the scanner when the page loads
        startScanner();
    </script>

</div>

<?php
require_once 'footer.php';

?>