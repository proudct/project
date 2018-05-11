<?php
session_start();
if(isset($_POST['username'])){
        //connection
  include("connect.php");
        //รับค่า user & password
  $username = $_POST['username'];
  $password = md5($_POST['password']);
        //query


  

  $query_exhibitor="SELECT * FROM exhibitors Where username='".$username."' and password='".$password."' ";


  $result_exhibitor = mysqli_query($con,$query_exhibitor);

  
  if(mysqli_num_rows($result_exhibitor)==1){

                      $row = mysqli_fetch_array($result_exhibitor); //คืนค่าข้อมูลในฐานข้อมูลที่อยู่ในลักษณะเป็นแถว
                      $id = $row["id"];//สำคัญ
                      $_SESSION["Role"] = $row["role"]; //กำหนดว่าเป็น Aหรือ M
                      $_SESSION["Name"] = $row["name"]; //กำหนดว่าเป็น Aหรือ M
                      $_SESSION["status"] = $row["is_enable"];
       
                      if($_SESSION["Role"]=="exhibitor" ){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                        if($_SESSION["status"]=="y" ){
                          $user_id =  $id;
                          $role = $_SESSION["Role"];
                           $name =  $_SESSION["name"];
                           $date = date("Y-m-d H:i:s");
                           $lname = $_SESSION["lname"];
                           $tel = $_SESSION["tel"];
                           $email = $_SESSION["email"];
                           $company = $_SESSION["company"];
                           $address = $_SESSION["address"];
                           $type = $_SESSION["type"];
                           $brandname = $_SESSION["brandname"];
                           $banner = $_SESSION["banner"];

                           $Total = 0;
                           $SumTotal = 0;


                           $sql = "
                           INSERT INTO bookings (booking_date,user_id,role,name,lname,tel,email,company,address,type,brandname,banner)
                           VALUES
                           ('$date','$user_id','$role' ,'$name','$lname' ,'$tel','$email','$company','$address','$type','$brandname','$banner') ";

                           $query = mysqli_query($con,$sql);
                           if(!$query)
                           {
                              echo $con->error;
                              exit();
                          }



                          $strBookingE_id = mysqli_insert_id($con);
                          echo "$strBookingE_id";

                          for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
                          {
                            if($_SESSION["strBoothE_id"][$i] != "")
                            {
                               $sql1 = "
                               INSERT INTO booking_detail (booking_id,booth_id,qty)
                               VALUES
                               ('".$strBookingE_id."','".$_SESSION["strBoothE_id"][$i]."','".$_SESSION["strQtyE"][$i]."') 
                               ";
                               $query1 = mysqli_query($con,$sql1);


                               if(!$query1)
                               {
                                echo "Error Save [".$sql1."]";
                            }

                            $b_sql = "
                            UPDATE booths SET 
                            status = '".$_POST["status"]."' 
                            WHERE booth_id = '".$_SESSION["strBoothE_id"][$i]."'";

                            $b_query = mysqli_query($con,$b_sql);
                            if(!$b_query)
                            {
                                echo "Error Save [".$b_sql."]";
                            }
                        }
                    }

                    mysqli_close($con);

// session_destroy();

                    header("location:index_view_order.php?booking_id=".$strBookingE_id);
                    echo "<script>";
                    echo "alert(\"ยินดีต้อนรับ คุณ: $username\");";
                            echo "window.location = 'index_confirm.php'"; //ไปหน้าเเรกของพนักงาน
                            echo "</script>";
                        }
                        else{
                            echo "<script>";
                            echo "alert(\" ยังไม่ได้รับการอนุมัติ\");";
                        //echo "window.history.back()";
                            echo "</script>";
                        }
                    }
                }else{
                    echo "<script>";
                    echo "alert(\" user หรือ  password ไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง\");";
                        //echo "window.history.back()";
                    echo "</script>";

                    

                }


            }

            ?>



            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="utf-8" />
                <link rel="apple-touch-icon" sizes="76x76" href="img/n/apple-icon.png">
                <link rel="icon" type="image/png" href="img/n/favicon.png">
                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
                <title>MBS | Login</title>
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

            <body class="login-page sidebar-collapse">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
                    <div class="container">
                        <div class="navbar-translate">
                          <img src="_files/logo.png">
                            <a class="navbar-brand" href="index.php">
                        
                            </a>
                            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
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
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url(../assets/img/login.jpg)"></div>
        <div class="container">
            <div class="col-md-4 content-center">
                <div class="card card-login card-plain">

                    <form action="login_E.php" method="post" >  
                        <div class="header header-primary text-center">

                            <h1>LOG IN</h1>
                        </div>
                        <div class="content">
                            <div class="input-group form-group-no-border input-lg">
                               
                                <input type="text" class="form-control" placeholder="USERNAME" id="username" name="username" required>
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                               
                                <input type="password" placeholder="PASSWORD" class="form-control" id="password" name="password" required>
                                <!-- required คือบังคับให้ใส่ข้อมูล -->
                            </div>
                        </div>
                        <div class="footer text-center">
                            <!-- <a href="#pablo" class="btn btn-primary btn-round btn-lg btn-block">SIGN UP</a> -->
                            <button type='submit' name='submit' class='btn btn-primary btn-round btn-lg btn-block'>login</button>
                        </div>
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />


                    </form>

                </div>
            </div>

            
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