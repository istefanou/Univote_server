<?php

require_once 'include/user.php';

$username = "";
$password = "";
$email = "";

if(isset($_POST['username'])){
	$username = $_POST['username'];
}
if(isset($_POST['password'])){
    $password = $_POST['password'];
}
if(isset($_POST['email'])){
	$email = $_POST['email'];
}

if(isset($_POST['real_name'])){
	$real_name = $_POST['real_name'];
}

if(isset($_POST['year'])){
	$year = $_POST['year'];
}

if(isset($_POST['gender'])){
	
	$gender = $_POST['gender'];
}

if(isset($_POST['category_name'])){
	
	$category_name = $_POST['category_name'];
}

// Instance of a User class
$userObject = new User();

// Registration of new user
if(!empty($username) && !empty($password) && !empty($email) && !empty($real_name) && !empty($year)&& !empty($gender)){
	$json_registration = $userObject->createNewRegisterStudent($username, $password, $email, $real_name, $year, $gender);
	echo json_encode($json_registration);
}

// User Login
if(!empty($username) && !empty($password)){
    $json_array = $userObject->loginstudent($username, $password);

    echo json_encode($json_array);
}

if(!empty($category_name)){
$json_array = $userObject->createNewCategory($category_name);

 echo json_encode($json_array);
}
?>