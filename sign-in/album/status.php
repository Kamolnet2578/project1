<?php
session_start();
include("connectdb.php");
error_reporting(0);
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>รายละเอียดการจัดส่ง</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<center>
    <h1>รายละเอียดการจัดส่ง</h1>
    <div class="container border">
        <table class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ชื่อ-สกุล</th>
                    <th>Email</th>
                    <th>ที่อยู่</th>
                    <th>Phone</th>
                    <th>สถานะการจัดส่ง</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // ตรวจสอบว่ามีการส่งค่า cid และ a (order id) เข้ามาหรือไม่
            if (isset($_GET['cid']) && isset($_GET['a'])) {
                // รับค่า cid และ a
                $c_id = mysqli_real_escape_string($conn, $_GET['cid']);
                $order_id = mysqli_real_escape_string($conn, $_GET['a']);
                
                // แสดงค่า cid และ order_id ที่ได้รับ
                echo "<p>Received c_id: $c_id</p>";
                echo "<p>Received order_id: $order_id</p>";

                // SQL query เพื่อดึงข้อมูลลูกค้าและสถานะการจัดส่งที่สั่งออเดอร์นั้น
                $sql = "SELECT orders.*, customer.*, orders.status AS order_status FROM orders 
                        INNER JOIN customer ON orders.cid = customer.c_id 
                        WHERE orders.oid = '$order_id' AND customer.c_id = '$c_id'";
                
                // รัน query
                $rs = mysqli_query($conn, $sql);

                // ตรวจสอบผลลัพธ์การ query
                if (mysqli_num_rows($rs) > 0) {
                    // แสดงข้อมูลลูกค้าและสถานะการจัดส่ง
                    while ($data = mysqli_fetch_array($rs)) {
                        ?>
                        <tr>
                            <td><?=$data['c_id'];?></td>
                            <td><?=$data['c_name'];?></td>
                            <td><?=$data['c_email'];?></td>
                            <td><?=$data['c_address'];?></td>
                            <td><?=$data['c_phone'];?></td>
                            <td><?=$data['order_status'];?></td>
                        </tr>
                        <?php
                    }
                } else {
                    // ถ้าไม่มีข้อมูลแสดงข้อความนี้
                    echo "<tr><td colspan='6' class='text-center'>ไม่มีข้อมูลสำหรับออเดอร์หรือรหัสลูกค้านี้</td></tr>";
                }
            } else {
                // ถ้าไม่มีการส่งค่า cid หรือ order id
                echo "<tr><td colspan='6' class='text-center'>ไม่มีข้อมูล</td></tr>";
            }
            mysqli_close($conn);
            ?>
            </tbody>
        </table>
    </div>
    <a href="order.php" type="button" class="btn btn-danger btn-sm">เสร็จสิ้น</a>
</center>
</body>
</html>
