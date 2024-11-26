<?php

// Database configurations
$host = "127.0.0.1"; // MySQL server address
$dbname = "cake_store"; // Database name
$username = "root"; // Database username
$password = "root1234"; // Database password
try {
    // Creating the PDO connection
    $pdo = new PDO("mysql:host=$host;port=3306;dbname=$dbname;charset=utf8", $username, $password);

    // Setting the error mode to exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Connection error
    die("Error connecting to the database: " . $e->getMessage());
}