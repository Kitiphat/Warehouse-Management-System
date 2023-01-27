<?php

session_start();
include('server.php');






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
</head>
   
<body>
   <h2> Serial Product </h2>
   <form action="check_in_storage.php" method="POST">
       <div>
           <label for="">Serial Number</label>
           <input type="text" name="SerialNum" id="">
       </div>
           <input type="submit" value="บันทึก">
   </form>      
      
    
</body>
</html>