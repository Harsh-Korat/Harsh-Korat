<?php

$to_email = $email1;
$service_provider_name = $service_provider_name;
$ServiceRequestId = $ServiceRequestId1;
$subject = "Service Request Accepted";

$body = "

  <h3 style='font-size:17px; color:red;'>Service Request Id : <span style='color:blue;'>$ServiceRequestId</span> has been accepted by 

   <span style='color:blue;'>$service_provider_name</span> Service Provider and it is no more available for you.</h3>";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to_email, $subject, $body, $headers)
?>