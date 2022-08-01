<?php

    require_once("connection.php");
    
    $query = "SELECT * FROM `case_file` WHERE `file_id` = " . $_GET["id"];
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 0) {
        die("File does not exists.");
    }

    $row = mysqli_fetch_object($result);

    header("Content-type: " . $row->file_type);
    echo $row->file;

?>