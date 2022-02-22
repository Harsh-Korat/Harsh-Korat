<script>

// Setup Services

    $(document).ready(function() {
        <?php if (isset($_SESSION['username'])) { ?>
            
            var username = "<?php echo $_SESSION['username']; ?>";

        <?php } ?>

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
                    url: "http://localhost/Helperland/?controller=Helperland&function=PostalCode",
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
                                },
                                dataType: 'json',
                                success: function(data) {
                                    optionText = data[0];
                                    optionValue = data[0];

                            $('#location').append(`<option value="${optionValue}" selected> ${optionText} </option>`);
                                }
                            });
                        } else {
                            var response = "Postal Code Not Available";
                            $('#postal-message').text(response);
                            
                        }

                    }

                });

            } else {
                var postalerror = "Please Enter Valid Postal Code";
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
     
        var plan_bed = $("#plan-bed option:selected").text();
        var plan_bath = $("#plan-bath option:selected").text();
        var plan_hour = $("#plan-hour option:selected").text();
        var plan_date = $.trim($("#plan-date").val());
        var plan_time = $("#plan-time option:selected").text();
        var extrahour = 0;

        if ($(".service1").css('display') == 'block') {
           var first_service = "0.5";
           first_service = parseFloat(first_service);
           extrahour = extrahour + 0.5;
        }

        if ($(".service2").css('display') == 'block') {
            var second_service = "0.5";
            second_service = parseFloat(second_service);
            extrahour = extrahour + 0.5;
        }

        if ($(".service3").css('display') == 'block') {
            var third_service = "0.5";
            third_service = parseFloat(third_service);
            extrahour = extrahour + 0.5;
        }

        if ($(".service4").css('display') == 'block') {
            var fourth_service = "0.5";
            fourth_service = parseFloat(fourth_service);
            extrahour = extrahour + 0.5;
        }

        if ($(".service5").css('display') == 'block') {
            var fifth_service = "0.5";
            fifth_service = parseFloat(fifth_service);
            extrahour = extrahour + 0.5;
        }

            var servicehours = $('.basics span').text();
            servicehours = parseFloat(servicehours);

            var SubTotal = $('.subtotal span').text();
            SubTotal = SubTotal.slice(1);
            SubTotal = parseFloat(SubTotal);
            var Discount = $('.discount span').text();

            Discounts = Discount.slice(4);
            Discount = parseFloat(Discounts);

            var TotalCost = $('.total span').text();
            TotalCost = TotalCost.slice(1);
            TotalCost = parseFloat(TotalCost);

            var comments = $.trim($("#comments").val());

            if ($('#pets').is(":checked")) {
                var pets = "yes";
            } else {
                var pets = "no";
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
                        alert("please Enter valid Address");
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
                
                    $("#alladdress").html(data);
                
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

        } else if($('.card_number').val().length < 12) {
            $('.card-number-error').addClass('invalid-msg').text("* Please enter the valid card number");
            $('.payment-card').addClass('invalid-input').removeClass('valid-input');

            $('.invalid-msg').css({
                "display": "block",
                "margin-top": "11px",
        });            

        } else if($('.card_number').val().length == 12) {
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
                 servicehourate = "$18";
                 plan_bed = $("#plan-bed option:selected").text();
                 plan_bath = $("#plan-bath option:selected").text();
                 plan_hour = $("#plan-hour option:selected").text();
                 plan_date = $.trim($("#plan-date").val());
                 plan_time = $("#plan-time option:selected").text();
                 extrahour = 0;
                 elements = '';
   
        if ($(".service1").css('display') == 'block') {
                 var first_service = "0.5";
                 first_service = parseFloat(first_service);
                 extrahour = extrahour + 0.5;
                 elements = elements + [' Inside cabinets ,'];
            }

        if ($(".service2").css('display') == 'block') {
                 var second_service = "0.5";
                 second_service = parseFloat(second_service);
                 extrahour = extrahour + 0.5;
                 elements = elements + [' Inside fridge ,'];
            }

            if ($(".service3").css('display') == 'block') {
                 var third_service = "0.5";
                 third_service = parseFloat(third_service);
                 extrahour = extrahour + 0.5;
                 elements = elements + [' Inside oven ,'];
            }

            if ($(".service4").css('display') == 'block') {
                 var fourth_service = "0.5";
                 fourth_service = parseFloat(fourth_service);
                 extrahour = extrahour + 0.5;
                 elements = elements + [' Laundry wash & dry ,'];
            }

            if ($(".service5").css('display') == 'block') {
                 var fifth_service = "0.5";
                 fifth_service = parseFloat(fifth_service);
                 extrahour = extrahour + 0.5;
                 elements = elements + [' Interior windows'];
            }
                 Extraservice = elements;
                 extrahours = extrahour;

                 selectedsp = "";
                 if ($('.selectbtn').hasClass('selectedsp')) {
                     selectedsp = $('.selectedsp').val();
                 }
                 var servicehour = $('.basics span').text();
                 servicehours = parseFloat(servicehour);

                 var SubTotals = $('.subtotal span').text();
                 SubTotals = SubTotals.slice(1);
                 SubTotal = parseFloat(SubTotals);
                 var Discounts = $('.discount span').text();
                 
                 Discounts = Discounts.slice(4);
                 Discount = parseFloat(Discounts);
                 var TotalCosts = $('.total span').text();
                 TotalCosts = TotalCosts.slice(1);
                 TotalCost = parseFloat(TotalCosts);
                 var EffectiveCosts = $('.effective-price span').text();
                 EffectiveCosts = EffectiveCosts.slice(1);
                 EffectiveCost = parseFloat(EffectiveCosts);
                 paymentdue = 0;
                 comments = $.trim($("#comments").val());
                 if ($('#pets').is(":checked")) {
                     pets = "yes";                                                               
                 } else {
                     pets = "no";
                 }
                 Address = $('input[name="radio"]:checked').val();

                 ServieRequest();
            }

        });



 function ServieRequest() {
             <?php if (isset($_SESSION['username'])) { ?>
                 username = "<?php echo $_SESSION['username']; ?>";

             <?php } ?>
             
             FinalSubmits = ({
                 "addservicerequest": 11,
                 "username": username,
                 "plan_date": plan_date,
                 "plan_time": plan_time,
                 "zipcode": pincode,
                 "servicehourate": servicehourate,
                 "servicehours": servicehours,
                 "extrahour": extrahours,
                 "totalhour": plan_hour,
                 "totalbed": plan_bed,
                 "totalbath": plan_bath,
                 "subtotal": SubTotal,
                 "discount": Discount,
                 "totalcost": TotalCost,
                 "effectivecost": EffectiveCost,
                 "extraservice": Extraservice,
                 "comments": comments,
                 "addressid": Address,
                 "paymentdue": paymentdue,                                      
                 "haspets": pets,
                 "selectedsp": selectedsp,
             });
             $("#iframeloading").show();

             $.ajax({
                 type: 'POST',
                 url: "http://localhost/Helperland/?controller=Helperland&function=ServiceRequest",
                 data: FinalSubmits,
                
                 success: function(data) {
                     
                     if (data == 0) {
                
                         Swal.fire({
                             title: 'Data not Inserted ', 
                             text: 'Your id is ',
                             icon: 'error',
                             confirmButtonText: 'Done'
                         })
                     } else {
                         Swal.fire({
                             title: 'Booking has been successfully submitted',
                             text: 'Service Request Id: ' + data,
                             icon: 'success',
                             confirmButtonText: 'Ok'
                         }).then(function() {
                             location.href = "Customer-Servicehistory.php";

                         });
                   }
                 }
             });
         }

</script>