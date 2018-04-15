<!doctype html>
<?php
  /*Name: Jamie 
	Surname: Gregory  
	Student#: 16000925
	Login
	Declaration: This is my own work and 
	  any code obtained from other sources
		will be referenced
		
	References:
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
					echo getNames($_COOKIE['user']);
					if(isset($_POST['itemID'])){
						$id = $_POST['itemID'];
						$item = selectItemById($id);
						$cartItems = [];
						if(isset($_COOKIE['cartItems'])){
							$cartItems = unserialize($_COOKIE['cartItems']);
						}
						
						$splicePoint = array_search($item,$cartItems);
						echo "I want to delete {$item->description} from index $splicePoint";
						$cartItems = array_values($cartItems);
						unset($cartItems[$splicePoint]);

						$cookie_name = "cartItems";
						$cookie_value = serialize($cartItems);
						$cookie_time = time() + (86400 * 30); // 30 days
						setcookie($cookie_name, $cookie_value, $cookie_time, '/');

						header('location: cart.php');

					}
				}
			?>
		</div>
	</body>
</html>