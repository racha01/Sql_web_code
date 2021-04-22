<?php
    $sqlRN = "SELECT National_ID  FROM `account_id` WHERE National_ID = '$nid' AND ID = '$aid' AND Branch = '$branch'";
    $sqlRID = "SELECT ID FROM `account_id` WHERE National_ID = '$nid' AND ID = '$aid' AND Branch = '$branch'";
    $sqlRB = "SELECT Branch  FROM `account_id` WHERE National_ID = '$nid' AND ID = '$aid' AND Branch = '$branch'";
    
    $resultRN = mysqli_query($con, $sqlRN);
    $rowRN = mysqli_fetch_row($resultRN);
    $resultRID = mysqli_query($con, $sqlRID);
    $rowRID = mysqli_fetch_row($resultRID);
    $resultRB = mysqli_query($con, $sqlRB);
    $rowRB = mysqli_fetch_row($resultRB);

?>