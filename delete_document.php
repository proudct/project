<?php
include_once 'connect.php';
$id = null;
if(isset($_GET["document_id"]))
 {
    $id = $_GET["document_id"]; 
} 
    $sql = "DELETE FROM documents

            WHERE document_id = '".$id."' ";

    $query = mysqli_query($con,$sql);

    if(!$query) {
  echo "<script>";
                echo "alert(\"ลบข้อมูลเอกสารไม่สำเร็จ \");";
                echo "window.location = 'admin_edit_document.php;"; //ไปหน้าเเรกของพนักงาน
                echo "</script>";
                 } else {
            
            echo "<script>";
                echo "alert(\"ลบข้อมูลเอกสารสำเร็จ \");";
                echo "window.location = 'admin_edit_document.php';"; //ไปหน้าเเรกของพนักงาน
                echo "</script>";
    }

    mysqli_close($con);
?>


          
