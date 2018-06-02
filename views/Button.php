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

    class Button {

        protected $form;
        protected $action;
        protected $method;
        protected $value;
        protected $prompt;
        protected $name;

        public function __construct($action, $method, $value, $name, $prompt)
        {
            $this->method = $method;
            $this->action = $action;
            $this->value = $value;
            $this->prompt = $prompt;
            $this->name = $name;
        }

        public function render(){
            $form = "<form action='$this->action' method='$this->method'>";
            $form .= "<input type='submit' value='$this->prompt'/>";
            $form .= "<input type='hidden' name ='$this->name' value='{$this->value}'/>";
            $form .= "</form>";
            
            $this->form = $form;
            return $this->form;
        }

    }


?>