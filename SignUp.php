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
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	
</head>
	<body>
			<?php include('header.php'); ?>
			<div id="content">
				<form action="AddUser.php" method="POST" id="login-form">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" required>
					</br>
					<label for="FName">First name:</label>
					<input type="text" name="FName" id="FName" required>
					</br>
					<label for="LName">Last Name:</label>
					<input type="text" name="LName" id="LName" required>
					</br>
					<label for="password">Password</label>
					<input type="password" name="password" id="password" required>
					</br>
					<input type="submit" name="submit" id="submit" value="Sign Up">				
				</form>
			</div>

	</body>
</html>