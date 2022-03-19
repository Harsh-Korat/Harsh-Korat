<?php include('./header.php'); ?>
   
      <title>Dashboard</title>
      <link rel="stylesheet" href="../assets/css/dashboard-customer.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>


<header>
  
<?php include('./nav.php'); ?>

</header>



<div class="welcome">
   <p>Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
</div>

 <div class="hr"></div>


<!-- Middle Nav Section -->

  <div class="middle-table">
    <div class="middle">

  <div class="vertical-nav">

    <ul class="list-group">
    <a class="list-group-item active" href="./customer-dashboard.php">Dashboard</a>
    <a class="list-group-item" href="./service-history.php">Service History</a>
    <a class="list-group-item" href="#">Service Schedule</a>
    <a class="list-group-item" href="#">Favourite Pros</a>
    <a class="list-group-item" href="#">Invoices</a>
    <a class="list-group-item" href="#">My Ratings</a>
    <a class="list-group-item" href="#">Notifications</a>
  </ul>

</div>

   
<!-- Middle Table Section -->

  <section id="middle-table">
    <table class="table" style="border: 1px solid #e1e1e1;">
      <thead>
	
	<tr>
	<th>Service ID</th>
	<th>Service date</th>
	<th>Service Provider</th>
	<th class="text-center">Payment</th>
	<th class="text-center">Actions</th>
	</tr>
</thead>


<tbody id="your_address">

  </tbody>
 </table>
</section>

 </div>
</div>


<!-- Cards Section -->

<div class="cards">
 <div class="card">
   <div class="card-body">
    <div id="mobile_add">
    </div>

   </div>
  </div>
</div>


<!-- Cancel Modal -->

<div class="modal fade" id="cancel-modal">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" id="cancel-border">
          <h4 class="modal-title" id="warning"><b>Cancel Service Request</b></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
       <div class="modal-body" id="cancel">
          <div class="container">
            <form method="POST">
              <div class="booking-warning">Why you want to cancel the service request?
              <textarea class="text-area" id="area" required></textarea>
              <div class="first-name-msg mb-2"></div>
              </div>

           <div class="form-group mt-3">
              <button type="submit" class="btn btn-login form-control cancel_two">Cancel Now</button>
           </div>
         </form>
        </div> 
       </div>
      </div>
     </div>
    </div>


<!-- Date Modal -->

<div class="modal fade" id="date-modal">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" id="cancel-border">
          <h4 class="modal-title" id="warning"><b>Reschedule Service Request</b></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
       <div class="modal-body" id="cancel">
          <div class="container">
            <form method="POST">
              <div class="booking-warning">Select New Date & Time

     <div class="date_menu">
        <div class="date1 book-flex">
          
          <input type="text" id="dash_date" name="calander" placeholder="DD/MM/YYYY" maxlength="10" required>            
          <img src="../assets/image/admin-calendar-blue.png">                                  
        </div>


    <select  name="time" id="dash_time">
            <option value='dash_time'> </option>
            <option value='8'>8:00 </option>
            <option value='9'>9:00 </option>
            <option value='10'>10:00</option>
            <option value='11'>11:00</option>
            <option value='12'>12:00</option>
            <option value='13'>13:00</option>
            <option value='14'>14:00</option>
            <option value='15'>15:00</option>
            <option value='16'>16:00</option>
            <option value='17'>17:00</option>
            <option value='18'>18:00</option>
   </select>
   

 </div>

              </div>

           <div class="form-group mt-3">
              <button type="submit" class="btn btn-login form-control update">Update</button>
           </div>
         </form>
        </div> 
       </div>
      </div>
     </div>
    </div>


<!-- Schedule modal -->

<div class="modal fade" id="schedule-modal">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" id="cancel-border">
          <h4 class="modal-title" id="service_details"><b>Service Details</b></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
       <div class="modal-body" id="cancel">
          <div class="container">
            <form method="POST">
              <div id="modal_address">


              </div>
          
            <hr>
            
            <div class="service-duration">Comments</div>
            <div class="duration"><span><i class="fa-solid fa-circle-xmark"></i></span><span id="duration">I do not have pets at home</span></div>

              <hr>


           <div class="form-group mt-3 book-flex">
              <button type="submit" class="btn btn-login1 form-control" data-toggle="modal" data-target="#date-modal" data-dismiss="modal"><i class="fa-solid fa-clock-rotate-left"></i>Reshedule</button>
              <button type="submit" class="btn btn-login1 form-control" id="login-1" data-toggle="modal" data-target="#cancel-modal" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>Cancel</button>
           </div>
         </form>
        </div> 
       </div>
      </div>
     </div>
    </div>


<!-- Spinner -->

 <div class="parent-spinner">
   <div class="spinner"></div>
 </div>


<!-- Footer Section -->

<?php include('./Footer.php'); ?>

<?php include('./dashboard-ajax.php'); ?>


</body>
</html>