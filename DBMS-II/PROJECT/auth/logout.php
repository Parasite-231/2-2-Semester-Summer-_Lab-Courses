<?php

session_start();
if(isset($_SESSION['userID'])){
    unset($_SESSION['userID']);
}
// session_unset();
// session_destroy();
if(isset($_SESSION['userEmail'])){
    unset($_SESSION['userEmail']);
}

if(isset($_SESSION['isAdmin'])){
    unset($_SESSION['isAdmin']);
}
header("location: http://localhost/dbms/User/php%20files/userHomepage.php");
die;

?>