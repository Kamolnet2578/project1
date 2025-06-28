<?php
include_once("checklogin.php");
include_once("connectdb.php");
$sql1 = "SELECT * FROM `type` WHERE t_id='{$_GET['tid']}' " ;
$rs1 = mysqli_query($conn, $sql1);
$data1= mysqli_fetch_array($rs1);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>IDEAL HOME-แก้ไขประเภทสินค้า</title>
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
    <h2 class="text-center">IDEAL HOME-แก้ไขประเภทสินค้า</h2>
    <form method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
        
        <div class="form-group">
            <label for="tname">ชื่อประเภทสินค้า</label>
            <input type="text" name="tname" class="form-control" required autofocus value="<?=$data1['t_name'];?>">
           
        

                <?php
                $sql = "SELECT * FROM `type` ORDER BY t_id ASC ";
                $rs = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($rs)) {
                ?>
                <?php } ?>
            
            </div>
        <div class="text-center">
          <button type="submit" name="Submit" class="btn btn-primary">บันทึก</button>
          <a href="type.php" class="btn btn-success">ย้อนกลับ</a>
      </div>
       
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
if(isset($_POST['Submit'])){
		if(empty($_FILES['tname']['name'])) {
        $sql = "UPDATE `type` SET  `t_name` = '{$_POST['tname']}' WHERE `type`.`t_id` = '{$_GET['tid']}';";

    } 
    
   	mysqli_query($conn, $sql)  or die ("แก้ไขข้อมูลประเภทสินค้าไม่ได้");
 
	echo "<script>";
	echo "alert('แก้ไขข้อมูลประเภทสินค้าสำเร็จ');";
	echo "window.location='type.php';";
	echo "</script>";
}
?>



<?php	
	mysqli_close($conn);
?>
</body>
</html>
