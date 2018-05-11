
<?php session_start();?>
<?php
if (!$_SESSION["UserID"]){  //check session

      Header("Location: login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form

}else{
    //$_SESSION['frmAction'] = md5('itoffside.com' . rand(1, 9999));
}

$_SESSION['message'] = ''; /*เเสดงข้อความ Error*/


include_once 'connect.php';

$mysqli = new mysqli('localhost', 'root', '', 'projectdb'); //เชื่อมฐานข้อมูล
$mysqli->query("set names utf8"); //กำหนดภาษา

if($_SERVER['REQUEST_METHOD'] == 'POST') {


        $ev_name = $mysqli->real_escape_string($_POST['ev_name']); 
        $ev_caption = $mysqli->real_escape_string($_POST['ev_caption']);
        $ev_dateS = date("Y-m-d"); 
        $ev_dateF = date("Y-m-d");
        $ev_dateRS = date("Y-m-d");
        $ev_dateRF = date("Y-m-d");
        $status = "n";
        $create_by = $mysqli->real_escape_string($_POST['name']); 
        

                     $sql = "INSERT INTO events (ev_name, ev_caption, ev_dateS, ev_dateF, ev_dateRS, ev_dateRF,status,create_by)"
            . "VALUES('$ev_name', '$ev_caption', '$ev_dateS', '$ev_dateF', '$ev_dateRS', '$ev_dateRF', '$status', '$create_by')";    


            if($mysqli->query($sql) == true)
            {
            echo "<script>";
            echo "alert(\"เพิ่มงานนิทรรศการสำเร็จ\");";
            echo "window.location = 'admin_status_add_event.php';"; //ไปหน้าเเรกของพนักงาน
            echo "</script>";


//เก็บข้อมูลลง DB
            }
            else{
        echo "<script>";
            echo "alert(\"โปรดลองอีกครั้ง !\");";
           echo "window.history.back()";
        echo "</script>";
            }
        

}
?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>ADMIN | เพิ่มข้อมูลงานนิทรรศการ</title>
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





        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet"
            type="text/css" />

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

                                <li class="active">
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
                            <a class="navbar-brand" href="admin_add_event.php"> เพิ่มข้อมูลงานนิทรรศการ</a>
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

                       <form action="admin_add_event.php" method="post" enctype="multipart/form-data"> 

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" data-background-color="red">
                                        <h4 class="title">เพิ่มข้อมูลงานนิทรรศการ</h4>
                                        <!-- <p class="category">Here is a subtitle for this table</p> -->
                                    </div>
                                    <div class="card-content table-responsive">

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>ชื่องาน</label>
                                                    <input class="form-control" type="text" id="ev_name" name="ev_name" placeholder="กรุณาใส่ชื่องาน">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>คำบรรยาย</label>
                                                    <textarea class="form-control" rows="3" id="ev_caption" name="ev_caption"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>วันที่เริ่มงาน</label>
                                                    <input class="form-control" type="date" id="ev_dateS" name="ev_dateS">
                                                </div>

                                            </div>

                                            <div class="col-lg-6">
                                                <label>วันสิ้นสุดงาน</label>
                                                <input class="form-control" type="date" id="ev_dateF" name="ev_dateF">
                                            </div>

                                        </div>

                                        <div class="row ">
                                            <div class="col-lg-6 ">
                                                <div class="form-group ">
                                                    <label>วันที่เริ่มจองบูธ</label>
                                                    <input class="form-control " type="date" id="ev_dateRS" name="ev_dateRS">
                                                </div>

                                            </div>

                                            <div class="col-lg-6 ">
                                                <label>วันสิ้นสุดจองบูธ</label>
                                                <input class="form-control " type="date" id="ev_dateRF" name="ev_dateRF">
                                            </div>

                                        </div>


                                    <input type="hidden"  name="name" id="name" value=" <?php echo $_SESSION['Name']; ?>">

 
                                    <center>


                                        <button type='reset' name='reset' class='btn  btn-danger'>ยกเลิก</button>
                                        <button type='submit' name='submit' class='btn btn-success'>บันทึก</button>

                                    </center>


                                    <!-- </form> -->
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>


    </script>

    </html>