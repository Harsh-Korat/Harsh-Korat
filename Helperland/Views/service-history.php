
<?php include('./header.php'); ?>
   
      <title>Service History</title>
      <link rel="stylesheet" href="../assets/css/history-services.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

</head>

<body>
<header>
  
<?php include('./nav.php'); ?>

</header>


<div class="welcome">
   <p>Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
</div>

<div class="hr"></div>


<!-- Verical Navbar -->

 <div class="middle-table">
    <div class="middle">

  <div class="vertical-nav">

    <ul class="list-group">
    <a class="list-group-item" href="customer-dashboard.php">Dashboard</a>
    <a class="list-group-item active" href="./service-history.php">Service History</a>
    <a class="list-group-item" href="#">Service Schedule</a>
    <a class="list-group-item" href="./Favourite-Pros.php">Favourite Pros</a>
    <a class="list-group-item" href="#">My Ratings</a>
    <a class="list-group-item" href="#">Invoices</a>
    <a class="list-group-item" href="#">Notifications</a>
    </ul>

</div>


<!-- Vertical Table -->

 <section id="middle-table">
<div class="flex">
<div class="service-history"><b>Service History</b></div>


</div>
    <table class="table" id="example">
      <thead>

    <tr>
      <th>Service ID</th>
      <th>Service Details</th>
      <th>Service Provider</th>
      <th class="center">Payment</th>
      <th class="center">Status</th>
      <th class="center">Rate SP</th>
    </tr>

</thead>
 
<tbody id="your_address">


</tbody>
</table>
</section>

</div>
</div>


<!-- Card -->

<div class="card1">
<div class="historys"><b>Service History</b></div>

     <div id="mobile_add">
       
     </div>
    

</div>

<!-- rate modal -->

<div class="modal fade" id="rate-modal">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" id="cancel-border">
         <div class="modal-title" id="rate_modal_address">

         
         <div id="warning"><b>Rate your service provider</b></div>
        </div>        
       </div>
       
     <hr class="rate-hr">
        
     <div class="modal-body" id="cancel">
       <div class="container">
          <form method="POST">
            <div class="book-flex1">
              <div class="time-warning">On time arrival</div>
               <div class="rate">
                 <input type="radio" id="star5" name="Gender" value="5" />
                 <label for="star5">1 stars</label>
                 <input type="radio" id="star4" name="Gender" value="4" />
                 <label for="star4">2 stars</label>
                 <input type="radio" id="star3" name="Gender" value="3" />
                 <label for="star3">3 stars</label>
                 <input type="radio" id="star2" name="Gender" value="2" />
                 <label for="star2">4 stars</label>
                 <input type="radio" id="star1" name="Gender" value="1" />
                 <label for="star1">5 star</label>
               </div>
              </div>
             
          <div class="book-flex1">
            <div class="time-warning">Friendly</div>
             <div class="rates">
               <input type="radio" id="star6" name="rates" value="5" />
               <label for="star6">1 stars</label>
               <input type="radio" id="star7" name="rates" value="4" />
               <label for="star7">2 stars</label>
               <input type="radio" id="star8" name="rates" value="3" />
               <label for="star8">3 stars</label>
               <input type="radio" id="star9" name="rates" value="2" />
               <label for="star9">4 stars</label>
               <input type="radio" id="star10" name="rates" value="1" />
               <label for="star10">5 star</label>
             </div>
           </div>

          <div class="book-flex1">
            <div class="time-warning">Quality of service</div>
             <div class="rate1">
               <input type="radio" id="star11" name="rate1" value="5" />
               <label for="star11">1 stars</label>
               <input type="radio" id="star12" name="rate1" value="4" />
               <label for="star12">2 stars</label>
               <input type="radio" id="star13" name="rate1" value="3" />
               <label for="star13">3 stars</label>
               <input type="radio" id="star14" name="rate1" value="2" />
               <label for="star14">4 stars</label>
               <input type="radio" id="star15" name="rate1" value="1" />
               <label for="star15">5 star</label>
             </div>
           </div>

        <div class="time-warning">Feedback on service provider</div>
         <input type="text" id="feedback" name="feedback">
           <div class="form-group mt-3">
              <button type="submit" class="btn btn-login2 form-control rate-submit">Submit</button>
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

<!-- Footer -->

<?php include('./Footer.php'); ?>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<?php include('./service-history-ajax.php'); ?>



</body>
</html>



                       