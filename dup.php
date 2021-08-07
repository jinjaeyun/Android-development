<?php
$conn = mysqli_connect("localhost", "root","root","usertest");
$userID = $_POST['userID'];
$sql = mysqli_prepare($conn, "select userID from user where userID = ?");
mysqli_stmt_bind_param($sql,"s",$userID);
mysqli_stmt_execute($sql);
mysqli_stmt_store_result($sql);
mysqli_stmt_bind_result($sql, $userID);
$response = array();
$response["success"]=true;
while(mysqli_stmt_fetch($sql)){
    $response["success"]=false;
    $response["userID"]=$userID;
}

echo json_encode($response);
?>