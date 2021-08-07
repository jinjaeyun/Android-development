<?php
    $conn = mysqli_connect("localhost", "root","root","usertest");
    $userID = $_POST['userID'];
    $userPassword = $_POST['userPassword'];
    $sql = mysqli_prepare($conn, "select userID from user where userID = ? and userPassword = ?");
    mysqli_stmt_bind_param($sql,"ss",$userID,$userPassword);
    mysqli_stmt_execute($sql);
    mysqli_stmt_store_result($sql);
    mysqli_stmt_bind_result($sql, $userID);
    $response = array();
    $response["success"]=false;
    while(mysqli_stmt_fetch($sql)){
        $response["success"]=true;
        $response["userID"]=$userID;
    }
    
    echo json_encode($response);
?>