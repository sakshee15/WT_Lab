<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['date'];
    $attendances = $_POST['attendance'];

    foreach ($attendances as $student_id => $status) {
        $status = $status == 'Present' ? 1 : 0;
        $stmt = $conn->prepare("INSERT INTO attendance (student_id, date, status) VALUES (?, ?, ?)
                                ON DUPLICATE KEY UPDATE status = ?");
        $stmt->bind_param("isii", $student_id, $date, $status, $status);
        $stmt->execute();
        $stmt->close();
    }
    echo "Attendance marked successfully!";
}

$students = $conn->query("SELECT id, username FROM students");

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mark Attendance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        h1 {
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="date"],
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .radio-group {
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mark Attendance</h1>
        <form method="POST" action="">
            <label for="date">Date:</label>
            <input type="date" name="date" required><br>
            <table>
                <tr>
                    <th>Student</th>
                    <th>Present</th>
                    <th>Absent</th>
                </tr>
                <?php while ($student = $students->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $student['username']; ?></td>
                    <td class="radio-group">
                        <input type="radio" name="attendance[<?php echo $student['id']; ?>]" value="Present" required>
                    </td>
                    <td class="radio-group">
                        <input type="radio" name="attendance[<?php echo $student['id']; ?>]" value="Absent" required>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <button type="submit">Submit Attendance</button>
        </form>
    </div>
</body>
</html>
