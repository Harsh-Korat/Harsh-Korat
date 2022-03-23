<?php include('./header.php'); ?>
   
      <title>Service History</title>
      <link rel="stylesheet" href="../assets/css/customer-block.css">
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
    <a class="list-group-item" href="#">Dashboard</a>
    <a class="list-group-item" href="./NewService.php">New Service Requests</a>
    <a class="list-group-item" href="./Upcoming.php">Upcoming Services</a>
    <a class="list-group-item" href="#">Service Schedule</a>
    <a class="list-group-item" href="./ServiceProviderHistory.php">Service History</a>
    <a class="list-group-item" href="./ProviderRating.php">My Ratings</a>
    <a class="list-group-item active" href="./BlockCustomer.php">Block Customer</a>
    <a class="list-group-item" href="#">Invoices</a>
    <a class="list-group-item" href="#">Notifications</a>
  </ul>

</div>


<div id="block_address">


  </div>
 </div>
</div>

<!-- Spinner -->

 <div class="parent-spinner">
   <div class="spinner"></div>
 </div>

<!-- Footer Section -->

<?php include('./Footer.php'); ?>


<script>
  
$(document).ready(function() {


BlockCustomer();

function BlockCustomer(){

       $('.spinner').show();
       $('.parent-spinner').show();

         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>       

   

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=BlockCustomer",
                data: {
                    
                    "username": username,
                },
                
                success: function(data) {

                 $('.spinner').hide();
                 $('.parent-spinner').hide();

                    $("#block_address").html(data);
                
                }
           });

}


$('#block_address').on('click', '.favourite-bttn', function() {
 
var target_userid = $(this).attr('id');


      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>  


            $.ajax({

                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=BlockCustomerRequest",

                data: {
                    
                    "target_userid": target_userid,
                    "username": username,

                },
             
                success: function(data) {
                  
                    if (data == 1) {

                    
                        Swal.fire({
                            title: 'Customer has been Un-block successfully.',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/BlockCustomer.php";
  
                         });

                        
                    } else {
                        Swal.fire({
                            title: 'Customer has been block successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/BlockCustomer.php";
  
                         });
                    }
                    

                }
            });

 

        })


})


</script>


</body>
</html>
