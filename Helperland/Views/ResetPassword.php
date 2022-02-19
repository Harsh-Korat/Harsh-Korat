<!DOCTYPE html>
<html lang="en">
<head>
   
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="./assets/css/footers.css">
      <link rel="stylesheet" href="./assets/css/nav.css">
      <link rel="stylesheet" href="./assets/css/validation.css">

     <link rel="stylesheet" href="./assets/css/reset.css">
     <title>ResetPassword</title>

</head>

<?php $base_url = "http://localhost/Helperland/"; 

session_start();  
    
  if (isset($_SESSION['message'])) {
  $login = $_SESSION['message'];
  echo '<script> alert("'.$login.'");</script>';
  unset($_SESSION['message']);

} 
?>

<!-- Header Nav -->


<section class="header-nav">
 <nav class="navbar sticky-top navbar-expand-lg">
   <div class="container">
     <a class="navbar-brand" href="./index.php"><img src="./assets/image/logo-small.png" class="header-logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  w-100 justify-content-end">
     
        <li class="nav-item  book">
        <a class="nav-link book1" href="./book-service.php">Book Now</a>
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

        <li class="nav-item dropdown notification-bttn" style="margin-top: -5px;">
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
           <img src="./assets/image/admin-user.png">
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
   <a class="navbar-brand" href="./index.php"><img src="./assets/image/logo-small.png" class="header-logo"></a>
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
   
    <a href="./book-service.php">Book Now</a>
    <a href="./Prices.php">Prices & services</a>
    <a href="#">Warrant</a>
    <a href="#">Blog</a>
    <a href="./Contact.php">Contact</a>
    <a href=".#myModal">Login</a>
    <a href="./Service.php">Become a Helper</a>
    <div class="hrr"><hr></div>
    <div class="face">
    <a href="#" class="btn"><img src="./assets/image/ic-facebook.png" alt=""></a>
    <a href="#" class="btn"><img src="./assets/image/ic-instagram.png" alt=""></a>
   </div>
  </div>
 </div>
</div>
</nav>
</section>


<section class="reset">

    <h4 class="row text-center">Reset Password</h4>

    <div class="resetform">
        <form method="POST" id="resetform" action="http://localhost/Helperland/?controller=Helperland&function=ResetKeyPassword">
            <div class="form-row mb-3">
            <input type="text" class="form-control" id="reset" name="reset" placeholder="ResetKey" value="<?php if(isset($_GET['parameter'])){echo $_GET['parameter'];} ?>" hidden>
            </div>
            <div class="form-row mb-3">
                <label><b>New Password</b></label>
                <input type="password" class="form-control" id="password" name="newpassword" placeholder="Password">
                <div class="password-msg mt-2"></div>
            </div>
            <div class="form-row">
                <label><b>Confirm Password</b></label>
                <input type="password" class="form-control" id="cpassword" name="newcpassword" placeholder="Confirm Password">
                <div class="cpassword-msg"></div>

            </div>


            <div class="form-group">
                <button type="submit" name="reset_password" class="btn save">Save</button>
            </div>
        </form>
    </div>

</section>


<footer class="footers">
  <div class="row footer">
    <div class="col-lg-2 bottom-logo">
      <a href="./index.php" ><img src="./assets/image/logo-small.png" alt="helperland" class="logos"></a>
    </div>
    
    <div class="col-lg-8 links">
    <nav >
    <div class="nav menu">
     <a href="./index.php" class="btn">HOME</a>
     <a href="./about.php" class="btn">ABOUT</a>
     <a href="#" class="btn">TESTIMONIALS</a>
     <a href="./Faqs.php" class="btn">FAQS</a>
     <a href="#" class="btn">INSURANCE POLICY</a>
     <a href="#" class="btn">IMPRESSUM</a>
    </div>
   </nav>
  </div>
  
  <div class="col-lg-2 fi-logo">
  <nav>
  <div class="nav icons">
     <a href="#" class="btn facebook" ><img src="./assets/image/ic-facebook.png" alt=""></a>
     <a href="#" class="btn instagram" ><img src="./assets/image/ic-instagram.png" alt=""></a>
  </div>
 </nav>
 </div>
</div>
          
  <div class="row policy">
  <p>©2018 Helperland. All rights reserved. <span class="term">Terms and Conditions | Privacy Policy</span></p>
  </div>
</footer>

<!-- Boostrap -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="./assets/js/Signup.js"></script>

</body>

</html>