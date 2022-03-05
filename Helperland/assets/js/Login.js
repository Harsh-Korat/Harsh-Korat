$(document).ready(function () {
  //   Login email
  
  $('#loginemail').on('input', function () {
    var emailAddress = $(this).val();
    var validEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (emailAddress.length == 0) {
      $('.email-msg').addClass('invalid-msg').text('Email is required');
      $(this).addClass('invalid-input').removeClass('valid-input');
    }
    else if (!validEmail.test(emailAddress)) {
      $('.email-msg').addClass('invalid-msg').text('Invalid Email Address');
      $(this).addClass('invalid-input').removeClass('valid-input');
    }
    else {
      $('.email-msg').empty();
      $(this).addClass('valid-input').removeClass('invalid-input');
    }

  });



  $('#login').on('input', function () {
    var emailAddress = $(this).val();
    var validEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (emailAddress.length == 0) {
      $('.email-message').addClass('invalid-msg').text('Email is required');
      $(this).addClass('invalid-input').removeClass('valid-input');
    }
    else if (!validEmail.test(emailAddress)) {
      $('.email-message').addClass('invalid-msg').text('Invalid Email Address');
      $(this).addClass('invalid-input').removeClass('valid-input');
    }
    else {
      $('.email-message').empty();
      $(this).addClass('valid-input').removeClass('invalid-input');
    }

  });


});
