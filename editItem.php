<?php
/*Name: Jamie
Surname: Gregory
Student#: 16000925
Login
Declaration: This is my own work and
any code obtained from other sources
will be referenced

References:
https://www.w3schools.com/php/php_file_upload.asp
*/
    include_once('header.php');

    $item = false;

    if(isset($_POST['item'])){
        $item = loadItem($_POST['item']);
    } else {
        if(isset($_GET['id'])){
            $item = selectItemById($_GET['id']);
        }
    }

    $id = "";
    $get = "";
    $desc = "";
    $cost = 0;
    $sell = 0;
    $qoh = 0;
    if($item){
        $get = "?id={$item->getID()}";
        $id = $item->getId();
        $desc = $item->getDescription();
        $cost = $item->getCostPrice();
        $sell = $item->getSellPrice();
        $qoh = $item->getQuantityOnHand();
    }

    $form = "";


    $form .= "<form action='addItem.php' method='post'>";
    $form .= "<label for='id'>ID</label>";
    $form .=  "<input type='text' name='id' value='$id' required>";
    $form .= "<br>";

    $form .=  "<label for='description'>Description</label>";
    $form .= "<input type='text' name='description'  value='$desc'  required>";
    $form .=  "<br>";

    $form .= "<label for='cost'>Cost Price</label>";
    $form .= "<input type='number' name='cost'  value='$cost' required>";
    $form .=  "<br>";

    $form .= "<label for='sell'>Sell Price</label>";
    $form .= "<input type='number' name='sell'  value='$sell' required>";

    $form .=  "<br>";
    $form .=  "<label for='qoh'>Quantity on hand</label>";
    $form .=  "<input type='number' name='qoh' value='$qoh' required>";
    $form .=  "<br>";

//    $saveForm = "<form action='addItem.php' method='post'><input type='submit' value='Save'><input name='item' type='hidden' value='{$serialItem}'></form>";
    $form .= "<input type='submit' value='Save'>";
    $form .= "</form>";
    echo $form;


    $serialItem = serializeItem($item);

    $removeForm = "<form action='removeItem.php' method='post'><input type='submit' value='Delete' class='red'><input name='item' type='hidden' value='{$serialItem}'></form>";

    echo $removeForm;


    echo "<h2>Images</h2>";

    $uploadForm = '<form action="upload.php' .  $get . ' " method="post" enctype="multipart/form-data">
                        Select image to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload" required>
                        <input type="submit" value="Upload Image" name="submit">
                    </form>';

    echo $uploadForm;

    echo "<hr>";

    if($item){
        $paths = $item->getImagePaths();

        foreach ($paths as $path){
            $img = "<img src='$path'>";
            echo $img;
        }

    }


?>
