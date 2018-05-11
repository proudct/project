<?php
ob_start();
session_start();
$id = 0;
	$id = $_SESSION["event_id"];
	// echo $_SESSION["event_id"];
if(!isset($_SESSION["intLineE"]))
{
	 $_SESSION["intLineE"] = 0;
	 $_SESSION["strBoothE_id"][0] = $_GET["booth_id"];
	 $_SESSION["strQtyE"][0] = 1;
	echo "<script>";
	echo "alert(\"ได้ทำการจองแล้ว\");";
	echo "window.history.back()"; //กลับไปหน้าที่แล้ว
	echo "</script>";
}
else
{
	
	$key = array_search($_GET["booth_id"], $_SESSION["strBoothE_id"]);
	if((string)$key != "")
	{
		 $_SESSION["strQtyE"][$key] = $_SESSION["strQtyE"][$key] + 1;
	}
	else
	{
		
		 $_SESSION["intLineE"] = $_SESSION["intLineE"] + 1;
		 $intNewLine = $_SESSION["intLineE"];
		 $_SESSION["strBoothE_id"][$intNewLine] = $_GET["booth_id"];
		 $_SESSION["strQtyE"][$intNewLine] = 1;
	}
	echo "<script>";
	echo "alert(\"บันทึกการจองบูธลงในคำสั่งซื้อแล้ว\");";
	echo "window.history.back()"; //กลับไปหน้าที่แล้ว
	 
	echo "</script>";
}
header("location:index_plan.php?event_id=".$id);
// header("location: index_plan.php?event_id=".$id ");
// echo "<meta http-equiv='refresh' content='0;URL=index_plan.php?event_id=".$id";
?>

<?php?>