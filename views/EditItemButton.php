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

include_once ("Button.php");

class EditItemButton extends Button{


    private $item;

    public function __construct($item)
    {
        $value = addslashes(serialize($item));
        parent::__construct("editItem.php","POST", $value, "item", "Edit Item");
        $this->item = $item;

    }

//    public function render(){
//        if($this->item->getQuantityOnHand() > 0){
//            return parent::render();
//        } else {
//            return "Out of stock";
//        }
//    }

}

?>