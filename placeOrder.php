<?php
/*Name: Jamie
Surname: Gregory
Student#: 16000925
Login
Declaration: This is my own work and
any code obtained from other sources
will be referenced

References:

*/

    include_once('header.php');

    $total = $shoppingCart->getTotalCost();
    $orderNumber = commitCart($shoppingCart);

    if($orderNumber >= 0){

        $shoppingCart->emptyCart();
        saveCart($shoppingCart);
        echo sucsess($orderNumber);
    } else {
       echo  "Sorry, that failed.";
    }

    ?>



<?php

    function sucsess($orderNumber){
        global $total;
        return "
            <div>
                <h1>Thank you.</h1>
                <h3>R $total has been deducted from your account.</h3>
                <h3>Order number: $orderNumber</h3>
                <h3><a href='index.php'>Return to shop</a></h3>
            </div>      
        ";
    }

?>