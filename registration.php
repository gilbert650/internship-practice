<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $conn->real_escape_string($_POST['fullname']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $age = $conn->real_escape_string($_POST['age']);
    $class = $conn->real_escape_string($_POST['class']);

    // Insert query
    $sql = "INSERT INTO student (fullname, gender, age, class) 
            VALUES ('$fullname', '$gender', '$age', '$class')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>