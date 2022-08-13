<?php
   include("../config.php");

   session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username === $confUsername && $password === $confPassword)
    {
        $_SESSION['logged'] = TRUE;
    }
    
?>