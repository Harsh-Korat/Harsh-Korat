<!DOCTYPE html>
<html lang="en">


<head>
    <title>Service</title>
    <link rel="stylesheet" href="../assets/css/service.css">
    <link rel="stylesheet" href="../assets/css/nav-header.css">
    <link rel="stylesheet" href="../assets/css/validation.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> 

</head>

<body>

<?php include('./Header-nav.php'); ?>


<!-- Registration Form --->
  
<section class="form-start" id="bg">
 <div class="card reg-hd">
  <h1>Register Now!</h1>
    
   <form method="POST">
   <div class="form-group">
   <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" autocomplete="off" required>
   </div>
   <div class="first-name-msg text-center  mb-3 float-left err"></div>  

   <div class="form-group">
   <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" autocomplete="off" required>
   </div>
   <div class="last-name-msg text-center mb-3 float-left err"></div> 
    
   <div class="form-group">
   <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" autocomplete="off" required>
   </div>
   <div class="mb-3">
     <div class="email-msg mb-3 float-left" style="padding-left: 8%;"></div>
       <div class="error-email float-right" style="padding-right: 8%;"></div> 
   </div>

   <div class="form-group number">
   <div class="input-group ">
   <div class="input-group-prepend">
   <div class="input-group-text">+46</div>
   </div>
     
   <input type="tel" class="form-control"  id="mobilenum" name="mobile" placeholder="Phone Number" autocomplete="off" maxlength="10" required>
   </div>
    <div class="mobile-msg text-center mt-3 mb-3 float-left err"></div>
   </div>

     
   <div class="form-group">
   <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
   </div>
   <div class="password-msg text-center mb-3 float-left err"></div>
     
   <div class="form-group">
   <input type="password" class="form-control" id="cpassword" name="confirm-password" placeholder="Confirm Password" required>
   </div>
   <div class="cpassword-msg text-center float-left err"></div>
     
   <div class="form-check">
   <input type="checkbox" class="form-check-input" id="helperland">
   <label class="form-check-label " for="helperland">Send me news-mains from Helperland</label>
   </div>

   <div class="form-check">
   <input type="checkbox" class="form-check-input condition" id="inlineFormCheck">
   <label class="form-check-label" for="inlineFormCheck">I accept <a href="#">terms and conditions</a> & <a href="#">privacy policy</a></label>
   </div>
   <div class="condition_err text-danger mb-2 checkbox-err"></div>

   <div class="form-group sub-bttn">
   <button type="submit" class="btn sub-bttns service-get">Get Started <img class="right-arrow" src="../assets/image/arrow-white.png"></button>
   </div>
    
  </form>             
 </div>
  
<div class="down-bttn1">
  <img src="../assets/image/ellipse-525.svg" class="round1">
     <div class="download2">
       <a href="#helperland"><img src="../assets/image/shape-1.svg" alt="" class="down-arrow"></a>
  </div>
</div>

</section>


<!-- How it Work Section -->


<section>

 <div class="middle-part">
  <div class="left-img">
    <img src="../assets/image/blog-left-bg.png"  style="margin-top:27px;width:188px; height:1196px;">
  </div>


  <div class="work-main">
  <div class="work">How it works</div>
 
  <div id="work">
   <div>
    <div class="reg">Register yourself</div>
     <p class="reg-des">Provide your basic information to register yourself as a service provider.</p>
     <div style="display: flex;">
      <p class="read">Read more <div><i class="fas fa-arrow-right" id="right-arrow1"></i></div></p>
    </div>
    </div>
    <div class="first-img">
	  <img src="../assets/image/group-19.png">
    </div>
   </div>


   <div id="work" id="helperland">
    <div class="first-img" id="first">
	  <img src="../assets/image/group-18.png">
    </div>

    <div>
     <div class="reg" id="reg1">Get service requests</div>
      <p class="reg-des" id="reg">You will get service requests from <br> customes depend on service area and profile.</p>
      <div style="display: flex;">
       <p class="read" id="reg">Read more <div><i class="fas fa-arrow-right" id="right-arrow2"></i></div></p>
    </div>
     </div>
    </div>


    <div id="work">
     <div>
      <div class="reg" id="reg2">Complete service</div>
       <p class="reg-des">Accept service requests from your customers and complete your work.</p>
       <div style="display: flex;">
        <p class="read" id="bt-read">Read more <div><i class="fas fa-arrow-right" id="right-arrow3"></i></div></p>
      </div>
     </div>
      <div class="first-img" id="second">
	    <img src="../assets/image/group-20.png">
      </div>
    </div>
  </div>

    <div class="right-img">
      <img src="../assets/image/blog-right-bg.png" style="margin-top:27px;width:188px; height:1196px;">
    </div>
</div>


</section>


<!-- Footer -->

 <section class="nsletter text-center ">
  <div class="container">
    <h3 class="news">GET OUR NEWSLETTER</h3>
  <form action="#" method="Post">
  <input type="text" name="text" placeholder="YOUR EMAIL">
  <button type="button" class="btn submit"><p>Submit</p></button>
  </form>
   </div>
</section>


<footer>
        <div class="row">
            <div class="col-md-4">
                <nav>
                    <div class="bottom-first">
                        <a href="./index.php"><img class="bottom-logo" src="../assets/image/logo-small.png"></a>

                    </div>
                </nav>
            </div>
            <div class="col-md-4 bottom-middle">
                <nav>
                    <div class="nav nav-bottom">
                        <a href="./index.php" class="btn">HOME</a>
                        <a href="./about.php" class="btn">ABOUT</a>
                        <a href="#" class="btn">TESTIMONIALS</a>
                        <a href="./Faqs.php" class="btn">FAQS</a>
                        <a href="#" class="btn">INSURANCE POLICY</a>
                        <a href="#" class="btn">IMPRESSUM</a>

                    </div>
                </nav>
            </div>
            <div class="col-md-4 bottom-middle">
                <nav>
                    <div class="nav nav-last">


                        <a href="#" class="btn"><img src="../assets/image/ic-facebook.png" alt=""></a>
                        <a href="#" class="btn"><img src="../assets/image/ic-instagram.png" alt=""></a>
                    </div>
                </nav>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 privacy">
                ©2018 Helperland. All rights reserved. <p class="term"><a>Terms and Conditions</a> | <a>Privacy Policy</a>
                </p>

            </div>
            </div>
    </footer>


<!-- Boostrap -->
   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.10/dist/sweetalert2.all.min.js"></script>
    <script src="../assets/js/Homepage.js"></script>
    <script src="../assets/js/Signup.js"></script>

    <?php include('./all-ajax.php'); ?>



</body>
</html>