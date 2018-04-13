<?php
    include("DBConn.php");

    //delete tbl_user
    $result = $DBConnect->query('drop table tbl_User');
    displayStatus('Dropping table user:', $result);
    //delet tbl_Item
    $result = $DBConnect->query('drop table tbl_Item');
    displayStatus('Dropping table item: ', $result);

    //create tbl_User
    $result = $DBConnect->query(
        "create table tbl_User ( " .
        "ID int(11) NOT NULL," .
        "FName varchar(50) NOT NULL,".
        "LName varchar(50) NOT NULL," .
        "Email varchar(255) NOT NULL,".
        "Password varchar(255) NOT NULL,".
        "primary key(ID)" .
      ")"
    );
    displayStatus('Creating table user: ', $result);
    
    //create table Item
    $result = $DBConnect->query(
        "create table tbl_Item ( " .
        "ID varchar(255) NOT NULL," .
        "Description varchar(255) NOT NULL,".
        "CostPrice double NOT NULL," .
        "Quantity int(11) NOT NULL,".
        "SellPrice double NOT NULL,".
        "primary key(ID)" .
        ")"
    );
    displayStatus('Creating table item: ', $result);

    //auto increment to tbl_User
    $result = $DBConnect->query(
        "alter table `tbl_User` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;"
    );
    displayStatus('Assign ID\'s to table User: ', $result);

    //insert data from file table User
    $insert = "insert into tbl_User (Fname, LName, Email, Password) values ";
    $data = file('userData.txt');
    foreach($data as $row){
        $fields = explode(',',$row);
        $insert .= "({$fields[0]},{$fields[1]},{$fields[2]},{$fields[3]}),";        
    }
    //remove last comma
    $insert =  substr($insert, 0, -1);

    //insert fata from file table Item
    $insert = "insert into tbl_Item (ID,Description,CostPrice,Quantity,SellPrice) VALUES ";
    $data = file('item.csv');
    


    $result = $DBConnect->query($insert);
    displayStatus('Adding users: ', $result);
    
    function displayStatus($task,$result){
        $status = $result ? "sucsess" : "failure";
        echo $task . ": " . $status . '<br>';
    }
?>