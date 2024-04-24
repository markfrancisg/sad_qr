<?php
if (isset($_POST['email'])) {
    $host = 'localhost';
    $dbname = 'sad_seqrity';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $email = $_POST['email'];

        // Check if email exists in the database
        $query = "SELECT COUNT(*) as count FROM homeowners WHERE email = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $exists = ($row['count'] > 0);

        // Return the result as JSON
        echo json_encode(['exists' => $exists]);
    } catch (PDOException $e) {
        // Handle database connection error
        echo json_encode(['error' => 'Database connection error: ' . $e->getMessage()]);
    }
} else {
    // Handle case where email parameter is not provided
    echo json_encode(['error' => 'Email parameter is missing']);
}
