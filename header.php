<?php
  /*Name: Jamie 
	Surname: Gregory  
	Student#: 16000925
	Login
	Declaration: This is my own work and 
	  any code obtained from other sources
	  will be referenced
*/  ?>
<head>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
<div id="header">
    <h2>Jamie's Just Parts</h2>
    <ul>
        <?php
            session_start();
            include_once("DBQuery.php");
            include_once("ShoppingCart.php");
            include_once('SessionHandler.php');
            // include_once('views/AddToCartButton.php');

            $loggedIn = "";
            $shoppingCart;
            $user;

            if(isset($_COOKIE['user'])){
                $serialUser = $_COOKIE['user'];

                $user = loadUser($_COOKIE['user']);

                $userId = $user->getId();
                $userNames = $user->getNames();
                $loggedIn = '<li>User ' . $userNames . ' logged in</li>';
                echo $loggedIn;

                //load previous cart
                $shoppingCart = loadCart($user);
                $numCartItems = $shoppingCart->getNumCartItems();

                ?>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="cart.php">Cart<?php echo "($numCartItems)" ?></a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <?php
                } else {
                    ?>

                    <li><a href="login.php">Login</a></li>
                    <?php
                }
                
                ?>
                <li><a class='danger' href="createTable.php">Recreate Database</a></li>
        
    </ul>
</div>