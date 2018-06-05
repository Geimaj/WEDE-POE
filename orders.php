<?php
/*Name: Jamie
  Surname: Gregory
  Student#: 16000925
  Login
  Declaration: This is my own work and
    any code obtained from other sources
    will be referenced
*/

    include_once('header.php');
    include_once('views/Table.php');

    $orders = getOrdersForCustomer($user);

    foreach ($orders as $cart){
        $headinds = ["Item","Price"];
        $table = new Table();
        $table->setHeadings($headinds);

        $items = $cart->getCartItems();

        foreach ($items as $item){
            $data = [];
            $data[] = $item->getItem()->getDescription();
            $data[] = $item->getItem()->getCostPrice();
            $table->addDataRow($data);
        }


        echo "Order number: {$cart->getID()}<br>";
        echo "{$cart->getDate()}<br>";

        echo $table->render();
        echo "Order cost: {$cart->getTotalCost()}<br><hr>";

    }




?>