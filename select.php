<?php
include "conf/config.php";


$sql = "SELECT * FROM students"; // default: select all

// Optional filters
$student= $_GET['id'] ?? null;
$class= $_GET['class'] ?? null;

if ($student) {
    $stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
} elseif ($class) {
    $stmt = $conn->prepare("SELECT * FROM students WHERE class_id = ?");
    $stmt->bind_param("s", $class);
    $stmt->execute();
    $result = $stmt->get_result();
`} else {
    // No filter, select all
    $result = $conn->query($sql);
}

// 5. Display the results
i`f ($result->num_rows > 0) {
  `  // echo "<h2>Student Records</h2>";
   ` // echo "<table border='1' cellpadding='10' cellspacing='0'>";
    // echo "<tr><th>ID</th><th>Full Name</th><th>Gender</th><th>Age</th><th>Class ID</th></tr>";
`
//     while($row = $result->fetch_assoc()) {
//         echo "<tr>
/```````````        `1````````                                          ```````````/                 <td>{$row['id']}</td>
//                 <td>{$row['fullname']}</td>
//                 <td>{$row['gender']}</td>
//                 <td>{$row['age']}</td>
//                 <td>{$row['class']}</td>
//               </tr>";
//     }

//     echo "</table>";
// } else {
//     echo "No records found.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>       
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">==
<h1> student list</h1>
<table>
    <thead><tr>
<th>fullname</th>
<th>gender</th>
<th>age</th>
<th>class</th>
    </tr></thead>

    <tbody id="sudentTable">
    
    </tbody>
</table></div>    

<a href="form.html" class="back-link">back to registeration</a>
</body>
</html>
<?php

// 6. Close connection
if (isset($stmt)) $stmt->close();
$conn->close();
?>