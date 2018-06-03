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

    //cart
    function commitCart($cart){
        global $DBConnect;

        $id = insertOrder($cart);

        if($id >= 0){

            foreach ($cart->getCartItems() as $cartItem){
                $item = $cartItem->getItem();

                $sql = "INSERT INTO `tbl_OrderItem`( `OrderID`, `ItemID`, `QuotedPrice`) VALUES ($id, '{$item->getId()}', {$item->getSellPrice()})";
                $result = $DBConnect->query($sql);
                if(!$result){
                    return false;
                } else {
                    //update item quantity
                    if(!update("tbl_Item", " '{$item->getId()}' ", ['quantity'], [$item->getQuantity() - $cartItem->getQuantity()])){
                        return false;
                    }
                }
            }

            return true;
        }

        return false;
    }

    function insertOrder($shoppingCart){
        global $DBConnect;

        $sql = "INSERT INTO `tbl_Order`(`UserID`, `OrderDate`) VALUES ({$shoppingCart->getUser()->getID()},CURRENT_DATE())";

        $result = $DBConnect->query($sql);
        if($result){
            $sql = "SELECT LAST_INSERT_ID()";
            $result = $DBConnect->query($sql);

            return $result->fetch_assoc()['LAST_INSERT_ID()'];
        }
            return -1;

    }

    //user

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

    //item


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

    //util

    function update($tatbleName, $id, $cols, $fields){
        global $DBConnect;

        $update = "update $tatbleName set " ;

        foreach ($cols as $i => $col){
            $update .= "$col=";
            $update .= "{$fields[$i]}";
            $update .= ", ";
        }

        //remove last comma
        $update = substr($update, 0, strlen($update)-2);
        $update .= " where ID = {$id}";


        $result = $DBConnect->query($update);

        return $result;
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