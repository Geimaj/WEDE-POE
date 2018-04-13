<!doctype html>
<?php
  /*Name: Jamie 
	Surname: Gregory  
	Student#: 16000925
	Login
	Declaration: This is my own work and 
	  any code obtained from other sources
	  will be referenced
*/  
	?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Your Title</title>
</head>
	<body>
		<pre>
			<?php // Script 2.1 - predefined.php
				include('DBQuery.php');

				// Show the value of the $_SERVER variable:
				if(isset($_COOKIE['user'])){
					$names = getNames($_COOKIE['user']);
					echo 'User ' . $names . ' is logged in';
				} else {
					echo 'I smell off biscuits';
				}

			?>
		</pre>
	</body>
</html>