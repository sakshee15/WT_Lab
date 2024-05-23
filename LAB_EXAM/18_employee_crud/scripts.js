function editEmployee(id, name, email, position, salary) {
    document.getElementById('employee-id').value = id;
    document.getElementById('name').value = name;
    document.getElementById('email').value = email;
    document.getElementById('position').value = position;
    document.getElementById('salary').value = salary;
}

function deleteEmployee(id) {
    if (confirm('Are you sure you want to delete this record?')) {
        window.location.href = `delete.php?id=${id}`;
    }
}
