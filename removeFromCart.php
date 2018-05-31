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
					if(isset($_POST['item'])){

						$serialShoppingCart = $_SESSION[$user->getEmail()];
						$shoppingcart = unserialize(stripslashes($shoppingcart));

						$item = unserialize(stripslashes($_POST['item'])) ;

						$shoppingcart->removeItem($item);

						$serialShoppingCart = serialize($shoppingcart);
						$serialShoppingCart = addslashes($serialShoppingCart);

						$_SESSION[$user->getEmail()] = $serialShoppingCart;

						header('location: cart.php');
					}
				}
			?>
		</div>
	</body>
</html>