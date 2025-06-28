<?php
include_once("checklogin.php");
include_once("connect.php");
if(isset($_GET['pid'])){
	$sql = "DELETE FROM dressingroom WHERE `dressingroom`.`p_id` = '{$_GET['pid']}' ";
	mysqli_query($conn,$sql) or die("ลบข้อมูลไม่สำเร็จ");
	
	unlink("images/".$_GET['pid'].".".$_GET['ext']);
	
	echo "<script>";
	echo "alert('ยืนยันการลบ');";
	echo "window.location='index1.php';";
	echo "</script>";
}
?>
