<?php
include_once("checklogin.php");
include_once("connect.php");
$sql1 = "SELECT * FROM `dressingroom` WHERE p_id='{$_GET['pid']}' " ;
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
<a class="navbar-brand" href=""><img src="images/0.jpg" width="150" height="150" /></a>
</center>
<div class="container mt-5">
    <h2 class="text-center">IDEAL HOME-แก้ไขข้อมูลสินค้า</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pname">ชื่อสินค้า</label>
            <input type="text" name="pname" class="form-control" required autofocus value="<?=$data1['p_name'];?>">
        </div>
        <div class="form-group">
            <label for="pdetail">รายละเอียดสินค้า</label>
            <textarea name="pdetail" class="form-control" rows="5"><?=$data1['p_detail'];?></textarea>
        </div>
        <div class="form-group">
            <label for="pprice">ราคา</label>
            <input type="text" name="pprice" class="form-control" required value="<?=$data1['p_price'];?>">
        </div>
        <div class="form-group">
            <label for="pimg">รูปภาพ</label>
            <input type="file" name="pimg" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="ptype">ประเภทสินค้า</label>
            <select name="ptype" class="form-control">
                <?php
                $sql = "SELECT * FROM `type` ORDER BY t_name ASC ";
                $rs = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($rs)) {
                ?>
                    <option value="<?=$data['t_id'];?>" <?=($data1['p_type']==$data['t_id'])?"selected":"";?>><?=$data['t_name'];?></option>
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
