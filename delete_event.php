<?php
include_once 'connect.php';
$id = null;
if(isset($_GET["event_id"]))
 {
    $id = $_GET["event_id"]; 
} 
    $sql = "DELETE FROM events

            WHERE event_id = '".$id."' ";

    $query = mysqli_query($con,$sql);

    if(!$query) {
  echo "<script>";
                echo "alert(\"ลบข้อมูลผู้ดูแลระบบไม่สำเร็จ \");";
                echo "window.location = 'admin_status_event.php;"; //ไปหน้าเเรกของพนักงาน
                echo "</script>";
                 } else {
            
            echo "<script>";
                echo "alert(\"ลบข้อมูลผู้ดูแลระบบสำเร็จ \");";
                echo "window.location = 'admin_status_event.php';"; //ไปหน้าเเรกของพนักงาน
                echo "</script>";
    }

    mysqli_close($con);
?>


          

