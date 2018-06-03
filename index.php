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
				if(!isset($_COOKIE['user'])){ //redirect to login
					header('location: login.php');
				} 
				//show normal page
				include_once('header.php');
				include_once('views/AddToCartButton.php');
				include_once('views/CheckoutButton.php');
				include_once('views/Table.php');
				
				
				?>
				<div id="content">
					<h1>Items</h1>
						<?php
							//display message confirimg item was added to cart
							if(isset($_COOKIE['lastItem'])){
								$lastItem = loadItem($_COOKIE['lastItem']);
								//make sure cartItems inst empty
								//get last cart item (was last added)
								if($lastItem){
									displayMessage("{$lastItem->getDescription()} was added to your cart for R {$lastItem->getsellPrice()} ", "cart.php");
								}
								//unset cookie so we dont get the message again
								setcookie('lastItem', '', time()-1, '/');
							}
								//display all items
								$items = selectItems();

								$table = new Table();
								$table->addHeading("Item");
                                $table->addHeading("Image");
                                $table->addHeading("Price");


								foreach($items as $item){
									$id = $item->getId();
									$desc = $item->getDescription();

									$addButton = new AddToCartButton($item);

                                    $data = ["<a href='showItem.php?id=$id'>$desc</a>"];
                                    $data[] = "<a href='showItem.php?id=$id'><img class='itemThumbnail' src='" . $item->getThumbnailPath() . "'></a><h4>click to enlarge</h4>";
                                    $data[] = "R {$item->getsellPrice()}";
                                    $data[] = $addButton->render();

                                    $table->addDataRow($data);
								}

								//display table
								echo $table->render();
								
								// $checkout = new CheckoutButton($shoppingCart);

								// echo $checkout->render();
								// echo "after";

							function displayMessage($message, $target){
								echo "<a href='$target'><div id='message'>$message</div></a>";
							}

						?>

				</div>
	</body>
</html>