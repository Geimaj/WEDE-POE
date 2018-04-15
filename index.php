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
		https://stackoverflow.com/questions/369602/php-delete-an-element-from-an-array#369608
		https://stackoverflow.com/questions/4949847/hidden-field-in-php#4949888
*/  
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Shopping</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
		<script type="text/javascript" src="js/addToCart.js"></script>
	</head>
	<body>
			<?php
				echo "hello harry";
				if(!isset($_COOKIE['user'])){ //redirect to login
					header('location: login.php');
				} 
				//show normal page
				include('header.php');
				?>
				<div id="content">
					<h1>Items</h1>
						<?php
							// if(!isset($_POST['showItems'])){
							// 	echo "<form action='index.php' method='POST' ><input type='submit' value='Show Items' name='showItems'></form>";
							// } else {

								//display message confirimg item was added to cart
								if(isset($_COOKIE['lastItem'])){
									echo 'added item';
									$lastItem = unserialize($_COOKIE['lastItem']);
									//make sure cartItems inst empty
									//get last cart item (was last added)
									displayMessage("$lastItem->description was added to your cart for R $lastItem->sellPrice ", "cart.php");
									//unset cookie so we dont get the message again
									setcookie('lastItem', '', time()-1, '/');
								}

								$items = selectItems();
								$table = "<table>";
								$table .= "<tr>";
								$table .= "<td>Item Description</td>";
								$table .= "<td>Price</td>";								
								$table .= "<td>Tumbnail</td>";								
								$table .= "</tr>";

								foreach($items as $item){
									$table .= "<tr>";
									$table .= "<td>$item->description</td>";
									$table .= "<td>R $item->sellPrice</td>";
									$thumbnail = "<img class='itemThumbnail' src='" . $item->getThumbnailPath() . "'>";
									$table .= "<td>$thumbnail</td>";
									// create form
									$form = "<form action='addToCart.php' method='POST'>";
									$form .= "<input type ='hidden' name='itemID' value='$item->ID'>";
									$form .= "<input type='submit' value='add to cart'>";
									$form .= "</form>";
									//add (form) add to cart button
									$table .= "<td>$form</td>";
									$table .= "</tr>";
								}

								//display table
								echo $table;
															
							// }

							function displayMessage($message, $target){
								echo "<a href='$target'><div id='message'>$message</div></a>";
							}

						?>

				</div>
	</body>
</html>