<?php
    include("DBConn.php");
    //make sure email doesnt exist already
    $email = $_POST['email'];
    $fname = $_POST['FName'];
    $lname = $_POST['LName'];
    $password = md5($_POST['password']);

    if(validEmail($email)){ //valid email, create user
        echo 'valid email<br>';
        insertUser($fname,$lname,$email,$password);
    } else { //email invalid
        echo 'that email is already registred. <a href="#">Forgot Password?</a><br>';
    }

    function validEmail($email){
        global $DBConnect;
        $query = "select * from tbl_User where email = '$email' ";    
        $result = $DBConnect->query($query);
    
        if($result === false){
            echo '<p> failed reading data </p>';
        } else {
            $numRows = $result->num_rows;
            return !$numRows > 0;
        }
    }

    function insertUser($fname,$lname,$email,$hash){
        global $DBConnect;
        $query = "insert into tbl_User (FName,LName,Email,Password) values('$fname','$lname','$email','$hash')";
        $result = $DBConnect->query($query);
        
        if($result === false){
            'echo failed adding user';
        } else {
            echo "$email added sucsessfully";
        }

    }



?>