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






    $sql = "UPDATE events SET 
            ev_name = '".$_POST["ev_name"]."' ,
            ev_caption = '".$_POST["ev_caption"]."' ,
            ev_dateS = '".$_POST["ev_dateS"]."' ,
            ev_dateF = '".$_POST["ev_dateF"]."' ,
            ev_dateRS = '".$_POST["ev_dateRS"]."' ,
            ev_dateRF = '".$_POST["ev_dateRF"]."',
            status = '".$_POST["status"]."',
            update_by = '".$_POST["update_by"]."'

            WHERE event_id = '".$_POST["id"]."' ";


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