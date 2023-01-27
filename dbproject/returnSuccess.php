<?php
    session_start();
    include('server.php');

    $tid = $_GET['truck'];


$sql2 =  "UPDATE truck SET _status = 'Ready' WHERE truckid LIKE '$tid' "  ; //
$result2 = mysqli_query($conn2,$sql2);

$sql3 =  "DELETE FROM delivery WHERE truckid LIKE '%$tid%' ";
$result3 =mysqli_query($conn2,$sql3);


header('Location:routereturn.php');
?>
<!DOCTYPE html>
<html lang = "en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route Return</title>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
<h1>hello</h1>
    </body>
    
</html>