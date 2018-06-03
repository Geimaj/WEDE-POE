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
    include_once('views/Table.php');
    include_once('views/CheckoutButton.php');
    
    echo "<h2>Order Summary</h2>";
 
    //populate table


    $headings = ['Item', "Quantity","Price","Subtotal"];
    $data = [];
    $cartItems = $shoppingCart->getCartItems();
    foreach ($cartItems as $key => $value) {
        $dataRow = [];
        $dataRow[] = $value->getItem()->getDescription();
        $dataRow[] = $value->getQuantity();
        $dataRow[] = "R " . $value->getItem()->getSellPrice();
        $dataRow[] = "R " . $value->getItemSubtotal();
        
        $data[] = $dataRow;
    }

    $data[] = (["Total: ",$shoppingCart->getNumCartItems(),$shoppingCart->getTotalCost()]);

    $table = Table::newTable($headings, $data);    
    echo $table->render();


    $confirmButton = new CheckoutButton($shoppingCart);
    $confirmButton->setConfirmed(true);
    echo $confirmButton->render();

    echo "<a href='cart.php'>Go back</a>";

?>