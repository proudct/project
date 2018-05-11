<?php
session_start();
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/s/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/s/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/s/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/s/nouislider.min.css"/>

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
                <a class="navbar-brand" href="index.php" rel="tooltip" title="Designed by Invision. Coded by Creative Tim" data-placement="bottom" target="_blank">
                    MBS 
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



<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <br>
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


        <h2>ชื่องานนิทรรศการ: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data["ev_name"];?></h2>
        <!-- row -->
        <div class="row">
           <?php
//ถ้ามีการส่งค่าข้อมูล
           include('connect.php');

           $id = null;
           if(isset($_GET["event_id"]))
           {
            $id = $_GET["event_id"]; 
        } 

        $sql = "SELECT * FROM `event_images` WHERE event_id = '".$id."' ";
        $query = mysqli_query($con,$sql);
        $data=mysqli_fetch_array($query,MYSQLI_ASSOC);

        ?>  
        <div class="col-md-5 col-md-push-2">
         <div id="product-main-img">
            <?php
            $allowed_types=array('jpg','jpeg','gif','png');
            $path = "_files/_event_image/";
            $files1 = scandir($path);
            foreach($files1 as $key=>$value){
                if($key>1){
                    $file_parts = explode('.',$value);
                    $ext = strtolower(array_pop($file_parts));
                    if(in_array($ext,$allowed_types)){
                        echo "<div class='product-preview'>";
                        echo "<img  src='".$path.$value."'/>";;
                        echo "</div>"; 
                    }

                }
            }
            ?>
        </div>
    </div>
    <!-- /Product main img -->

    <!-- Product thumb imgs -->
    <div class="col-md-2  col-md-pull-5">
        <div id="product-imgs">
         <?php
         $allowed_types=array('jpg','jpeg','gif','png');
         $path = "_files/_event_image/";
         $files1 = scandir($path);
         foreach($files1 as $key=>$value){
            if($key>1){
                $file_parts = explode('.',$value);
                $ext = strtolower(array_pop($file_parts));
                if(in_array($ext,$allowed_types)){
                    echo "<div class='product-preview'>";
                    echo "<img  src='".$path.$value."'/>";  
                    echo "</div>"; 
                }

            }
        }
        ?>
    </div>
</div>
<!-- /Product thumb imgs -->

<!-- Product details -->
<div class="col-md-5">
    <div class="product-details">
       <h3 class='my-3'>รายละเอียดเกี่ยวกับงาน</h3>
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
       <p><?php echo $data["ev_caption"];?></p>
        <input type="hidden"  name="event_id" id="event_id" value="<?php echo "$data[event_id]"; ?>">
       <a href='index_plan.php?event_id=<?php echo $data["event_id"];?>' class='btn btn-info'> จองบูธ</a>

   </div>
</div>
<!-- /Product details -->
<!-- /product tab -->
<?php
mysqli_close($con);
?>

</div>
</div>




<!-- jQuery Plugins -->
<script src="js/s/jquery.min.js"></script>
<script src="js/s/bootstrap.min.js"></script>
<script src="js/s/slick.min.js"></script>
<script src="js/s/nouislider.min.js"></script>
<script src="js/s/jquery.zoom.min.js"></script>
<script src="js/s/main.js"></script>



</body>
</html>
