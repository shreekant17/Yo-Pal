<?php

session_start();
// Database connection details
require_once('db.php');

// Create database connection
$conn = new mysqli($host, $user, $password, $dbname);

$conn->set_charset("utf8mb4");

// Check for connection errors
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

?>