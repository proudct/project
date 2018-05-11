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
        <title>ADMIN | ตรวจสอบงานนิทรรศการ</title>
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
                                    <a href="admin_status_user.php">สมาชิก</a>
                                </li>
                                <li  class="active">
                                    <a href="admin_status_event.php">งานนิทรรศการ</a>
                                </li>
                                <li>
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
                            <a class="navbar-brand" href="admin_status_event.php"> ตรวจสอบสถานะงานนิทรรศการ</a>
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
                        <div class="col-lg-12 col-md-12">
                            <div class="card card-nav-tabs">
                                <div class="card-header" data-tabs="tabs" data-background-color="red">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <span class="nav-tabs-title">ข้อมูล:</span>
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#event" data-toggle="tab">
                                                        <i class="material-icons">event</i> งานนิทรรศการ
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#zone" data-toggle="tab" data-tabs="tabs">
                                                        <i class="material-icons">event</i> โซน-บูธ
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="event">
<?php
//ถ้ามีการส่งค่าข้อมูล
include('connect.php');

?>
<table class='table'>
                                       <thead class='text-primary'>
                        
                     <tr>

                       <th>ชื่องานนิทรรศการ</th>
                        <th>แปลน</th>     
                        <th>แบนเนอร์</th>
                        <th>ภาพบรรยากาศงาน</th>     
                        <th>เอกสารประกอบการจอง</th>

                        <th></th>
                        <th></th>
                        </tr>

                    </thead>

<?php

$sql = "SELECT events.* FROM events ORDER BY events.event_id DESC LIMIT 10";
$query = mysqli_query($con,$sql);
while ($data = mysqli_fetch_array($query) ) {
?>
<tr>
<td><center><?php echo "$data[ev_name]"; ?></center></td>
<td><a href="admin_edit_plan.php?event_id=<?php echo $data["event_id"];?>" class="btn btn-secondary">แก้ไขแปลน</a></td>
<td><a href="admin_edit_banner.php?event_id=<?php echo $data["event_id"];?>" class="btn btn-info">แก้ไขแบนเนอร์</a></td>
<td><a href="admin_edit_image.php?event_id=<?php echo $data["event_id"];?>" class="btn btn-success">แก้ไขภาพบรรยากาศงาน</a></td>
<td><a href="admin_edit_document.php?event_id=<?php echo $data["event_id"];?>" class="btn btn-warning">แก้ไขเอกสารประกอบการจอง</a></td>


<td class='td-actions text-right'>

<button type='button' class='btn btn-primary btn-simple btn-xs'>
                                 <i class='material-icons'><a href="admin_edit_event.php?event_id=<?php echo $data["event_id"];?>">edit</i></a>
                                  </button>
                                </td>

                               

                               <td>
                               <td class='td-actions text-right'>
                       


                                        "<i class='material-icons'><a href="delete_event.php?event_id=<?php echo $data["event_id"];?>">delete</i></a>

                                     </td>

<?php
}

?>
                                    
                      

                        </table>

                                        </div>
                                        <div class="tab-pane" id="zone">
                                            <table class='table'>
                                       <thead class='text-primary'>
                        
                     <tr>

                       <th>ชื่องานนิทรรศการ</th>
                        <th>โซน</th>     
                        <th>บูธ</th>

                        <th></th>
                        <th></th>
                        </tr>

                    </thead>

<?php

$sql = "SELECT events.* FROM events ";
$query = mysqli_query($con,$sql);
while ($data = mysqli_fetch_array($query) ) {
?>
<tr>
<td><center><?php echo "$data[ev_name]"; ?></center></td>
<td><a href="admin_edit_zone_status.php?event_id=<?php echo $data["event_id"];?>" class="btn btn-secondary">แก้ไขโซน</a></td>
<td><a href="admin_edit_booth_status.php?event_id=<?php echo $data["event_id"];?>" class="btn btn-info">แก้ไขบูธ</a></td>



<td class='td-actions text-right'>

<button type='button' class='btn btn-primary btn-simple btn-xs'>
                                 <i class='material-icons'><a href="admin_edit_event.php?event_id=<?php echo $data["event_id"];?>">edit</i></a>
                                  </button>
                                </td>

                               

                               <td>
                               <td class='td-actions text-right'>
                       


                                        "<i class='material-icons'><a href="delete_event.php?event_id=<?php echo $data["event_id"];?>">delete</i></a>

                                     </td>

<?php
}

?>
                                    
                      

                        </table>

                                        </div>
                                       
                                </div>
                            </div>
                        </div>


                    </div>
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