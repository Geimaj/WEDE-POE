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

include_once ('header.php');

if(isset($_POST['item'])){
    $item = loadItem($_POST['item']);
    $id = $item->getID();

    if(dropItem($item)){
        header("location: admin.php");
    } else {
        echo "Failed deleting item...";
    }

}


?>