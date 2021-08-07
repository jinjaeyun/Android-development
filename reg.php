<?php
$conn = mysqli_connect("localhost", "root","root","usertest");
$userID = $_POST['userID'];
$Name = $_POST['Name'];
$userPassword = $_POST['userPassword'];
$sql = "insert into user values('$userID','$userPassword','$Name',NULL)";
$result = mysqli_query($conn,$sql);
$response = array();
$response["success"]=true;

echo json_encode($response);
?>