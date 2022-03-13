<?php include('./header.php'); ?>
 
   
      <title>My Account</title>
      <link rel="stylesheet" href="../assets/css/provider-setting.css">
      <link rel="stylesheet" href="../assets/css/validation.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

<header>
  
<?php include('./nav.php'); ?>

</header>


<!-- Service Provider Name -->

<div class="welcome">
   <p>Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
</div>

 <div class="hr"></div>


<!-- Vertical Navbar -->

  <div class="middle-table">
    <div class="middle">

  <div class="vertical-nav">

    <ul class="list-group">
    <a class="list-group-item" href="#">Dashboard</a>
    <a class="list-group-item" href="./NewService.php">New Service Requests</a>
    <a class="list-group-item" href="./Upcoming.php">Upcoming Services</a>
    <a class="list-group-item" href="#">Service Schedule</a>
    <a class="list-group-item" href="./ServiceProviderHistory.php">Service History</a>
    <a class="list-group-item" href="./myrating">My Ratings</a>
    <a class="list-group-item" href="./BlockCustomer.php">Block Customer</a>
    <a class="list-group-item" href="#">Invoices</a>
    <a class="list-group-item" href="#">Notifications</a>
  </ul>

</div>


<!-- Middle Service Provider Details Table -->


<section class="setting-main">

<div class="setting">

  <ul class="nav nav-tabs middle-navbar" id="myTab" role="tablist"> 
    <li class="nav-item user-setting">
      <a class="nav-link active"  id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><span class="dis-non">My Details</span><span class="icon"><i class="fa-solid fa-receipt"></i></span></a>
    </li>

    <li class="nav-item user-setting1">
      <a class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><span class="dis-non">Change Password</span><span class="icon"><i class="fa-solid fa-key"></i></span></a>
    </li>
  </ul>

</div>


<!-- Service Provider My Details tab -->


<div class="tab-content" id="myTabContent">

 <div class="tab-pane fade show active home" id="home" role="tabpanel" aria-labelledby="home-tab">
   <div class="mobile-menu">My Details</div>
    <div class="avtarimage" id="avtar-mobile" style="float: right; margin-right:0;">
      <img src="../assets/image/avatar-car.png" class="avatar-img1 avatar-car changedimg">
    </div>

 <div class="title booking1"><b>Account Status: <span class="account-active">Active</span></b></div>

 <div class="title booking1"><b>Basic Details</b></div>

 <hr class="booking-hr">

 <form method="POST" class="address-top form-setting">
   <p class="details-error text-white text-center bg-success px-2 py-2" style="display:none;"></p>
   <div class="row">
     <div class="col-md-4 col-sm-12 col-12"> 
       <div class="form-group address">  
         <label class="lables">First Name</label><br> 
         <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required>
         <div class="first-name-msg text-left  mb-2"></div>  
       </div>
      </div>
  
    <div class="col-md-4 col-sm-12 col-12"> 
      <div class="form-group address">  
        <label class="lables">Last Name</label><br>
        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required>
        <div class="last-name-msg text-left mb-2"></div> 
      </div>
    </div>

  
    <div class="col-md-4 col-sm-12 col-12"> 
      <div class="form-group address">  
        <label class="lables">E-mail Address</label><br>
        <input type="text" style="background-color: rgb(240,240,240);" class="form-control" name="email" id="emailaddress" placeholder="Email" disabled>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 col-sm-12 col-12">
      <div class="form-group address">  
        <label class="lables">Mobile Number</label><br>
          <div class="input-group">
            <span class="input-group-text" id="number">+49</span>
            <input type="tel" style="width: 75%;" class="form-control" id="mobilenum" placeholder="Mobile-number" name="mobile" maxlength="10" autocomplete="off" required>
            <div class="mobile-msg"></div>
          </div>
      </div>
    </div>
 
  <div class="col-md-4 bottom-hr">
    <div class="address">  
     <label class="lables">Date of Birth</label><br>

 <div class="select_menu">
    <select  name="date" id="birth">
        <option value="Day">Day</option>
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
   </select>
   
   <select name="month" id="month">
        <option value="Month">Month</option>
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
   </select>

   <select name="year" id="year">
        <option value="Year">Year</option>
        <option value="2000">2000</option>
        <option value="2001">2001</option>
        <option value="2002">2002</option>
        <option value="2003">2003</option>
        <option value="2004">2004</option>
        <option value="2005">2005</option>
        <option value="2006">2006</option>
        <option value="2007">2007</option>
        <option value="2008">2008</option>
        <option value="2009">2009</option>
        <option value="2010">2010</option>
        <option value="2011">2011</option>
        <option value="2012">2012</option>
        <option value="2013">2013</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
   </select>
   </div>
  </div>
 </div>

  <div class="col-md-4 bottom-hr">
    <div class="address">  
     <label class="lables">Nationality</label><br>

 <div class="select_menu1">
    <select  name="nationality" id="nationallity">
        <option value="">Nationality</option>
        <option value="1">German</option>
        <option value="176685">Indian</option>
        <option value="176626">Afghan</option>
        <option value="176627">Egyptian</option>
        <option value="176628">Albanian</option>
        <option value="176629">Algerian</option>
        <option value="176630">American</option>
        <option value="176631">andorranisch</option>
        <option value="176632">angolan</option>
        <option value="176633">Antiguan</option>
        <option value="176634">äquatorialguineisch</option>
        <option value="176635">Argentinean</option>
        <option value="176636">Armenian</option>
        <option value="176637">Azerbaijani</option>
        <option value="176638">Ethiopian</option>
        <option value="176639">Australian</option>
        <option value="176640">bahamaisch</option>
        <option value="176641">bahrainisch</option>
        <option value="176642">bangladesh</option>
        <option value="176643">Belgian</option>
        <option value="176644">belizean</option>
        <option value="176645">Beninese</option>
        <option value="176646">Dzongkha</option>
        <option value="176647">Bolivian</option>
        <option value="176648">Bosnian herzegowinisch</option>
        <option value="176649">botsuanisch</option>
        <option value="176650">Brazilian</option>
        <option value="176651">British</option>
        <option value="176652">bruneiisch</option>
        <option value="176653">Bulgarian</option>
        <option value="176654">burkinisch</option>
        <option value="176655">burundisch</option>
        <option value="176656">cabo-verdisch</option>
        <option value="176657">Chilean</option>
        <option value="176658">Chinese</option>
        <option value="176659">Costa Rican</option>
        <option value="176660">Danish</option>
        <option value="176661">the north Mariana Islands</option>
        <option value="176662">the Ver. Arab. Emirates</option>
        <option value="176664">dominicanisch</option>
        <option value="176665">Dominican</option>
        <option value="176666">dschibutisch</option>
        <option value="176667">Ecuadorian</option>
        <option value="176668">Eritrean</option>
        <option value="176669">Estonian</option>
        <option value="176670">Fijian</option>
        <option value="176671">Finnish</option>
        <option value="176672">French</option>
        <option value="176673">gabonese</option>
        <option value="176674">gambian</option>
        <option value="176675">Georgian</option>
        <option value="176676">Ghanaian</option>
        <option value="176677">grenadian</option>
        <option value="176678">Greek</option>
        <option value="176679">Guatemalan</option>
        <option value="176680">Guinea-bissauisch</option>
        <option value="176681">guineisch</option>
        <option value="176682">guyanese</option>
        <option value="176683">Haitian</option>
        <option value="176684">Honduran</option>
        <option value="176686">Indonesian</option>
        <option value="176687">Iraqi</option>
        <option value="176688">Iranian</option>
        <option value="176689">Irish</option>
        <option value="176690">Icelandic</option>
        <option value="176691">Israeli</option>
        <option value="176692">Italian</option>
        <option value="176693">Ivorian</option>
        <option value="176694">Jamaican</option>
        <option value="176695">Japanese</option>
        <option value="176696">Yemeni</option>
        <option value="176697">Jordanian</option>
        <option value="176698">Cambodian</option>
        <option value="176699">cameroonian</option>
        <option value="176700">Canadian</option>
        <option value="176701">Kazakh</option>
        <option value="176702">Qatari</option>
        <option value="176703">Kenyan</option>
        <option value="176704">Kyrgyz</option>
        <option value="176705">Kiribati</option>
        <option value="176706">Colombian</option>
        <option value="176707">comorian</option>
        <option value="176708">Congolese</option>
        <option value="176709">Korean</option>
        <option value="176710">Croatian</option>
        <option value="176711">Cuban</option>
        <option value="176712">kuwaitisch</option>
        <option value="176713">Laotian</option>
        <option value="176714">lesothisch</option>
        <option value="176715">Latvian</option>
        <option value="176716">Lebanese</option>
        <option value="176717">Liberian</option>
        <option value="176718">libyan</option>
        <option value="176719">liechtensteinisch</option>
        <option value="176720">Lithuanian</option>
        <option value="176721">lucianisch</option>
        <option value="176722">Luxembourgish</option>
        <option value="176723">Madagascan</option>
        <option value="176724">Macedonian / Macedonian</option>
        <option value="176725">malawian</option>
        <option value="176726">Malaysian</option>
        <option value="176727">maldivian</option>
        <option value="176728">malisch</option>
        <option value="176729">Maltese</option>
        <option value="176730">Moroccan</option>
        <option value="176731">Marshallese</option>
        <option value="176732">mauritanian</option>
        <option value="176733">Mauritian</option>
        <option value="176734">Mexican</option>
        <option value="176735">micronesian</option>
        <option value="176736">Moldavian</option>
        <option value="176737">Monegasque</option>
        <option value="176738">Mongolian</option>
        <option value="176739">montenegrin</option>
        <option value="176740">Mozambican</option>
        <option value="176741">Myanmarian</option>
        <option value="176742">Namibian</option>
        <option value="176743">Nauruan</option>
        <option value="176744">Nepalese</option>
        <option value="176745">New Zealand</option>
        <option value="176746">Nicaraguan</option>
        <option value="176747">Dutch</option>
        <option value="176748">Nigerian</option>
        <option value="176749">nigrisch</option>
        <option value="176750">Norwegian</option>
        <option value="176751">Omani</option>
        <option value="176752">Austrian</option>
        <option value="176754">Pakistani</option>
        <option value="176755">Palauan</option>
        <option value="176756">Panamanian</option>
        <option value="176757">Papua-neuguineisch</option>
        <option value="176758">Paraguayan</option>
        <option value="176759">Peruvian</option>
        <option value="176760">Filipino</option>
        <option value="176761">Polish</option>
        <option value="176762">Portuguese</option>
        <option value="176763">Rwandan</option>
        <option value="176764">Romanian</option>
        <option value="176765">Russian</option>
        <option value="176766">salomonisch</option>
        <option value="176767">Salvadorian</option>
        <option value="176768">Zambian</option>
        <option value="176769">Samoan</option>
        <option value="176770">sanmarinesisch</option>
        <option value="176771">santomeisch</option>
        <option value="176772">Saudi-arabian</option>
        <option value="176773">Swedish</option>
        <option value="176774">Swiss</option>
        <option value="176775">Senegalese</option>
        <option value="176776">Serbian</option>
        <option value="176777">seychellisch</option>
        <option value="176778">sierraleonisch</option>
        <option value="176779">Zimbabwean</option>
        <option value="176780">Singaporean</option>
        <option value="176781">Slovak</option>
        <option value="176782">Slovenian</option>
        <option value="176783">somali</option>
        <option value="176784">Spanish</option>
        <option value="176785">Sri Lankan</option>
        <option value="176786">South African</option>
        <option value="176787">Sudanese</option>
        <option value="176788">südsudanesisch</option>
        <option value="176789">surinamese</option>
        <option value="176790">swasiländisch</option>
        <option value="176791">Syrian</option>
        <option value="176792">Tajik</option>
        <option value="176793">Taiwanese</option>
        <option value="176794">Tanzanian</option>
        <option value="176795">Thai</option>
        <option value="176796">togolese</option>
        <option value="176797">tongan</option>
        <option value="176798">Chadian</option>
        <option value="176799">Czech</option>
        <option value="176800">Tunisian</option>
        <option value="176801">Turkish</option>
        <option value="176802">Turkmen</option>
        <option value="176803">Tuvaluan</option>
        <option value="176804">Ugandan</option>
        <option value="176805">Ukrainian</option>
        <option value="176806">Hungarian</option>
        <option value="176807">Uruguayan</option>
        <option value="176808">Uzbek</option>
        <option value="176809">vanuatuisch</option>
        <option value="176810">Venezuelan</option>
        <option value="176811">Vietnamese</option>
        <option value="176812">vince table</option>
        <option value="176813">from Niue</option>
        <option value="176814">from St. Kitts and Nevis</option>
        <option value="176815">from Timor-Leste</option>
        <option value="176816">from Trinidad and Tobago</option>
        <option value="176817">belarusian</option>
        <option value="176818">zentralafrikanisch</option>
        <option value="176819">zyprisch</option>
   </select>
   <span class="nationallity-message"></span>
   </div>
  </div>
 </div>
</div>


<!-- Service Provider Radio -->

<div class="form-row">
  <div class="form-group">
    <div class="gender">Gender</div>
      <div class="setting-radio">
        <label>
          <input name="Gender" type="radio" value="1">Male
        </label>
      </div>

      <div class="setting-radio">
        <label>
          <input name="Gender" type="radio" value="2">Female
        </label>
      </div>
      
      <div class="setting-radio">
        <label>
          <input name="Gender" type="radio" value="0">Rather not to say
        </label>
      </div>
      <span class="gender-message"></span> 
    </div>
  </div>

  <div class="form-row">
    <div class="form-group">
      <label>Select Avatar</label>
        <div class="avtarimg form-group">
          <div class="avtarimage">
            <img src="../assets/image/avatar-car.png" class="avatar-img avatar-car">
          </div>

          <div class="avtarimage">
            <img src="../assets/image/avatar-female.png" class="avatar-img avatar-female">
          </div>
          <div class="avtarimage">
            <img src="../assets/image/avatar-hat.png" class="avatar-img avatar-hat">
          </div>
          <div class="avtarimage">
            <img src="../assets/image/avatar-iron.png" class="avatar-img avatar-iron">
          </div>
          <div class="avtarimage">
            <img src="../assets/image/avatar-male.png" class="avatar-img avatar-male">
          </div>
          <div class="avtarimage">
            <img src="../assets/image/avatar-ship.png" class="avatar-img avatar-ship">
          </div>
        </div>
      </div>
     <span class="avtar-message"></span> 
   </div>


<!-- Service Provider Address -->

<div class="title_my booking1"><b>My address</b></div>
 <hr class="booking-hr1">

 <div class="address-top">
   
   <div class="row">
     <div class="col-md-4 col-sm-12 col-12"> 
       <div class="form-group address">  
         <label class="lables">Street name</label><br> 
         <input type="text" class="form-control" name="Street" id="street" placeholder="Street name" required>
         <span class="street-message text-danger mt-1"></span> 
       </div>
      </div>
  
    <div class="col-md-4 col-sm-12 col-12"> 
      <div class="form-group address">  
        <label class="lables">House number</label><br>
        <input type="text" class="form-control" name="House" id="houseno" placeholder="House number" required>
        <span class="house-message text-danger mt-1"></span>
      </div>
    </div>

  
    <div class="col-md-4 col-sm-12 col-12"> 
      <div class="form-group address">  
        <label class="lables">Postal code</label><br>
        <input type="text" class="form-control" name="Postal" id="postalcode" placeholder="Postal" maxlength="6">
        <span class="postalcode-message"></span>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-4 col-sm-12 col-12"> 
      <div class="form-group address">  
        <label class="lables">City</label><br>
        <select id="select" id="location">
        <option value="Bonn">Bonn</option>
      </select> 
      </div>
      <hr>
    </div>
  </div>
 </div>

  <button type="button" class="save provider-detail">Save</button>
</form>
 </div>


<!-- Service Provider Change Password tab -->

<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  
 <div class="mobile-menu">Change Password</div>

 <form class="password-top">

 <p class="error text-white text-center bg-danger px-2 py-2" style="display:none;"></p>
   <div class="form-group password">  
     <label class="lables">Old Password</label><br>
     <input type="text" class="form-control" id="currentpassword" placeholder="Current Password" name="oldpassword" required>
     <div class="current-password-msg"></div>
   </div>

   <div class="form-group password">  
     <label class="lables">New Password</label><br>
     <input type="text" class="form-control" id="password" placeholder="Password" name="password" required>
     <div class="password-msg"></div>
   </div>

   <div class="form-group password">  
     <label class="lables">Confirm Password</label><br>
     <input type="text" class="form-control" id="cpassword" placeholder="Confirm Password" name="confirmpassword" required>
     <div class="cpassword-msg"></div>
   </div>

   <button type="button" class="save changepassword" id="save">Save</button>
  </form>
</div>
</section>
</div>
</div>


<!-- Footer -->


<?php include('./Footer.php'); ?>


<script src="../assets/js/Signup.js"></script>
<script src="../assets/js/book.js"></script>


<script>
  
$(document).ready(function() {

   $('input').on('input', function(e) {
        if ($('.form-setting').find('.invalid-input').length > 0) {
            $('.provider-detail').attr('disabled', 'disabled');
            $('.provider-detail').css('cursor', 'not-allowed');
        } 
        else {
            $('.provider-detail').removeAttr('disabled');
            $('.provider-detail').css('cursor', 'pointer');
        }
   });


    $('#postalcode').on('input', function () {
       var postalcode = $(this).val();
    
    if (postalcode.length == 0) {
       $('.postalcode-message').addClass('error-message').text('Pincode is required');
       $(this).addClass('invalid-input').removeClass('valid-input');
    }
    else if (postalcode.length != 6) {
       $('.postalcode-message').addClass('error-message').text('Enter valid pincode');
       $(this).addClass('invalid-input').removeClass('valid-input');
    }
    else {
       $('.postalcode-message').empty();
       $(this).addClass('valid-input').removeClass('invalid-input');
    }
 });



$('.provider-detail').on('click', function(e) {

    e.preventDefault();
    if ($("#nationallity").val() == "" || $('input[name=Gender]:checked').length == 0 || $('.avatar-img').hasClass('active') == false  || $('#street').val() == "" || $("#houseno").val() == "" || $("#postalcode").val() == "") {
 
    if ($("#nationallity").val() == "") {
       $(".nationallity-message").addClass('error-message').text("Enter valid nationallity");
    }
 
    if ($("#nationallity").val() != "") {
       $(".nationallity-message").removeClass('error-message').text("");
    }
 
    if($(('input[name=Gender]:checked').length == 1)){
       $(".gender-message").removeClass('error-message').text("");
    }

    if ($('input[name=Gender]:checked').length == 0) {
        $(".gender-message").addClass('error-message').text("Gender is required");
    }
   
    if ($('.avatar-img').hasClass('active') == false) {
        $(".avtar-message").addClass('error-message').text("Profile image is required");
    }

    if ($('#street').val() == "") {
        $('.street-message').addClass('error-message').text("Street is required");
    }

    if ($("#houseno").val() == "") {
        $('.house-message').addClass('error-message').text("House Number is required");
    }

    if ($("#postalcode").val() == "") {
        $('.postalcode-message').addClass('error-message').text("Pincode is required");
    }

    } else {
        ServiceProviderDetails1();
    }
});


$('.changepassword').on('click', function(e) {

 if ($("#currentpassword").val() == "" ||  $('#password').val() == "" || $("#cpassword").val() == "") {

    if ($("#currentpassword").val() == "") {
        $(".current-password-msg").addClass('error-message').text("Password is required");
    }
    if ($("#password").val() == "") {
        $(".password-msg").addClass('error-message').text("Password is required");
    }
    if ($("#cpassword").val() == "") {
        $(".cpassword-msg").addClass('error-message').text("Confirm password is required");
    }
  }
  
  else{
       Changepassword();
      }
  })


      username = "<?php echo $_SESSION['username']; ?>";


       ServiceProviderDetails();

        function ServiceProviderDetails() {



           $.ajax({
                type: "POST",
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceProviderDetails",
                data: {
                    username: username,
                },
                dataType: "json",
                success: function(data) {

                    $('#firstname').val(data[0]);
                    $('#lastname').val(data[1]);
                    $('#emailaddress').val(data[2]);
                    $('#mobilenum').val(data[3]);
                    $('#birth').val(data[4]);
                    $('#month').val(data[5]);
                    $('#year').val(data[6]);
                    $('.changedimg').attr('src',data[9])
                    $("#nationallity").val(data[10]);
                    $("input[name=Gender]").val([data[11]]);
                    $("#street").val(data[12]);
                    $("#houseno").val(data[13]);
                    $("#postalcode").val(data[14]);
                    $("#location").html(data[15]);
                    $('.avtarimage').removeClass('active');
                    for(i=0;i<6;i++){
            if(document.querySelectorAll('.avtarimage')[i].src == data[9]) {
            document.querySelectorAll('.avtarimage')[i].setAttribute("class","active avtarimage ");
    
              } 
            } 

         }
    });
  } 


function ServiceProviderDetails1(){

  
           firstname = $('#firstname').val();
           lastname = $('#lastname').val();
            email = $('#emailaddress').val();
            mobile = $('#mobilenum').val();
            date = $('#birth').val();
            month = $('#month').val();
            year = $('#year').val();
            var street = $.trim($("#street").val());
            var houseno = $.trim($("#houseno").val());
            var pincode = $.trim($("#postalcode").val());
            var location = $.trim($("#location").val());
            img = $('.avtarimage .active').attr('src');
            img = img.slice(2)
            avtarimg = "http://localhost/Helperland/"+img;
            avtarimg = $('.avtarimage .active').attr('src');
            birthdate = year + "-" + month + "-" + date;
            gender = $('input[name=Gender]:checked').val();
            nationallity = $("#nationallity").val();
             pincode = $.trim($("#postalcode").val());
       
            $(".lastname").removeClass('valid-input');
            $(".firstName").removeClass('valid-input');
            $("#mobilenum").removeClass('valid-input');
            $("#street").removeClass('valid-input');
            $("#houseno").removeClass('valid-input');
            $("#postalcode").removeClass('valid-input');

        
            $.ajax({

                type: "POST",
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceProviderDetails1",
                data: {
                    'firstname': firstname,
                    'lastname': lastname,
                    'email': email,
                    'mobile': mobile,
                    'birthdate': birthdate,
                    'avtarimg': avtarimg,
                    'gender':gender,
                    'pincode':pincode,
                    'nationallity':nationallity,
                    "street": street,
                    "houseno": houseno,
                    "pincode": pincode,
                    "location": location,
                    "mobilenum":mobile,

                },

                dataType: "json",
                success: function(data) {

                    $('#iframeloading').hide();
                    if (data == 1) {
                        Swal.fire({
                            title: 'Your Details Has Been Updated Successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'Done'
                        })
                    }
                    if (data == 0) {
                        Swal.fire({
                            title: 'Your Details Not Updated',
                            text: 'Please Try Again',
                            icon: 'error',
                            confirmButtonText: 'Done'
                        })
                    }
                    ServiceProviderDetails();



                }
            });
        }


// Password

  function Changepassword(){
           
                currentpassword = $("#currentpassword").val();
                password = $("#password").val();
                cpassword = $("#cpassword").val();
                firstname = $("#firstname").val();
                lastname = $("#lastname").val();
                modifiedby = firstname + " " + lastname;
                                      

                $.ajax({
                    type: "POST",
                    url: "http://localhost/Helperland/?controller=Helperland&function=CustomerUpdatePassword",
                 

                    data: {
                        'username': username,
                        'currentpassword': currentpassword,
                        'password': password,
                        'cpassword': cpassword,
                        'modifiedby': modifiedby,
                    },
                 
                    success: function(data) {
                    
                        if (data == 1) {
                    
                            $("#password").val("");
                            $("#password").removeClass('valid-input');
                            $("#currentpassword").val("");
                            $("#cpassword").val("");
                            $("#cpassword").removeClass('valid-input');
                         

                             $('.error').text("Password is Updated Successfully.");
                            $('.error').show();
                            setTimeout(function() {
                                $(".error").hide();
                            }, 5000);
                        }
                        if (data == 0) {
                        
                            $('.error').text("Old Password is Invalid");
                            $('.error').show();
                            setTimeout(function() {
                                $(".error").hide();
                            }, 5000);
                        }
                        if (data == 2) {
                          
                            $('.error').text("Password Not Updated");
                            $('.error').show();
                            setTimeout(function() {
                                $(".error").hide();
                            }, 5000);
                        }
                    }
                });

            
      }


})


$(document).ready(function () {

    $('.avatar-img').on('click', function () {
        src = $(this).attr('src');
        $('.changedimg').attr('src', src);
        $('.avtarimage .avatar-img').removeClass('active');
        $(this).addClass('active');

    });
    });

</script>

</body>
</html>