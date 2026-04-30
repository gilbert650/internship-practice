<?php
$host="localhost";
$user="root";
$paw="";
$db="shop";
$conn=mysqli_connect("localhost","root","","shop");
if (!$conn) {
    # code...
    echo"not connected". mysqli_error();
} else {
    # code...
echo"connected";
}
