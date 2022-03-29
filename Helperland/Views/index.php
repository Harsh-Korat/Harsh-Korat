<!DOCTYPE html>
<html lang="en">
<head>
       
    <title>Homepage</title>
   
    <link rel="stylesheet" href="../assets/css/validation.css">
    <link rel="stylesheet" href="../assets/css/nav-headers.css">
    <link rel="stylesheet" href="../assets/css/home-style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> 

<?php 
  session_start();   

  $base_url = "http://localhost/Helperland/";
 ?>

</head>

<body>


<?php include('./Header-nav.php'); ?>

<section class="bg-img">

 <ul>    
  <h1 class="ipsum-text"> Lorem ipsum text</h1>
  <li>Lorem ipsum dolor sit amet, consectetur adipiscing</li>
  <li>Lorem ipsum dolor sit amet, consectetur adipiscing</li>
  <li>Lorem ipsum dolor sit amet, consectetur adipiscing</li>
 </ul>

 <div class="text-center">
  <a class="book-btn" href="./book-service.php" role="button">Let’s Book a Cleaner</a>
 </div>

    <div class="svg-imges">
      <div class="row justify-content-center">
          <div class="col-lg-3 col-sm-6 col-12">
              <div class="svg">
                  <span>
                    <img src="../assets/image/forma-1-copy.svg" alt="image1">
                </span>
                  <p>Enter your postcode</p>
              </div>
          </div>
          <div class="col-lg-3 col-6">
              <div class="svg svg1">
                  <span>
                    <img src="../assets/image/step-2.png" alt="image2">
                </span>
                  <p>Select your plan</p>
              </div>
          </div>
          <div class="col-lg-3 col-6">
              <div class="svg svg2">
                  <span>
                    <img src="../assets/image/forma-1.svg" alt="image3">
                </span>
                  <p>Pay securely online</p>
              </div>
          </div>
          <div class="col-lg-3 col-6">
              <div class="svg svg3">
                  <span>
                    <img src="../assets/image/forma-1 (1).svg" alt="image4">
                </span>
                  <p>Enjoy amazing service</p>
              </div>
          </div>
      </div>
  </div>

<div class="down-bttn">
  <img src="../assets/image/ellipse-525.svg" class="eclipce">
     <div class="download">
        <a href="#helperland"><img src="../assets/image/shape-1.svg" alt="" class="download1"></a>
     </div>
</div>

</section>
  

<!-- Login Modal -->
  
<div class="modal fade" id="myModal">
 <div class="modal-dialog modal-dialog-centered">
   <div class="modal-content">
     <div class="modal-header">
       <h4 class="modal-title"><b>Log in</b></h4>
       <button type="button" class="close" data-dismiss="modal">&times;</button>
     </div>
                        
     <div class="modal-body">
      <div class="container mt-1">
        <form  method="POST">
         <div class="mt-3">
           <input type="email" class="form-control" id="loginemail" placeholder="E-Mail" name="loginemail" required>
           <span><i class="fa fa-user mail"></i></span>
         </div>
         <div class="email-msg mails mb-2 mt-2"></div>

         <div class="mt-3 mb-3" style="position: relative;">
           <input type="password" class="form-control" id="currentpassword" placeholder="Password" name="password" required>
           <span><i class="fa fa-lock locks" style="top:17px;right:23px;"></i></span>
           <div class="current-password-msg mt-2"></div>
         </div>

         <div class="checkbox mb-3">  
           <input type="checkbox" name="checkbox">
           <label>Save on computer</label>
         </div>

         <div class="form-group mt-2">
           <button type="submit" class="btn btn-login form-control home-login">Login</button>
         </div>
        </form>
      </div>
   
      <div class="footer mt-2"><a class="forgot-password" href="#" data-toggle="modal" data-target="#forgot-modal" data-dismiss="modal">Forgot Password?</a></div>
      <div class="footer mt-2"><p>Don't Have an account yet?</p></div>
      <div class="footer" id="creat-account"><a class="creat-account" href="./customer-signup.php">Create an account</a></div>
      </div>
     </div>
    </div>
   </div>
 </div>


<!-- Forgot Modal -->

<div class="modal fade" id="forgot-modal">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="forgot"><b>Forgot Password</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body">
         <div class="container">
          <form  method="POST">
           <div class="mt-3">
             <input type="email" class="form-control" id="login" placeholder="E-Mail" name="forgot_email" autocomplete="off" required>
           </div>
           <div class="email-message mails mb-2 mt-2"></div>

           <div class="form-group mt-4">
              <button type="submit" class="btn btn-login form-control home-forgot">Send</button>
           </div>
          </form>
         </div>
 
         <div class="footer mt-3"><a class="forgot-password" href="#" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Log in now</a></div>
         </div>
        </div>
      </div>
   </div>


<!-- Helperland -->

<div class="helperland" id="helperland">
   <div class="helperland-title">
    <h2><b>Why Helperland</b></h2>
   </div>
       <div class="row">
         <div class="col-md-4 col-lg-4 col-sm-12 col-12">
           <div class="helperland-img">  
             <img src="../assets/image/helper-img-1.png" alt="helperland">
               <div class="helperland-img-title">     
                  <h4>Experience & Vetted Professionals</h4>
                      <p>dominate the industry in scale and scope with an adaptable, extensive network that consistently delivers exceptional results.</p>
                     
                  </div>
             </div>
           </div>

    <div class="col-md-4 col-lg-4 col-sm-12 col-12">
           <div class="helperland-img">  
             <img src="../assets/image/group-23.png" alt="helperlan">
               <div class="helperland-img-title">     
                  <h4>Secure Online Payment</h4>
                       <p>Payment is processed securely online. Customers pay safely online and manage the booking.</p>
                     </div>
               </div>
             </div>

     <div class="col-md-4 col-lg-4 col-sm-12 col-12">
           <div class="helperland-img">  
             <img src="../assets/image/group-24.png" alt="helperland">
               <div class="helperland-img-title">     
                  <h4>Dedicated Customer Service</h4>
                       <p>to our customers and are guided in all we do by their needs. The team is always happy to support you and offer all the information.</p>
                     </div>
             </div>
           </div>
         </div>
       </div>
    

<!-- lorem start-->


<div class="lorem-main">
  <div style="display: flex;">
       <div class="lorem-left">
        <img src="../assets/image/blog-left-bg.png" alt="Cinque Terre">
    </div>
     <div class="inner">
        <div class="row">
           <div class="col-md-6 col-lg-6 col-sm-12 col-12">
              <div class="lorem">
                <h2>Lorem ipsum dolor sit amet, consectetur</h2>
               </div>
                 <div class="lorem-bottom">
                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nisi sapien, suscipit ut accumsan vitae, pulvinar ac libero. </p>
                   <p>Aliquam erat volutpat. Nullam quis ex odio. Nam bibendum cursus purus, vel efficitur urna finibus vitae. Nullam finibus aliquet pharetra. Morbi in sem dolor.Integer pretium hendrerit ante quis vehicula.</p>
                   <p>Mauris consequat ornare enim, sed lobortis quam ultrices sed.</p>
                 </div>
            </div>
                        
                <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                  <div class="lorem-right">
                     <img src="../assets/image/group-36.png" alt="">
                  </div>
              </div>
          </div>


<!-- Blog Section -->


  <h2 class="blog-title">Our Blog</h2>

    <div class="row">
      <div class="col-md-12 col-lg-4 col-sm-12 col-12">
         <div class="blog-main">
           <div class="blog-image">
             <img src="../assets/image/group-28.png" alt="Card image">
           </div>
               <div class="blog-image-title">
                 <h5><b>Lorem ipsum dolor sit amet</b></h5>
                 <p>January 28, 2019</p>
               </div>
                  <div class="blog-image-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar aliquet.</p>
                 </div>
                   <div class="image-bottom">Read the Post</div>
                   <div class="icon-img"><i class="fas fa-long-arrow-alt-right"></i></div>
                 </div>
               </div>
             <br>

      <div class="col-md-12 col-lg-4 col-sm-12 col-12">
         <div class="blog-main">
            <div class="blog-image">
              <img src="../assets/image/group-29.png" alt="Card image">
            </div>
             <div class="blog-image-title">
               <h5><b>Lorem ipsum dolor sit amet</b></h5>
               <p>January 28, 2019</p>
             </div>
               <div class="blog-image-text">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar aliquet.</p>
              </div>
               <div class="image-bottom">Read the Post</div>
               <div class="icon-img"><i class="fas fa-long-arrow-alt-right"></i></div>
              </div>
          </div>
        <br>

      <div class="col-md-12 col-lg-4 col-sm-12 col-12">
         <div class="blog-main">
            <div class="blog-image">
              <img src="../assets/image/group-30.png" alt="Card image">
            </div>
             <div class="blog-image-title">
               <h5><b>Lorem ipsum dolor sit amet</b></h5>
               <p>January 28, 2019</p>
             </div>
               <div class="blog-image-text">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar aliquet.</p>
              </div>
               <div class="image-bottom">Read the Post</div>
               <div class="icon-img"><i class="fas fa-long-arrow-alt-right"></i></div>
              </div>
          </div>
       </div>
    </div>

 <div class="lorem-left1">
  <img src="../assets/image/blog-right-bg.png" alt="Cinque Terre">
 </div>
 </div>
 </div>


 <!-- Customer Section -->


<div class="customer">
    <h4 class="customer-title"><b>What Our Customers Say</b></h4>


<div class="customer-main1">
   <div class="row">
     <div class="col-md-12 col-lg-4 col-sm-12 col-12">
      <div class="customer-main">  
       <img class="messages" src="../assets/image/message.png">  
        <div class="clearfix">
           <img class="customer-img"src="../assets/image/group-31.png" alt="">
             <div class="customer-img-title">
               <h6>Lary Watson</h6>
                <p>Manchester</p>
             </div>
        </div>
            <div class="customer-bottom">
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed fermentum metus pulvinar aliquet consequat. Praesent nec malesuada nibh.</p>
               <p>Nullam et metus congue, auctor augue sit amet, consectetur tortor.</p>
               <p style="float:left;margin-right: 10px;">Read More</p><i class="fas fa-long-arrow-alt-right arrow"></i></p>
             </div>  
       </div>
     </div>  

<div class="col-md-12 col-lg-4 col-sm-12 col-12">
  <div class="customer-main">   
    <img class="messages" src="../assets/image/message.png">  
        <div class="clearfix">
           <img class="customer-img"src="../assets/image/group-32.png" alt="">
             <div class="customer-img-title">
               <h6>John Smith</h6>
                <p>Manchester</p>
             </div>
        </div>
            <div class="customer-bottom">
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed fermentum metus pulvinar aliquet consequat. Praesent nec malesuada nibh.</p>
               <p>Nullam et metus congue, auctor augue sit amet, consectetur tortor.</p>
               <p style="float:left; margin-right: 10px;">Read More</p><i class="fas fa-long-arrow-alt-right arrow"></i></p>
             </div>    
      </div>
   </div>

<div class="col-md-12 col-lg-4 col-sm-12 col-12">
  <div class="customer-main">  
    <img class="messages" src="../assets/image/message.png">   
        <div class="clearfix">
           <img class="customer-img"src="../assets/image/group-33.png" alt="">
             <div class="customer-img-title">
               <h6>Lars Johnson</h6>
                <p>Manchester</p>
             </div>
        </div>
            <div class="customer-bottom">
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed fermentum metus pulvinar aliquet consequat. Praesent nec malesuada nibh.</p>
               <p>Nullam et metus congue, auctor augue sit amet, consectetur tortor.</p>
               <p style="float:left;margin-right: 10px;">Read More</p><i class="fas fa-long-arrow-alt-right arrow"></i></p>
             </div>    
        </div>
    </div>
 </div>
</div>


<!-- Footer -->


 <section class="nsletter text-center ">
   <div class="whatsapp">
    <a href="#"><img src="../assets/image/layer-598.png"></a>
   </div>
  
    <div class="arrow1">
    <a href="#"><img src="../assets/image/up.png"></a>
    </div>
    
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
                      <a href="#">
                        <img class="bottom-logo" src="../assets/image/logo-small.png">
                      </a>
                    </div>
                </nav>
            </div>
            <div class="col-md-4 bottom-middle" style="padding-top: 20px;">
                <nav>
                    <div class="nav nav-bottom">
                        <a href="#" class="btn">HOME</a>
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
         <div class="ok-btn">OK!</div>
            </div>
            </div>
    </footer>

</div>


<!-- Boostrap -->
   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.10/dist/sweetalert2.all.min.js"></script>

    <?php include('./all-ajax.php'); ?>

    <script src="../assets/js/Homepage.js"></script>
    <script src="../assets/js/Login.js"></script>
    <script src="../assets/js/Signup.js"></script>


<!-- Spinner -->

 <div class="parent-spinner">
   <div class="spinner"></div>
 </div>

<script>
  
$('.login1').on('click',function(){
$('.mobile-nav').hide();


});


</script>


</body>
</html>