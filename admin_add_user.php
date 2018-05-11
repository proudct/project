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

isset($admin_image);
        $name = $mysqli->real_escape_string($_POST['name']); 
        $lname = $mysqli->real_escape_string($_POST['lname']);
        $tel = $mysqli->real_escape_string($_POST['tel']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $address = $mysqli->real_escape_string($_POST['address']);


        $username = $mysqli->real_escape_string($_POST['username']);
        $password = $mysqli->real_escape_string($_POST['password']);



        $role = "admin";
        $is_enable = "y";
        // $create_by = "admin";
        $create_at = date("Y-m-d H:i:s"); 
        //         var_dump( $create_at);
        // exit(0);

        $Cpassword = $mysqli->real_escape_string($_POST['Cpassword']);
        $password = md5($_POST['password']); 
//เพิ่มไฟล์
$upload = $_FILES['admin_image'];
if ($upload <> '') {   //not select file
//โฟลเดอร์ที่จะ upload file เข้าไป 
    $path = "_files/_admin_image/";  

//เอาชื่อไฟล์ที่มีอักขระแปลกๆออก
    $remove_these = array(' ', '`', '"', '\'', '\\', '/', '_');
    $newname = str_replace($remove_these, '', $_FILES['admin_image']['name']);
 
    //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
    $newname = time() . '-' . $newname;
    $path_copy = $path . $newname;
    $path_link = "_files/_admin_image/" . $newname;

//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
    move_uploaded_file($_FILES['admin_image']['tmp_name'], $path_copy);
}
        //การกำหนดให้แปลงรูปรหัสผ่าน
        if($_POST['password']!== $_POST['Cpassword']) {
        

        echo "<script>";
            echo "alert(\"รหัสผ่านไม่ตรงกัน โปรดลองอีกครั้ง !\");";
            echo "window.location = 'admin_add_user.php';"; //ไปหน้าเเรกของพนักงาน
            echo "</script>";


        } else {
            
            echo "<script>";
                echo "alert(\"เพิ่มข้อมูลผู้ดูแลระบบสำเร็จ \");";
                echo "window.location = 'admin_home.php';"; //ไปหน้าเเรกของพนักงาน
                echo "</script>";
             
            $sql = "INSERT INTO admins (name, lname, tel, email, address, username, password, admin_image, role, is_enable)"
            . "VALUES('$name', '$lname', '$tel', '$email', '$address', '$username', '$password','$newname', '$role',  '$is_enable')";
//เก็บข้อมูลลง DB

            if($mysqli->query($sql) == true)
            {

            }
            else{

            }
        }

}

?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png" />
        <link rel="icon" type="image/png" href="img/favicon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>ADMIN | เพิ่มข้อมูลผู้ดูแลระบบ</title>
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


                        <li class="active">
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
                            <a class="navbar-brand" href="admin_add_user.php"> เพิ่มข้อมูลผู้ดูแลระบบ</a>
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
                        <form action="admin_add_user.php" method="post"  enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" data-background-color="red">
                                        <h4 class="title">เพิ่มข้อมูลผู้ดูแลระบบ</h4>
                                        <!-- <p class="category">Here is a subtitle for this table</p> -->
                                    </div>
                                    <div class="card-content table-responsive">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>ชื่อ</label>
                                                    <input class="form-control" id="name" name="name">
                                                </div>
                                            </div>



                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>สกุล</label>
                                                    <input class="form-control" id="lname" name="lname">
                                                </div>
                                            </div>


                                        </div>


                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>เบอร์โทรศัพท์</label>
                                                    <input class="form-control" id="tel" name="tel">
                                                </div>
                                            </div>



                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control" id="email" name="email">
                                                </div>
                                            </div>


                                        </div>
                                       
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>ที่อยู่</label>
                                                    <textarea class="form-control" rows="5" cols="160" id="address" name="address"></textarea>

                                                </div>
                                            </div>

                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>USERNAME</label>
                                                <input class="form-control" type="text" id="username" name="username">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>รหัสผ่าน</label>
                                                <input class="form-control" type="password" id="password" name="password">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>ยืนยันรหัสผ่าน</label>
                                                    <input class="form-control" type="password" id="Cpassword" name="Cpassword">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                

                                    </div>
                                <center>


                                    <button type='reset' name='reset' class='btn  btn-danger'>ยกเลิก</button>
                                    <button type='submit' name='submit' class='btn btn-success'>บันทึก</button>

                                </center>

                        
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
    <script src="hjs/m/demo.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>

    </html>