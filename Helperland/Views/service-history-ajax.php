<script>

$(document).ready(function() {

 $('.spinner').hide();
 $('.parent-spinner').hide();

  Address();
     function Address() {

       $('.spinner').show();
       $('.parent-spinner').show();

         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>       

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceHistory",
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
                url: "http://localhost/Helperland/?controller=Helperland&function=ModalHistory",
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





$('#your_address').on('click', '.rate-sp', function() {
        var addressid1 = $(this).attr('id');
        
      $('#rate-modal .rate-submit').attr('id', addressid1);
      

})  

$('#mobile_add').on('click', '.rate-sp1', function() {
        var addressid1 = $(this).attr('id');

             
      $('#rate-modal .rate-submit').attr('id', addressid1);
      

})  

$('#rate-modal .rate-submit').on("click", function(e) {
  
            e.preventDefault();

       $('.spinner').show();
       $('.parent-spinner').show();

            var addressid1 = $(this).attr('id');
          
           var gender = $('input[name=Gender]:checked').val();
           var rates = $('input[name=rates]:checked').val();
           var rate1 = $('input[name=rate1]:checked').val();
            var feedback = $('#feedback').val();


           var avg =  (parseInt(gender) + parseInt(rates) + parseInt(rate1))/3;
           var avg = parseInt(avg);
          

        <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?> 


            $.ajax({

                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=CustomerRating",

                data: {
                    
                    "gender": gender,
                    "rates": rates,
                    "rate1": rate1,
                    "feedback": feedback,
                    "addressid1": addressid1,
                    "username": username,
                    "avg": avg,

                },
             

                success: function(data) {

                   $('.spinner').hide();
                   $('.parent-spinner').hide();               
                  
                    if (data == 1) {

                        Swal.fire({
                            title: 'Rating has been submitted successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'Done'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/service-history.php";
  
                         });

                        
                    } else {
                        Swal.fire({
                            title: 'Rating has not been submitted successfully',
                            text: 'Please Try Again',
                            icon: 'error',
                            confirmButtonText: 'Done'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/service-history.php";
  
                         });
                    }
                    

                }
            });

        })



$('#your_address').on('click', '.dashboard', function() {
        var addressid1 = $(this).attr('id');


   RateAddress();


     function RateAddress() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=RateAddress",
                data: {
                    
                    "addressid1": addressid1,
                },
        
                success: function(data) {

                $("#rate_modal_address").html(data);

                }
           });
      }
  });




})


</script>