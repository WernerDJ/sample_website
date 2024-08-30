<?php // header.php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
$servername = "localhost"; // your server name
$username = "Autoestopistamanco"; // your MySQL username
$password = "Fib49#7778742049"; // your MySQL password
$dbname = "Comments"; // your database name

try {
    // Create a new PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname; charset=utf8mb4", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>