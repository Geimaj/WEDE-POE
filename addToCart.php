<!doctype html>
<?php
	session_start();
  /*Name: Jamie 
	Surname: Gregory  
	Student#: 16000925
	Login
	Declaration: This is my own work and 
	  any code obtained from other sources
		will be referenced
		
	References:
		https://stackoverflow.com/questions/9032007/arrays-in-cookies-php#9032082
*/  
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Shopping</title>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
	<body>
		<?php
			include("header.php");
		?>
		<div id="content">
			<?php
				//ensure user is logged in
				if(isset($_COOKIE['user'])){ 
					if(isset($_POST['itemID'])){
						$id = $_POST['itemID'];
						$item = selectItemById($id);

						$userItems = array();
						// echo selectUserIdByEmail($_COOKIE['user']);
						//populate existing data
						if(isset($_SESSION[$user])){
							$sesh = unserialize($_SESSION[$user]);
							$userItems = $sesh;
						} 

						$userItems[] = $item;
						$_SESSION[$user] = serialize($userItems);

						//set last item cookie for notification
						$lastItem = end($userItems);
						$cookie_name = "lastItem";
						$cookie_value = serialize($lastItem);
						$cookie_time = time() + (86400); // 30 days
						setcookie($cookie_name, $cookie_value, $cookie_time, '/');

						header('location: index.php');
					}
				}
			?>
		</div>
	</body>
</html>