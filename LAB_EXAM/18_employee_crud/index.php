<?php
include 'db.php';
$result = $conn->query("SELECT * FROM employees");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Records</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Employee Records</h1>
        <form id="employee-form" method="POST" action="save.php">
            <input type="hidden" name="id" id="employee-id">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="position">Position:</label>
            <input type="text" name="position" id="position" required>
            <label for="salary">Salary:</label>
            <input type="number" step="0.01" name="salary" id="salary" required>
            <button type="submit">Save</button>
        </form>
        <table id="employee-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($employee = $result->fetch_assoc()): ?>
                <tr data-id="<?= $employee['id'] ?>">
                    <td><?= $employee['name'] ?></td>
                    <td><?= $employee['email'] ?></td>
                    <td><?= $employee['position'] ?></td>
                    <td><?= $employee['salary'] ?></td>
                    <td>
                        <button type="button" class="edit-btn" onclick="editEmployee(<?= $employee['id'] ?>, '<?= $employee['name'] ?>', '<?= $employee['email'] ?>', '<?= $employee['position'] ?>', <?= $employee['salary'] ?>)">Edit</button>
                        <button type="button" class="delete-btn" onclick="deleteEmployee(<?= $employee['id'] ?>)">Delete</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
