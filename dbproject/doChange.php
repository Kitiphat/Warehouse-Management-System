<?php
    session_start();
    include('server.php');
$binid = $_GET['binid'];

echo $binid;

?>

<!DOCTYPE html>
<html lang = "en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pick Order</title>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h2>Correct Product</h2>
        <form action="change.php?binid=<?php echo $binid ?>" method="post">
            
        <div>
                <label for="">Serial Number:</label>
                <input type="text" name="serial" id="">
            </div>
            <div>
                <input type = "submit" value = "change">
            </div>

        </form>
        <div>
            <a href="empty.php?binid=<?php echo $binid ?>">empty</a>
            </div>

    </body>
    
</html>