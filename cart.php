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
					// echo getNames($_COOKIE['user']);
					echo "<h1>Your cart</h1>";
					echo "<a href='index.php'><h2>Continue Shopping</h2></a>";
					if(isset($_COOKIE['cartItems'])){
						$cartItems = unserialize($_COOKIE['cartItems']);
						if( sizeof($cartItems) > 0){
						
							$total = 0;
							
							$table = "<table>";
							$table .= "<tr>";
							$table .= "<td>Item Description</td>";
							$table .=  "<td>Price</td>";
							$table .= "</tr>";
							foreach($cartItems as $cartItem){
								$table .= "<tr>";
								$table .= "<td>{$cartItem->description}</td>";
								$table .=  "<td>R {$cartItem->sellPrice}</td>";
								$id = $cartItem->ID;
								$imgPath = getItemImagePath($id);
								$img = "<img src='{$imgPath}' class='itemThumbnail'>";
								$table .= "<td>$img</td>";
								//create form
								$form = "<form action='removeFromCart.php' method='POST'>";
								$form .= "<input type ='hidden' name='itemID' value='$id'>";
								$form .= "<input type='submit' value='Remove from cart'>";
								$form .= "</form>";
								//add (form) remove from cart button
								$table .= "<td>$form</td>";
								$table .= "</tr>";
								
								$total += $cartItem->sellPrice;
							}
							
							$table .= "<tr><td>Total: </td><td>R $total</td></tr>";
							$table .= "</table>";
							echo $table;
						} else {
							echo '<h3 class="error">You have an empty cart.</h3>';
						}
							
						} else {
						echo '<h3 class="error">You have an empty cart.</h3>';
					}
				}
			?>
		</div>
	</body>
</html>