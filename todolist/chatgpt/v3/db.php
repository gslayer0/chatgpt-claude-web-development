<?php
$servername = "mysql";
$username = "root";
$password = "root";
$dbname = "riset_todolist";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>