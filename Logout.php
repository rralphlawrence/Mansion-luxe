<?php

    include_once './includes/process.php';
 
    unset($_SESSION['nameHolder']); 
    unset($_SESSION['usertypeHolder']); 
    unset($_SESSION['isLoggedin']); 
    unset ($_SESSION['userID']);
    header("Location:home.php");
?>