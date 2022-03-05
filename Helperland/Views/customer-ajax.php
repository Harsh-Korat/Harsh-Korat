<script>

    $(document).ready(function() {

// Customer My Details Page
        
        username = "<?php echo $_SESSION['username']; ?>";

        CustomerDetails();

        function CustomerDetails() {
            $.ajax({
                type: "POST",
                url: "http://localhost/Helperland/?controller=Helperland&function=CustomerDetails",
                data: {
                    username: username,
                },
                dataType: "json",
                success: function(data) {
                    firstname = data[0] + " " + data[1];
                
                    $('#firstname').val(data[0]);
                    $('#lastname').val(data[1]);
                    $('#emailaddress').val(data[2]);
                    $('#mobilenum').val(data[3]);
                    $('#birth').val(data[4]);
                    $('#month').val(data[5]);
                    $('#year').val(data[6]);
                    $('#language').val(data[7]);
                }
            });
        }



    $(".customer-detail").on("click", function(e) {
          e.preventDefault();

            var firstname = $.trim($("#firstname").val());
            var lastname = $.trim($("#lastname").val());
            var mobilenum = $.trim($("#mobilenum").val());
            var email = $.trim($("#emailaddress").val());
            var birth = $.trim($("#birth").val());
            var month = $.trim($("#month").val());
            var year = $.trim($("#year").val());
            var language = $.trim($("#language").val());

           
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=CustomerUpdateDetails",
                data: {

                    "firstname": firstname,
                    "lastname": lastname,
                    "email": email,
                    "mobile": mobilenum,
                    "birth": birth,
                    "month": month,
                    "year": year,
                    "language": language,
                },
 
                success: function(data) {
                     
                     if (data == 1) {

                            $('.details-error').text("User Updated Successfully.");
                            $('.details-error').show();
                            setTimeout(function() {
                                $(".details-error").hide();
                            }, 5000);                         
                    

                     } else {

                            $('.details-error').text("User Updated Not Successfully. Try Again.");
                            $('.details-error').show();
                            setTimeout(function() {
                                $(".details-error").hide();
                            }, 5000);  
                   }
               }
            });
            
    })



// Customer Address Page

$('#your_address').on('click', '.edit-address', function() {
        addressid = $(this).attr('id');
})


$('.edit-address').on("click", function(e) {

            e.preventDefault();
            var street = $.trim($("#street").val());
            var houseno = $.trim($("#houseno").val());
            var pincode = $.trim($("#pincode").val());
            var location = $.trim($("#location").val());
            var mobile = $.trim($("#mobile").val());
            <?php if (isset($_SESSION['username'])) { ?>

                username = "<?php echo $_SESSION['username']; ?>";
            <?php } ?>
            

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=AddressDetails",
                data: {
                    "street": street,
                    "houseno": houseno,
                    "pincode": pincode,
                    "location": location,
                    "mobile": mobile,
                    "username": username,

                },


                success: function(data) {
                    if (data == 1) {

                        Swal.fire({
                            title: 'Address has been Added Successfully',
                            icon: 'success',
                            confirmButtonText: 'Done'
                        })      

                        CustomerDetails1();              
                        
                    } else {
                    
                        Swal.fire({
                            title: 'Address has been not Added',
                            text: 'Please Try Again',
                            icon: 'error',
                            confirmButtonText: 'Done'
                        });
                    }
                    
                }
            });
        })


   Address();
    

     function Address() {

        
    username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?>       

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=AddressCustomer",
                data: {
                    "getaddress": 5,
                    "username": username,
                },
                
                success: function(data) {
                
                    $("#your_address").html(data);
                
                }
           });
      }

  
  function CustomerDetails1() {
      location.href = "http://localhost/Helperland/Views/customer-setting.php";
   }     


// Customer Change Password Page


        $('.changepassword').on("click", function(e) {
            e.preventDefault();

            if ($("#confirmpassword").val() == "" || $("#password").val() == "" || $("#cpassword").val() == "") {
                $('.error').text("Please Enter All Fields");
                $('.error').show();
                setTimeout(function() {
                    $(".error").hide();
                }, 5000);
            } else {
            
                currentpassword = $("#currentpassword").val();
                password = $("#password").val();
                cpassword = $("#cpassword").val();
                firstname = $("#firstname").val();
                lastname = $("#lastname").val();
                modifiedby = firstname + " " + lastname;
                                      

                $.ajax({
                    type: "POST",
                    url: "http://localhost/Helperland/?controller=Helperland&function=CustomerUpdatePassword",
                 

                    data: {
                        'username': username,
                        'currentpassword': currentpassword,
                        'password': password,
                        'cpassword': cpassword,
                        'modifiedby': modifiedby,
                    },
                 
                    success: function(data) {
                    
                        if (data == 1) {
                    
                            $("#password").val("");
                            $("#password").removeClass('valid-input');
                            $("#currentpassword").val("");
                            $("#cpassword").val("");
                            $("#cpassword").removeClass('valid-input');
                         

                             $('.error').text("Password is Updated Successfully.");
                            $('.error').show();
                            setTimeout(function() {
                                $(".error").hide();
                            }, 5000);
                        }
                        if (data == 0) {
                        
                            $('.error').text("Old Password is Invalid");
                            $('.error').show();
                            setTimeout(function() {
                                $(".error").hide();
                            }, 5000);
                        }
                        if (data == 2) {
                          
                            $('.error').text("Password Not Updated");
                            $('.error').show();
                            setTimeout(function() {
                                $(".error").hide();
                            }, 5000);
                        }
                    }
                });

            }
      });



// Edit and Delete the address


$('#your_address').on('click', '.edit-address', function() {
        var addressid1 = $(this).attr('id');

   Address1();


     function Address1() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=AddressCustomer1",
                data: {
                    
                    "addressid1": addressid1,
                },
                
                success: function(data) {
                
                    $("#your_add").html(data);
                
                }
           });
      }
  });



$('#your_address').on('click', '.cancel-lap', function() {
        addressid = $(this).attr('id');
        $('#delete-modal .delete_two').attr('id', addressid);

  });

$('#your_address').on('click', '.edit-address', function() {
        addressid = $(this).attr('id');
       $('#address1-modal .edit-address1').attr('id', addressid);

  });



$('#address1-modal .edit-address1').on("click", function(e) {


            e.preventDefault();
            var street = $.trim($("#streets").val());
            var houseno = $.trim($("#housenos").val());
            var pincode = $.trim($("#pincodes").val());
            var location = $.trim($("#locations").val());
            var mobile = $.trim($("#mobiles").val());
            <?php if (isset($_SESSION['username'])) { ?>

                username = "<?php echo $_SESSION['username']; ?>";
            <?php } ?>
            

            var addressid = $(this).attr('id');
             

            $.ajax({

                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=EditCustomerDetails",

                data: {
                    
                    "street": street,
                    "houseno": houseno,
                    "pincode": pincode,
                    "location": location,
                    "mobile": mobile,
                    "addressid": addressid,

                },
             

                success: function(data) {
                    
                    if (data == 1) {

                        Swal.fire({
                            title: 'Address has been Added Successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'Done'
                        })

                        CustomerDetails1();

                        

                        // GetAddress();
                    } else {
                        Swal.fire({
                            title: 'Address has been not Added',
                            text: 'Please Try Again',
                            icon: 'error',
                            confirmButtonText: 'Done'
                        });
                    }
                    

                }
            });

        })


$('.delete_two').on("click", function(e) {
 
            e.preventDefault();

            var addressid = $(this).attr('id');
           
            $.ajax({

                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=DeleteAddress",

                data: {
                    
                    "addressid": addressid,

                },
             

                success: function(data) {

                    if (data == 1) {

                        Swal.fire({
                            title: 'Address has been Deleted Successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'Done'
                        }).then(function() {
                             location.href = "http://localhost/Helperland/Views/customer-setting.php";
  
                         });

                        

                        // GetAddress();
                    } else {
                        Swal.fire({
                            title: 'Address has not been Deleted',
                            text: 'Please Try Again',
                            icon: 'error',
                            confirmButtonText: 'Done'
                        });
                    }
                    

                }
            });

 

        })

});


</script>

