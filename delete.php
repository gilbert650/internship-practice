<?php
// delete.php

// 1. Database configuration
$servername = "localhost";    // Usually 'localhost'
$username = "root";           // Your DB username
$password = "";               // Your DB password
$dbname = "SMS";           // Your database name

// 2. Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// 3. Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 4. Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Either delete by student ID or by class ID
    $student_id = $_POST['student_id'] ?? null;
    $class_id = $_POST['class_id'] ?? null;

    if ($student_id) {
        // Delete by student ID
        $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
        $stmt->bind_param("i", $student_id);
    } elseif ($class_id) {
        // Delete by class ID (all students in that class)
        $stmt = $conn->prepare("DELETE FROM students WHERE class_id = ?");
        $stmt->bind_param("s", $class_id);
    } else {
        echo "Please provide either Student ID or Class ID.";
        exit;
    }

    // Execute deletion
    if ($stmt->execute()) {
        echo "Record(s) deleted successfully!";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>