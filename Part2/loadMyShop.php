<!doctype html>
<?php
  /*Name: Jamie 
	Surname: Gregory  
	Student#: 16000925
	Login
	Declaration: This is my own work and 
	  any code obtained from other sources
      will be referenced
    <REFERENCES>
        https://stackoverflow.com/questions/4027769/running-mysql-sql-files-in-php#4028289
    </REFERENCES:>
*/  
	?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Load Shop</title>
</head>
	<body>
		<pre>
			<?php

                //init db connection
                $ErrorMsgs = array(); 
                $host = "localhost";
                $username = "test";
                $password = "test";
                $db = "test";
                $createScriptPath = 'myShop.sql';
                
                $DBConnect = new mysqli($host, $username, $password, $db);
                if  (!$DBConnect) {
                    $ErrorMsgs[] = "The database server is not available.";
                } else {
                    echo "Sucsessful connection</br>";
                }

                $results = [];

                //drop tables
                $results[] = $DBConnect->query("drop table TBL_ORDER_ITEM");
                $results[] = $DBConnect->query("drop table TBL_ORDER");
                $results[] = $DBConnect->query("drop table TBL_ITEM");
                $results[] = $DBConnect->query("drop table TBL_CUSTOMER");
                
                
                //form command to run script
                $create = "mysql -u{$username} -p{$password} -h{$host} -D{$db} < {$createScriptPath}";
                //execute command
                echo $create . "<br>";
                $results[] = shell_exec($create);


                foreach($results as $r){
                    if($r != 1){
                    echo 'failure' . "<br>";
                    } else {
                        echo "sucsess" . "<br>";
                    }
                }

			?>
		</pre>
	</body>
</html>