<?php
require '../../connect/db_connect.php';


function searchTrain($source, $dest, $class){
    require '../../connect/db_connect.php';
    $sql = "SELECT ROUTE_ID FROM ROUTES WHERE SOURCE = '$source' AND DEST = '$dest' ";
    $stid = oci_parse($conn, $sql);
    $r = oci_execute($stid);
    if (!$r) {
        $m = oci_error($stid); 
        trigger_error('Could not execute statement: '. $m['message'] . "  ". $dob, E_USER_ERROR);
                header("location:user_register.php?error=stmtfailed");
        exit();
    }

    $row = oci_fetch_assoc($stid);
    $rid = $row['ROUTE_ID'];

    $sql2 = "SELECT * FROM ROUTE_TRAIN_JUNCTION WHERE ROUTE_ID = $rid ";
    $stid2 = oci_parse($conn, $sql2);
    $r = oci_execute($stid);
    if (!$r) {
        $m = oci_error($stid); 
        trigger_error('Could not execute statement: '. $m['message'] . "  ". $dob, E_USER_ERROR);
                header("location:user_register.php?error=stmtfailed");
        exit();
    }
    return $stid2; 
}