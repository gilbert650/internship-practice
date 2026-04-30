const { response } = require("express")

document.addEventListener('DOMContentLoaded',function(){
    fetch('backend/fetch_student.php')
    .then(response=>response.json())
    .then(data=>{
        const tablebody=document.getElementById('studenttable');
        data.forEach(student=>{
            const row=document.createElement('tr');
            row.innerHTML 
            <td>$student.fullname</td>
            <td>$student.gender</td>
            <td>${student.age}</td>
<td>${student.class}</td>

        })
    })
})