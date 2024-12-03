<?php
// Database connection settings
$host = 'localhost';       // MySQL host (typically localhost for local setups)
$username = 'root';        // MySQL username (XAMPP uses 'root' by default)
$password = '';            // MySQL password (leave blank for XAMPP default)
$dbname = 'real_estate';   // Name of your database

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
