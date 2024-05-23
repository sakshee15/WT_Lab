<?php
include 'db.php';
$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Student Records</h1>
        <form id="student-form" method="POST" action="save.php">
            <input type="hidden" name="id" id="student-id">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" required>
            <button type="submit">Save</button>
        </form>
        <table id="student-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($student = $result->fetch_assoc()): ?>
                <tr data-id="<?= $student['id'] ?>">
                    <td><?= $student['name'] ?></td>
                    <td><?= $student['email'] ?></td>
                    <td><?= $student['phone'] ?></td>
                    <td>
                        <button type="button" class="edit-btn" onclick="editStudent(<?= $student['id'] ?>, '<?= $student['name'] ?>', '<?= $student['email'] ?>', '<?= $student['phone'] ?>')">Edit</button>
                        <button type="button" class="delete-btn" onclick="deleteStudent(<?= $student['id'] ?>)">Delete</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
