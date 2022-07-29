<?php

    include("connection.php");

    if (isset($_POST['upload_file'])) {
    // receive all input values from the form
    $file_name = mysqli_real_escape_string($db,$_POST['file_name']);
    $case_number = mysqli_real_escape_string($db,$_POST['case_number']);
    $description = mysqli_real_escape_string($db,$_POST['description']);
    $case_file = mysqli_real_escape_string($db,$_POST['case_file']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($file_name)) { array_push($errors, "File name is required"); }
    if (empty($case_number)) { array_push($errors, "Case number is required"); }
    if (empty($description)) { array_push($errors, "Description is required"); }
    if (empty($case_file)) { array_push($errors, "Case file is required"); }

    $file_check_query = "SELECT * FROM case_file WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($case_number) { // if user exists
        if ($user['username'] === $username) {
          array_push($errors, "Username already exists");
        }
    
        if ($user['email'] === $email) {
          array_push($errors, "Email already exists");
        }
      }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {

        $query = "INSERT INTO case_file (file_id, user_id, case_number, file_name, file, description) 
                VALUES(null, null, '$case_number', '$file_name', '$case_file', '$description')";

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

?>