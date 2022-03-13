
<?php include('./header.php'); ?>

      <title>Contact</title>
      <link rel="stylesheet" href="../assets/css/contacts.css">  
      <link rel="stylesheet" href="../assets/css/validation.css">    

</head>

<body>

<header>
  
<?php include('./nav.php'); ?>

</header>

<!-- Top Image -->

<div class="top-contat-img">
  <img src="../assets/image/group-16_2.png" alt="top-img">
</div>


<!-- Contact -->

<div class="contact"><b>Contact us</b></div>
  <div class="container">
        <div class="sepretor-bg">
            <img src="../assets/image/separator.png" class="sepretor">
        </div>
    </div>


<div class="middle-part">
 <div class="row">
  <div class="col-md-4 col-lg-4 col-sm-12 col-12">
    <div class="arrow-img">
     <img src="../assets/image/forma-1_2.png" alt="middle img">
   </div>
   <div class="arrow-img-des">1111 Lorem ipsum text 100,<br> Lorem ipsum AB
   </div>
  </div>

 <div class="col-lg-4 col-md-4 col-sm-12 col-12">
  <div class="arrow-img">
    <img src="../assets/image/phone-call.png" alt="middle img">
  </div>
  <div class="arrow-img-des">+49 (40) 123 56 7890<br>+49 (40) 987 56 0000
 </div>
</div>

 <div class="col-lg-4 col-md-4 col-sm-12 col-12">
  <div class="arrow-img" id="message-box">
    <img src="../assets/image/vector-smart-object.png" alt="middle img">
  </div>
  <div class="arrow-img-des">info@helperland.com
  </div>
 </div>
</div>
</div>

<!-- Border -->

<div class="bottom-border"></div>
 <div class="touch"><b>Get in touch with us</b>
</div>


<!-- Touch -->

<div class="touch-container">
 <form method="POST">

  <div class="clearfix">
   <div class="text">
    <input type="text" id="firstname" name="firstname" placeholder="First name" autocomplete="off" required>
    <div class="first-name-msg mb-2"></div>
   </div>

 <div class="text" id="inp">
  <input type="text" id="lastname" name="lastname" placeholder="Last name" autocomplete="off" required>
  <div class="last-name-msg mb-2"></div>
 </div>
</div>

  <div class="clearfix">
   <div class="text">
    <div class="input-group">
      <span class="input-group-text" id="number">+49</span>
      <input type="tel" style="width:242px;" class="form-control" id="mobilenum" placeholder="Mobile-number" name="mobile" autocomplete="off" 
      maxlength="10" required>
    </div>
    <div class="mobile-msg mb-2" style="margin-top: 10px;"></div>
 </div>


   <div class="text" id="inp">
    <input type="text" id="email" name="email" placeholder="Email address" autocomplete="off" required>
    <div class="email-msg mb-2"></div>
   </div>
  </div>


   <select style="width:100%;" id="option" name="subject" required>
    <option>Subject</option>
    <option>Subscription</option>
    <option>Feedback</option>
   </select>

<input type="text" id="message" name="message" placeholder="Message" autocomplete="off">
<input type="submit" class="contact-submit" id="submit" value="Submit">
 </div>
</form>
</div>


<!-- Map -->

<section class="maps">

  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14686.79219931298!2d72.5004358!3d23.0348564!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdc9d4dae36889fb9!2sTatvaSoft!5e0!3m2!1sen!2sin!4v1639749098244!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="map"></iframe>

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


<?php include('./Footer.php'); ?>


<script src="../assets/js/Signup.js"></script>


</body>
</html>