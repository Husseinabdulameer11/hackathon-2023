<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $connection = mysqli_connect("localhost","root","","resturantdb");
    // Check connection
    if($connection->connect_error){
        die("connection failed: ".$connection->connection_error);
        }
        else{
           
        }
?>