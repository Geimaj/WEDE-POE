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

						echo "delete item $item->ID";
						$userItems = unserialize($_SESSION[$user]);
						echo "<pre>";
						print_r($userItems);
						echo "</pre>";

						$splicePoint = array_search($item,$userItems);
						echo "I want to delete {$item->description} from index $splicePoint";
						$userItems = array_values($userItems);
						unset($userItems[$splicePoint]);

						$_SESSION[$user] = serialize($userItems);

						header('location: cart.php');

					}
				}
			?>
		</div>
	</body>
</html>