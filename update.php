<?php

    require_once("connection.php");

    if(isset($_POST['update'])){
        $user_id = $_GET['userID'];
        $user_type = mysqli_real_escape_string($db,$_POST['user_type']);
        $f_name = mysqli_real_escape_string($db,$_POST['f_name']);
        $l_name = mysqli_real_escape_string($db,$_POST['l_name']);
        $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);

        $query = "update user set user_type = '".$user_type."', f_name = '".$f_name."', l_name = '".$l_name."', phone_number = '".$phone_number."', username = '".$username."', email = '".$email."' where user_id = '".$user_id."'";

        $result = mysqli_query($db, $query);

        if($result){
            header("location: admin-page.php");
        }
    }

?>