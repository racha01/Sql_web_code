<?php
    require('testconnect.php');

    $user = $_POST["user"];
    $password = $_POST["password"];

    $sqlRID = "SELECT ID  FROM `userpassacc` WHERE  Users = '$user' AND Passwords = '$password'";
    $sqlRB = "SELECT Branch  FROM `userpassacc` WHERE  Users = '$user' AND Passwords = '$password'";
    $sqlRA = "SELECT Accstatus  FROM `userpassacc` WHERE  Users = '$user' AND Passwords = '$password'";

    $resultRID = mysqli_query($con, $sqlRID);
    $rowRID = mysqli_fetch_row($resultRID);
    $resultRB = mysqli_query($con, $sqlRB);
    $rowRB = mysqli_fetch_row($resultRB);
    $resulRA = mysqli_query($con, $sqlRA);
    $rowRA = mysqli_fetch_row($resulRA);

    //print("$rowRID[0]");
    //print("$rowRB[0]");
    //print("$rowRA[0]");

    $sqlRID1 = "SELECT ID FROM `account_id` WHERE ID = '$rowRID[0]' AND Branch = '$rowRB[0]'";
    $sqlRB1 = "SELECT Branch  FROM `account_id` WHERE ID = '$rowRID[0]' AND Branch = '$rowRB[0]'";

    $resultRID1 = mysqli_query($con, $sqlRID1);
    $rowRID1 = mysqli_fetch_row($resultRID1);
    $resultRB1 = mysqli_query($con, $sqlRB1);
    $rowRB1 = mysqli_fetch_row($resultRB1);

    //print("$rowRID1[0]");
    //print("$rowRB1[0]");

    if($rowRID1[0] == $rowRID[0] && $rowRB1[0] == $rowRB[0] && $rowRA[0] == "active"){
        //echo "S";
        
        $sql = "INSERT INTO login(ID, Branche, Users) VALUES('$rowRID1[0]', '$rowRB1[0]', '$user')";
        $result = mysqli_query($con, $sql);
        
        require('Home.php');
    }
    else{
        echo "ระหัสผ่านไม่ถูกต้อง";
    }
?>
    
    
