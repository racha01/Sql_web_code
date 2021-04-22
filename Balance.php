<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ดูยอดคงเหลือ</title>
</head>
<body>
    <h2> ยอดคงเหลือ </h2>

    <?php
        require('testconnect.php');

        $sql = "SELECT * FROM login WHERE 1";
        $sqlRID = "SELECT ID FROM login WHERE 1";
        $sqlRB = "SELECT Branche FROM login WHERE 1";
        
        $resulRID = mysqli_query($con, $sqlRID);
        $rowRID = mysqli_fetch_row($resulRID);
        $resulRB = mysqli_query($con, $sqlRB);
        $rowRB = mysqli_fetch_row($resulRB);
        $resul = mysqli_query($con, $sql);
        $row = mysqli_fetch_row($resul); 

        //print($row[2]);

        $sqlRBa = "SELECT Balances FROM account_id WHERE (ID , Branch) = ('$rowRID[0]','$rowRB[0]')";
        $resulRBa = mysqli_query($con, $sqlRBa);
        $rowRBa = mysqli_fetch_row($resulRBa);

        print("ยอดเงินปัจจุบันของคุณคือ: $rowRBa[0]"). "<br>";
        /*print($rowRID[0]). "<br>";
        print($rowRB[0]). "<br>";
        $dates = date("d-M-y H:i:s");
        print("$dates"). "<br>";*/
    ?>
    <a href="Home.php">กลับสู่หน้าหลัก</a>
    
</body>
</html>