<script>
  

$(document).ready(function() {

 $('.spinner').hide();
 $('.parent-spinner').hide();
 
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
                    $('#example').DataTable();
                
                }
           });

      }





$('#Admin_address').on('click', '.dashboard', function() {
        var addressid1 = $(this).attr('id');

   Address2();


     function Address2() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=AdminDasboard2",
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


      if($('#plan-date').val() == "" || $("#dash_time").val() == "" || $("#street").val() == "" || $("#houseno").val() == "" || $("#pincode").val() == "" || $("#invoicestreet").val() == "" || $("#invoiceshouseno").val() == "" || $("#invoicespincode").val() == ""){


       if ($("#plan-date").val() == "") {
       $(".plan-date-message").addClass('error-message').text("Date is required");
       }else {
       $(".plan-date-message").removeClass('error-message').text("");
       }

       if ($("#dash_time").val() == "") {
       $(".dash_time-message").addClass('error-message').text("Time is required");
       }else {
       $(".dash_time-message").removeClass('error-message').text("");
       }

       if ($("#street").val() == "") {
       $(".street-message").addClass('error-message').text("Street is required");
       }else {
       $(".street-message").removeClass('error-message').text("");
       }

       if ($("#houseno").val() == "") {
       $(".house-message").addClass('error-message').text("House Number is required");
       }else {
       $(".house-message").removeClass('error-message').text("");
       }

       if ($("#pincode").val() == "") {
       $(".pincode-message").addClass('error-message').text("Pincode is required");
       }else {
       $(".pincode-message").removeClass('error-message').text("");
       }

       if ($("#invoicestreet").val() == "") {
       $(".street-messages").addClass('error-message').text("Street is required");
       }else {
       $(".street-messages").removeClass('error-message').text("");
       }

       if ($("#invoiceshouseno").val() == "") {
       $(".house-messages").addClass('error-message').text("House Number is required");
       }else {
       $(".house-messages").removeClass('error-message').text("");
       }

       if ($("#invoicespincode").val() == "") {
       $(".pincode-messages").addClass('error-message').text("Pincode is required");
       }else {
       $(".pincode-messages").removeClass('error-message').text("");
       }
 }  

    else{        
           $('#address-modal').hide();

           $('.spinner').show();
           $('.parent-spinner').show();



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
                

             $('.spinner').hide();
             $('.parent-spinner').hide();               
                  

                    if (data == 1) {

                        Swal.fire({
                            title: 'Update Successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                             CustomerDetails1();
  
                         });

        
                    } else {
                        Swal.fire({
                            title: 'Update Not Successfully',
                            text: 'Please Try Again',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then(function() {
                             CustomerDetails1();
  
                         });

                        
                    } 
                  }                    

            });
          }
            
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





    $(".logout").on("click", function(e) {
          e.preventDefault();

      $('.mobile-nav').hide();

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=logout",
                data: {

                    "forgot_email": 0,
                },
 
                success: function(data) {


         
                     if (data == 1) {

                         Swal.fire({
                             title: 'You have successfully logged out.',
                             icon: 'success',
                             confirmButtonText: 'OK'
                         }).then(function() {
                             location.href = "http://localhost/Helperland/Views/index.php";
  
                         });
                    

                     } else {
                         Swal.fire({
                             title: 'You have not successfully logged out.', 
                             icon: 'error',
                             confirmButtonText: 'OK'
                         }).then(function() {
                             location.href = "http://localhost/Helperland/Views/index.php";
  
                         });
                   }
               }
            });
        
    })

$('#Admin_address').on('click', '.dropdown-item', function() {
        addressid = $(this).attr('id');
        $('#delete-modal .delete_two').attr('id', addressid);

  });


$('.delete_two').on("click", function(e) {
 
            e.preventDefault();

           $('#delete-modal').hide();
           $('.spinner').show();
           $('.parent-spinner').show();

            var addressid = $(this).attr('id');
           
            $.ajax({

                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=DeleteServiceByAdmin",

                data: {
                    
                    "addressid": addressid,

                },
             

                success: function(data) {

                $('.spinner').hide();
                $('.parent-spinner').hide();

              
                    if (data == 1) {

                        Swal.fire({
                            title: 'Service Request has been Deleted Successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'Done'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/Admin-ServiceRequests.php";
  
                         });

                        

                        // GetAddress();
                    } else {
                        Swal.fire({
                            title: 'Service Request has not been Deleted',
                            text: 'Please Try Again',
                            icon: 'error',
                            confirmButtonText: 'Done'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/Admin-ServiceRequests.php";
  
                         });
                    }
                    

                }
            });

 

        })



   $(".calculate").on("click", function(e) {
          e.preventDefault();
            
              var amount_select = $.trim($("#amount_select").val());
            
              var amount = $.trim($("#amount").val());

               var Total = $('.sub span').text();
                Total_amount = parseFloat(Total);


              if(amount_select == 1){
             
              if(Total_amount < amount){

              $(".amount-msg").addClass('error-message').text("Please select Amount less than Paid Amount");
              $("#calculate_amount").val("");

              }else{

             $(".amount-msg").removeClass('error-message').text("");
              $("#calculate_amount").val(amount);
              }
            }

              else{

              if(100 < amount){
              $(".amount-msg").addClass('error-message').text("Please Select less than or equal to 100 Percentage");
              $("#calculate_amount").val("");

              }else{
              $(".amount-msg").removeClass('error-message').text("");
              var per = (Total_amount * amount)/100;
              $("#calculate_amount").val(per);          

               }  
              }

})




$('#Admin_address').on('click', '.dropdown-item', function() {
        addressid = $(this).attr('id');
        $('#refund-modal .refund').attr('id', addressid);

  });


$('#Admin_address').on('click', '.dropdown-item', function() {
        var addressid1 = $(this).attr('id');

   Refunded();


     function Refunded() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=Refunded",
                data: {
                    
                    "addressid1": addressid1,
                },
        
                success: function(data) {

     
         
                $("#refunded_address").html(data);

                }
           });
      }
  });



$('#Admin_address').on('click', '.dis-ref', function() {

       $(".refund").addClass('disabled');

});


  $(".refund").on("click", function(e) {
          e.preventDefault();


      if($('#amount').val() == "" || $("#rufund_comment").val() == "" || $("#rufund_emp").val() == ""){


       if ($("#amount").val() == "") {
       $(".amount-msg").addClass('error-message').text("Please enter the Amount and Calculate refund");
       }else {
       $(".amount-msg").removeClass('error-message').text("");
       }

       if ($("#rufund_comment").val() == "") {
       $(".rufund_comment-message").addClass('error-message').text("Please enter the reason for refund");
       }else {
       $(".rufund_comment-message").removeClass('error-message').text("");
       }

       if ($("#rufund_emp").val() == "") {
       $(".rufund_emp-message").addClass('error-message').text("Please enter the EMP Notes");
       }else {
       $(".rufund_emp-message").removeClass('error-message').text("");
       }

    }

    else{      
           $('#refund-modal').hide();

           $('.spinner').show();
           $('.parent-spinner').show();

            var addressid = $(this).attr('id');

            var calculate_amount = $.trim($("#calculate_amount").val());

            var status = 4;

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=UpdateRefunded",
                data: {

                    "addressid": addressid,
                    "calculate_amount": calculate_amount,
                    "status": status,
                    
                },
 
                success: function(data) {

                

             $('.spinner').hide();
             $('.parent-spinner').hide();               
                  

                    if (data == 1) {

                        Swal.fire({
                            title: 'Amount Refunded Successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            
                           location.href = "http://localhost/Helperland/Views/Admin-ServiceRequests.php";
                         });

        
                    } else {
                        Swal.fire({
                            title: 'Amount Refunded Not Successfully',
                            text: 'Please Try Again',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/Admin-ServiceRequests.php";
  
                         });

                        
                    } 
                  }                    

            });

        }
          
            
    })



})



</script>