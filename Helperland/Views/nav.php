<?php

$base_url = "http://localhost/helperland/";


// Header Nav

if (!isset($_SESSION['username'])) { ?>

<section class="header-nav">
 <nav class="navbar sticky-top navbar-expand-lg ">
   <div class="container">
     <a class="navbar-brand" href="#"><img src="../assets/image/logo-small.png" class="header-logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  w-100 justify-content-end">
     
        <li class="nav-item  book">
        <a class="nav-link book1" href="./book-service">Book Now</a>
        </li>
     
        <li class="nav-item price">
        <a class="nav-link pr" href="./Prices.php">Prices & services</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="#">Warranty</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="#">Blog</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="./Contact.php">Contact</a>
        </li>
     
        <li class="nav-item  login">
        <a class="nav-link login1" href=".#myModal">Login</a>
        </li>
     
        <li class="nav-item  become">
        <a class="nav-link helper" href="./Service-provider">Become a Helper</a>
        </li>
       </ul>
      </div>
     </div>
    </nav>
   </section>

<?php } ?>


<!-- Mobile Nav -->

<section class="mobile-nav">

<nav class="navbar sticky-top navbar-expand-lg ">
   <a class="navbar-brand" href="#"><img src="../assets/image/logo-small.png" class="header-logo"></a>
     <button class="btn bttn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"> <i class="fas fa-bars"></i></button>

 <div class="offcanvas offcanvas-end" id="demo" style="width:262px;">

   <div class="offcanvas-body">
   <div class="dash">
   
    <a href="./book-service">Book Now</a>
    <a href="./Prices.php">Prices & services</a>
    <a href="#">Warrant</a>
    <a href="#">Blog</a>
    <a href="./Contact.php">Contact</a>
    <a href=".#myModal">Login</a>
    <a href="./Service-provider">Become a Helper</a>
    <a href="./about.php">About</a>
    <a href="./Faqs.php">Faqs</a>
    <div class="hrr"><hr></div>
    <div class="face">
    <a href="#" class="btn"><img src="../assets/image/ic-facebook.png" alt=""></a>
    <a href="#" class="btn"><img src="../assets/image/ic-instagram.png" alt=""></a>
   </div>
  </div>
 </div>
</div>
</nav>
</section>



<?php if (isset($_SESSION['username'])) { ?>

<section class="header-nav">
 <nav class="navbar sticky-top navbar-expand-lg ">
   <div class="container">
     <a class="navbar-brand" href="#"><img src="../assets/image/logo-small.png" class="header-logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  w-100 justify-content-end">
     
        <li class="nav-item  book">
        <a class="nav-link book1" href="./book-service">Book Now</a>
        </li>
     
        <li class="nav-item price">
        <a class="nav-link pr" href="./Prices.php">Prices & services</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="#">Warranty</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="#">Blog</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="./Contact.php">Contact</a>
        </li>

        <li class="nav-item dropdown notification-bttn" style="margin-top: -6px;">
         <div class="dropdown">
          <button type="button" class="btn" data-toggle="dropdown">
           <i class="fas fa-bell" style="font-size: 25px; color: white;margin-top: 5px;"></i>
            <span class="Ellipse-5">2</span>
          </button>
        <div class="dropdown-menu" id="menu1" style="margin-top: 15px;">
          <a class="dropdown-item" href="#">Notification1</a>
          <a class="dropdown-item" href="#">Notification2</a>
          <a class="dropdown-item" href="#">Notification3</a>
         </div>
        </div>
        </li>           

        <li class="nav-item dropdown user-logo">
         <div class="dropdown">
          <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
           <img src="../assets/image/admin-user.png">
          </button>
        <div class="dropdown-menu" id="menu" style="margin-top: 15px;">
          <a class="dropdown-item" href="#">User Profile</a>
          <a class="dropdown-item" href="#">Setting</a>
          <a class="dropdown-item" href="#">Logout</a>
        </div>
       </div>
       </li>
      
       </ul>
      </div>
     </div>
    </nav>
   </section>
     

<!-- Mobile Nav -->

<section class="mobile-nav">

<nav class="navbar sticky-top navbar-expand-lg ">
   <a class="navbar-brand" href="#"><img src="../assets/image/logo-small.png" class="header-logo"></a>
     <button class="btn bttn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"> <i class="fas fa-bars"></i></button>

         <div class="dropdown notify">
          <button type="button" class="btn" data-toggle="dropdown">
           <i class="fas fa-bell" style="font-size: 25px; color: white;margin-top: 5px;"></i>
           <span class="Ellipse-5">2</span>
          </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Notification1</a>
          <a class="dropdown-item" href="#">Notification2</a>
          <a class="dropdown-item" href="#">Notification3</a>
         </div>
        </div>

 <div class="offcanvas offcanvas-end" id="demo" style="width:262px;">

   <div class="offcanvas-body">
   <div class="dash">
   
    <a href="./book-service">Book Now</a>
    <a href="./Prices.php">Prices & services</a>
    <a href="#">Warrant</a>
    <a href="#">Blog</a>
    <a href="./Contact.php">Contact</a>
    <a href=".#myModal">Login</a>
    <a href="./Service-provider">Become a Helper</a>
    <a href="./about.php">About</a>
    <a href="./Faqs.php">Faqs</a>
    <div class="hrr"><hr></div>
    <div class="face">
    <a href="#" class="btn"><img src="../assets/image/ic-facebook.png" alt=""></a>
    <a href="#" class="btn"><img src="../assets/image/ic-instagram.png" alt=""></a>
   </div>
  </div>
 </div>
</div>
</nav>
</section>

<?php } ?>