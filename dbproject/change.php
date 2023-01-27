<?php
    session_start();
    include('server.php');

    $binid = $_GET['binid'];
    $serial = $_POST['serial'];
echo $binid;
echo $serial;

$sql2 =  "UPDATE storage SET serialnum = '$serial' WHERE binID LIKE '$binid' "  ; //
$result2 = mysqli_query($conn2,$sql2);
header('Location:cyclecount.php');


?>

<!DOCTYPE html>
<html lang = "en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cycle Count</title>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
<h1>hello</h1>
    </body>
    
</html>