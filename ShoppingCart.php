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
        private $date;

        public function getID(){
            return $this->ID;
        }

        public function setID($id){
            $this->ID = $id;
        }

        public function setDate($date){
            $this->date = $date;
        }

        public function getDate(){
            return $this->date;
        }


        public function __construct($user){
            $this->cartItems = array();
            $this->user = $user;
        }

        public function getItemIndex($item){
            foreach ($this->cartItems as $i => $cartItem){
                if($cartItem->getItem()->getID() === $item->getID()){
                    return $i;
                }
            }

            return -1;
        }

        public function getNumItems($item){
            $index = $this->getItemIndex($item);
            if($index >= 0){
                return $this->cartItems[$index]->getQuantity();
            }
            return -1;
        }

        public function getTotalCost(){
            $total = 0;
            foreach ($this->cartItems as $cartItem){
                $item = $cartItem->getItem();
                $total += $item->getSellPrice() * $cartItem->getQuantity();
            }
            return $total;
        }

        public function emptyCart(){
            $this->cartItems = array();
        }

        public function removeItem($item){
            foreach ($this->cartItems as $key => $value) {
                if($value->getItem()->getId() === $item->getId()){
                        unset($this->cartItems[$key]);
                    return;
                }
            }
        }

        public function addItem($item){
            
            //find if item already in cart, increment count
            foreach($this->cartItems as $key => $cItem){
                if($cItem->getItem()->getId() === $item->getId()){
                    $cItem->incrementQuantity();
//                    $cItem->getItem()->decrementQuantityOnHand();
                    return;
                }
            }

            $item->decrementQuantityOnHand();
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
