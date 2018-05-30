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

    class ShoppingCart {
        private $ID = "";
        private $userID = "";
        private $items;
        private $user;
        
        public function __construct($user){
            $this->items = array();
            $this->user = $user;
        }

        public function addItem($item){
            $this->items[] = $item;
        }

        public function getItems(){
            return $this->items;
        }




    }

?>
