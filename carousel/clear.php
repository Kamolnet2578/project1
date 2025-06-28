<meta charset="utf-8">
<?php
	session_start();
	$id = $_GET['id'] ;
	unset($_SESSION['sid'][$id]) ;
	unset($_SESSION['sname'][$id]) ;
	unset($_SESSION['sprice'][$id]) ;
	unset($_SESSION['sdetail'][$id]) ;
	unset($_SESSION['spicture'][$id]) ;
	unset($_SESSION['sitem'][$id]) ;
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=cart.php\">";

?>
