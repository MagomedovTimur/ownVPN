<?php

	session_start();
	if ($_SESSION['logged'] === TRUE){
		header("Location: /");
		die();
	}

?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<link href="/src/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="/src/css/login.css" rel="stylesheet">
		<link href="/src/css/background.css" rel="stylesheet">
	</head>

	<body>
		
	<div class="wrapper">
		<div class="container" style="display: none;">
			<h1>Welcome</h1>
			
			<form id="loginForm" class="form">
				<input id="login" type="text" placeholder="Login">
				<input id="password" type="password" placeholder="Password">
				<button type="submit" id="login-button" onlick="loginPost();">Login</button>
			</form>
		</div>
		
		<ul class="bg-bubbles" style="display: none;">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>

	</body>


	<script src="/src/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/src/js/jquery.min.js" type="text/javascript"></script>
	<script src="/src/js/login.js" type="text/javascript"></script>
</html>