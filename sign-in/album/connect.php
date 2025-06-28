<?php
	$host = "localhost";
	$usr = "root";
	$pwd =  "";
	$db = "ideal_home";

	$conn = mysqli_connect($host,$usr,$pwd,$db) or die ("เชื่อมต่อผ่านข้อมูลไม่ได้");
	mysqli_select_db($conn , "ideal_home") or die ("เลือกฐานข้อมูลไม่ได้");
	mysqli_query($conn,"SET NAMES utf8");
?>
