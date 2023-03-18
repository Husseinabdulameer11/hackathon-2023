<!DOCTYPE html>
<html>
    <!-- linje:24 $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')"; kryptert-->
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="./assets/style/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">resturant page</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
      
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registration.php">register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($connection, $username);
        $email= stripslashes($_REQUEST['email']);
        $email= mysqli_real_escape_string($connection, $email);
        $firstname= stripslashes($_REQUEST['firstname']);
        $firstname= mysqli_real_escape_string($connection, $firstname);
        $lastname= stripslashes($_REQUEST['lastname']);
        $lastname= mysqli_real_escape_string($connection, $lastname);
        $age=stripslashes($_REQUEST['age']);
        $age=mysqli_real_escape_string($connection, $age);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($connection, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query= "INSERT into `users` (first_name, last_name, username, password, email, create_datetime, age)
                     VALUES ('$firstname','$lastname','$username','" . md5($password) . "','$email', '$create_datetime','$age')";
        $result   = mysqli_query($connection, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
<br>
<br>
<br>
<div class="white_box" align="center">
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="firstname" placeholder="firstname" required /><br>
        <input type="text" class="login-input" name="lastname" placeholder="Lastname" required /><br>
        <input type="text" class="login-input" name="username" placeholder="Username" required /><br>
        <input type="number" class="login-input" name="age" placeholder="age" min="1" required /><br>
        <input type="text" class="login-input" name="email" placeholder="Email Adress" required ><br>
        <input type="password" class="login-input" name="password" placeholder="Password" required ><br>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
    </div>
<?php
    }
?>
</body>
</html>