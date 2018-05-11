<?php
	ob_start();
	session_start();
	
	if(isset($_GET["Line"]))
	{
		$Line = $_GET["Line"];
		$_SESSION["strBooth_id"][$Line] = "";
		$_SESSION["strQty"][$Line] = "";
	}
	header("location:show.php");
?>

<?php ?>