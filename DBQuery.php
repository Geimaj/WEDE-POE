<?php
/*Name: Jamie 
	Surname: Gregory  
	Student#: 16000925
	Login
	Declaration: This is my own work and 
	  any code obtained from other sources
	  will be referenced
*/  

    include('DBConn.php');
    include('Item.php');
    include('User.php');

    function selectUserByEmail($email){
        global $DBConnect;
        $sql = "select * from tbl_User where email = '$email' ";
        $result = $DBConnect->query($sql);
        if($result){
            $data = $result->fetch_assoc();

            $id = $data['ID'];
            $fname = $data['FName'];
            $lname = $data['LName'];
            $email = $data['Email'];
            $hash = $data['Password'];
            $root = $data['root'];
            
            $user = User::newUser($id,$fname,$lname,$email,$hash,$root);
            return $user;
        }

        return null;
    }

    function selectUserById($id){
        global $DBConnect;
        $sql = "select * from tbl_User where id = $id ";
        $result = $DBConnect->query($sql);
        if($result){
            $data = $result->fetch_assoc();

            $id = $data['ID'];
            $fname = $data['FName'];
            $lname = $data['LName'];
            $email = $data['Email'];
            $hash = $data['Password'];
            $root = $data['root'];
            
            $user = User::newUser($id,$fname,$lname,$email,$hash,$root);
            return $user;
        }

        return null;
    }

    function selectItems(){
        global $DBConnect;
        $items = array();
        $sql = "select * from tbl_Item";
        $result = $DBConnect->query($sql);
        if($result){
            while($row = $result->fetch_assoc()){
                $id = $row["ID"];
                $desc = $row["Description"];
                $cp = $row['CostPrice'];
                $quantity = $row['Quantity'];
                $sp = $row['SellPrice'];
                $item = new Item($id,$desc,$cp,$quantity,$sp);
                $items[] = $item;
            }
            return $items;
        } else {
            return null;
        }

    }

    function selectItemById($id){
        global $DBConnect;
        $sql = "select * from tbl_Item where ID = '$id'";
        $result = $DBConnect->query($sql);
        if($result){
            $row = $result->fetch_assoc();
            $ID = $row['ID'];  
            $description = $row['Description'];
            $costPrice = $row['CostPrice'];
            $quantity = $row['Quantity'];
            $sellPrice = $row['SellPrice'];
            $item =  new Item($ID,$description, $costPrice, $quantity, $sellPrice);
            return $item;
        } else {
            echo 'query failed';
        }
        return null;
    }

    function insert($tableName,$columns,$data){
        $insert = "insert into $tableName (";
        // add columns
        foreach($columns as $column){
            $insert .= $column . ",";
        }
        // close bracket and replace comma
        $insert[strlen($insert)-1] = ")";
        //add values
        $insert .= ' values ';
        foreach($data as $row){
            // $row = addslashes($row);
            $fields = explode(',',$row);
            //start data row
            $insert .= '(';
            //add data items
            foreach($fields as $field){
                $insert .= $field . ",";
            }
            //close data row and replace comma
            $insert[strlen($insert)-1] = ')';
            //add comma for next row
            $insert .= ",";
        }
        //remove final comma
        $insert = substr($insert, 0, strlen($insert)-1);

        global $DBConnect;
        $result = $DBConnect->query($insert);
        return $result;
    }

    function validLogin($email,$pass){
        global $DBConnect;
        $hash = md5($pass);
        //find user with matching username and password
        $query = "select * from tbl_User where Email = '$email' and Password = '$hash' ";
        $result = $DBConnect->query($query);
        //return true if user is found
        if($result)
            return $result->num_rows > 0;

        return false;
    }

?>