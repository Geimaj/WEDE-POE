<?php 
      /*Name: Jamie 
	Surname: Gregory  
	Student#: 16000925
	Login
	Declaration: This is my own work and 
	  any code obtained from other sources
	  will be referenced
*/  
    class User {
        private $id;
        private $fname;
        private $lname;
        private $email;
        private $hash;
        private $root;

        public function __construct(){
            $this->root = false;
        }

        public static function newUser($id, $fname, $lname, $email, $hash,$root){
            $user = new User();
            $user->setID($id);
            $user->setFname($fname);
            $user->setLname($lname);
            $user->setEmail($email);
            $user->setHash($hash);
            $user->setRoot($root);
            
            return $user;
        }
        
        public function setID($id){
            $this->id = $id;
        }

        public function setFname($fname){
            $this->fname = $fname;
        }

        public function setLname($lname){
            $this->lname = $lname;
        }

        public function setEmail($email){
            $this->email = $email;
        }
        
        public function setHash($hash){
            $this->hash = $hash;
        }

        public function setRoot($root){
            $this->root = $root;
        }

        public function getId(){
            return $this->id;
        }

        public function getNames(){
            return $this->fname . " " . $this->lname;
        }

        public function getEmail(){
            return $this->email;
        }

        public function isRoot(){
            return $this->root;
        }

    }
?>