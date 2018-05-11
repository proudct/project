<?php
include_once 'connect.php';

$mysqli = new mysqli('localhost', 'root', '', 'projectdb'); //เชื่อมฐานข้อมูล
$mysqli->query("set names utf8"); //กำหนดภาษา

if($_FILES["document"]["name"][0] != "")
	{
		

		if(move_uploaded_file($_FILES["document"]["tmp_name"][0],"_files/_document/".$_FILES["document"]["name"][0]))
		{

			//*** Delete Old File ***//			
			unlink("_files/_document/".$_POST["hdnOldFile"]);
			
			//*** Update New File ***//


 $document_id = $_POST['document_id'];

 $event_id = $_POST['event_id'];
		$filename = $_FILES['document']['name'][0];
		$path = "_files/_document/".$filename;
$update_by = $mysqli->real_escape_string($_POST['update_by']);

    $sql = "UPDATE documents SET 
   event_id = 'event_id' 
   name = '$filename',
   file_path = '$path',
   update_by = '$update_by'

            WHERE document_id = $document_id ";
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
