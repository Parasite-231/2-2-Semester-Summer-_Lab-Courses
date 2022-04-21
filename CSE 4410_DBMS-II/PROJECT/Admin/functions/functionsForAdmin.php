<?php
    include("../../connect/db_connect.php");

    function emptyInputCheck($TNAME){

        if( empty($TNAME)){
            return true;
        }
        else return false;

    }

    function createTrain($TNAME){
        include("../../connect/db_connect.php");
        $sql="INSERT INTO TRAINS (TNAME) VALUES ('$TNAME')";
        $stid = oci_parse($conn, $sql);
        $r = oci_execute($stid);
        if (!$r) {
        $m = oci_error($stid); 
        trigger_error('Could not execute statement: '. $m['message'] , E_USER_ERROR);
                header("location:create_train.php?error=stmtfailed");
        exit();
    }
    }
    function createBlock($BNAME, $TID, $TOTAL_SEATS, $CLASS, $FARE){
        include("../../connect/db_connect.php");
        $sql="INSERT INTO  BLOCKS(B_NAME, TID, TOTAL_SEATS, CLASS, FARE) VALUES ('$BNAME', $TID, '$TOTAL_SEATS', '$CLASS', '$FARE')";
        $stid = oci_parse($conn, $sql);
        $r = oci_execute($stid);
        if (!$r) {
        $m = oci_error($stid); 
        trigger_error('Could not execute statement: '. $m['message'] , E_USER_ERROR);
                header("location:create_block.php?error=stmtfailed");
        exit();
    }
    }
    function createSeat($BID, $TID, $CLASS){
        include("../../connect/db_connect.php");
        
        $sql="SELECT TOTAL_SEATS FROM BLOCKS WHERE BID=$BID AND TID=$TID AND CLASS='$CLASS'";        
        
        $stid = oci_parse($conn, $sql);
        $r= oci_execute($stid);
        if (!$r) {
            $m = oci_error($stid); 
            trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
                    header("location:create_seat.php?error=stmtfailed");
            exit();
        }
        if($row= oci_fetch_assoc($stid)){
            $TOTAL_SEATS=$row['TOTAL_SEATS'];
            
            for($i=1; $i<=$TOTAL_SEATS; $i++){
                
                $sql2="INSERT INTO SEATS (SEAT_NUM, TID, BID, CLASS) VALUES($i, $TID, $BID, '$CLASS' )";
                
                $stid2 = oci_parse($conn, $sql2);
                $r2 =oci_execute($stid2);
                
                if (!$r2) {
                    $m = oci_error($stid2); 
                    trigger_error('Could not execute statement: '. $m['message'] , E_USER_ERROR);
                            header("location:create_seat.php?error=stmtfailed");
                    exit();
                }   
            }
        }
        $sql3= "SELECT TOTAL_SEATS, TOTAL_BLOCKS FROM TRAINS WHERE TID=$TID";
        
        $stid3 = oci_parse($conn, $sql3);
        $r3= oci_execute($stid3);
        $row3=oci_fetch_assoc($stid3);

        if (!$r3) {
            $m = oci_error($stid3); 
            trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
                    header("location:create_seat.php?error=stmtfailed");
            exit(); 
        }
        $current_seats=$row3['TOTAL_SEATS'];
        $current_blocks=$row3['TOTAL_BLOCKS'];

        $sql4="UPDATE TRAINS SET TOTAL_SEATS=$current_seats+$TOTAL_SEATS, TOTAL_BLOCKS=$current_blocks+1 WHERE TID=$TID";   
        
        $stid4 = oci_parse($conn, $sql4);
        $r4= oci_execute($stid4);
        if (!$r4) {
            $m = oci_error($stid4); 
            trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
                    header("location:create_seat.php?error=stmtfailed");
            exit();    
        }
    }
    function createAdmin($email){
        include("../../connect/db_connect.php");
        $sql="UPDATE USERS SET ISADMIN=1 WHERE EMAIL='$email'";
        $stid = oci_parse($conn, $sql);
        $r = oci_execute($stid);
        if (!$r) {
        $m = oci_error($stid); 
        trigger_error('Could not execute statement: '. $m['message'] , E_USER_ERROR);
                header("location:create_admin.php?error=stmtfailed");
        exit();
        }
    }

    function createRoute($SOURCE, $DEST, $FARE){
        include("../../connect/db_connect.php");
        $sql="INSERT INTO ROUTES (SOURCE, DEST, FARE) VALUES ('$SOURCE', '$DEST', $FARE)";
        $stid = oci_parse($conn, $sql);
        $r = oci_execute($stid);
        if (!$r) {
        $m = oci_error($stid); 
        trigger_error('Could not execute statement: '. $m['message'] , E_USER_ERROR);
                header("location:create_route.php?error=stmtfailed");
        exit();
        }

    }
?>