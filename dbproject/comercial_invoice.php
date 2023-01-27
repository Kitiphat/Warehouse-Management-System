<?php


session_start();
include('server.php');
$sql = "SELECT WarehouseName,Address,Tel_No,Email  FROM warehouse";
$result = mysqli_query($conn2,$sql);

$sql2 = "SELECT ProductID,ProductName,Description,Price FROM products";
$result2 = mysqli_query($conn2,$sql2);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<style>
table, th, td {
  border:1px solid black;
}
table.center {
  margin-left: auto; 
  margin-right: auto;
}
table {
  border-spacing: 10px;
}
tr.address td {
  border: 0;
}
</style>
<body>
    <div>
<table class="center" >
    
    <tr >
        <th colspan="2"> 
            Commercial invoice
        </th>
    </tr>
        
      
        <tr>
          
        <th>Exporter name & address</th>
        <th>Importer name & address</th>
       
      </tr>
      <tr style="width: 175px;">
        <td> US Shipping CO. LTD </td>
        <td>
            <?php while($row = mysqli_fetch_object($result)){ ?>
                
                 <?php echo $row -> WarehouseName."<br>" , $row -> Address."<br>",$row -> Tel_No."<br>",$row -> Email?> 
             
            <?php } ?>
        </td>
        
      </tr>
      <tr>
          <td>Date : dd/mm/yy</td>
          <td> Mode of Transportation : Vessel</td>
      </tr>
      <tr>
            <td>Invoice number : Invoice No.xxxxxxx</td>
            <td>Incomterms : CIF</td>
      </tr>
      <tr>
            <td>L/C Number : US 8316</td>
            <td>Payment Terms : 100% B/C </td>
      </tr>
      <tr>
            <td>Port of Loading : United state of America</td>
            <td>Port of Destination : Bangkok</td>
      </tr>
    
    </table>
    </div>
    <table class="center" >
      
      <tr style="width: 175px;">
          <th>Items.ID</th>
          <th>Items</th>
          <th>Description</th>
         <th>Price per Unit</th> 
         <th>Quantity</th>
         <th>Price</th> 
        
      </tr>
      
      
          <?php while($row = mysqli_fetch_row($result2)) {?>
            <tr style="width: 175px;">
                <td> <?php echo $row["0"]; ?> </td>
                <td> <?php echo $row["1"]; ?> </td>
                <td> <?php echo $row["2"]; ?> </td>
                <td> <?php echo $row["3"]; ?> </td>
                <?php 
                $sql3 = "SELECT SUM(Quantity) FROM indvprod WHERE ProductID LIKE '%$row[0]%'";
                $result3 = mysqli_query($conn2,$sql3);
                $quan = mysqli_fetch_row($result3);
                ?>
                <td><?php echo $quan[0]; ?></td>
                <td><?php echo $quan[0] * $row[3]; ?></td>
                
               
                
            </tr>
            <?php } ?>
            
            
            
        </table>
</body>
</html>

