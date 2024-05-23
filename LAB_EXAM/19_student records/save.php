<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

if ($id) {
    $stmt = $conn->prepare("UPDATE students SET name=?, email=?, phone=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $phone, $id);
} else {
    $stmt = $conn->prepare("INSERT INTO students (name, email, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $phone);
}

if ($stmt->execute()) {
    header('Location: index.php');
} else {
    echo "Error: " . $stmt->error;
}
?>
