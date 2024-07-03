<?php
//connect to database
$host = "localhost";
$dbname = "u769397434_sad_seqrity";
$dbusername = "u769397434_sanlorenzo";
$dbpassword = "Aldetek15";

try {
    $pdo = new PDO("mysql:host=$host; dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed " . $e->getMessage());
}
