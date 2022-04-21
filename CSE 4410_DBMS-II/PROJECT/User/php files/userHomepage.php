<?php
session_start();
$display = '';
$else = "display:none;";
if(isset($_SESSION['userID'])){
    $uid = $_SESSION['userID'];
    $display = "display:none;";
    $else = '';
}else{
    //header("location: http://localhost/dbms/User/php%20files/userHomepage.php");
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
        <title>Mugen Train</title>
        <link href="../CSS files/PHomepage Design.css" rel="stylesheet">
    </head>
    <body>
        <!--     
            <header>
              <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">Carousel</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                      </li>
                    </ul>
                    <form class="d-flex">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                  </div>
                </div>
              </nav>
            </header> -->
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
                        <p style="font-weight: bold;">
                        //add autetication
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
                <h1 style="text-align: center;font-weight: bolder;">Our Services</h1>
                <!-- Three columns of text below the carousel -->
                <div class="row" style="margin-top: 42px;">
                  
                <!-- /.row -->
                <!--new-->
                <div class="row" style="margin-top: 42px;">
                    <div class="col-lg-4">
                        <img src="../../Images/a13.png" width="60%" height="60%" alt="">
                        <h2 style="margin-top: 20px;">Join Us</h2>
                       
                   
                    </div>
                    <!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <img src="../../Images/a11.png" width="60%" height="60%" alt="">
                        <h2 style="margin-top: 20px;">Buy Tickets Online</h2>
                       
            
                    </div>
                    <!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <img src="../../Images/a12.png" width="60%" height="60%" alt="">
                        <h2 style="margin-top: 20px;">Make Reservations</h2>
                        
                      
                    </div>
                </div>
                <!-- start of the features -->
                <hr class="featurette-divider">
                <h1 style="text-align: center;font-weight: lighter;">Our Goals</h1>
                <div class="row featurette" style="margin-top: 43px;">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">We Care about you. <span class="text-muted"></span></h2>
                        <p class="lead" style="margin-top: 30px;">Make your own reservations on available train.Choose your destinations and journey time.</p>
                    </div>
                    <div class="col-md-5">
                        <img src="../../Images/into.jpg" width="100%" height="100%" alt="">
                    </div>
                </div>
                <hr class="featurette-divider">
                <div class="row featurette">
                    <div class="col-md-7 order-md-2">
                        <h2 class="featurette-heading">Let us help you.<span class="text-muted"></span></h2>
                        <p class="lead" style="margin-top: 30px;">Buy Tickets, choose your destinations and enjoy the comfort.</p>
                    </div>
                    <div class="col-md-5 order-md-1">
                        <img src="../../Images/night.jpg" width="100%" height="100%" alt="">
                    </div>
                </div>
                <hr class="featurette-divider">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">We are with you.<span class="text-muted"></span></h2>
                        <p class="lead" style="margin-top: 30px;">Contact us for more Information. Get news on Train.</p>
                    </div>
                    <div class="col-md-5">
                        <img src="../../Images/miod.jpg" width="100%" height="100%" alt="">
                    </div>
                </div>
                <hr class="featurette-divider">
                <!-- end of features -->
            </div>
            <!--FOOTER-->
            <!-- <footer class="container" >
                <h3>Connect with us</h3>
                <ul class="list-unstyled d-flex" >
                    <li class="ms-3"><a class="link-dark" href="#" ><img src="facebook (2).png" alt=""></a></li>
                    <li class="ms-3"><a class="link-dark" href="#" ><img src="discord (1).png" alt=""></a></li>
                    <li class="ms-3"><a class="link-dark" href="#" ><img src="linkedin (1).png" alt=""></a></li>
                </ul>
            </footer> -->
        </main>
    </body>
</html>