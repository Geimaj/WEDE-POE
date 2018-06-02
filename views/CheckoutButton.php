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

    include_once('Button.php');

    class CheckoutButton extends Button{

        private $cart;
        private $confirmed;

        public function __construct($cart)
        {
            $value = addslashes(serialize($cart));
            parent::__construct("checkout.php","POST",$value, 'cart', 'Checkout');
            $this->cart = $cart;
            $this->confirmed = false;

        }

        public function setConfirmed($bool){
            $this->confirmed = $bool;
            if($this->confirmed){
                $this->action = "placeOrder.php";
                $this->prompt = "Confirm order";
            } else {
                $this->action = "checkout.php";
                $this->prompt = "Checkout";
            }
        }


    }


?>