<?php 

    session_start();
    include('server.php');


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
    <h2>Stock Report</h2>
        <form action="aar1.php" method="post">
            <div>
                <label for="">Product ID:</label>
                <input type="text" name="pid" id="">
            </div>
            <div>
                <input type = "submit" value = "Search">
            </div>
        </form>

    </body>
    
</html>