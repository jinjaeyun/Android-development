<?php
$conn = mysqli_connect("localhost", "root","root","usertest");
$userID = $_POST['userID'];
$sql = mysqli_prepare($conn, "select Name from user where userID = ?");
$query = mysqli_prepare($conn, "select LastDate from user where userID = ?");
mysqli_stmt_bind_param($sql,"s",$userID);
mysqli_stmt_execute($sql);
mysqli_stmt_store_result($sql);
mysqli_stmt_bind_result($sql, $Name);
mysqli_stmt_bind_param($query,"s",$userID);
mysqli_stmt_execute($query);
mysqli_stmt_store_result($query);
mysqli_stmt_bind_result($query, $LastDate);
$response = array();
$response["success"] = false;
while(mysqli_stmt_fetch($sql)){
   $response["Name"]= $Name;
}
while(mysqli_stmt_fetch($query)){
   $response["LastDate"]= $LastDate;
   if($LastDate != null){
      $response["success"]=true;
   }
}

echo json_encode($response);
?>