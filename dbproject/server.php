<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    // Create Connection
    $conn2 = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn2) {
        die("Connection failed" . mysqli_connect_error());
    } 

?>