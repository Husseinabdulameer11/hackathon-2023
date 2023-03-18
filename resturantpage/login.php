<!DOCTYPE html>
<html lang="en">
<head>
    <!--linje 22:    $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'"; kryptert passord-->
    <meta charset="utf-8"/>
    <title>Login</title>
   
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
          <a class="nav-link" href="login.php">login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registration.php">register</a>
        </li>
      </ul>
      </ul>
    </div>
  </div>
</nav>

<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($connection, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($connection, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($connection, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: index.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<br>
<br>
<br>
<div class="white_box" align="center">
    <form class="form" method="post" name="login">
        <h2 class="login-title">Login</h2>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" required />
        <input type="password" class="login-input" name="password" placeholder="Password" required />
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
  </form>
  </div>
<?php
    }
?>
</body>
</html>