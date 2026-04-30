<?php
include "conf/config.php";

if($_SERVER["REQUEST_METHOD"]== "POST"){
 $fullname= $_POST['fullname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $class = $_POST['class'];

 
    $sql ="INSERT INTO students (fullname, gender, age, class) 
    VALUES ('$fullname', '$gender', '$age','$class')";
   
}


?>