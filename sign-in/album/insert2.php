<?php
include_once("../../ip/album/checklogin.php");
include_once("../../ip/album/connect.php");
$sql2 = "SELECT * FROM `dressingroom`" ;
$rs2 = mysqli_query($conn, $sql2);
$data2 = mysqli_fetch_array($rs2);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>IDEAL HOME-แก้ไขข้อมูลสินค้า</title>
    <style>
        .form-group {
            text-align: left;
        }
    </style>
</head>
<body>
<center>
<a class="navbar-brand" href=""><img id="logo" src="../../ip/album/1.jpg" width="250" height="250" /></a>
</center>
<div class="container mt-5">
    <h2 class="text-center">IDEAL HOME-เพิ่มสินค้า</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pname">ชื่อสินค้า</label>
            <input type="text" name="pname" class="form-control" required autofocus value="">
        </div>
        <div class="form-group">
            <label for="pdetail">รายละเอียดสินค้า</label>
            <textarea name="pdetail" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="pprice">ราคา</label>
            <input type="text" name="pprice" class="form-control" required value="">
        </div>
        <div class="form-group">
            <label for="pimg">รูปภาพ</label>
            <input type="file" name="pimg" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="ptype">ประเภทสินค้า</label>
            <select name="ptype" class="form-control">
               <?php	
	include_once("../../ip/album/connect.php");
	$sql2 = "SELECT * FROM `type` ORDER BY t_name ASC ";
	$rs2 = mysqli_query($conn, $sql2) ;
	while ($data2 = mysqli_fetch_array($rs2) ){
	?>
    	<option value="<?=$data2['t_id'];?>"><?=$data2['t_name'];?></option>
    <?php } ?>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" name="Submit" class="btn btn-primary">บันทึก</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
if(isset($_POST['Submit'])){
	
	//var_dump($_FILES['pimg']['name']); exit;
	$file_name = $_FILES['pimg']['name'] ;
	$ext = substr( $file_name , strpos( $file_name , '.' )+1 ) ;
	
	$sql = "INSERT INTO `dressingroom` (`p_id`, `p_name`, `p_detail`, `p_price`, `p_picture`, `p_type`) VALUES (NULL, '{$_POST['pname']}', '{$_POST['pdetail']}', '{$_POST['pprice']}', '{$ext}', '{$_POST['ptype']}') ;";
	mysqli_query($conn, $sql)  or die ("เพิ่มข้อมูลสินค้าไม่ได้");
	$idauto = mysqli_insert_id($conn);
	
	copy($_FILES['pimg']['tmp_name'], "imags/".$idauto.".".$ext) ;
	
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
