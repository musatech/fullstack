<?php
require('config.php');
header("Access-Control-Allow-Origin:*",false);

$response = array();
$response['contacts'] = array();

$query = "SELECT * FROM contact";

$res = $conn->query($query);

if($res->num_rows > 0){
	while ($contact = $res->fetch_assoc()){
		$tmp = array();
		$tmp['id'] = $contact['id'];
		$tmp['firstname'] = $contact['firstname'];
		$tmp['lastname'] = $contact['lastname'];
		$tmp['phone'] = $contact['phone'];
		$tmp['email'] = $contact['email'];
		$tmp['address'] = $contact['address'];

		array_push($response['contacts'], $tmp);
	}
}

$response['status'] = "success";

print_r(json_encode($response));

?>