var app = angular.module('myApp', ['oitozero.ngSweetAlert'])


app.controller('contactController', function($scope, $http, SweetAlert){
	//$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
	// var headers = {
	// 	'Access-Control-Allow-Origin' : '*',
	// 	'Access-Control-Allow-Methods' : 'POST, GET, OPTIONS, PUT',
	// 	'Content-Type' : 'application/x-www-form-urlencoded',
	// 	'Accept' : '*'
	// };

	$scope.allContacts = [];

	$scope.viewContacts = function(){
		$http.get('http://localhost/api/viewContact.php').then(function(response){
			if(response.data.status == "success"){
				$scope.allContacts = response.data.contacts;
			}else{
				SweetAlert.swal("Error", "Could Not Get list", "error");
			}
		}, function(error){
			SweetAlert.swal("Error", "Check Network", "error");
		})
	};

	$scope.add = function(contact){
		$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

		console.log(contact);

		$http.post('http://localhost/api/addContact.php', contact).then(function(response){
			if(response.data.status == "success"){
				$scope.contact = {}
				SweetAlert.swal("Success", response.data.message, "success");
			}else{
				SweetAlert.swal("Error", response.data.message, "error");
			}
		}, function(error){
			SweetAlert.swal("Error", "Check Connectivity", "error");
		})
		$scope.viewContacts();
	}

	$scope.viewContacts();

	$scope.deleteContacts = function(editContact){
		$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

		$http.post('http://localhost/api/deleteContact.php', editContact).then(function(response){
			if(response.data.status == "success"){
				SweetAlert.swal("Success", response.data.message, "success");
			}else{
				SweetAlert.swal("Error", response.data.message, "error");
			}
		}, function(error){
			SweetAlert.swal("Error", "Check Connectivity", "error");
		})
		$scope.viewContacts();
	}

	$scope.editContacts = function(editContact){
		$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

		$http.post('http://localhost/api/editContact.php', editContact).then(function(response){
			if(response.data.status == "success"){
				SweetAlert.swal("Success", response.data.message, "success");
			}else{
				SweetAlert.swal("Error", response.data.message, "error");
			}
		}, function(error){
			SweetAlert.swal("Error", "Check Connectivity", "error");
		})
		$scope.viewContacts();
	}
	
})