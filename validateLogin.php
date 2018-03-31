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
				include("DBConn.php");
				$email = $_POST["email"];
				$pass = $_POST["password"];
				
				if(validLogin($email,$pass)){
					echo 'Welcome back.';
				} else {
					echo 'Account does not exist. <a href="">Forgot Password?</a> or <a href="AddUser.php">Sign Up</a>';
				}
				
				function validLogin($email,$pass){
					global $DBConnect;
					$hash = md5($pass);
					//find user with matching username and password
					$query = "select * from tbl_User where Email = '$email' and Password = '$hash' ";
					$result = $DBConnect->query($query);

					//return true if user is found
					return $result->num_rows > 0;

				}
			?>
		</pre>
	</body>
</html>