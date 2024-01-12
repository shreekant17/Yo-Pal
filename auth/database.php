<?php

session_start();
// Database connection details
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'yopal';


// Create database connection
$conn = new mysqli($host, $user, $password, $dbname);

$conn->set_charset("utf8mb4");

// Check for connection errors
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}


?>