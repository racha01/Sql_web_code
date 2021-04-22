<?php
        require('testconnect.php');
        
       
        /*$sql = "SELECT * FROM login WHERE 1";

        $resul = mysqli_query($con, $sql);
        $row = mysqli_fetch_row($resul);*/

        //print($row[2]);
        
        //$user = $_post["user"];
        $sql = "DELETE FROM login WHERE 1";
        $result = mysqli_query($con, $sql);
        
        require('index.php');
    ?>