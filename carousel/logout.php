<?php
	error_reporting(0);
	session_start();
	unset($_session['cid']);
	unset($_session['cname']);
	
	session_destroy();
	echo "<script>";
	echo "window.location='../carousel/index.php';";
	echo "</script>";
?>