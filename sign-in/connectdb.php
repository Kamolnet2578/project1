<meta charset="utf-8">
<?php
$host = "localhost";
$usr = "root";
$pwd = "";
$dbName = "sale";

$conn = mysqli_connect($host, $usr, $pwd,$dbName) or die ("เชื่อมต่อฐานข้อมูลไม่ได้") ;
mysqli_select_db($conn, "sale") ;
mysqli_query($conn, "set names utf8");
?>