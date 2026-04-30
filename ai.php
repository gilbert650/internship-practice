<?php
// db_connect.php - Connection to MySQL
$servername = "localhost"; // XAMPP default
$username = "root";        // XAMPP default
$password = "";            // XAMPP default (empty)
$database = "sms";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch students data
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Students List</title>
    <link rel="stylesheet" href="style.css">

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    th, td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #007BFF;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color:#e1f0ff;
    }
</style>
</head>
<body>

<h1>Students List</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>fullame</th>
            <th>gender</th>
            <th>Age</th>
            <th>class</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            // Output data for each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>". $row["id"] ."</td>
                        <td>". $row["fullname"] ."</td>
                        <td>". $row["gender"] ."</td>
                        <td>". $row["age"] ."</td>
                        <td>". $row["class"] ."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4' style='text-align:center;'>No records found</td></tr>";
        }
        $conn->close();
        ?>
    </tbody>
<a href="form.html" class="back-link"><button>back to registeration </button></a>
</table>

</body>
</html> 