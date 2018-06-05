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

    class CartItem {
        private $id = "";
        private $item;
        private $quantity;
        
        public function __construct($item){
            $this->item = $item;
            $this->quantity = 1;
            // $this->id = com_create_guid();
        }

        public function getItemPrice(){
            return $this->item->getSellPrice();
        }

        public function getItemSubtotal(){
            return $this->item->getSellPrice() * $this->quantity;
        }

        public function getItem(){
            return $this->item;
        }

        public function getQuantity(){
            return $this->quantity;
        }

        public function incrementQuantity(){
            $this->item->decrementQuantityOnHand();
            return $this->quantity++;
        }

        public function decrementQuantity(){
            $this->item->incrementQuantityOnHand();
            return $this->quantity--;
        }


    }

?>
