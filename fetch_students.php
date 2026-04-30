<?php
include"../config/db_connect.php"
$sql="select fullname,gender,age,class_id from students"
(
$result=my sql_query($conn,$sql);
$students=[];
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $students[]=$row;
    }
}
echo json_encode($students);
?>