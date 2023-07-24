<?php
$servername = "localhost";
$username = "eastsons_studylab";
$password = "studyLab@321";
$dbname = "eastsons_studylab";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
?>