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
            include_once('views/Table.php');

            if(isset($_GET['inc'])){
                $index = $_GET['inc'];
                $shoppingCart->getCartItems()[$index]->incrementQuantity();
            } else if(isset($_GET['dec'])){
                $index = $_GET['dec'];
                $cItem = $shoppingCart->getCartItems()[$index];
                $cItem->decrementQuantity();
                if($shoppingCart->getNumItems($cItem->getItem()) <= 0) {
                    $shoppingCart->removeItem($cItem->getItem());
                }
            }
            saveCart($shoppingCart);
            unset($_GET['inc']);


        ?>
		<div id="content">
			<?php
					echo "<h1>Your cart</h1>";
					echo "<a href='index.php'><h2>Continue Shopping</h2></a>";
                        $shoppingCart = loadCart($user);
						$cartItems = $shoppingCart->getCartItems();

						if(sizeof($cartItems) > 0){

                                $table = new Table();
                                $table->addHeading("Item");
                                $table->addHeading("Quantity");
                                $table->addHeading("Cost");
                                $table->addHeading("Subtotal");
                                $table->addHeading("product");


								$total = 0;
								foreach($cartItems as $index => $cartItem){
									// echo $cartItem->ID;
									$cItem = $cartItem->getItem();

									$data = [];

									//description
									$desc = "<a href='showItem.php?id={$cItem->getId()}'>{$cItem->getDescription()}</a>";
									//quantity
									$quantity = $cartItem->getQuantity();
									$plusMinus = "";
									if($cartItem->getItem()->getQuantityOnHand() > 0){
									    $plusMinus .= "<a href='{$_SERVER['SCRIPT_NAME']}?inc={$index}'>+</a>";
                                    }

                                    $plusMinus .= "<a href='{$_SERVER['SCRIPT_NAME']}?dec={$index}'>-</a>";

									$quantity .= $plusMinus;
									//price
									$price =  "R {$cItem->getSellPrice()}";
									$id = $cItem->getID();
									//image
									$imgPath = $cItem->getThumbnailPath();
									$img = "<img src='{$imgPath}' class='itemThumbnail'>";

									//remove button
									$removeButton = new RemoveFromCartButton($cItem);
									$remove = "{$removeButton->render()}";


									$data[] = $desc;
                                    $data[] = $quantity;
                                    $data[] = $price;
                                    $data[] = "R" . $cartItem->getItemSubtotal();
                                    $data[] = $img;
                                    $data[] = $remove;

                                    $table->addDataRow($data);

									$total += $cartItem->getItemsubtotal();
								}

                            $data = ["Total:", $shoppingCart->getNumCartItems(), "R " . $total];
                            $table->addDataRow($data);

							echo $table->render();

							$checkoutButton = new CheckoutButton($shoppingCart);
							echo $checkoutButton->render();


						} else {
							echo "<h3 class='error'>Your cart is empty</h3>";
						}

			?>
		</div>
	</body>
</html>