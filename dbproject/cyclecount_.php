<?php 

    session_start();
    include('server.php');

    $id = $_POST['id'];

    $sql = "SELECT * FROM storage WHERE binid LIKE '%$id%' ORDER BY Binid ASC";

$result = mysqli_query($conn2,$sql);


?>
<!DOCTYPE html>
<html lang = "en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cycle Count</title>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <h2>Search</h2>
        <form action="cyclecount_.php" method="post">
            <div>
                <label for="">Bin ID:</label>
                <input type="text" name="id" id="">
            </div>
            <div>
                <input type = "submit" value = "Search">
            </div>
        </form>
        <table border = "1">
            <thead>
                <tr>
                    <th>Bin ID</th>
                    <th>Serial Number</th>
                    <th>Change</th>

                </tr>
            </thead>
            <tbody>
                <?php while($row=mysqli_fetch_row($result)){?>
                <tr>
                    <td><?php echo $row[1];//BIN ID \\?></td> 
                    <td><?php echo $row[0]; ?></td>
                    <td><a href="doChange.php?binid=<?php echo $row[1]?>">SELECT</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
    
</html>
