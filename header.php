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
            
            $loggedIn = "";
            $shoppingCart;

            if(isset($_COOKIE['user'])){
                $serialUser = $_COOKIE['user'];
                $user = unserialize($serialUser);
                $userId = $user->getId();
                $userNames = $user->getNames();
                $loggedIn = '<li>User ' . $userNames . ' logged in</li>';
                echo $loggedIn;

                $numCartItems = '0';
                
                if(isset($_SESSION[$user->getEmail()])){
                    //load previous cart
                    $shoppingCart = unserialize($_SESSION[$user->getEmail()]);
                    $numCartItems = sizeof($shoppingCart->getItems());
                } else {
                    //create new cart
                    $shoppingCart = new ShoppingCart($user);
                }

                $_SESSION[$user->getEmail()] = serialize($shoppingCart);

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