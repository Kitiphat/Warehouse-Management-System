<?php 

    session_start();
    include('server.php');


    $sql = "SELECT * FROM truck WHERE _status LIKE '%delivery%' ORDER BY truckid ASC";

$result = mysqli_query($conn2,$sql);


?>
<!DOCTYPE html>
<html lang = "en">
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
                <h1>Route return</h1>
            </div>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Truck</th>
                    <th scope="col">Status</th>
                    <th scope="col">Success</th>
                    <th scope="col">Late</th>
                    <th scope="col">broken</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row=mysqli_fetch_row($result)){?>
                <tr>
                    <td><?php echo $row[0];//TRUCK ID\\?></td> 
                    <td><?php echo $row[2];// Status เปลี่ยนเป็นคำก้ได้นะ \ ?></td>
                    <td><a href="returnSuccess.php?truck=<?php echo $row[0]?>">SELECT</a></td>
                    <td><a href="returnLate.php?truck=<?php echo $row[0]?>">SELECT</a></td>
                    <td><a href="returnBroken.php?truck=<?php echo $row[0]?>">SELECT</a></td>
                </tr>
                <?php } ?>
    </body>
    
</html>
