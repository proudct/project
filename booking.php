<?php
session_start();
?>
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
      <title>ADMIN | ยืนยันการจอง</title>
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
              <a class="navbar-brand" href="confirm.php"> ยืนยันการจอง</a>
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
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header" data-background-color="red">
                    <h4 class="title">ยืนยันการจอง</h4>

                  </div>
                  <div class="card-content">
                      <form action="confirm.php" method="post">

                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
<?php

                                $sql1 = "SELECT * FROM admins WHERE id = '".$_SESSION['UserID']."' ";
                                $query1 = mysqli_query($con,$sql1);
                               $data = mysqli_fetch_array($query1,MYSQLI_ASSOC);
?>
                            <label >ชื่อ</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $data["name"];?>">

                          </div>
                        </div>



                        <div class="col-lg-6">
                          <div class="form-group">

                            <label>นามสกุล</label>
                            <input type="text" class="form-control" name="lname" value="<?php echo $data["lname"];?>">

                          </div>
                        </div>


                      </div>



                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">

                            <label>เบอร์โทร</label>
                            <input type="text" class="form-control" name="tel" value="<?php echo $data["tel"];?>" >

                          </div>
                        </div>



                        <div class="col-lg-6">
                          <div class="form-group">

                            <label>email</label>
                            <input type="email"  class="form-control" name="email" value="<?php echo $data["email"];?>">

                          </div>
                        </div>


                      </div>

                      <div class="form-group">
                        <label>สินค้า</label>
                        <input type="text" class="form-control" name="type">

                      </div>

                      <div class="form-group">
                        <label>ชื่อที่ใช้ในการประชาสัมพันธ์(Brand name)</label>
                        <input type="text" class="form-control" name="brandname">

                      </div>

                      <div class="form-group">
                        <label>ชื่อสำหรับทำป้ายชื่อบูธ(ไม่เกิน 25 ตัวอักษร)</label>
                        <input type="text" class="form-control" name="banner">

                      </div>



           
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card card-profile">
                 <h3 class="card-header" data-background-color="red">สรุปการจอง</h3>
              
                   <div class="card-content">
                    <table class="table ">
                      <thead>
                        <tr class="table-info">
                          <?php

                          if(!isset($_SESSION["intLine"]))
                          {
                           echo "ไม่มีคำสั่งซื้อ";
                           exit();
                         }

                         require 'connect.php';

                         ?>         
                         <th>บูธ</th>
                         <th>ขนาด</th>
                         <th>จำนวน</th>
                         <th>ราคา</th>


                       </tr>
                     </thead>
                     <tbody>
                      <tr>
                        <?php
                        $Total = 0;
                        $SumTotal = 0;
                        $vat = 7;


                        for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
                        {
                         if($_SESSION["strBooth_id"][$i] != "")
                         {
                          $sql = "SELECT * FROM booths WHERE booth_id = '".$_SESSION["strBooth_id"][$i]."' ";
                          $query = mysqli_query($con,$sql);


                          $result = $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
                          $Total = $_SESSION["strQty"][$i] * $result["price"];
                          $SumTotal = $SumTotal + $Total;
                          ?>
                          <tr>

                            <td><?=$result["b_name"];?></td>
                            <td><?=$result["price"];?></td>
                            <td><?=$_SESSION["strQty"][$i];?></td>
                            <td><?=number_format($Total,2);?></td>
                            <!--  <td><?=$_SESSION["strBooth_id"][$i];?></td> -->
                            <td><input type='hidden' name='booth_id' value='<?=$_SESSION["strBooth_id"][$i];?>'></td>
<td><input type='hidden' name='status' value='w'></td>
                          </tr>
                          <?php
                        }
                      }
                      ?>

                    </tbody>
                  </table>

                  <table class="table ">
                    <thead>
                      <tr class="">
                        <th>คิดเป็นจำนวนเงิน
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </th>
                        <th><?php echo number_format($SumTotal,2);?></th>
                      </tr>
                    </thead>

                  </table>
                  <table class="table ">
                    <thead>
                      <tr class="">
                        <th>ภาษีมูลค่าเพิ่ม(7%)</th>

                        <th><?php 
                        $sumvat = ($SumTotal*$vat)/100;
                        echo number_format($sumvat);
                        ?></th>
                      </tr>
                    </thead>

                  </table>

                  <table class="table ">
                    <thead>
                      <tr>
                        <th>รวมเงินทั้งหมด
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </th>
                        <?php $sum = $SumTotal+$sumvat; ?>
                        <th><?php echo number_format($sum);?></th>
                      </tr>
                    </thead>

                  </table>
              
                    <button type="submit" class="btn btn-success pull-right">ชำระเงิน</button>
                    <div class="clearfix"></div>
         
                </div>
              </div>
            </div>
          </div>

          <!-- /Order Details -->
        </form>

      </div>
    </div>     
    <?php
    mysqli_close($con);
    ?>
  </div>
</div>
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
      </body>
      </html>

      <?php ?>