<?php
error_reporting(0);
?>
<?php
include_once("checklogin.php");
session_start();
	include("connectdb.php");
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
            background-color: #ffffff;
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
<body>
<center>
    <a class="navbar-brand" href="">
    <img src="images/0.jpg" height="150" width="150"></a>
<h1>IDEAL HOME-รายการสั่งซื้อ</h1>
<br>
<div class="container border">

<table id="myTable" class="table table-striped" style="width:100%">

        <thead>
            <tr>
              <th width="16%">&nbsp;</th>
              <th width="15%">เลขที่คำสั่งซื้อ</th>
              <th width="12%">วันที่</th>
                <th width="10%">ราคารวม</th>
                <th width="11%">รหัสลูกค้า</th>
                <th width="14%">ขื่อลูกค้า</th>
                <th width="22%">ที่อยู่</th>
            </tr>
        </thead>
        <tbody>
        
  <?php
		include_once('connectdb.php');
		
if (isset($_SESSION['cid'])) {
    $c_id = $_SESSION['cid'];
    $c_id = mysqli_real_escape_string($conn, $c_id);
}
    $sql = "SELECT * FROM orders WHERE c_id ORDER BY oid DESC";
    $rs = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($rs)) {
            ?>
        
            <tr>
            <td><a href="view_order.php?a=<?=$data['oid'];?>"type="button" class="btn btn-sm btn btn-primary">ดูรายละเอียด</a></td>
            <td><?=$data['oid'];?></td>
                <td><?=$data['odate'];?></td>
                <td><?=number_format($data['ototal'],0);?></td>
                <td><?=$data['c_id'];?></td>
                <td><?=$data['c_name'];?></td>
                <td><?=$data['c_address'];?></td>
                 
                </tr
            
            ><?php
		}
	
		mysqli_close($conn);
		?>  
        <tr>          
          </tfoot>
    </table>
    </div>
    <br>
    <center>
    <td><a href="index1.php"type="button" class="btn btn-danger btn-sm">
  เสร็จสิ้น</a></td>
	</center>
</body>
</html>