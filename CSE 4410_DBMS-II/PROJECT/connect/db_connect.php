

<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$dbusername = "super";                  // Use your username
$dbpassword = "123";             // and your password
$database = "localhost:1523/orcl";   // and the connect string to connect to your database

// $query = "select * from admin";

$conn = oci_connect($dbusername, $dbpassword, $database);
if (!$conn) {
    $m = oci_error();
    trigger_error('Could not connect to database: '. $m['message'], E_USER_ERROR);
}