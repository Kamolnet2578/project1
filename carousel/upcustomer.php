<?php
include_once("connectdb.php");
$sql1 = "SELECT * FROM `customer` WHERE c_id='{$_GET['cid']}'  " ;
$rs1 = mysqli_query($conn, $sql1);
$data1 = mysqli_fetch_array($rs1);
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
<a class="navbar-brand" href=""><img id="logo" src="1.jpg" width="250" height="250" /></a>
</center>
<div class="container mt-5">
    <h2 class="text-center">IDEAL HOME-แก้ไขข้อมูลส่วนตัว</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pname">ชื่อ-สกุล</label>
            <input type="text" name="cname" class="form-control" required autofocus value="<?=$data1['c_name'];?>">
        </div>
        <div class="form-group">
            <label for="pdetail">E-mail</label>
            <input type="text" name="cemail" class="form-control" required autofocus value="<?=$data1['c_email'];?>">
        </div>
        <div class="form-group">
            <label for="pprice">ที่อยู่</label>
            <input type="text" name="caddress" class="form-control" required value="<?=$data1['c_address'];?>">
        </div>
        <div class="form-group">
            <label for="pprice">เบอร์โทร</label>
            <input type="text" name="cphone" class="form-control" required value="<?=$data1['c_phone'];?>">
        </div>
        <div class="text-center">
            <button type="submit" name="Submit" class="btn btn-primary">บันทึก</button>
            <a href="index3.php" class="btn btn-danger">ย้อนกลับ</a>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
		if(isset($_POST['Submit'])){
			if(empty($cid)) {
        $sql = "UPDATE `customer` SET `c_name` = '{$_POST['cname']}', `c_email` = '{$_POST['cemail']}', `c_address` = '{$_POST['caddress']}', `c_phone` = '{$_POST['cphone']}' WHERE `customer`.`c_id` = '{$_GET['cid']}';";

    } 
    
   	mysqli_query($conn, $sql)  or die ("แก้ไขข้อมูลไม่สำเร็จ");
 
	echo "<script>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location='index3.php';";
	echo "</script>";
}
?>



<?php	
	mysqli_close($conn);
?>
</body>
</html>
