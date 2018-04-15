<!doctype html>
<?php
  /*Name: Jamie 
	Surname: Gregory  
	Student#: 16000925
	Login
	Declaration: This is my own work and 
	  any code obtained from other sources
	  will be referenced
*/  
?>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Create Database</title>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    
</head>
    <body>
        <?php
            // include("DBQuery.php");
            include("header.php");
        ?>
        <div id="content">
            <?php

                //delete tbl_user
                $result = $DBConnect->query('drop table tbl_User');
                displayStatus('Dropping table user', $result);
                //delet tbl_Item
                $result = $DBConnect->query('drop table tbl_Item');
                displayStatus('Dropping table item', $result);

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
                displayStatus('Creating table user', $result);
                
                //create table Item
                $result = $DBConnect->query(
                    "create table tbl_Item ( " .
                    "ID varchar(100) NOT NULL," .
                    "Description varchar(255) NOT NULL,".
                    "CostPrice double NOT NULL," .
                    "Quantity int(11) NOT NULL,".
                    "SellPrice double NOT NULL,".
                    "primary key(ID)" .
                    ")"
                );

                displayStatus('Creating table item', $result);

                //auto increment to tbl_User
                $result = $DBConnect->query(
                    "alter table `tbl_User` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;"
                );
                displayStatus('Assign ID\'s to table User', $result);

                //insert data from file table User
                $result = insert('tbl_User', ['FName','LName','Email','Password'], file('test-data/userData.csv'));
                displayStatus('Inserting Users', $result);

                //insert fata from file table Item
                $result = insert('tbl_Item',['ID','Description','CostPrice','Quantity','SellPrice'], file('test-data/item.csv'));
                displayStatus('Inserting Items', $result);

                function displayStatus($label,$result){
                    $status = $result ? "sucsess" : "<span style=" . "'color:red;'". ">failure</span>";
                    echo "<p>" . $label . ": " . $status . '</p>';
                }
            ?>
        </div>
    </body>
</html>