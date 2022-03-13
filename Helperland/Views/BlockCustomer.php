<?php include('./header.php'); ?>
   
      <title>Service History</title>
      <link rel="stylesheet" href="../assets/css/blockcustomer.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.favourite-bttn1{
display: none;
background-color: red;
opacity: 0.7;
color: white;
margin-top: 10px;
margin-bottom: 13px;
margin-left: 85px;
padding: 6px 40px 14px 40px;
height: 46px;
border: 2px solid rgb(200,200,200);
font-size: 20px;
border-radius: 50px;
font-family: Roboto;
}

.favourite-bttn1:hover{
background-color: red;
transition: all 0.5s ease;
opacity: 1;
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
    <a class="list-group-item" href="#">My Ratings</a>
    <a class="list-group-item active" href="./BlockCustomer.php">Block Customer</a>
    <a class="list-group-item" href="#">Invoices</a>
    <a class="list-group-item" href="#">Notifications</a>
  </ul>

</div>


<div id="block_address">


  </div>
 </div>
</div>


<!-- Footer Section -->

<?php include('./Footer.php'); ?>
<!-- <?php include('./new-service-ajax.php'); ?>
 -->

<script>
  
$(document).ready(function() {


BlockCustomer();

function BlockCustomer(){

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

                    $("#block_address").html(data);
                
                }
           });

}


$('#block_address').on('click', '.favourite-bttn', function() {
 
var userid = $(this).attr('id');

      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>  


            $.ajax({

                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=BlockCustomerRequest",

                data: {
                    
                    "userid": userid,
                    "username": username,

                },
             

                success: function(data) {
                   
                   changename();

                    if (data == 1) {

                      

                        Swal.fire({
                            title: 'Customer has been blocked successfully.',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        })

                        
                    } else {
                        Swal.fire({
                            title: 'Customer has not been blocked successfully.',
                            text: 'Please Try Again',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                    

                }
            });

 

        })


function changename(){




}


})







</script>


</body>
</html>