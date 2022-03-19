<!DOCTYPE html>
<html lang="en">
<head>
   
      <title>Customer SignUp</title>
      <link rel="stylesheet" href="../assets/css/signup-customer.css">
      <link rel="stylesheet" href="../assets/css/validation.css">
      <link rel="stylesheet" href="../assets/css/footers.css">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<header>
  
<?php include('./nav.php'); ?> 
 
 </header>

<!-- Register Table -->

<div class="account">Create an account</div>
  <div class="container">
    <div class="sepretor-bg">
      <img src="../assets/image/separator.png" class="sepretor">
    </div>
  </div>

<!-- Register Table -->
<div class="container">
 <div class="form-start">
   <form method="POST">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname" autocomplete="off" required>
        <div class="first-name-msg mb-2"></div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
       <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname" autocomplete="off" required>
       <div class="last-name-msg mb-2"></div> 
     </div>
    </div>

    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <input type="email" class="form-control" id="email" placeholder="E-mail address" name="email" autocomplete="off" required>
       <div class="email-msg float-left mb-2"></div>
       <div class="error-email float-right mb-2"></div>  
      </div>

      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="input-group" id="number">
          <span class="input-group-text">+49</span>
          <input type="text" class="form-control" id="mobilenum" placeholder="Mobile number" name="mobile" autocomplete="off" maxlength="10" required>
      </div>
          <div class="mobile-msg mb-2 mt-3"></div>
     </div>
    </div>

    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <input type="Password" class="form-control" id="password" placeholder="Password" name="password" required>
        <div class="password-msg"></div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <input type="Password" class="form-control" id="cpassword" placeholder="Confirm Password" name="confirm_password" required>
        <div class="cpassword-msg"></div>
      </div>
    </div>

    <div class="checkbox">  
      <input type="checkbox" name="check" class="condition">
      <label> I have read the <a href="#" class="login-btn">privacy policy</a></label><br>
    </div>
    <div class="condition_err text-danger mb-2"></div>

    <div class="form-row register mt-4">
      <button type="submit" class="btn register-bttn customer-register">Register</button>
    </div>
   </form>
 </div>
</div>

<div class="login-now mt-3"><p>Already registered?  <a href="./index.php" class="login-btn">Login Now</a></p></div>



<!-- Footer Section -->

<?php include('./Footer.php'); ?>


    <script src="../assets/js/Signup.js"></script>

</body>
</html>