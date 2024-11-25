<?php


$servername = "codembs.com";
$username = "codembsc_attedance";
$password = "Attedance@123";
$dbname = "codembsc_attedance";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



?>