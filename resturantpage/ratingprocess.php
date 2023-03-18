<?php
include("auth_session.php");
include("db.php");
$cookie_name="rating";
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
  } else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
    
    $query= "INSERT into `rating` (User_id,rating)
    VALUES (".$_SESSION["userid"].",".$_COOKIE[$cookie_name].")";
    $result   = mysqli_query($connection, $query);
    
    if ($result) {
      header('location:index.php');

  } else {
      echo "something went wrong";
  }
          }
      
      ?>
  


