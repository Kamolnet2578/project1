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
<div class="container">
<br>
<div class="row">
    <div class="col-md-4 bg-body-tertiary">
<div class="alert alert-success h4" role="alert">
  IDEAL HOME-สมัครสมาชิก
</div>
<form method="post" action="" enctype="multipart/form-data">
	Email <input type="text" name="cemail" required autofocus><br>
    Password <input type="text" name="cpassword" required autofocus><br>
	ชื่อ-สกุล <input type="text" name="cname" required autofocus><br>
    
    ที่อยู่<br>
	<textarea name="caddress" rows="5" cols="50"></textarea><br>
    เบอร์โทร <input type="text" name="cphone" required autofocus><br>
    
    <?php	
	include_once("connectdb.php");
	$sql2 = "SELECT * FROM `customer` ORDER BY c_name DESC ";
	$rs2 = mysqli_query($conn, $sql2) ;
	while ($data2 = mysqli_fetch_array($rs2) ){
	?>
    	
    <?php } ?>
    </select>
    <br><br>
     <button type="submit" name="Submit"class="btn btn-success btn-sm">สมัครสมาชิก</button>
     <button type="submit" name="Submit"class="btn btn-danger">ยกเลิก</button>
</form> <hr>


<?php
if(isset($_POST['Submit'])){
	
    if(empty($_EMAIL['cname']['name'])) {
        $sql = "INSERT `customer` SET `c_email` = '{$_POST['cemail']}', `c_password` = '{$_POST['cpassword']}', `c_name` = '{$_POST['cname']}', `c_address` =  '{$_POST['caddress']},c_phone ='{$_POST['cphone']}'";

    } else {
        $email_name = $_EMAIL['cname']['name'] ;
        $ext = substr( $email_name , strpos( $email_name , '.' )+1 ) ;
        $sql = "INSERT `customer` SET `c_email` = '{$_POST['cemail']}', `c_password` = '{$_POST['cpassword']}', `c_name` = '{$_POST['cname']}', `c_address` =  '{$_POST['caddress']}',`c_phone` = '{$_POST['c_phone']}'";
    }
    
   	mysqli_query($conn, $sql2)  or die ("สมัครสมาชิกไม่สำเร็จ");
 
	echo "<script>";
	echo "alert('สมัครสมาชิกสำเร็จ');";
	echo "window.location='login-customer.php';";
	echo "</script>";
}
?>



<?php	
	mysqli_close($conn);
?>
</body>
</html>