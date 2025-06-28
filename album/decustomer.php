<?php
if(isset($_GET['cid'])){
	include_once("connectdb.php");
	
	$sql="DELETE FROM customer WHERE `customer`.`c_id` = '{$_GET['cid']}' ";
	mysqli_query($conn,$sql) or die ("ลบข้อมูลไม่สำเร็จ");
	echo "<script>";
	echo "alert('ยืนยันการลบ');";
	echo "window.location='customer.php';";
	echo "</script>";
	}
?>