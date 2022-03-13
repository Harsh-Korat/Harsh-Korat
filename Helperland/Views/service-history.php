
<?php include('./header.php'); ?>
   
      <title>Service History</title>
      <link rel="stylesheet" href="../assets/css/Service-history.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
.welcome{
height: 118px;
margin-top: 64px;
padding-top: 39px;
text-align: center;
font-size: 30px;
font-family: Roboto;
letter-spacing: 0px;
color: #4F4F4F;
background: #F9F9F9 0% 0% no-repeat padding-box;
}

.hr{
height: 1px;
background-color: #e1e1e1;
}
.round-border:hover{
background: #1D7A8C 0% 0% no-repeat padding-box;
color: white;
cursor: pointer;
}

.form select{
width: 50px;
height: 30px;
border:1px solid rgb(200,200,200);
}
*{
    margin: 0;
    padding: 0;
}
.rate {
  margin-top: -13px;
  margin-left: 30px;
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:35px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

.rates {
  margin-top: -13px;
  margin-left: 90px;
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rates:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rates:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:35px;
    color:#ccc;
}
.rates:not(:checked) > label:before {
    content: '★ ';
}
.rates > input:checked ~ label {
    color: #ffc700;    
}
.rates:not(:checked) > label:hover,
.rates:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rates > input:checked + label:hover,
.rates > input:checked + label:hover ~ label,
.rates > input:checked ~ label:hover,
.rates > input:checked ~ label:hover ~ label,
.rates > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

.rate1 {
  margin-top: -13px;
  float: left;
  margin-left: 8px;
    height: 46px;
    padding: 0 10px;
}
.rate1:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate1:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:35px;
    color:#ccc;
}
.rate1:not(:checked) > label:before {
    content: '★ ';
}
.rate1 > input:checked ~ label {
    color: #ffc700;    
}
.rate1:not(:checked) > label:hover,
.rate1:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate1 > input:checked + label:hover,
.rate1 > input:checked + label:hover ~ label,
.rate1 > input:checked ~ label:hover,
.rate1 > input:checked ~ label:hover ~ label,
.rate1 > label:hover ~ input:checked ~ label {
    color: #c59b08;
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
    <option >25</option>
    <option >50</option>

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
    <option >25</option>
    <option >50</option>

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