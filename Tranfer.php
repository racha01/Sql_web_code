<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โอนเงิน</title>
</head>
<body>
    <h2> โอนเงิน </h2>
    <?php
        require('testconnect.php');

        $sqlRID = "SELECT ID FROM login WHERE 1";
        $sqlRB = "SELECT Branche FROM login WHERE 1";
        
        $resulRID = mysqli_query($con, $sqlRID);
        $rowRID = mysqli_fetch_row($resulRID);
        $resulRB = mysqli_query($con, $sqlRB);
        $rowRB = mysqli_fetch_row($resulRB);
        $dates = date("d-M-y H:i:s");

        
        //print($rowRID[0]). "<br>";
        //print($rowRB[0]). "<br>";
        
        //print("$dates"). "<br>";
    ?>
    <form action="Tranfermoney.php" method="POST">
        <div>
            <lacbel for="">เลขบัญชี</label>
            <input type="text" name="ID" id="">
        </div>
        <div>
            <lacbel for="">สาขา</label>
            <input type="text" name="Branch" id="">
        </div>
        <div>
            <lacbel for="">จำนวน</label>
            <input type="text" name="num" id="">
            <lacbel for="">บาท</label>
        </div>
        <input type="submit" value="ยืนยัน">
    </form>

    <a href="Home.php">กลับสู่หน้าหลัก</a>
</body>
</html>