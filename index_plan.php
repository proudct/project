<?php
session_start();
include 'connect.php';
$_SESSION["event_id"] = $_GET["event_id"];
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
           <br>
           <div class="row">
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
            $data=mysqli_fetch_array($query,MYSQLI_ASSOC);

            ?>  


            <h2>ชื่องานนิทรรศการ: &nbsp;&nbsp;&nbsp;<?php echo $data["ev_name"];?></h2>

            <!-- row -->
            <!-- Blog Entries Column -->
            <div class="col-md-8">
               <?php
//ถ้ามีการส่งค่าข้อมูล
               include('connect.php');

               $event_id = null;
               if(isset($_GET["event_id"]))
               {
                $event_id = $_GET["event_id"]; 
            } 

            $p_sql = "SELECT * FROM `plans` WHERE event_id = '".$event_id."' ";
            $p_query = mysqli_query($con,$p_sql);
            $plan=mysqli_fetch_array($p_query,MYSQLI_ASSOC);
   
            ?>
            <img src="_files/_plan/<?php echo $plan["name"];?>">
        </div>


        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
           <div class="row">
            <div class="col-md-8">
                <p>กรุณาเลือกโซนที่คุณต้องการจอง</p>

                <?php
                $z_sql = " SELECT zones.zone_id,zones.name FROM zones, events where zones.event_id = events.event_id and events.event_id = " . $event_id . " ";
                $z_query = mysqli_query($con,$z_sql);?>



                <?php

                $Keyword = 0;

                if (isset($_POST["Keyword"])) {
                  $Keyword = $_POST["Keyword"];
              }
              ?>
              <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>?event_id=<?php echo $data["event_id"];?>">
               <select class="form-control" type="text" id="Keyword" name="Keyword">

                 <?php while ($z_row = mysqli_fetch_array($z_query,MYSQLI_ASSOC)) { ?>
                    <option value="<?php echo $z_row["zone_id"];?>"><?php echo $z_row["name"];?></option>
                    <?php
                }
                ?>
            </select>


        </div>
        <div class="col-md-4">
            <p>&nbsp;&nbsp;&nbsp;</p>
            <input type="submit" value="เลือก" class="btn btn-info">

        </div>

    </form>
    <?php

    include('connect.php');

    $b_sql = "SELECT * FROM booths WHERE zone_id LIKE '%".$Keyword."%' ";
    $bquery = mysqli_query($con,$b_sql);
    ?>

    <table width="600" border="1">
      <tr>
        <th width="100"><div align="center">ชื่อ</div></th>
        <th width="100"><div align="center">ขนาด</div></th> 
        <th width="100"><div align="center">ราคา</div></th> 
        <th width="100"><div align="center">สถานะ</div></th> 
        <th width="100"><div align="center"></div></th> 
    </tr>
    <?php
    while($result=mysqli_fetch_array($bquery,MYSQLI_ASSOC))
    {
        ?>
        <tr>
            <td><?php echo $result["b_name"];?></td>

            <td><?php echo $result["size"];?></td>
            <td><?php echo $result["price"];?></td>
<?php
            if ($result["status"] =="f") {
                echo "<td><p class='text-success'>ว่าง</td>";
            echo "<td><a href='index_order.php?booth_id=$result[booth_id]' class='btn btn-success'>จอง</a></td>";

        }
        elseif ($result["status"] =="w") {
    echo "<td><p class='text-danger'> จองแล้ว </td>.";
 echo "<td></td>.";
    }
    else {
    echo "<td><p class='text-danger'> จองแล้ว </td>.";
 echo "<td></td>.";
    }   



    ?>



    <?php
}
?>


</tr>

</table>
<?php
mysqli_close($con);
?>


</div>








<center>
    <a href="index_show.php">
        <button type="button" class="btn btn-success">ยืนยันการจอง</button>
    </a>
</center>
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