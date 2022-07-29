<?php

    include("process.php");

    if (isset($_POST['upload_file'])) {
        // receive all input values from the form
        $file_name = mysqli_real_escape_string($db,$_POST['file_name']);
        $case_number = mysqli_real_escape_string($db,$_POST['case_number']);
        $description = mysqli_real_escape_string($db,$_POST['description']);
        $case_file = mysqli_real_escape_string($db,$_POST['case_file']);

        // echo "<pre>"; print_r($_SESSION['user_details']); die;

        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($file_name)) { array_push($errors, "File name is required"); }
        if (empty($case_number)) { array_push($errors, "Case number is required"); }
        if (empty($description)) { array_push($errors, "Description is required"); }
        if (empty($case_file)) { array_push($errors, "Case file is required"); }

        $user_id1 = $_SESSION['user_details']['user_id'];
        $file_check_query = "SELECT * FROM case_file WHERE user_id='$user_id1' LIMIT 1";
        $result1 = mysqli_query($db, $file_check_query);
        $case = mysqli_fetch_assoc($result1);
        // echo "<pre>"; print_r($case['case_number']); die;

    
        if ($case) { // if user exists
            if ($case['case_number'] === $case_number) {
            array_push($errors, "Case number already exists");
            }
        }

        // Finally, register user if there are no errors in the form
        if (count($errors) == 0) {

            $query1 = "INSERT INTO case_file (file_id, user_id, case_number, file_name, file, description) 
                    VALUES(null, '$user_id1', '$case_number', '$file_name', '$case_file', '$description')";

            $is_inserted1 = mysqli_query($db, $query1);

            // Redirects user to the appropriate page after registration
            if ($is_inserted1) {
            header('Location: admin-page.php');
            } else {
                array_push($errors, "Wrong username/password");
            }
        }
    }

?>