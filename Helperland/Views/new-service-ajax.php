
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


// Service-Provider-History


 
ServiceProviderHistory();

     function ServiceProviderHistory() {

       $('.spinner').show();
       $('.parent-spinner').show();

         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?> 
 
    var number = 1;

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceProviderHistory",
                data: {
                    
                    "username": username,
                    "number":number,
                },
                
                success: function(data) {
                   
               $('.spinner').hide();
               $('.parent-spinner').hide();

                    $("#service_history_address").html(data);
                
                }
           });

      }


ServiceProviderHistoryModal();

     function ServiceProviderHistoryModal() {

       $('.spinner').show();
       $('.parent-spinner').show();
 
         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?> 

    var number = 0;

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceProviderHistory",
                data: {
                    
                    "username": username,
                    "number":number,
                },
                
                success: function(data) {
                   
               $('.spinner').hide();
               $('.parent-spinner').hide();

                    $("#service_history_address_Modal").html(data);
                
                }
           });

      }


$('#service_history_address').on('click', '.dashboard', function() {
        var addressid1 = $(this).attr('id');


   ServiceProviderHistoryModal1();


     function ServiceProviderHistoryModal1() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceRequestModal",
                data: {
                    
                    "addressid1": addressid1,
                },
        
                success: function(data) {
         
                $("#service_history_modal_address").html(data);

                }
           });
      }
  });


$('#service_history_address_Modal').on('click', '.dashboard', function() {
        addressid1 = $(this).attr('id');



   ServiceProviderHistoryModal2();


     function ServiceProviderHistoryModal2() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceRequestModal",
                data: {
                    
                    "addressid1": addressid1,
                },
        
                success: function(data) {
         
                $("#service_history_modal_address").html(data);

                }
           });
      }
  });


// Upcoming Start



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