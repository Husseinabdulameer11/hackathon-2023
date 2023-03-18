<?php
include("auth_session.php");
include("db.php");
?>
<html>
  <head>
  <link rel="stylesheet" href="./assets/style/bootstrap.min.css">
    <title>index</title>  
  <head>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">resturant page</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
      <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="menu.php">menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">log out</a>
        </li>
      </ul>
      </ul>
    </div>
  </div>
</nav>
<header  style="background:linear-gradient(rgba(255,255,255,0.5), rgba(255,255,255,0.5)),url('./assets/images/burger.jpg');;height:100vh;background-size:cover;">
<!--video here with text-->
<center>
  <br><Br><br><br>  <br><Br><br><br>  <br><Br><br><br>

<h3 style="font-size:5em">Resturant page</h3>
</center>
</header>
<section style="height:30vh"align="center">
<br>
<br>
<h3>check out our menu</h3>
<a href="menu.php" style="background:black;color:white;padding:15px;border-radius:100px;font-size:3em;text-align:center;text-decoration:none;">menu</a>
</section>
<footer style="height:30vh;background-color:darkgrey;">
<center><h3>resturant page</h3></center>

</footer>
</body>
</html>