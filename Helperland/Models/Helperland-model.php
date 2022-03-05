
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
    

    public function Dasboard($email)
    {

        $sql  = " SELECT
        servicerequest.ServiceStartDate, servicerequest.SubTotal ,servicerequest.ServiceRequestId,servicerequest.Tim,servicerequest.Provider_name,user.UserId
          FROM servicerequest 
        JOIN user
        ON servicerequest.UserId = user.UserId  where user.Email = '$email'";

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
        $sql = "INSERT INTO servicerequest(UserId,ServiceStartDate, ZipCode, ServiceFrequency,  ServiceHourlyRate, ServiceHours, ExtraHours, SubTotal, Discount, TotalCost, Comments,TotalHours, TotalBed, TotalBath, EffectiveCost, ExtraServices,  PaymentDue, HasPets, Status, CreatedDate, PaymentDone, RecordVersion, Tim) 
            VALUES (:userid,:createddate , :zipcode,:servicefrequency,:servicehourlyrate ,:servicehours, :extrahours ,:subtotal, :discount ,:totalcost, :comments, :totalhours, :totalbed, :totalbath, :effectivecost, :extraservices, :paymentdue, :pets,:status ,:servicedate , :paymentdone,:recordversion,:tim)";
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
        $sql = "UPDATE user SET AddressLine1 = :street , AddressLine2 = :houseno, City :location, PostalCode :pincode, Mobile :mobile  WHERE AddressId = :addressid";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
        return ($result);

    }


}   

