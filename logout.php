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
	<title>Logout</title>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
	<body>
			<?php // Script 2.1 - predefined.php
				if(!isset($_COOKIE['user'])){ //redirect to login
					header('location: login.php');
				} 
				//show log user out
				?>
				<?php include('header.php');?>
				<div id="content">
					<?php
						$user = unserialize($_COOKIE["user"]);
						unset($_COOKIE['user']);
						setcookie('user', null, -1, '/');
						unset($_SESSION[$user->getEmail()]);
						$_SESSION = array();
						header('location: login.php');
						// echo $user . " logged out";
					?>

				</div>
	</body>
</html>