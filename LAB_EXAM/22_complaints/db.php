<?php
$servername = "localhost";
$username = "root";
$password = "sakshee@15";
$dbname = "complaint_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
