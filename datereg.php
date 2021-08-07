<?php
$conn = mysqli_connect("localhost", "root","root","usertest");
$userID = $_POST['userID'];
$sql = "update user set LastDate = curdate() where userID = '$userID'";
$result = mysqli_query($conn,$sql);
?>