
$(document).ready(function () {

    $('#street').on('input', function () {
        var lastName = $(this).val();
        var validName = /^[a-zA-Z ]*$/;;
        if (lastName.length == 0) {
            $('.street-msg').addClass('invalid-msg').text("Street is required");
            $(this).addClass('invalid-input').removeClass('valid-input');

        }
        else if (!validName.test(lastName)) {
            $('.street-msg').addClass('invalid-msg').text('White Space Are not Allowed');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else {
            $('.street-msg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
        }
    });


    $('#mobilenum').on('input', function () {
        var mobileNum = $(this).val();
        var validNumber = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
        if (mobileNum.length == 0) {
            $('.mobile-msg').addClass('invalid-msg').text('Mobile Number is required');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else if (!validNumber.test(mobileNum)) {
            $('.mobile-msg').addClass('invalid-msg').text('Invalid Mobile Number');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else {
            $('.mobile-msg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
        }
    });


    $('#houseno').on('input', function () {
        var houseNum = $(this).val();
        var validNumber = /^\d*$/;
        if (houseNum.length == 0) {
            $('.house-msg').addClass('invalid-msg').text('House Number is required');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else if (!validNumber.test(houseNum)) {
            $('.house-msg').addClass('invalid-msg').text('Enter Valid House Number');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else {
            $('.house-msg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
        }
    });


    $('input').on('input', function (e) {
        if ($('.add_address').find('.valid-input').length == 3) {
            $('.addresssave').removeAttr('disabled');
            $('.addresssave').css('cursor', 'pointer');
        }
        else {
            $('.addresssave').attr('disabled', 'disabled');
            $('.addresssave').css('cursor', 'not-allowed');
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
    document.querySelector('.date_time').innerHTML = tomorrow;
   


    $("#selectdate").attr("value", tomorrow);

    /* $("#selectdate").on("change", function () {
        var selected = $(this).val();
        //alert(selected);

        document.querySelector('.date_time').innerHTML = selected;
       
    });*/



    $("#selectbed").on("change", function () {
        changeBed();
    });

    $("#selectime").on("change", function () {
        changeTimes();
    });

    $("#selectbath").on("change", function () {
        changeBath();
    });


    $("#selecthour").on("change", function () {
        changetime();
    });

    $(".first").click(function () {
        chngimg1();
    });

    $(".second").click(function () {
        chngimg2();
    });

    $(".third").click(function () {
        chngimg3();
    });

    $(".fourth").click(function () {
        chngimg4();
    });

    $(".fifth").click(function () {
        chngimg5();
    });

    function selecttimes() {

        var selectedtimes = parseFloat($('#selectime').val());
        var selectedhours = parseFloat($("#selecthour").val());

        totaltimesh = selectedtimes + selectedhours

        /* if (totaltimesh >= 21) {
            $('.timingerr').text("Please Select less than 21 hour time");
        } else {
            $('.timingerr').text("");
          
        }
        */
    } 

    var toggle = true;

    function chngimg1() {

        var datas = $(".total_requried_time_modal").text();
        var datas = parseFloat(datas);
        var times = datas; 
        var data = $(".total_requried_time").text();
        var data = parseFloat(data);
        var time = data;
       selecttimes();
        if (toggle == true) {
 
            $(".first").css({
                "border": "3px solid #1D7A8C"
            });

            document.getElementById('firstservice').src = '../assets/image/3-green.png';

            $(".extra_services .extra_parts").css("display", "block");
            $(".extra_services .extra1").css("display", "block");
            
            var selecthr = document.querySelector('#selecthour').selectedIndex + 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;

            time = time + 0.5;
            times = times + 0.5;

            document.querySelector('.total_requried_time').innerHTML = time + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = times + ' Hrs';


        } else {

            document.getElementById('firstservice').src = '../assets/image/3.png';
            $(".first").css({
                "border": "1px solid #C8C8C8"
            });
            
            $(".extra_services .extra1").css("display", "none");
            var selecthr = document.querySelector('#selecthour').selectedIndex - 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            // time = time - 0.5;
            var totaltime = $('.total_requried_time').text();
            var totaltime = parseFloat(totaltime);
            totaltime = totaltime - 0.5;

            var totaltimes = $('.total_requried_time_modal').text();
            var totaltimes = parseFloat(totaltimes);
            totaltimes = totaltimes - 0.5;

            document.querySelector('.total_requried_time').innerHTML = totaltime + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = totaltimes + ' Hrs';

        }

        toggle = !toggle;
    }
  

    var toggles = true;

    function chngimg2() {

        selecttimes();
        var datas = $(".total_requried_time_modal").text();

        var data = $(".total_requried_time").text();
        var data = parseFloat(data);
        var time = data;
        var datas = $(".total_requried_time_modal").text();
        var datas = parseFloat(datas);
        var times = datas;
        if (toggles == true) {
            $(".second").css({
                "border": "3px solid #1D7A8C"
            });


            document.getElementById('secondimg').src = '../assets/image/5-green.png';
            $(".extra_services .extra_parts").css("display", "block");
            $(".extra_services .extra2").css("display", "block");

            var selecthr = document.querySelector('#selecthour').selectedIndex + 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            time = time + 0.5;
            times = times + 0.5;
            document.querySelector('.total_requried_time').innerHTML = time + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = times + ' Hrs';

        } else {
            document.getElementById('secondimg').src = '../assets/Image/5.png';
            $(".second").css({
                "border": "1px solid #C8C8C8"
            });
            $(".extra_services .extra2").css("display", "none");

            var selecthr = document.querySelector('#selecthour').selectedIndex - 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            // time = time - 0.5;
            var totaltime = $('.total_requried_time').text();
            var totaltime = parseFloat(totaltime);
            totaltime = totaltime - 0.5;
            var totaltimes = $('.total_requried_time_modal').text();
            var totaltimes = parseFloat(totaltimes);
            totaltimes = totaltimes - 0.5;
            document.querySelector('.total_requried_time').innerHTML = totaltime + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = totaltimes + ' Hrs';

        }
        toggles = !toggles;
    }
    var toggle3 = true;

    function chngimg3() {
        selecttimes();
        var data = $(".total_requried_time").text();
        var data = parseFloat(data);
        var time = data;
        var datas = $(".total_requried_time_modal").text();
        var datas = parseFloat(datas);
        var times = datas;
        if (toggle3 == true) {
            $(".third").css({
                "border": "3px solid #1D7A8C"
            });
            document.getElementById('thirdimg').src = '../assets/image/4-green.png';
            $(".extra_services .extra_parts").css("display", "block");
            $(".extra_services .extra3").css("display", "block");

            var selecthr = document.querySelector('#selecthour').selectedIndex + 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            time = time + 0.5;
            times = times + 0.5;
            document.querySelector('.total_requried_time').innerHTML = time + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = times + ' Hrs';

        } else {
            document.getElementById('thirdimg').src = '../assets/image/4.png';
            $(".third").css({
                "border": "1px solid #C8C8C8"
            });
            
            $(".extra_services .extra3").css("display", "none");
            var selecthr = document.querySelector('#selecthour').selectedIndex - 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
        
            var totaltime = $('.total_requried_time').text();
            var totaltime = parseFloat(totaltime);
            totaltime = totaltime - 0.5;
            var totaltimes = $('.total_requried_time_modal').text();
            var totaltimes = parseFloat(totaltimes);
            totaltimes = totaltimes - 0.5;
            document.querySelector('.total_requried_time').innerHTML = totaltime + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = totaltimes + ' Hrs';

            // document.querySelector('.total_requried_time').innerHTML = time + ' Hrs';
        }

        toggle3 = !toggle3;
    }
    var toggle4 = true;

    function chngimg4() {
        selecttimes();
        var data = $(".total_requried_time").text();
        var data = parseFloat(data);
        var time = data;
        var datas = $(".total_requried_time_modal").text();
        var datas = parseFloat(datas);
        var times = datas;
        if (toggle4 == true) {
            $(".fourth").css({
                "border": "3px solid #1D7A8C"
            });
            document.getElementById('fourthimg').src = '../assets/image/2-green.png';
            $(".extra_services .extra_parts").css("display", "block");
            $(".extra_services .extra4").css("display", "block");

            var selecthr = document.querySelector('#selecthour').selectedIndex + 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            time = time + 0.5;
            times = times + 0.5;

            document.querySelector('.total_requried_time').innerHTML = time + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = times + ' Hrs';


        } else {
            document.getElementById('fourthimg').src = '../assets/image/2.png';
            $(".fourth").css({
                "border": "1px solid #C8C8C8"
            });
            $(".extra_services .extra4").css("display", "none");
            var selecthr = document.querySelector('#selecthour').selectedIndex - 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            // time = time - 0.5;
            var totaltime = $('.total_requried_time').text();
            var totaltime = parseFloat(totaltime);
            totaltime = totaltime - 0.5;
            var totaltimes = $('.total_requried_time_modal').text();
            var totaltimes = parseFloat(totaltimes);
            totaltimes = totaltimes - 0.5;
            document.querySelector('.total_requried_time').innerHTML = totaltime + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = totaltimes + ' Hrs';

        }
        toggle4 = !toggle4;
    }
    var toggle5 = true;

    function chngimg5() {
        selecttimes();
        var data = $(".total_requried_time").text();
        var data = parseFloat(data);
        var time = data;
        var datas = $(".total_requried_time_modal").text();
        var datas = parseFloat(datas);
        var times = datas;
        if (toggle5 == true) {
            $(".fifth").css({
                "border": "3px solid #1D7A8C"
            });
            document.getElementById('fifthimg').src = '../assets/image/1-green.png';
            $(".extra_services .extra_parts").css("display", "block");
            $(".extra_services .extra5").css("display", "block");
            var selecthr = document.querySelector('#selecthour').selectedIndex + 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            time = time + 0.5;
            times = times + 0.5;

            document.querySelector('.total_requried_time').innerHTML = time + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = times + ' Hrs';

        } else {
            document.getElementById('fifthimg').src = '../assets/image/1.png';
            $(".fifth").css({
                "border": "1px solid #C8C8C8"
            });
            $(".extra_services .extra5").css("display", "none");
            var selecthr = document.querySelector('#selecthour').selectedIndex - 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            // time = time - 0.5;
            var totaltime = $('.total_requried_time').text();
            var totaltime = parseFloat(totaltime);
            totaltime = totaltime - 0.5;
            var totaltimes = $('.total_requried_time_modal').text();
            var totaltimes = parseFloat(totaltimes);
            totaltimes = totaltimes - 0.5;
            document.querySelector('.total_requried_time').innerHTML = totaltime + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = totaltimes + ' Hrs';

        }
        toggle5 = !toggle5;
    }

    function changeBath() {
        var data = $("#selectbath option:selected").text();
        document.querySelector('.bath_num').innerHTML = data;
        document.querySelector('.bath_num_modal').innerHTML = data;
}


    function changeBed() {
        var data = $("#selectbed option:selected").text();
        document.querySelector('.bed_num').innerHTML = data;
        document.querySelector('.bed_num_modal').innerHTML = data;
    }

   function changeTimes() {
        selecttimes();
        var data = $("#selectime option:selected").text();
        document.querySelector('.times_date').innerHTML = data;
        document.querySelector('.times_date_modal').innerHTML = data;

    }



 function changetime(time) {
        selecttimes();

        var totalhrs = document.querySelector('.total_requried_time').innerHTML;
        var totalhr = parseFloat(totalhrs);
        var datas = document.querySelector('#selecthour').selectedIndex;
        var selecthours = document.querySelector("#selecthour").options[datas].innerHTML;
        var data = parseFloat(document.querySelector("#selecthour").options[datas].innerHTML);

        var totalhrsq = document.querySelector('.total_requried_time_modal').innerHTML;
        var totalhrq = parseFloat(totalhrsq);
        var datasq = document.querySelector('#selecthour').selectedIndex;
        var selecthoursq = document.querySelector("#selecthour").options[datas].innerHTML;
        var dataq = parseFloat(document.querySelector("#selecthour").options[datas].innerHTML);

         if ((data < totalhr) && ($('.extra1').css("display") == "block" || $('.extra2').css("display") == "block" || $('.extra3').css("display") == "block" || $('.extra4').css("display") == "block" || $('.extra5').css("display") == "block")) {
            document.querySelector('#selecthour').value = totalhr;
             alert('it not work');
           // $('#WarningModal').modal('show');

        } else if ((datasq < totalhrsq) && ($('.extra1').css("display") == "block" || $('.extra2').css("display") == "block" || $('.extra3').css("display") == "block" || $('.extra4').css("display") == "block" || $('.extra5').css("display") == "block")) {
            document.querySelector('#selecthour').value = totalhrq;
             alert('it not work');
           // $('#WarningModal').modal('show');
        }
        

        else {

            var data = $("#selecthour option:selected").text();
            document.querySelector('.total_requried_time').innerHTML = data;
            document.querySelector('.basicshr').innerHTML = data;

            document.querySelector('.total_requried_time_modal').innerHTML = data;
            document.querySelector('.basicshr_modal').innerHTML = data;


        
            if ($('.extra1').css('display') == 'block') {
                var data = parseFloat(data);
                var data = data - 0.5;
                document.querySelector('.basicshr').innerHTML = data + " Hrs";

                document.querySelector('.basicshr_modal').innerHTML = data + " Hrs";
            }

            if ($('.extra2').css('display') == 'block') {
                var data = parseFloat(data);
                var data = data - 0.5;
                document.querySelector('.basicshr').innerHTML = data + " Hrs";
                document.querySelector('.basicshr_modal').innerHTML = data + " Hrs";

            }
            if ($('.extra3').css('display') == 'block') {
                var data = parseFloat(data);
                var data = data - 0.5;
                document.querySelector('.basicshr').innerHTML = data + " Hrs";
                document.querySelector('.basicshr_modal').innerHTML = data + " Hrs";

            }
            if ($('.extra4').css('display') == 'block') {
                var data = parseFloat(data);
                var data = data - 0.5;
                document.querySelector('.basicshr').innerHTML = data + " Hrs";
                document.querySelector('.basicshr_modal').innerHTML = data + " Hrs";

            }
            if ($('.extra5').css('display') == 'block') {
                var data = parseFloat(data);
                var data = data - 0.5;
                document.querySelector('.basicshr').innerHTML = data + " Hrs";
                document.querySelector('.basicshr_modal').innerHTML = data + " Hrs";

            }
        }

    }



  });
   
 

