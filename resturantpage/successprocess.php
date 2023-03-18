<?php
include("auth_session.php");
include("db.php");
$cookie_name="total";
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
  } else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
     $query    = "SELECT username,User_id FROM `users` WHERE `username`='".$_SESSION['username']."'";
        $result   = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) > 0 ){

          $row = mysqli_fetch_assoc($result);
          //$username = $row["username"]; 
          $user_id =  $row['User_id'];
          $_SESSION["userid"]=$user_id;
          }
          $connection -> close();
          $connection = mysqli_connect("localhost","root","","resturantdb");
          // Check connection
          if($connection->connect_error){
              die("connection failed: ".$connection->connection_error);
              }
              else{
                  
              }
              $query= "INSERT into `transactions` (User_id,total)
              VALUES ('$user_id',".$_COOKIE[$cookie_name].")";
              $result   = mysqli_query($connection, $query);
              if ($result) {
                header('location:success_rating.php');

            } else {
                echo "something went wrong";
            }
          }
      
      ?>
  


