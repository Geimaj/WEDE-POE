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
	<title>Item</title>
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
					if(isset($_GET['id'])){
						//display item details
						$item = selectItemByID($_GET['id']);
						echo "<h4>$item->ID</h4>";
						echo "<h3>$item->description</h3>";
						echo "<h4>R $item->sellPrice</h4>";
						//disply buy button
						$form = "<form action='addToCart.php' method='POST'>";
						$form .= "<input type ='hidden' name='itemID' value='$item->ID'>";
						$form .= "<input type='submit' value='add to cart'>";
						$form .= "</form>";
						echo $form;
						echo "<hr>";
						//display images
						$paths = $item->getImagePaths();
						foreach($paths as $path){
							echo "<img src='$path'>";
						}

					}
				}
			?>
		</div>
	</body>
</html>