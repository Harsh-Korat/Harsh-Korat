
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
        $username = $row['FirstName'];
        $resetkey = $row['ResetKey'];
        $count = $stmt->rowCount();
        return array($username, $resetkey, $count);
    }

 public function ResetPass($array)
    {
        $sql = "UPDATE user SET Password = :password , ModifiedDate = :updatedate , ModifiedBy = :modifiedby WHERE ResetKey = :resetkey";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
        if ($result) {
            $_SESSION['message'] = "Password Updated Successfully";
        } else {
            $_SESSION['message'] = "Password Not Updated. Please Try Again. ";
        }
        return array($_SESSION['message']);
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


}   
