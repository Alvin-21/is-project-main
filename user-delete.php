<?php

    require_once("connection.php");

    if(isset($_GET['userID'])){
        $user_id = $_GET['userID'];
        $deleted = 1;

        $query = "update user set is_deleted = '".$deleted."' where user_id = '".$user_id."'";

        $result = mysqli_query($db, $query);

        if($result){
            header("location: admin-page.php");
        }
    }

?>