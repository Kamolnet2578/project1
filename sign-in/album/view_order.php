<?php
include_once("checklogin.php");
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>รายการใบสั่งซื้อ</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-size: 1.125rem;
        text-anchor: middle;
            background-color: #FFFFFF;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        .navbar {
            margin-bottom: 20px;
        }
		

        .table {
            margin-top: 20px;
        }

        .container {
            margin-top: 70px;
        }
    </style>
</head>

<body>
    <header>
       <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

    <div class="container-fluid d-flex justify-content-center">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

    </header>

    <div class="container mt-5 pt-5">
    <center>
    <a class="navbar-brand" href="">
    <img src="images/0.jpg" height="150" width="150"></a>
<h1 class="text-center">รายละเอียดใบสั่งซื้อ เลขที่ <?=$_GET['a'];?></h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ที่</th>
                    <th>สินค้า</th>
                    <th>จำนวน</th>
                    <th>ราคา/ชิ้น</th>
                    <th>รวม (บาท)</th>
                </tr>
            </thead>
            <tbody>
  <?php
	include("connectdb.php");
	$sql = "SELECT * FROM orders_detail INNER JOIN dressing ON orders_detail.pid = dressing.p_id WHERE orders_detail.oid = '".$_GET['a']."'";
	$rs = mysqli_query($conn, $sql) ;
	$i = 0;
	$total=0;
	while ($data = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
		$i++;
		$sum = $data['p_price'] * $data['item'] ;
		$total += $sum;	
		?>
 <?php
 
 ?>
	

   <tr>
                    <td><?=$i;?></td>
                    <td><img src="images/<?=$data['p_id'];?>.<?=$data['p_picture'];?>" width="200"><br>รหัสสินค้า: <?=$data['p_id'];?><br>ชื่อสินค้า: <?=$data['p_name'];?></td>
                    <td><?=$data['item'];?></td>
                    <td><?=number_format($data['p_price'],0);?></td>
                    <td><?=number_format($sum,0);?></td>
                </tr>
                 <?php } ?>
                <tr>
                    <td colspan="3"></td>
                    <td class="fw-bold">รวมทั้งสิ้น</td>
                    <td class="fw-bold"><?=number_format($total,0);?></td>
                </tr>
                
  
  </tr>
</table>
<div class="container mt-3">
     <a href="order.php" class="btn btn-primary">ย้อนกลับ</a> 
	<a href="index1.php" class="btn btn-warning">กลับหน้าหลัก</a> 
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>