<!-- db.php -->
<?php
$servername = "localhost";
$username = "root";
$password = "sakshee@15";
$dbname = "online_sys";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>