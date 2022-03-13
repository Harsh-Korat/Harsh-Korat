<?php include('./header.php'); ?>
   
      <title>My Rating</title>
      <link rel="stylesheet" href="../assets/css/providerrating.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
  
/* schedule modal */

#service_details{
color: #646464;
font-family: Roboto;
margin-left: 12px;
color: #646464;
font-size: 24px;
}

#cancel-border{
border-bottom: none;
}

#schedule-modal .close{
font-size: 40px;
}

#cancel{
padding-top: 5px;
}

.service-warning{
font-size: 25px;
font-family: Roboto;
color: #646464;
font-weight: bold;
}

.service-duration{
margin-top: 5px;
font-size: 19px;
font-family: Roboto;
color: #646464;
font-weight: bold;
}

.duration{
font-weight: normal;
margin-left: 5px;
}

.amount{
margin-left: 30px;
font-size: 25px;
color: #1D7A8C;
}

#duration{
margin-left: 10px;
margin-top: 5px;
font-size: 18px;
font-family: Roboto;
color: #646464;
}

.duration i{
font-size: 25px;
color: red;
}

td:hover, .card p:hover, .card h4:hover{
cursor:pointer; 
}
.pay {
height: 17px;
font-family: Roboto;
line-height: 1;
color: #1D7A8C !important;
}
.cardbold{
margin-bottom: 30px;
margin-left: 0px !important;
}
.pay1 {
font-size: 24px;
}

.pay2 {
font-size: 24px;
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
    <a class="list-group-item" href="#">Dashboard</a>
    <a class="list-group-item" href="./NewService.php">New Service Requests</a>
    <a class="list-group-item" href="./Upcoming.php">Upcoming Services</a>
    <a class="list-group-item" href="#">Service Schedule</a>
    <a class="list-group-item" href="./ServiceProviderHistory.php">Service History</a>
    <a class="list-group-item active" href="./ProviderRating.php">My Ratings</a>
    <a class="list-group-item" href="./BlockCustomer.php">Block Customer</a>
    <a class="list-group-item" href="#">Invoices</a>
    <a class="list-group-item" href="#">Notifications</a>
  </ul>

</div>

   
<!-- Middle Table Section -->

  <section id="middle-table">
    <table class="table">
 

<tbody id="service_history_address">
</tbody>
</table>
</section>

 </div>
</div>

<!-- Cards Section -->

<div id="service_history_address_Modal">

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
              <div id="service_history_modal_address">


              </div>
          
            <hr>
            
            <div class="service-duration">Comments</div>
            <div class="duration"><span><i class="fa-solid fa-circle-xmark"></i></span><span id="duration">I do not have pets at home</span></div>

              <hr>

         </form>
        </div> 
       </div>
      </div>
     </div>
    </div>



<!-- Footer Section -->

<?php include('./Footer.php'); ?>
<?php include('./new-service-ajax.php'); ?>





</body>
</html>