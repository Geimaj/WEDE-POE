<div id="header">
    <ul>
        <?php
            $loggedIn = "";
            include("DBQuery.php");
            if(isset($_COOKIE['user'])){
                $user = getNames($_COOKIE['user']);
                $loggedIn = '<li>User ' . $user . ' logged in</li>';
                echo $loggedIn;

                $numCartItems = '';

                if(isset($_COOKIE['cartItems'])){
                    $items = unserialize($_COOKIE['cartItems']);
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
                <li><a href="createTable.php">Recreate Database</a></li>
        
    </ul>
</div>