<?php

class HelperlandController
{
  function __construct()
    {
      include('./Models/Helperland-model.php');
      $this->model = new Helperland();
      session_start();
    }


public function HomePage()
  {
  header("location: ./Views/index.php");
  }



public function ContactUs()
{
 if (isset($_POST)) {
   $base_url = "http://localhost/Helperland/Views/Contact.php";
   $name = $_POST['firstname'] . " " . $_POST['lastname'];
   $email = $_POST['email'];
   $mobile =  $_POST['mobile'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];
   $array = [
      'name' => $name,
      'email' => $email,
      'subject' => $subject,
      'mobile' => $mobile,
      'message' => $message,
      'creationdt' => date('Y-m-d H:i:s'),
      'status' => 'success',
      'priority' => 4,
            ];
   $result = $this->model->Contactus($array);
   header('Location:' . $base_url);
      }
    }
}
