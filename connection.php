<?php
// Database configuration
$servername = "localhost"; // usually localhost
$username = "root";        // your DB username
$password = "";            // your DB password
$dbname = "school";        // database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: display success message (comment out in production)
// echo "Connected successfully";

?>
