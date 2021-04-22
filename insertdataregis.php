<?php
    require('testconnect.php');
    
    $pass = $_POST["password"];
    $apass = $_POST["apassword"];
    if ($pass == $apass){
        $nid = $_POST["nationalid"];  
        $aid = $_POST["ID"];
        $branch = $_POST["Branch"];
        $user = $_POST["user"];
        $password = $_POST["password"];

        $sqlRN = "SELECT National_ID  FROM `account_id` WHERE National_ID = '$nid' AND ID = '$aid' AND Branch = '$branch'";
        $sqlRID = "SELECT ID FROM `account_id` WHERE National_ID = '$nid' AND ID = '$aid' AND Branch = '$branch'";
        $sqlRB = "SELECT Branch  FROM `account_id` WHERE National_ID = '$nid' AND ID = '$aid' AND Branch = '$branch'";
    
        $resultRN = mysqli_query($con, $sqlRN);
        $rowRN = mysqli_fetch_row($resultRN);
        $resultRID = mysqli_query($con, $sqlRID);
        $rowRID = mysqli_fetch_row($resultRID);
        $resultRB = mysqli_query($con, $sqlRB);
        $rowRB = mysqli_fetch_row($resultRB);


        print($rowRN[0]). "<br>";
        print($rowRID[0]). "<br>";
        print($rowRB[0]). "<br>";
        $dates = date("d-M-y H:i:s");
        print("$dates"). "<br>";
        if($nid == $rowRN[0] && $aid == $rowRID[0] && $branch == $rowRB[0]){
            $sql = "INSERT INTO userpassacc(National_ID, ID, Branch, Users, Passwords) VALUES('$nid', '$aid', '$branch','$user','$password')";
            $result = mysqli_query($con, $sql);
            echo "ทำรายการเสร็จสิ้น";
        }
        else{
            print("$nid"). "<br>";
            print("$aid"). "<br>";
            print("$branch"). "<br>";
            echo "ทำรายการล้มเหลวโปรดลองใหม่". "<br>";
            echo "เลขบัตรประจำตัวประชาชนไม่ถูกต้องหรือเลขสาขาไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง";
        }
    }
    else{
        echo "พาสเวิร์ดไม่ตรงกัน";
    
    }
    
?>
<br><a href="index.php">เข้าสู่ระบบ</a>