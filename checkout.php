<?php

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
        $dataRow[] = $value->getItem()->getSellPrice();
        $dataRow[] = $value->getItemSubtotal();
        
        $data[] = $dataRow;
    }

    $table = new Table($headings, $data);    
    echo $table->render();

    $confirmButton = new CheckoutButton($shoppingCart);
    $confirmButton->setConfirmed(true);
    echo $confirmButton->render();


?>