<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fullname = isset($_POST['fullname']) ? trim($_POST['fullname']) : '';
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';
    $age = isset($_POST['age']) ? (int)$_POST['age'] : 0;
    $class_id = isset($_POST['class_id']) ? (int)$_POST['class_id'] : 0;

    if (empty($fullname) || empty($gender) || $age <= 0 || $class_id <= 0) {
        echo "Please fill all fields correctly.";
    } else {

        // Insert into students table
        $stmt = $conn->prepare("INSERT INTO students (fullname, gender, age, class_id) VALUES (?, ?, ?, ?)");

        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("ssii", $fullname, $gender, $age, $class_id);

        if ($stmt->execute()) {
            echo "Student added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>