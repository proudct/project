<?php session_start();?>
<?php

require 'connect.php';
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
    <title>ADMIN | แก้ไขข้อมูลผู้ประกอบการ</title>
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
                    <a class="navbar-brand" href="admin_edit_exhibitor.php"> เแก้ไขข้อมูลผู้ประกอบการ</a>
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

                <form action="admin_update_exhibitor.php" method="post" enctype="multipart/form-data">
                    <?php


                    $id = null;
                    if(isset($_GET["exhibitor_id"]))
                    {
                        $id = $_GET["exhibitor_id"]; 
                    } 
// var_dump($id);
// exit(0);

                    $sql = "SELECT * FROM `exhibitors` WHERE id = '".$id."' ";
                    $query = mysqli_query($con,$sql);
                    $data=mysqli_fetch_array($query,MYSQLI_ASSOC);

                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">แก้ไขข้อมูลผู้ประกอบการ</h4>
                                    <!-- <p class="category">Here is a subtitle for this table</p> -->
                                </div>
                                <div class="card-content table-responsive">
                                   
                                   <input type="hidden" name="id" value="<?php echo $data["id"];?>">
                                   <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>ชื่อ</label>
                                            <input class="form-control" id="name" name="name" value="<?php echo "$data[name]"; ?>">
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>สกุล</label>
                                            <input class="form-control" id="lname" name="lname" value="<?php echo "$data[lname]"; ?>">
                                        </div>
                                    </div>


                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>เบอร์โทรศัพท์</label>
                                            <input class="form-control" id="tel" name="tel" value="<?php echo "$data[tel]"; ?>">
                                        </div>
                                    </div>



                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" id="email" name="email" value="<?php echo "$data[email]"; ?>">
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>ชื่อบริษัท/ชื่อร้านค้า</label>
                                            <input class="form-control" id="company" name="company" value="<?php echo "$data[company]"; ?>">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>ที่อยู่บริษัท/ที่อยู่อร้านค้า</label>
                                            <input class="form-control" id="address" name="address" value="<?php echo "$data[address]"; ?>">
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>USERNAME</label>
                                            <input class="form-control" type="text" id="username" name="username" value="<?php echo "$data[username]"; ?>">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>รหัสผ่าน</label>
                                            <input class="form-control" type="password" id="password" name="password" value="<?php echo "$data[password]"; ?>">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>ยืนยันรหัสผ่าน</label>
                                                <input class="form-control" type="password" id="Cpassword" name="Cpassword" value="<?php echo "$data[password]"; ?>">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>รูปภาพประจำตัวผู้ประกอบการ</label>
                                        
                                        <input type="file" name="exhibitor_image" id="exhibitor_image" value="<?php echo "$data[exhibitor_image]"; ?>" />   
                                        


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>งานนิทรรศการ</label>


                                        <div class="dropdown">
                                            <select class="btn btn-default dropdown-toggle" id="is_enable" name="is_enable">
                                                <option value='n'>รออนุมัติ</option>
                                                <option value='y'>อนุมัติ</option>

                                                
                                            </select>

                                        </div>
                                    </div>
                                    
                                </div>
                                <center>


                                    <button type='reset' name='reset' class='btn  btn-danger'>ยกเลิก</button>
                                    <button type='submit' name='submit' class='btn btn-success'>บันทึก</button>

                                </center>
                                <?php
                                mysqli_close($con);


                                ?>
                                
                            </form>
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
<script src="http://localhost/mbs/public/js/m/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="http://localhost/mbs/public/js/m/bootstrap.min.js" type="text/javascript"></script>
<script src="http://localhost/mbs/public/js/m/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="http://localhost/mbs/public/js/m/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="http://localhost/mbs/public/js/m/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="http://localhost/mbs/public/js/m/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="http://localhost/mbs/public/js/m/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="http://localhost/mbs/public/js/m/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="http://localhost/mbs/public/js/m/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>

    </html>