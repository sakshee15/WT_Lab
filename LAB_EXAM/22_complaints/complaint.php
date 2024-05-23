<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO complaints (user_id, title, description) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $title, $description);

    if ($stmt->execute()) {
        echo "Complaint registered successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Complaint</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Register Complaint</h1>
        <form method="POST">
            <label for="subject">Subject:</label>
            <input type="text" name="title" id="title" required>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea>
            <button type="submit">Submit</button>
        </form>
        
        <button class="logout-btn"><a href="logout.php">Logout</a>
    </div>
</body>
</html>
