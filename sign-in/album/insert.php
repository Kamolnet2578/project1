<?php
   include_once("checklogin.php");
   
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IDEAL HOME</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<section $blue: #0d6efd;>
</section>
<center>
<div class="container">
<br>
<div class="row">
    <div class="col-md-4 bg-body-tertiary">
<div class="alert alert-success h4" role="alert">
  IDEAL HOME-เพิ่มสินค้า
</div>
<form method="post" action="" enctype="multipart/form-data">
	ชื่อสินค้า <input type="text" name="pname" required autofocus><br>
    รายละเอียดสินค้า<br>
	<textarea name="pdetail" rows="5" cols="50"></textarea><br>
    ราคา <input type="text" name="pprice" required><br>
    รูปภาพ <input type="file" name="pimages"><br>
    ประเภทสินค้า <select name="ttype">
    <?php	
	include_once("connect.php");
	$sql2 = "SELECT * FROM `dressing` ORDER BY p_name ASC ";
	$rs2 = mysqli_query($conn, $sql2) ;
	while ($data2 = mysqli_fetch_array($rs2) ){
	?>
    	<option value="<?=$data2['p_id'];?>"><?=$data2['p_name'];?></option>
    <?php } ?>
    </select>
    <br><br>
     <a href="carousel/index.php" class="btn btn-info btn-sm">ย้อนกลับ</a>
</form> <hr>


<?php
if(isset($_POST['Submit'])){
	
	//var_dump($_FILES['pimages']['name']); exit;
	$file_name = $_FILES['pimages']['name'] ;
	$ext = substr( $file_name , strpos( $file_name , '.' )+1 ) ;
	
	$sql = "INSERT INTO `dressing` (`p_id`, `p_name`, `p_detail`, `p_price`, `p_picture`, `p_type`) VALUES (NULL, '{$_POST['pname']}', '{$_POST['pdetail']}', '{$_POST['pprice']}', '{$ext}', '{$_POST['ttype']}') ;";
	mysqli_query($conn, $sql)  or die ("เพิ่มข้อมูลสินค้าไม่ได้");
	$idauto = mysqli_insert_id($conn);
	
	copy($_FILES['pimages']['tmp_name'], "images/".$idauto.".".$ext) ;
	
	echo "<script>";
	echo "alert('เพิ่มข้อมูลสินค้าสำเร็จ');";
	echo "window.location='index1.php';";
	echo "</script>";
}
?>



<?php	
	mysqli_close($conn);
?>
</body>
</html>