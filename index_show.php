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
  <title>MBS | ประวัติการจอง</title>
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
        <a class="navbar-brand" href="index.php" rel="tooltip" title="Designed by Invision. Coded by Creative Tim" data-placement="bottom" target="_blank">
       
        </a>
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
            <a class="nav-link" href="">
             <!--  <i class="now-ui-icons files_paper"></i> -->
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
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->




<!-- End Navbar -->
<div class="wrapper">


  <div class="main">
    <div class="section ">
      <div class="container">
        <div class="row">
          <div class="col-md-12">



            <h4>ประวัติการจอง</h4>
          </div>
                              <?php

                                if(!isset($_SESSION["intLineE"]))
                                {
                                    echo "ไม่มีคำสั่งซื้อ";
                                    exit();
                                }

                                include 'connect.php';

                                ?>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">รหัสบูธ</th>
                <th scope="col">ชื่อ</th>
                <th scope="col">ขนาด</th>
                <th scope="col">ราคา</th>
                <th scope="col">จำนวน</th>
                <th scope="col">ราคาทั้งหมด</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                  <?php
  $Total = 0;
  $SumTotal = 0;

  for($i=0;$i<=(int)$_SESSION["intLineE"];$i++)
  {
    if($_SESSION["strBoothE_id"][$i] != "")
    {
    $sql = "SELECT * FROM booths WHERE booth_id = '".$_SESSION["strBoothE_id"][$i]."' ";
   $query = mysqli_query($con,$sql);
                                $result = $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
                                $Total = $_SESSION["strQtyE"][$i] * $result["price"];
                                $SumTotal = $SumTotal + $Total;
                                ?>
    <tr>
    <td><?=$_SESSION["strBoothE_id"][$i];?></td>
                                   <td><?=$result["b_name"];?></td>
                                    <td><?=$result["price"];?></td>
                                    <td><?=$result["size"];?></td>
                                    <td><?=$_SESSION["strQtyE"][$i];?></td>
                                    <td><?=number_format($Total,2);?></td>

                                    <td><button class="btn btn-danger" onclick="window.location.href = 'delete_index_show_booth.php?Line=<?=$i;?>'">ลบ
                                    </button></td>
    </tr>
    <?php
    }
  }
  ?>
  
            </tbody>
          </table>
                   <table class="table">
                     <thead class="text-primary">

                       <tr>
                        <th>ราคารวม</th>
                        <td></td>
                        <td></td>
                        <td></td>

                        <td><?php echo number_format($SumTotal,2);?></td>
                    </tr>
                </thead>
            </table>

        </table>




 

        </div>
      </div>

    </div>








    <center>
            <a href='index.php' class='btn btn-info'>กลับหน้าแรก</a>
            <?php
            if($SumTotal > 0)
            {
                ?>
                <a href="index_booking.php" class="btn btn-primary">ยืนยันการจอง</a>
                <?php
            }
            ?>

    </center>
           <?php
        mysqli_close($con);
        ?>

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