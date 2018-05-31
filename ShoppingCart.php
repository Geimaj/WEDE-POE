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

    include_once('CartItem.php');

    class ShoppingCart {
        private $ID = "";
        private $cartItems;
        private $user;

        public function __construct($user){
            $this->cartItems = array();
            $this->user = $user;
        }

        public function clearCart(){
            $this->cartItems = array();
        }

        public function removeItem($item){
            foreach ($this->cartItems as $key => $value) {
                if($value->getItem()->getId() === $item->getId()){
                    //decrement count
                    $value->decrementQuantity();
                    //if count == 0 remove from array
                    if($value->getQuantity() <= 0){
                        
                        unset($this->cartItems[$key]);

                    }
                    return;
                }
            }
        }

        public function addItem($item){
            
            //find if item already in cart, increment count
            foreach($this->cartItems as $key => $value){
                if($value->getItem()->getId() === $item->getId()){
                    $value->incrementQuantity();
                    return;
                }
            }

            $cartItem = new CartItem($item);
            //item not yet in cart, add new item
            $this->cartItems[] = $cartItem;
        }

        public function getCartItems(){
            return $this->cartItems;
        }

        public function getNumCartItems(){
            $count = 0;
            foreach($this->cartItems as $key => $value){
                $count += $value->getQuantity();
            }

            return $count;
        }

        public function getUser(){
            return $this->user;
        }


    }

?>
