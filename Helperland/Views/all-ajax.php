<script>

    $(document).ready(function() {

// Contact Page

    $(".contact-submit").on("click", function(e) {
          e.preventDefault();

            var firstname = $.trim($("#firstname").val());
            var lastname = $.trim($("#lastname").val());
            var mobilenum = $.trim($("#mobilenum").val());
            var email = $.trim($("#email").val());
            var option = $.trim($("#option").val());
            var message = $.trim($("#message").val());

           
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=Contact",
                data: {

                    "firstname": firstname,
                    "lastname": lastname,
                    "email": email,
                    "mobile": mobilenum,
                    "subject": option,
                    "message": message,
                },
 
                success: function(data) {
                     
                     if (data) {

                         Swal.fire({
                             title: 'Your Feedback has been Sended Successfully.',
                             icon: 'success',
                             confirmButtonText: 'Done'
                         }).then(function() {
                             location.href = "http://localhost/Helperland/Views/contact.php";
  
                         });
                    

                     } else {
                         Swal.fire({
                             title: 'Your Feedback has not been Sended Successfully.', 
                             text: 'Please try again.',
                             icon: 'error',
                             confirmButtonText: 'Ok'
                         })
                   }
               }
            });
            
    })


// Service Provider Page

    $(".service-get").on("click", function(e) {
          e.preventDefault();

        if ($(".condition").not(':checked')) {
                var condition_err = "* You Must Agree with Term and conditions";
                $('.condition_err').text(condition_err);
        }

        if ($(".condition").is(':checked')) {
                var condition_err = "";
                $('.condition_err').text(condition_err);


            var firstname = $.trim($("#firstname").val());
            var lastname = $.trim($("#lastname").val());
            var mobilenum = $.trim($("#mobilenum").val());
            var email = $.trim($("#email").val());
            var password = $.trim($("#password").val());

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceProvider",
                data: {

                    "firstname": firstname,
                    "lastname": lastname,
                    "email": email,
                    "mobile": mobilenum,
                    "password": password,
                },
 
                success: function(data) {
                     
                     if (data == 1) {

                         Swal.fire({
                             title: 'Your Registration has been Completed Successfully.',
                             icon: 'success',
                             confirmButtonText: 'Done'
                         }).then(function() {
                             location.href = "http://localhost/Helperland/Views/Service.php";
  
                         });
                    

                     } if(data == 0) {
                         Swal.fire({
                             title: 'Email Already Exists.', 
                             text: 'Please try another email.',
                             icon: 'error',
                             confirmButtonText: 'Ok'
                         })
                   }
               }
            });
        }            
    })


// Customer Signup Page

    $(".customer-register").on("click", function(e) {
          e.preventDefault();

        if ($(".condition").not(':checked')) {
                var condition_err = "* You Must Agree with Term and conditions";
                $('.condition_err').text(condition_err);
        }

        if ($(".condition").is(':checked')) {
                var condition_err = "";
                $('.condition_err').text(condition_err);


            var firstname = $.trim($("#firstname").val());
            var lastname = $.trim($("#lastname").val());
            var mobilenum = $.trim($("#mobilenum").val());
            var email = $.trim($("#email").val());
            var password = $.trim($("#password").val());

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=User",
                data: {

                    "firstname": firstname,
                    "lastname": lastname,
                    "email": email,
                    "mobile": mobilenum,
                    "password": password,
                },
 
                success: function(data) {
                     
                     if (data == 1) {

                         Swal.fire({
                             title: 'Your Registration has been Completed Successfully.',
                             icon: 'success',
                             confirmButtonText: 'Done'
                         }).then(function() {
                             location.href = "http://localhost/Helperland/Views/index.php";
  
                         });
                    

                     } if(data == 0) {
                         Swal.fire({
                             title: 'Email Already Exists.', 
                             text: 'Please try another email.',
                             icon: 'error',
                             confirmButtonText: 'Ok'
                         })
                   }
               }
            });
        }
    })


// Login Page

    $(".home-login").on("click", function(e) {
          e.preventDefault();

            var loginemail = $.trim($("#loginemail").val());
            var password = $.trim($("#loginpassword").val());

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=Login",
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
                         window.location.href = "http://localhost/Helperland/Views/customer-dashboard.php";
                      }

                      else if(data == 3) {
                         window.location.href = "http://localhost/Helperland/Views/NewService.php";
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

// Forgot Page


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


// Reset Password

    $(".reset-password").on("click", function(e) {
          e.preventDefault();

            var reset = $.trim($("#reset").val());
            var password = $.trim($("#password").val());
            var cpassword = $.trim($("#cpassword").val());


            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ResetKeyPassword",
                data: {

                    "reset": reset,
                    "newpassword": password,
                    "newcpassword": cpassword,
                },
 
                success: function(data) {
                     
                     if (data == 1) {

                         Swal.fire({
                             title: 'Password Updated Successfully.',
                             icon: 'success',
                             confirmButtonText: 'Done'
                         }).then(function() {
                             location.href = "http://localhost/Helperland/Views/index.php";
  
                         });
                    

                     } else if(data == 0) {
                         Swal.fire({
                             title: 'Password Not Updated. Please Try Again.', 
                             icon: 'error',
                             confirmButtonText: 'Ok'
                         })
                   }
                   else {
                         Swal.fire({
                             title: 'Password Not Match. Please Try Again', 
                             icon: 'error',
                             confirmButtonText: 'Ok'
                         })
                     }
               }
            });
            
    })

})


</script>