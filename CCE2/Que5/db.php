<?php
$host = "localhost";
$user = "TejasKapse"; // Default XAMPP user
$pass = "Pass@123"; // No password by default in XAMPP
$dbname = "company";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
