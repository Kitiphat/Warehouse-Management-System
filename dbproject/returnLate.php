<?php
    session_start();
    include('server.php');

    $tid = $_GET['truck'];

    $sql = "SELECT * FROM delivery WHERE truckid LIKE '%$tid%'";

    $result = mysqli_query($conn2,$sql);
    $orderid = mysqli_fetch_row($result);
    
    $sql2 =  "UPDATE order SET _status = 'cancel' WHERE orderid LIKE '$orderid[3]' "  ; //
    $result2 = mysqli_query($conn2,$sql2);  //cancel order
    
    $sql3 =  "DELETE FROM delivery WHERE truckid LIKE '%$tid%' ";
    $result3 =mysqli_query($conn2,$sql3);  // delete delivery
    
    $sql4 =  "UPDATE truck SET _status = 'Ready' WHERE truckid LIKE '$tid' "  ; //
    $result4 = mysqli_query($conn2,$sql4);  //update truck


// header('Location:routereturn.php');    redirect ไปหน้า receive item 

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