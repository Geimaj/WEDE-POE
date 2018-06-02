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
            include("header.php");
            $userFile = file('test-data/tbl_User.csv');
            $itemFile = file('test-data/item.csv');

            $databaseFile = file('test-data/db.sql');

        ?>
        <div id="content">
            <?php

                $sql = implode('',$databaseFile);

                $result = $DBConnect->multi_query($sql);

                if($result){
                    echo "Sucsessfully recreated db";
                } else {
                    echo "Failed recreating db";
                }

            ?>
        </div>
    </body>
</html>