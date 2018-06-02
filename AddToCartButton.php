<!doctype html>
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

    class AddToCartButton {

        private $form;
        private $action;
        private $method;
        private $item;

        public function __construct($item)
        {
            $this->method = "POST";
            $this->action = "addToCart.php";
            $this->item = $item;

            $this->form = "<form action='$this->action' method='$this->method'>";
            $this->form .= "<input type='submit' value='Add to Cart'/>";
            $serialItem = addslashes(serialize($item));
            $this->form .= "<input type='hidden' name ='item' value='{$serialItem}'/>";
            $this->form .= "</form>";

        }

        public function render(){
            if($this->item->getQuantity() > 0){
                return $this->form;
            } else {
                return "Out of stock";
            }
        }

    }


?>