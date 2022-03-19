<?php

$to_email = $email1;
$service_provider_name = $service_provider_name;
$ServiceRequestId = $ServiceRequestId1;
$subject = "Service Request accepted";

$body = "

  <h3 style='font-size:17px; color:red;'>Your Service Request Id is : <span style='color:blue;'>$ServiceRequestId</span> has been accepted by <span style='color:blue;'>$service_provider_name.</span>Please check it on Helperland.</h3><br>

     <h3 style='font-size:17px; color:purple;'>You can Login using below link.</h3>
   
   <a href='http://localhost/Helperland/Views/#LoginModal'> http://localhost/Helperland/Views/#LoginModal</a>


 </div>";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to_email, $subject, $body, $headers)
?>