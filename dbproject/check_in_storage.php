<?php

session_start();
include('server.php');
$bin = $_GET['bin'];
$status = $_GET['status'];
$serial = $_POST["SerialNum"];
$sql2 = "SELECT * FROM serialnumber WHERE _Status LIKE '%Vacant%' ";


$sql1 = "INSERT INTO storage(SerialNum) VALUES('$serial') ";
$result = mysqli_query($conn2,$sql1);

echo $serial;
?>
