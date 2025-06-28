<?php
session_start();
unset($_SESSION['cid']);
unset($_SESSION['cname']);

echo "<script>";
echo "window.location = '../sign-in/index1.php';";
echo "</script>";
?>