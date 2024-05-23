<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$position = $_POST['position'];
$salary = $_POST['salary'];

if ($id) {
    $stmt = $conn->prepare("UPDATE employees SET name=?, email=?, position=?, salary=? WHERE id=?");
    $stmt->bind_param("ssssi", $name, $email, $position, $salary, $id);
} else {
    $stmt = $conn->prepare("INSERT INTO employees (name, email, position, salary) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $position, $salary);
}

if ($stmt->execute()) {
    header('Location: index.php');
} else {
    echo "Error: " . $stmt->error;
}
?>
