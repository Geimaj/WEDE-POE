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

    class Table {

        private $headings;
        private $data;

        private $table;

        public function __construct(){

        }

        public static function newTable($headings, $data)
        {
            $table = new Table();
            $table->setHeadings($headings);
            $table->setData($data);
            
            return $table; 
        }

        public function render(){

            $table = "<table>";
            //add headings
            foreach ($this->headings as $key => $value) {
                $table .= "<th>";
                $table .= $value;                 
                $table .= "</th>"; 
            }
            //add data
            foreach ($this->data as $key => $value) { //loop through data array
                $table .= "<tr>";
                foreach ($value as $dataItem) {
                     $table .= "<td>$dataItem</td>";
                }
                $table .= "</tr>";                
            }
            $table .= "</table>";
            
            $this->table = $table;
            return $this->table;
        }

        public function addHeading($heading){
            $this->headings[] = $heading;
        }

        public function addDataRow($row){
            $this->data[] = $row;
        }

        public function setHeadings($headings){
            $this->headings = $headings;
        }

        public function setData($data){
            $this->data = $data;
        }
    }


?>