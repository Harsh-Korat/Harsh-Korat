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

 public function logout()
    {

        if (isset($_POST)) {
    
              session_unset();
              session_destroy();
               
                echo 1;
               
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
                    $Tim = $row['Tim'];  
                    $totaltime  = $row['TotalHours'];
                    $userid = $row['Provider_Name'];
                

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

                        $provider_row1 = $this->model->ProviderDashboardCount($userid);

                        if($provider_row1 == 0){
                         
                     $Address = 

                       '<tr>
                            <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">' . $ServiceRequestId .'</td>

                            <td class="dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">
                            <img src="../assets/image/calendar2.png" class="calendar"><b>' . $ServiceStartDate . '</b><br>
                            <img src="../assets/image/layer-712.png" class="clock">' . $Tim .'
                            </td>

                            <td>

                            </td>
                            
                            <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">
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

                        if($provider_row1 > 0){

                        $provider_row = $this->model->ProviderDashboard($userid);

                        $Service_Provider_Name1 = $provider_row['FirstName'];
                        $Service_Provider_Name2 = $provider_row['LastName'];
                        $Provider_img = $provider_row['UserProfilePicture'];

                        if($Provider_img == ''){
                        $Provider_img1 = '../assets/image/forma-1-copy-19.png" class="round"';

                        }else{
                        $Provider_img1 = ''.$Provider_img.'" style="width:40px;height:40px; margin-right:10px; margin-top:5px;margin-bottom:-8px;"';
                        }

                        $Service_Provider_Name = $Service_Provider_Name1 . ' ' . $Service_Provider_Name2;

                      
                        $Service_Provider_Name = $Service_Provider_Name1 . ' ' . $Service_Provider_Name2;

                        $Provider_all_ratings1 = $this->model->OverAllRatingOfServiceProvider1($userid);
                        $Provider_all_ratings = $this->model->OverAllRatingOfServiceProvider($userid);
                     
                       
                 if (count($Provider_all_ratings) > 0) {
                   $All_Ratings = 0;
                  foreach ($Provider_all_ratings as $row) {
                   
                   $r = $row['Ratings'];
                   
                  $All_Ratings = $All_Ratings + $r;
                  
                   }
                 $average = intval($All_Ratings/$Provider_all_ratings1);

                      $stars = "";
                            for ($x = 1; $x <= $average; $x+=1) {
                             $stars = $stars."<i class='fa fa-star star1'></i>";
                              
                               } 

                      $avgs = 5.0 - $average;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2'></i>";
                              
                               } 


                     $Address = 

                       '<tr>
                            <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">' . $ServiceRequestId .'</td>

                            <td class="dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">
                            <img src="../assets/image/calendar2.png" class="calendar"><b>' . $ServiceStartDate . '</b><br>
                            <img src="../assets/image/layer-712.png" class="clock">' . $Tim .'
                            </td>

                            <td>
                              <img src="'.$Provider_img1.'>' . $Service_Provider_Name . '<br>
                              <span class="time">' . $stars . $stars1.' '.$average.'</span>

                            </td>
                            
                            <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">
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


                   else{
                 
                 $All_Ratings = 5;
            
                      $average = 0.0;
                      $avgs = $All_Ratings;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2'></i>";
                              
                               } 

                     $Address = 

                       '<tr>
                            <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">' . $ServiceRequestId .'</td>

                            <td class="dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">
                            <img src="../assets/image/calendar2.png" class="calendar"><b>' . $ServiceStartDate . '</b><br>
                            <img src="../assets/image/layer-712.png" class="clock">' . $Tim .'
                            </td>

                            <td>
                              <img src="'.$Provider_img1.'>' . $Service_Provider_Name . '<br>
                              <span class="time">' .$stars1.' '.$average.'</span>

                            </td>
                            
                            <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">
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
                    $Tim = $row['Tim']; // 06:02:41  
                    $totaltime  = $row['TotalHours'];
                    $userid = $row['Provider_Name'];
                

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

                        $provider_row1 = $this->model->ProviderDashboardCount($userid);

                        if($provider_row1 == 0){
                         
                         $Service_Provider_Name = "";

                     $Address = 
                                                       

                                '<div class="cards">
                                 <div class="card">
                                   <div class="card-body">

                                    <h4 class="card-text dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">' . $ServiceRequestId . '</h4>
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
                                    </p>


                               </div>
                              </div>
                            </div>';



                        echo $Address;

                        }

                        if($provider_row1 > 0){

                        $provider_row = $this->model->ProviderDashboard($userid);

                        $Service_Provider_Name1 = $provider_row['FirstName'];
                        $Service_Provider_Name2 = $provider_row['LastName'];

                        $Provider_img = $provider_row['UserProfilePicture'];

                        if($Provider_img == ''){
                        $Provider_img1 = '../assets/image/forma-1-copy-19.png" class="round"';

                        }else{
                        $Provider_img1 = ''.$Provider_img.'" style="width:40px;height:40px; margin-right:10px;"';
                        }

                        $Service_Provider_Name = $Service_Provider_Name1 . ' ' . $Service_Provider_Name2;
                        $Provider_all_ratings1 = $this->model->OverAllRatingOfServiceProvider1($userid);
                        $Provider_all_ratings = $this->model->OverAllRatingOfServiceProvider($userid);
                     
                       
                 if (count($Provider_all_ratings) > 0) {
                   $All_Ratings = 0;
                  foreach ($Provider_all_ratings as $row) {
                   
                   $r = $row['Ratings'];
                   
                  $All_Ratings = $All_Ratings + $r;
                  
                   }
                 $average = intval($All_Ratings/$Provider_all_ratings1);

                      $stars = "";
                            for ($x = 1; $x <= $average; $x+=1) {
                             $stars = $stars."<i class='fa fa-star star1'></i>";
                              
                               } 

                      $avgs = 5.0 - $average;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2'></i>";
                              
                               } 


                     $Address = 
                                    
                                '<div class="cards">
                                 <div class="card">
                                   <div class="card-body">

                                    <h4 class="card-text dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">' . $ServiceRequestId . '</h4>
                                <hr>

                                   <p class="card-text dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">    
                                     <img src="../assets/image/calendar2.png" class="calendars"><b>' . $ServiceStartDate . '</b>
                                     <img src="../assets/image/layer-712.png" class="clocks">' . $Tim . '
                                   </p>

                                   <p class="card-text">

                                   <hr>

                              <img src="'.$Provider_img1.'>' . $Service_Provider_Name . '<br>
                             <span class="time">' . $stars . $stars1.' '.$average.'</span>

                                   </p>

                                 <hr>
                                    <p class="card-text text-left pays"><b>€' . $SubTotal . '</b></p>
                                 <hr>
                                    <p class="text-center card-buttn">
                                       <button type="button" id=' . $ServiceRequestId . ' class="save" data-toggle="modal" data-target="#date-modal">Reschedule</button>
                                       <button class="btn cancel-lap" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#cancel-modal">Cancel</button>
                                    </p>


                                   </div>
                                  </div>
                                </div>';



                        echo $Address;              
                }

                  else{
                 
                 $All_Ratings = 5;

                      $average = 0.0;
                      $avgs = $All_Ratings;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2'></i>";
                              
                               } 

                     $Address = 
                                    
                                '<div class="cards">
                                 <div class="card">
                                   <div class="card-body">

                                    <h4 class="card-text dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">' . $ServiceRequestId . '</h4>
                                <hr>

                                   <p class="card-text dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">    
                                     <img src="../assets/image/calendar2.png" class="calendars"><b>' . $ServiceStartDate . '</b>
                                     <img src="../assets/image/layer-712.png" class="clocks">' . $Tim . '
                                   </p>

                                   <p class="card-text">

                                   <hr>

                              <img src="'.$Provider_img1.'>' . $Service_Provider_Name . '<br>
                             <span class="time">' .$stars1.' '.$average.'</span>

                                   </p>

                                 <hr>
                                    <p class="card-text text-left pays"><b>€' . $SubTotal . '</b></p>
                                 <hr>
                                    <p class="text-center card-buttn">
                                       <button type="button" id=' . $ServiceRequestId . ' class="save" data-toggle="modal" data-target="#date-modal">Reschedule</button>
                                       <button class="btn cancel-lap" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#cancel-modal">Cancel</button>
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
    }


  public function NewServiceRequest()
    {
        
        if (isset($_POST)) {
            $email = $_POST['username'];
            $result5 = $this->model->ResetKey($email);
            $Provideer_name = $result5[3];

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
                    $userid = $row['UserId'];

                    $count = $this->model->InsertingBlockCustomer1($userid, $Provideer_name);
                    $count1 = $this->model->InsertingBlockProvider1($userid, $Provideer_name);
                    
                     if(($count == 0) && ($count1 == 0)){

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
    }


 public function NewServiceRequest1()
    {
        
        if (isset($_POST)) {
            $email = $_POST['username'];
            $result5 = $this->model->ResetKey($email);
            $Provideer_name = $result5[3];

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
                    $userid = $row['UserId'];

                    $count = $this->model->InsertingBlockCustomer1($userid, $Provideer_name);
                     
                     if($count == 0){
                

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
    }



   public function ServiceHistory()
    {
        
        if (isset($_POST)) {
            $email = $_POST['username'];

            $result = $this->model->HistoryValues($email);
            if (count($result)) {
                foreach ($result as $row) {
                    $ServiceStartDate = $row['ServiceStartDate'];
                    $SubTotal = $row['SubTotal'];
                    $ServiceRequestId = $row['ServiceRequestId'];
                    $Tim = $row['Tim'];
                    $totaltime  = $row['TotalHours'];
                    $status = $row['Status'];
                    $userid = $row['Provider_Name'];

                    if($status == 2){

                    $cancel = "class='btn completed1'>Completed";
                    }
                    else{
                    $cancel = "class='btn cancel1'>Cancelled";
                    }

                   
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

                        $provider_row1 = $this->model->ProviderDashboardCount($userid);

                        if($provider_row1 == 0){
                         
                         $Service_Provider_Name = "";

                        }

                        if($provider_row1 > 0){

                        $provider_row = $this->model->ProviderDashboard($userid);

                        $Service_Provider_Name1 = $provider_row['FirstName'];
                        $Service_Provider_Name2 = $provider_row['LastName'];
                        $Provider_img = $provider_row['UserProfilePicture'];

                        if($Provider_img == ''){
                        $Provider_img1 = '../assets/image/forma-1-copy-19.png" class="round"';

                        }else{
                        $Provider_img1 = ''.$Provider_img.'" style="width:40px;height:40px; margin-right:10px;"';
                        }

                        $Service_Provider_Name = $Service_Provider_Name1 . ' ' . $Service_Provider_Name2;

                      }
                  
                     $rating = $this->model->Rating($ServiceRequestId);


                     if(($rating == 0) && ($status == 3)){


                     $Address = 

                            '<tr>

                                <td class="dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">' . $ServiceRequestId . '</td>
                              
                                <td class="dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">
                                <img src="../assets/image/calendar.png" class="calendar"><b>' . $ServiceStartDate . '</b><br>
                                <span class="times">' . $Tim . '</span>
                               </td>
                                       
                                <td id="provider_name">
                                <img src="'.$Provider_img1.'>' . $Service_Provider_Name . '<br>


                                <span class="time">         
                                  <i class="fa fa-star star2"></i>
                                  <i class="fa fa-star star2"></i>
                                  <i class="fa fa-star star2"></i>
                                  <i class="fa fa-star star2"></i>
                                  <i class="fa fa-star star2"></i></span>
          
                                </td>
                             
                                <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">
                                <span class="pay1"><b>€</b></span><span class="pay2"><b>' . $SubTotal . '</b></span>
                                </td>

                                <td class="center">
                                <button type="button" ' . $cancel . '</button>    
                                </td>    
                                   
                                <td class="center">
                                <button type="button" id=' . $ServiceRequestId . ' class="btn dashboard rate-sp" data-toggle="modal" data-target="#rate-modal" disabled>Rate SP</button>  
                                </td>
                            </tr>';

                        echo $Address; 
                      }


                     if(($rating == 0) && ($status == 2)){


                     $Address = 

                            '<tr>

                                <td class="dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">' . $ServiceRequestId . '</td>

                                <td class="dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">
                                <img src="../assets/image/calendar.png" class="calendar"><b>' . $ServiceStartDate . '</b><br>
                                <span class="times">' . $Tim . '</span>
                               </td>
                                       
                                <td id="provider_name">
                                <img src="'.$Provider_img1.'>' . $Service_Provider_Name . '<br>


                                <span class="time">         
                                  <i class="fa fa-star star2"></i>
                                  <i class="fa fa-star star2"></i>
                                  <i class="fa fa-star star2"></i>
                                  <i class="fa fa-star star2"></i>
                                  <i class="fa fa-star star2"></i></span>
       
                                </td>
                             
                                <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">
                                <span class="pay1"><b>€</b></span><span class="pay2"><b>' . $SubTotal . '</b></span>
                                </td>

                                <td class="center">
                                <button type="button" ' . $cancel . '</button>    
                                </td>    
                                   
                                <td class="center">
                                <button type="button" id=' . $ServiceRequestId . ' class="btn dashboard rate-sp" data-toggle="modal" data-target="#rate-modal">Rate SP</button>  
                                </td>
                            </tr>';

                        echo $Address; 
                      }

                      if($rating > 0){


                      $customer_rating = $this->model->RatingOfCustomer($ServiceRequestId);

                      $avg = $customer_rating['Ratings'];  // 4.0 3.0
                      $stars = "";
                            for ($x = 1; $x <= $avg; $x+=1) {
                             $stars = $stars."<i class='fa fa-star star1'></i>";
                              
                               } 

                      $avgs = 5.0 - $avg;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2'></i>";
                              
                               } 

                     $Address = 

                            '<tr>

                                <td class="dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">' . $ServiceRequestId . '</td>

                                <td class="dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">
                                <img src="../assets/image/calendar.png" class="calendar"><b>' . $ServiceStartDate . '</b><br>
                                <span class="times">' . $Tim . '</span>
                               </td>
                                       
                                <td id="provider_name">
                                <img src="'.$Provider_img1.'>' . $Service_Provider_Name . '<br>
                                <span class="time">    

   
                                  <span>' . $stars . $stars1.' '.$avg.' </span>
  
                                        
                                </td>
                             
                                <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">
                                <span class="pay1"><b>€</b></span><span class="pay2"><b>' . $SubTotal . '</b></span>
                                </td>

                                <td class="center">
                                <button type="button" ' . $cancel . '</button>    
                                </td>    
                                   
                                <td class="center">
                                <button type="button" id=' . $ServiceRequestId . ' class="btn dashboard rate-sp" data-toggle="modal" data-target="#rate-modal" disabled>Rate SP</button>  
                                </td>
                            </tr>';



                        echo $Address; 

                      }
                }
            }
        }
    }



   public function ModalHistory()
    {
        
       if (isset($_POST)) {
            $email = $_POST['username'];

            $result = $this->model->HistoryValues($email);
            if (count($result)) {
                foreach ($result as $row) {
                    $ServiceStartDate = $row['ServiceStartDate'];
                    $SubTotal = $row['SubTotal'];
                    $ServiceRequestId = $row['ServiceRequestId'];
                    $Tim = $row['Tim'];
                    $totaltime  = $row['TotalHours'];
                    $status = $row['Status'];
                    $userid = $row['Provider_Name'];

                    if($status == 2){

                    $cancel = "class='btn completed1'>Completed";
                    }
                    else{
                    $cancel = "class='btn cancel1'>Cancelled";
                    }

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

                        $provider_row1 = $this->model->ProviderDashboardCount($userid);

                        if($provider_row1 == 0){
                         
                         $Service_Provider_Name = "";

                        }

                        if($provider_row1 > 0){

                        $provider_row = $this->model->ProviderDashboard($userid);

                        $Service_Provider_Name1 = $provider_row['FirstName'];
                        $Service_Provider_Name2 = $provider_row['LastName'];
                        $Provider_img = $provider_row['UserProfilePicture'];

                        if($Provider_img == ''){
                        $Provider_img1 = '../assets/image/forma-1-copy-19.png" class="round"';

                        }else{
                        $Provider_img1 = ''.$Provider_img.'" style="width:40px;height:40px; margin-right:10px;"';
                        }

                        $Service_Provider_Name = $Service_Provider_Name1 . ' ' . $Service_Provider_Name2;

                      }
                  
                     $rating = $this->model->Rating($ServiceRequestId);

                    if(($rating == 0) && ($status == 3)){

                   $Address = 

                     '<div class="cards">
                       <div class="card">
                          <div class="card-body">

                              <p class="card-text dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">' . $ServiceRequestId . '</p>

                              <hr>

                              <p class="card-text dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">    
                                 <img src="../assets/image/calendar2.png" class="calendars"><b>' . $ServiceStartDate . '</b>
                                 <img src="../assets/image/layer-712.png" class="clocks">' . $Tim . '
                                </P>
                               
                                <P classcard-text provider_name>
                                <img src="'.$Provider_img1.'>' . $Service_Provider_Name . '<br>

                                <span class="time_star">         
                                  <i class="fa fa-star star_modal1"></i>
                                  <i class="fa fa-star star_modal1"></i>
                                  <i class="fa fa-star star_modal1"></i>
                                  <i class="fa fa-star star_modal1"></i>
                                  <i class="fa fa-star star_modal1"></i></span>

                                </p>

                             <hr>
                                 
                                 <p class="card-text">    
                                  <div class="pays">
                                  <span class="pay4"><b>€</b></span><span class="pay3"><b>' . $SubTotal . '</b></span>
                                  </div>
                                 </p>

                            <hr>

                                <p class="text-center">
                                <button type="button" ' . $cancel . '</button>
                                </p>
                              
                            <hr>

                                <p class="text-center">
                                <button type="button" class="btn dashboard rate-sp1" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#rate-modal" disabled>Rate SP</button>
                                </p>
                              </p>
                               </div>
                              </div>
                             </div>';

                    echo $Address;   
                     }


                     if(($rating == 0) && ($status == 2)){

                   $Address = 

                              
                            '<div class="cards">
                             <div class="card">
                               <div class="card-body">
                            
                              <p class="card-text dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">' . $ServiceRequestId . '</p>

                              <hr>

                              <p class="card-text dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">    
                                 <img src="../assets/image/calendar2.png" class="calendars"><b>' . $ServiceStartDate . '</b>
                                 <img src="../assets/image/layer-712.png" class="clocks">' . $Tim . '
                                </P>
                               
                                <P classcard-text provider_name>
                                <img src="'.$Provider_img1.'>' . $Service_Provider_Name . '<br>

                                <span class="time_star">         
                                  <i class="fa fa-star star_modal1"></i>
                                  <i class="fa fa-star star_modal1"></i>
                                  <i class="fa fa-star star_modal1"></i>
                                  <i class="fa fa-star star_modal1"></i>
                                  <i class="fa fa-star star_modal1"></i></span>

                                </p>

                             <hr>
                                 
                                 <p class="card-text">    
                                  <div class="pays">
                                  <span class="pay4"><b>€</b></span><span class="pay3"><b>' . $SubTotal . '</b></span>
                                  </div>
                                 </p>

                            <hr>

                                <p class="text-center">
                                <button type="button" ' . $cancel . '</button>
                                </p>
                              
                            <hr>

                                <p class="text-center">
                                <button type="button" class="btn dashboard rate-sp1" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#rate-modal">Rate SP</button>
                                </p>
                              </p>
                               </div>
                              </div>
                             </div>';

                    echo $Address;   
                  }


                 if($rating > 0){

                      $customer_rating = $this->model->RatingOfCustomer($ServiceRequestId);

                      $avg = $customer_rating['Ratings'];  // 4.0 3.0
                      $stars = "";
                            for ($x = 1; $x <= $avg; $x+=1) {
                             $stars = $stars."<i class='fa fa-star star1'></i>";
                              
                             } 

                      $avgs = 5.0 - $avg;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2'></i>";
                              
                           } 

                   $Address = 

                              
                          '<div class="cards">
                           <div class="card">
                             <div class="card-body">
                              
                              <p class="card-text dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">' . $ServiceRequestId . '</p>

                              <hr>

                              <p class="card-text dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal">    
                                 <img src="../assets/image/calendar2.png" class="calendars"><b>' . $ServiceStartDate . '</b>
                                 <img src="../assets/image/layer-712.png" class="clocks">' . $Tim . '
                                </P>
                               
                                <P classcard-text provider_name>
                                <img src="'.$Provider_img1.'>' . $Service_Provider_Name . '<br>


                                  <span class="time">' . $stars . $stars1.' '.$avg.' </span>

                                </p>

                             <hr>
                                 
                                 <p class="card-text">    
                                  <div class="pays">
                                  <span class="pay4"><b>€</b></span><span class="pay3"><b>' . $SubTotal . '</b></span>
                                  </div>
                                 </p>

                            <hr>

                                <p class="text-center">
                                <button type="button" ' . $cancel . '</button>
                                </p>
                              
                            <hr>

                                <p class="text-center">
                                <button type="button" class="btn dashboard rate-sp1" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#rate-modal" disabled>Rate SP</button>
                                </p>
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
                        $Tim = str_replace(":", ":", $starttime);
                       
                      
                  
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
                    $totaltime = $row['TotalHours'];
                    $ExtraServices = $row['ExtraServices'];
                    $ServiceRequestId = $row['ServiceRequestId'];
                    $SubTotal = $row['SubTotal'];
                    $AddressLine1 = $row['AddressLine1'];
                    $AddressLine2 = $row['AddressLine2'];
                    $City = $row['City'];
                    $PostalCode = $row['PostalCode'];
                    $Mobile = $row['Mobile'];
                    $Email = $row['Email'];
                    $HasPets = $row['HasPets'];

                    $Provider_name = $row['Provider_Name'];

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

                    }

            if($Provider_name == 0){

              $Address = 

                 '<div class="service-warning">' .$ServiceStartDate . ' ' . $Tim . '</div>
                    <div class="service-duration">Duration: <span class="duration">' . $totaltime . ' Hrs</span></div>

                    <hr>
                    <div class="service-duration">Service Id: <span class="duration">' . $ServiceRequestId . '</span></div>
                    <div class="service-duration">Extras: <span class="duration">' . $ExtraServices . '</span></div>
                    <div class="service-duration">Net Amount: <span class="amount">' . $SubTotal . ' €</span></div>

                    <hr> 

                    <div class="service-duration">Service Address: <span class="duration">' . $AddressLine1 . ' ' . $AddressLine2 . ', ' . $City . ' ' .  $PostalCode .'</span></div>
                    <div class="service-duration">Billing Address: <span class="duration">Same as clieaning Address</span></div>
                    <div class="service-duration">Phone: <span class="duration">' . $Mobile . '</span></div>
                    <div class="service-duration">Email: <span class="duration">' . $Email . '</span></div>

                  <hr>
                  
                  <div class="service-duration">Comments</div>
                  <div class="duration"><span><i class="fa-solid fa-circle-xmark"></i></span><span id="duration">I do not have pets at home</span></div>

                    <hr>

                 <div class="form-group mt-3 book-flex">
                    <button type="submit" class="btn btn-login1 form-control" data-toggle="modal" data-target="#date-modal" data-dismiss="modal"><i class="fa-solid fa-clock-rotate-left"></i>Reshedule</button>
                    <button type="submit" class="btn btn-login1 form-control" id="login-1" data-toggle="modal" data-target="#cancel-modal" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>Cancel</button>
                 </div>'; 

                echo $Address; 

              }else{

                        $provider_row = $this->model->ProviderDashboard($Provider_name);

                        $Service_Provider_Name1 = $provider_row['FirstName'];
                        $Service_Provider_Name2 = $provider_row['LastName'];
                        $Provider_img = $provider_row['UserProfilePicture'];

                        if($Provider_img == ''){
                        $Provider_img1 = '../assets/image/forma-1-copy-19.png" class="round_modals"';

                        }else{
                        $Provider_img1 = ''.$Provider_img.'" style="width:40px;height:40px; margin-right:10px;"';
                        }

                        $Service_Provider_Name = $Service_Provider_Name1 . ' ' . $Service_Provider_Name2;

                        $Provider_all_ratings1 = $this->model->OverAllRatingOfServiceProvider1($Provider_name);
                        $Provider_all_ratings = $this->model->OverAllRatingOfServiceProvider($Provider_name);
                     
                       
                 if (count($Provider_all_ratings) > 0) {
                   $All_Ratings = 0;
                  foreach ($Provider_all_ratings as $row) {
                   
                   $r = $row['Ratings'];
                   
                  $All_Ratings = $All_Ratings + $r;
                  
                   }
                 $average = intval($All_Ratings/$Provider_all_ratings1);

                      $stars = "";
                            for ($x = 1; $x <= $average; $x+=1) {
                             $stars = $stars."<i class='fa fa-star star1_modals'></i>";
                              
                               } 

                      $avgs = 5.0 - $average;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2_modals'></i>";
                              
                               } 

          $Address = 

            
          '<div class="right_provider">
            <div class="right_provider_width">
            <div class="service-warning">' .$ServiceStartDate . ' ' . $Tim . '</div>
              <div class="service-duration">Duration: <span class="duration">' . $totaltime . ' Hrs</span></div>

              <hr>
              <div class="service-duration">Service Id: <span class="duration">' . $ServiceRequestId . '</span></div>
              <div class="service-duration">Extras: <span class="duration">' . $ExtraServices . '</span></div>
              <div class="service-duration">Net Amount: <span class="amount">' . $SubTotal . ' €</span></div>

              <hr> 

              <div class="service-duration">Service Address: <span class="duration">' . $AddressLine1 . ' ' . $AddressLine2 . ', ' . $City . ' ' .  $PostalCode .'</span></div>
              <div class="service-duration">Billing Address: <span class="duration">Same as clieaning Address</span></div>
              <div class="service-duration">Phone: <span class="duration">' . $Mobile . '</span></div>
              <div class="service-duration">Email: <span class="duration">' . $Email . '</span></div>

            <hr>
            
            <div class="service-duration">Comments</div>
            <div class="duration"><span><i class="fa-solid fa-circle-xmark"></i></span><span id="duration">I do not have pets at home</span></div>

              <hr>


           <div class="form-group mt-3 book-flex">
              <button type="submit" class="btn btn-login1 form-control" data-toggle="modal" data-target="#date-modal" data-dismiss="modal"><i class="fa-solid fa-clock-rotate-left"></i>Reshedule</button>
              <button type="submit" class="btn btn-login1 form-control" id="login-1" data-toggle="modal" data-target="#cancel-modal" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>Cancel</button>
           </div>

              </div>

              <span class="border_provider"></span>
                <div class="Provider_Modals">
                  <img src="'.$Provider_img1.'>' . $Service_Provider_Name . '<br>
                  <span class="time_modals">' . $stars . $stars1.' '.$average.'</span>                           
                </div> 
              </div> ';     

              echo $Address;       

                  }else{

                   $All_Ratings = 5;
            
                      $average = 0.0;
                      $avgs = $All_Ratings;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2_modals'></i>";
                              
                               } 
          $Address = 

            
          '<div class="right_provider">
            <div class="right_provider_width">
            <div class="service-warning">' .$ServiceStartDate . ' ' . $Tim . '</div>
              <div class="service-duration">Duration: <span class="duration">' . $totaltime . ' Hrs</span></div>

              <hr>
              <div class="service-duration">Service Id: <span class="duration">' . $ServiceRequestId . '</span></div>
              <div class="service-duration">Extras: <span class="duration">' . $ExtraServices . '</span></div>
              <div class="service-duration">Net Amount: <span class="amount">' . $SubTotal . ' €</span></div>

              <hr> 

              <div class="service-duration">Service Address: <span class="duration">' . $AddressLine1 . ' ' . $AddressLine2 . ', ' . $City . ' ' .  $PostalCode .'</span></div>
              <div class="service-duration">Billing Address: <span class="duration">Same as clieaning Address</span></div>
              <div class="service-duration">Phone: <span class="duration">' . $Mobile . '</span></div>
              <div class="service-duration">Email: <span class="duration">' . $Email . '</span></div>

            <hr>
            
            <div class="service-duration">Comments</div>
            <div class="duration"><span><i class="fa-solid fa-circle-xmark"></i></span><span id="duration">I do not have pets at home</span></div>

              <hr>

           <div class="form-group mt-3 book-flex">
              <button type="submit" class="btn btn-login1 form-control" data-toggle="modal" data-target="#date-modal" data-dismiss="modal"><i class="fa-solid fa-clock-rotate-left"></i>Reshedule</button>
              <button type="submit" class="btn btn-login1 form-control" id="login-1" data-toggle="modal" data-target="#cancel-modal" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>Cancel</button>
           </div>

              </div>

              <span class="border_provider"></span>
                <div class="Provider_Modals">
                  <img src="'.$Provider_img1.'>' . $Service_Provider_Name . '<br>
                  <span class="time_modals">' .$stars1.' '.$average.'</span>                          
                </div> 
              </div> ';     

              echo $Address;

                }

                }
            }
        }
    }



  public function AdminDasboard2()
    {
        
        if (isset($_POST)) {
            $addressid1 = $_POST['addressid1'];

            $result = $this->model->Dasboard2($addressid1);
            if (count($result)) {
                foreach ($result as $row) {
                    $ServiceStartDate = $row['ServiceStartDate'];
                    $totaltime = $row['TotalHours'];
                    $ExtraServices = $row['ExtraServices'];
                    $ServiceRequestId = $row['ServiceRequestId'];
                    $SubTotal = $row['SubTotal'];
                    $AddressLine1 = $row['AddressLine1'];
                    $AddressLine2 = $row['AddressLine2'];
                    $City = $row['City'];
                    $PostalCode = $row['PostalCode'];
                    $Mobile = $row['Mobile'];
                    $Email = $row['Email'];
                    $HasPets = $row['HasPets'];
                    $status = $row['Status'];

                    $Provider_name = $row['Provider_Name'];

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

                    }

            if($status == 0 || $status == 1 || $status == 2 || $status == 3){

              $Address = 

                 '<div class="service-warning">' .$ServiceStartDate . ' ' . $Tim . '</div>
                    <div class="service-duration">Duration: <span class="duration">' . $totaltime . ' Hrs</span></div>

                    <hr>
                    <div class="service-duration">Service Id: <span class="duration">' . $ServiceRequestId . '</span></div>
                    <div class="service-duration">Extras: <span class="duration">' . $ExtraServices . '</span></div>
                    <div class="service-duration">Net Amount: <span class="amount">' . $SubTotal . ' €</span></div>

                    <hr> 

                    <div class="service-duration">Service Address: <span class="duration">' . $AddressLine1 . ' ' . $AddressLine2 . ', ' . $City . ' ' .  $PostalCode .'</span></div>
                    <div class="service-duration">Billing Address: <span class="duration">Same as clieaning Address</span></div>
                    <div class="service-duration">Phone: <span class="duration">' . $Mobile . '</span></div>
                    <div class="service-duration">Email: <span class="duration">' . $Email . '</span></div>

                  <hr>
                  
                  <div class="service-duration">Comments</div>
                  <div class="duration"><span><i class="fa-solid fa-circle-xmark"></i></span><span id="duration">I do not have pets at home</span></div>

                    <hr>'; 

                echo $Address; 

               }else{

                        $provider_row = $this->model->ProviderDashboard($Provider_name);

                        $Service_Provider_Name1 = $provider_row['FirstName'];
                        $Service_Provider_Name2 = $provider_row['LastName'];
                        $Provider_img = $provider_row['UserProfilePicture'];

                        if($Provider_img == ''){
                        $Provider_img1 = '../assets/image/forma-1-copy-19.png" class="round_modals"';

                        }else{
                        $Provider_img1 = ''.$Provider_img.'" style="width:40px;height:40px; margin-right:10px;"';
                        }

                        $Service_Provider_Name = $Service_Provider_Name1 . ' ' . $Service_Provider_Name2;

                        $Provider_all_ratings1 = $this->model->OverAllRatingOfServiceProvider1($Provider_name);
                        $Provider_all_ratings = $this->model->OverAllRatingOfServiceProvider($Provider_name);
                     
                       
                 if (count($Provider_all_ratings) > 0) {
                   $All_Ratings = 0;
                  foreach ($Provider_all_ratings as $row) {
                   
                   $r = $row['Ratings'];
                   
                  $All_Ratings = $All_Ratings + $r;
                  
                   }
                 $average = intval($All_Ratings/$Provider_all_ratings1);

                      $stars = "";
                            for ($x = 1; $x <= $average; $x+=1) {
                             $stars = $stars."<i class='fa fa-star star1_modals'></i>";
                              
                               } 

                      $avgs = 5.0 - $average;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2_modals'></i>";
                              
                               } 

          $Address = 

            
          '<div class="right_provider">
            <div class="right_provider_width">
            <div class="service-warning">' .$ServiceStartDate . ' ' . $Tim . '</div>
              <div class="service-duration">Duration: <span class="duration">' . $totaltime . ' Hrs</span></div>

              <hr>
              <div class="service-duration">Service Id: <span class="duration">' . $ServiceRequestId . '</span></div>
              <div class="service-duration">Extras: <span class="duration">' . $ExtraServices . '</span></div>
              <div class="service-duration">Net Amount: <span class="amount">' . $SubTotal . ' €</span></div>

              <hr> 

              <div class="service-duration">Service Address: <span class="duration">' . $AddressLine1 . ' ' . $AddressLine2 . ', ' . $City . ' ' .  $PostalCode .'</span></div>
              <div class="service-duration">Billing Address: <span class="duration">Same as clieaning Address</span></div>
              <div class="service-duration">Phone: <span class="duration">' . $Mobile . '</span></div>
              <div class="service-duration">Email: <span class="duration">' . $Email . '</span></div>

            <hr>
            
            <div class="service-duration">Comments</div>
            <div class="duration"><span><i class="fa-solid fa-circle-xmark"></i></span><span id="duration">I do not have pets at home</span></div>

              <hr>

              </div>

              <span class="border_provider"></span>
                <div class="Provider_Modals">
                  <img src="'.$Provider_img1.'>' . $Service_Provider_Name . '<br>
                  <span class="time_modals">' . $stars . $stars1.' '.$average.'</span>                           
                </div> 
              </div> ';     

              echo $Address;       

                  }else{

                   $All_Ratings = 5;
            
                      $average = 0.0;
                      $avgs = $All_Ratings;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2_modals'></i>";
                              
                               } 


          $Address = 

            
          '<div class="right_provider">
            <div class="right_provider_width">
            <div class="service-warning">' .$ServiceStartDate . ' ' . $Tim . '</div>
              <div class="service-duration">Duration: <span class="duration">' . $totaltime . ' Hrs</span></div>

              <hr>
              <div class="service-duration">Service Id: <span class="duration">' . $ServiceRequestId . '</span></div>
              <div class="service-duration">Extras: <span class="duration">' . $ExtraServices . '</span></div>
              <div class="service-duration">Net Amount: <span class="amount">' . $SubTotal . ' €</span></div>

              <hr> 

              <div class="service-duration">Service Address: <span class="duration">' . $AddressLine1 . ' ' . $AddressLine2 . ', ' . $City . ' ' .  $PostalCode .'</span></div>
              <div class="service-duration">Billing Address: <span class="duration">Same as clieaning Address</span></div>
              <div class="service-duration">Phone: <span class="duration">' . $Mobile . '</span></div>
              <div class="service-duration">Email: <span class="duration">' . $Email . '</span></div>

            <hr>
            
            <div class="service-duration">Comments</div>
            <div class="duration"><span><i class="fa-solid fa-circle-xmark"></i></span><span id="duration">I do not have pets at home</span></div>

              <hr>

              </div>

              <span class="border_provider"></span>
                <div class="Provider_Modals">
                  <img src="'.$Provider_img1.'>' . $Service_Provider_Name . '<br>
                  <span class="time_modals">' .$stars1.' '.$average.'</span>                          
                </div> 
              </div> ';     

              echo $Address;

                }

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
              <div class="service-duration">Duration: <span class="duration">' . $totaltime . ' Hrs</span></div>

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

            $reschedule = $this->model->UpdateCustomerSchedule($ServiceRequestId);
            $status = $reschedule['Status'];
            $totaltime1 = $reschedule['TotalHours'];
            $Provider_name = $reschedule['Provider_Name'];


            $Date = $_POST['dash_date'];
            $Tim1 = $_POST['dash_time']; 

            $Tim1 = $Tim1 . ':00';

            if(($status == 0) && ($Provider_name == 0)){ 

      
            $array = [
                'ServiceStartDate' => $Date,
                'Tim' => $Tim1,
                'ServiceRequestId' => $ServiceRequestId,

            ];
            $result = $this->model->DashUpdate($array);

            echo 1;

         }

         if($status == 1){

            $Tim = $Tim1; 
            $totaltime = $totaltime1;
          $ServiceStartDate1 = $Date;

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

                        $approvestarttime = $starttime; 
                        $approveendtime = $totaltimes;


     $result1 = $this->model->Extraqueryes($Provider_name,$approvestarttime,$approveendtime,$ServiceStartDate1); 
                                                                  
   if($result1 == 0) {
          
           $array = [
                'ServiceStartDate' => $Date,
                'Tim' => $Tim1,
                'ServiceRequestId' => $ServiceRequestId,

            ];
            $result = $this->model->DashUpdate($array);
           
          echo 1;
        
        }

     else{
 
       echo 4;

     }

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
            $ServiceRequestId = $_POST['addressid1'];
            $avg = $_POST['avg'];

            $result1 = $this->model->UpdateCustomerSchedule($ServiceRequestId);
            $status = $result1['Status'];
            $Provider_name = $result1['Provider_Name'];

           $result = $this->model->ResetKey($email);
           $username = $result[3]; 
        
            $array = [
                'username' => $username,
                'gender' => $gender,
                'rates' => $rates,
                'rate1' => $rate1,
                'feedback' => $feedback,
                'ServiceRequestId' => $ServiceRequestId,
                'avg' => $avg,
                'completed' => $status,
                'date1' => date('Y-m-d H:i:s'),
                'provider_name' => $Provider_name,

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
            $ServiceRequestId1 = $ServiceRequestId;

            $reschedule = $this->model->UpdateCustomerSchedule($ServiceRequestId);
            $status = $reschedule['Status'];
            $customerid = $reschedule['UserId'];
            
            $userid = $reschedule['Provider_Name'];

           if($status == 0){

            $array = [
                'ServiceRequestId' => $ServiceRequestId,

            ];
            $result = $this->model->DashDelete($array);

            echo 1;

         }
           
          else{

            $array = [
                'ServiceRequestId' => $ServiceRequestId,

            ];
            $result = $this->model->DashDelete($array);  

            $ServiceRequestId3 = $this->model->AcceptCustomerMail($userid);
            $ServiceRequestId4 = $this->model->CancelServiceRequest($customerid);

            $firstname = $ServiceRequestId4['FirstName'];
            $lastname = $ServiceRequestId4['LastName'];
            $username = $firstname . ' ' . $lastname;
            
    if ($result) {        

      if (count($ServiceRequestId3)) {
          foreach ($ServiceRequestId3 as $row) {
           $ServiceRequestId1 = $ServiceRequestId1;
           $username = $username;
           $email1 = $row['Email'];

           include('Dashboard_delete-Customer-mail.php');
           }
          } 
           
          }

            echo 1;

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

                        $approvestarttime = $starttime; 
                        $approveendtime = $totaltimes;

            $email = $_POST['username'];

            $result1 = $this->model->ResetKey($email);
            $Provider_name = $result1[3];

      $result1 = $this->model->Extraqueryes($Provider_name,$approvestarttime,$approveendtime,$ServiceStartDate1); 
                                                                  
   if($result1 == 0) {
          
              $email = $_POST['username'];

              $result2 = $this->model->ResetKey($email);
              $Provider_name = $result2[3];
              $service_provider_name = $result2[0];
              $ServiceRequestId = $_POST['ServiceRequestId'];
              $ServiceRequestId1 = $ServiceRequestId;
              $status = 1;
              $array = [
                  'ServiceRequestId' => $ServiceRequestId,
                  'status' => $status,
                  'Provider_name' => $Provider_name,

              ];
              $result = $this->model->NewServiceRequestAccept($array);

             $GoingtoServiceProvider = $this->model->GoingtoServiceProvider();
             $ServiceRequestId2 = $this->model->ServiceRequestId($ServiceRequestId);
             $userid = $ServiceRequestId2[0];

             $ServiceRequestId3 = $this->model->AcceptCustomerMail($userid);
            
     if ($result) {     
       if (count($GoingtoServiceProvider)) {
           foreach ($GoingtoServiceProvider as $row) {
             $email1 = $row['Email'];
             $service_provider_name = $service_provider_name;
             $ServiceRequestId1 = $ServiceRequestId1;

             if($email1 == $email){
               break;
             }

             else{
            include('Accept-Provider-Message.php');
          }
            }
           }      

       if (count($ServiceRequestId3)) {
           foreach ($ServiceRequestId3 as $row) {
            $service_provider_name = $service_provider_name;
            $ServiceRequestId1 = $ServiceRequestId1;
            $email1 = $row['Email'];
            include('Accept-Customer-mail.php');
            }
           } 
           
           }

           echo 1;
         }
     else{
 
       echo 4;

     }

       }

 }


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
            $result_row = $this->model->BookingBlockCustomer101($userid);          

    if ($result) {     
      if($result_row > 0){

            $result4 = $this->model->BookingBlockCustomer100($userid);
      if (count($result4)) {
          foreach ($result4 as $row4) {
            $userid10 = $row4['IsBlocked']; 
            $Provider_id = $row4['UserId'];   
            $result50 = $this->model->FindCustomerBooking($Provider_id);

            $Provider_email = $result50[0];


     if($userid10 == 0){

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
        }

    
     if($userid10 == 1){

      if (count($GoingtoServiceProvider)) {
          foreach ($GoingtoServiceProvider as $row) {
            $id = $result;
            $Provider_email = $Provider_email;
            $email = $row['Email'];

          if($Provider_email == $email){
            
            break;
          }
          else{
           include('Accept-Booking-Mail.php');
          
           }
         }
          }      

      if (count($customer_mail)) {
          foreach ($customer_mail as $row) {
           $email = $row['Email'];
           include('Customer-mail.php');
           }
          } 
        }
      }
    }
  }
      else{
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

  public function MyRating()
    {
        
        if (isset($_POST)) {
          $email = $_POST['username'];
            $number = $_POST['number'];
            $result1 = $this->model->ResetKey($email);
            $Provider_name = $result1[3];
            $result = $this->model->MyRating($Provider_name);

            if (count($result)) {

                foreach ($result as $row) {
                    $ServiceStartDate = $row['ServiceStartDate'];
                    $ServiceRequestId = $row['ServiceRequestId'];
                    $Tim = $row['Tim']; 
                    $totaltime  = $row['TotalHours'];
                     $firstname = $row['FirstName'];
                     $lastname = $row['LastName'];
                     $ratings = $row['Ratings'];
                     $comment = $row['Comments'];

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

                      $stars = "";
                            for ($x = 1; $x <= $ratings; $x+=1) {
                             $stars = $stars."<i class='fa fa-star star1'></i>";
                              
                               } 

                      $avgs = 5.0 - $ratings;

                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2'></i>";
                              
                               } 

                  if($ratings >= 3){

                  $ratings = "Very Good";

                  }
                  else{
                  $ratings = "Good";
                  }

            if($number == 1){

                     $Address = 

                      
                        '<div class="rating dashboard" data-toggle="modal" data-target="#schedule-modal" id=' . $ServiceRequestId . '>
                        <div class="row">
                          <div class="col-md-4 rate">' . $ServiceRequestId . '<br><b>'. $firstname . ' '. $lastname . '</b></div>
                          
                          <div class="col-md-4 rate">
                            <img src="../assets/image/calendar2.png" class="calendar"><b>'. $ServiceStartDate . '</b><br>
                            <img src="../assets/image/layer-712.png" class="clock">' . $Tim .'
                          </div>
                         
                          <div class="col-md-4 rate"><b>ratings</b> <br> ' . $stars . $stars1 . '  '. $ratings . '</div>
                        </div>

                        <hr style="height: 2px;">

                        <div class="row dashboard" data-toggle="modal" data-target="#schedule-modal" id=' . $ServiceRequestId . '>
                          <div class="col-md-12 rate"><b>Customer comment</b> <br> ' . $comment . '</div>
                        </div>
                        </div>';

                        echo $Address;              
                }

                  if($number == 0){

                      $Address = 

                          '<div id=' . $ServiceRequestId . ' class="rating cards dashboard" data-toggle="modal" data-target="#schedule-modal">
                           <div class="card">
                             <div class="card-body">
                               <h4 class="card-text">'. $ServiceRequestId .' <br></h4>
                          <hr>
                               <h4 class="card-text"><b>'. $firstname . ' '. $lastname . '</b></h4>
                          <hr>

                             <p class="card-text">    
                               <img src="../assets/image/calendar2.png" class="calendars"><b>'. $ServiceStartDate .'</b>
                             <img src="../assets/image/layer-712.png" class="clocks">'. $Tim .'
                             </p>

                          <hr>

                             <p class="card-text"><b>ratings</b> <br> ' . $stars . $stars1 . '  '. $ratings . '</p>
                           
                          <hr>

                             <p class= "card-text"><b>Customer comment</b> <br> ' . $comment . '</p> 

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
                    $avtarimg = $row['UserProfilePicture'];
                    $natinallity = $row['NationalityId'];
                    $gender = $row['Gender'];
                    $ZipCode = $row['ZipCode'];
                    $isactives = $row['IsActive'];

                    if (!empty($date)) {

                        list($year, $month, $day) = explode("-", $date);
                    } else {
                        $year = "Year";
                        $month = "Month";
                        $day = "Day";
                    }

                    $result = [$firstname, $lastname, $email, $mobile, $day, $month, $year, $languageid, $avtarimg, $natinallity, $gender];

                    echo json_encode($result);
                }
            }
        }
    }


public function ServiceProviderDetails11()
    {
        if (isset($_POST)) {
            $email = $_POST['username'];

            $result1 = $this->model->ResetKey($email);
            $Provideer_name = $result1[3];

                    $address = $this->model->FindProviderSettingDetails($Provideer_name);
                    if (count($address)) {
                        foreach ($address as $addr) {
                            $street = $addr['AddressLine1'];
                            $houseno = $addr['AddressLine2'];
                            $postalcode = $addr['PostalCode'];
                            $city = $addr['City'];

                    $result = [$street, $houseno, $postalcode, $city];

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
            $service_provider_name = $result1[0];

            $ServiceRequestId = $_POST['ServiceRequestId'];
            $ServiceRequestId1 = $ServiceRequestId;
          
            $result2 = $this->model->ServiceRequestId($ServiceRequestId);
            $customer_name = $result2[0];
            $userid = $customer_name;
            $count = $this->model->InsertingBlockCustomer($userid,$Provideer_name);  

            if($count == 0){
            
            $Provideer_name = $Provideer_name;
            $customer_name = $customer_name;
            $isblock = 0;
            $isfavorite = 0;
            $array1 = [
                'Provideer_name' => $Provideer_name,
                'customer_name' => $customer_name,
                'isblock' => $isblock,
                 'isfavorite' => $isfavorite,

            ];  

           $result3 = $this->model->favoriteandblocked($array1);        
            }

            $status = 2;

            $array = [
                'ServiceRequestId' => $ServiceRequestId,
                'status' => $status,

            ];
            $result = $this->model->UpcomingRequestComplete($array);

            $GoingtoServiceProvider = $this->model->GoingtoServiceProvider();
            $ServiceRequestId2 = $this->model->ServiceRequestId($ServiceRequestId);
            $userid = $ServiceRequestId2[0];
            $ServiceRequestId3 = $this->model->AcceptCustomerMail($userid);



    if ($result) {     
      if (count($GoingtoServiceProvider)) {
          foreach ($GoingtoServiceProvider as $row) {
            $email1 = $row['Email'];
            $service_provider_name = $service_provider_name;
            $ServiceRequestId1 = $ServiceRequestId1;

            if($email1 == $email){
              break;
            }

            else{
           include('Complete-Provider-Message.php');
         }
           }
          }      

      if (count($ServiceRequestId3)) {
          foreach ($ServiceRequestId3 as $row) {
           $service_provider_name = $service_provider_name;
           $ServiceRequestId1 = $ServiceRequestId1;
           $email1 = $row['Email'];
           include('Complete-Customer-mail.php');
           }
          } 
           
         echo 1;

          }    
        

        }
    }


 public function UpcomingRequestCancel()
    {

        if (isset($_POST)) {

            $email = $_POST['username'];

            $result1 = $this->model->ResetKey($email);
            $Provideer_name = $result1[3];
            $service_provider_name = $result1[0];
        
            $ServiceRequestId = $_POST['ServiceRequestId'];
            $ServiceRequestId1 = $ServiceRequestId;

            $status = 3;

            $array = [
                'ServiceRequestId' => $ServiceRequestId,
                'status' => $status,

            ];
            $result = $this->model->UpcomingRequestCancel($array);

            $GoingtoServiceProvider = $this->model->GoingtoServiceProvider();
            $ServiceRequestId2 = $this->model->ServiceRequestId($ServiceRequestId);
            $userid = $ServiceRequestId2[0];
            $ServiceRequestId3 = $this->model->AcceptCustomerMail($userid);

    if ($result) {     
      if (count($GoingtoServiceProvider)) {
          foreach ($GoingtoServiceProvider as $row) {
            $email1 = $row['Email'];
            $service_provider_name = $service_provider_name;
            $ServiceRequestId1 = $ServiceRequestId1;

            if($email1 == $email){
              break;
            }

            else{
           include('Cancel-Provider-Message.php');
         }
           }
          }      

      if (count($ServiceRequestId3)) {
          foreach ($ServiceRequestId3 as $row) {
           $service_provider_name = $service_provider_name;
           $ServiceRequestId1 = $ServiceRequestId1;
           $email1 = $row['Email'];
           include('Cancel-Customer-mail.php');
           }
          } 
           
         echo 1;

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
                    $target_userid = $row['TargetUserId'];

                    $result1 = $this->model->NewFindBlockCustomer($userid, $target_userid);
                    $block = $result1[0];
                    
                      if($block == 1){
                        $block1 = "Un-block";
                      }
                     if($block == 0){
                      $block1 = "Block";
                     }
                           

           $Address = 

                  '<section class="block">
                    <div class="round text-center" >
                      <img src="../assets/image/forma-1-copy-19.png">
                    </div>
                      <p class="service-provider text-center">' . $firstname . ' ' . $lastname . '</p>
                      <button type="button" class="favourite-bttn" id=' . $target_userid . '>' . $block1 .'</button>
                      
                  </section>';
          
           echo $Address;
        }
      }
    }
  }


public function FavouritePros()
    {

        if (isset($_POST)) {

            $email = $_POST['username'];

            $result = $this->model->ResetKey($email);
            $Provider_name = $result[3];

            $result = $this->model->FavouritePros($Provider_name);
           
            if (count($result)) {
                foreach ($result as $row) {
                    $firstname = $row['FirstName'];
                    $lastname = $row['LastName'];
                    $userid = $row['UserId'];
                    $target_userid = $row['TargetUserId'];

                        $Provider_img = $row['UserProfilePicture'];

                        if($Provider_img == ''){
                        $Provider_img1 = '../assets/image/forma-1-copy-19.png" class="round"';

                        }else{
                        $Provider_img1 = ''.$Provider_img.'" style="width:100px;height:100px;margin-top:25px;"';
                        }

                    $Cleanings = $this->model->CountRowsFavouritePros($target_userid,$userid);

                    $result1 = $this->model->FindingRowForCustomerBlock($userid,$target_userid);

                    if($result1 > 0){

                    $result1 = $this->model->NewFindBlockCustomer($userid,$target_userid);
                    $result11 = $this->model->NewFindFavouriteCustomer($userid,$target_userid);
                    $block = $result1[0];
                    $favourite = $result11[0];

                      if($block == 0){
                        $block1 = "Block";
                      }
                     if($block == 1){
                      $block1 = "Un-block";
                     }
                           
                      if($favourite == 0){
                        $block2 = "favourite";
                      }
                     if($favourite == 1){
                      $block2 = "Un-favourite";
                     }
                       
                        $userid1 = $target_userid;

                        $Provider_all_ratings1 = $this->model->OverAllRatingOfServiceProvider1($userid1);
                        $Provider_all_ratings = $this->model->OverAllRatingOfServiceProvider($userid1);

                      
                 if (count($Provider_all_ratings) > 0) {
                  
                   $All_Ratings = 0;
                  foreach ($Provider_all_ratings as $row) {
                   
                   $r = $row['Ratings'];
                   
                  $All_Ratings = $All_Ratings + $r;
                  
                   }

                 $average = intval($All_Ratings/$Provider_all_ratings1);
                      $stars = "";
                            for ($x = 1; $x <= $average; $x+=1) {
                             $stars = $stars."<i class='fa fa-star star1'></i>";
                               } 

                      $avgs = 5.0 - $average;

                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2'></i>";
                               } 

           $Address = 

                  '<section class="block">
                    <div class="text-center" >
                      <img src="'.$Provider_img1.'>
                    </div>
                      <p class="service-provider text-center">'.$firstname.' '.$lastname .'</p>
                        <span class="time text-center">'. $stars . $stars1.'<span style="margin-left: 10px;">'.$average.'</span></span>

                      <p class="service-provider text-center" id="cleaning">'.$Cleanings.' Cleanings</p>

                      <span style="display: flex;">
                      <button type="button" class="remove-bttn" id='.$target_userid.'>'.$block2.'</button>
                      <button type="button" class="favourite-bttn" id='.$target_userid.'>'.$block1.'</button>
                      </span>
                  </section>';
          
           echo $Address;

          }

        else{ 

                   $All_Ratings = 5;
            
                      $average = 0;
                      $avgs = $All_Ratings;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2'></i>";
                              
                               } 

           $Address = 

                  '<section class="block">
                    <div class="text-center" >
                      <img src="'.$Provider_img1.'>
                    </div>
                      <p class="service-provider text-center">'.$firstname.' '.$lastname .'</p>
                        <span class="time text-center">'.$stars1.'<span style="margin-left: 10px;">'.$average.'</span></span>

                      <p class="service-provider text-center" id="cleaning">'.$Cleanings.' Cleanings</p>

                      <span style="display: flex;">
                      <button type="button" class="remove-bttn" id='.$target_userid.'>'.$block2.'</button>
                      <button type="button" class="favourite-bttn" id='.$target_userid.'>'.$block1.'</button>
                      </span>
                  </section>';
          
           echo $Address;
    }
  }


          if($result1 == 0){

                        $userid = $target_userid;

                        $Provider_all_ratings1 = $this->model->OverAllRatingOfServiceProvider1($userid);
                        $Provider_all_ratings = $this->model->OverAllRatingOfServiceProvider($userid);
                     
                       
                 if (count($Provider_all_ratings) > 0) {
                  
                   $All_Ratings = 0;
                  foreach ($Provider_all_ratings as $row) {
                   
                   $r = $row['Ratings'];
                   
                  $All_Ratings = $All_Ratings + $r;
                  
                   }
                 $average = intval($All_Ratings/$Provider_all_ratings1);
                      $stars = "";
                            for ($x = 1; $x <= $average; $x+=1) {
                             $stars = $stars."<i class='fa fa-star star1'></i>";
                              
                               } 

                      $avgs = 5.0 - $average;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2'></i>";
                              
                               } 
            $Address =

                  '<section class="block">
                    <div class="text-center" >
                      <img src="'.$Provider_img1.'>
                    </div>
                      <p class="service-provider text-center">'.$firstname.' '.$lastname .'</p>
                        <span class="time text-center"> '. $stars . $stars1.'<span style="margin-left: 10px;">'.$average.'</span></span>

                      <p class="service-provider text-center" id="cleaning">'.$Cleanings.' Cleanings</p>

                      <span style="display: flex;">
                      <button type="button" class="remove-bttn" id='.$target_userid.'>Favourite</button>
                      <button type="button" class="favourite-bttn" id='.$target_userid.'>Block</button>
                      </span>
                  </section>';

                  echo $Address;
           }

           else{

            $Address =

                  '<section class="block">
                    <div class="text-center" >
                      <img src="'.$Provider_img1.'>
                    </div>
                      <p class="service-provider text-center">'.$firstname.' '.$lastname .'</p>
                        <span class="time text-center">         
                                  <i class="fa fa-star star2"></i>
                                  <i class="fa fa-star star2"></i>
                                  <i class="fa fa-star star2"></i>
                                  <i class="fa fa-star star2"></i>
                                  <i class="fa fa-star star2"></i><span style="margin-left: 10px;">0</span></span>

                      <p class="service-provider text-center" id="cleaning">'.$Cleanings.' Cleanings</p>

                      <span style="display: flex;">
                      <button type="button" class="remove-bttn" id='.$target_userid.'>Favourite</button>
                      <button type="button" class="favourite-bttn" id='.$target_userid.'>Block</button>
                      </span>
                  </section>';

                  echo $Address;
           }
          }

        }
      }
    }
  }


 public function BlockCustomerRequest()
    {

        if (isset($_POST)) {
        
            $email = $_POST['username'];
            $target_userid = $_POST['target_userid'];
            
            $result1 = $this->model->ResetKey($email);
            $userid = $result1[3];
            $result10 = $this->model->NewFindBlockCustomer($userid,$target_userid);
            $block = $result10[0];

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
                'userid' => $target_userid,
                'IsBlocked' => $IsBlocked,
                
            ];
            $result = $this->model->BlockCustomerRequest($array);

            $result2 = $this->model->NewFindBlockCustomer($userid, $target_userid);
            $block1 = $result1[0];

        if ($block == 1) {
            echo 1;
        } if($block == 0) {
            echo 0;
      }

    }
  }


 public function BlockFavourite()
    {

        if (isset($_POST)) {
       
            $email = $_POST['username'];
            $target_userid = $_POST['target_userid'];
            
            $result1 = $this->model->ResetKey($email);
            $userid = $result1[3];
            $Rows = $this->model->NewFindBlockCustomerRows($userid,$target_userid);

           if($Rows > 0){

            $result10 = $this->model->NewFindBlockCustomer($userid,$target_userid);
            $block = $result10[0];
            $favourite = $result10[1];

            if($favourite == 0){

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
                'userid' => $target_userid,
                'IsBlocked' => $IsBlocked,
                

            ];
            $result = $this->model->BlockCustomerRequest($array);

            $result2 = $this->model->NewFindBlockCustomer($userid, $target_userid);
            $block1 = $result2[0];

            
        if ($block1 == 1) {
            echo 3;
        } if($block1 == 0) {
            echo 4;
        }
      }else{

      echo 1;

      }
    }


    else{

          $IsBlocked = 1;
          $isfavorite = 0;

            $array = [
                'Provideer_name' => $userid,
                'customer_name' => $target_userid,
                'isblock' => $IsBlocked,
                'isfavorite' => $isfavorite,
                
            ];
            $result = $this->model->favoriteandblocked($array);

            $result2 = $this->model->NewFindBlockCustomer($userid, $target_userid);
            $block1 = $result2[0];

        if ($block1 == 1) {
            echo 3;
        } if($block1 == 0) {
            echo 4;
        }
     }

  }
}



 public function RemoveFavourite()
    {

        if (isset($_POST)) {
        
            $email = $_POST['username'];
            $target_userid = $_POST['target_userid'];
            
            $result1 = $this->model->ResetKey($email);
            $userid = $result1[3]; 
            $Rows = $this->model->NewFindBlockCustomerRows($userid,$target_userid);

           if($Rows > 0){

            $result10 = $this->model->NewFindFavouriteCustomer($userid,$target_userid);
            $Favorite = $result10[0];
            $block = $result10[1];

            if($block == 0){

            if($Favorite == 0){
              $favorite = 1;
            }
            if($Favorite == 1){
              $favorite = 0;
            }

            $result = $this->model->ResetKey($email);
            $Provider_name = $result[3];

            $array = [
                'Provider_name' => $Provider_name,
                'userid' => $target_userid,
                'IsFavorite' => $favorite,
                

            ];
            $result = $this->model->FavouritCustomerRequest($array);

            $result2 = $this->model->NewFindFavouriteCustomer($userid, $target_userid);
            $block1 = $result2[0];

            
        if ($block1 == 1) {
            echo 3;
        } if($block1 == 0) {
            echo 4;
        }
      }else{
        echo 1;
      }
      }


    else{

          $IsBlocked = 0;
          $isfavorite = 1;

            $array = [
                'Provideer_name' => $userid,
                'customer_name' => $target_userid,
                'isblock' => $IsBlocked,
                'isfavorite' => $isfavorite,
                

            ];
            $result = $this->model->favoriteandblocked($array);

            $result2 = $this->model->NewFindFavouriteCustomer($userid, $target_userid);
            $block1 = $result2[0];

            
        if ($block1 == 1) {
            echo 3;
        } if($block1 == 0) {
            echo 4;
        }

    }

      }
  }


public function RateAddress()
    {
        
        if (isset($_POST)) {
            $addressid1 = $_POST['addressid1'];

            $result = $this->model->Dasboard2($addressid1);
            if (count($result)) {
                foreach ($result as $row) {
                    $userid = $row['Provider_Name'];
  
               $result = $this->model->ProviderDashboard($userid); 

               $Provider_Name1 = $result['FirstName'];
               $Provider_Name2 = $result['LastName'];    

               $Provider_all_ratings1 = $this->model->OverAllRatingOfServiceProvider1($userid);
               $Provider_all_ratings = $this->model->OverAllRatingOfServiceProvider($userid);
                     
                       
                 if (count($Provider_all_ratings) > 0) {
                   $All_Ratings = 0;
                  foreach ($Provider_all_ratings as $row) {
                   
                   $r = $row['Ratings'];
                   
                  $All_Ratings = $All_Ratings + $r;
                  
                   }
                 $average = intval($All_Ratings/$Provider_all_ratings1);
                      
                      $stars = "";
                            for ($x = 1; $x <= $average; $x+=1) {
                             $stars = $stars."<i class='fa fa-star star3'></i>";
                              
                               } 

                      $avgs = 5.0 - $average;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star4'></i>";
                              
                               } 

          $Address = 

           '<div class="round-main">
             <img src="../assets/image/forma-1-copy-19.png" class="round5"><span class="time-warning" id="provider_name" style="font-size:25px;">'.$Provider_Name1 .' ' . $Provider_Name2 . '</span><br>
             <span class="time star-fa">'. $stars . $stars1 . ' <span class="time-warning" id="four">' . $average . '.0</span></span>
            </div>';    

              echo $Address; 
              }  

          else{

                 $All_Ratings = 5;
            
                      $average = 0;
                      $avgs = $All_Ratings;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star4'></i>";
                              
                               } 

            $Address =

           '<div class="round-main">
             <img src="../assets/image/forma-1-copy-19.png" class="round5"><span class="time-warning" id="provider_name">                        '.$Provider_Name1 .' ' . $Provider_Name2 . '</span><br>
             <span class="time star-fa">'. $stars1 . '<span class="time-warning" id="four">' . $average . '</span></span>
            </div>';    

              echo $Address; 
                    
                }
            }
        }
    }
}


   public function Usermanagement()
    {
        
        if (isset($_POST)) {
            $email = $_POST['username'];

            $result = $this->model->Usermanagement();
            if (count($result)) {
                foreach ($result as $row) {
                    $userid = $row['UserId'];
                    $firstname = $row['FirstName'];
                    $lastname = $row['LastName'];
                    $usertypeid = $row['UserTypeId'];
                    $pincode = $row['PostalCode'];
                    $mobile = $row['Mobile'];
                    $status = $row['Status'];
                    $createddate = $row['CreatedDate'];

                    $var = strtotime($createddate);
                    $createddate = date('d/m/y',$var);

                    if($usertypeid == 0){
                      $usertype = "Customer";
                    }
                    else{
                      $usertype = "Service Provider";
                    }

                    if($status == 0){
                     $state = 'actives">Active';
                    }else{
                      $state = 'inactives">Inactive';
                    }

                    if($status == 0){
                     $dis = "<a class='dropdown-item'>Inactive</a>";

                    }else{
                    $dis = "<a class='dropdown-item'>Active</a>";
                    }

                    
            $Address = 
                    '<tr>                                         
                      <td>'.$firstname.'  '.$lastname.'</td>     
                      <td></td>
                      <td>'.$createddate.'</td>
                      <td>'.$usertype.'</td>    
                      <td>'.$mobile.'</td>
                      <td>'.$pincode.'</td>
                      <td><button type="button" class="btn '.$state.'</button></td>
                      <td class="dot">   
                      <div class="dropdown">
                        <button class="btn" type="button" data-toggle="dropdown">
                           <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu menu" id='.$userid.'>'.$dis.'
                                      
                            </div>
                           </div></td>
                    </tr>';

                        echo $Address;              
                }
            }
        }
    }


   public function AdminSearchUsermanagement()
    {
        
        if (isset($_POST)) {

            $select = $_POST['select'];
            $user_type = $_POST['user_type'];
            $from_date = $_POST['from_date'];
            $to_date = $_POST['to_date'];

            if($select == '' && $user_type == '' && $from_date == '' && $to_date == ''){

            $result = $this->model->Usermanagement();

            }
            else{

            $from_date = $_POST['from_date'] . ''. ' 00:00:00';
            $to_date = $_POST['to_date'] . ''. ' 00:00:00';

              $result = $this->model->AdminSearchUsermanagement($select,$user_type,$from_date,$to_date);

            }
            
            if (count($result)) {
                foreach ($result as $row) {
                    $userid = $row['UserId'];
                    $firstname = $row['FirstName'];
                    $lastname = $row['LastName'];
                    $usertypeid = $row['UserTypeId'];
                    $pincode = $row['PostalCode'];
                    $mobile = $row['Mobile'];
                    $status = $row['Status'];
                    $createddate = $row['CreatedDate'];

                    $var = strtotime($createddate);
                    $createddate = date('d/m/y',$var);

                    if($usertypeid == 0){
                      $usertype = "Customer";
                    }
                    else{
                      $usertype = "Service Provider";
                    }

                    if($status == 0){
                     $state = 'actives">Active';
                    }else{
                      $state = 'inactives">Inactive';
                    }

                    if($status == 0){
                     $dis = "<a class='dropdown-item'>Inactive</a>";

                    }else{
                    $dis = "<a class='dropdown-item'>Active</a>";
                    }

                    
            $Address = 
                    '<tr>                                         
                      <td>'.$firstname.'  '.$lastname.'</td>     
                      <td></td>
                      <td>'.$createddate.'</td>
                      <td>'.$usertype.'</td>    
                      <td>'.$mobile.'</td>
                      <td>'.$pincode.'</td>
                      <td><button type="button" class="btn '.$state.'</button></td>
                      <td class="dot">   
                      <div class="dropdown">
                        <button class="btn" type="button" data-toggle="dropdown">
                           <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu menu" id='.$userid.'>'.$dis.'
                                      
                            </div>
                           </div></td>
                    </tr>';

                        echo $Address;              
                }
            }
        }
    }



 public function UsermanagementInactive()
    {

        if (isset($_POST)) {

            $email = $_POST['username'];
            $target_userid = $_POST['target_userid'];
            
            $result10 = $this->model->UsermanagementInactive($target_userid);
            $status = $result10[0];

            if($status == 0){
              $statu = 1;
            }
            if($status == 1){
              $statu = 0;
            }

            $array = [
                'target_userid' => $target_userid,
                'statu' => $statu,            

            ];
            $result = $this->model->UsermanagementInactive1($array);

            $result2 = $this->model->UsermanagementInactive($target_userid);
            $status1 = $result2[0];

            
        if ($status1 == 1) {
            echo 1;
        } if($status1 == 0) {
            echo 0;
        }
      }
    }



 public function AdminServiceRequests()
    {
        
        if (isset($_POST)) {
            $email = $_POST['username'];
           
            $result = $this->model->AdminServiceRequests();
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
                    $status = $row['ST'];
                    $userid = $row['UserId'];
                    $Provider_name = $row['Provider_Name'];
                
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

                 if($status == 0){
                  $state = "class='new'>New";
                 }
                 elseif($status == 1){
                  $state = "class='padding1'>Pendding";
                 }
                 elseif ($status == 2) {
                  $state = "class='completed1'>Completed";
                 }
                 elseif ($status == 3){
                  $state = "class='cancel1'>Cancelled";
                 }else{
                  $state = "class='ref'>Refunded";
                 }

                if($status == 0){

                     $Address = 

                        '<tr>                                         
                         
                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">'.$ServiceRequestId.'</td>     

                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                          <img src="../assets/image/calendar2.png" class="calendar"><b>'.$ServiceStartDate.'</b><br>
                          <img src="../assets/image/layer-712.png" class="clock">'.$Tim.'
                          </td>

                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                          '.$firstname.'  '.$lastname.'<br>
                          <div class="mydiv">
                            <img src="../assets/image/layer-719.png" class="home">
                              <div class="desc">'.$street.' '.$houseno.','.$pincode.'  '.$city.'</div> 
                              </div>
                           </td>

                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal"></td>   

                           <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><span class="pay2"><b>'.$SubTotal.'</b></span><span class="pay1"><b>€</b></span></td>
                           
                           <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><span class="pay2"><b>'.$SubTotal.'</b></span><span class="pay1"><b>€</b></span></td>
                           
                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal"></td>
                          
                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                            <button type="button" '.$state.'</button>
                           </td>

                           <td class="text-center dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><button type="button" class="btn cancel1">Not Applicable</button></td>

                          <td class="dot">
                           <div class="dropdown">
                            <button class="btn" type="button" data-toggle="dropdown">
                               <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu" id="menu">
                                  <a class="dropdown-item" data-toggle="modal" data-target="#address-modal" id=' . $ServiceRequestId . '>Edit & Reschedule</a>  
                                  
                                  <a class="dropdown-item" id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#delete-modal">Cancel SR by Cust</a>
                                  <a class="dropdown-item" href="#">Inquiry</a>  
                                  <a class="dropdown-item" href="#">History Log</a>
                                  <a class="dropdown-item" href="#">Download Invoice</a>
                                  <a class="dropdown-item" href="#">Other Transactions</a>       
                                </div>
                               </div>
                          </td>

                        </tr>';


                        echo $Address; 

                    }else if($status == 4){


                        $provider_row = $this->model->ProviderDashboard($Provider_name);

                        $Service_Provider_Name1 = $provider_row['FirstName'];
                        $Service_Provider_Name2 = $provider_row['LastName'];

                        $Provider_img = $provider_row['UserProfilePicture'];

                        if($Provider_img == ''){
                        $Provider_img1 = '../assets/image/forma-1-copy-19.png" class="round"';

                        }else{
                        $Provider_img1 = ''.$Provider_img.'" style="width:40px;height:40px; margin-right:10px;"';
                        }

                        $Service_Provider_Name = $Service_Provider_Name1 . ' ' . $Service_Provider_Name2;

                      
                        $Service_Provider_Name = $Service_Provider_Name1 . ' ' . $Service_Provider_Name2;

                        $Provider_all_ratings1 = $this->model->OverAllRatingOfServiceProvider1($Provider_name);
                        $Provider_all_ratings = $this->model->OverAllRatingOfServiceProvider($Provider_name);
                     
                       
                 if (count($Provider_all_ratings) > 0) {
                   $All_Ratings = 0;
                  foreach ($Provider_all_ratings as $row) {
                   
                   $r = $row['Ratings'];
                   
                  $All_Ratings = $All_Ratings + $r;
                  
                   }
                 $average = intval($All_Ratings/$Provider_all_ratings1);

                      $stars = "";
                            for ($x = 1; $x <= $average; $x+=1) {
                             $stars = $stars."<i class='fa fa-star star1'></i>";
                              
                               } 

                      $avgs = 5.0 - $average;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2'></i>";
                              
                               } 


                     $Address = 


                        '<tr>                                         
                         
                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">'.$ServiceRequestId.'</td>     

                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                          <img src="../assets/image/calendar2.png" class="calendar"><b>'.$ServiceStartDate.'</b><br>
                          <img src="../assets/image/layer-712.png" class="clock">'.$Tim.'
                          </td>

                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                          '.$firstname.'  '.$lastname.'<br>
                          <div class="mydiv">
                            <img src="../assets/image/layer-719.png" class="home">
                              <div class="desc">'.$street.' '.$houseno.','.$pincode.'  '.$city.'</div> 
                              </div>
                           </td>

                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                              
                              <img src="'.$Provider_img1.'>' . $Service_Provider_Name . '<br>
                              <span class="time">' . $stars . $stars1.' '.$average.'</span>                           
                              
                           </td>   

                           <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><span class="pay2"><b>'.$SubTotal.'</b></span><span class="pay1"><b>€</b></span></td>
                           
                           <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><span class="pay2"><b>'.$SubTotal.'</b></span><span class="pay1"><b>€</b></span></td>
                           
                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal"></td>
                          
                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                            <button type="button" '.$state.'</button>
                           </td>

                           <td class="text-center dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><button type="button" class="btn cancel1">Not Applicable</button></td>
                        
                          <td class="dot">
                           <div class="dropdown">
                            <button class="btn" type="button" data-toggle="dropdown">
                               <i class="fas fa-ellipsis-v"></i>
                            </button>
              
                              <div class="dropdown-menu" id="menu">
                                  <a class="dropdown-item dis-ref" data-toggle="modal" data-target="#refund-modal" id=' . $ServiceRequestId . '>Refund</a>  
                                  
                                  <a class="dropdown-item" href="#">Inquiry</a> 
                                  <a class="dropdown-item" href="#">History Log</a>
                                  <a class="dropdown-item" href="#">Download Invoice</a>
                                  <a class="dropdown-item" href="#">Has Issue</a>
                                  <a class="dropdown-item" href="#">Other Transactions</a>       
                                </div>
                               </div>
                          </td>

                        </tr>';
                   
                   echo $Address;

             }  else{
                 
                 $All_Ratings = 5;
            
                      $average = 0.0;
                      $avgs = $All_Ratings;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2'></i>";
                              
                               } 

                     $Address = 
                      
                        '<tr>                                         
                         
                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">'.$ServiceRequestId.'</td>     

                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                          <img src="../assets/image/calendar2.png" class="calendar"><b>'.$ServiceStartDate.'</b><br>
                          <img src="../assets/image/layer-712.png" class="clock">'.$Tim.'
                          </td>

                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                          '.$firstname.'  '.$lastname.'<br>
                          <div class="mydiv">
                            <img src="../assets/image/layer-719.png" class="home">
                              <div class="desc">'.$street.' '.$houseno.','.$pincode.'  '.$city.'</div> 
                              </div>
                           </td>

                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">

                              <img src="'.$Provider_img1.'>' . $Service_Provider_Name . '<br>
                              <span class="time">' .$stars1.' '.$average.'</span>                          

                           </td>   

                           <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><span class="pay2"><b>'.$SubTotal.'</b></span><span class="pay1"><b>€</b></span></td>
                           
                           <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><span class="pay2"><b>'.$SubTotal.'</b></span><span class="pay1"><b>€</b></span></td>
                           
                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal"></td>
                          
                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                            <button type="button" '.$state.'</button>
                           </td>

                           <td class="text-center dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><button type="button" class="btn cancel1">Not Applicable</button></td>
                        
                          <td class="dot">
                           <div class="dropdown">
                            <button class="btn" type="button" data-toggle="dropdown">
                               <i class="fas fa-ellipsis-v"></i>
                            </button>
              
                              <div class="dropdown-menu" id="menu">
                                  <a class="dropdown-item dis-ref" data-toggle="modal" data-target="#refund-modal" id=' . $ServiceRequestId . '>Refund</a>  
                                  
                                  <a class="dropdown-item" href="#">Inquiry</a> 
                                  <a class="dropdown-item" href="#">History Log</a>
                                  <a class="dropdown-item" href="#">Download Invoice</a>
                                  <a class="dropdown-item" href="#">Has Issue</a>
                                  <a class="dropdown-item" href="#">Other Transactions</a>       
                                </div>
                               </div>
                          </td>

                        </tr>';


                 echo $Address;

               }

             }

              else{

                    $Address = 

                        '<tr>                                         
                         
                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">'.$ServiceRequestId.'</td>     

                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                          <img src="../assets/image/calendar2.png" class="calendar"><b>'.$ServiceStartDate.'</b><br>
                          <img src="../assets/image/layer-712.png" class="clock">'.$Tim.'
                          </td>

                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                          '.$firstname.'  '.$lastname.'<br>
                          <div class="mydiv">
                            <img src="../assets/image/layer-719.png" class="home">
                              <div class="desc">'.$street.' '.$houseno.','.$pincode.'  '.$city.'</div> 
                              </div>
                           </td>

                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal"></td>   

                           <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><span class="pay2"><b>'.$SubTotal.'</b></span><span class="pay1"><b>€</b></span></td>
                           
                           <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><span class="pay2"><b>'.$SubTotal.'</b></span><span class="pay1"><b>€</b></span></td>
                           
                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal"></td>
                          
                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                            <button type="button" '.$state.'</button>
                           </td>

                           <td class="text-center dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><button type="button" class="btn cancel1">Not Applicable</button></td>
                        
                          <td class="dot">
                           <div class="dropdown">
                            <button class="btn" type="button" data-toggle="dropdown">
                               <i class="fas fa-ellipsis-v"></i>
                            </button>
              
                              <div class="dropdown-menu" id="menu">
                                  <a class="dropdown-item" data-toggle="modal" data-target="#refund-modal" id=' . $ServiceRequestId . '>Refund</a>  
                                  
                                  <a class="dropdown-item" href="#">Inquiry</a> 
                                  <a class="dropdown-item" href="#">History Log</a>
                                  <a class="dropdown-item" href="#">Download Invoice</a>
                                  <a class="dropdown-item" href="#">Has Issue</a>
                                  <a class="dropdown-item" href="#">Other Transactions</a>       
                                </div>
                               </div>
                          </td>

                        </tr>';

                        echo $Address; 

                    }

                 }
              }
          }
      }



    public function AdminUpdateAddress()
    {
        
        if (isset($_POST)) {
            $addressid1 = $_POST['addressid1'];

            $result = $this->model->AdminUpdateAddress($addressid1);
            if (count($result)) {
                foreach ($result as $row) {
                    $street = $row['AddressLine1'];
                    $houseno = $row['AddressLine2'];
                    $city = $row['City'];
                    $pincode = $row['PostalCode'];
                    $ServiceStartDate = $row['ServiceStartDate'];
                    $SubTotal = $row['SubTotal'];
                    
                    $Tim = $row['Tim']; 
                    $totaltime  = $row['TotalHours'];

                    $starttime =  date("H:i", strtotime($Tim)); 

                    $result = [$street, $houseno, $city, $pincode, $ServiceStartDate, $starttime];

                    echo json_encode($result);

                                    }
                                }
                            }
                        }


    public function Refunded()
    {
        
        if (isset($_POST)) {
            $addressid1 = $_POST['addressid1'];

            $result = $this->model->Dasboard1($addressid1);
            if (count($result)) {
                foreach ($result as $row) {
                    $subtotal = $row['SubTotal'];
                    $refundedamount = $row['RefundedAmount'];   

                    $Balance = ($subtotal - $refundedamount);

                    if($refundedamount == ''){
                      $refundedamount = 0;
                    }

              $Address =                  

                     '<div class="row">
                      <div class="form-group col-md-4 mt-1">
                        <p class="street sub">Paid Amount<br><span id="Paid_Amount">'.$subtotal.' €</span></p>     
                      </div>
                     
                      <div class="form-group col-md-4 mt-1">
                        <p class="street">Refunded Amount<br><span id="Refunded_Amount">'.$refundedamount.' €</span></p>     
                      </div>
                      
                      <div class="form-group col-md-4 mt-1">
                        <p class="street bal">In Balance Amount<br><span id="Balance_Amount">'.$Balance.'.00 €</span></p>     
                      </div>
                    </div>';

                    echo $Address;

                                    }
                                }
                            }
                        }


    public function UpdateRefunded()
    {
        
        if (isset($_POST)) {
            $addressid1 = $_POST['addressid'];
            $calculate_amount = $_POST['calculate_amount'];
            $status = $_POST['status'];
 
            $result = $this->model->UpdateRefunded($addressid1,$calculate_amount,$status);

            echo 1;

    }
  }


  public function AdminUpdateDetails()
     {

         if (isset($_POST)) {
    
             $ServiceRequestId = $_POST['addressid'];
             $plan_date = $_POST['plan_date'];
             $dash_time = $_POST['dash_time'];

             $street = $_POST['street'];
             $houseno = $_POST['houseno'];
             $pincode = $_POST['pincode'];

             $dash_time11 = $dash_time;
             $dash_time = $dash_time . ':00';        

             $result1 = $this->model->UpdateCustomerSchedule($ServiceRequestId);

             $database_date = $result1['ServiceStartDate'];
             $database_time = $result1['Tim'];
             $userid = $result1['UserId'];


          $result11 = $this->model->CheckAddressOfCustomerForChanges($ServiceRequestId);

             $database_street = $result11['AddressLine1'];
             $database_houseno = $result11['AddressLine2'];
             $database_pincode = $result11['PostalCode'];
             $userid12 = $result11['UserId'];

             $array1 = [
                      'plan_date' => $plan_date,
                      'dash_time' => $dash_time,
                      'ServiceRequestId' => $ServiceRequestId,
                      ];

              $result2 = $this->model->UpdateTimeDateByAdmin($array1);


              $addressid = $result1['AddressId'];
             
                  $array = [
                      'street' => $_POST['street'],
                      'houseno' => $_POST['houseno'],
                      'addressid' => $addressid,
                      'pincode' => $_POST['pincode'],
                      'location' => $_POST['location'],

                  ];


                  $result = $this->model->AdminUpdateDetails($array);

             if(($database_date != $plan_date || $database_time != $dash_time) && ($database_street == $street && $database_houseno == $houseno && $database_pincode == $pincode)){

             $result3 = $this->model->ProviderDashboard($userid);
             $email = $result3['Email'];
             $plan_date = $plan_date;
             $dash_time11 = $dash_time11;
             $ServiceRequestId = $ServiceRequestId;

             include('Admin-Mail.php');
             }


            if(($database_street != $street || $database_houseno != $houseno || $database_pincode != $pincode) && ($database_date == $plan_date && $database_time == $dash_time)){

           $result12 = $this->model->ProviderDashboard($userid12);
           $email1 = $result12['Email'];

           $ServiceRequestId = $ServiceRequestId;

           include('Admin-Mail.php');            
           }


            if(($database_date != $plan_date || $database_time != $dash_time) && ($database_street != $street || $database_houseno != $houseno || $database_pincode != $pincode)){

             $result4 = $this->model->ProviderDashboard($userid);
             $email2 = $result4['Email'];
             $plan_date = $plan_date;
             $dash_time11 = $dash_time11;
             $ServiceRequestId = $ServiceRequestId;

             include('Admin-Mail.php');

           }
             
              echo 1;
            }
         }



 public function AdminFindPostalCode()
    {
        
        if (isset($_POST)) {
            $zip = $_POST['zip'];
            $sid = $_POST['sid'];
           
            $customer = $_POST['customer'];
           
            $status = $_POST['status'];
           
            $from_date = $_POST['from_date'];
            $to_date = $_POST['to_date'];

            if($zip == '' && $sid == '' && $customer == '' && $status == '' && $from_date == '' && $to_date == ''){

             $result = $this->model->AdminServiceRequests();
            }
            else{

              $result = $this->model->AdminFindPostalCodeRowCount($zip,$sid,$customer,$status,$from_date,$to_date);

            }

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
                    $status = $row['ST'];
                    $userid = $row['UserId'];
                    $Provider_name = $row['Provider_Name'];
                
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


                 if($status == 0){
                  $state = "class='new'>New";
                 }
                 elseif($status == 1){
                  $state = "class='padding1'>Pendding";
                 }
                 elseif ($status == 2) {
                  $state = "class='completed1'>Completed";
                 }
                 elseif ($status == 3){
                  $state = "class='cancel1'>Cancelled";
                 }else{
                  $state = "class='ref'>Refunded";
                 }


                if($status == 0){

                     $Address = 

                        '<tr>                                         
                         
                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">'.$ServiceRequestId.'</td>     

                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                          <img src="../assets/image/calendar2.png" class="calendar"><b>'.$ServiceStartDate.'</b><br>
                          <img src="../assets/image/layer-712.png" class="clock">'.$Tim.'
                          </td>

                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                          '.$firstname.'  '.$lastname.'<br>
                          <div class="mydiv">
                            <img src="../assets/image/layer-719.png" class="home">
                              <div class="desc">'.$street.' '.$houseno.','.$pincode.'  '.$city.'</div> 
                              </div>
                           </td>

                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal"></td>   

                           <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><span class="pay2"><b>'.$SubTotal.'</b></span><span class="pay1"><b>€</b></span></td>
                           
                           <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><span class="pay2"><b>'.$SubTotal.'</b></span><span class="pay1"><b>€</b></span></td>
                           
                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal"></td>
                          
                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                            <button type="button" '.$state.'</button>
                           </td>

                           <td class="text-center dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><button type="button" class="btn cancel1">Not Applicable</button></td>

                          <td class="dot">
                           <div class="dropdown">
                            <button class="btn" type="button" data-toggle="dropdown">
                               <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu" id="menu">
                                  <a class="dropdown-item" data-toggle="modal" data-target="#address-modal" id=' . $ServiceRequestId . '>Edit & Reschedule</a>  
                                  
                                  <a class="dropdown-item" id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#delete-modal">Cancel SR by Cust</a>
                                  <a class="dropdown-item" href="#">Inquiry</a>  
                                  <a class="dropdown-item" href="#">History Log</a>
                                  <a class="dropdown-item" href="#">Download Invoice</a>
                                  <a class="dropdown-item" href="#">Other Transactions</a>       
                                </div>
                               </div>
                          </td>

                        </tr>';


                        echo $Address; 

                    }else if($status == 4){


                        $provider_row = $this->model->ProviderDashboard($Provider_name);

                        $Service_Provider_Name1 = $provider_row['FirstName'];
                        $Service_Provider_Name2 = $provider_row['LastName'];

                        $Service_Provider_Name = $Service_Provider_Name1 . ' ' . $Service_Provider_Name2;

                        $Provider_all_ratings1 = $this->model->OverAllRatingOfServiceProvider1($Provider_name);
                        $Provider_all_ratings = $this->model->OverAllRatingOfServiceProvider($Provider_name);
                     
                       
                 if (count($Provider_all_ratings) > 0) {
                   $All_Ratings = 0;
                  foreach ($Provider_all_ratings as $row) {
                   
                   $r = $row['Ratings'];
                   
                  $All_Ratings = $All_Ratings + $r;
                  
                   }
                 $average = intval($All_Ratings/$Provider_all_ratings1);

                      $stars = "";
                            for ($x = 1; $x <= $average; $x+=1) {
                             $stars = $stars."<i class='fa fa-star star1'></i>";
                              
                               } 

                      $avgs = 5.0 - $average;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2'></i>";
                              
                               } 

                     $Address = 

                        '<tr>                                         
                         
                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">'.$ServiceRequestId.'</td>     

                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                          <img src="../assets/image/calendar2.png" class="calendar"><b>'.$ServiceStartDate.'</b><br>
                          <img src="../assets/image/layer-712.png" class="clock">'.$Tim.'
                          </td>

                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                          '.$firstname.'  '.$lastname.'<br>
                          <div class="mydiv">
                            <img src="../assets/image/layer-719.png" class="home">
                              <div class="desc">'.$street.' '.$houseno.','.$pincode.'  '.$city.'</div> 
                              </div>
                           </td>

                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">

                              <img src="../assets/image/forma-1-copy-19.png" class="round">' . $Service_Provider_Name . '<br>
                              <span class="time">' . $stars . $stars1.' '.$average.'</span>                           

                           </td>   

                           <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><span class="pay2"><b>'.$SubTotal.'</b></span><span class="pay1"><b>€</b></span></td>
                           
                           <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><span class="pay2"><b>'.$SubTotal.'</b></span><span class="pay1"><b>€</b></span></td>
                           
                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal"></td>
                          
                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                            <button type="button" '.$state.'</button>
                           </td>

                           <td class="text-center dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><button type="button" class="btn cancel1">Not Applicable</button></td>
                        
                          <td class="dot">
                           <div class="dropdown">
                            <button class="btn" type="button" data-toggle="dropdown">
                               <i class="fas fa-ellipsis-v"></i>
                            </button>
              
                              <div class="dropdown-menu" id="menu">
                                  <a class="dropdown-item dis-ref" data-toggle="modal" data-target="#refund-modal" id=' . $ServiceRequestId . '>Refund</a>  
                                  
                                  <a class="dropdown-item" href="#">Inquiry</a> 
                                  <a class="dropdown-item" href="#">History Log</a>
                                  <a class="dropdown-item" href="#">Download Invoice</a>
                                  <a class="dropdown-item" href="#">Has Issue</a>
                                  <a class="dropdown-item" href="#">Other Transactions</a>       
                                </div>
                               </div>
                          </td>

                        </tr>';
                   
                   echo $Address;

              }  else{
                 
                 $All_Ratings = 5;
            
                      $average = 0.0;
                      $avgs = $All_Ratings;


                      $stars1 = "";
                            for ($x = 1; $x <= $avgs; $x+=1) {
                             $stars1 = $stars1."<i class='fa fa-star star2'></i>";
                              
                               } 

                     $Address = 
                      
                        '<tr>                                         
                         
                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">'.$ServiceRequestId.'</td>     

                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                          <img src="../assets/image/calendar2.png" class="calendar"><b>'.$ServiceStartDate.'</b><br>
                          <img src="../assets/image/layer-712.png" class="clock">'.$Tim.'
                          </td>

                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                          '.$firstname.'  '.$lastname.'<br>
                          <div class="mydiv">
                            <img src="../assets/image/layer-719.png" class="home">
                              <div class="desc">'.$street.' '.$houseno.','.$pincode.'  '.$city.'</div> 
                              </div>
                           </td>

                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">

                              <img src="../assets/image/forma-1-copy-19.png" class="round">' . $Service_Provider_Name . '<br>
                              <span class="time">' .$stars1.' '.$average.'</span>                          

                           </td>   

                           <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><span class="pay2"><b>'.$SubTotal.'</b></span><span class="pay1"><b>€</b></span></td>
                           
                           <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><span class="pay2"><b>'.$SubTotal.'</b></span><span class="pay1"><b>€</b></span></td>
                           
                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal"></td>
                          
                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                            <button type="button" '.$state.'</button>
                           </td>

                           <td class="text-center dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><button type="button" class="btn cancel1">Not Applicable</button></td>
                        
                          <td class="dot">
                           <div class="dropdown">
                            <button class="btn" type="button" data-toggle="dropdown">
                               <i class="fas fa-ellipsis-v"></i>
                            </button>
              
                              <div class="dropdown-menu" id="menu">
                                  <a class="dropdown-item dis-ref" data-toggle="modal" data-target="#refund-modal" id=' . $ServiceRequestId . '>Refund</a>  
                                  
                                  <a class="dropdown-item" href="#">Inquiry</a> 
                                  <a class="dropdown-item" href="#">History Log</a>
                                  <a class="dropdown-item" href="#">Download Invoice</a>
                                  <a class="dropdown-item" href="#">Has Issue</a>
                                  <a class="dropdown-item" href="#">Other Transactions</a>       
                                </div>
                               </div>
                          </td>

                        </tr>';


                 echo $Address;

               }

             }

            else{

                    $Address = 

                        '<tr>                                         
                         
                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">'.$ServiceRequestId.'</td>     

                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                          <img src="../assets/image/calendar2.png" class="calendar"><b>'.$ServiceStartDate.'</b><br>
                          <img src="../assets/image/layer-712.png" class="clock">'.$Tim.'
                          </td>

                          <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                          '.$firstname.'  '.$lastname.'<br>
                          <div class="mydiv">
                            <img src="../assets/image/layer-719.png" class="home">
                              <div class="desc">'.$street.' '.$houseno.','.$pincode.'  '.$city.'</div> 
                              </div>
                           </td>

                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal"></td>   

                           <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><span class="pay2"><b>'.$SubTotal.'</b></span><span class="pay1"><b>€</b></span></td>
                           
                           <td class="pay dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><span class="pay2"><b>'.$SubTotal.'</b></span><span class="pay1"><b>€</b></span></td>
                           
                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal"></td>
                          
                           <td id=' . $ServiceRequestId . ' class="dashboard" data-toggle="modal" data-target="#schedule-modal">
                            <button type="button" '.$state.'</button>
                           </td>

                           <td class="text-center dashboard" id=' . $ServiceRequestId . ' data-toggle="modal" data-target="#schedule-modal"><button type="button" class="btn cancel1">Not Applicable</button></td>
                        
                          <td class="dot">
                           <div class="dropdown">
                            <button class="btn" type="button" data-toggle="dropdown">
                               <i class="fas fa-ellipsis-v"></i>
                            </button>
              
                              <div class="dropdown-menu" id="menu">
                                  <a class="dropdown-item" data-toggle="modal" data-target="#refund-modal" id=' . $ServiceRequestId . '>Refund</a>  
                                  
                                  <a class="dropdown-item" href="#">Inquiry</a> 
                                  <a class="dropdown-item" href="#">History Log</a>
                                  <a class="dropdown-item" href="#">Download Invoice</a>
                                  <a class="dropdown-item" href="#">Has Issue</a>
                                  <a class="dropdown-item" href="#">Other Transactions</a>       
                                </div>
                               </div>
                          </td>

                        </tr>';

                        echo $Address; 

                    }

                 }
              }
          }
        }
      

 public function DeleteServiceByAdmin()
    {

        if (isset($_POST)) {
        
            $addressid = $_POST['addressid'];

            $ServiceRequestId = $addressid;


          $result1 = $this->model->UpdateCustomerSchedule($ServiceRequestId);

          $userid = $result1['UserId'];

             $result4 = $this->model->FindDeleteCustomerByAdmin($userid);
             $email4 = $result4['Email'];

             $ServiceRequestId = $ServiceRequestId;

             include('Admin-Mail.php');


            $array = [
                'addressid' => $addressid,
            ];

            $result = $this->model->DeleteServiceByAdmin($array);
            
        if ($result) {

            echo 1;
        } else {
            echo 0;
        }

        }
    }

}
