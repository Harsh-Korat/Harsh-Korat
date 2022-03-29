<?php

$to_email = $email1;
$service_provider_name = $username;
$ServiceRequestId = $ServiceRequestId1;
$subject = "Customer Cancel Service Request";

$body = "

  <h3 style='font-size:17px; color:red;'>Hii Service Provider. <br> Service Request Id is : <span style='color:blue;'>$ServiceRequestId</span> has been cancel by Customer<span style='color:blue;'>$service_provider_name.</span></h3><br>


 </div>";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to_email, $subject, $body, $headers)
?>