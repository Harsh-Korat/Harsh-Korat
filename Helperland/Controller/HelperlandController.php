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
    $baseurl = "http://localhost/Helperland/?controller=Helperland&function=ResetPassword&parameter=$resetkey";
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
       
        if ($result) {
            $_SESSION['message'] = "Password Updated Successfully";
            header('Location:' . $base_url);
       
        } else {
            $_SESSION['message'] = "Password Not Updated. Please Try Again.";
            header('Location:' . $baseurl);
        }

} else {
        $_SESSION['message'] = "Password Not Match. Please Try Again";
         header('Location:' . $baseurl);
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


    public function Login1()
    {

        if (isset($_POST)) {
            $email = $_POST['loginemail'];
            $password = $_POST['password'];
            $count = $this->model->Login1($email, $password);
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


    public function Pincode()
    {
        if (isset($_POST)) {
            $postal = $_POST['postal'];
            $count = $this->model->Pincode($postal);
            if ($count > 0) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }


    public function City()
    {
        if (isset($_POST)) {
            $pincode = $_POST['postalcode'];
            $result = $this->model->City($pincode);
            $city = $result[0];
            $state = $result[1];
            $return = [$city, $state];
            echo json_encode($return);
        }
    }



 public function AddressDetails()
    {

        if (isset($_POST)) {
            $street = $_POST['street'];
            $houseno = $_POST['houseno'];
            $pincode = $_POST['pincode'];
            $location = $_POST['location'];
            $mobile = $_POST['mobile'];
            $email = $_POST['username'];

            $result = $this->model->ResetKey($email);
            $userid = $result[3];
            $type = 0;
            $getstate = $this->model->City($pincode);
            $state = $getstate[1];

            $array = [
                'userid' => $userid,
                'street' => $street,
                'houseno' => $houseno,
                'location' => $location,
                'state' => $state,
                'pincode' => $pincode,
                'mobile' => $mobile,
                'email' => $email,
                'type' => $type,

            ];
            $result = $this->model->AddressDetails($array);
        }
    }




    public function Address()
    {
        
        if (isset($_POST)) {
            $email = $_POST['username'];

            $result = $this->model->Address($email);
            if (count($result)) {
                foreach ($result as $row) {
                    $street = $row['AddressLine1'];
                    $houseno = $row['AddressLine2'];
                    $city = $row['City'];
                    $pincode = $row['PostalCode'];
                    $mobile = $row['Mobile'];
                    $isdefault = $row['IsDefault'];
                    $isdeleted = $row['IsDeleted'];
                    $addressid = $row['AddressId'];

           $Address = 
                   '<div class="menubar border">
                    <input type="radio" class="radio" id="unique' . $addressid . '" name="radio" value="' . $addressid . '">
                    <label><b>Address:</b>' . $street . '  ' .$houseno . ' , ' .$city . '  ' .$pincode . '<br>
                    <b>Telephone number:</b> 9988556644</label>
                   </div>';

                        echo $Address;              
                }
            }
        }
    }



public function Request()
    {

        if (isset($_POST)) {
            $email  = $_POST['username'];   
            $selectdate = $_POST['plan_date'];
            $servicetime = $_POST['plan_time'];
            $zipcode = $_POST['pincode'];
            $servicehourate = $_POST['service_rate'];
            $servicehours = $_POST['basics'];
            $extrahour = $_POST['more_time'];
            $plan_hour = $_POST['plan_hour'];
            $plan_bed = $_POST['plan_bed'];
            $plan_bath = $_POST['plan_bath'];
            $subtotal = $_POST['card_amounts'];
            $discount = $_POST['discount'];
            $plan_cost = $_POST['total_payments'];
            $effective_prices = $_POST['effective_prices'];
            $extra_item = $_POST['extra_item'];
            $comments = $_POST['comments'];
            $addressid = $_POST['address'];
            $paymentdue = $_POST['paymentdue'];
            $haspets = $_POST['pets'];
            $status = 'Pending';
            $date = date('Y-m-d H:i:s');
            $paymentdone = 1;
            $recordversion = 1;
            $result = $this->model->ResetKey($email);
                       
            $userid = $result[3];

            $array = [
                'userid' => $userid,
                'servicedate' => $selectdate,
                'servicefrequency' => $servicetime,
                'zipcode'   => $zipcode,
                'servicehourlyrate' => $servicehourate,
                'servicehours' => $servicehours,
                'extrahours' => $extrahour,
                'totalhours' => $plan_hour,
                'totalbed' => $plan_bed,
                'totalbath' => $plan_bath,
                'subtotal' => $subtotal,
                'discount' => $discount,
                'totalcost' => $plan_cost,
                'effectivecost' => $effective_prices,
                'extraservices' => $extra_item,
                'comments' => $comments,
                'paymentdue' => $paymentdue,
                'pets' => $haspets,
                'status' => $status,
                'createddate' => $date,
                'paymentdone' => $paymentdone,
                'recordversion' => $recordversion,
            ];

            $result = $this->model->ServiceRequest($array);
            $GoingtoServiceProvider = $this->model->GoingtoServiceProvider();
            $customer_mail = $this->model->GoingCustomerMail($email);
            

    if ($result) {     
      if (count($GoingtoServiceProvider)) {
          foreach ($GoingtoServiceProvider as $row) {
            $id = $result;
            $email = $row['Email'];
           include('Accept-Booking-Mail.php');
           }
          }      

      if (count($customer_mail)) {
          foreach ($customer_mail as $row) {
           $email = $row['Email'];
           include('Customer-mail.php');
           }
          } 
            echo $result;
        }
        else {
             echo 0;
        }
     }
  }
}
