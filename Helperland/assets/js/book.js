
$(document).ready(function () {

 $('#street').on('input', function () {
    var lastName = $(this).val();
    var validName = /^[a-zA-Z ]*$/;;
 
     if (lastName.length == 0) {
         $('.street-message').addClass('invalid-msg').text("Street is required");
         $(this).addClass('invalid-input').removeClass('valid-input');

     }
 
     else if (!validName.test(lastName)) {
         $('.street-message').addClass('invalid-msg').text('White Space Are Not Allowed');
         $(this).addClass('invalid-input').removeClass('valid-input');
     }
 
     else {
         $('.street-message').empty();
         $(this).addClass('valid-input').removeClass('invalid-input');
     }
});


 $('#mobile').on('input', function () {
     var mobileNum = $(this).val();
     var validNumber = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
  
      if (mobileNum.length == 0) {
         $('.mobile-message').addClass('invalid-msg').text('Mobile Number is required');
         $(this).addClass('invalid-input').removeClass('valid-input');
     }
  
     else if (!validNumber.test(mobileNum)) {
         $('.mobile-message').addClass('invalid-msg').text('Invalid Mobile Number');
         $(this).addClass('invalid-input').removeClass('valid-input');
     }
  
     else {
         $('.mobile-message').empty();
         $(this).addClass('valid-input').removeClass('invalid-input');
     }
});


  $('#houseno').on('input', function () {
     var houseNum = $(this).val();
     var validNumber = /^\d*$/;
 
      if (houseNum.length == 0) {
         $('.house-message').addClass('invalid-msg').text('House Number is required');
         $(this).addClass('invalid-input').removeClass('valid-input');
     }
 
     else if (!validNumber.test(houseNum)) {
         $('.house-message').addClass('invalid-msg').text('Enter Valid House Number');
         $(this).addClass('invalid-input').removeClass('valid-input');
     }
 
     else {
         $('.house-message').empty();
         $(this).addClass('valid-input').removeClass('invalid-input');
     }
 });


 $('input').on('input', function (e) {
     if ($('.add_address').find('.valid-input').length == 3) {
         $('.save-details').removeAttr('disabled');
         $('.save-details').css('cursor', 'pointer');
     }
     else {
         $('.save-details').attr('disabled', 'disabled');
         $('.save-details').css('cursor', 'not-allowed');
     }
  });
});



$(document).ready(function () {

  var tomorrow = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
  var tomday = tomorrow.getDate();
  var tommonth = tomorrow.getMonth() + 1;
  var tomyear = tomorrow.getFullYear();

  if (tomday < 10) {
      tomday = '0' + tomday
  }
  if (tommonth < 10) {
      tommonth = '0' + tommonth
  }
  tomorrow = tomday + '/' + tommonth + '/' + tomyear;
  document.querySelector('.date-time').innerHTML = tomorrow;
  $("#plan-date").attr("value", tomorrow);


  $("#plan-bed").on("change", function () {
      plan_bed();
  });

  $("#plan-time").on("change", function () {
      plan_time();
  });

  $("#plan-bath").on("change", function () {
      plan_bath();
  });

  $("#plan-hour").on("change", function () {
      plan_hour();
  });

  $(".first-img1").click(function () {
      plan_img1();
  });

  $(".second-img").click(function () {
      plan_img2();
  });

  $(".third-img").click(function () {
     plan_img3();
  });

  $(".fourth-img").click(function () {
      plan_img4();
  });

  $(".fifth-img").click(function () {
      plan_img5();
  });

  function Time_collect() {

    var times = parseFloat($('#plan-time').val());
    var hours = parseFloat($("#plan-hour").val());

    times_hours = times + hours 

   if (times_hours < 21) {
      $('.times_hours').text("");
   } else {
      $('.times_hours').text("Helper must be able to finish cleaning by 9pm.");
   }
}

  var toggle = true;



  function plan_img1() {

    var mobile_time = $(".total-time-mobile").text();
    var mobile_time = parseFloat(mobile_time);
    var mobile_required_time = mobile_time; 
    var card_time = $(".total-time-include").text();
    var card_time = parseFloat(card_time);
    var card_required_time = card_time;
     Time_collect();

      if (toggle == true) {
        $(".first-img1").css({
          "border": "3px solid #1D7A8C"
        });

        document.getElementById('img_1').src = '../assets/image/3-green.png';
        $(".selected_item .extra_item").css("display", "block");
        $(".selected_item .service1").css("display", "block");
            
        var hr = document.querySelector('#plan-hour').selectedIndex + 1;
        document.querySelector('#plan-hour').options.selectedIndex = hr;

        card_required_time = card_required_time + 0.5;
        mobile_required_time = mobile_required_time + 0.5;

        document.querySelector('.total-time-include').innerHTML = card_required_time + ' Hrs';
        document.querySelector('.total-time-mobile').innerHTML = mobile_required_time + ' Hrs';

        } else {

        document.getElementById('img_1').src = '../assets/image/3.png';
        $(".first-img1").css({
            "border": "1px solid #C8C8C8"
        });
            
        $(".selected_item .service1").css("display", "none");
        var hr = document.querySelector('#plan-hour').selectedIndex - 1;
        document.querySelector('#plan-hour').options.selectedIndex = hr;
    
        var alredy_card_time = $('.total-time-include').text();
        var alredy_card_time = parseFloat(alredy_card_time);
        alredy_card_time = alredy_card_time - 0.5;

        var alredy_time = $('.total-time-mobile').text();
        var alredy_time = parseFloat(alredy_time);
        alredy_time = alredy_time - 0.5;

        document.querySelector('.total-time-include').innerHTML = alredy_card_time + ' Hrs';
        document.querySelector('.total-time-mobile').innerHTML = alredy_time + ' Hrs';

    }

    toggle = !toggle;
 }
  
    var toggle1 = true;

  
    function plan_img2() {

       Time_collect();
       var mobile_time = $(".total-time-mobile").text();
       var card_time = $(".total-time-include").text();
       var card_time = parseFloat(card_time);
       var card_required_time = card_time;
       var mobile_time = $(".total-time-mobile").text();
       var mobile_time = parseFloat(mobile_time);
       var mobile_required_time = mobile_time;

       if (toggle1 == true) {
          $(".second-img").css({
              "border": "3px solid #1D7A8C"
         });


            document.getElementById('img_2').src = '../assets/image/5-green.png';
            $(".selected_item .extra_item").css("display", "block");
            $(".selected_item .service2").css("display", "block");

            var hr = document.querySelector('#plan-hour').selectedIndex + 1;
            document.querySelector('#plan-hour').options.selectedIndex = hr;
            card_required_time = card_required_time + 0.5;
            mobile_required_time = mobile_required_time + 0.5;
    
            document.querySelector('.total-time-include').innerHTML = card_required_time + ' Hrs';
            document.querySelector('.total-time-mobile').innerHTML = mobile_required_time + ' Hrs';

        } else {
            document.getElementById('img_2').src = '../assets/Image/5.png';
            $(".second-img").css({
                "border": "1px solid #C8C8C8"
            });
            $(".selected_item .service2").css("display", "none");

            var hr = document.querySelector('#plan-hour').selectedIndex - 1;
            document.querySelector('#plan-hour').options.selectedIndex = hr;
     
            var alredy_card_time = $('.total-time-include').text();
            var alredy_card_time = parseFloat(alredy_card_time);
            alredy_card_time = alredy_card_time - 0.5;
     
            var alredy_time = $('.total-time-mobile').text();
            var alredy_time = parseFloat(alredy_time);
            alredy_time = alredy_time - 0.5;
     
            document.querySelector('.total-time-include').innerHTML = alredy_card_time + ' Hrs';
            document.querySelector('.total-time-mobile').innerHTML = alredy_time + ' Hrs';

      }
      toggle1 = !toggle1;
}
    var toggle2 = true;

  

    function plan_img3() {
        Time_collect();
           
           var card_time = $(".total-time-include").text();
           var card_time = parseFloat(card_time);
           var card_required_time = card_time;
           var mobile_time = $(".total-time-mobile").text();
           var mobile_time = parseFloat(mobile_time);
           var mobile_required_time = mobile_time;
  
        if (toggle2 == true) {
          $(".third-img").css({
           "border": "3px solid #1D7A8C"
        });
  
            document.getElementById('img_3').src = '../assets/image/4-green.png';
            $(".selected_item .extra_item").css("display", "block");
            $(".selected_item .service3").css("display", "block");

            var hr = document.querySelector('#plan-hour').selectedIndex + 1;
            document.querySelector('#plan-hour').options.selectedIndex = hr;
            card_required_time = card_required_time + 0.5;
            mobile_required_time = mobile_required_time + 0.5;
            document.querySelector('.total-time-include').innerHTML = card_required_time + ' Hrs';
            document.querySelector('.total-time-mobile').innerHTML = mobile_required_time + ' Hrs';

        } else {
            document.getElementById('img_3').src = '../assets/image/4.png';
            $(".third-img").css({
                "border": "1px solid #C8C8C8"
            });
            
            $(".selected_item .service3").css("display", "none");
            var hr = document.querySelector('#plan-hour').selectedIndex - 1;
            document.querySelector('#plan-hour').options.selectedIndex = hr;
        
            var alredy_card_time = $('.total-time-include').text();
            var alredy_card_time = parseFloat(alredy_card_time);
            alredy_card_time = alredy_card_time - 0.5;
            var alredy_time = $('.total-time-mobile').text();
            var alredy_time = parseFloat(alredy_time);
            alredy_time = alredy_time - 0.5;
            document.querySelector('.total-time-include').innerHTML = alredy_card_time + ' Hrs';
            document.querySelector('.total-time-mobile').innerHTML = alredy_time + ' Hrs';
    }

    toggle2 = !toggle2;
}
    var toggle3 = true;



    function plan_img4() {
           Time_collect();
           var card_time = $(".total-time-include").text();
           var card_time = parseFloat(card_time);
           var card_required_time = card_time;
           var mobile_time = $(".total-time-mobile").text();
           var mobile_time = parseFloat(mobile_time);
           var mobile_required_time = mobile_time;
           
           if (toggle3 == true) {
            $(".fourth-img").css({
                "border": "3px solid #1D7A8C"
            });
           
            document.getElementById('img_4').src = '../assets/image/2-green.png';
            $(".selected_item .extra_item").css("display", "block");
            $(".selected_item .service4").css("display", "block");

            var hr = document.querySelector('#plan-hour').selectedIndex + 1;
            document.querySelector('#plan-hour').options.selectedIndex = hr;
            card_required_time = card_required_time + 0.5;
            mobile_required_time = mobile_required_time + 0.5;

            document.querySelector('.total-time-include').innerHTML = card_required_time + ' Hrs';
            document.querySelector('.total-time-mobile').innerHTML = mobile_required_time + ' Hrs';


        } else {
            document.getElementById('img_4').src = '../assets/image/2.png';
            $(".fourth-img").css({
                "border": "1px solid #C8C8C8"
            });
           
            $(".selected_item .service4").css("display", "none");
            var hr = document.querySelector('#plan-hour').selectedIndex - 1;
            document.querySelector('#plan-hour').options.selectedIndex = hr;
        
            var alredy_card_time = $('.total-time-include').text();
            var alredy_card_time = parseFloat(alredy_card_time);
            alredy_card_time = alredy_card_time - 0.5;
           
            var alredy_time = $('.total-time-mobile').text();
            var alredy_time = parseFloat(alredy_time);
            alredy_time = alredy_time - 0.5;
           
            document.querySelector('.total-time-include').innerHTML = alredy_card_time + ' Hrs';
            document.querySelector('.total-time-mobile').innerHTML = alredy_time + ' Hrs';

    }
     toggle3 = !toggle3;
}
    var toggle4 = true;



    function plan_img5() {
           Time_collect();
           var card_time = $(".total-time-include").text();
           var card_time = parseFloat(card_time);
           var card_required_time = card_time;
           var mobile_time = $(".total-time-mobile").text();
           var mobile_time = parseFloat(mobile_time);
           var mobile_required_time = mobile_time;
           
        if (toggle4 == true) {
            $(".fifth-img").css({
                "border": "3px solid #1D7A8C"
            });
        
            document.getElementById('img_5').src = '../assets/image/1-green.png';
            $(".selected_item .extra_item").css("display", "block");
            $(".selected_item .service5").css("display", "block");
            var hr = document.querySelector('#plan-hour').selectedIndex + 1;
        
            document.querySelector('#plan-hour').options.selectedIndex = hr;
            card_required_time = card_required_time + 0.5;
            mobile_required_time = mobile_required_time + 0.5;

            document.querySelector('.total-time-include').innerHTML = card_required_time + ' Hrs';
            document.querySelector('.total-time-mobile').innerHTML = mobile_required_time + ' Hrs';

        } else {
            document.getElementById('img_5').src = '../assets/image/1.png';
            $(".fifth-img").css({
                "border": "1px solid #C8C8C8"
            });
        
            $(".selected_item .service5").css("display", "none");
            var hr = document.querySelector('#plan-hour').selectedIndex - 1;
            document.querySelector('#plan-hour').options.selectedIndex = hr;
        
            var alredy_card_time = $('.total-time-include').text();
            var alredy_card_time = parseFloat(alredy_card_time);
            alredy_card_time = alredy_card_time - 0.5;
        
            var alredy_time = $('.total-time-mobile').text();
            var alredy_time = parseFloat(alredy_time);
            alredy_time = alredy_time - 0.5;
        
            document.querySelector('.total-time-include').innerHTML = alredy_card_time + ' Hrs';
            document.querySelector('.total-time-mobile').innerHTML = alredy_time + ' Hrs';

    }
    toggle4 = !toggle4;
}



    function plan_bath() {
        var card_time = $("#plan-bath option:selected").text();
        document.querySelector('.number_bath').innerHTML = card_time;
        document.querySelector('.number_bath_modal').innerHTML = card_time;
}


    function plan_bed() {
        var card_time = $("#plan-bed option:selected").text();
        document.querySelector('.number_bed').innerHTML = card_time;
        document.querySelector('.number_bed_modal').innerHTML = card_time;
    }


   function plan_time() {
        Time_collect();
        var card_time = $("#plan-time option:selected").text();
        document.querySelector('.time-date').innerHTML = card_time;
        document.querySelector('.time-date_modal').innerHTML = card_time;
    }



 function plan_hour(time) {
        Time_collect();

        var totalhrs = document.querySelector('.total-time-include').innerHTML;
        var totalhr = parseFloat(totalhrs);
        var mobile_time = document.querySelector('#plan-hour').selectedIndex;
        var selecthours = document.querySelector("#plan-hour").options[mobile_time].innerHTML;
        var card_time = parseFloat(document.querySelector("#plan-hour").options[mobile_time].innerHTML);

        var totalhrsq = document.querySelector('.total-time-mobile').innerHTML;
        var totalhrq = parseFloat(totalhrsq);
        var mobile_timeq = document.querySelector('#plan-hour').selectedIndex;
        var selecthoursq = document.querySelector("#plan-hour").options[mobile_time].innerHTML;
        var card_timeq = parseFloat(document.querySelector("#plan-hour").options[mobile_time].innerHTML);

         if ((card_time < totalhr) && ($('.service1').css("display") == "block" || $('.service2').css("display") == "block" || $('.service3').css("display") == "block" || $('.service4').css("display") == "block" || $('.service5').css("display") == "block")) {
            document.querySelector('#plan-hour').value = totalhr;
            $('#timeModal').modal('show');
         
        } else if ((mobile_timeq < totalhrsq) && ($('.service1').css("display") == "block" || $('.service2').css("display") == "block" || $('.service3').css("display") == "block" || $('.service4').css("display") == "block" || $('.service5').css("display") == "block")) {
            document.querySelector('#plan-hour').value = totalhrq;
              $('#timeModal').modal('show');
        }
        

        else {

        var card_time = $("#plan-hour option:selected").text();
        document.querySelector('.total-time-include').innerHTML = card_time;
        document.querySelector('.basic_hour').innerHTML = card_time;

        document.querySelector('.total-time-mobile').innerHTML = card_time;
        document.querySelector('.basic_hour_modal').innerHTML = card_time;
     
        if ($('.service1').css('display') == 'block') {
            var card_time = parseFloat(card_time);
            var card_time = card_time - 0.5;
            document.querySelector('.basic_hour').innerHTML = card_time + " Hrs";
            document.querySelector('.basic_hour_modal').innerHTML = card_time + " Hrs";
        }

        if ($('.service2').css('display') == 'block') {
            var card_time = parseFloat(card_time);
            var card_time = card_time - 0.5;
            document.querySelector('.basic_hour').innerHTML = card_time + " Hrs";
            document.querySelector('.basic_hour_modal').innerHTML = card_time + " Hrs";
        }

        if ($('.service3').css('display') == 'block') {
            var card_time = parseFloat(card_time);
            var card_time = card_time - 0.5;
            document.querySelector('.basic_hour').innerHTML = card_time + " Hrs";
            document.querySelector('.basic_hour_modal').innerHTML = card_time + " Hrs";
        }

        if ($('.service4').css('display') == 'block') {
            var card_time = parseFloat(card_time);
            var card_time = card_time - 0.5;
            document.querySelector('.basic_hour').innerHTML = card_time + " Hrs";
            document.querySelector('.basic_hour_modal').innerHTML = card_time + " Hrs";
        }

        if ($('.service5').css('display') == 'block') {
            var card_time = parseFloat(card_time);
            var card_time = card_time - 0.5;
            document.querySelector('.basic_hour').innerHTML = card_time + " Hrs";
            document.querySelector('.basic_hour_modal').innerHTML = card_time + " Hrs";
        }
     }
  }



    $('.total-time-include').on('DOMSubtreeModified', function () {
        Time_collect();
      
        var mobile_time = $(".total-time-include").text();
        var mobile_time = parseFloat(mobile_time);
        var mobile_price = mobile_time * 18;
        document.querySelector('.amount').innerHTML = '$' + mobile_price;
        document.querySelector('.amounts').innerHTML = '$' + mobile_price;
        var mobile_prices = (20 * mobile_price) / 100;
        var mobile_price_main = mobile_price - mobile_prices;
        document.querySelector('.effective').innerHTML = '$' + mobile_price_main;

    })


    $('.total-time-mobile').on('DOMSubtreeModified', function () {

        Time_collect();
        var mobile_time = $(".total-time-mobile").text();
        var mobile_time = parseFloat(mobile_time);
        var mobile_price = mobile_time * 18;
        document.querySelector('.amount_model').innerHTML = '$' + mobile_price;
        document.querySelector('.amounts_model').innerHTML = '$' + mobile_price;

        document.querySelector('.amount-btn').innerHTML = '$' + mobile_price;

        var mobile_prices = (20 * mobile_price) / 100;
        var mobile_price_main = mobile_price - mobile_prices;
        document.querySelector('.effective_model').innerHTML = '$' + mobile_price_main;

    })

});
