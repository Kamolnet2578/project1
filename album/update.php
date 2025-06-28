<?php
include_once("checklogin.php");
include_once("connect.php");
$sql1 = "SELECT * FROM `dressingroom` WHERE p_id='{$_GET['pid']}' " ;
$rs1 = mysqli_query($conn, $sql1);
$data1 = mysqli_fetch_array($rs1);
?>
<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>IDEAL HOME</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<center>
<a class="navbar-brand" href=""><img src="images/0.jpg" width="150" height="150" /></a>
</center>
<section $blue: #0d6efd;>
</section>
<div class="container">
<br>
<div class="row">
    <div class="col-md-4 bg-body-tertiary">
<div class="alert alert-light" role="alert">
  IDEAL HOME-แก้ไขสินค้า
</div>
<center>
<form method="POST" action="">
	ชื่อสินค้า <input type="text" name="pname" required autofocus value="<?=$data1['p_name'];?>"><br>
    รายละเอียดสินค้า<br>
	<textarea name="pdetail" rows="5" cols="50"><?=$data1['p_detail'];?></textarea><br>
    ราคา <input type="text" name="pprice" required value="<?=$data1['p_price'];?>"><br>
    รูปภาพ <input type="file" name="pimg"><br>
    ประเภทสินค้า 
    <select name="ptype">
    <?php	
	
	$sql = "SELECT * FROM `type` ORDER BY t_name ASC ";
	$rs = mysqli_query($conn, $sql) ;
	while ($data = mysqli_fetch_array($rs) ){
	?>
    	<option value="<?=$data['t_id'];?>"<?=($data1['p_type']==$data['t_id'])?"selected":"";?>><?=$data['t_name'];?></option>
    <?php } ?>
    </select>
    <br><br>
  <button type="submit" name="Submit"class="btn btn-primary">บันทึก</button>
</form>
</center>
 </div>
    
  </div>
</div>

<?php
if(isset($_POST['Submit'])){
	
    if(empty($_FILES['ppicture']['name'])) {
        $sql = "UPDATE `dressingroom` SET `p_name` = '{$_POST['pname']}', `p_detail` = '{$_POST['pdetail']}', `p_price` = '{$_POST['pprice']}', `p_type` = '{$_POST['ptype']}' WHERE `dressingroom`.`p_id` = '{$_GET['pid']}';";

    } 
    
   	mysqli_query($conn, $sql)  or die ("แก้ไขข้อมูลสินค้าไม่ได้");
 
	echo "<script>";
	echo "alert('แก้ไขข้อมูลสินค้าสำเร็จ');";
	echo "window.location='index1.php';";
	echo "</script>";
}
?>



<?php	
	mysqli_close($conn);
?>
</body>
</html>