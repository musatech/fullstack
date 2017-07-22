<?php
$host = "localhost";
$user = "root";
$secret = "";

$conn = new mysqli($host, $user, $secret, "contact");
if($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}


?>