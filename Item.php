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

    class Item {
        public $ID = "";
        public $description = "";
        public $costPrice = "";
        public $quantity = "";
        public $sellPrice = "";
        
        public function __construct($id,$desc,$cost,$quant, $sell){
            $this->ID = $id;
            $this->description = $desc;
            $this->costPrice = $cost;
            $this->quantity = $quant;
            $this->sellPrice = $sell;
        }
    }

?>
