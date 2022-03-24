<script>
  

$(document).ready(function() {


 
AdminServiceRequests();

     function AdminServiceRequests() {

   
         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>       

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=AdminServiceRequests",
                data: {
                    
                    "username": username,
                },
                
                success: function(data) {


                    $("#Admin_address").html(data);
                
                }
           });

      }





$('#Admin_address').on('click', '.dashboard', function() {
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


$('#Admin_address').on('click', '.dropdown-item', function() {
        var addressid1 = $(this).attr('id');

   Address1();


     function Address1() {


      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=AdminUpdateAddress",
                data: {
                    
                    "addressid1": addressid1,
                },
                dataType: "json",

                 success: function(data) {

                                                 
                    $('#plan-date').val(data[4]);
                    $('#dash_time').val(data[5]);
                    $('#street').val(data[0]);
                    $('#houseno').val(data[1]);
                    $('#pincode').val(data[3]);
                    $('#location').val(data[2]);
                    $('#invoicestreet').val(data[0]);
                    $('#invoiceshouseno').val(data[1]);
                    $('#invoicespincode').val(data[3]);
                    $('#invoiceslocation').val(data[2]);
                }
           });
      }
  });


$('#Admin_address').on('click', '.dropdown-item', function() {
        addressid = $(this).attr('id');
        $('#address-modal .edit-address').attr('id', addressid);

  });


    $(".edit-address").on("click", function(e) {
          e.preventDefault();

            
            var addressid = $(this).attr('id');
            var plan_date = $.trim($("#plan-date").val());
            var dash_time = $.trim($("#dash_time").val());
            var street = $.trim($("#street").val());
            var houseno = $.trim($("#houseno").val());
            var pincode = $.trim($("#pincode").val());
            var location = $.trim($("#location").val());


           
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=AdminUpdateDetails",
                data: {

                    "addressid": addressid,
                    "plan_date": plan_date,
                    "dash_time": dash_time,
                    "street": street,
                    "houseno": houseno,
                    "pincode": pincode,
                    "location": location,
                    
                },
 
                success: function(data) {
                   
                  
                    if (data == 1) {

                        Swal.fire({
                            title: 'Update Successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        })


                        CustomerDetails1();

                      
        
                    } else {
                        Swal.fire({
                            title: 'Update Not Successfully',
                            text: 'Please Try Again',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })

                        CustomerDetails1();
                    } 
                  }                    

            });
            
    })


  function CustomerDetails1() {
      location.href = "http://localhost/Helperland/Views/Admin-ServiceRequests.php";
   }  



    $(".search").on("click", function(e) {
          e.preventDefault();
            
               var zip = $.trim($("#zip").val());

  
              var sid = $.trim($("#sid").val());
              
              var customer = $.trim($("#customer").val());
            
              var status = $.trim($("#status").val());
              
              var from_date = $.trim($("#from_date").val());
              var to_date = $.trim($("#to_date").val());



                     
           $.ajax({
                 type: 'POST',
                  url: "http://localhost/Helperland/?controller=Helperland&function=AdminFindPostalCode",
                  data: {

                      "zip": zip,
                      "sid": sid,
                      
                      "customer": customer,
                      
                      "status": status,
                     
                      "from_date": from_date,
                      "to_date": to_date,
                    
                  },
 
                  success: function(data) {

                   
                    $("#Admin_address").html(data);


                 }
                   
            
     })

})


  $(".search1").on("click", function(e) {
          e.preventDefault();
            
               var zip = $.trim($("#zip1").val());
  
              var sid = $.trim($("#sid1").val());
              
              var customer = $.trim($("#customer1").val());
            
              var status = $.trim($("#status1").val());
              
              var from_date = $.trim($("#from_date1").val());
              var to_date = $.trim($("#to_date1").val());



                     
           $.ajax({
                 type: 'POST',
                  url: "http://localhost/Helperland/?controller=Helperland&function=AdminFindPostalCode",
                  data: {

                      "zip": zip,
                      "sid": sid,
                      
                      "customer": customer,
                      
                      "status": status,
                     
                      "from_date": from_date,
                      "to_date": to_date,
                    
                  },
 
                  success: function(data) {

                  

                   
                    $("#Admin_address").html(data);


                 }
                   
            
     })

})


$(".clear").on("click", function(e) {

 e.preventDefault();


AdminServiceRequests();

     function AdminServiceRequests() {

   
         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>       

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=AdminServiceRequests",
                data: {
                    
                    "username": username,
                },
                
                success: function(data) {


                    $("#Admin_address").html(data);

                    CustomerDetails1();
                
                }
           });

      }

})


$(".clear1").on("click", function(e) {

 e.preventDefault();


AdminServiceRequests();

     function AdminServiceRequests() {

   
         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>       

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=AdminServiceRequests",
                data: {
                    
                    "username": username,
                },
                
                success: function(data) {


                    $("#Admin_address").html(data);

                    CustomerDetails1();
                
                }
           });

      }

})

})



</script>