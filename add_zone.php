
<?php
ini_set('display_errors', 1);
error_reporting(~0);

include_once 'connect.php';

$mysqli = new mysqli('localhost', 'root', '', 'projectdb'); //เชื่อมฐานข้อมูล
$mysqli->query("set names utf8"); //กำหนดภาษา

for ($i = 1; $i<= (int)$_POST["hdnCount"]; $i++){
if(isset($_POST["name$i"]))
{
if($_POST["name$i"] != "" &&
$_POST["event_id$i"] != "" && $_POST["create_by$i"] != "")
{
$sql = "INSERT INTO zones (event_id, name,create_by)
VALUES ('".$_POST["event_id$i"]."','".$_POST["name$i"]."','".$_POST["create_by$i"]."')";
            if($mysqli->query($sql) == true)
            {

            }
            else{

            }
}
}
}
Header("Location: admin_status_add_event.php");

?>
