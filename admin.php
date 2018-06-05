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

    include_once("header.php");
    include_once("views/Table.php");
    include_once("views/EditItemButton.php");

    $headings = ["ID","ITEM","IMAGES","QUANTITY ON HAND", "COST PRICE", "SELL PRICE"];

    $table = Table::newTable($headings,[]);

    $items = selectItems();

    foreach ($items as $item){
        $dataRow = [];
        $dataRow[] = $item->getID();
        $dataRow[] = $item->getDescription();
        $paths = $item->getImagePaths();

        $img = "";

        foreach ($paths as $path){
            $img .= "<img class='thumb' src='$path' />";
        }

        $dataRow[] = $img;
        $dataRow[] = $item->getQuantityOnHand();
        $dataRow[] = $item->getCostPrice();
        $dataRow[] = $item->getSellPrice();

        $editButton = new EditItemButton($item);
        $dataRow[] = $editButton->render();

        $table->addDataRow($dataRow);
    }

    $addButton = new EditItemButton(null);
    $addButton->setPrompt("Add Item");
    echo $addButton->render();
    echo $table->render();




?>