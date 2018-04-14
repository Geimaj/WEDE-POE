<?php

    include('DBConn.php');

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

    function getNames($email){
        global $DBConnect;
        $query = "select * from tbl_User where Email = '$email'";
        $result = $DBConnect->query($query);

        $fields = $result->fetch_assoc();
        return $fields['FName'] . ' ' . $fields['LName'];
    }

?>