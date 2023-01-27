<?php
    session_start();
    include('server.php');

$id = $_POST["id"];

$sql = "SELECT * FROM indvprod WHERE ProductID LIKE '%$id%' ORDER BY Quantity ASC";

$result = mysqli_query($conn2,$sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_row($result);
// while($row = mysqli_fetch_row($result)){
//     echo "1.".$row[0]."<br>";    
// }
//echo mysqli_num_rows($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php           
?>


<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="firstpage.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li>
                    <a href="pickorder_1.php" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Pick order</span></a>
                            </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Orders</span></a>
                    </li>
                    <li>
                    <a href="cyclecount.php" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Cycle count</span></a>
                            </a>
                    </li>
                    <li>
                    <a href="routereturn.php" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Route return</span></a>
                            </a>
</li>
                    <li>
                        <a href=employee_list.php class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Employee</span> </a>
                    </li>
                </ul>
                <hr>
                    <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['username'];?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        
                        <li><!-- logged in user information -->
<?php if (isset($_SESSION['username'])) : ?>
        <?php endif ?>
        <a class="dropdown-item" href="index.php?logout='1'">Log-Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
        <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
            <h1>Pick order search result</h1>
            </div>
            
            <div class="col-md-6 d-flex justify-content-end">
</form>
           
    </div>
       
            
        </form>
        <?php if($count>0){?>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Serial Number</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Expiry Date</th>
                    <th scope="col">Pick</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php while($row=mysqli_fetch_row($result)){?>
                <tr>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td><a href="pickThisOne.php?serial=<?php echo $row[1]?>">SELECT</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else{ ?>
       
            <h2>no product found</h2>

            <?php } ?>
    </body>

 <!-- JavaScript Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>