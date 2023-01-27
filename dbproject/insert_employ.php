<?php 

session_start();
require_once "config/db.php";

if (isset($_POST['submit'])) {
    $First = $_POST['Fname'];
    $Last = $_POST['Lname'];
    $Pos = $_POST['Position'];
    $Email = $_POST['Email'];
    $Tel = $_POST['Tel'];
    $Role = $_POST['UserRole'];

                $sql = $conn->prepare("INSERT INTO employee(Fname, Lname, Position, Email, Tel, UserRole)
                VALUES(:Fname, :Lname, :Position, :Email, :Tel, :UserRole)");
                $sql->bindParam(":Fname", $First);
                $sql->bindParam(":Lname", $Last);
                $sql->bindParam(":Position", $Pos);
                $sql->bindParam(":Email", $Email);
                $sql->bindParam(":Tel", $Tel);
                $sql->bindParam(":UserRole", $Role);
                $sql->execute();
                    if ($sql) 
                    {
                        $_SESSION['success'] = "Data has been inserted successfully";
                        header("location: employee_list.php");
                    }
                    else{
                
                            $_SESSION['error'] = "Data has not been inserted successfully";
                            header("location: employee_list.php");
                        }
                    }
                     
?>