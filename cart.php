

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>E-COMMERCE STORE</title>
    <link rel="stylesheet" href="cart.css">
    
      <link rel="stylesheet" type="" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">




<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">

<link href='https://unpkg.com/css.gg@2.0.0/icons/css/shopping-cart.css' rel='stylesheet'>

<link href='https://unpkg.com/css.gg@2.0.0/icons/css/profile.css' rel='stylesheet'>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
<script src="nav.js" defer></script>
<script src="main.js" defer></script>
</head>
  <body>

<!-- CRT -->

<!-- Items -->
<div class="hero">


<section>
<div class="items">
  
<div class="items-1">
<div class="product">
        <img id= "imageBox" width="300px" height="300px" src="blackf.png" alt="">
        </div>
        <div class="small-product">
                <img width="50px" src="blackf.png" onclick="myFunction(this)">
                <img width="50px" src="greenf.png" onclick="myFunction(this)">
                <img width="50px" src="redf.png" onclick="myFunction(this)">
        </div>
</div>
       
</div>
</section>

<!-- Backdrop -->
<div class="backdrop"></div>
<!-- Sidecart -->
<div id="sidecart" class="sidecart ">
<div class="cart_content">
  <!-- Cart Header -->
  <div class="cart_header">

  <div class="header_title">
    <h4>CART</h4>
    <span id="items_num">0</span>

  </div>
  <span id="close_btn" class="close_btn">&times;</span>
  </div>
      <!-- Cart empty -->

    <!-- Cart Items -->
    <div class="cart_items">

</div>

      <!-- Cart Actions -->

      <div class="cart_actions">
      <div class="taxer">
        <p1>TAXES/SHIPPING :</p1>
        <p4><span id="taxes">$18 CAD</span> </p4>

        </div>
        <div class="subtotal">
          <p1>SUBTOTAL :</p1>
          <p4>$<span id="subtotal_price"></span> CAD</p4>
          
        </div>
        
      

        <button><a href="checkout.html">VIEW CHECKOUT</a></button>
      </div>
</div>
</div>
    <!-- loader -->
    <div id="preloader">
<div class="loader">
  <img width="350px" src="0003.png" alt="">
  <p></p>
      
    </div>
  </div>
</div>
<!-- navbar -->
<nav class="navbar" id="navbar">
    <div class="navdiv">
        <ul class="nav-list">
            <li class="top"><a href="#">PORTFOLIO</a></li>
            <li class="top"><a href="#">HOME</a></li>
            <li class="top"><a href="contact-us.php">CONTACT US</a></li>
            <li class="top"><a href="about-us.php">ABOUT</a></li>
        </ul>

        <!-- shopping cart -->
        <ul class="nav-right">
            <li id="open_cart_btn"><i class="gg-shopping-cart"></i></li>
            <li><i class="gg-profile" id="user-img"></i></li>
        </ul>
    </div>

    <div class="login-logout-popup hide">
        <p class="account-info">
            Hi, <?php if(!empty($_SESSION["id"])) echo $row["name"]; ?>
        </p>
        <?php if(!empty($_SESSION["id"])): ?>
            <button class="btn" id="logout-btn"><a href="logout.php">Logout</a></button>
        <?php else: ?>
            <button class="btn" id="login-btn"><a href="login.php">Login</a></button>
        <?php endif; ?>
    </div>
</nav>

     
    
  <footer>
    <div class="footer-section">
     
      <div class="footer-links">
        <div class="footer-img">
          <a class="logo" href="index.html"><img width="150px" src="0003.png" alt="" /></a>
        </div>
        <div class="store">
          <h4>Store</h4>

          <ul class="footer-list">
            <li><a href="about-us.html">About Us</a></li>
            <li><a href="merch-with-us.html">Merch With Us</a></li>
            <li><a href="productDetails.html">Products</a></li>
          </ul>
        </div>

        <div class="resources">
          <h4>Resources</h4>

          <ul class="footer-list">
            <li><a href="#">Careers</a></li>
            <li><a href="blogosphere.html">Blog</a></li>
            <li><a href="#">FAQs</a></li>
          </ul>
        </div>

        <div class="contact">
          <h4>Contact</h4>

          <ul>
            <li><a href="tel:+4372884036">+1 (234) 567 890</a></li>
            <li>
              <a href="mailto:charleschuwuemeka@gmail.com">yourgmail@gmail.com</a>
            </li>
            
          </ul>
          
        </div>

        <div class="address">
          <h4>Location</h4>

          <address>
             <br />
            
          </address>
        </div>
        <li><a href="https://www.instagram.com/cash_kay_/"><img width="20px" src="instalogo.png" alt=""></a></li>
      
        <li><a href=""><img width="20px" src="flogo.png" alt=""></a></li>
     
      </div>
      
    </div>

    <div class="copyright">
      
    </div>
  </footer>

  <script src="scroll.js"></script>
  <script>
  window.addEventListener('scroll', function() {
      const navbar = document.getElementById('navbar');
     
  
      if (window.scrollY > 50) { // Adjust this value based on when you want the change to occur
          navbar.classList.add('scrolled');
          
      } else {
          navbar.classList.remove('scrolled');
          
      }
    
  });
</script>
<script type="text/javascript">
  function myFunction(smallImg) {
    var fullImg = document.getElementById("imageBox");
    fullImg.src = smallImg.src;
  }
</script>


<script>
       $(window).on("load",function(){
         $("#preloader").fadeOut(2000);
       });
   </script>


    </body>
