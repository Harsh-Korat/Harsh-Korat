
<?php

class Helperland {

 /* Creates database connection */

public function __construct() {
  try {            

       $dsn = 'mysql:dbname=helperland;host=localhost';
       $username = 'root';
       $password = '';
       $this-> conn = new PDO($dsn, $username, $password);
       } catch (PDOException $e) {
            echo $e->getMessage();
       }

  }    



    public function ResetKey($email)
    {
        $sql = "select * from user where Email = '$email'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        $firstname = $row['FirstName'];
        $lastname = $row['LastName'];
        $username = $firstname . ' ' . $lastname;
        $userid = $row['UserId'];
        $resetkey = $row['ResetKey'];
        $count = $stmt->rowCount();
        return array($username, $resetkey, $count, $userid);
    }



 public function ResetPass($array)
    {
        $sql = "UPDATE user SET Password = :password , ModifiedDate = :updatedate , ModifiedBy = :modifiedby WHERE ResetKey = :resetkey";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
        return ($result);

    }




    public function Login($email, $password)
    {

        $sql = "select * from user where Email = '$email'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        $usertypeid = $row['UserTypeId'];
        $Password = $row['Password'];
        $Name = $row['FirstName'];
        $_SESSION['usertypeid'] = $usertypeid;
        if ($count == 1) {
            if (password_verify($password, $Password)) {
                if ($usertypeid == 0) {
                    $_SESSION['username'] = $email;
                    $_SESSION['name'] = $Name;
                    

                    echo 2;
                } else if ($usertypeid == 1) {
                    $_SESSION['username'] = $email;
                    $_SESSION['name'] = $Name;
                   
                    echo 3;
                }

            }
             else {
               echo 1;
            }

        } else {
             echo 0; 
        }
    }


    public function Login1($email, $password)
    {

        $sql = "select * from user where Email = '$email'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        $usertypeid = $row['UserTypeId'];
        $Password = $row['Password'];
        $Name = $row['FirstName'];
        $_SESSION['usertypeid'] = $usertypeid;

        if ($count == 1) {
            if (password_verify($password, $Password)) {
                if ($usertypeid == 0) {
                    $_SESSION['username'] = $email;
                    $_SESSION['name'] = $Name;
                    echo 2;
                    
                } else if ($usertypeid == 1) {
                    $_SESSION['username'] = $email;
                    $_SESSION['name'] = $Name;
                    echo 3;
                }
            } else {
               echo 1;
            }
        } else {
           echo 0;
        }
    }




public function Contact($array)
   {
    $sql = "INSERT INTO contactus (Name , Email , Subject , PhoneNumber , Message , CreatedOn , Status , Priority )
      VALUES (:name ,  :email , :subject , :mobile , :message , :creationdt , :status , :priority )";
    $stmt =  $this->conn->prepare($sql);
    $result = $stmt->execute($array);
        
}


public function Customer_SP($array)
    {
        $sql = "INSERT INTO user (FirstName,LastName, Email , Mobile , Password , UserTypeId , RoleId , ResetKey , CreatedDate , Status , IsActive , IsRegisteredUser)
        VALUES (:firstname , :lastname , :email , :mobile , :password , :usertypeid , :roleid , :resetkey , :creationdt , :status , :isactive , :isregistered )";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
 
    }



    public function Email($email)
    {
        $sql = "select * from user where Email = '$email'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }



    public function Pincode($postal)
    {
        $sql = "SELECT * FROM zipcode WHERE ZipcodeValue = $postal";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }


public function City($pincode)
    {

        $sql  = " SELECT
        zipcode.ZipcodeValue,
        city.CityName, state.StateName  FROM zipcode 
        JOIN city
        ON zipcode.CityId = city.Id  AND ZipcodeValue = $pincode
        JOIN state 
        ON state.Id = city.StateId";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();

        $row  = $stmt->fetch(PDO::FETCH_ASSOC);

        $zipcode = $row['ZipcodeValue'];
        $city = $row['CityName'];
        $state = $row['StateName'];

        return array($city, $state);
    }


    public function AddressDetails($array)
    {
        $sql = "INSERT INTO useraddress (UserId , AddressLine1   , AddressLine2 , City ,State,  PostalCode , Mobile , Email ,Type)
        VALUES (:userid , :street ,  :houseno  , :location ,:state , :pincode , :mobile , :email , :type)";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }



    public function Address($email)
    {
        $sql =  "SELECT * FROM useraddress WHERE Email = '$email'  ORDER BY AddressId DESC";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    

    public function AddressCustomer($email)
    {
        $sql =  "SELECT * FROM useraddress WHERE Email = '$email'  ORDER BY AddressId DESC";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function AddressCustomer1($addressid1)
    {
        $sql =  "SELECT * FROM useraddress WHERE AddressId = $addressid1";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    

    public function Dasboard($email)
    {

        $sql  = " SELECT
        servicerequest.ServiceStartDate, servicerequest.SubTotal ,servicerequest.ServiceRequestId,servicerequest.Tim,user.UserId,servicerequest.TotalHours,servicerequest.Total_Time,servicerequest.Provider_name
          FROM servicerequest 
        JOIN user
        ON servicerequest.UserId = user.UserId  where user.Email = '$email'";

        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    public function NewServiceRequest()
    {

        $sql  = " SELECT * FROM servicerequest 
        JOIN useraddress
        ON servicerequest.AddressId = useraddress.AddressId
        JOIN user
        ON servicerequest.UserId = user.UserId
        where servicerequest.Status = 0";

        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    public function NewServiceRequestConflict($ServiceRequestId)
    {

        $sql  = " SELECT * FROM servicerequest 
        where ServiceRequestId = $ServiceRequestId";

        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetch(PDO::FETCH_ASSOC);
      $Tim = $result['Tim'];
      $ServiceStartDate1 = $result['ServiceStartDate'];
      $totaltime = $result['TotalHours'];

        return array($Tim, $ServiceStartDate1,$totaltime);
    }


    public function Dasboard1($addressid1)
    {

        $sql  = " SELECT * FROM servicerequest  where ServiceRequestId = $addressid1";

        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    public function Dasboard2($addressid1)
    {

        $sql  = " SELECT * FROM servicerequest JOIN useraddress ON servicerequest.AddressId = useraddress.AddressId  where ServiceRequestId = $addressid1";

        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function ServiceRequestModal($addressid1)
    {

        $sql  = " SELECT * FROM servicerequest JOIN useraddress ON servicerequest.AddressId = useraddress.AddressId 
        JOIN user ON servicerequest.UserId = user.UserId
        where ServiceRequestId = $addressid1";

        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }



 public function DashUpdate($array)
    {
        $sql = "UPDATE servicerequest SET ServiceStartDate = :ServiceStartDate , Tim = :Tim WHERE ServiceRequestId = :ServiceRequestId";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
        return ($result);

    }

 public function DashDelete($array)
    {
        $sql = "DELETE from servicerequest WHERE ServiceRequestId = :ServiceRequestId";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
        return ($result);

    }



    public function ServiceRequest($array)
    {
        $sql = "INSERT INTO servicerequest(UserId,ServiceStartDate, ZipCode, ServiceFrequency,  ServiceHourlyRate, ServiceHours, ExtraHours, SubTotal, Discount, TotalCost, Comments,TotalHours, TotalBed, TotalBath, EffectiveCost, ExtraServices, PaymentDue, HasPets, Status, CreatedDate, PaymentDone, RecordVersion, Tim, Total_Time, AddressId) 
            VALUES (:userid,:createddate , :zipcode,:servicefrequency,:servicehourlyrate ,:servicehours, :extrahours ,:subtotal, :discount ,:totalcost, :comments, :totalhours, :totalbed, :totalbath, :effectivecost, :extraservices, :paymentdue, :pets,:status ,:servicedate , :paymentdone,:recordversion,:tim,:totalhours,:addressid)";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
       $addressid = $this->conn->lastInsertId();

        return $addressid;
    }

    public function GoingtoServiceProvider()
    {
        $sql = "SELECT * FROM `user` WHERE UserTypeId = 1";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function GoingCustomerMail($email)
    {
        $sql = "SELECT * FROM `user` WHERE Email = '$email'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function CustomerDetails($email)
    {
        $sql = "select * from user where Email = '$email'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


public function CustomerUpdateDetails($array)
    {
       $sql = "UPDATE user SET FirstName = :firstname , LastName = :lastname, Mobile = :mobile, Birth = :birth, Month = :month, Year = :year, LanguageId = :language WHERE Email = :email";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
 
    }

 public function DeleteAddress($array)
    {
        $sql = "DELETE from useraddress WHERE AddressId = :addressid";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
        return ($result);

    }

 public function EditCustomerDetails($array)
    {
        $sql = "UPDATE useraddress SET AddressLine1 = :street , AddressLine2 = :houseno, City = :location, PostalCode =:pincode, Mobile = :mobile  WHERE AddressId = :addressid";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
        return ($result);

    }

    public function ProviderSettingDetails($email)
    {
        $sql = "select * from user where Email = '$email'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function ProviderAddress($email)
    {
        $sql =  "SELECT * FROM useraddress WHERE Email = '$email'  ORDER BY AddressId DESC";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    public function UpdateServiceProviderAddress($array)
    {
        $sql = "INSERT INTO useraddress (UserId , AddressLine1   , AddressLine2 , City ,State,  PostalCode , Mobile , Email ,Type)
        VALUES (:userid , :street ,  :houseno  , :location ,:state , :pincode , :mobilenum , :email , :type)";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $count = $stmt->rowCount();
        return array($count);
    }

    public function UpdateServiceProviderAddress1($array)
    {
        $sql = "UPDATE `useraddress` SET `AddressLine1`= :street ,`AddressLine2`= :houseno,`City`=:location,`State`= :state ,`PostalCode`= :pincode ,`Mobile`=:mobilenum WHERE `Email` = :email ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $count = $stmt->rowCount();
        return array($count);
    }

    public function UpdateSP($array)
    {
        $sql = "UPDATE `user` SET `FirstName`= :fistname,`LastName`=:lastname,`Mobile`=:mobile,`UserProfilePicture`= :avtarimg,`Gender`= :gender,`ZipCode`= :pincode,`NationalityId` = :nationallity,`DateOfBirth`= :birthdate,`ModifiedDate`=:modifieddate,`ModifiedBy`=:modifiedby WHERE `Email`=:email";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $count = $stmt->rowCount();
        return array($count);
    }

    public function CustomerRating($array)
    {
        $sql = "INSERT INTO rating (ServiceRequestId , RatingFrom   , RatingTo , Ratings ,Comments,  RatingDate , IsApproved , OnTimeArrival ,Friendly, QualityOfService)
        VALUES (:ServiceRequestId , :username ,  :provider_name  , :avg ,:feedback , :date1 , :completed , :gender , :rates, :rate1)";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $count = $stmt->rowCount();
        return array($count);
    }


 public function NewServiceRequestAccept($array)
    {
        $sql = "UPDATE servicerequest SET Status = :status, Provider_Name = :Provider_name WHERE ServiceRequestId = :ServiceRequestId";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
        return ($result);

    }


    public function ServiceProviderHistory($Provider_name)
    {

        $sql  = " SELECT * FROM servicerequest 
        JOIN useraddress
        ON servicerequest.AddressId = useraddress.AddressId
        JOIN user
        ON servicerequest.UserId = user.UserId
        where servicerequest.Status = 2 AND servicerequest.Provider_Name = $Provider_name";

        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    public function BlockCustomer($Provider_name)
    {

        $sql  = " SELECT * FROM servicerequest 
        JOIN useraddress
        ON servicerequest.AddressId = useraddress.AddressId
        JOIN user
        ON servicerequest.UserId = user.UserId
        JOIN favoriteandblocked ON favoriteandblocked.TargetUserId = servicerequest.UserId
        where servicerequest.Status = 2 AND servicerequest.Provider_Name = $Provider_name GROUP BY user.UserId";

        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    public function UpcomingTable($Provideer_name)
    {

        $sql  = " SELECT * FROM servicerequest 
        JOIN useraddress
        ON servicerequest.AddressId = useraddress.AddressId
        JOIN user
        ON servicerequest.UserId = user.UserId
        where servicerequest.Status = 1 AND servicerequest.Provider_Name = $Provideer_name";

        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function UpcomingTableConflict($Provider_name)
    {

        $sql  = " SELECT servicerequest.ServiceStartDate, servicerequest.Tim, servicerequest.TotalHours FROM servicerequest 
        where servicerequest.Status = 1 AND servicerequest.Provider_Name = $Provider_name";

        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

 public function UpcomingRequestComplete($array)
    {
        $sql = "UPDATE servicerequest SET Status = :status WHERE ServiceRequestId = :ServiceRequestId";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
        return ($result);

    }

 public function UpcomingRequestCancel($array)
    {
        $sql = "UPDATE servicerequest SET Status = :status WHERE ServiceRequestId = :ServiceRequestId";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
        return ($result);

    }


    public function BlockCustomerRequest($array)
    {
        $sql = "INSERT INTO favoriteandblocked (UserId , TargetUserId , IsBlocked)
        VALUES (:Provider_name , :userid , :IsBlocked)";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
        $count = $stmt->rowCount();
        return ($result);
    }

    public function CheckBlock($userid)
    {
        $sql = "SELECT * from favoriteandblocked where TargetUserId = $userid";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        $block = $row['IsBlocked'];

        return array($block);
    }

}   

