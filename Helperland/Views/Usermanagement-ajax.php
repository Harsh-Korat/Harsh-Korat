
<script>

$(document).ready(function() {

 
Usermanagement();

     function Usermanagement() {

      
         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>       

      

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=Usermanagement",
                data: {
                    
                    "username": username,
                },
                
                success: function(data) {
                  

                    $("#your_address").html(data);
                
                }
           });

      }


$('#your_address').on('click', '.dropdown-menu', function() {
 
var target_userid = $(this).attr('id');

      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>  


            $.ajax({

                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=UsermanagementInactive",

                data: {
                    
                    "target_userid": target_userid,
                    "username": username,

                },
             
                success: function(data) {
                  
                    if (data == 1) {

                    
                        Swal.fire({
                            title: 'Customer has been Inactive successfully.',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/Usermanagement.php";
  
                         });

                        
                    } else {
                        Swal.fire({
                            title: 'Customer has been Active successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/Usermanagement.php";
  
                         });
                    }
                    

                }
            });

 

        })



    $(".search").on("click", function(e) {
          e.preventDefault();
                           
 
              var select = $.trim($("#select").val());
              
              var user_type = $.trim($("#user_type").val());
              
              var from_date = $.trim($("#from_date").val());

              var to_date = $.trim($("#to_date").val());

                     
           $.ajax({
                 type: 'POST',
                  url: "http://localhost/Helperland/?controller=Helperland&function=AdminSearchUsermanagement",
                  data: {
                     
                      "select": select,                 
                      "user_type": user_type,                     
                      "from_date": from_date,
                      "to_date": to_date,
                    
                  },
 
                  success: function(data) {

                    $("#your_address").html(data);

                 }
                   
     })

})


    $(".search1").on("click", function(e) {
          e.preventDefault();
            
              var select = $.trim($("#select1").val());              
              var user_type = $.trim($("#user_type1").val());              
              var from_date = $.trim($("#from_date1").val());
              var to_date = $.trim($("#to_date1").val());

                     
           $.ajax({
                 type: 'POST',
                  url: "http://localhost/Helperland/?controller=Helperland&function=AdminSearchUsermanagement",
                  data: {

                      "select": select,                     
                      "user_type": user_type,            
                      "from_date": from_date,
                      "to_date": to_date,
                    
                  },
 
                  success: function(data) {

                    $("#your_address").html(data);


                 }
                   
     })

})


  function CustomerDetails1() {
      location.href = "http://localhost/Helperland/Views/Usermanagement.php";
   }  


$(".clear").on("click", function(e) {

 e.preventDefault();


Usermanagement();

     function Usermanagement() {

      
         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>       

      

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=Usermanagement",
                data: {
                    
                    "username": username,
                },
                
                success: function(data) {
                   

                    $("#your_address").html(data);

                    CustomerDetails1()
                
                }
           });

      }

})


$(".clear1").on("click", function(e) {

 e.preventDefault();


Usermanagement();

     function Usermanagement() {

      
         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>       

      

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=Usermanagement",
                data: {
                    
                    "username": username,
                },
                
                success: function(data) {
                   

                    $("#your_address").html(data);

                    CustomerDetails1()
                
                }
           });

      }

})



})

</script>