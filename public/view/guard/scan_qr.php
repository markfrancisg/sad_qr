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

    <!-- BREADCRUMB -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="guard.dashboard.php">Gate Selection</a></li>
            <li class="breadcrumb-item active" aria-current="page">Scan QR</li>
        </ol>
    </nav>

    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1><?php echo $_SESSION['station']; ?></h1>
                <video id="preview" style="width: 100%; max-width: 700px; height: auto;"></video>
                <!-- Camera Selection Buttons -->
                <div class="btn-group d-sm-block d-md-none d-lg-none" role="group" aria-label="Camera Selection">
                    <button id="frontCameraBtn" type="button" class="btn btn-primary" onclick="selectCamera('front')">Front Camera</button>
                    <button id="backCameraBtn" type="button" class="btn btn-primary" onclick="selectCamera('back')">Back Camera</button>
                </div>
                <div class="btn-group d-none d-md-block d-lg-none" role="group" aria-label="Camera Selection">
                    <button id="frontCameraBtnMD" type="button" class="btn btn-primary" onclick="selectCamera('front')">Front Camera</button>
                    <button id="backCameraBtnMD" type="button" class="btn btn-primary" onclick="selectCamera('back')">Back Camera</button>
                </div>
                <h5 class="text-center mt-3"><a href="guard.dashboard.php">Select Gate</a></h5>
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

        // for choosing the cameras in mobile devices
        function selectCamera(cameraType) {
            const constraints = {
                video: {
                    facingMode: cameraType
                }
            };

            // Stop any existing stream
            if (window.stream) {
                window.stream.getTracks().forEach(track => {
                    track.stop();
                });
            }

            // Get new camera stream
            navigator.mediaDevices.getUserMedia(constraints)
                .then(function(stream) {
                    const video = document.getElementById('preview');
                    video.srcObject = stream;
                    window.stream = stream; // Store the stream globally to stop later
                })
                .catch(function(error) {
                    console.error('Error accessing media devices.', error);
                });
        }
    </script>

</div>

<?php
require_once 'footer.php';

?>