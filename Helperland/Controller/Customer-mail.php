<?php

$to_email = $email;
$subject = "Your Booking has been Completed Successfully.";

$body = "<h3 style='font-size:16px; color:blue;'>Hii Customer your booking has been completed Successfully.</h3>
   <br>

   <h3 style='font-size:17px; color:purple;'>You can Login using below link.</h3>
   
   <a href='http://localhost/Helperland/Views/#LoginModal'> http://localhost/Helperland/Views/#LoginModal</a>
 </div>";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to_email, $subject, $body, $headers)
?>