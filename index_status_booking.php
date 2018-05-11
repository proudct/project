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

</nav>
<!-- End Navbar -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">


        <!-- Product thumb imgs -->
        <div class="col-md-12">
            <?php
//ถ้ามีการส่งค่าข้อมูล
            include('connect.php');

            ?>
            <table class='table'>
     <thead class='text-primary'>

               <tr>

                <th>เลขที่ใบสั่งซื้อ</th>
                 <th>บูธ</th>     


                 <th></th>
                 <th></th>
             </tr>

         </thead>

         <?php

         $sql = "SELECT * FROM booking_detail ";
         $query = mysqli_query($con,$sql);
         while ($data = mysqli_fetch_array($query) ) {
            ?>
            <tr>
                <td><center><?php echo "$data[booking_id]"; ?></center></td>
                <td><?php echo "$data[booth_id]"; ?></td>
                <td><a href="index_add_detail.php?booth_id=<?php echo $data["booth_id"];?>" class="btn btn-success">เพิ่มรายละเอียด</a></td>
                <td><a href="admin_add_image.php?event_id=<?php echo $data["event_id"];?>" class="btn btn-danger">ยกเลิกการจอง</a></td>
          


                <?php
            }

            ?>



        </table>
    </div>
    <!-- /Product thumb imgs -->


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