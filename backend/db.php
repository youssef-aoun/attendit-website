<?php
$servername = "localhost"; 
$username = "root";        
$password = "rcfmCngxHhCqDZVRDE7P"; 
$dbname = "isd-entities"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
