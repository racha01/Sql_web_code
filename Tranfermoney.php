<?php
    require('testconnect.php');

    $id = $_POST["ID"];
    $branch = $_POST["Branch"];
    $num = $_POST["num"];


    $sql_user = "SELECT * FROM login WHERE 1";
    $sql_acc = "SELECT * FROM account_id WHERE ID = '$id' AND Branch = '$branch'";
    //$sqlRB = "SELECT Branch  FROM `userpassacc` WHERE  Users = '$user' AND Passwords = '$password'";
    //$sqlRA = "SELECT Accstatus  FROM `userpassacc` WHERE  Users = '$user' AND Passwords = '$password'";

    $resul_user = mysqli_query($con, $sql_user);
    $row_user = mysqli_fetch_row($resul_user);
    $resul_acc = mysqli_query($con, $sql_acc);
    $row_acc = mysqli_fetch_row($resul_acc);
    /*$resulRA = mysqli_query($con, $sqlRA);
    $rowRA = mysqli_fetch_row($resulRA);*/

    /*print("$row_user[0]");
    print("$row_user[1]");
    print("$id");
    print("$branch");
    print("$row_acc[1]");
    print("$row_acc[2]");
    print("$row_acc[3]");*/

    if($id == $row_acc[1] && $branch == $row_acc[2] && $row_acc[3] == "normal"){
        
        $sql_RBa = "SELECT SUM(D.Balance) Balance FROM deorwit D WHERE(D.ID, D.Branch) = ('$row_user[0]', '$row_user[1]') GROUP BY D.ID, D.Branch";
        $resul_RBa = mysqli_query($con, $sql_RBa);
        $row_RBa = mysqli_fetch_row($resul_RBa);

        //print("$row_RBa[0]");
        //print("$num");
        if($num <= $row_RBa[0]){
            $dates = date("d-M-y H:i:s");
            //print("$dates"). "<br>";

            $sql_wit = "INSERT INTO deorwit(ID, Branch, Date_time, Withdraw, Balance) VALUES('$row_user[0]','$row_user[1]','$dates', '$num', '-$num')";
            $result_wit = mysqli_query($con, $sql_wit);

            $sql_upBa = "SELECT SUM(D.Balance) Balance FROM deorwit D WHERE(D.ID, D.Branch) = ('$row_user[0]', '$row_user[1]') GROUP BY D.ID, D.Branch";
            $resul_upBa = mysqli_query($con, $sql_upBa);
            $row_upBa = mysqli_fetch_row($resul_upBa);
            //print("$row_upBa[0]");

            $sql_upBa1 = "UPDATE account_id SET Balances = '$row_upBa[0]' WHERE(ID, Branch) = ('$row_user[0]', '$row_user[1]')";
            $resul_upBa1 = mysqli_query($con, $sql_upBa1);    
        
            $sql_upt = "UPDATE deorwit SET Statusacc = 'transfer' WHERE ID = '$row_user[0]' And Branch = '$row_user[1]' And Date_time = '$dates'";
            $result_upt = mysqli_query($con, $sql_upt);

            $sql_de = "INSERT INTO deorwit(ID, Branch, Date_time, Deposit, Balance) VALUES('$row_acc[1]', '$row_acc[2]','$dates','$num', '$num')";
            $result_de = mysqli_query($con, $sql_de);

            $sql_upBa1 = "SELECT SUM(D.Balance) Balance FROM deorwit D WHERE(D.ID, D.Branch) = ('$row_acc[1]', '$row_acc[2]') GROUP BY D.ID, D.Branch";
            $resul_upBa1 = mysqli_query($con, $sql_upBa1);
            $row_upBa1 = mysqli_fetch_row($resul_upBa1);
            //print("$row_upBa1[0]");

            $sql_upBa11 = "UPDATE account_id SET Balances = '$row_upBa1[0]' WHERE(ID, Branch) = ('$row_acc[1]', '$row_acc[2]')";
            $resul_upBa11 = mysqli_query($con, $sql_upBa11);    
        
            $sql_upt1 = "UPDATE deorwit SET Statusacc = 'transfer' WHERE ID = '$row_acc[1]' And Branch = '$row_acc[2]' And Date_time = '$dates'";
            $result_upt1 = mysqli_query($con, $sql_upt1);
            
            echo "ทำรายการเสร็จสิ้น";

        }
        else{
            echo "ยอดเงินของคุณไม่พอ โปรดทำรายการใหม่";
        }
                               

    }
    else{
        echo "ไม่มีบัญชีนี้ในระบบ โปรดตรวจสอบอีกครั้ง";
    }
    //print("$rowRA[0]");

    /*$sqlRID1 = "SELECT ID FROM `account_id` WHERE ID = '$rowRID[0]' AND Branch = '$rowRB[0]'";
    $sqlRB1 = "SELECT Branch  FROM `account_id` WHERE ID = '$rowRID[0]' AND Branch = '$rowRB[0]'";

    $resultRID1 = mysqli_query($con, $sqlRID1);
    $rowRID1 = mysqli_fetch_row($resultRID1);
    $resultRB1 = mysqli_query($con, $sqlRB1);
    $rowRB1 = mysqli_fetch_row($resultRB1);*/


?>