<?php

    require_once("connection.php");

    if(isset($_GET['userID'])){
        $user_id = $_GET['userID'];

        $user_query = "select * from user where user_id = $user_id";
        $user_query_result = mysqli_query($db, $user_query);
        $user = mysqli_fetch_array($user_query_result);
        $user_type = $user['user_type'];
        $deleted = 1;

        $query = "update user set is_deleted = '".$deleted."' where user_id = '".$user_id."'";

        $result = mysqli_query($db, $query);

        if($result){
            switch ($user_type) {
                case 'admin':
                    header("location: admin-page.php");
                    break;
                
                case 'employee':
                    include_once('logout.php');
                    break;
            }
        }
    }

?>