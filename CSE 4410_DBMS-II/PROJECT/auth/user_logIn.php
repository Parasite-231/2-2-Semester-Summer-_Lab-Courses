<?php
     session_start();

     if(isset($_SESSION['userID'])){
       //header("location: http://localhost/dbms/User/php%20files/userHomepage.php");
     }
    if(isset($_POST["submit"])){

        $userEmail = $_POST['email'];
        $password = $_POST['password'];

        require_once '../connect/db_connect.php';
        require_once 'functions/functionsForUser.php';

        if(emptyInputLogIn($userEmail, $password) !== false){
            header("location:user_login.php?error=emptyinput");
            exit();
        }
        if(logIN_password_match($password,$userEmail)===false){
            header("location:user_login.php?error=wrongInput");
            exit();
        }
        loginAdmin($userEmail, $password);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="shortcut icon" type="image/x-icon" href="images/train.png">
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
            <img src="images/tnl0.jpg" alt="login image" class="login-img">
          </div>
        <div class="col-sm-5 login-section-wrapper">
          <div class="brand-wrapper">
            <img src="images/images1.png" width="70px" height="150px" balt="logo" class="logo">
            <h3>Welcome to Mugen Train</h3>
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Log in</h1>
            <form action="user_logIn.php" method="POST">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email">
                
                <!--start error message-->

                <!-- <p style="font-weight: lighter;color: red;">
                  <img src="../../ICONS/er.png" height="25px" width="25px">
                  Please enter a valid email</p> -->

                <!--end of error message-->
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password">

                <!--start error message-->
<!-- 
                <p style="font-weight: lighter;color: red;">
                  <img src="../../ICONS/er.png" height="25px" width="25px">
                  Password must contain at least 6 character numeric letter (0-9) or alphabet (A-Z or a-z)</p> -->
                  
                <!--end of error message-->
              </div>
              <input name="submit" id="login" class="btn btn-block login-btn" type="submit" value="Login">
            </form>
            <?php
    //     if (isset($_GET["error"])) {
    //         if ($_GET['error'] == "wrongInput") {
    //             echo "<p>Invalid Password </p>";
    //         }
        
    //     if ($_GET['error'] == "wronglogin") {
    //         echo "<p>Invalid user email </p>";
    //     }
    // }
        ?>
            <a href="UserResetPassword.html" class="forgot-password-link" >Forgot password?</a>
            <p class="login-wrapper-footer-text">Don't have an account? <a href="user_register.php" class="text-reset">Register here</a></p>
          </div>
        </div>
      
      </div>
    </div>
  </main>
</body>
</html>