<?php
// Database connection parameters
$host = 'localhost';
$db   = 'sad_seqrity';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Data Source Name
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// PDO options
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Create a PDO instance
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if (isset($_POST["checkbox_value"])) {
    $query = "DELETE FROM homeowners WHERE ho_id = :ho_id";
    $statement = $pdo->prepare($query);

    foreach ($_POST["checkbox_value"] as $ho_id) {
        $statement->execute([':ho_id' => $ho_id]);
    }

    // Return a success message
    echo "Selected records have been deleted successfully.";
} else {
    echo "No records selected for deletion.";
}
