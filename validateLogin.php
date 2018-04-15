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
</head>
	<body>
		<pre>
			<?php // Script 2.1 - predefined.php
				include("DBQuery.php");
				$email = $_POST["email"];
				$pass = $_POST["password"];
				
				if(validLogin($email,$pass)){

					//redirect
					header('location: index.php');
				} else {
					echo 'Account does not exist. <a href="">Forgot Password?</a> or <a href="AddUser.php">Sign Up</a>';
				}
				
			?>
		</pre>
	</body>
</html>