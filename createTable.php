<?php
    include("DBQuery.php");

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
    $result = insert('tbl_User', ['FName','LName','Email','Password'], file('userData.txt'));
    displayStatus('Inserting Users: ', $result);

    //insert fata from file table Item
    $result = insert('tbl_Item',['ID','Description','CostPrice','Quantity','SellPrice'], file('item.csv'));
    displayStatus('Inserting Items: ', $result);

    function displayStatus($label,$result){
        $status = $result ? "sucsess" : "failure";
        echo $label . ": " . $status . '<br>';
    }
?>