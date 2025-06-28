<?php
session_start();
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
		
		.custom-navbar {
    background-color: #B8926A;
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
    <img src="images/logo.jpg" height="150" width="150"></a>
        <h1>รายการใบสั่งซื้อ</h1>
        <div class="border">
            <table id="myTable" class="table table-striped table-hover" style="width:100%">
                <thead class="table-dark">
                    <tr>
                        <th>ดูรายละเอียด</th>
                        <th>เลขที่ใบสั่งซื้อ</th>
                        <th>วันที่</th>
                        <th>ราคารวม</th>
                        <th>ลูกค้า</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("connectdb.php");
                    if (isset($_SESSION['cid'])) {
                        $c_id = $_SESSION['cid'];
                        $c_id = mysqli_real_escape_string($conn, $c_id);
                    }
                    $sql = "SELECT * FROM orders WHERE c_id = '$c_id' ORDER BY oid DESC";
                    $rs = mysqli_query($conn, $sql);
                    while ($data = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
                    ?>
                    <tr>
                        <td><a href="view_ordercus.php?a=<?=$data['oid'];?>">ดูรายละเอียด</a></td>
                        <td><?=$data['oid'];?></td>
                        <td><?=$data['odate'];?></td>
                        <td><?=number_format($data['ototal'],0);?></td>
                        <td><?=$data['c_id'];?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container mt-3">
     <ul class="pagination d-flex justify-content-end">
        <li class="page-item"><a class="page-link text-dark" href="cart.php">ย้อนกลับ</a></li>
    </ul>
</div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>