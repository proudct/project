<?php
session_start();
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/n/apple-icon.png">
    <link rel="icon" type="image/png" href="img/n/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>MBS | หน้าแรก</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'
    />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="css/n/bootstrap.min.css" rel="stylesheet" />
    <link href="css/n/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="css/n/demo.css" rel="stylesheet" />
</head>


<body class="template-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top " color-on-scroll="100">
        <div class="container">
            <div class="navbar-translate">
<img src="_files/logo.png">
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="img/n/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <!-- <i class="now-ui-icons business_bank"></i> -->
                            <p>หน้าแรก</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index_mannual.php">
                      

                           <p>คู่มือผู้ประกอบการ</p>
                           
                       </a>
                   </li>

                   <li class="nav-item">
                    <a href="index_show.php" class="btn btn-defualt">
                        ข้อมูลการจอง
                    </a>
                </li>

                <!-- ปุ่ม login logout -->
                <?php
                if (!isset($_SESSION["Role"])) {
                    ?>
                    <li class="nav-item">
                        <a href="register.php" class="btn btn-info">
                            สมัครสมาชิก
                        </a>
                    </li>

                    <!--login-->
                    <li class="nav-item">
                        <a href="login.php" class="btn btn-success">
                            เข้าสู่ระบบ
                        </a>
                    </li>
                    <?php

                } else {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <p>
                              คุณ<?php echo $_SESSION["Name"]; ?>
                            </p>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="logout.php">ออกจากระบบ</a>

                        </div>
                    </li>

                    <?php
                }
                ?>
                <!-- /ปุ่ม login logout -->


            </li>
        </ul>
    </div>
</div>
</nav>
<!-- End Navbar -->
<div class="wrapper">
    <div class="page-header " filter-color="orange">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="_files/5.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="_files/4.jpg" alt="Second slide">
                </div>
<!--<div class="carousel-item">
                        <img class="d-block img-fluid" src="http://placehold.it/2880x1920" alt="Third slide">
                    </div> -->
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="section ">
            <div class="container">

                <h2>งานนิทรรศการ</h2>

                <div class="row">
                    <?php

                    include('connect.php');
                    
                    $sql = "SELECT events.*,banners.* FROM events,banners
                    WHERE events.event_id = banners.event_id ORDER BY events.event_id DESC LIMIT 6";

                    $query = mysqli_query($con,$sql);
                    while ($data = mysqli_fetch_assoc($query) ) { ?>
                        <div class="col-lg-4">
                            <div class="card h-100 text-center">

                                <img src="_files/_banner/<?php echo $data["name"];?>">


                                <!--        <img class="card-img-top" src="img/OTOP.jpg" alt=""> -->
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo "$data[ev_name]"; ?></h4>

                                    <p class="card-text"><?php echo "$data[ev_caption]"; ?></p>

                                </div>
                                <div class="card-footer">
                                    <a href='detail.php?event_id=<?php echo $data["event_id"];?>' class="btn btn-primary">รายละเอียด</a>
                                   <a href='index_plan.php?event_id=<?php echo $data["event_id"];?>' class='btn btn-info'> จองบูธ</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <!-- /.row -->




                <!-- /.row -->

            </div>
        </div>




        <nav>

            <ul class="pagination pagination-primary justify-content-center ">
                <li class="page-item">
                    <a class="page-link" href="#link" aria-label="Previous">
                        <span aria-hidden="true">
                            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                        </span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#link">1</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#link">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#link">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#link" aria-label="Next">
                        <span aria-hidden="true">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                        </span>
                    </a>
                </li>
            </ul>
        </nav>


    </div>
</div>


</body>
<!--   Core JS Files   -->
<script src="js/n/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="js/n/core/popper.min.js" type="text/javascript"></script>
<script src="js/n/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="js/n/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="js/n/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="js/n/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="js/n/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>

</html>