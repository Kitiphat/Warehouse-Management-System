<?php

session_start();
include('server.php');

$sql = "SELECT * FROM binlocation WHERE _Status LIKE '%Vacant%' ";
$result = mysqli_query($conn2,$sql);
$count = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
    
</head>
   <h1> Check-in </h1>
<body>
    <table border=" 2 ">
        <thead>
            <tr>
                <th>Binlocation</th>
                <th>Status</th>
                <th>Capacity</th>
                <th>Warehouse</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_object($result)){ ?>
            <tr>
                <td> <?php echo $row -> BinID ?> </td>
                <td> <?php echo $row -> _Status ?> </td>
                <td> <?php echo $row -> Capacity ?> </td>
                <td> <?php echo $row -> WarehouseID ?> </td> 
                <td><a href="check_in_getSerial.php?bin=<?php echo $row -> BinID?>&status=<?php echo $row -> _Status?>">SELECT</a></td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
    
</body>
</html>