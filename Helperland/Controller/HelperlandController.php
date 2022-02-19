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


    public function CheckPostalCode()
    {
        if (isset($_POST)) {
            $postal = $_POST['postal'];
            $count = $this->model->PostalExists($postal);
            if ($count > 0) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }


    public function GetLocationCity()
    {
        if (isset($_POST)) {
            $pincode = $_POST['postalcode'];
            $result = $this->model->CityLocation($pincode);
            $city = $result[0];
            $state = $result[1];
            $return = [$city, $state];
            echo json_encode($return);
        }
    }



 public function InsertAddress()
    {

        if (isset($_POST)) {
            $street = $_POST['street'];
            $houseno = $_POST['houseno'];
            $pincode = $_POST['pincode'];
            $location = $_POST['location'];
            $mobilenum = $_POST['mobilenum'];
            $email = $_POST['username'];

            $result = $this->model->ResetKey($email);
            $userid = $result[3];
            $type = 0;
            $getstate = $this->model->CityLocation($pincode);
            $state = $getstate[1];

            $array = [
                'userid' => $userid,
                'street' => $street,
                'houseno' => $houseno,
                'location' => $location,
                'state' => $state,
                'pincode' => $pincode,
                'mobilenum' => $mobilenum,
                'email' => $email,
                'type' => $type,

            ];
            $result = $this->model->InsertAddress($array);
        }
    }




    public function GetAddress()
    {
        if (isset($_POST)) {
            $email = $_POST['username'];

            $result = $this->model->GetAddress($email);
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
                    // if ($isdefault == 1) {
                    //     $isdefault =  'checked';
                    // } else {
                    //     $isdefault = '';
                    // }
                

$output = 
'<div class="menubar border">
  <input type="radio" class="radio" id="unique' . $addressid . '" name="address_radio" value="' . $addressid . '">
  <label><b>Address:</b>' . $street . '  ' .$houseno . ' , ' .$city . '  ' .$pincode . '<br>
<b>Telephone number:</b> 9988556644</label>
</div>';

                        echo $output;
               
                }
            }
        }
    }


/*

    public function GetFavouriteServiceProvider()
    {
        if (isset($_POST)) {
            $email = $_POST['username'];
            $result = $this->model->ResetKey($email);
            $email = $result[3];
            // echo $userid;
            $results = $this->model->Favourite($email);
            // TargetUserId
            if (count($results)) {
                foreach ($results as $row) {                                              favourite service provider
                    $id = $row['TargetUserId'];
                    $favourite = $row['IsFavorite'];
                    $blocked = $row['IsBlocked'];

                    $targetresult = $this->model->GetUsers($id);
                    $serviceproviderid = $targetresult['UserId'];
                    $firstname = $targetresult['FirstName'];
                    $lastname = $targetresult['LastName'];
                    if ($favourite == 1) {
                        $output = '
                    <div class="col-md-3 ">
                        <div class="service-provider-imgs">
                            <img src="./assets/image/forma-1-copy-19.png" class="service-provider-img">
                        </div>
                        <h5 class="service-provider-name">' . $firstname . ' ' . $lastname . '</h5>
                        <button type="button" class="btn selectbtn selectsp"  value="' . $serviceproviderid . '" onclick ="CheckSP()" >Select</button>
                    </div>
                ';
                        echo $output;
                    }
                }
            }
        }
    }

  */  

    public function AddServiceRequest()
    {

        // $value = $parameter;
        if (isset($_POST)) {
            $email  = $_POST['username'];
            $selectdate = $_POST['selectdate'];
            $servicetime = $_POST['servicetime'];
            $zipcode = $_POST['zipcode'];
            $servicehourate = $_POST['servicehourate'];
            $servicehours = $_POST['servicehours'];
            $extrahour = $_POST['extrahour'];
            $totalhour = $_POST['totalhour'];
            $totalbed = $_POST['totalbed'];
            $totalbath = $_POST['totalbath'];
            $subtotal = $_POST['subtotal'];
            $discount = $_POST['discount'];
            $totalcost = $_POST['totalcost'];
            $effectivecost = $_POST['effectivecost'];
            $extraservice = $_POST['extraservice'];
            $comments = $_POST['comments'];
            $addressid = $_POST['addressid'];
            $paymentrefno = $_POST['paymentrefno'];
            $paymentdue = $_POST['paymentdue'];
            $haspets = $_POST['haspets'];
            $status = 'Pending';
            $date = date('Y-m-d H:i:s');
            $paymentdone = 1;
            $recordversion = 1;
            $ids = $_POST['selectedsp'];
            $id = array_slice($ids,1);
       

            $result = $this->model->ResetKey($email);
            $clientaddress = $this->model->GetSelectedAddress($addressid);
            if (count($clientaddress)) {
                foreach ($clientaddress as $address) {
                    $clientaddresses = $address['AddressLine2'] . ' ' . $address['AddressLine1'] . ' , ' . $address['City'] . ',' . $address['State'] . ' ,' . $address['PostalCode'];
                    $clientmobile = $address['Mobile'];
                }
            }
            $clientemail = $email;
            $clientname = $result[0];
            $useid = $result[3];


            $array = [
                'userid' => $useid,
                'servicedate' => $selectdate,
                'servicetime' => $servicetime,
                'zipcode'   => $zipcode,
                'servicehourlyrate' => $servicehourate,
                'servicehours' => $servicehours,
                'extrahours' => $extrahour,
                'totalhours' => $totalhour,
                'totalbed' => $totalbed,
                'totalbath' => $totalbath,
                'subtotal' => $subtotal,
                'discount' => $discount,
                'totalcost' => $totalcost,
                'effectivecost' => $effectivecost,
                'extraservices' => $extraservice,
                'comments' => $comments,
                'addressid' => $addressid,
                'paymentrefno' => $paymentrefno,
                'paymentdue' => $paymentdue,
                'pets' => $haspets,
                'status' => $status,
                'createddate' => $date,
                'paymentdone' => $paymentdone,
                'recordversion' => $recordversion,
            ];

            $result = $this->model->AddService($array);
            $serviceprovider = $this->model->GetActiveServiceProvider();
            if ($result) {
                include('BookServiceClientConfirmationMail.php');
                if (sizeof($id)>0) {
                    $sp = $this->model->GetUsersServiceprovider($id);
                    if(count($sp)){
                    
                    $addressid = $result;
                    
                    foreach($sp as $emails){
                        $email = $emails['Email'];
                        include('BookingMail.php');
                    }
                }
                    echo $addressid;
                    
                }
                 else {
                    if (count($serviceprovider)) {
                        foreach ($serviceprovider as $row) {
                            $addressid = $result;
                            $email = $row['Email'];
                            include('BookingMail.php');
                        }
                    }
                    $addressid = $result;
                    echo $addressid;
                }
            } else {
                echo 0;
            }
        }
    }



}
