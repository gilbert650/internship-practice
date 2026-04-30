<?php
include"SELECT s.fullname,s.gender,s.age,s.class_idc,name FROM student";
$result=mysql_query($conn,$sql);
$student=[];
if(mysql_num_rows($result)>0){
    while($row=mysql_fetch_assoc($result)){
        $student[]=row;
    }
}
echo json_encode($student);
?>
