<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rating</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="./assets/style/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/71c4cc95dc.js" crossorigin="anonymous"></script>
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
<br>
<br>
<br>
    <center><h3>rate your experience using this website</h3></center>
    <script>
        function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}		

        var ratedindex=-1;
$(document).ready(function(){
  resetstarcolor();

$('.fa-star').on('click',function(){
ratedindex = parseInt($(this).data('index'));
document.getElementById("ratingtext").innerText=`you rated:${ratedindex}`;
setCookie("rating",ratedindex,3);
});



  $('.fa-star').mouseover(function(){
    resetstarcolor();
    var currentindex= parseInt($(this).data('index'));
    for(var i = 0; i<=currentindex;i++){
      $('.fa-star:eq('+i+')').css('color','yellow')
    }



  })
  $('.fa-star').mouseleave(function(){
    resetstarcolor();
    if(ratedindex != -1){
        for(var i = 0; i<=ratedindex;i++){
            $('.fa-star').css('color','yellow')
        }
    }
  })

})
function resetstarcolor(){
  $('.fa-star').css('color','grey')
}






    </script>
    <section>
    <div align='center'>
<i class='fa fa-star'data-index='0'></i>
<i class='fa fa-star'data-index='1'></i>
<i class='fa fa-star'data-index='2'></i>
<i class='fa fa-star'data-index='3'></i>
<i class='fa fa-star'data-index='4'></i>
</div>
<p id="ratingtext" align="center"></p>
<form action="ratingprocess.php">
   <center> <button>Submit</button></center>
</form>
</section>

</body>
</html>
