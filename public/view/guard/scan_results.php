<?php
ob_start(); // Start output buffering

require_once '../../../includes/config.session.inc.php';
require_once '../../../includes/guard/vehicle_qr_detail.inc.php';
require_once '../../../includes/ScanResults_contr.inc.php';
require_once '../../../includes/guard/scan_results_view.inc.php';
require_once 'header.php';

require '../../../vendor/autoload.php'; // Include the Composer autoload file

use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;
// Function to publish MQTT messages
function publishMqttMessage($topic, $message)
{
    $server = '190f414dd91543ec9d9e93bd363c9d98.s1.eu.hivemq.cloud'; // HiveMQ Cloud instance URL
    $port = 8883; // Secure MQTT port
    $clientId = 'php-mqtt-client-' . uniqid();
    $username = 'sadseqrity'; // Replace with your HiveMQ Cloud username
    $password = 'Aldetek15'; // Replace with your HiveMQ Cloud password

    $mqtt = new MqttClient($server, $port, $clientId);

    $connectionSettings = (new ConnectionSettings)
        ->setUsername($username)
        ->setPassword($password)
        ->setUseTls(true) // Use TLS for secure connection
        ->setKeepAliveInterval(60)
        ->setLastWillTopic('test/lastwill')
        ->setLastWillMessage('client disconnect')
        ->setLastWillQualityOfService(1);

    $mqtt->connect($connectionSettings, true);
    $mqtt->publish($topic, $message, 0);
    $mqtt->disconnect();
}
?>
<style>
    .danger-text {
        color: red;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="container-fluid">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="guard.dashboard.php">Gate Selection</a></li>
                <li class="breadcrumb-item active" aria-current="page">Scan QR</li>
                <li class="breadcrumb-item active" aria-current="page">Scan Results</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <?php if (isset($_GET['entry']) && $_GET['entry'] === 'success') : ?>
                        <h1 class="text-bolder text-primary text-center mb-3"><?php $pass_message = "";
                                                                                if ($_SESSION['station'] == "Gate 1") {
                                                                                    $pass_message = "PASS";
                                                                                } else if ($_SESSION['station'] = "Gate 2") {
                                                                                    $pass_message = "EXIT";
                                                                                }
                                                                                echo $pass_message . " " . "GRANTED!"; ?></h1>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="container">
                                    <div class="card-body text-center mt-1">
                                        <img src="../../images/details.svg" width="120" alt="Details" class="mb-2">
                                        <h2 class="text-dark fw-bolder mb-0"><?= htmlspecialchars($name); ?></h2>
                                        <hr class="text-dark fw-bolder">
                                        <p class="text-muted fw-bolder mb-2"><?= htmlspecialchars($address); ?></p>
                                        <p class="text-muted fw-bolder mb-2">With Plate Number <u><?= htmlspecialchars($plate_number); ?></u></p>
                                        <p class="text-muted fw-bolder mb-0"><?= htmlspecialchars($vehicle_color); ?> <?= htmlspecialchars($wheel); ?>-wheel <?= htmlspecialchars($vehicle_type); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="container border border-2 border-primary shadow-sm">
                                    <div class="card-body text-center" style="min-height: 300px;">
                                        <?php
                                        $qrImageData = view_qr($qr_code);
                                        if ($qrImageData) : ?>
                                            <div class="mb-3">
                                                <img src="data:image/png;base64,<?= base64_encode($qrImageData); ?>" alt="QR Code" class="img-fluid" />
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <script>
                            // JavaScript to send commands to the ESP8266
                            function sendRequest(url) {
                                const xhttp = new XMLHttpRequest();
                                xhttp.open("GET", url, true);
                                xhttp.send();
                            }

                            // Wait for 1 second and then send the open command
                            setTimeout(function() {
                                sendRequest('http://192.168.43.21/0');
                            }, 2000);

                            // Wait for 3 seconds and then send the close command
                            setTimeout(function() {
                                sendRequest('http://192.168.43.21/1');
                            }, 8000);
                        </script> -->
                        <?php
                        // Send MQTT commands
                        publishMqttMessage('esp8266/command', 'open');
                        // sleep(2); // Wait for 2 seconds
                        // publishMqttMessage('esp8266/command', 'close');
                        ?>
                    <?php elseif (isset($_GET['entry']) && $_GET['entry'] === 'denied') : ?>
                        <h1 class="text-bolder danger-text text-center mb-3">PASS DENIED!</h1>
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <div><img src="../../images/stop.svg" class="img-fluid access-denied-image" height="450" width="450"></div>
                            </div>
                        </div>
                    <?php elseif (isset($_GET['entry']) && $_GET['entry'] === 'wrong') : ?>
                        <h1 class="text-bolder danger-text text-center mb-3">PASS DENIED!</h1>
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <div><img src="../../images/wrong_gate.svg" class="img-fluid access-denied-image" height="450" width="450"></div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';

// Redirect to another page after 10 seconds
if (isset($_GET['entry']) && $_GET['entry'] === 'success') {
    header("refresh:10;url=scan_qr.php");
} else {
    header("refresh:3;url=scan_qr.php");
}
exit;

// Ensure subsequent code is not executed
ob_end_flush(); // Flush the output buffer
?>