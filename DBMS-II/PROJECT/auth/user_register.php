<?php
    $username=$email=$mobile_no=$password=$cpassword="";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $dob=$_POST['dob'];
    require_once '../connect/db_connect.php';
    require_once 'functions/functionsForUser.php';

    if (emptyInputSignup($username, $email, $mobile_no, $password, $cpassword, $dob) !== false) {
        header("location:user_register.php?error=emptyinput");
        exit();
    }
    if (userMobileorEmailExists($mobile_no, $email) !== false) {
        header("location:user_register.php?error=duplicateEmailorMobile");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location:user_register.php?error=invalidEmail");
        exit();
    }
    if (passwordMatch($password, $cpassword) !== false) {
        header("location:user_register.php?error=passwordDontMatch");
        exit();
    }

    createUser($username, $email, $mobile_no, $dob, $password);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registration</title>
  <link rel="shortcut icon" type="image/x-icon" href="images/train2.png">
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/UserSignInDesign.css">
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-7 px-0 d-none d-sm-block">
            <img src="images/register1.jpg" alt="login image" class="login-img">
          </div>
        <div class="col-sm-5 login-section-wrapper">
          <div class="brand-wrapper">
            <!-- <img src="images1.png" width="70px" height="150px" balt="logo" class="logo"> -->
            <!-- <h3>Welcome to Mugen Train</h3> -->
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Registration </h1>
            <form action="user_register.php" method="post">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your Username">
                
               
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email">
                
               
              </div>
              <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <input type="mobile" name="mobile" id="mobile" class="form-control" placeholder="Enter your Mobile Number">
                
               
              </div>
              <div class="form-group">
                <label for="mobile">Date of Birth</label>
                <input type="date" name="dob" id="dob" class="form-control" placeholder="Enter Date of Birth">
                
               
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password">


              </div>
              <div class="form-group mb-4">
                <label for="password">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Re-type your Password">


              </div>
              <input name="submit" id="register" class="btn btn-block login-btn" type="submit" value="Register">
            </form>
            <!-- <a href="UserResetPassword.html" class="forgot-password-link" >Forgot password?</a> -->
            <p class="login-wrapper-footer-text">Already have an account? <a href="user_logIn.php" class="text-reset">Login here</a></p>
            <?php
        if (isset($_GET["error"])) {
            if ($_GET['error'] == "emptyinput") {
                echo "<p>fill in all fields </p>";
            }
            if ($_GET['error'] == "invalidEmail") {
                echo "<p>Invalid Email </p>";
            }
            if ($_GET['error'] == "duplicateEmailorMobile") {
                echo "<p>Already Exists</p>";
            }
            if ($_GET['error'] == "passwordDontMatch") {
                echo "<p>Password don't match </p>";
            }
            if ($_GET['error'] == "invalidCode") {
                echo "<p>Wrong Code</p>";
            }
        }

        ?>
          </div>
        </div>
      
      </div>
    </div>
  </main>
</body>
</html>