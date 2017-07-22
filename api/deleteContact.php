<?php 
require('config.php');
header("Access-Control-Allow-Origin:*",false);

$json_input = @file_get_contents('php://input');

$input = json_decode($json_input, true);

$id = $input['id'];
$response = array();

//echo($id);
$query = "DELETE from contact WHERE id = '$id' ";

//echo($query);
if ($conn->query($query) === TRUE) {
	$response['status'] = 'success';
	$response['message'] = 'successfully deleted';
}else{
	$response['status'] = 'error';
	$response['message'] = 'couldnt delete';
}

print_r(json_encode($response));
?>