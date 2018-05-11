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
    <title>ADMIN | ตรวจสอบสถานะ</title>
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
                    <a class="navbar-brand" href="admin_check_event.php"> ตรวจสอบสถานะ</a>
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
              <?php
//ถ้ามีการส่งค่าข้อมูล
              include('connect.php');

              $id = null;
              if(isset($_GET["event_id"]))
              {
                $id = $_GET["event_id"]; 
            } 

            $sql = "SELECT * FROM `events` WHERE event_id = '".$id."' ";
            $query = mysqli_query($con,$sql);
            while ($data = mysqli_fetch_array($query) ) {?>

                <input class='form-control' type='hidden'  name='event_id' id='event_id' value='<?php echo $data["event_id"];?>'>                       


                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="red">
                            <i class="material-icons">bookmark</i>
                        </div>
                        <div class="card-content">
                            <p class="category">ว่าง</p>
                            <h3 class="title">
                             <?php
                             $sql1 = " SELECT COUNT(booth_id) as cnt_booth_f FROM booths, zones, events where booths.zone_id = zones.zone_id and zones.event_id = events.event_id and events.event_id = " . $data['event_id'] . " and booths.status='f'";
                             $cnt_booth_f_query = mysqli_query($con,$sql1);
                             $row_booth = mysqli_fetch_array($cnt_booth_f_query);
                             echo $row_booth['cnt_booth_f'];
                             ?>
                             <small>บูธ</small>

                         </h3>
                     </div>
                     <div class="card-footer">
                        <a href="admin_check_free.php?event_id=<?php echo $data["event_id"];?>" class="btn btn-danger pull-right">อ่านเพิ่มเติม</a>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">shopping_cart</i>
                    </div>
                    <div class="card-content">
                        <p class="category">รอชำระเงิน</p>
                        <h3 class="title">
                            <?php
                            $sql = " SELECT COUNT(booth_id) as cnt_booth_w FROM booths, zones, events where booths.zone_id = zones.zone_id and zones.event_id = events.event_id and events.event_id = " . $data['event_id'] . " and booths.status='w'";
                            $cnt_booth_w_query = mysqli_query($con,$sql);
                            $row_booth = mysqli_fetch_array($cnt_booth_w_query);
                            echo $row_booth['cnt_booth_w'];
                            ?>
                            <small>บูธ</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <a href="admin_check_wait.php?event_id=<?php echo $data["event_id"];?>" class="btn btn-warning pull-right">อ่านเพิ่มเติม</a>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">credit_card</i>
                    </div>
                    <div class="card-content">
                        <p class="category">ชำระเงินแล้ว</p>
                        <h3 class="title">
                           <?php
                           $sql = " SELECT COUNT(booth_id) as cnt_booth_p FROM booths, zones, events where booths.zone_id = zones.zone_id and zones.event_id = events.event_id and events.event_id = " . $data['event_id'] . " and booths.status='p'";
                           $cnt_booth_p_query = mysqli_query($con,$sql);
                           $row_booth = mysqli_fetch_array($cnt_booth_p_query);
                           echo $row_booth['cnt_booth_p'];
                           ?>
                           <small>บูธ</small>
                       </h3>
                   </div>
                   <div class="card-footer">
                    <a href="admin_check_pay.php?event_id=<?php echo $data["event_id"];?>" class="btn btn-success pull-right">อ่านเพิ่มเติม</a>
                    <?php
                }
                ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

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
                                            <a href="#free" data-toggle="tab">
                                                <i class="material-icons">bookmark</i> ว่าง
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#wait" data-toggle="tab" data-tabs="tabs">
                                                <i class="material-icons">shopping_cart</i> รอชำระเงิน
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#pay" data-toggle="tab" data-tabs="tabs">
                                                <i class="material-icons">credit_card</i> ฃำระเงินแล้ว
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="tab-content">
                                <div class="tab-pane active" id="free">


                                    <table class='table'>
                                     <thead class='text-primary'>

                                       <tr>

                                         <th>บูธ</th>
                                         <th>ขนาด</th>     
                                         <th>ราคา</th>
                                         <th>สถานะการจอง</th>     

                                         <th></th>

                                     </tr>

                                 </thead>

                                 <?php

                                 $f_sql = " SELECT booths.booth_id,booths.b_name,booths.size,booths.price,booths.status FROM booths, zones, events where booths.zone_id = zones.zone_id and zones.event_id = events.event_id and events.event_id = " . $id . " and booths.status='f'";
                                 $f_query = mysqli_query($con,$f_sql);

                                 while ($f_row = mysqli_fetch_array($f_query,MYSQLI_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $f_row['b_name']; ?></td>
                                        <td><?php echo $f_row['size']; ?></td>
                                        <td><?php echo $f_row['price']; ?></td>
                                        <td><input type="hidden" name="status" value="'<?php echo $f_row['status']; ?>"'>ว่าง</td>
                                        <td><a href="admin_detail_booth.php?booth_id=<?php echo $f_row["booth_id"];?>" class="btn btn-primary">รายละเอียด</a></td>
                                        <td><a href='order.php?booth_id=<?php echo $f_row["booth_id"]; ?>' class='btn btn-success'>จอง</a></td>




                                        <?php
                                    }

                                    ?>
                                    


                                </table>

                            </div>
                            <div class="tab-pane" id="wait">
                                <table class='table'>
                                 <thead class='text-primary'>

                                   <tr>

                                     <th>บูธ</th>
                                     <th>ขนาด</th>     
                                     <th>ราคา</th>
                                     <th>สถานะการจอง</th>     

                                     <th></th>

                                 </tr>

                             </thead>

                             <?php

                             $w_sql = " SELECT booths.b_name,booths.size,booths.price,booths.status FROM booths, zones, events where booths.zone_id = zones.zone_id and zones.event_id = events.event_id and events.event_id = " . $id . " and booths.status='w'";
                             $w_query = mysqli_query($con,$w_sql);

                             while ($w_row = mysqli_fetch_array($w_query,MYSQLI_ASSOC)) {
                                ?>
                                <tr>
                                    <td><?php echo $w_row['b_name']; ?></td>
                                    <td><?php echo $w_row['size']; ?></td>
                                    <td><?php echo $w_row['price']; ?></td>
                                    <td><input type="hidden" name="status" value="'<?php echo $w_row['status']; ?>"'>รอชำระเงิน</td>
                                    <td><a href="admin_edit_document.php?event_id=<?php echo $data["event_id"];?>" class="btn btn-primary">รายละเอียด</a></td>




                                    <?php
                                }

                                ?>



                            </table>
  </div>
                             <div class="tab-pane" id="pay">
                                <table class='table'>
                                 <thead class='text-primary'>

                                   <tr>

                                     <th>บูธ</th>
                                     <th>ขนาด</th>     
                                     <th>ราคา</th>
                                     <th>สถานะการจอง</th>     

                                     <th></th>

                                 </tr>

                             </thead>

                             <?php

                             $p_sql = " SELECT booths.b_name,booths.size,booths.price,booths.status FROM booths, zones, events where booths.zone_id = zones.zone_id and zones.event_id = events.event_id and events.event_id = " . $id . " and booths.status='p'";
                             $p_query = mysqli_query($con,$p_sql);

                             while ($p_row = mysqli_fetch_array($p_query,MYSQLI_ASSOC)) {
                                ?>
                                <tr>
                                    <td><?php echo $p_row['b_name']; ?></td>
                                    <td><?php echo $p_row['size']; ?></td>
                                    <td><?php echo $p_row['price']; ?></td>
                                    <td><input type="hidden" name="status" value="'<?php echo $p_row['status']; ?>"'>ชำระเงินแล้ว</td>
                                    <td><a href="admin_edit_document.php?event_id=<?php echo $data["event_id"];?>" class="btn btn-primary">รายละเอียด</a></td>




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