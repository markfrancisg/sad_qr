<?php

if (isset($_POST['email'])) {
    $host = 'localhost';
    $dbname = 'sad_seqrity'; // Replace with your actual database name
    $username = 'root'; // Replace with your actual database username
    $password = ''; // Replace with your actual database password

    // Create a PDO connection to your database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Get the email value from the AJAX request
    $email = $_POST['email'];

    // Prepare and execute a query to check if the email exists in the database
    $query = "SELECT COUNT(*) as count FROM homeowners WHERE email = :email";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':email', $email);
    $statement->execute();

    // Fetch the result
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    // Determine if the email exists
    $exists = ($row['count'] > 0);

    // Return the result as JSON
    echo json_encode(['exists' => $exists]);
} else {
    // Handle case where email parameter is not provided
    echo json_encode(['error' => 'Email parameter is missing']);
}
