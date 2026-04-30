document.addEventListener('DOMContentLoaded',function(){
    fetch('fetch_student.php')
    .then(Response => Response.json())
    .then(data =>{
        const tableBody=document.getElementById('studentTable');
            
            data.forEach(student => {
                const row=document.createElement('tr');
                row.innerHTML= `
                '<td>' + student.fullname + '</td>'+=
                '<td>' + student.gender + '</td>' +
                '<td>' + student.age + '</td>' +
                '<td>' + student.class + '</td>';
       ??         `;
       tableBody.appendChild(row);
        // fetching    
    });
    })

    // .catch(error => console.error('error fetching students:,error'));
});