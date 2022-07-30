<?php

    session_start();

    // initializing variables
    $errors = array();

    include("connection.php");

    if (isset($_POST['upload_file'])) {
        // receive all input values from the form
        $file_name = mysqli_real_escape_string($db,$_POST['file_name']);
        $case_number = mysqli_real_escape_string($db,$_POST['case_number']);
        $description = mysqli_real_escape_string($db,$_POST['description']);
        $case_file = mysqli_real_escape_string($db,$_POST['case_file']);

        $user_id = $_SESSION['user_details']['user_id'];
        $file_check_query = "SELECT * FROM `case_file`";
        $result = mysqli_query($db, $file_check_query);

        while ($case= mysqli_fetch_assoc($result)) {
            if ($case['case_number'] === $case_number) {
                array_push($errors, "Case number already exists");
                $_SESSION['err']  = "Case number already exists";
                header('Location: case-file.php');
            }
        }

        // Finally, register user if there are no errors in the form
        if (count($errors) == 0) {

            $query = "INSERT INTO case_file (file_id, user_id, case_number, file_name, file, description) 
                    VALUES(null, '$user_id', '$case_number', '$file_name', '$case_file', '$description')";

            $is_inserted = mysqli_query($db, $query);

            // Redirects user to the appropriate page after registration
            if ($is_inserted) {
                header('Location: admin-page.php');
            } else {
                header('Location: case-file.php');
            }
        }
    }

?>