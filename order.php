<?php
ob_start();
session_start();
	
if(!isset($_SESSION["intLine"]))
{
	 $_SESSION["intLine"] = 0;
	 $_SESSION["strBooth_id"][0] = $_GET["booth_id"];
	 $_SESSION["strQty"][0] = 1;
	echo "<script>";
	echo "alert(\"ได้ทำการจองแล้ว\");";
	echo "window.history.back()"; //กลับไปหน้าที่แล้ว
	echo "</script>";
}
else
{
	
	$key = array_search($_GET["booth_id"], $_SESSION["strBooth_id"]);
	if((string)$key != "")
	{
		 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
	}
	else
	{
		
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strBooth_id"][$intNewLine] = $_GET["booth_id"];
		 $_SESSION["strQty"][$intNewLine] = 1;
	}
	echo "<script>";
	echo "alert(\"บันทึกการจองบูธลงในคำสั่งซื้อแล้ว\");";
	echo "window.history.back()"; //กลับไปหน้าที่แล้ว
	// header("location:show.php");
	echo "</script>";
}
?>

<?php?>