<?php 
require('config.php');
header("Access-Control-Allow-Origin:*",false);

$json_input = @file_get_contents('php://input');

$input = json_decode($json_input, true);

$id = $input['id'];
$firstname = $input['firstname'];
$lastname = $input['lastname'];
$phone = $input['phone'];
$email = $input['email'];
$address = $input['address'];

$response = array();

//echo($id);
$query = "UPDATE contact SET firstname = '$firstname', lastname = '$lastname', email = '$email', phone = '$phone', address = '$address' WHERE id = '$id' ";

//echo($query);
if ($conn->query($query) === TRUE) {
	$response['status'] = 'success';
	$response['message'] = 'successfully edited';
}else{
	$response['status'] = 'error';
	$response['message'] = 'couldnt edit';
}

print_r(json_encode($response));
?>