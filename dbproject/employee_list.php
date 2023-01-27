<?php 

    session_start();

    require_once "config/db.php";

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

<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert_employ.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="Fname" class="col-form-label"> First:</label>
                    <input type="text" required class="form-control" name="Fname">
                </div>
                <div class="mb-3">
                    <label for="Lname" class="col-form-label">Last:</label>
                    <input type="text" required class="form-control" name="Lname">
                </div>
                <div class="mb-3">
                    <label for="Position" class="col-form-label">Pos:</label>
                    <input type="text" class="form-control" name="Position">
                </div>
                <div class="mb-3">
                    <label for="Email" class="col-form-label">E-mail:</label>
                    <input type="text" class="form-control" name="Email">
                </div>
                <div class="mb-3">
                    <label for="Tel" class="col-form-label">Tel No:</label>
                    <input type="text" class="form-control" name="Tel">
                </div>
                <div class="mb-3">
                    <label for="UserRole" class="col-form-label">Role:</label>
                    <input type="text" class="form-control" name="UserRole">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        
        </div>
    </div>
    </div>
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
                <h1>Employee List</h1>
            </div>
            
            <div class="col-md-6 d-flex justify-content-end">
            <form method="post"> 
</form>
<form method="post">
<label>Search</label>
<input type="text" name="search">
<input type="submit" name="submit">     
</form>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal" data-bs-whatever="@mdo">Add</button>
            </div>
        </div>
        <hr>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']); 
                ?>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']); 
                ?>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['warring'])) { ?>
            <div class="alert alert-danger">
                <?php 
                    echo $_SESSION['warring'];
                    unset($_SESSION['warring']); 
                ?>
            </div>
        <?php } ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tel No.</th>
                    <th scope="col">Role</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM employee ORDER BY EmployeeID ASC");
                    $stmt->execute();
                    $users = $stmt->fetchAll();
                    

                    if (!$users) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    }
                    elseif(isset($_POST["submit"])){
                            $str = $_POST["search"];
                            $sth = $conn->prepare("SELECT * FROM employee WHERE (Fname = '$str') OR (Lname = '$str') OR (Position = '$str') OR (Email = '$str') OR (Tel = '$str') OR (UserRole = '$str') ORDER BY EmployeeID ASC");
                            $sth->setFetchMode(PDO:: FETCH_ASSOC);
                            $sth -> execute([]);
                            $test = $sth->fetchALL();
                            foreach($test as $test){
                        ?>
                        <tr>
                        <td><?php echo $test['Fname']; ?></td>
                        <td><?php echo $test['Lname']; ?></td>
                        <td><?php echo $test['Position']; ?></td>
                        <td><?php echo $test['Email']; ?></td>
                        <td><?php echo $test['Tel']; ?></td>
                        <td><?php echo $test['UserRole']; ?></td>
                    </tr>
                    <?php 
                    }
                }
                
                    else {
                    foreach($users as $user){
                 

                ?>
                    <tr>
                        <td><?php echo $user['Fname']; ?></td>
                        <td><?php echo $user['Lname']; ?></td>
                        <td><?php echo $user['Position']; ?></td>
                        <td><?php echo $user['Email']; ?></td>
                        <td><?php echo $user['Tel']; ?></td>
                        <td><?php echo $user['UserRole']; ?></td>
                    </tr>
                <?php  } }
 ?>
            </tbody>
            </table>
    </div>
        </div>
    </div>
</div>
           


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

