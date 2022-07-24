<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'cms');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $user_type = mysqli_real_escape_string($db,$_POST['user_type']);
  $occupation = mysqli_real_escape_string($db,$_POST['occupation']);
  $f_name = mysqli_real_escape_string($db,$_POST['f_name']);
  $l_name = mysqli_real_escape_string($db,$_POST['l_name']);
  $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if ($password != $confirm_password) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username
  $user_check_query = "SELECT * FROM cms1_user WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  function encryptPassword($password){
		$salt = "!*@&#^";
		$saltedpassword = $salt.$password.$salt;
		$hashpassword = md5($saltedpassword);
		return $hashpassword;
	}

  if (count($errors) == 0) {
  	$password = encryptPassword($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO user (user_id, user_type, f_name, l_name, username, phone_number, email, password) 
  			  VALUES(null, '$user_type', '$f_name', '$l_name', '$username', '$phone_number', '$email', '$password')";
          
  	$is_inserted = mysqli_query($db, $query);

    if ($is_inserted) {
      header('Location: login.php');
    } else {
      header('Location: register.php');
    }
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM cms1_user WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
      $logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == '1') {

				$_SESSION['username'] = $username;
				$_SESSION['success']  = "You are now logged in";
				header('location: index.php');		  
			} else{
				$_SESSION['username'] = $username;
				$_SESSION['success']  = "You are now logged in";

				header('location: register.php');
			}
  	} else {
  		array_push($errors, "Wrong username/password");
  	}
  }
}

?>