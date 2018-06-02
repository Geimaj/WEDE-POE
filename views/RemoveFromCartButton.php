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

    include_once("Button.php");

    class RemoveFromCartButton extends Button {

        private $item;

        public function __construct($item)
        {
            $value = addslashes(serialize($item));
            parent::__construct("removeFromCart.php", "POST", $value, 'item', "Remove");
            $this->item = $item;
        }


    }


?>