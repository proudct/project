<?php
include_once 'connect.php';
$id = null;
if(isset($_GET["exhibitor_id"]))
 {
    $id = $_GET["exhibitor_id"]; 
} 
    $sql = "DELETE FROM exhibitors

            WHERE id = '".$id."' ";

    $query = mysqli_query($con,$sql);

    if(!$query) {
  echo "<script>";
                echo "alert(\"ลบข้อมูลผู้ดูแลระบบไม่สำเร็จ \");";
                echo "window.location = 'admin_status_user.php;"; //ไปหน้าเเรกของพนักงาน
                echo "</script>";
                 } else {
            
            echo "<script>";
                echo "alert(\"ลบข้อมูลผู้ดูแลระบบสำเร็จ \");";
                echo "window.location = 'admin_status_user.php';"; //ไปหน้าเเรกของพนักงาน
                echo "</script>";
    }

    mysqli_close($con);
?>


          

