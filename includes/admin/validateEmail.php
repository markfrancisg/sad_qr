<?php
require_once '../Admin_model.inc.php';
require_once '../Admin_contr.inc.php';

$email = $_POST['email'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<span class="error">Invalid email format</span>';
} else {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sad_seqrity";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to check if the email exists
    $sql = "SELECT email FROM homeowners WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<span class="error">Email is taken!</span>';
    }

    // Close connection
    $conn->close();
}
