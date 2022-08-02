<?php

    session_start();
    
    require_once("connection.php");

    $errors = array();

    function encryptPassword($password){
        $salt = "!*@&#^";
        $saltedpassword = $salt.$password.$salt;
        $hashpassword = md5($saltedpassword);
        return $hashpassword;
    }

    if(isset($_POST['update'])){
        $user_id = $_GET['userID'];
        $user_type = mysqli_real_escape_string($db,$_POST['user_type']);
        $f_name = mysqli_real_escape_string($db,$_POST['f_name']);
        $l_name = mysqli_real_escape_string($db,$_POST['l_name']);
        $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);

        if ($password != $confirm_password) {
            array_push($errors, "The two passwords do not match");
        }

        // first check the database to make sure 
        // a user does not already exist with the same username
        $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email'";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if (count($errors) == 0) {
            $password = encryptPassword($password);

            $query = "update user set user_type = '".$user_type."', f_name = '".$f_name."', l_name = '".$l_name."', phone_number = '".$phone_number."', username = '".$username."', email = '".$email."', password = '".$password."' where user_id = '".$user_id."'";

            try {
                $result = mysqli_query($db, $query);
                switch ($user_type) {
                    case 'admin':
                        header("location: admin-page.php");
                        break;
                    
                    case 'employee':
                        header("location: account.php");
                        break;
                }
            } catch (Exception $e) {
                array_push($errors, "Username/Email already exists");
                $_SESSION['errs'] = $errors;
                header("Location: user-edit.php?userID=$user_id");
            }

        } else {
            $_SESSION['errs'] = $errors;

            header("Location: user-edit.php?userID=$user_id");
        }
    }

?>