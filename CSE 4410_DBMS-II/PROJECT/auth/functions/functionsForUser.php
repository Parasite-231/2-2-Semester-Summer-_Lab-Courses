<?php
    include("../connect/db_connect.php");


function emptyInputSignup($username, $email, $mobile , $password, $cpassword, $dob){

    if( empty($username) || empty($email) || empty($mobile) ||empty($password) || empty($cpassword) || empty($dob)  ){
        return true;
    }
    else return false;

}

function emptyInputLogIn($userid, $password){

    if(empty($userid) || empty($password) ){
        return true;
    }
    else return false;
}

function userMobileorEmailExists($mobile,$email){
    
    include("../connect/db_connect.php");
    
    $sql="SELECT * FROM users WHERE email= '$email' OR mobile='$mobile'";
    // $stmt=mysqli_stmt_init($conn);

    $stid = oci_parse($conn, $sql);

   oci_execute($stid);
    // if (!$r) {
    //     $m = oci_error($stid); 
    //     trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
    //             header("location:admin_register.php?error=stmtfailed");
    //     exit();
    // }
    
    // if(!mysqli_stmt_prepare($stmt,$sql)){
    //     header("location:admin_register.php?error=stmtfailed");
    //     exit();
    // }
    // mysqli_stmt_bind_param($stmt,"ss",$mobile,$email);
    // mysqli_stmt_execute($stmt);

    //$resultData=mysqli_stmt_get_result($stmt);

    if($row= oci_fetch_assoc($stid)){
        return $row;
    }
    else{
        return false;
    }
    //mysqli_stmt_close($stmt);
}

function invalidEmail($email){

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else return false;
}
function passwordMatch($password, $cpassword){

    if($password!==$cpassword){
        return true;
    }
    else return false;
}

function codeMatch($code){

    if($code!=="peranaichill"){
        return true;
    }
    else return false;
}
function createUser( $username, $email, $mobile, $dob, $password){
    include("../connect/db_connect.php");


    $hashedPassword= password_hash($password, PASSWORD_DEFAULT);
    $sql="INSERT INTO users(username, email, mobile, dob, password) VALUES('$username', '$email', '$mobile', TO_DATE('$dob', 'YYYY-MM-DD'),
         '$hashedPassword') ";
    //$stmt=mysqli_stmt_init($conn);
    $stid = oci_parse($conn, $sql);
    $r = oci_execute($stid);
    if (!$r) {
        $m = oci_error($stid); 
        trigger_error('Could not execute statement: '. $m['message'] . "  ". $dob, E_USER_ERROR);
                header("location:user_register.php?error=stmtfailed");
        exit();
    }

    // if(!mysqli_stmt_prepare($stmt,$sql)){
    //     header("location:admin_register.php?error=stmtfailed");
    //     exit();
    // }
    
    // $hashedPassword= password_hash($password, PASSWORD_DEFAULT);

    // mysqli_stmt_bind_param($stmt,"ssss", $username, $email, $mobile_no, $hashedPassword);
    // mysqli_stmt_execute($stmt);
    // mysqli_stmt_close($stmt);
    header("location:user_register.php?error=none");
    exit();
  
}
function logIN_password_match($password,$useremail):bool{
    include("../connect/db_connect.php");
    $userEmailExists=userMobileorEmailExists($useremail,$useremail);
    if($userEmailExists=== false){
        header("location:user_logIn.php?error=wronglogin");
        exit();
    }
    $pwdHashed= $userEmailExists["PASSWORD"];

    $checkpwd= password_verify($password,$pwdHashed);

    if($checkpwd === false){
        return false;
    }
    else if($checkpwd === true){
        return true;
    }

}
function loginAdmin($useremail, $password){
    include("../connect/db_connect.php");
    $userEmailExists=userMobileorEmailExists($useremail,$useremail);
    if($userEmailExists=== false){
        header("location:user_logIn.php?error=wronglogin");
        exit();
    }
    $pwdHashed= $userEmailExists["PASSWORD"];
    $checkpwd= password_verify($password,$pwdHashed);

    if($checkpwd === false){
        header("location :user_logIn.php?error=wronglogin");
    }
    else if($checkpwd === true){
        session_start();
        $_SESSION['userEmail'] = $userEmailExists["EMAIL"];
        $_SESSION['userID'] = $userEmailExists["ID"];
        $_SESSION['isAdmin'] = $userEmailExists["ISADMIN"];
        if($_SESSION['isAdmin'] == 1){
            header("location: http://localhost/dbms/Admin/php/admin_panel.php");
            exit();
        }

        header("location: http://localhost/dbms/User/php%20files/userHomepage.php");
        exit();
    }
}



?>