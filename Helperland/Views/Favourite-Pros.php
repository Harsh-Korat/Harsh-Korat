<?php include('./header.php'); ?>
   
      <title>Favourite-Pros</title>
      <link rel="stylesheet" href="../assets/css/favourite.css">
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
    <a class="list-group-item" href="./customer-dashboard.php">Dashboard</a>
    <a class="list-group-item" href="./service-history.php">Service History</a>
    <a class="list-group-item" href="#">Service Schedule</a>
    <a class="list-group-item active" href="./Favourite-Pros.php">Favourite Pros</a>
    <a class="list-group-item" href="#">Invoices</a>
    <a class="list-group-item" href="#">My Ratings</a>
    <a class="list-group-item" href="#">Notifications</a>
  </ul>

</div>


<div id="pros_address">
                    
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


FavouritePros();

function FavouritePros(){

       $('.spinner').show();
       $('.parent-spinner').show();

         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>       

   

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=FavouritePros",
                data: {
                    
                    "username": username,
                },
                
                success: function(data) {

              

                 $('.spinner').hide();
                 $('.parent-spinner').hide();

                    $("#pros_address").html(data);
                
                }
           });

}


$('#pros_address').on('click', '.favourite-bttn', function() {
 
var target_userid = $(this).attr('id');


      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>  


            $.ajax({

                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=BlockFavourite",

                data: {
                    
                    "target_userid": target_userid,
                    "username": username,

                },
             
                success: function(data) {


                    if(data == 1) {
                        Swal.fire({
                            title: 'Service Provider is in Favourite status. You can not Block it.',
                            text: '',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/Favourite-Pros.php";
  
                         }); 
                         }              
                  
                    if(data == 3) {
                        Swal.fire({
                            title: 'Service Provider has been block successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/Favourite-Pros.php";
  
                         });
                    }if(data == 4) {
                        Swal.fire({
                            title: 'Service Provider has been unblock successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/Favourite-Pros.php";
  
                         });
                    }
                    

                }
            });

 

        })


$('#pros_address').on('click', '.remove-bttn', function() {
 
var target_userid = $(this).attr('id');


      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>  


            $.ajax({

                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=RemoveFavourite",

                data: {
                    
                    "target_userid": target_userid,
                    "username": username,

                },
             
                success: function(data) {

                    if(data == 1) {
                        Swal.fire({
                            title: 'Service Provider is in Block status. You can not Favourite it.',
                            text: '',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/Favourite-Pros.php";
  
                         }); 
                         }   
                  
                    if(data == 3) {
                        Swal.fire({
                            title: 'Service Provider has been Favourite successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/Favourite-Pros.php";
  
                         });
                    }if(data == 4) {
                        Swal.fire({
                            title: 'Service Provider has been Un-favourite successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/Favourite-Pros.php";
  
                         });
                    }
                    

                }
            });

 

        })


})


</script>


</body>
</html>