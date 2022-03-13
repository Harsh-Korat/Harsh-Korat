<script>

$(document).ready(function() {

  Address();
     function Address() {
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
        

                    $("#your_address").html(data);
                
                }
           });
      }


ModalAddress();

     function ModalAddress() {
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

$('#rate-modal .rate-submit').on("click", function(e) {

    
            e.preventDefault();

            var addressid1 = $(this).attr('id');
          
           var gender = $('input[name=Gender]:checked').val();
           var rates = $('input[name=rates]:checked').val();
           var rate1 = $('input[name=rate1]:checked').val();
            var feedback = $('#feedback').val();
            var completed1 = $('.completed1').val();
            var provider_name = $('#provider_name').val();

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
                    "completed1": completed1,
                    "provider_name": provider_name,

                },
             

                success: function(data) {
                    

                    if (data == 1) {

                        Swal.fire({
                            title: 'Rating has been Added Successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'Done'
                        })

                        

                        

                        // GetAddress();
                    } else {
                        Swal.fire({
                            title: 'Rating has not been Added',
                            text: 'Please Try Again',
                            icon: 'error',
                            confirmButtonText: 'Done'
                        });
                    }
                    

                }
            });

        })






})


</script>