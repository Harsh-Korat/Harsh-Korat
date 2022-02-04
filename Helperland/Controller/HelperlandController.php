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


public function Contact()
{
 if (isset($_POST)) {
   $base_url = "http://localhost/Helperland/Views/Contact.php";

   $array = [
      'name' => $_POST['firstname'] . " " . $_POST['lastname'],
      'email' => $_POST['email'],
      'subject' => $_POST['subject'],
      'mobile' => $_POST['mobile'],
      'message' => $_POST['message'],
      'creationdt' => date('Y-m-d H:i:s'),
      'status' => 'success',
      'priority' => 4,
            ];
   $result = $this->model->Contact($array);
   $_SESSION['err'] = "Your Feedback has been Sended Successfully.";
   header('Location:' . $base_url);
      }
    }

 public function ForgotMail()
    {
        // forgot Password mail sent
        if (isset($_POST)) {
            $base_url = "http://localhost/Helperland/#LoginModal";
            $email = $_POST['forgot_email'];
            $result = $this->model->ResetKey($email);
            $username = $result[0];
            $resetkey = $result[1];
            $count = $result[2];
            if ($count == 1) {
                include('ForgotPassword.php');
                $_SESSION['message'] = "Reset Password Link has been sent successfully!";

               header('Location:' . $base_url);
            } else {
                $_SESSION['message'] = "Please Enter Valid Email";

                header('Location:' . $base_url);
            }
        }
    }


public function ResetPassword()
    {
        $resetkey = $_GET['parameter'];
        include('./Views/ResetPassword.php');
    }

    public function ResetKeyPassword()
    {
        if (isset($_POST)) {
            $base_url = "http://localhost/Helperland/#LoginModal";
            $resetkey = $_POST['reset'];
            $newpass = $_POST['newpassword'];
            $newcpass = $_POST['newcpassword'];
            $update_date = date('Y-m-d H:i:s');
            $pass = password_hash($newpass, PASSWORD_BCRYPT);
            $cpass = password_hash($newcpass, PASSWORD_BCRYPT);
            if ($newpass == $newcpass) {
                $array = [
                    'password' => $pass,
                    'updatedate' => $update_date,
                    'modifiedby' => 0,
                    'resetkey' => $resetkey,
                ];
                $result = $this->model->ResetPass($array);
                $_SESSION['message'] = $result[0];

                header('Location:' . $base_url);
            } else {
                $_SESSION['message'] = "Password Not Match";

                header('Location:' . $base_url);
            }
        }
    }

 public function User()
    {
        $baseurl = "http://localhost/Helperland/Views/customer-signup.php";
        $base_url = 'http://localhost/Helperland/#LoginModal';
        if (isset($_POST)) {
            $resetkey = bin2hex(random_bytes(15));
            $email = $_POST['email'];
            $count = $this->model->Email($email);

            if ($count == 0) {
                $array = [
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'email' => $email,
                    'mobile' => $_POST['mobile'],
                    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                    'usertypeid' => 0,
                    'roleid' => 'Customer',
                    'resetkey' => $resetkey,
                    'creationdt' => date('Y-m-d H:i:s'),
                    'status' => 'New',
                    'isactive' => 'No',
                    'isregistered' => 'yes',
                ];
                $result = $this->model->Customer_SP($array);
                $_SESSION['message'] = "Your Registration has been Completed Successfully.";
                header("Location:" . $base_url);
            } else {
                $_SESSION['message'] = "Email Already Exists.  Try Another Email.";
                header("Location:" . $baseurl);
            }
        }
    }

    
    public function Login()
    {
      
        if (isset($_POST)) {
            $email = $_POST['loginemail'];
            $password = $_POST['password'];
            $count = $this->model->Login($email, $password);
        }
    }



    public function ServiceProvider(){
        $baseurl = "http://localhost/Helperland/Views/Service.php";
        $base_url = 'http://localhost/Helperland/#LoginModal';
        if (isset($_POST)) {
            $resetkey = bin2hex(random_bytes(15));
            $email = $_POST['email'];
            $count = $this->model->Email($email);

            if ($count == 0) {
                $array = [
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'email' => $email,
                    'mobile' => $_POST['mobile'],
                    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                    'usertypeid' => 1,
                    'roleid' => 'ServiceProvider',
                    'resetkey' => $resetkey,
                    'creationdt' => date('Y-m-d H:i:s'),
                    'status' => 'Pending',
                    'isactive' => 'No',
                    'isregistered' => 'yes',
                ];
                $result = $this->model->Customer_SP($array);
              $_SESSION['message'] = "Your Registration has been Completed Successfully.";
              header('Location:' . $base_url);

            } else {
                $_SESSION['err'] = "Email Already Exists.  Try Another Email.";
                header("Location:" . $baseurl);
            }
        }

    }

}