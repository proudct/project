<?php session_start();?>
<?php
if (!$_SESSION["UserID"]){  //check session

      Header("Location: login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form

}else{
    //$_SESSION['frmAction'] = md5('itoffside.com' . rand(1, 9999));
}

$_SESSION['message'] = ''; /*เเสดงข้อความ Error*/


include_once 'connect.php';


  $name = $_POST["name"];
  $tel = $_POST["tel"];
  $email = $_POST["email"];
$address = $_POST["address"];
$username = $_POST["username"];
$password = $_POST["password"];
$is_enable = $_POST["is_enable"];
$id = $_POST["id"];

    $sql = "UPDATE exhibitors SET 
            name = '$name' ,
            tel = '$tel' ,
            email = '$email' ,
            address = '$address' ,
            username = '$username' ,
            password = '$password' ,
            is_enable = '$is_enable'

            WHERE id = '$id' ";


//เก็บข้อมูลลง DB
        


    $query = mysqli_query($con,$sql);

    if(!$query) {
  echo "<script>";
                echo "alert(\"อัพเดทข้อมูลผู้ดูแลระบบไม่สำเร็จ \");";
                echo "window.location = 'admin_edit_exhibitor.php;"; //ไปหน้าเเรกของพนักงาน
                echo "</script>";
                 } else {
            
            echo "<script>";
                echo "alert(\"อัพเดทข้อมูลผู้ดูแลระบบสำเร็จ \");";
                echo "window.location = 'admin_status_user.php';"; //ไปหน้าเเรกของพนักงาน
                echo "</script>";
    }

    mysqli_close($con);
?>
          



