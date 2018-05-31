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
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	</head>
	<body>
		<?php
			include("header.php");
			$email = '';
			$password = '';
			$error = "";
			if(isset($_POST['email']) && isset($_POST["password"])) {
				$email = $_POST['email'];
				$password = $_POST['password'];

				if(validLogin($email,$password)){
					$user = selectUserByEmail($email);
					saveUserSession($user);

					header('Location: index.php');
				} else {
					$error = "<h2 class='error'>Invalid account details</h2>";
				}
			}

		?>
		<div id="content">
			<form id="login-form" action=<?php echo $_SERVER['SCRIPT_NAME']?> method="POST">
				<?php echo $error; ?>
				<label for="email">Email</label>
				<input type="email" name="email" id="email" value=<?php echo $email ?> >
				</br>
				<label for="password">Password</label>
				<input type="password" name="password" id="password" value=<?php echo $password ?>>
				</br>
				<input type="submit" name="submit" value="login">
				
			</form>
			<form action="SignUp.php" method="POST">
				<input type="submit" name="sign up" value="Sign Up">
			</form>
		</div>

	</body>
</html>