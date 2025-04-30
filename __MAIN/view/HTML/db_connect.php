<?php
// Database connection parameters
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$dbname = 'safepaws'; 


$conn = new mysqli($host, $username, $password);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (!$conn->select_db($dbname)) {
    die("Database selection failed: " . $conn->error);
}


?>
