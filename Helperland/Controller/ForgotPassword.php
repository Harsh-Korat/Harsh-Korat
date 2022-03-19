<?php

  $to_email = $email;
  $subject = "Forgot Password - Helperland";

  $body = "<h6 style='font-size:16px; color:red;'>Hi, $username .Click Here to Reset Your Password</h6>
   <br>
   <a href='http://localhost/Helperland/?controller=Helperland&function=ResetPassword&parameter=$resetkey'> http://localhost/Helperland/?controller=Helperland&function=ResetPassword&parameter=$resetkey</a>
 </div>
    ";
  // Set content-type header for sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  mail($to_email, $subject, $body, $headers);

?>