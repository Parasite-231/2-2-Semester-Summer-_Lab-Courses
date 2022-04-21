<?php
session_start();
$display = '';
$else = "display:none;";
if(isset($_SESSION['userID'])){
    $uid = $_SESSION['userID'];
    $display = "display:none;";
    $else = '';
}
// else{
    //header("location: ../../userHomepage.php");
// }
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
        <title>My Tickets</title>
        <link href="../CSS filesPHomepage Design.css" rel="stylesheet">
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
                <h1 style="text-align: center;font-weight: bolder;">My Ticket List</h1>
                <!-- Three columns of text below the carousel -->
                <div class="row" style="margin-top: 42px;">
                    <div class="col-md-7 col-md-offset-1">

                        
                        <div class="card" style="margin-top: 20px;">
                            <div class="card-header">
                              <img src="../../Images/timer.png" width="50" height="40" alt="">
                              <img src="../../Images/train-ticket.png" width="50" height="40" style="float: right ;"  alt="">
                            </div>
                            <div class="card-body">
                                <!--table starts-->

                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th scope="col" style="background-color: aqua">Ticket ID</th>
                                        <th scope="col" style="background-color: aqua;">Source</th>
                                        <th scope="col" style="background-color: aqua;">Destination</th>
                                        <th scope="col" style="background-color: aqua;">Departure Time</th>
                                        <th scope="col" style="background-color: aqua;">Fare</th>
                                      </tr>
                                    </thead>


                                    <tbody>
                                    <?php
                                     require '../functions/userFunctions.php';
                                     require '../../connect/db_connect.php';

                                     $uid = 1;
                                     $sql = "SELECT * FROM TICKETS WHERE USER_ID = $uid ";
                                     $stid = oci_parse($conn, $sql);
                                     $r= oci_execute($stid);
                            
                                     while($row = oci_fetch_assoc($stid)){
                                        
                                        $rid = $row['ROUTE_ID'];
                                        
                                        $sql2 = "SELECT * FROM ROUTES WHERE ROUTE_ID = $rid ";
                                        $stid2 = oci_parse($conn, $sql2);
                                        oci_execute($stid2);
                                        $rdata = oci_fetch_assoc($stid2);
                                        $source = $rdata['SOURCE'];
                                        $dest = $rdata['DEST'];

                                        $view =  "
                                        <tr>
                                        <td>".$row['TICKET_ID']."</td>
                                        <td>".$source."</td>
                                        <td>".$dest."</td>
                                        <td>".$row['DEPARTURE_TIME']."</td>
                                        <td>".$row['FARE']."</td>
                                      </tr>
                                        ";  
                                        echo $view;
                                     }
                                    
                                    
                                    ?>
                                      <!-- <tr>
                                        <td>10245</td>
                                        <td>Dhaka</td>
                                        <td>Chittagong</td>
                                        <td>06:20 AM</td>
                                        <td>Tk 500</td>
                                      </tr>
                                      <tr>
                                        <td>10245</td>
                                        <td>Dhaka</td>
                                        <td>Chittagong</td>
                                        <td>06:20 AM</td>
                                        <td>Tk 500</td>
                                      </tr>
                                      <tr>
                                        <td>10245</td>
                                        <td>Dhaka</td>
                                        <td>Chittagong</td>
                                        <td>06:20 AM</td>
                                        <td>Tk 500</td>
                                      </tr>
                                      <tr>
                                        <td>10245</td>
                                        <td>Dhaka</td>
                                        <td>Chittagong</td>
                                        <td>06:20 AM</td>
                                        <td>Tk 500</td>
                                      </tr>
                                      <tr>
                                        <td>10245</td>
                                        <td>Dhaka</td>
                                        <td>Chittagong</td>
                                        <td>06:20 AM</td>
                                        <td>Tk 500</td>
                                      </tr> -->
                                      
                                    </tbody>
                                  </table>
                                  <!--table ends-->
                               
                            
                            </div>
                          </div>

                  
                        </section>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <img src="../../Images/traink.png" alt="" height="600px" width="900px" style="margin-left: 40px;">
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