<!doctype html>
<?php
  /*Name: Jamie 
	Surname: Gregory  
	Student#: 16000925
	Login
	Declaration: This is my own work and 
	  any code obtained from other sources
	  will be referenced
*/  
	?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Your Title</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	</head>
	<body>
		<form id="login-form" action="validateLogin.php" method="POST">
			<label for="email">Email</label>
			<input type="email" name="email" id="email">
			</br>
			<label for="password">Password</label>
			<input type="password" name="password" id="password">
			</br>
			<input type="submit" name="submit" value="login">
			
		</form>
		<form action="SignUp.php" method="POST">
			<input type="submit" name="sign up" value="Sign Up">
		</form>

	</body>
</html>