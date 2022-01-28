<?php

class HelperlandController
{
  function __construct()
    {
      include('Models/Helperland-model.php');
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
   $base_url = "http://localhost/helper/Contact";
   $mobile =  $_POST['mobile'];
   $email = $_POST['email'];
   $subject = $_POST['sub'];
   $message = $_POST['message'];
   $name = $_POST['firstname'] . " " . $_POST['lastname'];
   $array = [
      'name' => $name,
      'email' => $email,
      'subject' => $subject,
      'mobile' => $_POST['mobile'],
      'message' => $message,
      'creationdt' => date('Y-m-d H:i:s'),
      'status' => 'success',
      'priority' => 4,
            ];
   $result = $this->model->Contactus($array);
   $results = $this->model->ResetKey($email);
   $_SESSION['firstname'] = $results[0];
   $_SESSION['status_msg'] = $result[0];
   $_SESSION['status_txt'] = $result[1]; 
   $_SESSION['status'] = $result[2];
   header('Location:' . $base_url);
      }
    }

}