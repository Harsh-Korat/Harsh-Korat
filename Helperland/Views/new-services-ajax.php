
<script>

$(document).ready(function() {


 $('.spinner').hide();
 $('.parent-spinner').hide();

 
Address();

     function Address() {

   
         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>       

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=NewServiceRequest",
                data: {
                    
                    "username": username,
                },
                
                success: function(data) {


                    $("#your_address").html(data);
                    $('#example').DataTable();
                
                }
           });

      }



$('#your_address').on('click', '.dashboard', function() {
        var addressid1 = $(this).attr('id');

   Address2();


     function Address2() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceRequestModal",
                data: {
                    
                    "addressid1": addressid1,
                },
        
                success: function(data) {
         
                $("#modal_address").html(data);

                }
           });
      }
  });


$('#your_address').on('click', '.dashboard', function() {
        ServiceRequestId = $(this).attr('id');

        $('#schedule-modal .accept3').attr('id', ServiceRequestId);

  });

$('#mobile_add').on('click', '.dashboard', function() {
        ServiceRequestId = $(this).attr('id');
        $('#schedule-modal .accept3').attr('id', ServiceRequestId);

  });


$('.accept3').on("click", function(e) {
 

            e.preventDefault();

           
       $('.spinner').show();
       $('.parent-spinner').show();


            var ServiceRequestId = $(this).attr('id');


       <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>               

            $.ajax({

                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=NewServiceRequestAccept",

                data: {
                    
                    "ServiceRequestId": ServiceRequestId,
                    "username": username,

                },
             

                success: function(data) {

                 
                 $('.spinner').hide();
                 $('.parent-spinner').hide();

                    if (data == 1) {

                        Swal.fire({
                            title: 'Request has been approved',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/NewService.php";
  
                         });

                        
                    } else {
                        Swal.fire({
                            title: 'Ther are another request on your time.',
                            text: 'Time conflict',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                    

                }
            });

 

        })

// Card Address


ModalAddress();

     function ModalAddress() {
         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>       

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=NewServiceRequest1",
                data: {
                    
                    "username": username,
                },
                
                success: function(data) {
                    

                    $("#mobile_add").html(data);
                
                }
           });
      }




$('#mobile_add').on('click', '.dashboard', function() {
        var addressid1 = $(this).attr('id');

   Address2();


     function Address2() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceRequestModal",
                data: {
                    
                    "addressid1": addressid1,
                },
        
                success: function(data) {
         
                $("#modal_address").html(data);

                }
           });
      }
  });


// Rating Page


MyRating();

     function MyRating() {

       $('.spinner').show();
       $('.parent-spinner').show();

         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?> 
 
    var number = 1;

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=MyRating",
                data: {
                    
                    "username": username,
                    "number":number,
                },
                
                success: function(data) {
                   
             $('.spinner').hide();
             $('.parent-spinner').hide();

                    $("#myrating_address").html(data);
                
                }
           });

      }


MyRatingModal();

     function MyRatingModal() {

       $('.spinner').show();
       $('.parent-spinner').show();
 
         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?> 

    var number = 0;

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=MyRating",
                data: {
                    
                    "username": username,
                    "number":number,
                },
                
                success: function(data) {
                 
             $('.spinner').hide();
             $('.parent-spinner').hide();

                    $("#myratingmodal_address").html(data);
                
                }
           });

      }

$('#myrating_address').on('click', '.dashboard', function() {
        var addressid1 = $(this).attr('id');



   CustomerMyratindData();


     function CustomerMyratindData() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceRequestModal",
                data: {
                    
                    "addressid1": addressid1,
                },
        
                success: function(data) {
         
                $("#rating_modal_address").html(data);

                }
           });
      }
  });


$('#myratingmodal_address').on('click', '.dashboard', function() {
        addressid1 = $(this).attr('id');



   CustomerMyratindModalData();


     function CustomerMyratindModalData() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceRequestModal",
                data: {
                    
                    "addressid1": addressid1,
                },
        
                success: function(data) {
         
                $("#rating_modal_address").html(data);

                }
           });
      }
  });


})


</script>