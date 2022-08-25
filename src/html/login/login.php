<?php
    session_start();

    $jsonString = file_get_contents('/opt/ownVPN/config.json');
    $data = json_decode($jsonString, true);

    var_dump($jsonString);

    $inputLogin = $_POST['login'];
    $inputPassword = $_POST['password'];

    $confLogin = $data['login'];
    $confPassword = $data['password'];

    if($inputLogin === $confLogin && $inputPassword === $confPassword)
    {
        $_SESSION['logged'] = TRUE;
    }

?>