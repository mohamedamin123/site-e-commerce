<?php

    if((!isset($_POST["email"])) || (empty($_POST["pass"]))) {
    header("Location: login.php");
    exit();
    } else  if ((isset($_POST["email"])) && (!empty($_POST["pass"])) && (isset($_POST["email"])) && (!empty($_POST["pass"])) ) {

        $userEmail=$_POST["email"];
        $userPass=$_POST["pass"];

        header("Location: ../profile/profile.php?email=$userEmail");
    
    }



?>