<?php 
include 'DbConfig.php';
 $conn= mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
 ?>
