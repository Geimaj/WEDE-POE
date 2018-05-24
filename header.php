<head>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
<div id="header">
    <h2>Jamie's Just Parts</h2>
    <ul>
        <?php
        session_start();
            $loggedIn = "";
            include("DBQuery.php");
            if(isset($_COOKIE['user'])){
                $user = getNames($_COOKIE['user']);
                $loggedIn = '<li>User ' . $user . ' logged in</li>';
                echo $loggedIn;

                $numCartItems = '0';
                
                if(isset($_SESSION[$user])){
                    $items = unserialize($_SESSION[$user]);
                    $numCartItems = sizeof($items);
                }

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