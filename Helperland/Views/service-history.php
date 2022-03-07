
<?php include('./header.php'); ?>
   
      <title>Service History</title>
      <link rel="stylesheet" href="../assets/css/Service-history.css">
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


<!-- Verical Navbar -->

 <div class="middle-table">
    <div class="middle">

  <div class="vertical-nav">

    <ul class="list-group">
    <a class="list-group-item" href="customer-dashboard.php">Dashboard</a>
    <a class="list-group-item active" href="./service-history.php">Service History</a>
    <a class="list-group-item" href="#">Service Schedule</a>
    <a class="list-group-item" href="#">Favourite Pros</a>
    <a class="list-group-item" href="#">Invoices</a>
    <a class="list-group-item" href="#">Notifications</a>
    </ul>

</div>


<!-- Vertical Table -->

 <section id="middle-table">
<div class="flex">
<div class="service-history"><b>Service History</b></div>

<button class="btn export">Export</button>
</div>
    <table class="table">
      <thead>

    <tr>
      <th>Service Details <img src="../assets/image/sort.png"></th>
      <th>Service Provider<img src="../assets/image/sort.png"></th>
      <th class="center">Payment <img src="../assets/image/sort.png"></th>
      <th class="center">Status <img src="../assets/image/sort.png"></th>
      <th class="center">Rate SP <img src="../assets/image/sort.png"></th>
    </tr>

</thead>
 
<tbody id="your_address">


</tbody>
</table>


<!-- Bottom Menu -->

<div class="bottom-tav-show">
<div class="flex">
 <form class="form">
  <label class="labl">Show</label>
  <select name="number" class="labl">
    <option >10</option>

  </select>
 <label>entries  Total Record: 55</label>
</form>
<div class="rounds  round-border" id="number">
<i class="fas fa-step-backward"></i>
</div>

<div class="rounds round-border">
<i class="fas fa-angle-left"></i>
</div>

<div class="rounds  round-border" id="act">
1
</div>

<div class="rounds  round-border">
2
</div>

<div class="rounds  round-border">
3
</div>

<div class="rounds  round-border">
4
</div>

<div class="rounds  round-border">
<i class="fas fa-angle-right"></i>
</div>

<div class="rounds  round-border">
<i class="fas fa-step-forward"></i>
</div>

</div>
</div>
</section>

</div>
</div>


<!-- Card -->

<div class="card1">
<div class="historys"><b>Service History</b></div>
<button class="btn export1">Export</button>

<div class="cards">
 <div class="card">
   <div class="card-body">
     <div id="mobile_add">
       
     </div>
    
 </div>
</div>
</div>
</div>

<!-- Bottom Menu -->

<div class="bottom-show">
<div class="flex">
 <form class="form">
  <label class="labl">Show</label>
  <select name="number" class="labl">
    <option >10</option>

  </select>
 <label>entries  Total Record: 55</label>
</form>
<div class="rounds  round-border" id="number">
<i class="fas fa-step-backward"></i>
</div>

<div class="rounds round-border">
<i class="fas fa-angle-left"></i>
</div>

<div class="rounds  round-border" id="act">
1
</div>

<div class="rounds  round-border">
2
</div>

<div class="rounds  round-border">
3
</div>

<div class="rounds  round-border">
4
</div>

<div class="rounds  round-border">
<i class="fas fa-angle-right"></i>
</div>

<div class="rounds  round-border">
<i class="fas fa-step-forward"></i>
</div>

</div>
</div>


<!-- Footer -->

<?php include('./Footer.php'); ?>

<?php include('./service-history-ajax.php'); ?>


<!-- rate modal -->

<div class="modal fade" id="rate-modal">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" id="cancel-border">
         <div class="modal-title">
           <div class="round-main">
             <img src="../assets/image/forma-1-copy-19.png" class="round5"><span class="time-warning" id="provider_name">Lyum Watson</span><br>
             <span class="time star-fa">         
                <i class="fa fa-star star3"></i>
                <i class="fa fa-star star3"></i>
                <i class="fa fa-star star3"></i>
                <i class="fa fa-star star3"></i>
                <i class="fa fa-star star4"></i> <span class="time-warning" id="four">4</span></span>
            </div>
         
         <div id="warning"><b>Rate your service provider</b></div>
        </div>        
       </div>
       
     <hr class="rate-hr">
        
     <div class="modal-body" id="cancel">
       <div class="container">
          <form method="POST">
            <div class="book-flex1">
              <div class="time-warning">On time arrival</div>
                <span class="time time-bottom" id="time1">
                  <i class="fa fa-star star3"></i>
                  <i class="fa fa-star star3"></i>
                  <i class="fa fa-star star3"></i>
                  <i class="fa fa-star star3"></i>
                  <i class="fa fa-star star4"></i> 
                </span>
              </div>
             
              <div class="book-flex1">
              <div class="time-warning">Friendly</div>
              <span class="time time-bottom" id="time2">             
                <i class="fa fa-star star3"></i>
                <i class="fa fa-star star3"></i>
                <i class="fa fa-star star3"></i>
                <i class="fa fa-star star3"></i>
                <i class="fa fa-star star4"></i> 
              </span>
          </div>

              <div class="book-flex1">
              <div class="time-warning">Quality of service</div>
              <span class="time time-bottom">            
                <i class="fa fa-star star3"></i>
                <i class="fa fa-star star3"></i>
                <i class="fa fa-star star3"></i>
                <i class="fa fa-star star3"></i>
                <i class="fa fa-star star4"></i> 
              </span>
          </div>

          <div class="time-warning">Feedback on service provider</div>
          <input type="text" id="feedback" name="feedback">

           <div class="form-group mt-3">
              <button type="submit" class="btn btn-login2 form-control">Submit</button>
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

           </div>
         </form>
        </div> 
       </div>
      </div>
     </div>
    </div>




</body>
</html>