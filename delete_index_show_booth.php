<?php
	ob_start();
	session_start();
	
	if(isset($_GET["Line"]))
	{
		$Line = $_GET["Line"];
		$_SESSION["strBoothE_id"][$Line] = "";
		$_SESSION["strQtyE"][$Line] = "";
	}
	header("location:index_show.php");
?>

<?php ?>