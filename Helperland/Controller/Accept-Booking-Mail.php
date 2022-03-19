<?php

$to_email = $email;
$subject = "New Service has coming";

$body = "<h3 style='font-size:16px; color:orange;'>Hii Service Provider. New Service has been coming. <br>Please Check Booked Service and accept the request of the customer.</h3>
   <br>

  <h3 style='font-size:17px; color:red;'>Service Request Id is : <span style='color:blue;'>$id</span></h3>

   <h3 style='font-size:17px; color:purple;'>You can Login using below link.</h3>
   
   <a href='http://localhost/Helperland/Views/NewService.php'> http://localhost/Helperland/Views/NewService.php</a>
 </div>";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to_email, $subject, $body, $headers)
?>