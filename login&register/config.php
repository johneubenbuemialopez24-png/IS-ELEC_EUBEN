<?php
$host = "localhost"; // change port if your MySQL uses different port
$user = "root";
$pass = "";
$db   = "stylenwear_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
