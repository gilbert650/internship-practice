<?php
include "conf/config.php";
$sql="SELECET fullname,gender,age,class FROM students";
$result=mysqli_query($conn,$sql);
$student=[];
if (mysqli_num_rows($result)> 0) {
    while ($row=mysql_fetch_asssoc($result)) {
      $student[]=$row;
    }
}
echo json_encode($student);
?>