
<script>

$(document).ready(function() {


 $('.spinner').hide();
 $('.parent-spinner').hide();


UpcomingTable();

     function UpcomingTable() {
       
       var number = 1;

      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>   

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=UpcomingTable",
                data: {
                    
                    "username": username,
                    "number": number,
                },
                
                success: function(data) {
                   

                    $("#upcoming_address").html(data);
                    $('#example').DataTable();
                
                }
           });

      }


UpcomingCard();

     function UpcomingCard() {
       
       var number = 0;

      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>    

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=UpcomingTable",
                data: {
                    
                    "username": username,
                    "number": number,
                },
                
                success: function(data) {
                  

                    $("#upcoming_card").html(data);
                
                }
           });

      }


$('#upcoming_card').on('click', '.dashboard', function() {
        var addressid1 = $(this).attr('id');

   upcoming_card1();


     function upcoming_card1() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceRequestModal",
                data: {
                    
                    "addressid1": addressid1,
                },
        
                success: function(data) {
         
                $("#upcoming_modal_address").html(data);

                }
           });
      }
  });



$('#upcoming_address').on('click', '.dashboard', function() {
        var addressid1 = $(this).attr('id');

   upcoming_address1();


     function upcoming_address1() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceRequestModal",
                data: {
                    
                    "addressid1": addressid1,
                },
        
                success: function(data) {
         
                $("#upcoming_modal_address").html(data);

                }
           });
      }
  });


$('#upcoming_address').on('click', '.dashboard', function() {
        ServiceRequestId = $(this).attr('id');
        $('#schedule-modal .accept4').attr('id', ServiceRequestId);

  });

$('#upcoming_card').on('click', '.dashboard', function() {
        ServiceRequestId = $(this).attr('id');
        $('#schedule-modal .accept4').attr('id', ServiceRequestId);

  });

$('#upcoming_address').on('click', '.dashboard', function() {
        ServiceRequestId = $(this).attr('id');
        $('#schedule-modal .cancel5').attr('id', ServiceRequestId);

  });

$('#upcoming_card').on('click', '.dashboard', function() {
        ServiceRequestId = $(this).attr('id');
        $('#schedule-modal .cancel5').attr('id', ServiceRequestId);

  });


$('.accept4').on("click", function(e) {
 

            e.preventDefault();  

         $('.spinner').show();
         $('.parent-spinner').show();

      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>  

            var ServiceRequestId = $(this).attr('id');

            $.ajax({

                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=UpcomingRequestComplete",

                data: {
                    
                    "ServiceRequestId": ServiceRequestId,
                    "username": username,

                },
             

                success: function(data) {

                 $('.spinner').hide();
                 $('.parent-spinner').hide();

                    if (data == 1) {

                        Swal.fire({
                            title: 'Request has been completed',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/Upcoming.php";
  
                         });

                        
                    } else {
                        Swal.fire({
                            title: 'Request has not been completed',
                            text: 'Please Try Again',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                    

                }
            });

 

        })


$('.cancel5').on("click", function(e) {
            e.preventDefault();

        $('.spinner').show();
        $('.parent-spinner').show();

      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>  

            var ServiceRequestId = $(this).attr('id');

             

            $.ajax({

                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=UpcomingRequestCancel",

                data: {
                    
                    "ServiceRequestId": ServiceRequestId,
                    "username": username,

                },
             

                success: function(data) {

                   $('.spinner').hide();
                   $('.parent-spinner').hide();

                    if (data == 1) {

                        Swal.fire({
                            title: 'Request has been cancel successfully',
                            text: '',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/Upcoming.php";
  
                         });

                        
                    } else {
                        Swal.fire({
                            title: 'Request has not been cancel successfully',
                            text: 'Please Try Again',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                    

                }
            });

 

        })

})


</script>