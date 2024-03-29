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
        <pre>
		<?php
			include("header.php");
		?>
		<div id="content">
			<?php
				//ensure user is logged in
				// if(isset($_COOKIE['user'])){ 
					if(isset($_POST['item'])){
						$serialItem = ($_POST['item']);
						$item = loadItem($serialItem);

                        addItem($item);

						// set last item cookie for notification
						$lastItem = $item;
						$cookie_name = "lastItem";
						$cookie_value = serialize($lastItem);
						$cookie_time = time() + (86400); // 30 days
						setcookie($cookie_name, $cookie_value, $cookie_time, '/');

//						print_r($shoppingCart);

						header('location: index.php');
					} else {
					    echo "no item set?";
                    }
				// }

                function addItem($item){
                    global $shoppingCart;
                    $shoppingCart->addItem($item);
                    saveCart($shoppingCart);
                }

			?>
		</div>
        </pre>
	</body>
</html>