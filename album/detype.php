<?php
if(isset($_GET['tid'])){
	include_once("connectdb.php");
	
	$sql="DELETE FROM type WHERE `type`.`t_id` = '{$_GET['tid']}' ";
	mysqli_query($conn,$sql) or die ("ลบข้อมูลไม่สำเร็จ");
	echo "<script>";
	echo "alert('ลบข้อมูลสำเร็จ');";
	echo "window.location='type.php';";
	echo "</script>";
	}
?>