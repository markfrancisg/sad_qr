<?php
//connect to database
$host = "localhost";
$dbname = "data_schema_sad";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO("mysql:host=$host; dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed " . $e->getMessage());
}
