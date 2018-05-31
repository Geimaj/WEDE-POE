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
        private $ID = "";
        private $description = "";
        private $costPrice = "";
        private $quantity = "";
        private $sellPrice = "";
        
        public function __construct($id,$desc,$cost,$quant, $sell){
            $this->ID = $id;
            $this->description = $desc;
            $this->costPrice = $cost;
            $this->quantity = $quant;
            $this->sellPrice = $sell;
        }

        public function getThumbnailPath(){
            return "images/$this->ID/" . scandir("images/$this->ID")[2];
        }

        public function getImagePaths(){
            $images = [];
            $dir = opendir("images/$this->ID");
            while($file = readdir($dir)){
                if($file !== '.' && $file !== '..'){
                    $images[] = "images/$this->ID/$file";
                }
            }
            return $images; 
        }

        public function getId(){
            return $this->ID;
        }

        public function getDescription(){
            return $this->description;
        }

        public function getSellPrice(){
            return $this->sellPrice;
        }

    }

?>
