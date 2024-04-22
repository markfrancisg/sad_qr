<?php

// Check if the email parameter exists in the POST request
if (isset($_POST['email'])) {
    // Get the email parameter from the POST request
    $email = $_POST['email'];

    // Validate the email address format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Return an error message if the email address is invalid
        echo 'Invalid email address';
        exit();
    }

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "sad_seqrity";

    // Create a new PDO instance
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare a SQL statement to check if the email exists
        $stmt = $conn->prepare("SELECT * FROM homeowners WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check if the email exists in the database
        if ($stmt->rowCount() > 0) {
            // Email is already taken
            echo 'Email is already taken';
        } else {
            // Email is available
            echo 'Email is available';
        }
    } catch (PDOException $e) {
        // Return an error message if there's an error with the database connection or query
        echo "Error: " . $e->getMessage();
    }

    // Close the database connection
    $conn = null;
} else {
    // Return an error message if the email parameter is missing in the POST request
    echo 'Email parameter is missing';
}
