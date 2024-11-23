<?php
    session_start();
    //destroy the session
    session_unset();    //remove session variables
    session_destroy();  //remove the session

    //disconnect from the database
    $conn = null;
    $stmt = null;

    //redirect to the home page/login page
    header("Location:login.php");
?>