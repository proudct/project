<?php

include_once 'connect.php';



for ($i = 1; $i<= (int)$_POST["hdnCount"]; $i++){
	if(isset($_POST["b_name$i"]))
	{
		if($_POST["b_name$i"] != "" &&
			$_POST["size$i"] != "" &&
			$_POST["price$i"] != "" &&	
			$_POST["status$i"] != "" && 
			$_POST["zone_id$i"] != "" && 
			$_POST["create_by$i"] != "")

		{
			$sql = "INSERT INTO booths (zone_id, b_name,size,price,status,create_by)
			VALUES ('".$_POST["zone_id$i"]."',
			'".$_POST["b_name$i"]."',
			'".$_POST["size$i"]."',
			'".$_POST["price$i"]."',
			'".$_POST["status$i"]."',
			'".$_POST["create_by$i"]."')";
			$query=$con->query($sql);
		}
	}
}
Header("Location: admin_status_add_event.php");

?>
