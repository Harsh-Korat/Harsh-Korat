
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
        $base_url = "http://localhost/Helperland/#LoginModal";
        $customer = "http://localhost/Helperland/Views/Customer-Servicehistory";
        $sp = "http://localhost/Helperland/Views/ServiceProviderUpcomingService";

        $sql = "select * from user where Email = '$email'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        $usertypeid = $row['UserTypeId'];
        $Password = $row['Password'];
        if ($count == 1) {
            if (password_verify($password, $Password)) {
                if ($usertypeid == 0) {
                    $_SESSION['username'] = $email;
                    header('Location:' . $customer);
                    
                } else if ($usertypeid == 1) {
                    $_SESSION['username'] = $email;
                    header('Location:' . $sp);
                }
            } else {
                $_SESSION['msg'] = "Password Invalid.  Please Enter Valid Password.";

                header('Location:' . $base_url);
            }
        } else {
            $_SESSION['msg'] = "User does not exists.  Please Enter Valid User Name.";

            header('Location:' . $base_url);
        }
    }


    public function Login1($email, $password)
    {
        $base_url = "http://localhost/Helperland/#LoginModal";
        $customer = "http://localhost/Helperland/Views/book-service.php";
        $sp = "http://localhost/Helperland/Views/book-service.php";

        $sql = "select * from user where Email = '$email'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        $usertypeid = $row['UserTypeId'];
        $Password = $row['Password'];
        if ($count == 1) {
            if (password_verify($password, $Password)) {
                if ($usertypeid == 0) {
                    $_SESSION['username'] = $email;
                    header('Location:' . $customer);
                    
                } else if ($usertypeid == 1) {
                    $_SESSION['username'] = $email;
                    header('Location:' . $sp);
                }
            } else {
                $_SESSION['msg'] = "Password Invalid.  Please Enter Valid Password.";

                header('Location:' . $base_url);
            }
        } else {
            $_SESSION['msg'] = "User does not exists.  Please Enter Valid User Name.";

            header('Location:' . $base_url);
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



    public function Postal($postal)
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
    


    public function SelectedAddress($addressid)
    {
        $sql =   "SELECT * FROM `useraddress` WHERE `AddressId` = $addressid";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function AddService($array)
    {
        $sql = "INSERT INTO servicerequest ( `UserId`, `ServiceStartDate`, `ServiceTime`, `ZipCode`,  `ServiceHourlyRate`, `ServiceHours`, `ExtraHours`, `TotalHours`, `TotalBed`, `TotalBath`, `SubTotal`, `Discount`, `TotalCost`, `EffectiveCost`, `ExtraServices`, `Comments`, `AddressId`, `PaymentTransactionRefNo`, `PaymentDue`, `HasPets`, `Status`, `CreatedDate`,  `PaymentDone`, `RecordVersion`)
     VALUES (:userid ,:servicedate ,:servicetime, :zipcode,:servicehourlyrate ,:servicehours, :extrahours , :totalhours, :totalbed , :totalbath, :subtotal, :discount, :totalcost , :effectivecost, :extraservices, :comments, :addressid, :paymentrefno, :paymentdue, :pets,:status ,:createddate , :paymentdone, :recordversion)
     ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $addressid = $this->conn->lastInsertId();

        return $addressid;
    }

    public function ActiveServiceProvider()
    {
        $sql = 'SELECT * FROM `user` WHERE UserTypeId = 1 AND `IsActive`="Yes"';
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function UsersServiceprovider($id)
    {
        $idresult = array();
        foreach($id as $array){
            $sql = "SELECT Email FROM `user` WHERE UserId = {$array}";
            $stmt =  $this->conn->prepare($sql);
            $stmt->execute();
            $result  = $stmt->fetch(PDO::FETCH_ASSOC);
            array_push($idresult,$result);
        }
        return $idresult;
    }


}   
