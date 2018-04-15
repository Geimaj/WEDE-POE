<div id="header">
    <ul>
        <?php
            $loggedIn = "";
            include("DBQuery.php");
            if(isset($_COOKIE['user'])){
                $user = getNames($_COOKIE['user']);
                $loggedIn = '<li>User ' . $user . ' logged in</li>';
                echo $loggedIn;
                ?>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="cart.php">Cart</a></li>
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