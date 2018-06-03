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
                $queries = explode(';',$sql);


                $output = "";
                $errorCount = 0;

                foreach ($queries as $query){
                    $class = "error";
                    if(strlen($query) >= 1) {
                        $result = $DBConnect->query($query);
                        if ($result) {
                            $class = 'sucsess';
                        } else {
                            $errorCount++;
                        }

                        $mark = ($result === true) ? "pass" : "fail";

                        $output .= "<div class='$class'>";
                        $output .= "<h3>{$mark}</h3>";
                        $output .= $query;
                        $output .= "<hr>";
                        $output .= "</div>";
                    }
                }

                $headingClass;

                if($errorCount > 0){
                    $headingClass = "error";
                } else {
                    $headingClass = "sucsess";
                }

                echo "<h1 class='$headingClass'>Script run with $errorCount errors.</h1>";

                echo $output;

                //
//                $result = $DBConnect->multi_query($sql);

//                if($result){
//                    echo "Sucsessfully recreated db";
//                } else {
//                    echo "Failed recreating db";
//                }

            ?>
        </div>
    </body>
</html>