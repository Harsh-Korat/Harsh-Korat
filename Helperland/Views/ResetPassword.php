<!DOCTYPE html>
<html lang="en">
<head>
   
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="./assets/css/footers.css">
      <link rel="stylesheet" href="./assets/css/navbars.css">
      <link rel="stylesheet" href="./assets/css/validation.css">

     <link rel="stylesheet" href="./assets/css/reset-password.css">
     <title>ResetPassword</title>

</head>

<!-- Header Nav -->


<section class="header-nav">
 <nav class="navbar sticky-top navbar-expand-lg ">
   <div class="container">
     <a class="navbar-brand" href="./Views/index.php"><img src="./assets/image/logo-small.png" class="header-logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  w-100 justify-content-end">
     
        <li class="nav-item  book">
        <a class="nav-link book1" href="./Views/book-service.php">Book Now</a>
        </li>
     
        <li class="nav-item price">
        <a class="nav-link pr" href="./Views/Prices.php">Prices & services</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="#">Warranty</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="#">Blog</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="./Views/Contact.php">Contact</a>
        </li>
     
        <li class="nav-item login">
        <a class="nav-link login1" href=".#myModal">Login</a>
        </li>
     
        <li class="nav-item become">
        <a class="nav-link helper" href="./Views/Service.php">Become a Helper</a>
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

 <div class="offcanvas offcanvas-end" id="demo" style="width:262px;">

   <div class="offcanvas-body">
   <div class="dash">
   
    <a href="./Views/book-service.php">Book Now</a>
    <a href="./Views/Prices.php">Prices & services</a>
    <a href="#">Warrant</a>
    <a href="#">Blog</a>
    <a href="./Views/Contact.php">Contact</a>
    <a href=".#myModal">Login</a>
    <a href="./Views/Service.php">Become a Helper</a>
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
        <form method="POST" id="resetform">
            <div class="form-row mb-3">
            <input type="text" class="form-control" id="reset" name="reset" placeholder="ResetKey" value="<?php if(isset($_GET['parameter'])){echo $_GET['parameter'];} ?>" hidden>
            </div>
            <div class="form-row mb-3">
                <label><b>New Password</b></label>
                <input type="password" class="form-control" id="password" name="newpassword" placeholder="Password" required>
                <div class="password-msg mt-2"></div>
            </div>
            <div class="form-row">
                <label><b>Confirm Password</b></label>
                <input type="password" class="form-control" id="cpassword" name="newcpassword" placeholder="Confirm Password" required>
                <div class="cpassword-msg"></div>

            </div>


            <div class="form-group">
                <button type="submit" name="reset_password" class="btn save reset-password">Save</button>
            </div>
        </form>
    </div>

</section>


<footer class="footers">
  <div class="row footer">
    <div class="col-lg-2 bottom-logo">
      <a href="./Views/index.php" ><img src="./assets/image/logo-small.png" alt="helperland" class="logos"></a>
    </div>
    
    <div class="col-lg-8 links">
    <nav >
    <div class="nav menu">
     <a href="./Views/index.php" class="btn">HOME</a>
     <a href="./Views/about.php" class="btn">ABOUT</a>
     <a href="#" class="btn">TESTIMONIALS</a>
     <a href="./Views/Faqs.php" class="btn">FAQS</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.10/dist/sweetalert2.all.min.js"></script>

    <?php include('all-ajax.php'); ?>

    <script src="./assets/js/Signup.js"></script>




</body>

</html>