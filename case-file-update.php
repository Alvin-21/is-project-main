<?php

    require_once("connection.php");

    if(isset($_POST['update_file'])){
        $file_id = $_GET['fileID'];
        $file_name = mysqli_real_escape_string($db,$_POST['file_name']);
        $case_number = mysqli_real_escape_string($db,$_POST['case_number']);
        $description = mysqli_real_escape_string($db,$_POST['description']);
        $case_file = mysqli_real_escape_string($db,$_POST['case_file']);

        $query = "update case_file set file_name = '".$file_name."', case_number = '".$case_number."', description = '".$description."', file = '".$case_file."' where file_id = '".$file_id."'";

        $result = mysqli_query($db, $query);

        if($result){
            header("location: index.php");
        }

    }

?>