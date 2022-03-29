<!DOCTYPE html>
<html lang="en">
<head>
   
      <title>User management</title>
      <link rel="stylesheet" href="../assets/css/usermanagementss.css">
      <meta charset="utf-8">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
      

<?php session_start(); ?>

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
    
    <h1 class="offcanvas-title">Welcome,<br><b>User Management</b></h1>
    
  </div>
   
   <div class="hrr"><hr></div>

   <div class="offcanvas-body">
   <div class="dash">
   
    <a href="#">Service Management</a>
    <a href="#">Role Management</a>
    <a href="#">Coupon Code Management </a>
    <a href="#">Escalation Management</a>
    <a href="./Admin-ServiceRequests.php">Service Requests</a>
    <a href="#">Service Providers</a></li>
    <a class="activ" href="./Usermanagement.php" style="color: #146371 !important;">User Management</a>
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



 <div class="user-non1">
 <p class="user">User Management</p>
 <button type="button" class="btn ac"><i class="fas fa-plus-circle icon"></i>Add New User</button>

  <div class="user-mangement-form">
    <form style="display: inline-block;">
   
   <input class="select" type="text" id="select1" name="zipcode" placeholder="User name">
   
   <select name="uname" class="select" id="user_type1">
   <option value=" ">User Type</option>
   <option value="0">Customer</option>
   <option value="1">Service Provider</option>
  </select>

   <span class="fromdate">
    <img src="../assets/image/admin-calendar-blue.png"><input type="text" name="from" placeholder="From Date" id="from_date1" maxlength="10"> 
   </span>
   
   <span class="fromdate">
   <img src="../assets/image/admin-calendar-blue.png"><input type="text" name="from" placeholder="To Date" id="to_date1" maxlength="10"> 
   </span>
    
    <button type="button" class="btn search1">Search</button>
    <button type="button" class="btn clear1">Clear</button>

</form>
</div>
</div> 


<!-- Middle Nav -->

<div class="middle-table">
    <div class="middle">

<div class="vertical-nav">

  <ul class="list-group">
    <li class="list-group-item">Service Management</li>
    <li class="list-group-item">Role Management</li>
    <li class="list-group-item">Coupon Code Management <i class="fas fa-chevron-right"></i></li>       
    <li class="list-group-item">Escalation Management</li>
    <li class="list-group-item"><a href="./Admin-ServiceRequests.php" id="requests">Service Requests</a></li>
    <li class="list-group-item">Service Providers</li>
    <li class="list-group-item activ"><a href="./Usermanagement.php" id="usera">User Management</a></li>
    <li class="list-group-item">Finance Module <i class="fas fa-chevron-right"></i></li>
    <li class="list-group-item">Zip Code Management</li> 
    <li class="list-group-item">Rating Management</li>
    <li class="list-group-item">Inquiry Management</li>
    <li class="list-group-item">Newsletter Management</li>
    <li class="list-group-item">Content Management <i class="fas fa-chevron-right"></i></li>
 
  </ul>


</div>

<!-- Middle Table -->

<div class="bg-color">

<div class="user-none">
 <p class="user">User Management</p>
 <button type="button" class="btn ac"><i class="fas fa-plus-circle icon"></i>Add New User</button>

  <div class="user-mangement-form">
    <form style="display: inline-block;">

   <input class="select" type="text" id="select" name="zipcode" placeholder="User name">
   
   <select name="uname" class="select" id="user_type">
   <option value=" ">User Type</option>
   <option value="0">Customer</option>
   <option value="1">Service Provider</option>
  </select>

   <span class="fromdate">
    <img src="../assets/image/admin-calendar-blue.png"><input type="text" name="from" placeholder="From Date" id="from_date" maxlength="10"> 
   </span>
   
   <span class="fromdate">
   <img src="../assets/image/admin-calendar-blue.png"><input type="text" name="from" placeholder="To Date" id="to_date" maxlength="10"> 
   </span>
    
    <button type="button" class="btn search">Search</button>
    <button type="button" class="btn clear">Clear</button>

</form>
</div>
</div>


 <section id="middle-table">

  <div class="bg-color1">



<!-- Middle table -->

    <table class="table" id="example" style="background: white !important;">
      <thead>

    <tr>
      <th>User Name</th>
      <th>Role</th>
      <th>Date of Registration</th>
      <th>User Type</th>
      <th>Phone</th>
      <th>Postal Code</th>
      <th>Status</th>
      <th class="text-center">Action</th>
    </tr>

</thead>
 
<tbody id="your_address">

                              
</tbody>
</table>


</div>
</section>
</div>
</div>
</div>

<!-- Boostrap -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.10/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<?php include('./Usermanagement-ajax.php'); ?>

</body>
</html>