
$(document).ready(function () {

 $('#street').on('input', function () {
    var lastName = $(this).val();
    var validName = /^[a-zA-Z ]*$/;;
 
     if (lastName.length == 0) {
         $('.street-message').addClass('invalid-msg').text("Street is required");
         $(this).addClass('invalid-input').removeClass('valid-input');

     }
 
     else if (!validName.test(lastName)) {
         $('.street-message').addClass('invalid-msg').text('White Space Are not Allowed');
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

    /* $("#plan-date").on("change", function () {
        var selected = $(this).val();
        //alert(selected);

        document.querySelector('.date-time').innerHTML = selected;
       
    });*/


  $("#plan-bed").on("change", function () {
      Bed();
  });

  $("#plan-time").on("change", function () {
      Times();
  });

  $("#plan-bath").on("change", function () {
      Bath();
  });

  $("#plan-hour").on("change", function () {
      time();
  });

  $(".first-img1").click(function () {
      img1();
  });

  $(".second-img").click(function () {
      img2();
  });

  $(".third-img").click(function () {
      img3();
  });

  $(".fourth-img").click(function () {
      img4();
  });

  $(".fifth-img").click(function () {
      img5();
  });

  function selecttimes() {

    var selectedtimes = parseFloat($('#plan-time').val());
    var selectedhours = parseFloat($("#plan-hour").val());

    totaltimesh = selectedtimes + selectedhours

    /* if (totaltimesh >= 21) {
            $('.timingerr').text("Please Select less than 21 hour time");
        } else {
            $('.timingerr').text("");
          
        }
        */
 } 

  var toggle = true;

  function img1() {

    var datas = $(".total-time-mobile").text();
    var datas = parseFloat(datas);
    var times = datas; 
    var data = $(".total-time-include").text();
    var data = parseFloat(data);
    var time = data;
     selecttimes();

      if (toggle == true) {
        $(".first-img1").css({
          "border": "3px solid #1D7A8C"
        });

        document.getElementById('img_1').src = '../assets/image/3-green.png';
        $(".selected_item .extra_item").css("display", "block");
        $(".selected_item .service1").css("display", "block");
            
        var selecthr = document.querySelector('#plan-hour').selectedIndex + 1;
        document.querySelector('#plan-hour').options.selectedIndex = selecthr;

        time = time + 0.5;
        times = times + 0.5;

        document.querySelector('.total-time-include').innerHTML = time + ' Hrs';
        document.querySelector('.total-time-mobile').innerHTML = times + ' Hrs';

        } else {

        document.getElementById('img_1').src = '../assets/image/3.png';
        $(".first-img1").css({
            "border": "1px solid #C8C8C8"
        });
            
        $(".selected_item .service1").css("display", "none");
        var selecthr = document.querySelector('#plan-hour').selectedIndex - 1;
        document.querySelector('#plan-hour').options.selectedIndex = selecthr;
    
        var totaltime = $('.total-time-include').text();
        var totaltime = parseFloat(totaltime);
        totaltime = totaltime - 0.5;

        var totaltimes = $('.total-time-mobile').text();
        var totaltimes = parseFloat(totaltimes);
        totaltimes = totaltimes - 0.5;

        document.querySelector('.total-time-include').innerHTML = totaltime + ' Hrs';
        document.querySelector('.total-time-mobile').innerHTML = totaltimes + ' Hrs';

    }

    toggle = !toggle;
 }
  
    var toggles = true;

  

    function img2() {

       selecttimes();
       var datas = $(".total-time-mobile").text();
       var data = $(".total-time-include").text();
       var data = parseFloat(data);
       var time = data;
       var datas = $(".total-time-mobile").text();
       var datas = parseFloat(datas);
       var times = datas;

       if (toggles == true) {
          $(".second-img").css({
              "border": "3px solid #1D7A8C"
         });


            document.getElementById('img_2').src = '../assets/image/5-green.png';
            $(".selected_item .extra_item").css("display", "block");
            $(".selected_item .service2").css("display", "block");

            var selecthr = document.querySelector('#plan-hour').selectedIndex + 1;
            document.querySelector('#plan-hour').options.selectedIndex = selecthr;
            time = time + 0.5;
            times = times + 0.5;
    
            document.querySelector('.total-time-include').innerHTML = time + ' Hrs';
            document.querySelector('.total-time-mobile').innerHTML = times + ' Hrs';

        } else {
            document.getElementById('img_2').src = '../assets/Image/5.png';
            $(".second-img").css({
                "border": "1px solid #C8C8C8"
            });
            $(".selected_item .service2").css("display", "none");

            var selecthr = document.querySelector('#plan-hour').selectedIndex - 1;
            document.querySelector('#plan-hour').options.selectedIndex = selecthr;
     
            var totaltime = $('.total-time-include').text();
            var totaltime = parseFloat(totaltime);
            totaltime = totaltime - 0.5;
     
            var totaltimes = $('.total-time-mobile').text();
            var totaltimes = parseFloat(totaltimes);
            totaltimes = totaltimes - 0.5;
     
            document.querySelector('.total-time-include').innerHTML = totaltime + ' Hrs';
            document.querySelector('.total-time-mobile').innerHTML = totaltimes + ' Hrs';

      }
      toggles = !toggles;
}
    var toggle3 = true;

  

    function img3() {
        selecttimes();
           
           var data = $(".total-time-include").text();
           var data = parseFloat(data);
           var time = data;
           var datas = $(".total-time-mobile").text();
           var datas = parseFloat(datas);
           var times = datas;
  
        if (toggle3 == true) {
          $(".third-img").css({
           "border": "3px solid #1D7A8C"
        });
  
            document.getElementById('img_3').src = '../assets/image/4-green.png';
            $(".selected_item .extra_item").css("display", "block");
            $(".selected_item .service3").css("display", "block");

            var selecthr = document.querySelector('#plan-hour').selectedIndex + 1;
            document.querySelector('#plan-hour').options.selectedIndex = selecthr;
            time = time + 0.5;
            times = times + 0.5;
            document.querySelector('.total-time-include').innerHTML = time + ' Hrs';
            document.querySelector('.total-time-mobile').innerHTML = times + ' Hrs';

        } else {
            document.getElementById('img_3').src = '../assets/image/4.png';
            $(".third-img").css({
                "border": "1px solid #C8C8C8"
            });
            
            $(".selected_item .service3").css("display", "none");
            var selecthr = document.querySelector('#plan-hour').selectedIndex - 1;
            document.querySelector('#plan-hour').options.selectedIndex = selecthr;
        
            var totaltime = $('.total-time-include').text();
            var totaltime = parseFloat(totaltime);
            totaltime = totaltime - 0.5;
            var totaltimes = $('.total-time-mobile').text();
            var totaltimes = parseFloat(totaltimes);
            totaltimes = totaltimes - 0.5;
            document.querySelector('.total-time-include').innerHTML = totaltime + ' Hrs';
            document.querySelector('.total-time-mobile').innerHTML = totaltimes + ' Hrs';
    }

    toggle3 = !toggle3;
}
    var toggle4 = true;



    function img4() {
           selecttimes();
           var data = $(".total-time-include").text();
           var data = parseFloat(data);
           var time = data;
           var datas = $(".total-time-mobile").text();
           var datas = parseFloat(datas);
           var times = datas;
           
           if (toggle4 == true) {
            $(".fourth-img").css({
                "border": "3px solid #1D7A8C"
            });
           
            document.getElementById('img_4').src = '../assets/image/2-green.png';
            $(".selected_item .extra_item").css("display", "block");
            $(".selected_item .service4").css("display", "block");

            var selecthr = document.querySelector('#plan-hour').selectedIndex + 1;
            document.querySelector('#plan-hour').options.selectedIndex = selecthr;
            time = time + 0.5;
            times = times + 0.5;

            document.querySelector('.total-time-include').innerHTML = time + ' Hrs';
            document.querySelector('.total-time-mobile').innerHTML = times + ' Hrs';


        } else {
            document.getElementById('img_4').src = '../assets/image/2.png';
            $(".fourth-img").css({
                "border": "1px solid #C8C8C8"
            });
           
            $(".selected_item .service4").css("display", "none");
            var selecthr = document.querySelector('#plan-hour').selectedIndex - 1;
            document.querySelector('#plan-hour').options.selectedIndex = selecthr;
        
            var totaltime = $('.total-time-include').text();
            var totaltime = parseFloat(totaltime);
            totaltime = totaltime - 0.5;
           
            var totaltimes = $('.total-time-mobile').text();
            var totaltimes = parseFloat(totaltimes);
            totaltimes = totaltimes - 0.5;
           
            document.querySelector('.total-time-include').innerHTML = totaltime + ' Hrs';
            document.querySelector('.total-time-mobile').innerHTML = totaltimes + ' Hrs';

    }
     toggle4 = !toggle4;
}
    var toggle5 = true;



    function img5() {
           selecttimes();
           var data = $(".total-time-include").text();
           var data = parseFloat(data);
           var time = data;
           var datas = $(".total-time-mobile").text();
           var datas = parseFloat(datas);
           var times = datas;
           
        if (toggle5 == true) {
            $(".fifth-img").css({
                "border": "3px solid #1D7A8C"
            });
        
            document.getElementById('img_5').src = '../assets/image/1-green.png';
            $(".selected_item .extra_item").css("display", "block");
            $(".selected_item .service5").css("display", "block");
            var selecthr = document.querySelector('#plan-hour').selectedIndex + 1;
        
            document.querySelector('#plan-hour').options.selectedIndex = selecthr;
            time = time + 0.5;
            times = times + 0.5;

            document.querySelector('.total-time-include').innerHTML = time + ' Hrs';
            document.querySelector('.total-time-mobile').innerHTML = times + ' Hrs';

        } else {
            document.getElementById('img_5').src = '../assets/image/1.png';
            $(".fifth-img").css({
                "border": "1px solid #C8C8C8"
            });
        
            $(".selected_item .service5").css("display", "none");
            var selecthr = document.querySelector('#plan-hour').selectedIndex - 1;
            document.querySelector('#plan-hour').options.selectedIndex = selecthr;
        
            var totaltime = $('.total-time-include').text();
            var totaltime = parseFloat(totaltime);
            totaltime = totaltime - 0.5;
        
            var totaltimes = $('.total-time-mobile').text();
            var totaltimes = parseFloat(totaltimes);
            totaltimes = totaltimes - 0.5;
        
            document.querySelector('.total-time-include').innerHTML = totaltime + ' Hrs';
            document.querySelector('.total-time-mobile').innerHTML = totaltimes + ' Hrs';

    }
    toggle5 = !toggle5;
}



    function Bath() {
        var data = $("#plan-bath option:selected").text();
        document.querySelector('.number_bath').innerHTML = data;
        document.querySelector('.number_bath_modal').innerHTML = data;
}


    function Bed() {
        var data = $("#plan-bed option:selected").text();
        document.querySelector('.number_bed').innerHTML = data;
        document.querySelector('.number_bed_modal').innerHTML = data;
    }


   function Times() {
        selecttimes();
        var data = $("#plan-time option:selected").text();
        document.querySelector('.time-date').innerHTML = data;
        document.querySelector('.time-date_modal').innerHTML = data;
    }



 function time(time) {
        selecttimes();

        var totalhrs = document.querySelector('.total-time-include').innerHTML;
        var totalhr = parseFloat(totalhrs);
        var datas = document.querySelector('#plan-hour').selectedIndex;
        var selecthours = document.querySelector("#plan-hour").options[datas].innerHTML;
        var data = parseFloat(document.querySelector("#plan-hour").options[datas].innerHTML);

        var totalhrsq = document.querySelector('.total-time-mobile').innerHTML;
        var totalhrq = parseFloat(totalhrsq);
        var datasq = document.querySelector('#plan-hour').selectedIndex;
        var selecthoursq = document.querySelector("#plan-hour").options[datas].innerHTML;
        var dataq = parseFloat(document.querySelector("#plan-hour").options[datas].innerHTML);

         if ((data < totalhr) && ($('.service1').css("display") == "block" || $('.service2').css("display") == "block" || $('.service3').css("display") == "block" || $('.service4').css("display") == "block" || $('.service5').css("display") == "block")) {
            document.querySelector('#plan-hour').value = totalhr;
             alert('Please Select Correct Time.');
         
        } else if ((datasq < totalhrsq) && ($('.service1').css("display") == "block" || $('.service2').css("display") == "block" || $('.service3').css("display") == "block" || $('.service4').css("display") == "block" || $('.service5').css("display") == "block")) {
            document.querySelector('#plan-hour').value = totalhrq;
              alert('Please Select Correct Time.');
        }
        

        else {

        var data = $("#plan-hour option:selected").text();
        document.querySelector('.total-time-include').innerHTML = data;
        document.querySelector('.basicshr').innerHTML = data;

        document.querySelector('.total-time-mobile').innerHTML = data;
        document.querySelector('.basicshr_modal').innerHTML = data;
     
        if ($('.service1').css('display') == 'block') {
            var data = parseFloat(data);
            var data = data - 0.5;
            document.querySelector('.basicshr').innerHTML = data + " Hrs";
            document.querySelector('.basicshr_modal').innerHTML = data + " Hrs";
        }

        if ($('.service2').css('display') == 'block') {
            var data = parseFloat(data);
            var data = data - 0.5;
            document.querySelector('.basicshr').innerHTML = data + " Hrs";
            document.querySelector('.basicshr_modal').innerHTML = data + " Hrs";
        }

        if ($('.service3').css('display') == 'block') {
            var data = parseFloat(data);
            var data = data - 0.5;
            document.querySelector('.basicshr').innerHTML = data + " Hrs";
            document.querySelector('.basicshr_modal').innerHTML = data + " Hrs";
        }

        if ($('.service4').css('display') == 'block') {
            var data = parseFloat(data);
            var data = data - 0.5;
            document.querySelector('.basicshr').innerHTML = data + " Hrs";
            document.querySelector('.basicshr_modal').innerHTML = data + " Hrs";
        }

        if ($('.service5').css('display') == 'block') {
            var data = parseFloat(data);
            var data = data - 0.5;
            document.querySelector('.basicshr').innerHTML = data + " Hrs";
            document.querySelector('.basicshr_modal').innerHTML = data + " Hrs";
        }
     }
  }
 
 
 
    $('.total-time-include').on('DOMSubtreeModified', function () {
        selecttimes();
      
        var datas = $(".total-time-include").text();
        var datas = parseFloat(datas);
        var price = datas * 18;
        document.querySelector('.amount').innerHTML = '$' + price;
        document.querySelector('.amounts').innerHTML = '$' + price;
        var prices = (20 * price) / 100;
        var pricepart = price - prices;
        document.querySelector('.effective').innerHTML = '$' + pricepart;

    })


    $('.total-time-mobile').on('DOMSubtreeModified', function () {

        selecttimes();
        var datas = $(".total-time-mobile").text();
        var datas = parseFloat(datas);
        var price = datas * 18;
        document.querySelector('.amount_model').innerHTML = '$' + price;
        document.querySelector('.amounts_model').innerHTML = '$' + price;

        document.querySelector('.amount-btn').innerHTML = '$' + price;

        var prices = (20 * price) / 100;
        var pricepart = price - prices;
        document.querySelector('.effective_model').innerHTML = '$' + pricepart;

    })
});
