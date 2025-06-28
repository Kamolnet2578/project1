<?php
include_once("connectdb.php");
$sql2 = "SELECT * FROM `type`";
$rs2 = mysqli_query($conn, $sql2);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>IDEAL HOME-เพิ่มข้อมูลประเภทสินค้า</title>
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
    <h2 class="text-center">IDEAL HOME-เพิ่มข้อมูลประเภทสินค้า</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="tname">ชื่อประเภทสินค้า</label>
            <input type="text" name="tname" class="form-control" required autofocus>
        </div>
        <div class="text-center">
            <button type="submit" name="Submit" class="btn btn-primary">บันทึก</button>
            <a href="type.php" class="btn btn-danger">ย้อนกลับ</a>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
if (isset($_POST['Submit'])) {
    // ดึงค่า tname จาก $_POST
    $tname = $_POST['tname'];

    // เตรียมคำสั่ง SQL
    $sql = "INSERT INTO `type` (t_name) VALUES (?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $tname);
        mysqli_stmt_execute($stmt);
        
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "<script>";
            echo "alert('เพิ่มข้อมูลสินค้าสำเร็จ');";
            echo "window.location='type.php';";
            echo "</script>";
        } else {
            die("เพิ่มข้อมูลสินค้าไม่ได้");
        }
        mysqli_stmt_close($stmt);
    } else {
        die("เพิ่มข้อมูลสินค้าไม่ได้");
    }
}

mysqli_close($conn);
?>
</body>
</html>

