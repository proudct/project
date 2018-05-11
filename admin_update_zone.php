
<?php

include_once 'connect.php';

$mysqli = new mysqli('localhost', 'root', '', 'projectdb'); //เชื่อมฐานข้อมูล
$mysqli->query("set names utf8"); //กำหนดภาษา




$id = null;
if(isset($_GET["zone_id"]))
{
    $id = $_GET["zone_id"]; 
} 



    $sql = "UPDATE zones SET 
            name = '".$_POST["name"]."' ,

            update_by = '".$_POST["update_by"]."'


            WHERE zone_id = '".$_POST["zone_id"]."' ";


//เก็บข้อมูลลง DB
        
    $query = mysqli_query($con,$sql);

    if(!$query) {
  echo "<script>";
                echo "alert(\"อัพเดทข้อมูลผู้ดูแลระบบไม่สำเร็จ \");";
                echo "window.location = 'admin_edit_event.php;"; //ไปหน้าเเรกของพนักงาน
                echo "</script>";
                 } else {
            
            echo "<script>";
                echo "alert(\"อัพเดทข้อมูลผู้ดูแลระบบสำเร็จ \");";
                echo "window.location = 'admin_status_event.php';"; //ไปหน้าเเรกของพนักงาน
                echo "</script>";
    }


?>