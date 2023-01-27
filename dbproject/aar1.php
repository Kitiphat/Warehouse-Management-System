<?php 

    session_start();
    include('server.php');

    $wh = "wh1";
    $pid = $_POST['pid'];
    $sql = "SELECT * FROM warehouse WHERE WarehouseID LIKE '%$wh%'";
    $result = mysqli_query($conn2,$sql);
    $wh_row = mysqli_fetch_row($result);

    // echo $pid;
    $sql2 = "SELECT * FROM products WHERE productid LIKE '%$pid%'";
    $result2 = mysqli_query($conn2,$sql2);
    $p_row = mysqli_fetch_row($result2);

    $sql3 = "SELECT * FROM indvprod WHERE productid LIKE '%$pid%'";
    $result3 = mysqli_query($conn2,$sql3);

    $today = time();
    $i = 0;
    $count = mysqli_num_rows($result3);
    $j = 0;

?>




<!DOCTYPE html>
<html lang = "en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Report</title>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <h2><?php echo $wh_row[1] ?></h2>
    <h2>Address:<?php echo $wh_row[2] ?></h2>
    <h2>Tel:<?php echo $wh_row[3] ?>        Email:<?php echo $wh_row[4] ?></h2>
    <h2>Product:<?php echo $p_row[1]." : ".$p_row[2] ?></h2>
    <h2>Units: <?php echo $p_row[5]."  PPU : ".$p_row[3] ?> </h2>
    <table border = "1">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Amount</th>
                    <th>EXP Date</th>
                    <th>Bin Location</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row=mysqli_fetch_row($result3)){?>
                <tr>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php print_r($row[3]); ?></td>
                    <?php $sql4 = "SELECT binid FROM storage WHERE serialnum LIKE '%$row[1]%'";
                        $result4 = mysqli_query($conn2,$sql4);
                        $bid = mysqli_fetch_row($result4);
                         ?>
                    <td><?php echo $bid[0];?></td>
                    <td><?php
                    $expday = strtotime($row[3]);
                    $day_diff = $expday - $today;
                    $dl = floor($day_diff/(60*60*24));
                    if($dl<0){
                        echo "wasted";
                        $price[$i++]=0;
                    }
                    else if($dl< 90){
                        echo "danger";
                        $price[$i++]=$p_row[3]*$row[2]*0.7;
                    }
                    else if($dl<365){
                        echo "fine";
                        $price[$i++]=$p_row[3]*$row[2]*0.9;
                    }
                    else{
                        echo "good";
                        $price[$i++]=$p_row[3]*$row[2];
                    }


                    ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <h2>Total Quantity:
            <?php 
            $sql4 = "SELECT SUM(Quantity) FROM indvprod WHERE productid LIKE '%$pid%'";
            $result4 = mysqli_query($conn2,$sql4);
            $sum = mysqli_fetch_row($result4);
            echo $sum[0];
            echo "  Initial Price : ".$sum[0]*$p_row[3];
            for($i=0;$i<$count;$i++)
            {
                $j=$j+$price[$i];
            }

            echo " Estimate Price : ";

            echo $j;
            
        ?></h2>

    </body>
    
</html>