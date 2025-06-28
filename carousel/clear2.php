<?php
	session_start();
	if(isset($_SESSION['sid'])){
		unset($_SESSION['sid']);
		unset($_SESSION['sname']);
		unset($_SESSION['sprice']);
		unset($_SESSION['sdetail']);
		unset($_SESSION['spicture']);
		unset($_SESSION['sitem']);
		
	}

	echo "<meta http-equiv=\"refresh\" content=\"2;URL=index3.php\">";
	//header("Location: index3.php");

?>
<meta charset="utf-8">
