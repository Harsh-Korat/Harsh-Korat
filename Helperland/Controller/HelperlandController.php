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
  
   echo $result; 
  
      }
    }


 public function ForgotMail()
    {
        // forgot Password mail sent
        if (isset($_POST)) {
    
            $email = $_POST['forgot_email'];
            $result = $this->model->ResetKey($email);
            $username = $result[0];
            $resetkey = $result[1];
            $count = $result[2];
            if ($count == 1) {
                include('ForgotPassword.php');
                echo 1;
               
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
       
        if ($result) {
           echo 1;
       
        } else {
           echo 0;
        }

} else {
         echo 2;
            }
        }
    }
    

 public function User()
    {

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
                echo 1;
            } else {
               echo 0;
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

                echo 1;

            } else {
            
                echo 0;
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
                    <input type="radio" class="radio" id="' . $addressid . '" name="radio" value="' . $addressid . '">
                    <label><b>Address:</b>' . $street . '  ' .$houseno . ' , ' .$city . '  ' .$pincode . '<br>
                    <b>Telephone number:</b> 9988556644</label>
                   </div>';

                        echo $Address;              
                }
            }
        }
    }




    public function AddressCustomer()
    {
        
        if (isset($_POST)) {
            $email = $_POST['username'];

            $result = $this->model->AddressCustomer($email);
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
                       ' <tr>
                            <th scope="row" class="radio">
                                <input type="radio" name="radio">
                            </th>
                            <td scope="row">
                                <div class="form-row address-row"><b class="right">Address:</b>'. $street . '  ' .$houseno . ' , ' .$city . '  ' .$pincode . '</div>
                                <div class="form-row address-row1"><b class="right">Phone number:</b>' . $mobile . '</div>
                            </td>
                            <td class="action">
                                <a href="#" class="edit edit-address" id=' . $addressid . ' data-toggle="modal" data-target="#address1-modal">
                                    <img src="../assets/image/edit-icon.png">
                                </a>
                                <a href="#" id=' . $addressid  .' data-toggle="modal" data-target="#delete-modal" class="edit cancel-lap">
                                    <img src="../assets/image/delete-icon.png">
                                </a>
                            </td>
                        </tr>';

                        echo $Address;              
                }
            }
        }
    }



    public function AddressCustomer1()
    {
        
        if (isset($_POST)) {
            $addressid1 = $_POST['addressid1'];

            $result = $this->model->AddressCustomer1($addressid1);
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
     
                    $Address=

                    '
                     <div id="bottom-address">
                      
                         <div class="row">
                          <div class="form-group col-md-6 mt-1">
                            <label class="street">Street name</label>
                            <input type="text" class="form-control" id="streets" value=' . $street . ' placeholder="Street name" required>
                            <span class="street-message text-danger mt-1"></span>
                          </div>
                     
                          <div class="form-group col-md-6 mt-1">
                            <label class="street">House number</label>
                            <input type="number" class="form-control" id="housenos" value=' . $houseno . ' placeholder="House number" required>
                            <span class="house-message text-danger mt-1"></span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-6 mt-1">
                            <label class="street">Pincode</label>
                            <input type="number" class="form-control street" id="pincodes" value=' . $pincode . ' placeholder="Pincode" maxlength="5" maxlength="6" value="101010">
                          </div>
                       
                        <div class="form-group col-md-6 mt-1">
                          <label class="street">City</label>
                          <select class="form-control street" id="locations" required>
                            <option>Bonn</option>
                          </select>
                         </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-6 mt-1">
                            <label class="street">Phone Number</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text street">+49</div>
                                </div>
                                <input type="tel" class="form-control" id="mobiles" value=' . $mobile . ' placeholder="Mobile number" maxlength="10" size="10" required>
                              </div>
                            </div>
                            <span class="mobile-message text-danger"></span>
                           </div>
                         </div>';



                                            echo $Address;              
                                    }
                                }
                            }
                        }




   public function Dasboard()
    {
        
        if (isset($_POST)) {
            $email = $_POST['username'];

            $result = $this->model->Dasboard($email);
            if (count($result)) {
                foreach ($result as $row) {
                    $ServiceStartDate = $row['ServiceStartDate'];
                    $SubTotal = $row['SubTotal'];
                    $ServiceRequestId = $row['ServiceRequestId'];
                    $Tim = $row['Tim']; // 06:02:41  
                    $totaltime  = $row['TotalHours'];
                

                        $starttime =  date("H:i", strtotime($Tim)); 
                        $startime = str_replace(":", ".", $starttime);
                        $hoursq = intval($startime);
                        $realPartq =  $startime - $hoursq;
                        $minutesq = intval($realPartq * 60);
                         if ($minutesq == 18) {
                             $minutesq = 5;
                         } else {
                              $minutesq = 0;
                          }
                          $startime =  $hoursq . "." . $minutesq;

                          $hours = intval($totaltime);
                          $realPart = $totaltime - $hours;
                          $minutes = intval($realPart * 60);
                          if ($minutes == 30) {
                              $minutes = 5;
                          } else {
                              $minutes = 0;
                          }
                          $totaltimes = $hours . ":" . $minutes;
                          $totaltimes = str_replace(":", ".", $totaltimes);

                          $totaltimes = number_format(($startime +  $totaltimes), 2);
                          $var1 = intval($totaltimes);
                          $var2 = $totaltimes - $var1;
                          if ($var2 == 0.50) {
                              $var2 = 30;
                          } else {
                              $var2 = 00;
                          }
                          $totaltimes = number_format(($var1 . '.' . $var2), 2);
                          $totaltimes = str_replace(".", ":", $totaltimes);

                       
                        $Tim = $starttime. '-' .$totaltimes;



                 //   $Provider_name = $row['Provider_name'];


                     $Address = 

                       '<tr>
                            <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">' . $ServiceRequestId .'</td>

                            <td class="dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">
                            <img src="../assets/image/calendar2.png" class="calendar"><b>' . $ServiceStartDate . '</b><br>
                            <img src="../assets/image/layer-712.png" class="clock">' . $Tim .'
                            </td>

                            <td>


                            </td>
                            
                            <td class="pay">
                            <span class="pay1"><b>€</b></span><span class="pay2"><b>' . $SubTotal . '</b></span>
                            </td>
                            
                            <td class="text-center">
                            <button type="button" 
                            id=' .$ServiceRequestId. ' class="save" data-toggle="modal" data-target="#date-modal">Reschedule</button>

                            <button id=' .$ServiceRequestId. ' class="btn cancel-lap" data-toggle="modal" data-target="#cancel-modal">Cancel</button>
                            </td>
                        </tr>';



                        echo $Address;              
                }
            }
        }
    }



  public function NewServiceRequest()
    {
        
        if (isset($_POST)) {
          //  $email = $_POST['username'];

            $result = $this->model->NewServiceRequest();
            if (count($result)) {
                foreach ($result as $row) {
                    $ServiceStartDate = $row['ServiceStartDate'];
                    $SubTotal = $row['SubTotal'];
                    $ServiceRequestId = $row['ServiceRequestId'];
                    $Tim = $row['Tim']; 
                    $totaltime  = $row['TotalHours'];
                    $street = $row['AddressLine1'];
                    $houseno = $row['AddressLine2'];
                    $city = $row['City'];
                    $pincode = $row['PostalCode'];
                    $firstname = $row['FirstName'];
                    $lastname = $row['LastName'];

                

                        $starttime =  date("H:i", strtotime($Tim)); 
                        $startime = str_replace(":", ".", $starttime);
                        $hoursq = intval($startime);
                        $realPartq =  $startime - $hoursq;
                        $minutesq = intval($realPartq * 60);
                         if ($minutesq == 18) {
                             $minutesq = 5;
                         } else {
                              $minutesq = 0;
                          }
                          $startime =  $hoursq . "." . $minutesq;

                          $hours = intval($totaltime);
                          $realPart = $totaltime - $hours;
                          $minutes = intval($realPart * 60);
                          if ($minutes == 30) {
                              $minutes = 5;
                          } else {
                              $minutes = 0;
                          }
                          $totaltimes = $hours . ":" . $minutes;
                          $totaltimes = str_replace(":", ".", $totaltimes);

                          $totaltimes = number_format(($startime +  $totaltimes), 2);
                          $var1 = intval($totaltimes);
                          $var2 = $totaltimes - $var1;
                          if ($var2 == 0.50) {
                              $var2 = 30;
                          } else {
                              $var2 = 00;
                          }
                          $totaltimes = number_format(($var1 . '.' . $var2), 2);
                          $totaltimes = str_replace(".", ":", $totaltimes);

                       
                        $Tim = $starttime. '-' .$totaltimes;



                 //   $Provider_name = $row['Provider_name'];


                     $Address = 

                      
                          '<tr  id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                            <td>' . $ServiceRequestId . '</td>

                            <td>
                            <img src="../assets/image/calendar2.png" class="calendar"><b>' . $ServiceStartDate . '</b><br>
                            <img src="../assets/image/layer-712.png" class="clock">' . $Tim . '
                            </td>

                            <td>
                            '. $firstname .' ' . $lastname .'<br>
                            <div class="mydiv">
                              <img src="../assets/image/layer-719.png" class="home">
                                <div class="desc">'. $street .' '. $houseno .', '. $city .' - '. $pincode .'<div>  
                                </div>
                            </td>
                            
                              <td class="text-center pay">
                              <span class="pay1"><b>€</b></span><span class="pay2"><b>' . $SubTotal . '</b></span>
                              </td>

                              <td>
                              </td>
                            
                            <td>
                            <button class="btn"  id=' . $ServiceRequestId . ' class="dashboard accept2" data-toggle="modal" data-target="#schedule-modal">Accept</button>
                            </td>
                          </tr>';



                        echo $Address;              
                }
            }
        }
    }


 public function NewServiceRequest1()
    {
        
        if (isset($_POST)) {
          //  $email = $_POST['username'];

            $result = $this->model->NewServiceRequest();
            if (count($result)) {
                foreach ($result as $row) {
                    $ServiceStartDate = $row['ServiceStartDate'];
                    $SubTotal = $row['SubTotal'];
                    $ServiceRequestId = $row['ServiceRequestId'];
                    $Tim = $row['Tim']; 
                    $totaltime  = $row['TotalHours'];
                    $street = $row['AddressLine1'];
                    $houseno = $row['AddressLine2'];
                    $city = $row['City'];
                    $pincode = $row['PostalCode'];
                    $mobile = $row['Mobile'];
                    $firstname = $row['FirstName'];
                    $lastname = $row['LastName'];
                

                        $starttime =  date("H:i", strtotime($Tim)); 
                        $startime = str_replace(":", ".", $starttime);
                        $hoursq = intval($startime);
                        $realPartq =  $startime - $hoursq;
                        $minutesq = intval($realPartq * 60);
                         if ($minutesq == 18) {
                             $minutesq = 5;
                         } else {
                              $minutesq = 0;
                          }
                          $startime =  $hoursq . "." . $minutesq;

                          $hours = intval($totaltime);
                          $realPart = $totaltime - $hours;
                          $minutes = intval($realPart * 60);
                          if ($minutes == 30) {
                              $minutes = 5;
                          } else {
                              $minutes = 0;
                          }
                          $totaltimes = $hours . ":" . $minutes;
                          $totaltimes = str_replace(":", ".", $totaltimes);

                          $totaltimes = number_format(($startime +  $totaltimes), 2);
                          $var1 = intval($totaltimes);
                          $var2 = $totaltimes - $var1;
                          if ($var2 == 0.50) {
                              $var2 = 30;
                          } else {
                              $var2 = 00;
                          }
                          $totaltimes = number_format(($var1 . '.' . $var2), 2);
                          $totaltimes = str_replace(".", ":", $totaltimes);

                       
                        $Tim = $starttime. '-' .$totaltimes;



                 //   $Provider_name = $row['Provider_name'];


                     $Address = 

                
               '<div id=' . $ServiceRequestId . ' class="cards dashboard" data-toggle="modal" data-target="#schedule-modal">
                 <div class="card dashboard" data-toggle="modal" data-target="#schedule-modal">
                    <div class="card-body">
  
                         <h4 class="card-text">' . $ServiceRequestId . '</h4>
                    <hr>

                       <p class="card-text">    
                         <img src="../assets/image/calendar2.png" class="calendars"><b>' . $ServiceStartDate . '</b>
                       <img src="../assets/image/layer-712.png" class="clocks" id='. $ServiceRequestId .'>' . $Tim . '
                       </p>

                       <p class="card-text">'. $firstname .' '. $lastname .'
                       <div class="mydivs" style="margin-bottom: 10px;">
                        <img src="../assets/image/layer-719.png" class="homes">'. $street .' '. $houseno .', '. $city .' - '. $pincode .'
                      </div>
                       </p>

                     <hr>
                        <p class="card-text text-center pay cardbold"><span class="pay2"><b>€</b></span><span class="pay2"><b>'.$SubTotal.'</b></span></p>
                     <hr>
                        <p class="text-center">
                          <button id=' . $ServiceRequestId . ' class="btn dashboard accept2" data-toggle="modal" data-target="#schedule-modal">Accept</button>
                        </p>

                       </div>
                      </div>
                     </div>';



                        echo $Address;              
                }
            }
        }
    }





   public function ServiceHistory()
    {
        
        if (isset($_POST)) {
            $email = $_POST['username'];

            $result = $this->model->Dasboard($email);
            if (count($result)) {
                foreach ($result as $row) {
                    $ServiceStartDate = $row['ServiceStartDate'];
                    $SubTotal = $row['SubTotal'];
                    $ServiceRequestId = $row['ServiceRequestId'];
                    $Tim = $row['Tim'];
                    $totaltime  = $row['TotalHours'];
                   $Provider_name = $row['Provider_name'];

                   
                        $starttime =  date("H:i", strtotime($Tim)); 
                        $startime = str_replace(":", ".", $starttime);
                        $hoursq = intval($startime);
                        $realPartq =  $startime - $hoursq;
                        $minutesq = intval($realPartq * 60);
                         if ($minutesq == 18) {
                             $minutesq = 5;
                         } else {
                              $minutesq = 0;
                          }
                          $startime =  $hoursq . "." . $minutesq;

                          $hours = intval($totaltime);
                          $realPart = $totaltime - $hours;
                          $minutes = intval($realPart * 60);
                          if ($minutes == 30) {
                              $minutes = 5;
                          } else {
                              $minutes = 0;
                          }
                          $totaltimes = $hours . ":" . $minutes;
                          $totaltimes = str_replace(":", ".", $totaltimes);

                          $totaltimes = number_format(($startime +  $totaltimes), 2);
                          $var1 = intval($totaltimes);
                          $var2 = $totaltimes - $var1;
                          if ($var2 == 0.50) {
                              $var2 = 30;
                          } else {
                              $var2 = 00;
                          }
                          $totaltimes = number_format(($var1 . '.' . $var2), 2);
                          $totaltimes = str_replace(".", ":", $totaltimes);

                       
                        $Tim = $starttime. '-' .$totaltimes;


                     $Address = 

                            '<tr>
                              
                                <td class="dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">
                                <img src="../assets/image/calendar.png" class="calendar"><b>' . $ServiceStartDate . '</b><br>
                                <span class="times">' . $Tim . '</span>
                               </td>
                                       
                                <td id="provider_name">
                                <img src="../assets/image/forma-1-copy-19.png" class="round">' . $Provider_name . '<br>
  
                                        
                                </td>
                             
                                <td class="pay">
                                <span class="pay1"><b>€</b></span><span class="pay2"><b>' . $SubTotal . '</b></span>
                                </td>

                                <td class="center">
                                <button type="button" class="btn completed1">Cancelled</button>    
                                </td>    
                                   
                                <td class="center">
                                <button type="button" id=' . $ServiceRequestId . ' class="btn rate-sp" data-toggle="modal" data-target="#rate-modal">Rate SP</button>  
                                </td>
                            </tr>';



                        echo $Address;              
                }
            }
        }
    }






   public function ModalDasboard()
    {
        
        if (isset($_POST)) {
            $email = $_POST['username'];

            $result = $this->model->Dasboard($email);
            if (count($result)) {
                foreach ($result as $row) {
                    $ServiceStartDate = $row['ServiceStartDate'];
                    $SubTotal = $row['SubTotal'];
                    $ServiceRequestId = $row['ServiceRequestId'];
                    $Tim = $row['Tim'];
                   // $Provider_name = $row['Provider_name'];


                     $Address = 
                                    
                                    '<h4 class="card-text dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">' . $ServiceRequestId . '</h4>
                                <hr>

                                   <p class="card-text dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">    
                                     <img src="../assets/image/calendar2.png" class="calendars"><b>' . $ServiceStartDate . '</b>
                                     <img src="../assets/image/layer-712.png" class="clocks">' . $Tim . '
                                   </p>

                                   <p class="card-text">

                                   </p>

                                 <hr>
                                    <p class="card-text text-left pays"><b>€' . $SubTotal . '</b></p>
                                 <hr>
                                    <p class="text-center card-buttn">
                                       <button type="button" id=' . $ServiceRequestId . ' class="save" data-toggle="modal" data-target="#date-modal">Reschedule</button>
                                       <button class="btn cancel-lap" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#cancel-modal">Cancel</button>
                                    </p>';



                        echo $Address;              
                }
            }
        }
    }



   public function ModalHistory()
    {
        
        if (isset($_POST)) {
            $email = $_POST['username'];

            $result = $this->model->Dasboard($email);
            if (count($result)) {
                foreach ($result as $row) {
                    $ServiceStartDate = $row['ServiceStartDate'];
                    $SubTotal = $row['SubTotal'];
                    $ServiceRequestId = $row['ServiceRequestId'];
                    $Tim = $row['Tim'];
                   // $Provider_name = $row['Provider_name'];

                   $Address = 

                              '<p class="card-text dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">    
                                 <img src="../assets/image/calendar2.png" class="calendars"><b>' . $ServiceStartDate . '</b>
                                 <img src="../assets/image/layer-712.png" class="clocks">' . $Tim . '
                                </P>
                               
                                <P>

                                </p>

                             <hr>
                                 
                                 <p class="card-text">    
                                  <div class="pays">
                                  <span class="pay4"><b>€</b></span><span class="pay3"><b>' . $SubTotal . '</b></span>
                                  </div>
                                 </p>

                            <hr>

                                <p class="text-center">
                                <button type="button" class="btn completed1">Cancelled</button>
                                </p>
                              
                            <hr>

                                <p class="text-center">
                                <button type="button" class="btn rate-sp1" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#rate-modal">Rate SP</button>
                                </p>
                              </p>';

                    echo $Address;     
               }
            }
        }
    }


   public function Dasboard1()
    {
        
        if (isset($_POST)) {
            $addressid1 = $_POST['addressid1'];

            $result = $this->model->Dasboard1($addressid1);
            if (count($result)) {
                foreach ($result as $row) {
                    $ServiceStartDate = $row['ServiceStartDate'];
                    $ServiceRequestId = $row['ServiceRequestId'];
                    $Tim = $row['Tim'];
                        $starttime =  date("H:i", strtotime($Tim)); 
                        $startime = str_replace(":", ".", $starttime);
                        $Tim = intval($startime);



                  
                 $result = [$ServiceStartDate, $ServiceRequestId, $Tim];    

                 echo json_encode($result);         
                }
            }
        }
    }


  public function Dasboard2()
    {
        
        if (isset($_POST)) {
            $addressid1 = $_POST['addressid1'];

            $result = $this->model->Dasboard2($addressid1);
            if (count($result)) {
                foreach ($result as $row) {
                    $ServiceStartDate = $row['ServiceStartDate'];
                    $TotalHours = $row['TotalHours'];
                    $ExtraServices = $row['ExtraServices'];
                    $ServiceRequestId = $row['ServiceRequestId'];//
                    $SubTotal = $row['SubTotal'];
                    $AddressLine1 = $row['AddressLine1'];
                    $AddressLine2 = $row['AddressLine2'];
                    $City = $row['City'];
                    $PostalCode = $row['PostalCode'];
                    $Mobile = $row['Mobile'];
                    $Email = $row['Email'];
                    $HasPets = $row['HasPets'];

                    $Tim = $row['Tim'];



          $Address = 

            '<div class="service-warning">' .$ServiceStartDate . ' ' . $Tim . '</div>
              <div class="service-duration">Duration: <span class="duration">' . $TotalHours . '</span></div>

              <hr>
              <div class="service-duration">Service Id: <span class="duration">' . $ServiceRequestId . '</span></div>
              <div class="service-duration">Extras: <span class="duration">' . $ExtraServices . '</span></div>
              <div class="service-duration">Net Amount: <span class="amount">' . $SubTotal . ' €</span></div>

              <hr> 

              <div class="service-duration">Service Address: <span class="duration">' . $AddressLine1 . ' ' . $AddressLine2 . ', ' . $City . ' ' .  $PostalCode .'</span></div>
              <div class="service-duration">Billing Address: <span class="duration">Same as clieaning Address</span></div>
              <div class="service-duration">Phone: <span class="duration">' . $Mobile . '</span></div>
              <div class="service-duration">Email: <span class="duration">' . $Email . '</span></div>';     

              echo $Address;              


                }
            }
        }
    }


  public function ServiceRequestModal()
    {
        
        if (isset($_POST)) {
            $addressid1 = $_POST['addressid1'];

            $result = $this->model->ServiceRequestModal($addressid1);
            if (count($result)) {
                foreach ($result as $row) {
                    $ServiceStartDate = $row['ServiceStartDate'];
                    $totaltime = $row['TotalHours'];
                    $ExtraServices = $row['ExtraServices'];
                    $ServiceRequestId = $row['ServiceRequestId'];//
                    $SubTotal = $row['SubTotal'];
                    $AddressLine1 = $row['AddressLine1'];
                    $AddressLine2 = $row['AddressLine2'];
                    $City = $row['City'];
                    $PostalCode = $row['PostalCode'];
                    $Mobile = $row['Mobile'];
                    $Email = $row['Email'];
                    $HasPets = $row['HasPets'];
                    $firstname = $row['FirstName'];
                    $lastname = $row['LastName'];
                    $Tim = $row['Tim'];

                        $starttime =  date("H:i", strtotime($Tim)); 
                        $startime = str_replace(":", ".", $starttime);
                        $hoursq = intval($startime);
                        $realPartq =  $startime - $hoursq;
                        $minutesq = intval($realPartq * 60);
                         if ($minutesq == 18) {
                             $minutesq = 5;
                         } else {
                              $minutesq = 0;
                          }
                          $startime =  $hoursq . "." . $minutesq;

                          $hours = intval($totaltime);
                          $realPart = $totaltime - $hours;
                          $minutes = intval($realPart * 60);
                          if ($minutes == 30) {
                              $minutes = 5;
                          } else {
                              $minutes = 0;
                          }
                          $totaltimes = $hours . ":" . $minutes;
                          $totaltimes = str_replace(":", ".", $totaltimes);

                          $totaltimes = number_format(($startime +  $totaltimes), 2);
                          $var1 = intval($totaltimes);
                          $var2 = $totaltimes - $var1;
                          if ($var2 == 0.50) {
                              $var2 = 30;
                          } else {
                              $var2 = 00;
                          }
                          $totaltimes = number_format(($var1 . '.' . $var2), 2);
                          $totaltimes = str_replace(".", ":", $totaltimes);

                       
                        $Tim = $starttime. '-' .$totaltimes;


                    



          $Address = 

            '<div class="service-warning">' .$ServiceStartDate . ' ' . $Tim . '</div>
              <div class="service-duration">Duration: <span class="duration">' . $totaltime . '</span></div>

              <hr>
              <div class="service-duration">Service Id: <span class="duration">' . $ServiceRequestId . '</span></div>
              <div class="service-duration">Extras: <span class="duration">' . $ExtraServices . '</span></div>
              <div class="service-duration">Total Payment: <span class="amount">' . $SubTotal . ' €</span></div>

              <hr> 

              <div class="service-duration">Customer Name: <span class="duration">' . $firstname . ' ' . $lastname . '</span></div>
              <div class="service-duration">Service Address: <span class="duration">' . $AddressLine1 . ' ' . $AddressLine2 . ', ' . $City . ' ' .  $PostalCode .'</span></div>
              <div class="service-duration">Phone: <span class="duration">' . $Mobile . '</span></div>
              <div class="service-duration">Email: <span class="duration">' . $Email . '</span></div>';     

              echo $Address;              


                }
            }
        }
    }





 public function DashUpdate()
    {

        if (isset($_POST)) {
            $email = $_POST['username'];

    
            $ServiceRequestId = $_POST['ServiceRequestId'];
            $Date = $_POST['dash_date'];
            $Tim = $_POST['dash_time']; 

            $Tim = $Tim . ':00:00';
      
            $array = [
                'ServiceStartDate' => $Date,
                'Tim' => $Tim,
                'ServiceRequestId' => $ServiceRequestId,

            ];
            $result = $this->model->DashUpdate($array);
            
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }

        }
    }


 public function CustomerRating()
    {

        if (isset($_POST)) {
            $email = $_POST['username'];
            $gender = $_POST['gender'];
            $rates = $_POST['rates'];
            $rate1 = $_POST['rate1']; 
            $feedback = $_POST['feedback'];
            $addressid1 = $_POST['addressid1'];
            $avg = $_POST['avg'];
            $completed1 = '0'; 
           // $provider_name = '0';

           $result = $this->model->ResetKey($email);

           $username = $result[3];
           $provider_name = $result[3];

            $array = [
                'username' => $username,
                'gender' => $gender,
                'rates' => $rates,
                'rate1' => $rate1,
                'feedback' => $feedback,
                'ServiceRequestId' => $addressid1,
                'avg' => $avg,
                'completed' => $completed1,
                'date1' => date('Y-m-d H:i:s'),
                'provider_name' => $provider_name,

            ];
            $result = $this->model->CustomerRating($array);
            
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }

        }
    }



 public function EditCustomerDetails()
    {

        if (isset($_POST)) {

            $addressid = $_POST['addressid'];
            $street = $_POST['street'];
            $houseno = $_POST['houseno'];
            $pincode = $_POST['pincode'];
            $location = $_POST['location'];
            $mobile = $_POST['mobile'];

            $array = [
 
                'street' => $street,
                'houseno' => $houseno,
                'location' => $location,
                'pincode' => $pincode,
                'mobile' => $mobile,
                'addressid' => $addressid,

            ];
            $result = $this->model->EditCustomerDetails($array);
            
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }

        }
    }


 public function DashDelete()
    {

        if (isset($_POST)) {
        
            $ServiceRequestId = $_POST['ServiceRequestId'];

            $array = [
                'ServiceRequestId' => $ServiceRequestId,

            ];
            $result = $this->model->DashDelete($array);
           
            
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }

        }
    }


 public function NewServiceRequestAccept()
    {

        if (isset($_POST)) {

      $ServiceRequestId = $_POST['ServiceRequestId'];

      $results = $this->model->NewServiceRequestConflict($ServiceRequestId); 
      
      $Tim = $results[0];
      $ServiceStartDate1 = $results[1];
      $totaltime = $results[2];

                        $starttime =  date("H:i", strtotime($Tim)); 
                        $startime = str_replace(":", ".", $starttime);
                        $hoursq = intval($startime);
                        $realPartq =  $startime - $hoursq;
                        $minutesq = intval($realPartq * 60);
                         if ($minutesq == 18) {
                             $minutesq = 5;
                         } else {
                              $minutesq = 0;
                          }
                          $startime =  $hoursq . "." . $minutesq;

                          $hours = intval($totaltime);
                          $realPart = $totaltime - $hours;
                          $minutes = intval($realPart * 60);
                          if ($minutes == 30) {
                              $minutes = 5;
                          } else {
                              $minutes = 0;
                          }
                          $totaltimes = $hours . ":" . $minutes;
                          $totaltimes = str_replace(":", ".", $totaltimes);

                          $totaltimes = number_format(($startime +  $totaltimes), 2);
                          $var1 = intval($totaltimes);
                          $var2 = $totaltimes - $var1;
                          if ($var2 == 0.50) {
                              $var2 = 30;
                          } else {
                              $var2 = 00;
                          }
                          $totaltimes = number_format(($var1 . '.' . $var2), 2);
                          $totaltimes = str_replace(".", ":", $totaltimes);

                       
                        $Tim = $starttime. '-' .$totaltimes;

                        $approvestarttime = $starttime; //13 
                        $approveendtime = $totaltimes;//18



            $email = $_POST['username'];

            $result1 = $this->model->ResetKey($email);
            $Provider_name = $result1[3];

        
        $result1 = $this->model->UpcomingTableConflict($Provider_name);  



      if (count($result1)) {
        foreach ($result1 as $row) {


                    $ServiceStartDate = $row['ServiceStartDate'];
                    $totaltime = $row['TotalHours'];
                    $Tim = $row['Tim']; 

                        $starttime =  date("H:i", strtotime($Tim)); 
                        $startime = str_replace(":", ".", $starttime);
                        $hoursq = intval($startime);
                        $realPartq =  $startime - $hoursq;
                        $minutesq = intval($realPartq * 60);
                         if ($minutesq == 18) {
                             $minutesq = 5;
                         } else {
                              $minutesq = 0;
                          }
                          $startime =  $hoursq . "." . $minutesq;

                          $hours = intval($totaltime);
                          $realPart = $totaltime - $hours;
                          $minutes = intval($realPart * 60);
                          if ($minutes == 30) {
                              $minutes = 5;
                          } else {
                              $minutes = 0;
                          }
                          $totaltimes = $hours . ":" . $minutes;
                          $totaltimes = str_replace(":", ".", $totaltimes);

                          $totaltimes = number_format(($startime +  $totaltimes), 2);
                          $var1 = intval($totaltimes);
                          $var2 = $totaltimes - $var1;
                          if ($var2 == 0.50) {
                              $var2 = 30;
                          } else {
                              $var2 = 00;
                          }
                          $totaltimes = number_format(($var1 . '.' . $var2), 2);
                          $totaltimes = str_replace(".", ":", $totaltimes);

                       
                        $Tim = $starttime. '-' .$totaltimes;

                        $completestarttime = $starttime; //
                        $completeendtime = $totaltimes;

                       // echo $completestarttime;
}

            //18              //19                                                                //10
    if(($completeendtime <= $approvestarttime) &&  ($ServiceStartDate1 == $ServiceStartDate) || ($approveendtime <= $completestarttime) && ($ServiceStartDate1 == $ServiceStartDate)) {
           //12 19
             $email = $_POST['username'];

             $result2 = $this->model->ResetKey($email);
             $Provider_name = $result2[3];
             $ServiceRequestId = $_POST['ServiceRequestId'];
             $status = 1;
             $array = [
                 'ServiceRequestId' => $ServiceRequestId,
                 'status' => $status,
                 'Provider_name' => $Provider_name,

             ];
             $result = $this->model->NewServiceRequestAccept($array);
           
            
      
             echo 1;

            // break;


          }


         elseif(($completestarttime <= $approveendtime && $completeendtime >= $approveendtime) && ($ServiceStartDate1 == $ServiceStartDate)){
         echo 22;

       //  break;
           

         }elseif(($completestarttime <= $approvestarttime && $completeendtime >= $approvestarttime) && ($ServiceStartDate1 == $ServiceStartDate)){
         echo 5;
           
// break;
         }

         elseif(($completestarttime <= $approveendtime && $completeendtime >= $approveendtime) && ($ServiceStartDate1 == $ServiceStartDate)){


             echo 2;
     //  break;    

         }

        elseif(($completestarttime >= $approvestarttime && $completeendtime >= $approvestarttime) && ($ServiceStartDate1 == $ServiceStartDate)){


             echo 5;
    //   break;    

         }

  else{

                 echo 2;
          //      break;


            
         }


 

}
        else{
             $email = $_POST['username'];

             $result2 = $this->model->ResetKey($email);
             $Provider_name = $result2[3];
             $ServiceRequestId = $_POST['ServiceRequestId'];
             $status = 1;

             $array = [
                 'ServiceRequestId' => $ServiceRequestId,
                 'status' => $status,
                 'Provider_name' => $Provider_name,

             ];
             $result = $this->model->NewServiceRequestAccept($array);
           
            
      
             echo 1;
         


      }

       }

 }








                 //   $Provider_name = $row['Provider_name'];


                     // $Address = 

            



                     //    echo $Address;              
        
  
            












    




 public function DeleteAddress()
    {

        if (isset($_POST)) {
        
            $addressid = $_POST['addressid'];

            $array = [
                'addressid' => $addressid,
            ];

            $result = $this->model->DeleteAddress($array);
            
        if ($result) {
            echo 1;
        } else {
            echo 0;
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
            $date = date('Y-m-d');
            $time = date('H:i:s');
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
                'tim' => $time,
                 'addressid' => $addressid,
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



  public function CustomerDetails()
    {
        if (isset($_POST)) {
            $email = $_POST['username'];
            $result = $this->model->CustomerDetails($email);
            if (count($result)) {
                foreach ($result as $row) {
                    $firstname = $row['FirstName'];
                    $lastname = $row['LastName'];
                    $email = $row['Email'];
                    $mobile = $row['Mobile'];
                    $birth = $row['Birth'];
                    $month = $row['Month'];
                    $year = $row['Year'];
                    $language = $row['LanguageId'];

                    $_SESSION['name'] = $firstname;

                    if (!empty($date)) {

                        list($year, $month, $birth) = explode("-", $date);
                    } 

                    $result = [$firstname, $lastname, $email, $mobile, $birth, $month, $year, $language];

                    echo json_encode($result);
                }
            }
        }
    }



  public function CustomerUpdateDetails()
     {

         if (isset($_POST)) {
    
             $email = $_POST['email'];
        
                 $array = [
                     'firstname' => $_POST['firstname'],
                     'lastname' => $_POST['lastname'],
                     'email' => $email,
                     'mobile' => $_POST['mobile'],
                     'birth' => $_POST['birth'],
                     'month' => $_POST['month'],
                     'year' => $_POST['year'],
                     'language' => $_POST['language'],
                 ];

                 $result = $this->model->CustomerUpdateDetails($array);
                 echo 1;
             } else {
                echo 0;
           }
         }
    

  public function ServiceProviderHistory()
    {
        
        if (isset($_POST)) {
          $email = $_POST['username'];
            $number = $_POST['number'];
            $result1 = $this->model->ResetKey($email);
            $Provider_name = $result1[3];
            $result = $this->model->ServiceProviderHistory($Provider_name);
            if (count($result)) {
                foreach ($result as $row) {
                    $ServiceStartDate = $row['ServiceStartDate'];
                    $SubTotal = $row['SubTotal'];
                    $ServiceRequestId = $row['ServiceRequestId'];
                    $Tim = $row['Tim']; 
                    $totaltime  = $row['TotalHours'];
                    $street = $row['AddressLine1'];
                    $houseno = $row['AddressLine2'];
                    $city = $row['City'];
                    $pincode = $row['PostalCode'];
                    $firstname = $row['FirstName'];
                    $lastname = $row['LastName'];
                    $mobile = $row['Mobile'];


                

                        $starttime =  date("H:i", strtotime($Tim)); 
                        $startime = str_replace(":", ".", $starttime);
                        $hoursq = intval($startime);
                        $realPartq =  $startime - $hoursq;
                        $minutesq = intval($realPartq * 60);
                         if ($minutesq == 18) {
                             $minutesq = 5;
                         } else {
                              $minutesq = 0;
                          }
                          $startime =  $hoursq . "." . $minutesq;

                          $hours = intval($totaltime);
                          $realPart = $totaltime - $hours;
                          $minutes = intval($realPart * 60);
                          if ($minutes == 30) {
                              $minutes = 5;
                          } else {
                              $minutes = 0;
                          }
                          $totaltimes = $hours . ":" . $minutes;
                          $totaltimes = str_replace(":", ".", $totaltimes);

                          $totaltimes = number_format(($startime +  $totaltimes), 2);
                          $var1 = intval($totaltimes);
                          $var2 = $totaltimes - $var1;
                          if ($var2 == 0.50) {
                              $var2 = 30;
                          } else {
                              $var2 = 00;
                          }
                          $totaltimes = number_format(($var1 . '.' . $var2), 2);
                          $totaltimes = str_replace(".", ":", $totaltimes);

                       
                        $Tim = $starttime. '-' .$totaltimes;



                 //   $Provider_name = $row['Provider_name'];
                  if($number == 1){

                     $Address = 

                      
                          '<tr id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                            <td>' . $ServiceRequestId .'</td>

                            <td>
                            <img src="../assets/image/calendar2.png" class="calendar"><b>' . $ServiceStartDate .'</b><br>
                            <img src="../assets/image/layer-712.png" class="clock">' . $Tim .'
                            </td>

                            <td>
                            <span style="margin-left:30px;">'. $firstname .' '. $lastname .'</span><br>
                            <div class="mydiv">
                              <img src="../assets/image/layer-719.png" class="home">
                                <div class="desc">'. $street .' '. $houseno .', '. $city .' - ' .$pincode .'<div>
                                <div class= "desc">'. $mobile .'</div>  
                                </div>
                            </td>
                            
                          </tr>';



                        echo $Address;              
                }

                  if($number == 0){

                    $Address = 

                          '<div id=' . $ServiceRequestId . ' class="cards dashboard" data-toggle="modal" data-target="#schedule-modal">
                           <div class="card">
                             <div class="card-body">
                               <h4 class="card-text">'. $ServiceRequestId .'</h4>
                          <hr>

                             <p class="card-text">    
                               <img src="../assets/image/calendar2.png" class="calendars"><b>'. $ServiceStartDate .'</b>
                             <img src="../assets/image/layer-712.png" class="clocks">'. $Tim .'
                             </p>

                          <hr>

                             <p class="card-text">'. $firstname .' '. $lastname .'
                             <div class="mydivs" style="margin-bottom: 10px;">
                              <img src="../assets/image/layer-719.png" class="homes">'. $street .' '. $houseno .', '. $city .' - ' .$pincode .'
                            </div>
                             </p>
                           
                           <hr>

                             <p class= "card-text">'. $mobile .'</p> 

                             </div>
                            </div>
                          </div>';
                      
                       echo $Address;   



              }   
            }
        }
    }
}



 public function UpcomingTable()
    {
        
        if (isset($_POST)) {
            $email = $_POST['username'];
            $number = $_POST['number'];

            $result1 = $this->model->ResetKey($email);
            $Provideer_name = $result1[3];

            $result = $this->model->UpcomingTable($Provideer_name);
            if (count($result)) {
                foreach ($result as $row) {
                    $ServiceStartDate = $row['ServiceStartDate'];
                    $SubTotal = $row['SubTotal'];
                    $ServiceRequestId = $row['ServiceRequestId'];
                    $Tim = $row['Tim']; 
                    $totaltime  = $row['TotalHours'];
                    $street = $row['AddressLine1'];
                    $houseno = $row['AddressLine2'];
                    $city = $row['City'];
                    $pincode = $row['PostalCode'];
                    $mobile = $row['Mobile'];
                    $firstname = $row['FirstName'];
                    $lastname = $row['LastName'];
                

                        $starttime =  date("H:i", strtotime($Tim)); 
                        $startime = str_replace(":", ".", $starttime);
                        $hoursq = intval($startime);
                        $realPartq =  $startime - $hoursq;
                        $minutesq = intval($realPartq * 60);
                         if ($minutesq == 18) {
                             $minutesq = 5;
                         } else {
                              $minutesq = 0;
                          }
                          $startime =  $hoursq . "." . $minutesq;

                          $hours = intval($totaltime);
                          $realPart = $totaltime - $hours;
                          $minutes = intval($realPart * 60);
                          if ($minutes == 30) {
                              $minutes = 5;
                          } else {
                              $minutes = 0;
                          }
                          $totaltimes = $hours . ":" . $minutes;
                          $totaltimes = str_replace(":", ".", $totaltimes);

                          $totaltimes = number_format(($startime +  $totaltimes), 2);
                          $var1 = intval($totaltimes);
                          $var2 = $totaltimes - $var1;
                          if ($var2 == 0.50) {
                              $var2 = 30;
                          } else {
                              $var2 = 00;
                          }
                          $totaltimes = number_format(($var1 . '.' . $var2), 2);
                          $totaltimes = str_replace(".", ":", $totaltimes);

                       
                        $Tim = $starttime. '-' .$totaltimes;


                 //   $Provider_name = $row['Provider_name'];
                   
                   if($number == 1){

                     $Address = 

                
                            '<tr id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                              <td>'. $ServiceRequestId .'</td>

                              <td>
                              <img src="../assets/image/calendar2.png" class="calendar"><b>' . $ServiceStartDate .'</b><br>
                              <img src="../assets/image/layer-712.png" class="clock">'. $Tim .'
                              </td>

                              <td>
                              '. $firstname .' '. $lastname .'<br>
                              <div class="mydiv">
                                <img src="../assets/image/layer-719.png" class="home">
                                  <div class="desc">'. $street .' '. $houseno .', '. $city .' - ' .$pincode .'<div>  
                                  </div>
                              </td>
                              
                                <td class="text-left pay">
                                <span class="pay1"><b>€</b></span><span class="pay2"><b>'. $SubTotal .'</b></span>
                                </td>

                                <td class="km">0 KM</td>
                              
                              <td>
                              <button id=' . $ServiceRequestId . ' class="btn dashboard" data-toggle="modal" data-target="#schedule-modal">Cancel</button>
                              </td>
                            </tr>';



                        echo $Address; 

                      }


                   if($number == 0){

                     $Address = 

                          '<div id=' . $ServiceRequestId . ' class="cards dashboard" data-toggle="modal" data-target="#schedule-modal">
                           <div class="card">
                             <div class="card-body">
                               <h4 class="card-text">'. $ServiceRequestId .'</h4>
                          <hr>

                             <p class="card-text">    
                               <img src="../assets/image/calendar2.png" class="calendars"><b>' . $ServiceStartDate .'</b>
                             <img src="../assets/image/layer-712.png" class="clocks">'. $Tim .'
                             </p>

                             <p class="card-text">'. $firstname .' '. $lastname .'
                             <div class="mydivs" style="margin-bottom: 10px;">
                              <img src="../assets/image/layer-719.png" class="homes">'. $street .' '. $houseno .', '. $city .' - ' .$pincode .'
                            </div>
                             </p>

                           <hr>
                              <p class="card-text text-center pay cardbold"><span class="pay2"><b>€</b></span><span class="pay2"><b>'. $SubTotal .'</b></span></p>
                           <hr>
                              <p id=' . $ServiceRequestId . ' class="text-center dashboard" data-toggle="modal" data-target="#schedule-modal">
                                <button class="btn">Cancel</button>
                              </p>
                             </div>
                            </div>
                          </div>';
                    
                     echo $Address; 

                }
            }
        }
    }
}


    public function CustomerUpdatePassword()
    {
        if (isset($_POST)) {
            $email = $_POST['username'];
            $currentpassword = $_POST['currentpassword'];
            $newpassword = $_POST['password'];
            $confirmpassword = $_POST['cpassword'];
            $modifiedby = $_POST['modifiedby'];
            $password = $this->model->CustomerDetails($email);
            if (count($password)) {
                foreach ($password as $pass) {
                    $databasepassword = $pass['Password'];
                    $resetkey = $pass['ResetKey'];
                    if (password_verify($currentpassword, $databasepassword)) {
                        if ($newpassword == $confirmpassword) {
                            $update_date = date('Y-m-d H:i:s');
                            $newpass = password_hash($newpassword, PASSWORD_BCRYPT);
                            $cpass = password_hash($confirmpassword, PASSWORD_BCRYPT);
                            $array = [
                                'password' => $newpass,
                                'updatedate' => $update_date,
                                'modifiedby' => $modifiedby,
                                'resetkey' => $resetkey,
                            ];
                            $result = $this->model->ResetPass($array);

                            $count = $result;
                            if ($count == 1) {
                                echo 1;
                            } else {
                                echo 2;
                            }
                        }
                    } else {
                        echo 0;
                    }
                }
            }
        }
    }



public function ServiceProviderDetails()
    {
        if (isset($_POST)) {
            $email = $_POST['username'];
            $result = $this->model->ProviderSettingDetails($email);
            if (count($result)) {
                foreach ($result as $row) {
                    $firstname = $row['FirstName'];
                    $lastname = $row['LastName'];
                    $email = $row['Email'];
                    $mobile = $row['Mobile'];
                    $date = $row['DateOfBirth'];
                    $languageid = $row['LanguageId'];
                   // $statusactive = $row['Status'];
                    $avtarimg = $row['UserProfilePicture'];
                    $natinallity = $row['NationalityId'];
                    $gender = $row['Gender'];
                    $ZipCode = $row['ZipCode'];
                    $isactives = $row['IsActive'];
                    $address = $this->model->ProviderAddress($email);
                    if (count($address)) {
                        foreach ($address as $addr) {
                            $street = $addr['AddressLine1'];
                            $houseno = $addr['AddressLine2'];
                            $postalcode = $addr['PostalCode'];
                            $city = $addr['City'];
                        }
                    }
                    if ($isactives == "Yes") {
                        $isactive = 1;
                    } else {
                        $isactive = 0;
                    }
                    if (!empty($date)) {

                        list($year, $month, $day) = explode("-", $date);
                    } else {
                        $year = "Year";
                        $month = "Month";
                        $day = "Day";
                    }

                    $result = [$firstname, $lastname, $email, $mobile, $day, $month, $year, $languageid, $isactive, $avtarimg, $natinallity, $gender, $street, $houseno, $postalcode, $city, $ZipCode];

                    echo json_encode($result);
                }
            }
        }
    }



 public function UpcomingRequestComplete()
    {

        if (isset($_POST)) {

            $email = $_POST['username'];

            $result1 = $this->model->ResetKey($email);
            $Provideer_name = $result1[3];

            $ServiceRequestId = $_POST['ServiceRequestId'];
          
            $result2 = $this->model->ServiceRequestId($ServiceRequestId);


            $customer_name = $result2[0];
            $isblock = 0;
            $isfavorite = 0;
            $array1 = [
                'Provideer_name' => $Provideer_name,
                'customer_name' => $customer_name,
                'isblock' => $isblock,
                 'isfavorite' => $isfavorite,

            ];  

           $result3 = $this->model->favoriteandblocked($array1);        


            $status = 2;

            $array = [
                'ServiceRequestId' => $ServiceRequestId,
                'status' => $status,

            ];
            $result = $this->model->UpcomingRequestComplete($array);
           
            
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }

        }
    }


 public function UpcomingRequestCancel()
    {

        if (isset($_POST)) {
        
            $ServiceRequestId = $_POST['ServiceRequestId'];
            $status = 3;

            $array = [
                'ServiceRequestId' => $ServiceRequestId,
                'status' => $status,

            ];
            $result = $this->model->UpcomingRequestCancel($array);
           
            
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }

        }
    }


 public function ServiceProviderDetails1()
    {
        if (isset($_POST)) {
            $firstname =   $_POST['firstname'];
            $lastname =   $_POST['lastname'];
            $email =   $_POST['email'];
            $mobile =   $_POST['mobile'];
            $birthdate =   $_POST['birthdate'];
            $avtarimg = $_POST['avtarimg'];
            $gender = $_POST['gender'];
            $pincode = $_POST['pincode'];
            $street = $_POST['street'];
            $houseno = $_POST['houseno'];
            $location = $_POST['location'];
            $mobilenum = $_POST['mobilenum'];
            $nationallity = $_POST['nationallity'];
            $modifiedby = $firstname . " " . $lastname;
            $modifieddate = date('Y-m-d H:i:s');
            $useraddress = $this->model->ProviderAddress($email);

            $result = $this->model->ResetKey($email);
            $userid = $result[3];
            $type = 1;
            $getstate = $this->model->City($pincode);
            $state = $getstate[1];


            $array = [
                'fistname' => $firstname,
                'lastname' => $lastname,
                'mobile' => $mobile,
                'avtarimg' => $avtarimg,
                'gender' => $gender,
                'pincode' => $pincode,
                'nationallity' => $nationallity,
                'birthdate' => $birthdate,
                'modifieddate' => $modifieddate,
                'modifiedby' => $email,
                "email" => $email,
            ];

            $addressarray = [
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

            $updateaddressarray = [

                'street' => $street,
                'houseno' => $houseno,
                'location' => $location,
                'state' => $state,
                'pincode' => $pincode,
                'mobilenum' => $mobilenum,
                'email' => $email,

            ];
            if (!count($useraddress)) {
                $results = $this->model->UpdateServiceProviderAddress($addressarray);
                $counts = $results[0];
            }
            if (count($useraddress)) {
                $results = $this->model->UpdateServiceProviderAddress1($updateaddressarray);
                $countsupdate = $results[0];
            }
            $result = $this->model->UpdateSP($array);

            $count = $result[0];
            if ($count == 1 || $counts == 1) {
                $_SESSION['firstname'] = $modifiedby;
                echo 1;
            } else {
                echo 0;
            }
        }
    }


 public function BlockCustomer()
    {

        if (isset($_POST)) {

            $email = $_POST['username'];

            $result = $this->model->ResetKey($email);
            $Provider_name = $result[3];


            $result = $this->model->BlockCustomer($Provider_name);
           
            if (count($result)) {
                foreach ($result as $row) {
                    $firstname = $row['FirstName'];
                    $lastname = $row['LastName'];
                    $userid = $row['UserId'];

                    $result1 = $this->model->FindBlockCustomer($userid);
                    $block = $result1[0];

                      if($block == 1){
                        $block1 = "Block";
                      }
                     if($block == 0){
                      $block1 = "Unblock";
                     }
                           

           $Address = 

                  '<section class="block">
                    <div class="round text-center" >
                      <img src="../assets/image/forma-1-copy-19.png">
                    </div>
                      <p class="service-provider text-center">' . $firstname . ' ' . $lastname . '</p>
                      <button type="button" class="favourite-bttn" id=' . $userid . '>' . $block1 .'</button>
                      
                  </section>';
          
           echo $Address;


        }
      }
    }
    }


 public function BlockCustomerRequest()
    {

        if (isset($_POST)) {
        
            $email = $_POST['username'];
            $userid = $_POST['userid'];
            
            $result1 = $this->model->FindBlockCustomer($userid);
            $block = $result1[0];
            
            if($block == 0){
              $IsBlocked = 1;
            }
            if($block == 1){
              $IsBlocked = 0;
            }

            $result = $this->model->ResetKey($email);
            $Provider_name = $result[3];

            $array = [
                'Provider_name' => $Provider_name,
                'userid' => $userid,
                'IsBlocked' => $IsBlocked,
                

            ];
            $result = $this->model->BlockCustomerRequest($array);

            $result2 = $this->model->FindBlockCustomer($userid);
            $block = $result1[0];
            
        if ($block == 1) {
            echo 1;
        } if($block == 0) {
            echo 0;
        }

        }
    }

}
