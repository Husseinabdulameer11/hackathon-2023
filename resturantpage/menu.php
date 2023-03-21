<?php
include("auth_session.php");
include("db.php");
?>
<html>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="./assets/style/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/71c4cc95dc.js" crossorigin="anonymous"></script>
  <style>
.mt-2{
    width:250px;

}
.card-img,.img-fluid{
    height:200px;
    width:200px;
}
.cart_item,.cart{
  background:lightgray;
  border:2px solid black;
  margin:3px;
}
.cart_item{
  width:30%;
}
.cart{
  width:30%;
}
  </style>

    <title>menu</title>  
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
          <a class="nav-link" onclick="showShopingCart()">shopping cart</a>
        </li>
      
        </div>


        <li class="nav-item">
          <a class="nav-link" href="logout.php">log out</a>
        </li>
      </ul>
      </ul>
    </div>
    
  </div>
</nav>
<div id="shopCart-container" class="cart"><h2 id="shopping-Cart-header">Shoping Cart</h2>
<form action="successprocess.php" method="post">
		<div id="list-of-items" onchange="cookieupdater()">
    </div>

         <h4 id="total-amount"></h4>
			<button id="remove" class="removebtn" disabled>Empty Cart</button>
      <button type="submit"disabled id="paybtn" class="paybtn">pay now</button>
      </form>
</div> 
    </div>
<section>
  <?php
  $sql="SELECT category from categorys";
  $result = $connection ->query($sql);
  if($result->num_rows > 0){

  
  
  
  ?>
  <center>
<div id="categories">
  <p>categories</p>
  <select name="categorychooser" id="categorychooser"  onchange="categorychanger()">
<option value="" disabled selected>choose a category</option>
<?php
while($row = $result->fetch_assoc()){
echo "<option value=".$row['category'].">".$row['category']."</option>";
}


  }
?>
</select>
<script>


document.getElementById("remove").addEventListener('click',function(e){
    e.preventDefault();
    deletea();
  })



function showShopingCart(){
  var x = document.getElementById("shopCart-container");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
}


  function removedisplay(className) {
    var elems = document.querySelectorAll(className);
    var index = 0, length = elems.length;
    for ( ; index < length; index++) {
        elems[index].style.display="none";
    }

}

function showdisplay(className) {
    var elems = document.querySelectorAll(className);
    var index = 0, length = elems.length;
    for ( ; index < length; index++) {
        elems[index].style.display="block";
    }
    
}

function categorychanger(){
  let select=document.getElementById("categorychooser");
  let value =select.value;
  if(value=="desserts"){
    showdisplay(".desserts");
    removedisplay(".meat");
    removedisplay(".drink");
    removedisplay(".vegetarian");
  }
  else if(value=="meat"){
    showdisplay(".meat");
    removedisplay(".desserts");
    removedisplay(".drink");
    removedisplay(".vegetarian");
  }
  else if(value=="drink"){
    showdisplay(".drink");
    removedisplay(".meat");
    removedisplay(".desserts");
    removedisplay(".vegetarian");
  }
else if(value="vegetarian"){
  showdisplay(".vegetarian");
  removedisplay(".meat");
  removedisplay(".drink");
  removedisplay(".desserts");
  }
  else{
    removedisplay(".meat");
  removedisplay(".drink");
  removedisplay(".desserts");
  removedisplay(".vegetarian");

  }
}



</script>
</div>
</center>

<div class="container d-flex justify-content-center mt-50 mb-50">
    <?php
     $query="SELECT * FROM `products`";
     $result=mysqli_query($connection,$query);
     $queryresults=mysqli_num_rows($result);
    ?>
        <div class="row">
          
            <?php
          if($queryresults>0){

          while($row= mysqli_fetch_assoc($result)){

echo "
<div class='col-md-4 mt-2 ".$row['category']."'>
<div class='card '>
<div class='card-body'>
<div class='card-img-actions'>
<img src='data:image/jpeg;base64,".base64_encode($row['productImage'])."'class='card-img img-fluid' alt='product_image'>
<br>
<br>


</div>
</div>

<div class='card-body bg-light text-center' style='margin:13px;'>
                                        <div class='mb-2'>
                                            <h6 class='font-weight-semibold mb-2 product_info'>
                                                <p class='text-default mb-2' data-abc='true' id='name'>".$row['name']."</p>
                                            </h6>

                                            <p class='text-muted' data-abc='true'>".$row['category']."</p>
                                        </div>
                                        
                                        <h3 class='mb-0 font-weight-semibold number' id='price'>".$row['price']."</h3>
                                        <label for='amount'>Amount</label>
                                        <input type='number' min='0'id='amount'class='amountnum'oninput='this.value = 
                                        !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : 1'>

                                        <button type='button' class='btn bg-cart buy-button'data-action='Add-to-Cart'><i class='fa fa-cart-plus mr-2'></i> Add to cart</button>
                                        
                                    </div>
                                </div>


</div>

";
          }
        }
?>

  <script>






var inCart=[];

  const cart=document.querySelector('.cart');	

  const AddToCartbtns=document.querySelectorAll('[data-action="Add-to-Cart" ]');
		
  AddToCartbtns.forEach(AddToCartbtn=>{AddToCartbtn.addEventListener('click',()=>{

	const product_allContent=AddToCartbtn.parentNode;
  let amount = Number(product_allContent.querySelector('.amountnum').value);
  if(amount<=0){
    amount=1;
  }
	const product={
name:product_allContent.querySelector('.product_info').innerText,
		amount:amount,
		price:Number(product_allContent.querySelector('.number').innerText),
		price_text:"price: "
	}
	
    var productsincart=(inCart.filter(cartitem =>(cartitem.name===product.name)).length>0)
    if(productsincart===false){
	
	
		var list_of_items=document.getElementById("list-of-items");
	    list_of_items.insertAdjacentHTML(
			'beforeend',`<div class="cart_item" id="cart_item">
<h3 class="product_info">${product.name}</h3>
		 
		   <span class="price">Price: ${product.price} kr</span>
<br>
		   <span class="amount">Amount: ${product.amount}</span>

		   </div>`
	   );

	

		inCart.push(product);
    document.querySelector(".removebtn").disabled=false;
    document.querySelector(".paybtn").disabled=false;
    countCartTotal();
    deletecookie(cart,inCart)
    set_cookie(cart,inCart,6);
console.log(product.price)     
	 
		
	var ThecartItems=cart.querySelectorAll('.cart_item');	

		
		
	}
	
	});

			
  ;

});
 
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}							  

function countCartTotal(){
let cart_sum=0;
var totalrender=document.getElementById("total-amount");
	inCart.forEach(cartitem=>{
		cart_sum=cart_sum+(cartitem.amount*cartitem.price);
		
	})
  setCookie("total",cart_sum,3);
	console.log(cart_sum);
	totalrender.innerHTML="total: "+cart_sum+" kr";
}




function deletea(){
  document.querySelector(".paybtn").disabled=true;
  document.querySelector(".removebtn").disabled=true;

var list=document.getElementById("list-of-items")
list.innerHTML="<div></div>"
inCart=[];
let cart_sum=0;
var totalrender=document.getElementById("total-amount");
	
	totalrender.innerHTML=" ";
  

}



set_cookie('cart', inCart, 24*365*10);

  </script>          
</section>
<br>
<footer style="height:30vh;background-color:darkgrey;">
<center><h3>resturant page</h3></center>

</footer>
</body>
</html>
