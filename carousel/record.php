<meta charset="utf-8">
<?php
	@session_start();
	include("connectdb.php");
	
if(!isset($_SESSION['cid'])){
	echo "กรุณาเข้าสู่ระบบก่อนทำรายการสั่งซื้อ";
	exit;
} else {
    $cid = $_SESSION['cid']; // ย้ายบรรทัดนี้
	$sql_customer = "SELECT * FROM customer WHERE c_id = '$cid'";
    $result_customer = mysqli_query($conn, $sql_customer);
    
    if(mysqli_num_rows($result_customer) > 0){
        $row_customer = mysqli_fetch_assoc($result_customer);
        $cname = $row_customer['c_name'];
        $caddress = $row_customer['c_address'];
    } else {
        echo "ไม่พบข้อมูลลูกค้า";
        exit;
    }
		$total=0;
		foreach($_SESSION['sid'] as $pid) {
			$sum[$pid] = $_SESSION['sprice'][$pid] * $_SESSION['sitem'][$pid] ;
			@$total += $sum[$pid] ;
		
		}
	$sql = "insert into `orders`(ototal,odate,c_id,c_name,c_address) values('$total', CURRENT_TIMESTAMP, '$cid','$cname','$caddress');" ;
	if (mysqli_query($conn, $sql)){
	$id = mysqli_insert_id($conn);//ดึง id ของ orders
	
	}
	
	//เพิ่มข้อมูลการสั่งซื้อในตาราง orders_detail
	foreach($_SESSION['sid'] as $pid){
		$item = $_SESSION['sitem'][$pid];//จำนวนที่สั่งซื้อ
		$price = $_SESSION['sprice'][$pid];//ราคา
		$sql_detail = "insert into `orders_detail`(oid,pid,item,p_price) values('$id','$pid','$item','$price')";
		mysqli_query($conn,$sql_detail);
	
	}
	//ดึงข้อมูลจากตาราง customer
	
	
		unset($_SESSION['sid']);
		unset($_SESSION['sname']);
		unset($_SESSION['sprice']);
		unset($_SESSION['sdetail']);
		unset($_SESSION['spicture']);
		unset($_SESSION['sitem']);
		
echo "<meta http-equiv=\"refresh\" content=\"0;URL=clear2.php\">";
	}
?>