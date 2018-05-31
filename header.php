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
            include("DBQuery.php");
            include("ShoppingCart.php");
            include ('SessionHandler.php');
            include ('AddToCartButton.php');

            $loggedIn = "";
            $shoppingCart;
            $user;

            if(isset($_COOKIE['user'])){
                $serialUser = $_COOKIE['user'];

                $user = loadUser($_COOKIE['user']);//selectUserByEmail($serialUser);

                $userId = $user->getId();
                $userNames = $user->getNames();
                $loggedIn = '<li>User ' . $userNames . ' logged in</li>';
                echo $loggedIn;

                $numCartItems = '0';
//
                if(isset($_SESSION[$user->getEmail()])){
                    //load previous cart
                    $shoppingCart = loadCart($user);
                    $numCartItems = $shoppingCart->getNumCartItems();
//                    print_r($shoppingCart);
                    // $numCartItems = $shoppingCart->getNumCartItems();
                } // else {
//                    //create new cart
//                    $shoppingCart = new ShoppingCart($user);
//                }
//
//                saveCart($user->getEmail(), $shoppingCart);

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