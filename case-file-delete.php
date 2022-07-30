<?php

    require_once("connection.php");

    if(isset($_GET['fileID'])){
        $file_id = $_GET['fileID'];
        $deleted = 1;

        $query = "update case_file set is_deleted = '".$deleted."' where file_id = '".$file_id."'";

        $result = mysqli_query($db, $query);

        if($result){
            header("location: index.php");
        }
    }

?>