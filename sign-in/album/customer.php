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
<a class="navbar-brand" href="">
    <img src="images/0.jpg" height="150" width="150"></a>
<h1>IDEAL HOME-สมาชิก</h1>
<br>
<div class="container border">

<table id="myTable" class="table table-striped" style="width:100%">

        <thead>
            <tr>
              <th width="16%">แก้ไข</th>
              <th width="16%">ลบ</th>
                <th width="10%">ID</th>
                <th width="20%">ชื่อ-สกุล</th>
                 <th width="20%">Email</th>
                 
                <th width="38%">ที่อยูู่</th>
                 <th width="20%">Phone</th>
                 
            </tr>
        </thead>
        <tbody>
        
        <?php
		include_once('connectdb.php');
		$sql = "SELECT * FROM customer";
		$rs = mysqli_query($conn,$sql);
		while ($data = mysqli_fetch_array($rs)) {
		?>
            <tr>
            <td><a href="upcustomer.php?cid=<?=$data['c_id'];?>"type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil">
            </i> แก้ไข</a></td>
            
              <td><a href="decustomer.php?cid=<?=$data['c_id'];?>"type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash">
              </i>ลบ</a></td>
              	<td><?=$data['c_id'];?></td>
                <td><?=$data['c_name'];?></td>
                 <td><?=$data['c_email'];?></td>
                <td><?=$data['c_address'];?></td>
                  <td><?=$data['c_phone'];?></td>
                
            </tr>
            <?php
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