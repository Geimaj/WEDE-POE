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
</head>
	<body>
			<?php // Script 2.1 - predefined.php
				if(!isset($_COOKIE['user'])){ //redirect to login
					header('location: login.php');
				} 
				//show normal page
				include('header.php');
				?>
				<div id="content">
					<h2>Items</h2>
						<?php
							if(!isset($_POST['showItems'])){
								echo "<form action='index.php' method='POST' ><input type='submit' value='Show Items' name='showItems'></form>";
							} else {
								
								$select = ("select ID, Description, SellPrice from tbl_Item");
								$table = "<table>";
								$table .= "<tr>";
								$table .= "<td>Item Description</td>";
								$table .= "<td>Price</td>";								
								$table .= "</tr>";
								
								$result = $DBConnect->query($select);
								if($result){
										while($row = $result->fetch_assoc()){
												$table .= "<tr>";
												//store id 
												$id = $row['ID'];
												//remove 0th element ( don't display ID)
												$row = array_values($row);
												unset($row[0]);
												//add data to table
												foreach($row as $i => $field){
														//check if 2nd column (add R format)
														$format = $i === 2 ? 'R' : '';
														$table .= "<td>$format$field";
														$table .= "</td>";
												}
												//add image
												$imgPath = getItemImagePath($id);
												$img = "<img src='{$imgPath}' class='itemThumbnail'>";
												$table .= "<td>$img</td>";
												//create form
												$form = "<form action='addToCart.php' method='POST'>";
												$form .= "<input type ='hidden' name='itemID' value='$id'>";
												$form .= "<input type='submit' value='add to cart'>";
												$form .= "</form>";
												//add (form) add to cart button
												$table .= "<td>$form</td>";

												$table .= "</tr>";                
										}
								}
								$table .= "</table>";
								echo $table;
							}
						?>

				</div>
	</body>
</html>