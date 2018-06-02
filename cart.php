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
			include_once("header.php");
			include_once('views/RemoveFromCartButton.php');
			include_once('views/CheckoutButton.php');
			
		?>
		<div id="content">
			<?php
					echo "<h1>Your cart</h1>";
					echo "<a href='index.php'><h2>Continue Shopping</h2></a>";

						$cartItems = $shoppingCart->getCartItems();

						if(sizeof($cartItems) > 0){
								$table = "<table>";
								$table .= "<tr>";
								$table .= "<td>Item Description</td>";
								$table .= "<td>Quantity</td>";								
								$table .=  "<td>Price</td>";
								$table .=  "<td>Product</td>";
								$table .= "</tr>";
								$total = 0;
								foreach($cartItems as $cartItem){
									// echo $cartItem->ID;
									$item = $cartItem->getItem();

									$table .= "<tr>";
									//description
									$table .= "<td><a href='showItem.php?id={$item->getId()}'>{$item->getDescription()}</a></td>";
									//quantity
									$table .= "<td>{$cartItem->getQuantity()}</td>";
									//price
									$table .=  "<td>R {$cartItem->getItemsubtotal()}</td>";
									$id = $item->getID();
									//image
									$imgPath = $item->getThumbnailPath();
									$img = "<img src='{$imgPath}' class='itemThumbnail'>";
									$table .= "<td>$img</td>";
									
									//remove button
									$removeButton = new RemoveFromCartButton($item);
									$table .= "<td>{$removeButton->render()}</td>";

									$table .= "</tr>";
									$total += $cartItem->getItemsubtotal();
								}

							$table .= "<tr><td>Total: <td>{$shoppingCart->getNumCartItems()}</td></td><td>R $total</td></tr>";
							$table .= "</table>";
							echo $table;

							$checkoutButton = new CheckoutButton($shoppingCart);
							echo $checkoutButton->render();


						} else {
							echo "<h3 class='error'>Your cart is empty</h3>";
						}

			?>
		</div>
	</body>
</html>