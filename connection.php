<?php

    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'cms');
    if (!$db) {
        die(" Connection Error ");
    } 
?>