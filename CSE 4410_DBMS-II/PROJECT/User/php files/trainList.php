<?php
session_start();

$display = '';
$else = "display:none;";
if(isset($_SESSION['userID'])){
    $uid = $_SESSION['userID'];
    $display = "display:none;";
    $else = '';
}else{
    header("location: ../../userHomepage.php");
}


?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <link rel="shortcut icon" type="image/x-icon" href="../../Images/train.png">
        <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!--         
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css"> -->
        <!-- <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css"> -->
        <!-- <link rel="stylesheet" href="css/owl-carousel.css"> -->
        <!-- <link rel="stylesheet" href="css/datepicker.css"> -->
        <link rel="stylesheet" href="../CSS files/additional.css">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <title>Train List</title>
        <link href="../CSS files/PHomepage Design.css" rel="stylesheet">
    </head>
    <body>
      
        <main>
            <header class="p-3 bg-white text-white  fixed-top">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center  justify-content-lg-start">
                        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                        <img src="../../Images/images1.png" height="60px" alt="">
                        </a>
                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                            <li>
                                <a href="userHomepage.php" class="nav-link px-2 link-secondary">
                                    <h3 style="font-weight: light;">Mugen Train</h3>
                                </a>
                            </li>
                        </ul>
                        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                            <!-- <p style="font-weight: bold;"><a class="btn btn-warning" href="#"></a> -->
                            <a style="<?php echo $else ?>" class="btn btn-warning" href="buyTicket.php">Buy Ticket</a>
                            <a style="<?php echo $else ?>" class="btn btn-warning" href="myTickets.php">My Ticket</a>
                            <a style="<?php echo $else ?>" class="btn btn-warning" href="../../auth/logout.php">Log out</a>
                            <a style="<?php echo $display ?>" class="btn btn-warning" href="../../auth/user_logIn.php">Log in</a>
                                <a style="<?php echo $display ?>" class="btn btn-warning" href="../../auth/user_register.php">Register</a>

                            </p>
                        </form>
                    </div>
                </div>
            </header>
            <hr >
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" >
                        <img src="../../Images/ii.webp" class="d-block w-100 bg-dark" width="100%" height="100%" >
                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1>Welcome to our Platform</h1>
                                <p>Thanks for visiting our site let us help you</p>
                                <p><a class="btn btn-lg btn-dark" href="#">Welcome</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../../Images/tnl3.jpg" class="d-block w-100 " width="100%" height="100%" >
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Buy Online Tickets</h1>
                                <p>Book Tickets now! </p>
                                <p><a class="btn btn-lg btn-dark" href="#">Join us</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../../Images/tnl5.jpg" class="d-block w-100 bg-dark" width="100%" height="100%" >
                        <div class="container">
                            <div class="carousel-caption text-end">
                                <h1>Get News</h1>
                                <p>Get News on available Train</p>
                                <p><a class="btn btn-lg btn-dark" href="#">Thankyou</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!--Health Services-->
            <div class="container marketing">
                <h1 style="text-align: center;font-weight: lighter;">Available Train List</h1>
                <!-- Three columns of text below the carousel -->
                <div class="row" style="margin-top: 42px;">
                    <div class="col-md-8 col-md-offset-1">

                    <div class="card" style="margin-top: 20px;">
                            <div class="card-header">
                              <img src="../../Images/timer.png" width="50" height="40" alt="">
                              <img src="../../Images/traina.png" width="50" height="40" style="float: right ;"  alt="">
                            </div>
                            <div class="card-body">
                                <!--table starts-->

                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th scope="col" style="background-color: aqua">Train Information</th>
                                        <th scope="col" style="background-color: aqua;">From</th>
                                        <th scope="col" style="background-color: aqua;">To</th>
                                        <th scope="col" style="background-color: aqua;">Departure Time</th>
                                        <th scope="col" style="background-color: aqua;">Seats Available</th>
                                        <th scope="col" style="background-color: aqua;">Ticket Price</th>
                                        <th scope="col" style="background-color: aqua;">Confirm Purchase</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">PARABAT EXPRESS (709) [F_SEAT]</th>
                                        <td>Dhaka</td>
                                        <td>Chittagong</td>
                                        <td>06:20 AM</td>
                                        <td>10</td>
                                        <td>Tk 550</td>

                                        <td> <a href="#" class="btn btn-danger" style="float: right;font-size: 14px;">Buy Ticket</a></td>
                                      </tr>
                                      
                                    </tbody>
                                  </table>
                                  <!--table ends-->
                               
                            
                            </div>
                        </div>
                        <?php

                            require '../functions/userFunctions.php';
                            require '../../connect/db_connect.php';
                            $source = $_SESSION['source'];
                            $dest = $_SESSION['dest'];
                            $class = $_SESSION['class'];
                            $date = $_SESSION['date'];

                            $sql5 = "SELECT ROUTE_ID, FARE FROM ROUTES WHERE SOURCE = '$source' AND DEST = '$dest' ";
                            $stid5 = oci_parse($conn, $sql5);
                            oci_execute($stid5);

                            $row = oci_fetch_assoc($stid5);
                            $rid = $row['ROUTE_ID'];
                            $rFare = $row['FARE'];

                            $sql6 = "SELECT * FROM ROUTE_TRAIN_JUNCTION WHERE ROUTE_ID = $rid ";
                            $stid6 = oci_parse($conn, $sql6);
                            oci_execute($stid6);
                            
                        while($row = oci_fetch_assoc($stid6)){
                            $tid = $row['TID'];
                            $arrival = $row['ARRIVAL_TIME'];
                            $departure = $row['DEPARTURE_TIME'];

                            $query = "SELECT TNAME FROM TRAINS WHERE TID = $tid ";
                            $st = oci_parse($conn, $query);
                            oci_execute($st);
                            $tndata = oci_fetch_assoc($st);
                            $train_name=$tndata['TNAME'];
                            
                            $sql1 = "SELECT COUNT(TICKET_ID) AS SOLD FROM TICKETS WHERE TRAIN_ID = $tid AND TRAVEL_DATE = TO_DATE('$date', 'YYYY-MM-DD') AND CLASS = '$class'" ;
                            $stid1 = oci_parse($conn, $sql1);
                            oci_execute($stid1);
                            $row = oci_fetch_assoc($stid1);
                            $seatSold = $row['SOLD'];
                            //$train_name = $row['TRAIN_NAME'];

                            $sql2= "SELECT COUNT(BID) AS CBID FROM BLOCKS WHERE TID = $tid and CLASS = '$class' ";
                            $stid2 = oci_parse($conn, $sql2);
                            oci_execute($stid2);
                            $data = oci_fetch_assoc($stid2);
                            $totalBlocks = $data['CBID'];
                            //$bFare = $data['FARE'];

                            if($totalBlocks>0){
                                $query1 = "SELECT FARE FROM BLOCKS WHERE TID = $tid AND CLASS = '$class' ";
                                $st1 = oci_parse($conn, $query1);
                                oci_execute($st1);
                                $bndata = oci_fetch_assoc($st1);
                                $bFare=$bndata['FARE'];
                            }

                            // echo "train ".$tid;
                            // echo "class ".$class;
                            // echo "bl ".$totalBlocks;
                            // echo "sold ".$seatSold;
                            // echo $date;

                            $total_fare = $bFare + $rFare;
                            $availableSeats = $totalBlocks*30 - $seatSold;
                            //echo "seats ".$availableSeats;

                            

                            $diable = 'display:none;';
                            if($availableSeats > 0){
                                $sql3 = "SELECT * FROM (SELECT SID, SEAT_NUM, BID FROM SEATS WHERE CLASS = '$class' AND 
                                        SID NOT IN 
                                        (SELECT SID FROM TICKETS WHERE TRAIN_ID = $tid AND TRAVEL_DATE = 
                                        TO_DATE('$date', 'YYYY-MM-DD') AND CLASS = '$class') ORDER BY SEAT_NUM )
                                        WHERE ROWNUM =1";
                                $stid3 = oci_parse($conn, $sql3);
                                oci_execute($stid3); 
                                $sqdt = oci_fetch_assoc($stid3);
                                $seatnum = $sqdt['SEAT_NUM'];
                                $sid = $sqdt['SID'];
                                $bid = $sqdt['BID'];

                                $sql9 = "SELECT B_NAME FROM BLOCKS WHERE BID = $bid ";
                                $stid9 = oci_parse($conn, $sql9);
                                oci_execute($stid9);
                                $bdata = oci_fetch_assoc($stid9);
                                $bname = $bdata['B_NAME'];


                                //echo $seatnum;
                                $disable  = '';

                            }
                            
                            $card = "
                            <div class='card' style='margin-top: 20px;'>
                            <div class='card-header'>
                            <img src='../../Images/timer.png' width='50' height='40' alt=''>
                            <img src='../../Images/traina.png' width='50' height='40' style='float: right ;'  alt=''>
                            </div>
                            <div class='card-body'>
                                <!--table starts-->

                                <table class='table table-bordered'>
                                    <thead>
                                    <tr>
                                        <th scope='col' style='background-color: aqua'>Train Information</th>
                                        <th scope='col' style='background-color: aqua;'>From</th>
                                        <th scope='col' style='background-color: aqua;'>To</th>
                                        <th scope='col' style='background-color: aqua;'>Departure Time</th>
                                        <th scope='col' style='background-color: aqua;'>Seats Available</th>
                                        <th scope='col' style='background-color: aqua;'>Ticket Price</th>
                                        <th scope='col' style='background-color: aqua;'>Confirm Purchase</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope='row'>".$train_name." [".$class."]</th>
                                        <td>".$source."</td>
                                        <td>".$dest."</td>
                                        <td>".$departure."</td>
                                        <td>".$availableSeats."</td>
                                        <td>".$total_fare."</td>
                                        <form method='POST'>
                                            <input type='hidden' name='tid' value='".$tid."'>
                                            <input type='hidden' name='uid' value='".$uid."'>
                                            <input type='hidden' name='rid' value='".$rid."'>
                                            <input type='hidden' name='date' value='".$date."'>
                                            <input type='hidden' name='departure' value='".$departure."'>
                                            <input type='hidden' name='arrival' value='".$arrival."'>
                                            <input type='hidden' name='tname' value='".$train_name."'>
                                            <input type='hidden' name='bid' value='".$bid."'>
                                            <input type='hidden' name='bname' value='".$bname."'>
                                            <input type='hidden' name='sid' value='".$sid."'>
                                            <input type='hidden' name='snum' value='".$seatnum."'>
                                            <input type='hidden' name='class' value='".$class."'>
                                            <input type='hidden' name='fare' value='".$total_fare."'>
                                            <td> <input class='btn btn-danger' type='submit' name='buy' style='float: right;font-size: 14px;
                                                                                ".$disable."' value='Buy Ticket'></td>
                                        </form>
                                        
                                    </tr>
                                    
                                    </tbody>
                                </table>
                                <!--table ends-->
                                </div>
                            </div>
                            ";
                            echo $card;



                            if(isset($_POST['buy'])){
                                $query2 = "INSERT INTO TICKETS(TRAIN_ID, USER_ID, ROUTE_ID, TRAVEL_DATE, ARRIVAL_TIME, DEPARTURE_TIME,
                                TRAIN_NAME, BID, B_NAME, SID, SEAT_NUM, CLASS, FARE) VALUES($tid, $uid, $rid, TO_DATE('$date', 'YYYY-MM-DD'),
                                '$arrival', '$departure', '$train_name', $bid , '$bname',$sid , $seatnum, '$class', $total_fare )";

                                $stq = oci_parse($conn, $query2);
                                oci_execute($stq);
                                
                            }
                                        
                        }
                        ?>

                         
                        </section>
                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <img src="../../Images/trainboss.png" alt="" height="500px" width="900px" style="margin-left: 40px;">
                    </div>
                </div>
                </div>
                <div class="container marketing" style="margin-top: 20px;">
                    <h1 style="text-align: center;font-weight: lighter;" ></h1>
                    <!-- Three columns of text below the carousel -->
                    <div class="row" style="margin-top: 42px;">
                      
                    <!-- /.row -->
                    <!--new-->
                    <div class="row" style="margin-top: 42px;">
                        <div class="col-lg-4">
                            <img src="../../Images/choose.jpg" width="60%" height="60%" alt="">
                            <h2 style="margin-top: 20px;">Select </h2>
                           
                       
                        </div>
                        <!-- /.col-lg-4 -->
                        <div class="col-lg-4">
                            <img src="../../Images/tl2.jpg" width="60%" height="60%" alt="">
                            <h2 style="margin-top: 20px;">Travel</h2>
                           
                
                        </div>
                        <!-- /.col-lg-4 -->
                        <div class="col-lg-4">
                            <img src="../../Images/tl1.jpg" width="60%" height="60%" alt="">
                            <h2 style="margin-top: 20px;">Enjoy</h2>
                            
                          
                        </div>
                    </div>
                    </div>
                    </div>
                    <hr style="color: black;">
                  
                <!-- /.row -->
                <!--new-->
               
            <!--FOOTER-->
            <footer class="container" style="background-color: white;" >
                <img src="../../Images/logo-modified.png" width="80" height="70" alt="" style="float: left;">
                <h3 style="float: left;margin-top: 20px;margin-left: 10px;">Mugen Train</h3>

                <h4 style="float: right;margin-top: 20px;">Have a safe journey</h4>
                <ul class="list-unstyled d-flex" style="float: right;" >
                    <p>Have a safe journey</p>
                    <!-- <li class="ms-3"><a class="link-dark" href="#" ><img src="facebook (2).png" alt=""></a></li>
                    <li class="ms-3"><a class="link-dark" href="#" ><img src="discord (1).png" alt=""></a></li>
                    <li class="ms-3"><a class="link-dark" href="#" ><img src="linkedin (1).png" alt=""></a></li> -->
                </ul>
            </footer>
                  
       
        </main>
    </body>
</html>