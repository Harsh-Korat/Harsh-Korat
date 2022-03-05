<?php include('./header.php'); ?>
 
   
      <title>My Account</title>
      <link rel="stylesheet" href="../assets/css/settings.css">
      <link rel="stylesheet" href="../assets/css/validation.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

<header>
  
<?php include('./nav.php'); ?>

</header>


<!-- Customer Name -->

<div class="welcome">
   <p>Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
</div>

 <div class="hr"></div>


<!-- Vertical Navbar -->

  <div class="middle-table">
    <div class="middle">

  <div class="vertical-nav">

    <ul class="list-group">
    <a class="list-group-item" href="./customer-setting.php">Dashboard</a>
    <a class="list-group-item" href="#">Service History</a>
    <a class="list-group-item" href="#">Service Schedule</a>
    <a class="list-group-item" href="#">Favourite Pros</a>
    <a class="list-group-item" href="#">Invoices</a>
    <a class="list-group-item" href="#">Notifications</a>
  </ul>

</div>


<!-- Middle Customer Details Table -->


<section class="setting-main">

<div class="setting">

  <ul class="nav nav-tabs middle-navbar" id="myTab" role="tablist"> 
    <li class="nav-item user-setting">
      <a class="nav-link active"  id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><span class="dis-non">My Details</span><span class="icon"><i class="fa-solid fa-receipt"></i></span></a>
    </li>
    <li class="nav-item user-setting">
      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><span class="dis-non">My Addresses</span><span class="icon"><i class="fa-solid fa-location-dot"></i></span></a>
    </li>
    <li class="nav-item user-setting1">
      <a class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><span class="dis-non">Change Password</span><span class="icon"><i class="fa-solid fa-key"></i></span></a>
    </li>

    <li class="nav-item user-setting1">
      <a class="nav-link" id="manage-tab" data-bs-toggle="tab" data-bs-target="#manage" type="button" role="tab" aria-controls="manage" aria-selected="false"><span class="dis-non">Manage Newsletters</span> <span class="icon"><i class="fa-solid fa-bell"></i></span></a>
    </li>
  </ul>

</div>


<!-- Customer My Details tab -->


<div class="tab-content" id="myTabContent">

 <div class="tab-pane fade show active home" id="home" role="tabpanel" aria-labelledby="home-tab">
 
 <div class="mobile-menu">My Details</div>

 <form method="POST" class="address-top">
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
 

  <div class="col-md-5 bottom-hr">
    <div class="address">  
     <label class="lables">Date of Birth</label><br>

 <div class="select_menu">
    <select  name="date" id="birth">
        <option value='0'>Birth</option>
        <option value='1'>01</option>
        <option value='2'>02</option>
        <option value='3'>03</option>
        <option value='4'>04</option>
        <option value='5'>05</option>
        <option value='6'>06</option>
        <option value='7'>07</option>
   </select>
   
   <select name="month" id="month">
        <option value='0'>Month</option>
        <option value='1'>January</option>
        <option value='2'>February</option>
        <option value='3'>March</option>
        <option value='4'>April</option>
        <option value='5'>May</option>
        <option value='6'>June</option>
        <option value='7'>July</option>
   </select>

   <select name="year" id="year">
        <option value='0'>Year</option>
        <option value='1'>2001</option>
        <option value='2'>2002</option>
        <option value='3'>2003</option>
        <option value='4'>2004</option>
        <option value='5'>2005</option>
        <option value='6'>2006</option>
        <option value='7'>2007</option>
   </select>
  </div>
 </div>
</div>
</div>

<hr>

   <label class="lables">My Preferred Language</label><br>
     <div class="select_menu">
  
   <select name="year" id="language">
        <option value='0'>Language</option>
        <option value='1'>English</option>
        <option value='2'>Hindi</option>
        <option value='3'>Gujarati</option>

   </select>
  <br>

  <button type="button" class="save customer-detail">Save</button>
 </div>
</form>
</div>


<!-- Customer My Address tab -->  

<div class="tab-pane fade profit" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  
  <div class="mobile-menu">My Addresses</div>
    
    <table class="table  addresstable" id="addresstable" style="overflow: scroll;">
      <thead>
        <tr class="middle-part">
          <th scope="col" class="text-center">Invoicing</th>
          <th scope="col">Addresses</th>
          <th scope="col" class="text-center">Action</th>
        </tr>
      </thead>
      <tbody id="your_address">
      </tbody>
    </table>

  <button type="button" class="new_address" data-toggle="modal" data-target="#address-modal">Add New Address</button>
</div>


<!-- Customer Change Password tab -->

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


<!-- Customer Manage Newsletter tab -->

<div class="tab-pane fade" id="manage" role="tabpanel" aria-labelledby="manage-tab" style="margin-bottom: 300px;">

 <div class="mobile-menu">Manage Newsletters</div>

 <div class="book-flex2">
   <input type="checkbox" id="pets"><p class="pet">Yes, I would like to subscribe to the Helperland GmbH newsletter with vouchers, trends, promotions and individualized offers. I can unsubscribe from the newsletter at any time in the newsletter and in my customer account. If you no longer wish to receive our newsletter, remove the tick.</p>
 </div>
</div>

</div>
</section>
</div>
</div>


<!-- Address Modal -->

<div class="modal fade" id="address-modal">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header" id="cancel-border">
          <h4 class="modal-title" id="warning"><b>Edit Address</b></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
<div class="modal-body" id="cancel">
 <div class="container">

  <form method="POST">
   <div id="bottom-address">
  
     <div class="row">
      <div class="form-group col-md-6 mt-1">
        <label class="street">Street name</label>
        <input type="text" class="form-control" id="street" placeholder="Street name" required>
        <span class="street-message text-danger mt-1"></span>
      </div>
 
      <div class="form-group col-md-6 mt-1">
        <label class="street">House number</label>
        <input type="number" class="form-control" id="houseno" placeholder="House number" required>
        <span class="house-message text-danger mt-1"></span>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md-6 mt-1">
        <label class="street">Pincode</label>
        <input type="number" class="form-control street" id="pincode" placeholder="Pincode" maxlength="5" maxlength="6" value="101010" disabled>
      </div>
   
    <div class="form-group col-md-6 mt-1">
      <label class="street">City</label>
      <select class="form-control street" id="location" required>
        <option>Bonn</option>
      </select>
     </div>
    </div>

    <div class="row">
      <div class="form-group col-md-6 mt-1">
        <label class="street">Phone Number</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text street">+49</div>
            </div>
            <input type="tel" class="form-control" id="mobile" placeholder="Mobile number" maxlength="10" size="10" required>
          </div>
        </div>
        <span class="mobile-message text-danger"></span>
       </div>
     </div> 

     <div class="form-group mt-3">
       <button type="submit" class="btn btn-login form-control edit-address">Edit</button>
     </div>
    </form>
   </div> 
  </div>
 </div>
</div>
</div>



<!-- Edit Modals -->

<div class="modal fade" id="address1-modal">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header" id="cancel-border">
          <h4 class="modal-title" id="warning"><b>Edit Address</b></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
<div class="modal-body" id="cancel">
 <div class="container">

  <form method="POST" id="your_add">
  

    </form>
      <div class="form-group mt-3">
        <button type="submit" class="btn btn-login form-control edit-address1">Edit</button>
    </div>
   </div> 
  </div>
 </div>
</div>
</div>


<!-- Delete modals -->

<div class="modal fade" id="delete-modal">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" id="cancel-border">
          <h4 class="modal-title" id="warning"><b>Delete Address</b></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
       <div class="modal-body" id="cancel">
          <div class="container">
            <form method="POST">
              <div class="booking-warning">Are you sure you want to delete this address?
              </div>

           <div class="form-group mt-4">
              <button type="submit" class="btn btn-login form-control delete_two">Delete</button>
           </div>
         </form>
        </div> 
       </div>
      </div>
     </div>
    </div>



<!-- Footer -->


<?php include('./Footer.php'); ?>

<?php include('./customer-ajax.php'); ?>

<script src="../assets/js/Signup.js"></script>
<script src="../assets/js/book.js"></script>



</body>
</html>