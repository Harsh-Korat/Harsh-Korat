<?php

if(isset($email2)){

$to_email = $email2;
$plan_date = $plan_date;
$dash_time11 = $dash_time11;
$ServiceRequestId = $ServiceRequestId;

$subject = "Changes By Admin";

$body = "<h3 style='font-size:16px; color:orange;'>Hii Customer. Your Service Request Time, Date and Address has been changed by Admin.</h3>
   <br>

  <h3 style='font-size:17px; color:red;'>Your Service Request Id is : <span style='color:blue;'>$ServiceRequestId</span></h3><br>

  <h3 style='font-size:17px; color:blue;'> Your Service date is : <span style='color:red;'>$plan_date</span> and Your Service Time is : <span style='color:red;'>$dash_time11</span> and Service Request Address is changed by Admin.</h3><br>

   <h3 style='font-size:17px; color:purple;'>You can Login using below link.</h3>
   
   <a href='http://localhost/Helperland/Views/#LoginModal'> http://localhost/Helperland/Views/#LoginModal</a>
 </div>";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to_email, $subject, $body, $headers);

}

else if(isset($email1)){

$to_email = $email1;

$ServiceRequestId = $ServiceRequestId;

$subject = "Changes By Admin";

$body = "<h3 style='font-size:16px; color:orange;'>Hii Customer. Your Service Request Address has been changed by Admin.</h3>
   <br>

  <h3 style='font-size:17px; color:red;'>Your Service Request Id is : <span style='color:blue;'>$ServiceRequestId</span></h3><br>

   <h3 style='font-size:17px; color:purple;'>You can Login using below link.</h3>
   
   <a href='http://localhost/Helperland/Views/#LoginModal'> http://localhost/Helperland/Views/#LoginModal</a>
 </div>";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to_email, $subject, $body, $headers);

}

else if(isset($email)){

$to_email = $email;
$plan_date = $plan_date;
$dash_time11 = $dash_time11;
$ServiceRequestId = $ServiceRequestId;

$subject = "Changes By Admin";

$body = "<h3 style='font-size:16px; color:orange;'>Hii Customer. Your Service Request Time and Date has been changed by Admin.</h3>
   <br>

  <h3 style='font-size:17px; color:red;'>Your Service Request Id is : <span style='color:blue;'>$ServiceRequestId</span></h3><br>

  <h3 style='font-size:17px; color:blue;'> Your Service date is : <span style='color:red;'>$plan_date</span> and Your Service Time is : <span style='color:red;'>$dash_time11</span> which is changed by Admin.</h3><br>

   <h3 style='font-size:17px; color:purple;'>You can Login using below link.</h3>
   
   <a href='http://localhost/Helperland/Views/#LoginModal'> http://localhost/Helperland/Views/#LoginModal</a>
 </div>";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to_email, $subject, $body, $headers);

}


else if(isset($email4)){

$to_email = $email4;

$ServiceRequestId = $ServiceRequestId;

$subject = "Service Request Deleted By Admin";

$body = "

  <h3 style='font-size:17px; color:red;'>Hii Customer. Your Service Request Id is : <span style='color:blue;'>$ServiceRequestId</span> has been deleted by <span style='color:blue;'>Admin</span>.</h3><br>

   <h3 style='font-size:17px; color:purple;'>You can Login using below link.</h3>
   
   <a href='http://localhost/Helperland/Views/#LoginModal'> http://localhost/Helperland/Views/#LoginModal</a>
 </div>";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to_email, $subject, $body, $headers);

}

?>