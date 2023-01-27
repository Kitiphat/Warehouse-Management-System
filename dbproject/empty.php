<?php
    session_start();
    include('server.php');
    $binid = $_GET['binid'];

echo $binid;
$sql2 =  "UPDATE binlocation SET _status = 'Vacant' WHERE binID LIKE '$binid' "  ; //
$result2 = mysqli_query($conn2,$sql2);


$sql3 =  "DELETE FROM storage WHERE binid LIKE '%$binid%' ";
$result3 =mysqli_query($conn2,$sql3);
 header('Location:cyclecount.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cycle Count</title>
    </head>

</html>
