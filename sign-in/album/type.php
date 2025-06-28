<?php
include_once("checklogin.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IDEAL-HOME</title>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>

<script>
	$(document).ready( function () {
    $('myTable').DataTable();
} );
</script>
</head>

<body>
<center>
<a class="navbar-brand" href=""><img src="images/0.jpg" width="150" height="150" /></a>
<h1>IDEAL HOME-ประเภทสินค้า</h1>
<div class="container border">

<table id="myTable" class="table table-striped" style="width:100%">

        <thead>
            <tr>
              <th width="8%">แก้ไข</th>
              <th width="9%">ลบ</th>
                <th width="5%">ID-type</th>
                <th width="13%">ชื่อประเภท</th>
               
                
            </tr>
        </thead>
        <tbody>
        
        <?php
		include_once('connectdb.php');
		$sql = "SELECT * FROM `type`";
		$rs = mysqli_query($conn,$sql);
		while ($data = mysqli_fetch_array($rs)) {
		?>
            <tr>
            <td><a href="uptype.php?tid=<?=$data['t_id'];?>"type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil">
            </i> แก้ไข</a></td>
            
              <td><a href="detype.php?tid=<?=$data['t_id'];?>"type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash">
              </i>ลบ</a></td>
              
              
              	<td><?=$data['t_id'];?></td>
                <td><?=$data['t_name'];?></td>
                
            </tr>
            <?php
		}
		mysqli_close($conn);
		?>  
        <tr>          
          </tfoot>
    </table>
    </div>
    
    <center>
    <td><a href="index1.php "type="button" class="btn btn-primary btn-sm">
  เสร็จสิ้น</a></td>
  <td><a href="intype.php"type="button" class="btn btn-success btn-sm">
 เพิ่มประเภทสินค้า</a></td>
	</center>
</body>
</html>