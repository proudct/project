<?php
include_once 'connect.php';

$mysqli = new mysqli('localhost', 'root', '', 'projectdb'); //เชื่อมฐานข้อมูล
$mysqli->query("set names utf8"); //กำหนดภาษา

if($_FILES["plan"]["name"][0] != "")
	{
		

		if(move_uploaded_file($_FILES["plan"]["tmp_name"][0],"_files/_plan/".$_FILES["plan"]["name"][0]))
		{

			//*** Delete Old File ***//			
			unlink("_files/_plan/".$_POST["hdnOldFile"]);
			
			//*** Update New File ***//

$id = null;
if(isset($_GET["event_id"]))
 {
    $id = $_GET["event_id"]; 
} 


 $id = $_POST['event_id'];

		$filename = $_FILES['plan']['name'][0];
		$path = "_files/_plan/".$filename;
$update_by = $mysqli->real_escape_string($_POST['update_by']);

    $sql = "UPDATE plans SET 
   name = '$filename',
   file_path = '$path',
   update_by = '$update_by'

            WHERE event_id = $id ";
		//เก็บข้อมูลลง DB

            if($mysqli->query($sql) == true)
            {
Header("Location: admin_status_event.php");
;
            }
            else{

            }


        
  $initialPreview = array();
$initialPreviewConfig = array();


			

		};
	};
	// echo "<script>alert('Update Complete'); location.href='admin_edit_plan.php';</script>";


?>