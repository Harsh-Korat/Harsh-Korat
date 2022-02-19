<?php include('./header.php'); ?>

      <title>Book Service</title>
      <link rel="stylesheet" href="../assets/css/book-service.css">


</head>

<?php 
  
  if(isset($_SESSION['msg'])){
  $register= $_SESSION['msg'];
  echo '<script> alert("'.$register.'");</script>';
  unset($_SESSION['msg']);
 }      

  $base_url = "http://localhost/Helperland/";
 ?>


<body>

<header>
  
<?php include('./nav.php'); ?>

</header>

<!-- Top Image -->

<div class="top-img">
  <img src="../assets/image/book-service-banner.jpg" alt="top-img">
</div>


<!-- Cleaning Service -->

<div class="cleaning">Set up your cleaning service</div>
     <div class="container">
        <div class="sepretor-bg">
            <img src="../assets/image/separator.png" class="sepretor">
        </div>
    </div>



<!-- Login Modal data-backdrop="static" -->
  
<div class="modal fade" id="myModal" >
 <div class="modal-dialog modal-dialog-centered">
   <div class="modal-content">
     <div class="modal-header">
       <h4 class="modal-title"><b>Log in</b></h4>
       <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>

                           
     <div class="modal-body">
      <div class="container mt-1">
        <form  method="POST" action=<?= $base_url . "./?controller=Helperland&function=Login" ?>>
         <div class="mt-3 login-modals">
           <input type="email" class="form-control" id="loginemail" placeholder="E-Mail" name="loginemail" required>
           <span><i class="fa fa-user mail"></i></span>
         </div>
         <div class="email-msg mails mb-2 mt-2"></div>

         <div class="mt-3 mb-3 login-modals" style="position: relative;">
           <input type="password" class="form-control" id="loginpassword" placeholder="Password" name="password" required>
           <span><i class="fa fa-lock locks" style="top:17px;right:23px;"></i></span>
         </div>

         <div class="checkbox1 mb-3">  
           <input type="checkbox" name="checkbox">
           <label>Save on computer</label>
         </div>

         <div class="form-group mt-2 login-modals">
           <button type="submit" class="btn btn-login form-control">Login</button>
         </div>
        </form>
      </div>
   
      <div class="footer-login mt-2"><a class="forgot-password" href="#" data-toggle="modal" data-target="#forgot-modal" data-dismiss="modal">Forgot Password?</a></div>
      <div class="footer-login mt-2"><p>Don't Have an account yet?</p></div>
      <div class="footer-login" id="creat-account"><a class="creat-account" href="./customer-signup.php">Create an account</a></div>
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
          <form  method="POST" action=<?= $base_url . "./?controller=Helperland&function=ForgotMail" ?>>
           <div class="mt-3 login-modals">
             <input type="email" class="form-control" id="login" placeholder="E-Mail" name="forgot_email" autocomplete="off">
           </div>

           <div class="form-group mt-4 login-modals">
              <button type="submit" class="btn btn-login form-control">Send</button>
           </div>
          </form>
         </div>
 
         <div class="footer-login mt-3"><a class="forgot-password" href="#" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Log in now</a></div>
         </div>
        </div>
      </div>
   </div>


<!-- Navbar -->

<section id="book_service">

<div class="nav_payment">
     
  <ul class="nav nav-tabs" id="myTab" role="tab-list">
    <li class="nav-item tab1">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#setup" role="tab" aria-controls="home" aria-selected="true">
        Setup Service
        <span class="bottom-border"></span>
      </a>
    </li>

    <li class="nav-item tab2">
      <a a class="nav-link" id="profile-tab" data-toggle="tab" href="#schedule" role="tab" aria-controls="profile" aria-selected="false">
        Schedule & Plan
        <span class="bottom-border"></span>
      </a>
    </li>

    <li class="nav-item tab3">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#details" role="tab" aria-controls="contact" aria-selected="false">
        Your Details
        <span class="bottom-border"></span>
      </a>
    </li>
  
    <li class="nav-item tab4">
      <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment-hr" role="tab" aria-controls="payment" aria-selected="false">
        Make Payment
        <span class="bottom-border"></span>
      </a>
    </li>
  </ul>


<!-- Setup Service -->

<div class="tab-content" id="myTabContent">

<section class="tab-pane fade text-one show active" id="setup" role="tabpanel" aria-labelledby="home-tab">
  <div class="title">Please enter your Postal code:</div>
    <form method="POST">
      <div class="menubar1">
        <input type="text" id="postalcode" name="postal" placeholder="Postal code" maxlength="6" min="0" max="6">
        <button type="button" class="check">Check Availability</button>
      </div>
        <div id="postal_number" class="text-danger mt-2"></div>
    </form>
 </section>


<!-- Schedule & Plan -->

<section class="tab-pane fade text-two" id="schedule" role="tabpanel" aria-labelledby="profile-tab">

<div class="title">Select number of rooms and bath</div>
  <div class="select_menu">
    <select id='selectbed' class="selectbed" name="bed">
        <option value='1'>1 bed</option>
        <option value='2'>2 bed</option>
        <option value='3'>3 bed</option>
        <option value='4'>4 bed</option>
        <option value='5'>5 bed</option>
        <option value='6'>6 bed</option>
        <option value='7'>7 bed</option>
   </select>
   
   <select id='selectbath' class="selectbath" name="bath">
        <option value='1'>1 bath</option>
        <option value='2'>2 bath</option>
        <option value='3'>3 bath</option>
        <option value='4'>4 bath</option>
        <option value='5'>5 bath</option>
        <option value='6'>6 bath</option>
        <option value='7'>7 bath</option>
   </select>
 </div>

<hr>

<div class="book-flex1">
  <div>
    <div class="title_second">When do you need the cleaner?</div>
      <div class="select_menu book-flex" id="date">
        <div class="date1 selectdate book-flex">
          
          <input type="text" id="selectdate" name="calander" placeholder="DD/MM/YYYY" maxlength="8">            
          <img src="../assets/image/admin-calendar-blue.png">                                  
        </div>

        <select id='selectime' class="selectime" name="time" style="width: 108px;">                         
            <option value='8'>8:00 </option>
            <option value='8.5'>8:30 </option>
            <option value='9'>9:00 </option>
            <option value='9.5'>9:30 </option>
            <option value='10'>10:00</option>
            <option value='10.5'>10:30</option>
            <option value='11'>11:00</option>
            <option value='11.5'>11:30</option>
            <option value='12'>12:00</option>
            <option value='12.5'>12:30</option>
            <option value='13'>13:00</option>
            <option value='13.5'>13:30</option>
            <option value='14'>14:00</option>
            <option value='14.5'>14:30</option>
            <option value='15'>15:00</option>
            <option value='15.5'>15:30</option>
            <option value='16'>16:00</option>
            <option value='16.5'>16:30</option>
            <option value='17'>17:00</option>
            <option value='17.5'>17:30</option>
            <option value='18'>18:00</option>
        </select>
      </div>
      <span class="timingerr text-danger"></span>
    </div>

   <div class="book-hr">
     <div class="title_second">How long do you need your cleaner to stay?</div>
       <div class="select_menu" id="date">
        <select id='selecthour' class="selecthour" name="selecthour">
            <option value='3'>3.0 Hrs</option>
            <option value='3.5'>3.5 Hrs</option>
            <option value='4'>4.0 Hrs</option>
            <option value='4.5'>4.5 Hrs</option>
            <option value='5'>5.0 Hrs</option>
            <option value='5.5'>5.5 Hrs</option>
            <option value='6'>6.0 Hrs</option>
            <option value='6.5'>6.5 Hrs</option>
            <option value='5'>7.0 Hrs</option>
            <option value='7.5'>7.5 Hrs</option>
            <option value='8'>8.0 Hrs</option>
            <option value='8.5'>8.5 Hrs</option>
            <option value='9'>9.0 Hrs</option>
            <option value='9.5'>9.5 Hrs</option>
            <option value='10'>10.0 Hrs</option>
            <option value='10.5'>10.5 Hrs</option>
            <option value='11'>11.0 Hrs</option>
        </select>
      </div>
    </div>
  </div>

<hr>

<!-- Service Section Start -->

<section class="services-main">
  <div class="service">Extra Services</div>
    <div class="service-flex">
      <div class="services-left">
         <div class="first-img"><img class="firsstservice" src="../assets/image/3.png" alt=""></div>
         <div class="first-text">Inside cabinets</div>
      </div>

      <div class="services-left">
         <div class="first-img"><img class="secondservice" src="../assets/image/5.png" alt=""></div>
         <div class="first-text">Inside fridge</div>
      </div>

      <div class="services-left">
         <div class="first-img" id="first"><img class="thirdservice" src="../assets/image/4.png" alt=""></div>
         <div class="first-text">Inside oven</div>
      </div>

      <div class="services-left">
         <div class="first-img"><img class="fourthservice" src="../assets/image/2.png" alt=""></div>
         <div class="first-text">Laundry <br>wash & dry</div>
      </div>

      <div class="services-left">
         <div class="first-img"><img class="fifthservice" src="../assets/image/1.png" alt=""></div>
         <div class="first-text">Interior <br>windows</div>
      </div>
   </div>
</section>

<hr>

<!-- Comment -->

<div class="comment">Comments</div>
<textarea rows=3 id="comments" placeholder="Comments"></textarea>

<div class="book-flex">
   <input type="checkbox" id="petsornot"><p class="pet">I have pets at home</p>
</div>

<hr>

<button type="button" class="continue scheduleandplan">Continue</button>

</section>



<!-- Your Details  -->

<section class="tab-pane fade text-third" id="details" role="tabpanel" aria-labelledby="contact-tab">

<div class="title">Please enter your address so that your helper can find you.</div>
 <p class="text-danger addresserror" style="font-size:20px"></p>
<form>
  <div id="alladdress">

  </div>
</form>

<button type="button" class="add new-address">+ Add new address</button>

  <div id="bottom-address">
    <div class="row">
      <div class="col-md-6">
        <label class="street">Street name</label>
        <input type="text" class="form-control" id="street" placeholder="Street name">
      </div>
 
      <div class="col-md-6">
        <label class="street">House number</label>
        <input type="number" class="form-control" id="houseno" placeholder="House number">
      </div>
    </div>

    <div class="row" id="address1">
      <div class="col-md-6">
        <label class="street">Pincode</label>
        <input type="number" class="form-control street" id="pincode" value="532225" readonly>
      </div>
   
    <div class="col-md-6">
      <label class="street">Location</label>
      <select class="form-control street" id="location">
        <option>Bonn</option>
      </select>
     </div>
    </div>

    <div class="row" id="address1">
      <div class="col-md-6">
        <label class="street">Phone Number</label>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text street">+49</div>
            </div>
            <input type="tel" class="form-control" id="mobilenum" placeholder="Mobile number" maxlength="10" size="10">
          </div>
        </div>
       </div>

     <button class="btn addresssave" id="address1">Save</button>
     <button type="button" id="discard" class="btn">Cancel</button>
   </div> 


  <div class="title">Your Favourite Service Providers</div>
<hr>

<div class="favourite-service">You can choose your favourite service provider from the below list.</div>
<div class="round">
    <img src="../assets/image/forma-1-copy-19.png">
</div>
   <p class="service-provider">Sandip Patel</p>
   <button type="button" class="favourite-bttn">Select</button>

<hr id="hr2">
   <button type="button" class="continue yourdetailsbtn">Continue</button>
</section>


<!-- Payment Section -->

<section class="tab-pane fade text-fourth" id="payment-hr" role="tabpanel" aria-labelledby="payment-tab">

  <div class="title">Pay securely with Helperland payment gatway!</div>
    <p class="discount">Promo code (optional)</p>
      <form>
        <div class="menubar" style="margin-bottom: -23px;">
          <input type="text" id="promocode" name="pincode" placeholder="Promo code (optional)">
          <button type="button" class="use addpromocode">Apply</button>
        </div>
        <span class="promoerr text-danger"></span>
      </form>

<hr>

  <div class="border-card">
    <div class="row cardpay">
      <div class="col-md-6">
        <input type="text" name="creditcardno" class="form-control payment-cardno" placeholder="Card number" required size="19" id="cr_no" maxlength="19">
        <i class="fa fa-credit-card credit-card"></i>
        <span class="validcardno text-danger"></span>
      </div>
     
      <div class="col-md-3 col-sm-6 col-6">
        <input type="text" id="exp" name="expirydt" class="form-control dates" size="6" maxlength="5" placeholder="MM/YY" required />
        <span class="validcardate text-danger"></span>
      </div>
     
      <div class="col-md-3 col-sm-6 col-6">
        <input type="password" name="cvv" class="form-control cvv" placeholder="CVC" max="3" maxlength="3" required >
        <span class="validcardcvv text-danger"></span>
      </div>
     </div>
     
      <div class="row float-right" style="margin-top: 35px;">
        <div class="col-sm-12 col-12">
          <p class="col accepted">Accepted Cards:</p>
          <div class="row cards-all" style="margin-right: 20px;">
            <div class="col-3">
              <img src="../assets/image/visa1.png" class="credit-cards-visa">
            </div>
       
            <div class="col-3">
              <img src="../assets/image/master-card1.png" class="credit-cards-master">
             </div>

            <div class="col-3">
              <img src="../assets/image/rupay.png " class="credit-cards-ae">
            </div>
           </div>
          </div>
        </div>
      </div>

  <hr>

   <span class="checkboxerr text-danger"></span>
  
  <div class="book-flex">
   <input type="checkbox" id="checkbox" class="Termsandconditions"><p class="pet">I accept the <span class="term">terms and conditions </span>, the <span class="term">cancellation policy</span> and the <span class="term">data protection regulations.   </span> I confirm that Helperland will start executing the contract before the end of the cancellation period and that I will lose my right of cancellation as a consumer once the contract has been fully performed.</p>
  </div>

<hr class="hr1">

  <button type="button" class="continue confirmpayment" id="book">Complete Booking</button>

  </section>
 </div>
</div>


<!-- Payment summery -->

<div class="payment_main">
  <div class="card">
   <div class="payment">Payment Summary</div>
    <div class="card-body">
     
     <p class="card-text">01/01/2018 @ 4:00 pm <br>1 bed, 1 bath.</p>
     <p class="duration">Duration</p>
     <p class="card-text basics">Basic <span>3 Hrs</span></p>
     <div class="card-text basics extra_services">
       <p class="extra_parts" style="color:black;display: none;">Extras</p>
       <p class="extraparts extra1" id="extra1" style="display: none;">Inside cabinets <span> 30 Min.</span></p>
       <p class="extraparts extra2" style="display: none;">Inside fridge<span>30 Min.</span></p>
       <p class="extraparts extra3" style="display: none;">Inside oven <span>30 Min.</span></p>
       <p class="extraparts extra4" style="display: none;">Laundry wash & dry<span>30 Min.</span></p>
       <p class="extraparts extra5" style="display: none;">Interior windows<span>30 Min.</span></p>
     </div>

     <hr>
     <p class="duration" id="duration">Total Service Time <span>3.5 Hrs</span></p>
     <hr id="hrr">
     <p class="card-text subtotal">Per cleaning <span>$87</span></p>   
     <p class="card-text">Discount <span> - $27</span></p> 
     <hr id="hrr"> 
     <p class="card-text total" id="payment">Total Payment <span>$63</span></p> 
     <p class="card-text" id="price">Effective Price <span class="effective">$50.4</span></p> 
     <p class="card-text"><strong style="color: #FF0000;">*</strong>You will save 20% according to §35a EStG.</p>
    </div>

  <div class="card-footer">
     <img src="../assets/image/smiley.png" alt="img"><span data-toggle="modal" data-target="#whatIncludes" data-dismiss="modal">See what is always included</span>
   </div>
 </div>


<!-- Question Section -->

<div class="question_main">
  <div class="question_title">Questions?</div>

<div  id="accordion">
  <div class="question">
  <span class="before_question collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
       Which Helperland professional will come to my place?
    </span>
  </div>
<hr>
  <div id="collapseOne" class="collapse" data-bs-parent="#accordion">
    <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, minima vero ea fuga obcaecati maxime incidunt facere.
    </div>
  </div>

   <div class="question">
  <span class="before_question collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
       Which Helperland professional will come to my place?
    </span>
  </div>
<hr>
  <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
    <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, minima vero ea fuga obcaecati maxime incidunt facere.
    </div>
  </div>

   <div class="question">
  <span class="before_question collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseOne">
       Which Helperland professional will come to my place?
    </span>
  </div>
<hr>
  <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
    <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, minima vero ea fuga obcaecati maxime incidunt facere.
    </div>
  </div>

   <div class="question">
  <span class="before_question collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseOne">
       Which Helperland professional will come to my place?
    </span>
  </div>
<hr>
  <div id="collapseFour" class="collapse" data-bs-parent="#accordion">
    <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, minima vero ea fuga obcaecati maxime incidunt facere.
    </div>
  </div>

   <div class="question">
  <span class="before_question collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseOne">
       Which Helperland professional will come to my place?
    </span>
  </div>
<hr>
  <div id="collapseFive" class="collapse" data-bs-parent="#accordion">
    <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, minima vero ea fuga obcaecati maxime incidunt facere.
    </div>
  </div>
    
   <div class="question">
  <span class="before_question collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseOne">
       Which Helperland professional will come to my place?
    </span>
  </div>
<hr>
  <div id="collapseSix" class="collapse" data-bs-parent="#accordion">
    <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, minima vero ea fuga obcaecati maxime incidunt facere.
    </div>
  </div>

   <div class="question">
  <span class="before_question collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseOne">
       Which Helperland professional will come to my place?
    </span>
  </div>
<hr>
  <div id="collapseSeven" class="collapse" data-bs-parent="#accordion">
    <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, minima vero ea fuga obcaecati maxime incidunt facere.
    </div>
  </div>
</div>
 
  <button class="btn">For more help</button>
  </div>
 </section>
</div>


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


<?php include('./Footer.php'); ?>
 
<!--
 <div id="iframeloading" style="    top: -8%;
    display: none;
    position: fixed;
    left: 0%;
    height: 100%;">
    <img src="./assets/Image/preloader.gif" alt="loading" />
</div>
-->

<!-- What Include Modal -->

  <div class="modal fade" id="whatIncludes" tabindex="-1" role="dialog" aria-labelledby="whatIncludesModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header titles">
          <h4 class="modal-title"><b>What we include in cleaning </b></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
         </button>
        </div>
        <div class="modal-body bodyinclude">
          <div class="row">
            <div class="col-lg-4 col-md-6 includes">
              <h4>Bedroom and Living Room </h4>
              <ul>
                <li>
                  <div class="sucessimg">
                    <img src="../assets/image/right-arrow.png">
                  </div>
                 <div class="text">Included Dust all accessible surfaces</div>
                </li>
                
                <li>
                  <div class="sucessimg">
                    <img src="../assets/image/right-arrow.png">
                  </div>
                 <div class="text">Included Wipe down all mirrors and glass fixtures </div>
                </li>
                
                <li>
                  <div class="sucessimg">
                    <img src="../assets/image/right-arrow.png">
                  </div>
                  <div class="text">Not Included Clean all floor surfaces </div>
                </li>
                
                <li>
                  <div class="sucessimg">
                    <img src="../assets/image/right-arrow.png">
                  </div>
                 <div class="text">Included Take out garbage and recycling </div>
                </li>
                
                <li>
                  <div class="sucessimg">
                    <img src="../assets/image/right-arrow.png">
                  </div>
                 <div class="text">To clean up </div>
                </li>

                <li>
                  <div class="sucessimg">
                    <img src="../assets/image/right-arrow.png">
                  </div>
                 <div class="text">Make beds </div>
                </li>
              </ul>
            </div>
            
            <div class="col-lg-4 col-md-6 includes">
              <h4>Bathrooms</h4>
              <ul class="includedcleaning">
                <li>
                  <div class="sucessimg">
                    <img src="../assets/image/right-arrow.png">
                  </div>
                 <div class="text">Included Wash and sanitize the toilet, shower, tub, sink</div>
                </li>
                
                <li>
                  <div class="sucessimg">
                    <img src="../assets/image/right-arrow.png">
                  </div>
                 <div class="text">Included Wipe down all mirrors and glass fixtures </div>
                </li>
               
                <li>
                  <div class="sucessimg">
                    <img src="../assets/image/right-arrow.png">
                  </div>
                 <div class="text">Included Wipe down all mirrors and glass fixtures </div>
                </li>
                
                <li>
                  <div class="sucessimg">
                    <img src="../assets/image/right-arrow.png">
                  </div>
                 <div class="text">Not Included Clean all floor surfaces</div>
                </li>
                
                <li>
                  <div class="sucessimg">
                    <img src="../assets/image/right-arrow.png">
                  </div>
                 <div class="text">Included Take out garbage and recycling </div>
                </li>
               </ul>
              </div>

              <div class="col-lg-4 col-md-6 includes">
                <h4>Kitchen</h4>
                <ul class="includedcleaning">
                  <li>
                    <div class="sucessimg">
                      <img src="../assets/image/right-arrow.png">
                    </div>
                   <div class="text">Included Dust all accessible surfaces</div>
                  </li>
                  
                  <li>
                    <div class="sucessimg">
                      <img src="../assets/image/right-arrow.png">
                    </div>
                   <div class="text">Included Empty sink and load up dishwasher </div>
                  </li>
                  
                  <li>
                    <div class="sucessimg">
                      <img src="../assets/image/right-arrow.png">
                    </div>
                   <div class="text">Included Clean all floor surfaces</div>
                  </li>
                  
                  <li>
                    <div class="sucessimg">
                      <img src="../assets/image/right-arrow.png">
                    </div>
                   <div class="text">Included Take out garbage and recycling</div>
                  </li>
                  
                  <li>
                    <div class="sucessimg">
                      <img src="../assets/image/right-arrow.png">
                    </div>
                   <div class="text">Cleaning the sink and the oven (outside) </div>
                  </li>
                 </ul>
               </div>
              </div>
            </div>
          </div>
        </div>
       </div>



<!-- Boostrap -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.10/dist/sweetalert2.all.min.js"></script>
 

<?php
if(!isset($_SESSION['username'])){?>

<script>
$('#myModal').modal('show');
</script>

<?php }
if(isset($_SESSION['username'])){?>

<script>
$('#myModal').modal('hide');
</script>

<?php } ?>

<?php include('./book-ajax.php'); ?>

</body>
</html>


