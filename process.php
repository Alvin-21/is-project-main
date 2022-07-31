<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

include("connection.php");

// password encryption
function encryptPassword($password){
  $salt = "!*@&#^";
  $saltedpassword = $salt.$password.$salt;
  $hashpassword = md5($saltedpassword);
  return $hashpassword;
}

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
  $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
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
  if (count($errors) == 0) {
  	$password = encryptPassword($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO user (user_id, user_type, f_name, l_name, username, phone_number, email, password) 
  			  VALUES(null, '$user_type', '$f_name', '$l_name', '$username', '$phone_number', '$email', '$password')";

    $is_inserted = mysqli_query($db, $query);

    $registered_user_query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  	$registered_results = mysqli_query($db, $registered_user_query);
    $registered_user = mysqli_fetch_assoc($registered_results);

    // Adds user data to the database when the user selects employee or admin
    switch ($registered_user['user_type']) {
      case 'employee':
        $registered_user_id = $registered_user['user_id'];
        $employee_query = "INSERT INTO employee (employee_id, user_id) VALUES (null, '$registered_user_id')";
        mysqli_query($db, $employee_query);
        break;
      
      case 'admin':
        $registered_user_id = $registered_user['user_id'];
        $admin_query = "INSERT INTO admin (admin_id, user_id) VALUES (null, '$registered_user_id')";
        mysqli_query($db, $admin_query);
    }

    // Adds user data to the database when the user selects court official or record officer
    switch ($occupation) {
      case 'court_official':
        $registered_user_id = $registered_user['user_id'];
        $registered_employee_query = "SELECT * FROM employee WHERE user_id='$registered_user_id'";
        $registered_employee_results = mysqli_query($db, $registered_employee_query);
        $registered_employee = mysqli_fetch_assoc($registered_employee_results);
        $registered_employee_id = $registered_employee['employee_id'];
        $court_official_query = "INSERT INTO court_official (court_official_id, employee_id, occupation) VALUES (null, '$registered_employee_id', '$occupation')";
        mysqli_query($db, $court_official_query);
        break;
      
      case 'record_officer':
        $registered_user_id = $registered_user['user_id'];
        $registered_employee_query = "SELECT * FROM employee WHERE user_id='$registered_user_id'";
        $registered_employee_results = mysqli_query($db, $registered_employee_query);
        $registered_employee = mysqli_fetch_assoc($registered_employee_results);
        $registered_employee_id = $registered_employee['employee_id'];
        $record_officer_query = "INSERT INTO record_officer (record_officer_id, employee_id, occupation) VALUES (null, '$registered_employee_id', '$occupation')";
        mysqli_query($db, $record_officer_query);
        break;
    }

    // Redirects user to the appropriate page after registration
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
  	$password = encryptPassword($password);
  	$query = "SELECT * FROM user WHERE username='$username' AND password='$password' AND is_deleted = 0";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
      $logged_in_user = mysqli_fetch_assoc($results);
      $_SESSION['user_details'] = $logged_in_user;
      $_SESSION['is_logged_in'] = true;
      $role = $logged_in_user['user_type'];

      switch ($role) {
        case 'admin':
          header('location: admin-page.php');
          break;
        
        case 'employee':
          header('location: index.php');
          break;
      }
    } else {
      array_push($errors, "Wrong username/password");
    }
  }
}

?>