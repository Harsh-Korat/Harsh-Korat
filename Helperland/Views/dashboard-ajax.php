<script>

$(document).ready(function() {

$('.spinner').hide();
$('.parent-spinner').hide();

ModalAddress();

     function ModalAddress() {

       $('.spinner').show();
       $('.parent-spinner').show();

         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>       

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ModalDasboard",
                data: {
                    
                    "username": username,
                },
                
                success: function(data) {
                    
             $('.spinner').hide();
             $('.parent-spinner').hide();

                    $("#mobile_add").html(data);
                
                }
           });
      }


});



$(document).ready(function() {
  

$('.spinner').hide();
$('.parent-spinner').hide();

CustomerDashboardFuntion();

function CustomerDashboardFuntion(){
     
       $('.spinner').show();
       $('.parent-spinner').show();

      username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>       

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=Dasboard",
                data: {
                    
                    "username": username,
                },
                

                success: function(data) {
                 
             $('.spinner').hide();
             $('.parent-spinner').hide();

                    $("#your_address").html(data);
                
                }
           });
    }


$('#your_address').on('click', '.save', function() {
        ServiceRequestId = $(this).attr('id');
        $('#date-modal .update').attr('id', ServiceRequestId);

  });

$('#your_address').on('click', '.cancel-lap', function() {
        ServiceRequestId = $(this).attr('id');
        $('#cancel-modal .cancel_two').attr('id', ServiceRequestId);

  });

$('#mobile_add').on('click', '.save', function() {
        ServiceRequestId = $(this).attr('id');
        $('#date-modal .update').attr('id', ServiceRequestId);

  });

$('#mobile_add').on('click', '.cancel-lap', function() {
        ServiceRequestId = $(this).attr('id');
        $('#cancel-modal .cancel_two').attr('id', ServiceRequestId);

  });



$('.update').on("click", function(e) {
 

            e.preventDefault();
            var dash_date = $.trim($("#dash_date").val());
            var dash_time = $.trim($("#dash_time").val());
            var ServiceRequestId = $(this).attr('id');

           
                   
            <?php if (isset($_SESSION['username'])) { ?>
                username = "<?php echo $_SESSION['username']; ?>";
            <?php } ?>
           

            $.ajax({

                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=DashUpdate",

                data: {
                    
                    "dash_date": dash_date,
                    "dash_time": dash_time,
                    "username": username,
                    "ServiceRequestId": ServiceRequestId,

                },
             

                success: function(data) {
                 // alert(data);

                    if (data == 1) {

                        Swal.fire({
                            title: 'Update Successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'Done'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/customer-dashboard.php";
  
                         });

                        

                        // GetAddress();
                    } else {
                        Swal.fire({
                            title: 'Update Not Successfully',
                            text: 'There is another request on this time. Please Choose another time.',
                            icon: 'error',
                            confirmButtonText: 'Done'
                        });
                    }
                    

                }
            });

 

        })




$('.cancel_two').on("click", function(e) {
 

            e.preventDefault();

            var ServiceRequestId = $(this).attr('id');

        if ($("#area").val() == "") {
         $(".first-name-msg").addClass('error-message').text("Please give the answer of above question.");
        }

      else{
            
            $.ajax({

                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=DashDelete",

                data: {
                    
                    "ServiceRequestId": ServiceRequestId,

                },
             

                success: function(data) {


                    if (data == 1) {

                        Swal.fire({
                            title: 'Delete Successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'Done'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/customer-dashboard.php";
  
                         });

                        

                        // GetAddress();
                    } else {
                        Swal.fire({
                            title: 'Delete Not Successfully',
                            text: 'Please Try Again',
                            icon: 'error',
                            confirmButtonText: 'Done'
                        });
                    }
                    

                }
            });

        }

        })



$('#your_address').on('click', '.save', function() {
        var addressid1 = $(this).attr('id');


   Address1();


     function Address1() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=Dasboard1",
                data: {
                    
                    "addressid1": addressid1,
                },
                dataType: "json",
                success: function(data) {
            
                    $('#dash_date').val(data[0]);
                    $('#dash_time').val(data[2]);

                 
                }
           });
      }
  });




$('#mobile_add').on('click', '.save', function() {
        var addressid1 = $(this).attr('id');


   Address1();


     function Address1() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=Dasboard1",
                data: {
                    
                    "addressid1": addressid1,
                },
                dataType: "json",
                success: function(data) {
                              
                    
                    $('#dash_date').val(data[0]);
                    $('#dash_time').val(data[2]);

                 
                }
           });
      }
  });




$('#your_address').on('click', '.dashboard', function() {
        var addressid1 = $(this).attr('id');

   Address2();


     function Address2() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=Dasboard2",
                data: {
                    
                    "addressid1": addressid1,
                },
        
                success: function(data) {
         
                $("#modal_address").html(data);

                }
           });
      }
  });



$('#mobile_add').on('click', '.dashboard', function() {
        var addressid1 = $(this).attr('id');

   Address2();


     function Address2() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=Dasboard2",
                data: {
                    
                    "addressid1": addressid1,
                },
        
                success: function(data) {
         
                $("#modal_address").html(data);

                }
           });
      }
  });

});


</script>