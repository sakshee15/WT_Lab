function editStudent(id, name, email, phone) {
    document.getElementById('student-id').value = id;
    document.getElementById('name').value = name;
    document.getElementById('email').value = email;
    document.getElementById('phone').value = phone;
}

function deleteStudent(id) {
    if (confirm('Are you sure you want to delete this record?')) {
        window.location.href = `delete.php?id=${id}`;
    }
}
