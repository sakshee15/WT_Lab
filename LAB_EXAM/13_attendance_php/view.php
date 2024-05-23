<?php
include 'db.php';

if (isset($_POST['date'])) {
    $date = $_POST['date'];
    $stmt = $conn->prepare("SELECT students.username, attendance.status FROM attendance JOIN students ON attendance.student_id = students.id WHERE attendance.date = ?");
    $stmt->bind_param("s", $date);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT students.username, attendance.date, attendance.status FROM attendance JOIN students ON attendance.student_id = students.id ORDER BY attendance.date DESC");
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Attendance</title>
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
            max-width: 800px;
            margin: auto;
        }
        h1 {
            text-align: center;
        }
        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        input[type="date"], button {
            padding: 10px;
            margin: 0 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>View Attendance</h1>
        <form method="POST" action="">
            <label for="date">Select Date:</label>
            <input type="date" name="date" required>
            <button type="submit">View Attendance</button>
        </form>

        <?php if ($result->num_rows > 0) { ?>
            <table>
                <tr>
                    <th>Username</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars(isset($row['date']) ? $row['date'] : $date); ?></td>
                    <td><?php echo $row['status'] ? 'Present' : 'Absent'; ?></td>
                </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>No attendance records found.</p>
        <?php } ?>
    </div>
</body>
</html>
