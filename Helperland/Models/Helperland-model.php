
<?php

class Helperland {

 /* Creates database connection */

public function __construct() {
  try {            
       $dsn = 'mysql:dbname=Helperland;host=localhost';
       $username = 'root';
       $password = '';
       $this-> conn = new PDO($dsn, $username, $password);
       } catch (PDOException $e) {
            echo $e->getMessage();
       }

  }    


public function Contactus($array)
   {
    $sql = "INSERT INTO contactus (Name , Email , Subject , PhoneNumber , Message , CreatedOn , Status , Priority )
      VALUES (:name ,  :email , :subject , :mobile , :message , :creationdt , :status , :priority )";
    $stmt =  $this->conn->prepare($sql);
    $result = $stmt->execute($array);
        
    if ($result) {
    $_SESSION['status_msg'] = "Message Has Been Sent Succesfully";
    $_SESSION['status_txt'] = "";
    $_SESSION['status'] = "success";
   
    } else {
    $_SESSION['status_msg'] = "Your Message is not Sent Please Try Again.";
    $_SESSION['status_txt'] = "";
    $_SESSION['status'] = "alert";
    }
 
    return array($_SESSION['status_msg'], $_SESSION['status_txt'], $_SESSION['status']);
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

}   