<script>

// Setup Services

    $(document).ready(function() {


    $('.spinner').hide();
    $('.parent-spinner').hide();



    $(".booking-login").on("click", function(e) {

          e.preventDefault();

            var loginemail = $.trim($("#loginemail").val());
            var password = $.trim($("#loginpassword").val());

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=Login1",
                data: {

                    "loginemail": loginemail,
                    "password": password,

                },
 
                success: function(data) {
                     
                     if (data == 1) {

                         Swal.fire({
                             title: 'Password Invalid. Please Enter the Valid Password',
                             icon: 'error',
                             confirmButtonText: 'Ok'
                         });
                    

                     } else if(data == 2) {
                         window.location.href = "http://localhost/Helperland/Views/book-service.php";
                      }

                      else if(data == 3) {
                         Swal.fire({
                             title: 'Service Provider are not allowed',
                             icon: 'error',
                             confirmButtonText: 'Ok'
                         }).then(function() {
                             location.href = "http://localhost/Helperland/Views/index.php";
  
                         });
                      }

                     else {
                         Swal.fire({
                             title: 'User does not Exists.',
                             icon: 'error',
                             confirmButtonText: 'Ok'
                         }).then(function() {
                             location.href = "http://localhost/Helperland/Views/index.php";
  
                         });

                   } 
               }
            });
            
    })


    $(".home-forgot").on("click", function(e) {
          e.preventDefault();

            var login = $.trim($("#login").val());


            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ForgotMail",
                data: {

                    "forgot_email": login,
                },
 
                success: function(data) {
                     
                     if (data == 1) {

                         Swal.fire({
                             title: 'Reset Password Link has been sent successfully.',
                             icon: 'success',
                             confirmButtonText: 'Done'
                         }).then(function() {
                             location.href = "http://localhost/Helperland/Views/index.php";
  
                         });
                    

                     } else {
                         Swal.fire({
                             title: 'Please Enter Valid Email', 
                             icon: 'error',
                             confirmButtonText: 'Ok'
                         })
                   }
               }
            });
            
    })



        $(".check").on("click", function() {
 
          if ($.trim($('#postalcode').val()).length == 0) {
                var postalerror = "Postal Code is Required";
                $('#postal-message').text(postalerror);
            }
            if ($.trim($('#postalcode').val()).length == 6) {
                var postalerror = "";
                $('#postal-message').text(postalerror);
                var postal = $("#postalcode").val();

                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Helperland/?controller=Helperland&function=Pincode",
                    data: {
                        "check_postal": 1,
                        "postal": postal,
                    },

                    success: function(data) {

                         Address();
                        
                        if (data == 1) {
                            $(".tab1 .nav-link").removeClass('active');
                            $(".tab-content .text-one").removeClass('active');
                            $(".tab-content .text-one ").removeClass('show');
                            $(".tab1  .nav-link").addClass('completed');

                            $(".tab2  .nav-link").addClass('show');
                            $(".tab2  .nav-link").addClass('active');
                            $(".tab-content .text-two").addClass('active');
                            $(".tab-content .text-two").addClass('show');
              
                            var pincode = $("#pincode").val(postal);

                            $.ajax({
                                type: 'POST',
                                url: "http://localhost/Helperland/?controller=Helperland&function=City",
                                data: {
                                    "get_postal": 1,
                                    "postalcode": postal,
                                }

                            });
                        } else {
                            var response = "Postal Code Not Exist";
                            $('#postal-message').text(response);
                            
                        }

                    }

                });

            } else {
                var postalerror = "Invalid Postal Code";
                $('#postal-message').text(postalerror);
            }
        });

})



 $('#bottom-address').hide();

 $('.new-address').on('click', function(){
   $('.new-address').hide();
   $('#bottom-address').show();
 });

$('#discard').on('click', function(){
  $('.new-address').show();
  $('#bottom-address').hide();
});


// Shedule and Plan


   $(".plan-continue").on("click", function(e) {
            e.preventDefault();
               

        var more_time = 0;

        if ($(".service1").css('display') == 'block') {
           var first_service = "0.5";
           first_service = parseFloat(first_service);
           more_time = more_time + 0.5;
        }

        if ($(".service2").css('display') == 'block') {
            var second_service = "0.5";
            second_service = parseFloat(second_service);
            more_time = more_time + 0.5;
        }

        if ($(".service3").css('display') == 'block') {
            var third_service = "0.5";
            third_service = parseFloat(third_service);
            more_time = more_time + 0.5;
        }

        if ($(".service4").css('display') == 'block') {
            var fourth_service = "0.5";
            fourth_service = parseFloat(fourth_service);
            more_time = more_time + 0.5;
        }

        if ($(".service5").css('display') == 'block') {
            var fifth_service = "0.5";
            fifth_service = parseFloat(fifth_service);
            more_time = more_time + 0.5;
        }


            $(".tab1  .nav-link").removeClass('active');
            $(".text-one").removeClass('active');
            $(".text-one ").removeClass('show');
            $(".tab1  .nav-link").addClass('completed');
            $(".tab2  .nav-link").removeClass('active');
            $(".tab2  .nav-link").removeClass('disabled');
            $(".tab-content .text-two").removeClass('active');
            $(".tab-content .text-two ").removeClass('show');
            $(".tab2  .nav-link").addClass('completed');
            $(".tab3  .nav-link").addClass('show');
            $(".tab3  .nav-link").addClass('active');
            $(".tab-content .text-third").addClass('active');
            $(".tab-content .text-third").addClass('show');

 })



 
    $(".save-details").on("click", function(e) {
          e.preventDefault();

            var street = $.trim($("#street").val());
            var houseno = $.trim($("#houseno").val());
            var pincode = $.trim($("#pincode").val());
            var location = $.trim($("#location").val());
            var mobile = $.trim($("#mobile").val());
         <?php if (isset($_SESSION['username'])) { ?>
            var username = "<?php echo $_SESSION['username']; ?>";
         <?php } ?>
            
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=AddressDetails",
                data: {
                    "addresssave": 1,
                    "street": street,
                    "houseno": houseno,
                    "pincode": pincode,
                    "location": location,
                    "mobile": mobile,
                    "username": username,
                },
 
                success: function(data) {
                  
                    if (data == 1) {
                                
                        $('.new-address').show();
                        $('#bottom-address').hide();
                        Address();

                    } else {
                        alert("Please Enter Valid Address");
                    }
                }
            });
            
    })




     function Address() {
         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>       

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=Address",
                data: {
                    "getaddress": 5,
                    "username": username,
                },
                
                success: function(data) {

                
                    $("#your_address").html(data);
                
                }
           });
      }


// Your Address

    $('.your-details').click(function() {
            
        if ($("input[name='radio']:checked").length == 0) {       
            var error = "Please Select Address";
            $('.error').text(error);
      } 

    else {
            var error = "";
            $('.error').text(error);
            var Address = $('input[name="radio"]:checked').val();

            $(".tab1  .nav-link").removeClass('active');
            $(".tab-content .text-one").removeClass('active');
            $(".tab-content .text-two ").removeClass('show');
            $(".tab1  .nav-link").addClass('completed');
            $(".tab2  .nav-link").removeClass('active');
            $(".tab2  .nav-link").removeClass('disabled');
            $(".tab-content .text-two").removeClass('active');
            $(".tab-content .text-two").removeClass('show');
            $(".tab2  .nav-link").addClass('completed');
            $(".tab3  .nav-link").removeClass('active');
            $(".tab3  .nav-link").removeClass('disabled');
            $(".tab-content .text-third").removeClass('active');
            $(".tab-content .text-third ").removeClass('show');
            $(".tab3  .nav-link").addClass('completed');
            $(".tab4  .nav-link").addClass('show');
            $(".tab4  .nav-link").addClass('active');
            $(".tab-content .text-fourth").addClass('active');
            $(".tab-content .text-fourth").addClass('show');
            $("#iframeloading").hide();
          }
  });


// Payment

        
    $('.promocode').click(function() {
       var err = "Promocode Doesn't Exists";
       $('.err').text(err);
    });

    $('.confirmpayment').click(function(e) {
        e.preventDefault();

        if ($('.card_number').val().length == 0) {
            $('.card-number-error').addClass('invalid-msg').text("* Card Number is Required");
            $('.payment-card').addClass('invalid-input').removeClass('valid-input');

            $('.invalid-msg').css({
               "display": "block",
               "margin-top": "11px",
            });

        } else if($('.card_number').val().length < 16) {
            $('.card-number-error').addClass('invalid-msg').text("* Please enter the valid card number");
            $('.payment-card').addClass('invalid-input').removeClass('valid-input');

            $('.invalid-msg').css({
                "display": "block",
                "margin-top": "11px",
        });            

        } else if($('.card_number').val().length == 16) {
                $('.card-number-error').removeClass('invalid-msg').text("");
                $('.payment-card').removeClass('invalid-input').addClass('valid-input');
        }

     
          if ($('#expiry-date').val().length == 0) {
                $('.card-date-error').addClass('invalid-msg').text("* Expiry Date is Required");
                $('.payment-card').addClass('invalid-input').removeClass('valid-input');

                $('.invalid-msg').css({
                    "display": "block",
                    "margin-top": "11px",
          })


        } else if ($('#expiry-date').val().length != 5) {
                $('.card-date-error').addClass('invalid-msg').text("* Please enter the valid date");
                $('.payment-card').addClass('invalid-input').removeClass('valid-input');

                $('.invalid-msg').css({
                    "display": "block",
                    "margin-top": "11px",
         })


        } else if ($('#expiry-date').val().length == 5) {
                $('.card-date-error').removeClass('invalid-msg').text("");
                $('.payment-card').removeClass('invalid-input').addClass('valid-input');
        } 

        if ($('.cvv').val().length == 0) {
                $('.card-cvv-error').addClass('invalid-msg').text("* CVV is Required");
                $('.payment-card').addClass('invalid-input').removeClass('valid-input');

                $('.invalid-msg').css({
                    "display": "block",
                    "margin-top": "11px",
        });
        
        } else if ($('.cvv').val().length != 3) {
                $('.card-cvv-error').addClass('invalid-msg').text("* Please Enter Valid 3 Digit CVV");
                $('.payment-card').addClass('invalid-input').removeClass('valid-input');

                $('.invalid-msg').css({
                    "display": "block",
                    "margin-top": "11px",
                });
        
        } else if ($('.cvv').val().length == 3) {
                $('.card-cvv-error').removeClass('invalid-msg').text("");
                $('.payment-card').removeClass('invalid-input').addClass('valid-input');
        } 


        if ($(".condition").not(':checked')) {
                var condition_err = "* You Must Agree with Term and conditions";
                $('.condition_err').text(condition_err);
        } else {
                $('.card-cvv-error').removeClass('invalid-msg');
                $('.card-number-error').removeClass('invalid-msg');
                $('.card-date-error').removeClass('invalid-msg');
        }

        if ($(".condition").is(':checked')) {
                var condition_err = "";
                $('.condition_err').text(condition_err);
                if ($('.cvv').val().length == 3) {                 
                    $('.card-cvv-error').removeClass('invalid-msg');
                    $('.payment-card').addClass('valid-input').removeClass('invalid-input');
            }
        }
        
        if ($(".invalid-input").length == 0 && $(".condition").is(':checked')) {
                 pincode = $("#postalcode").val();
                 service_rate = "$18";
                 plan_bed = $("#plan-bed option:selected").text();
                 plan_bath = $("#plan-bath option:selected").text();
                 plan_hour = $("#plan-hour option:selected").text();
                 plan_date = $.trim($("#plan-date").val());
                 plan_time = $("#plan-time option:selected").text();
                 more_time = 0;
                 name_item = '';
   
        if ($(".service1").css('display') == 'block') {
                 var first_service = "0.5";
                 first_service = parseFloat(first_service);
                 more_time = more_time + 0.5;
                 name_item = name_item + [' Inside cabinets ,'];
            }

        if ($(".service2").css('display') == 'block') {
                 var second_service = "0.5";
                 second_service = parseFloat(second_service);
                 more_time = more_time + 0.5;
                 name_item = name_item + [' Inside fridge ,'];
            }

            if ($(".service3").css('display') == 'block') {
                 var third_service = "0.5";
                 third_service = parseFloat(third_service);
                 more_time = more_time + 0.5;
                 name_item = name_item + [' Inside oven ,'];
            }

            if ($(".service4").css('display') == 'block') {
                 var fourth_service = "0.5";
                 fourth_service = parseFloat(fourth_service);
                 more_time = more_time + 0.5;
                 name_item = name_item + [' Laundry wash & dry ,'];
            }

            if ($(".service5").css('display') == 'block') {
                 var fifth_service = "0.5";
                 fifth_service = parseFloat(fifth_service);
                 more_time = more_time + 0.5;
                 name_item = name_item + [' Interior windows'];
            }
                 Extra_item = name_item;
                 more_times = more_time;

                
                 var basic = $('.basic span').text();
                 basics = parseFloat(basic);

                 var Cars_Amount = $('.card_amount span').text();
                 Cars_Amount = Cars_Amount.slice(1);
                 Card_Amounts = parseFloat(Cars_Amount);

                 var Total_Payment = $('.total-payment span').text();
                 Total_Payment = Total_Payment.slice(1);
                 Total_Payments = parseFloat(Total_Payment);
               
                 var Effective_Price = $('.effective-price span').text();
                 Effective_Price = Effective_Price.slice(1);
                 Effective_Prices = parseFloat(Effective_Price);
               
                 paymentdue = 0;
               
                 Discount = 0;
               
                 comments = $.trim($("#comments").val());
                 if ($('#pets').is(":checked")) {
                     pets = "yes";                                                               
                 } else {
                     pets = "no";
                 }
                 Address = $('input[name="radio"]:checked').val();
                 
                 Request();
            }

        });



   function Request() {

    $('.spinner').show();
    $('.parent-spinner').show();

    <?php if (isset($_SESSION['username'])) { ?>
        username = "<?php echo $_SESSION['username']; ?>";
    <?php } ?>
             
             Booking = ({
                 
                 "username": username,
                 "plan_date": plan_date,
                 "plan_time": plan_time,
                 "pincode": pincode,
                 "service_rate": service_rate,
                 "basics": basics,
                 "more_time": more_time,
                 "plan_hour": plan_hour,
                 "plan_bed": plan_bed,
                 "plan_bath": plan_bath,
                 "card_amounts": Card_Amounts,
                 "discount": Discount,
                 "total_payments": Total_Payments,
                 "effective_prices": Effective_Prices,
                 "extra_item": Extra_item,
                 "comments": comments,
                 "address": Address,
                 "paymentdue": paymentdue,                                      
                 "pets": pets,
              
             });
        
 
             $.ajax({
                 type: 'POST',
                 url: "http://localhost/Helperland/?controller=Helperland&function=Request",
                 data: Booking,
              
                 success: function(data) {

                   
                    $('.spinner').hide();
                    $('.parent-spinner').hide();
                     
                     if (data == 0) {
                    
                         Swal.fire({
                             title: 'Your booking has not been completed. Please try again.', 
                             text: 'Your id is ',
                             icon: 'error',
                             confirmButtonText: 'Ok'
                         })
                     } else {
                    
                         Swal.fire({
                             title: 'Booking has been Completed.',
                             text: 'Service Request Id: ' + data,
                             icon: 'success',
                             confirmButtonText: 'Done'
                         }).then(function() {
                             location.href = "http://localhost/Helperland/Views/customer-dashboard.php";
  
                         });
                   }
                 }
             });
         }



</script>
