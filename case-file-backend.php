<?php

    session_start();


    $errors = array();

    include("connection.php");

    if (isset($_POST['upload_file'])) {
        // receive all input values from the form
        $file_name = mysqli_real_escape_string($db,$_POST['file_name']);
        $case_number = mysqli_real_escape_string($db,$_POST['case_number']);
        $description = mysqli_real_escape_string($db,$_POST['description']);
        $case_file = $_FILES["case_file"];
        $file_type = $case_file["type"];
        $file_blob = mysqli_real_escape_string($db, file_get_contents($case_file['tmp_name']));

        // check the database to make sure 
        // a case file does not already exist with the same case number
        $file_check_query = "SELECT * FROM `case_file`";
        $result = mysqli_query($db, $file_check_query);

        while ($case= mysqli_fetch_assoc($result)) {
            if ($case['case_number'] === $case_number) {
                array_push($errors, "Case number already exists");
                $_SESSION['err']  = "Case number already exists";
                header('Location: case-file.php');
            }
        }

        // Finally, upload file if there are no errors in the form
         $user_id = $_SESSION['user_details']['user_id'];

        if (count($errors) == 0) {

            $query = "INSERT INTO `case_file` (`user_id`, `case_number`, `file_name`, `file`, `description`, `file_type`) 
                    VALUES('".$user_id."', '".$case_number."', '".$file_name."', '".$file_blob."', '".$description."', '".$file_type."')";

            $is_inserted = mysqli_query($db, $query);

            // Redirects user to the appropriate page after uploading file
            if ($is_inserted) {
                header('Location: index.php');
            } else {
                header('Location: case-file.php');
            }
        }
    }

?>