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

if(isset($_POST['id'])){

    $id = $_POST['id'];
    $desc = $_POST['description'];
    $cost = $_POST['cost'];
    $sell = $_POST['sell'];
    $qoh = $_POST['qoh'];

    //check if item already exists
    $item = selectItemById($id);

//    print_r($item);

    if($item->getId() === $id){
        //update
        $insertItem = new Item($id,$desc,$cost,$qoh,$sell);
        updateItem($insertItem);

    } else {
        //insert

        $item = new Item($id,$desc,$cost,$qoh,$sell);
        insertItem($item);
    }

    echo "<hr>";

//    print_r($_POST);

    header("location: admin.php");


}


?>