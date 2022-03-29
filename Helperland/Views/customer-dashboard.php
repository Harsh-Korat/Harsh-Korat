<?php include('./header.php'); ?>
   
      <title>Dashboard</title>
      <link rel="stylesheet" href="../assets/css/dashboard-customers.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
      
<style>

.date1 input[type=text]{
font-family: Roboto;
margin-top: 10px;
width: 230px;  
position: relative; 
padding-left: 42px;
font-size: 16px;
height: 46px;
color: #646464;
border: 1px solid #e1e1e1;
border-radius: 4px;
}

.date1 img{
position: absolute; 
margin-top: 22px; 
margin-left: 10px;
}

.book-flex{
display: flex;
}
  
#dash_time{
margin-bottom: 10px;
margin-left: 10px;
width:200px;
font-family: Roboto;
font-size: 18px;
height: 46px;
padding-left: 10px;
color: #646464;
margin-right: 10px;
border: 1px solid #e1e1e1;
border-radius: 4px;
}

@media screen and (max-width: 767px) {
.date1 input[type=text]{
width: 100%;
}
#dash_time{
margin-left: 0px;
width: 96.5%;
}
}

</style>

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
    <a class="list-group-item" href="./Favourite-Pros.php">Favourite Pros</a>
    <a class="list-group-item" href="#">Invoices</a>
    <a class="list-group-item" href="#">My Ratings</a>
    <a class="list-group-item" href="#">Notifications</a>
  </ul>

</div>

   
<!-- Middle Table Section -->

  <section id="middle-table">
    <table class="table" id="example" style="border: 1px solid #e1e1e1;">
      <thead>
	
	<tr>
	<th class="Service_Id">Service ID</th>
	<th class="Service_Date">Service date</th>
	<th class="Service_Provider">Service Provider</th>
	<th class="text-center Service_Payment">Payment</th>
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


<div id="mobile_add">

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


    <div class="row">
     <div class="col-md-6">
      
         <div class="date1 book-flex">   
           <input type="text" id="dash_date" name="calander" placeholder="DD/MM/YYYY" maxlength="10">            
           <img src="../assets/image/admin-calendar-blue.png">                                  
         </div>
         <div class="dash_date mt-2"></div>
      </div>

      <div class="col-md-6">
      
        <div class="date_menu">
         <input type="text" id="dash_time" name="calander" placeholder="Time" maxlength="8">
         <span class="dash_time-message text-danger mt-1"></span> 
        </div> 
        <div class="dash_time"></div>
       </div>
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
   <div class="modal-dialog modal-dialog-centered modal-lg">
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

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<?php include('./dashboard-ajax.php'); ?>


</body>
</html>