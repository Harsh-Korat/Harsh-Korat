<!DOCTYPE html>
<html lang="en">
<head>
   
      <title>Service request</title>
      <link rel="stylesheet" href="../assets/css/admin-servicerequests4.css">
      <meta charset="utf-8">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<?php session_start(); ?>

<style>
  
.cancel1{
color: #FFFFFF;
background: #FF6B6B;
width:auto;
padding:4px 8px 3px 8px; 
height:auto; 
font-size: 13px;
border: none;
}

.cancel1:hover{
color: #FFFFFF;
}
  
</style>

</head>

<body style="background-color: #f2f4f5;">


<!-- Header Navbar -->

<div class="header-nav">
 <nav class="navbar sticky-top navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#"><span class="logo">helperland</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  w-100 justify-content-end">
                    <li class="nav-item  booknow">
                        <a class="nav-link" href="#"><img src="../assets/image/admin-user.png"></a>
                    </li>
                 
                    <li class="nav-item  login">
                        <a class="nav-link log-in" href="#"><?php echo $_SESSION['name']; ?></a>
                    </li>
                    <li class="nav-item  helper">
                        <a class="nav-link logout" href="#"><img src="../assets/image/logout.png"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   </div>


<!-- Mobile Navbar -->


<div class="mobile-nav">

<nav class="navbar sticky-top navbar-expand-lg ">
   <div class="container">
     <a class="navbar-brand" href="#"><span class="logo">helperland</span></a>
     <button class="btn bttn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"> <i class="fas fa-bars"></i></button>

 <div class="offcanvas offcanvas-end" id="demo" style="width:265px;">
  <div class="offcanvas-header">
    
    <h1 class="offcanvas-title">Welcome to<br><b>Service Requests</b></h1>
    
  </div>
   
   <div class="hrr"><hr></div>

   <div class="offcanvas-body">
   <div class="dash">
   
    <a href="#">Service Management</a>
    <a href="#">Role Management</a>
    <a href="#">Coupon Code Management </a>
    <a href="#">Escalation Management</a>
    <a class="activ" href="./Admin-ServiceRequests.php" style="color: #146371 !important;">Service Requests</a>
    <a href="#">Service Providers</a></li>
    <a href="./Usermanagement.php">User Management</a>
    <a href="#">Finance Module</a>
    <a href="#">Zip Code Management</a>
    <a href="#">Rating Management</a>
    <a href="#">Inquiry Management</a>
    <a href="#">Newsletter Management</a>
    <a href="#">Content Management</a>
    <a href="#">My Settings</a>
    <a href="#" class="logout">Logout</a>
    <div class="hrr"><hr></div>

    <div class="face">
    <a href="#" class="btn"><img src="../assets/image/ic-facebook.png" alt=""></a>
    <a href="#" class="btn"><img src="../assets/image/ic-instagram.png" alt=""></a>
   </div>
  </div>
 </div>
</div>
</div>
</nav>
</div>
 

<div class="service1">Service Requests</div>
  <div class="user-mangement-form1">
   <form style="display: inline-block;">
     <input class="sid" type="text" id="sid1" name="sid" placeholder="Service ID">
     <input class="zip" type="text" id="zip1" name="zipcode" placeholder="Postal Code" maxlength="6">
     <input class="customer" type="text" id="customer1" name="zipcode" placeholder="Select Customer">
     
      <select name="Customer" class="status" id="status1">
       <option value="">Select Status</option>
       <option value="0">New</option>
       <option value="1">Pendding</option>
       <option value="2">Completed</option>
       <option value="3">Cancelled</option>
       <option value="4">Refunded</option>
      </select>

      <input type="checkbox" name="check">
      <label>Has Issue</label>
    
   <span class="fromdate">
    <img src="../assets/image/admin-calendar-blue.png"><input type="text" name="from" placeholder="From Date" id="from_date1" maxlength="10"> 
   </span>
   
   <span class="fromdate">
   <img src="../assets/image/admin-calendar-blue.png"><input type="text" name="from" placeholder="To Date" id="to_date1" maxlength="10"> 
   </span>
   
    <button type="button" class="search1">Search</button>
    <button type="button" class="clear1">Clear</button>

   </form> 
</div>


<!-- Middle Nav -->

<div class="middle-table">
 <div class="middle">

 <div class="vertical-nav">

  <ul class="list-group">
    <li class="list-group-item">Service Management</li>
    <li class="list-group-item">Role Management</li>
    <li class="list-group-item">
    <div class="dropdown" id="dropdown">
    <button class="btn" type="button" data-toggle="dropdown">
       Coupon Code Management <i class="fas fa-chevron-right"></i>
    </button>
    <div class="dropdown-menu" id="nav-menu">
          <a class="dropdown-item" href="#">Coupon Codes</a>    
          <a class="dropdown-item" href="#">Usage History</a>   
        </div>
       </div>
    </li>       
    <li class="list-group-item">Escalation Management</li>
    <li class="list-group-item activ"><a href="./Admin-ServiceRequests.php" id="usera">Service Requests</a></li>
    <li class="list-group-item">Service Providers</li>
    <li class="list-group-item"><a href="./Usermanagement.php" id="requests">User Management</a></li>
    <li class="list-group-item"> 
    <div class="dropdown" id="dropdown">
    <button class="btn" type="button" data-toggle="dropdown">
       Finance Module<i class="fas fa-chevron-right"></i>
    </button>
    <div class="dropdown-menu" id="nav-menu">
          <a class="dropdown-item" href="#">All Transactions</a>    
          <a class="dropdown-item" href="#">Generate Payment</a>   
          <a class="dropdown-item" href="#">Customer Invoices</a>  
        </div>
       </div>
    </li>
    <li class="list-group-item">Zip Code Management</li> 
    <li class="list-group-item">Rating Management</li>
    <li class="list-group-item">Inquiry Management</li>
    <li class="list-group-item">Newsletter Management</li>
    <li class="list-group-item">
    <div class="dropdown" id="dropdown">
    <button class="btn" type="button" data-toggle="dropdown">
       Content Management <i class="fas fa-chevron-right"></i>
    </button>
    <div class="dropdown-menu" id="nav-menu">
          <a class="dropdown-item" href="#">Blog</a> 
          <a class="dropdown-item" href="#">FAQs</a>     
        </div>
       </div>
    </li>
  </ul>
</div>


<!-- Service section -->


<section class="scroll">

<div class="service">Service Requests</div>
  <div class="user-mangement-form">
   <form style="display: inline-block;">
     <input class="sid" type="text" id="sid" name="sid" placeholder="Service ID">
     <input class="zip" type="text" id="zip" name="zipcode" placeholder="Postal Code" maxlength="6">     
     <input class="customer" type="text" id="customer" name="zipcode" placeholder="Select Customer">

      <select name="Customer" class="status" id="status">
       <option value="">Select Status</option>
       <option value="0">New</option>
       <option value="1">Pendding</option>
       <option value="2">Completed</option>
       <option value="3">Cancelled</option>
       <option value="4">Refunded</option>
      </select>

      <input type="checkbox" name="check">
      <label>Has Issue</label>
    
   <span class="fromdate">
    <img src="../assets/image/admin-calendar-blue.png"><input type="text" name="from" placeholder="From Date" id="from_date" maxlength="10"> 
   </span>
   
   <span class="fromdate">
   <img src="../assets/image/admin-calendar-blue.png"><input type="text" name="from" placeholder="To Date" id="to_date" maxlength="10"> 
   </span>

    <button type="button" class="search">Search</button>
    <button type="button" class="clear">Clear</button>

   </form> 
</div>



<!-- Middle Table Section -->


<div id="middle-table">

<table class="table" id="example" style="padding-top: 10px;"> 
      <thead>

    <tr>
      <th>Service ID</th>
      <th>Service date</th>
      <th>Customer details </th>
      <th class="text-center">Service provider </th>
      <th class="text-center">Gross Amount </th>
      <th class="text-center">Net Amount </th>
      <th>Discount </th>
      <th>Status </th>
      <th class="text-center">Payment Status </th>
      <th>Actions</th>
    </tr>

</thead>
 
<tbody id="Admin_address">

</tbody>
</table>

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
     <div class="col-md-6 mb-1">
       <label class="street">Date</label>
         <div class="date1 book-flex">   
           <input type="text" id="plan-date" name="calander" placeholder="DD/MM/YYYY" maxlength="10" style="width: 100%;">            
           <img src="../assets/image/admin-calendar-blue.png">                                  
         </div>
         <div class="plan-date-message text-danger mt-2"></div>
      </div>

      <div class="col-md-6 mb-1">
       <label class="street" id="method">Time</label>
        <div class="date_menu">
         <input type="text" id="dash_time" name="calander" placeholder="Time" maxlength="8" style="width: 100%;">
         <span class="dash_time-message text-danger mt-1"></span> 
         </select>
        </div> 
       </div>
     </div>

    <div class="street" id="invoice"><b>Service Address</b></div>
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
        <input type="number" class="form-control street" id="pincode" placeholder="Pincode" maxlength="5" maxlength="6">
        <span class="pincode-message text-danger mt-1"></span>
      </div>
   
    <div class="form-group col-md-6 mt-1">
      <label class="street">City</label>
      <select class="form-control street" id="location" required>
        <option>Bonn</option>
      </select>
     </div>
    </div>

    <div class="street" id="invoice"><b>Invoice Address</b></div>
     <div class="row">
      <div class="form-group col-md-6 mt-1">
        <label class="street">Street name</label>
        <input type="text" class="form-control" id="invoicestreet" placeholder="Street name" required>
        <span class="street-messages text-danger mt-1"></span>
      </div>
 
      <div class="form-group col-md-6 mt-1">
        <label class="street">House number</label>
        <input type="number" class="form-control" id="invoiceshouseno" placeholder="House number" required>
        <span class="house-messages text-danger mt-1"></span>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md-6 mt-1">
        <label class="street">Pincode</label>
        <input type="number" class="form-control street" id="invoicespincode" placeholder="Pincode" maxlength="5" maxlength="6">
        <span class="pincode-messages text-danger mt-1"></span>
      </div>
   
    <div class="form-group col-md-6 mt-1">
      <label class="street">City</label>
      <select class="form-control street" id="invoiceslocation" required>
        <option>Bonn</option>
      </select>
     </div>
    </div>

    <div class="booking-warning"><b>Why you want to reschedule service request?</b>
      <textarea class="text-area" id="area" placeholder="Why you want to reschedule service request?" required></textarea>
      <div class="first-name-msg mb-2"></div>
    </div> 

    <div class="booking-warning"><b>Call Center EMP Notes</b>
      <textarea class="text-area area1" id="area" placeholder="Enter Notes" required></textarea>
      <div class="first-name-msg mb-2"></div>
    </div> 

     <div class="form-group mt-3">
       <button type="submit" class="btn btn-login form-control edit-address">Update</button>
     </div>
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
              <div class="booking-warning">Are you sure you want to delete this Service Request?
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


<!-- Refund Modal -->

<div class="modal fade" id="refund-modal">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header" id="cancel-border">
          <h4 class="modal-title" id="warning"><b>Refund Amount</b></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
<div class="modal-body" id="cancel">
 <div class="container">

  <form method="POST">
   <div id="bottom-address">

    <div id="refunded_address">

    </div>

     <div class="row">
      <div class="form-group col-md-6">
        <label class="street">Amount</label>
        <div class="refunded">
        <input type="text" class="form-control" id="amount">
        <select name="amount" class="form-control" id="amount_select">   
         <option value="0">Percentage</option>
         <option value="1">Fixed</option>
        </select>
        </div>
        <div class="amount-msg mt-1"></div>
      </div>
 
      <div class="form-group col-md-6">
        <label class="street">Calculate</label>
        <div class="refunded">
         <button type="submit" class="form-control calculate" style="background-color: #eee; width: 50%;">Calculate</button>
         <input type="text" class="form-control" id="calculate_amount">
      </div>
    </div>
    </div>


    <div class="booking-warning"><b>Why you want to refund amount?</b>
      <textarea class="text-area" id="rufund_comment" placeholder="Why you want to refund amount?" required></textarea>
      <div class="rufund_comment-message"></div>
    </div> 

    <div class="booking-warning"><b>Call Center EMP Notes</b>
      <textarea class="text-area area1" id="rufund_emp" placeholder="Enter Notes" required></textarea>
      <div class="rufund_emp-message"></div>
    </div> 

     <div class="form-group mt-3">
       <button type="submit" class="btn btn-login form-control refund">Refund</button>
     </div>
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

<!-- Boostrap -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.10/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


<?php include('./Admin-ajax.php'); ?>

</body>
</html>


