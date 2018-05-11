<?php session_start();?>
<?php

include_once 'connect.php';
if (!$_SESSION["UserID"]){  //check session

      Header("Location: login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form

}else{
    //$_SESSION['frmAction'] = md5('itoffside.com' . rand(1, 9999));
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png" />
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>ADMIN | จองบูธ</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="css/m/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="css/m/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/m/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="red">
                <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="admin_home.php" class="simple-text">
            ADMIN
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li>
                <a href="admin_home.php">
                    <i class="material-icons">dashboard</i>
                    <p>หน้าแรก</p>
                </a>
            </li>


            <li class="dropdown">
                <a href="admin_add_user.php">
                    <i class="material-icons">library_add</i>

                    <p>ผู้ดูแลระบบ</p>
                </a>

            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="material-icons">event</i>
                    <p>งานนิทรรศการ</p>
                </a>
                <ul class="dropdown-menu">

                    <li>
                        <a href="admin_add_event.php">เพิ่มข้อมูลงานนิทรรศการ</a>
                    </li>
                    <li>
                        <a href="admin_status_add_event.php">เพิ่มข้อมูลโซนและบูธ</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="material-icons">assessment</i>
                    <p>คำขออนุมัติ</p>
                </a>
                <ul class="dropdown-menu">


                    <li>
                        <a href="">คำขออนุมัติการจอง</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="material-icons">event</i>
                    <p>ตรวจสอบสถานะ</p>
                </a>
                <ul class="dropdown-menu">

                    <li>
                        <a href="admin_status_user.php">คำขออนุมัติผู้ประกอบการสมาชิก</a>
                    </li>
                    <li>
                        <a href="admin_status_event.php">งานนิทรรศการ</a>
                    </li>
                    <li class="active">
                        <a href="event_index.php">การจอง</a>
                    </li>

                </ul>
            </li>

        </div>
    </div>


    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="event_index.php"> จองบูธ</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">

                        <li >
                            <a href="show.php">
                                <i class="material-icons">shopping_cart</i>
                                ข้อมูลการจอง
                            </a>

                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person</i>
                                <?php if (isset($_SESSION['UserID']))  ?>
                                <?php echo $_SESSION['Name']; ?>
                                <p class="hidden-lg hidden-md">Profile</p>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">แก้ไขโปรไฟล์</a>
                                </li>
                                <li>
                                    <a href='logout.php'>
                                        LOG OUT

                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <?php

                    include('connect.php');
                    
                    $sql = "SELECT events.*,banners.* FROM events,banners
                    WHERE events.event_id = banners.event_id ORDER BY events.event_id DESC LIMIT 6";

                    $query = mysqli_query($con,$sql);
                    while ($data = mysqli_fetch_assoc($query) ) { ?>
                        <div class="col-lg-4 mb-4">
                            <div class="card h-100 text-center">
                                <!-- <img class="card-img-top" src="http://placehold.it/750x450" alt=""> -->
                                 <img class="card-img-top" src="_files/_banner/<?php echo $data["name"];?>">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo "$data[ev_name]"; ?></h4>
                                    <h6 class="card-subtitle mb-2 text-muted">ระยะเวลาการจอง:</h6>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th scope="row">จำนวนบูธ</th>

                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">บูธที่ชำระเงิน:</th>

                                                    <td>
                                                        <?php
                                                   $sql = " SELECT COUNT(booth_id) as cnt_booth_f FROM booths, zones, events where booths.zone_id = zones.zone_id and zones.event_id = events.event_id and events.event_id = " . $data['event_id'] . " and booths.status='p'";
                                                   $cnt_booth_f_query = mysqli_query($con,$sql);
                                                   $row_booth = mysqli_fetch_array($cnt_booth_f_query);
                                                   echo $row_booth['cnt_booth_f'];
                                                    ?>
                                                        
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">บูธที่รอชำระเงิน:</th>
                                                                                                        <td>
                                                        <?php
                                                   $sql = " SELECT COUNT(booth_id) as cnt_booth_w FROM booths, zones, events where booths.zone_id = zones.zone_id and zones.event_id = events.event_id and events.event_id = " . $data['event_id'] . " and booths.status='w'";
                                                   $cnt_booth_w_query = mysqli_query($con,$sql);
                                                   $row_booth = mysqli_fetch_array($cnt_booth_w_query);
                                                   echo $row_booth['cnt_booth_w'];
                                                    ?>
                                                        
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">บูธว่าง:</th>
                                                    <td>
                                                                                                                <?php
                                                   $sql = " SELECT COUNT(booth_id) as cnt_booth_p FROM booths, zones, events where booths.zone_id = zones.zone_id and zones.event_id = events.event_id and events.event_id = " . $data['event_id'] . " and booths.status='f'";
                                                   $cnt_booth_p_query = mysqli_query($con,$sql);
                                                   $row_booth = mysqli_fetch_array($cnt_booth_p_query);
                                                   echo $row_booth['cnt_booth_p'];
                                                    ?>
                                                    </td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                    <a href='admin_event_zone.php?event_id=<?php echo $data["event_id"];?>' class="btn btn-primary">จองบูธ</a>
                                    <a href='admin_check_event.php?event_id=<?php echo $data["event_id"];?>' class='btn btn-info'>ตรวจสอบ</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
  
                                </div>
                                <!-- /.row -->



                            </center>

                        </div>
                    </div>
                </div>
            </div>
        </body>





        <!--   Core JS Files   -->
        <script src="js/m/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/m/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/m/material.min.js" type="text/javascript"></script>
        <!--  Charts Plugin -->
        <script src="js/m/chartist.min.js"></script>
        <!--  Dynamic Elements plugin -->
        <script src="js/m/arrive.min.js"></script>
        <!--  PerfectScrollbar Library -->
        <script src="js/m/perfect-scrollbar.jquery.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="js/m/bootstrap-notify.js"></script>
        <!--  Google Maps Plugin    -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Material Dashboard javascript methods -->
        <script src="js/m/material-dashboard.js?v=1.2.0"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script src="js/m/demo.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {

            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>

    </html>