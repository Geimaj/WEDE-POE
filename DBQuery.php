<?php

    include('DBConn.php');

    function getNames($email){
        global $DBConnect;
        $query = "select * from tbl_User where Email = '$email'";
        $result = $DBConnect->query($query);

        $fields = $result->fetch_assoc();
        return $fields['FName'] . ' ' . $fields['LName'];
    }

?>