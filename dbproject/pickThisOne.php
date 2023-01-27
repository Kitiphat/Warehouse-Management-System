<?php
    session_start();
    include('server.php');
$serial = $_GET['serial'];

$sql1 = "SELECT binid FROM storage WHERE SerialNum LIKE '%$serial%'";

$result = mysqli_query($conn2,$sql1);
$binid = mysqli_fetch_row($result);

mysqli_free_result($result);

$sql2 =  "UPDATE binlocation SET _status = 'Vacant' WHERE binID LIKE '$binid[0]' "  ; //
$result2 = mysqli_query($conn2,$sql2);


$sql3 =  "DELETE FROM indvprod WHERE SerialNum LIKE '%$serial%' ";
$result3 =mysqli_query($conn2,$sql3);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pick Order</title>

    </head>
<?php header('Location:pickorder_1.php');?>
</html>
