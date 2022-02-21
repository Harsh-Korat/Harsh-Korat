<script>

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
                    url: "http://localhost/Helperland/?controller=Helperland&function=CheckPostalCode",
                    data: {
                        "check_postal": 1,
                        "postal": postal,
                    },

                    success: function(data) {

                         GetAddress();
                        // $("#iframeloading").hide();
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
                                url: "http://localhost/Helperland/?controller=Helperland&function=GetLocationCity",
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


   $(".scheduleandplan").on("click", function(e) {
            e.preventDefault();
     
                var selectbed = $("#selectbed option:selected").text();
                var selectbath = $("#selectbath option:selected").text();
                var selecthour = $("#selecthour option:selected").text();
                var selectdate = $.trim($("#selectdate").val());
                var selectime = $("#selectime option:selected").text();
                var extrahour = 0;
                if ($(".extra1").css('display') == 'block') {
                    var firstservice = "0.5";
                    firstservice = parseFloat(firstservice);
                    extrahour = extrahour + 0.5;

                }
                if ($(".extra2").css('display') == 'block') {
                    var secondservice = "0.5";
                    secondservice = parseFloat(secondservice);
                    extrahour = extrahour + 0.5;
                }
                if ($(".extra3").css('display') == 'block') {
                    var thirdservice = "0.5";
                    thirdservice = parseFloat(thirdservice);
                    extrahour = extrahour + 0.5;

                }
                if ($(".extra4").css('display') == 'block') {
                    var fourthservice = "0.5";
                    fourthservice = parseFloat(fourthservice);
                    extrahour = extrahour + 0.5;

                }
                if ($(".extra5").css('display') == 'block') {
                    var fifthservice = "0.5";
                    fifthservice = parseFloat(fifthservice);
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

                if ($('#petsornot').is(":checked")) {
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

    
/*
    function GetFavouriteServiceProvider() {
            <?php if (isset($_SESSION['username'])) { ?>

                var username = "<?php echo $_SESSION['username']; ?>";
            <?php } ?>
            $("#iframeloading").show();

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=GetFavouriteServiceProvider",
                data: {
                    "getserviceproviders": 7,
                    "username": username,
                },
                // dataType: 'json',
                success: function(data) {
                    $("#iframeloading").hide();

                    // alert(data);
                    $('.favouriteserviceprovider').html(data);
                }
            });
        }


*/

        $(".addresssave").on("click", function(e) {
            e.preventDefault();

            var street = $.trim($("#street").val());
            var houseno = $.trim($("#houseno").val());
            var pincode = $.trim($("#pincode").val());
            var location = $.trim($("#location").val());
            var mobilenum = $.trim($("#mobilenum").val());
            <?php if (isset($_SESSION['username'])) { ?>

                var username = "<?php echo $_SESSION['username']; ?>";
            <?php } ?>
            //$("#iframeloading").show();


            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=InsertAddress",
                data: {
                    "addresssave": 1,
                    "street": street,
                    "houseno": houseno,
                    "pincode": pincode,
                    "location": location,
                    "mobilenum": mobilenum,
                    "username": username,
                },
 
                success: function(data) {
                    if (data == 1) {
                        //$("#iframeloading").hide();
                        
                        $('.new-address').show();
                        $('#bottom-address').hide();
                        GetAddress();

                    } else {
                        alert("please Enter valid Address");
                    }
                }
            });
            


        })


        function GetAddress() {
            username = '';
            <?php if (isset($_SESSION['username'])) { ?>

                username = "<?php echo $_SESSION['username']; ?>";
            <?php } ?>
            //$("#iframeloading").show();

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=GetAddress",
                data: {
                    "getaddress": 5,
                    "username": username,
                },
                
                success: function(data) {
                  //  $("#iframeloading").hide();
                    $("#alladdress").html(data);
                    // $("#alladdress").html(data);
                }
            });


        }

        $('.yourdetailsbtn').click(function() {
            //$("#iframeloading").show();

            if ($("input[name='address_radio']:checked").length == 0) {
               // $("#iframeloading").hide();

                var adresserror = "Please Select Address";
                $('.addresserror').text(adresserror);
            
            } 

      else {

                  var adresserror = "";
                $('.addresserror').text(adresserror);

                var Address = $('input[name="address_radio"]:checked').val();

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


        $('.addpromocode').click(function() {
            var promoerr = "Promocode Doesn't Exists";
            $('.promoerr').text(promoerr);
        });


        $('.confirmpayment').click(function(e) {
            e.preventDefault();


            if ($('.payment-cardno').val().length == 0) {
                $('.validcardno').addClass('invalid-msg').text("* Card Number is Required");
                $('.cardpay').addClass('invalid-input').removeClass('valid-input');

                $('.invalid-msg').css({
                    "display": "block",
                    "margin-top": "11px",
                });

             } else if($('.payment-cardno').val().length < 12) {
                $('.validcardno').addClass('invalid-msg').text("* Please enter the valid card number");
                $('.cardpay').addClass('invalid-input').removeClass('valid-input');

                $('.invalid-msg').css({
                    "display": "block",
                    "margin-top": "11px",
                });
            
}

else if($('.payment-cardno').val().length == 12) {
                $('.validcardno').removeClass('invalid-msg').text("");
                $('.cardpay').removeClass('invalid-input').addClass('valid-input');

    
}

 if ($('#exp').val().length == 0) {
                $('.validcardate').addClass('invalid-msg').text("* Expiry Date is Required");
                $('.cardpay').addClass('invalid-input').removeClass('valid-input');

                $('.invalid-msg').css({
                    "display": "block",
                    "margin-top": "11px",
                })


            } else if ($('#exp').val().length != 5) {
                $('.validcardate').addClass('invalid-msg').text("* Please enter the valid date");
                $('.cardpay').addClass('invalid-input').removeClass('valid-input');

                $('.invalid-msg').css({
                    "display": "block",
                    "margin-top": "11px",
                })


            } 

else if ($('#exp').val().length == 5) {
                $('.validcardate').removeClass('invalid-msg').text("");
                $('.cardpay').removeClass('invalid-input').addClass('valid-input');


            } 


             if ($('.cvv').val().length == 0) {
                $('.validcardcvv').addClass('invalid-msg').text("* CVV is Required");
                $('.cardpay').addClass('invalid-input').removeClass('valid-input');

                $('.invalid-msg').css({
                    "display": "block",
                    "margin-top": "11px",
                });
            } else if ($('.cvv').val().length != 3) {
                $('.validcardcvv').addClass('invalid-msg').text("* Please Enter Valid 3 Digit CVV");
                $('.cardpay').addClass('invalid-input').removeClass('valid-input');

                $('.invalid-msg').css({
                    "display": "block",
                    "margin-top": "11px",
                });
            } 

else if ($('.cvv').val().length == 3) {
                $('.validcardcvv').removeClass('invalid-msg').text("");
                $('.cardpay').removeClass('invalid-input').addClass('valid-input');

              
            } 


            if ($(".Termsandconditions").not(':checked')) {
                var checkboxerr = "* You Must Agree with Term and conditions";
                $('.checkboxerr').text(checkboxerr);
            } else {
                $('.validcardcvv').removeClass('invalid-msg');
                $('.validcardno').removeClass('invalid-msg');
                $('.validcardate').removeClass('invalid-msg');

            }

            if ($(".Termsandconditions").is(':checked')) {
                var checkboxerr = "";
                $('.checkboxerr').text(checkboxerr);
                if ($('.cvv').val().length == 3) {
                    

                    $('.validcardcvv').removeClass('invalid-msg');
                    $('.cardpay').addClass('valid-input').removeClass('invalid-input');
                }
            }
             if ($(".invalid-input").length == 0 && $(".Termsandconditions").is(':checked')) {
              pincode = $("#postalcode").val();
               servicehourate = "$18";

                 selectbed = $("#selectbed option:selected").text();
                 selectbath = $("#selectbath option:selected").text();
                 selecthour = $("#selecthour option:selected").text();
                selectdate = $.trim($("#selectdate").val());
                 selectime = $("#selectime option:selected").text();
                 extrahour = 0;
                 elements = '';
                if ($(".extra1").css('display') == 'block') {
                     var firstservice = "0.5";
                     firstservice = parseFloat(firstservice);
                     extrahour = extrahour + 0.5;
                     elements = elements + [' Inside cabinets ,'];

                }
                 if ($(".extra2").css('display') == 'block') {
                     var secondservice = "0.5";
                    secondservice = parseFloat(secondservice);
                     extrahour = extrahour + 0.5;
                     elements = elements + [' Inside fridge ,'];
                 }
                 if ($(".extra3").css('display') == 'block') {
                     var thirdservice = "0.5";
                     thirdservice = parseFloat(thirdservice);
                     extrahour = extrahour + 0.5;
                     elements = elements + [' Inside oven ,'];


                 }
                 if ($(".extra4").css('display') == 'block') {
                     var fourthservice = "0.5";
                     fourthservice = parseFloat(fourthservice);
                     extrahour = extrahour + 0.5;
                     elements = elements + [' Laundry wash & dry ,'];


                 }
                 if ($(".extra5").css('display') == 'block') {
                     var fifthservice = "0.5";
                     fifthservice = parseFloat(fifthservice);
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
                 if ($('#petsornot').is(":checked")) {
                     pets = "yes";                                                               
                 } else {
                     pets = "no";
                 }
                 Address = $('input[name="address_radio"]:checked').val();

                 AddServieRequest();
            }

        });


 function AddServieRequest() {
             <?php if (isset($_SESSION['username'])) { ?>
                 username = "<?php echo $_SESSION['username']; ?>";

             <?php } ?>
             
             FinalSubmits = ({
                 "addservicerequest": 11,
                 "username": username,
                 "selectdate": selectdate,
                 "servicetime": selectime,
                 "zipcode": pincode,
                 "servicehourate": servicehourate,
                 "servicehours": servicehours,
                 "extrahour": extrahours,
                 "totalhour": selecthour,
                 "totalbed": selectbed,
                 "totalbath": selectbath,
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
                 url: "http://localhost/Helperland/?controller=Helperland&function=AddServiceRequest",
                 data: FinalSubmits,
                
                 success: function(data) {
                     $("#iframeloading").hide();

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