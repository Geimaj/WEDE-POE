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

        public function __construct($headings, $data)
        {
            $table = "<table>";
            //add headings
            foreach ($headings as $key => $value) {
                $table .= "<th>";
                $table .= $value;                 
                $table .= "</th>"; 
            }
            //add data
            foreach ($data as $key => $value) { //loop through data array
                $table .= "<tr>";
                foreach ($value as $dataItem) {
                     $table .= "<td>$dataItem</td>";
                }
                $table .= "</tr>";                
            }
            $table .= "</table>";
            
            $this->table = $table;

        }

        public function render(){
            return $this->table;
        }



    }


?>