<?php

require 'config.php';
header("Access-Control-Allow-Origin:*",false);

$json_input = @file_get_contents('php://input');

$input = json_decode($json_input, true);

$firstname = $input['firstname'];
$lastname = $input['lastname'];
$phone = $input['phone'];
$email = $input['email'];
$address = $input['address'];

$response = array();

$query = ("INSERT INTO contact (firstname, lastname, email, phone, address) VALUES('$firstname', '$lastname', '$phone', '$email', '$address')");

if($conn->query($query) === TRUE){
	$response['status'] = "success";
	$response['message'] = "Added Sucessfully";
}else{
	$response['status'] = "error";
	$response['message'] = "Contact was not Added";
}

print_r(json_encode($response));
?>