<?php
session_start();
error_reporting(E_NOTICE);

	@session_start();
	include("connectdb.php");
	$sql = "select * from dressing where p_id='{$_GET['id']}' ";
	$rs = mysqli_query($conn, $sql) ;
	$data = mysqli_fetch_array($rs);
	$id = $_GET['id'] ;
	
	if(isset($_GET['id'])) {
		$_SESSION['sid'][$id] = $data['p_id'];
		$_SESSION['sname'][$id] = $data['p_name'];
		$_SESSION['sprice'][$id] = $data['p_price'];
		$_SESSION['sdetail'][$id] = $data['p_detail'];
		$_SESSION['spicture'][$id] = $data['p_picture'];
		@$_SESSION['sitem'][$id]++;
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Carousel Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">

    

    

<link href="../../ip/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../../ip/carousel/carousel.css" rel="stylesheet">
  </head>
  <body>
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">IDEAL HOME</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active-primary" aria-current="page" href="index.php">Home</a>
          </li>
          
		  <li class="nav-item">
          <a href="cart.php"class="nav-link active-primary">สั่งซื้อสินค้า</a>
          </li>
          <li class="nav-item">
          <a href="ordercus.php"class="nav-link active-primary">ประวัติการสั่งซื้อ</a>
          </li>
         
          
          <div class="btn-group" role="group">
    
  </div>
        </ul>
        
        <form method="post" action="" class="d-flex" >
          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
    </div>
  </nav>
</header>

<main>

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="album py-5 bg-body-tertiary">
    <div class="container">
    <blockquote>
    <h2>ตะกร้าสินค้า - IDEAL HOME</h2>
<a href="index3.php" class="btn btn-primary">กลับไปเลือกสินค้า</a> 
<a href="clear2.php" class="btn btn-warning">ลบสินค้าทั้งหมด</a> 
    <?php
if(empty($_SESSION['sid'])) {
?>
<a href="#" class="btn btn-success" onClick="alert('กรุณาเลือกสินค้า');">สั่งซื้อสินค้า</a> 
<?php } else { ?>
<form id="orderForm" action="submit_order.php" method="POST" onsubmit="this.submit.disabled=true;">
    <!-- ข้อมูลฟอร์ม -->
</form>
<a href="record.php" class="btn btn-success">สั่งซื้อสินค้า</a>
<?php } ?>
<table width="100%" class="table">
  <tr>
    <th width="5%">ที่</th>
    <th width="19%">รูปสินค้า</th>
    <th width="24%">ชื่อสินค้า</th>
    <th width="14%">ราคา/ชิ้น</th>
    <th width="15%">จำนวน (ชิ้น)</th>
    <th width="14%">รวม</th>
    <th width="9%">&nbsp;</th>
  </tr>
  <?php
if(!empty($_SESSION['sid'])) {
	foreach($_SESSION['sid'] as $pid) {
		 // ดึงข้อมูลสินค้าแต่ละตัวจากฐานข้อมูล
            $sql_dressing = "SELECT * FROM dressing WHERE p_id='$pid'";
            $rs_dressing = mysqli_query($conn, $sql_dressing);
            $data_dressing = mysqli_fetch_array($rs_dressing);

            // ตรวจสอบว่ามีข้อมูลสินค้าหรือไม่
		
		if ($data_dressing) {
                $img = "images/" . $data_dressing['p_id'] . "." . $data_dressing['p_picture'];
                @$i++;
                $sum[$pid] = $_SESSION['sprice'][$pid] * $_SESSION['sitem'][$pid];
                @$total += $sum[$pid];
?>
    <tr>
      <td><?=$i;?></td>
      <td><img src="<?= $img; ?>" width="200"></td>
      <td><?=$_SESSION['sname'][$pid];?></td>
      <td><?=number_format($_SESSION['sprice'][$pid],0);?></td>
      <td><?=$_SESSION['sitem'][$pid];?></td>
      <td><?=number_format($sum[$pid],0);?></td>
      <td><a href="clear.php?id=<?=$pid;?>" class="btn btn-danger">ลบ</a></td>
      <td></td>
    </tr>
    <?php
		}
	}// end foreach
	?>
    <td colspan="7" height="50" align="center">ไม่มีสินค้าในตะกร้า</td>
  </tr>
  <?php } // end if ?>
</table>
    </div><!-- /.col-lg-4 -->
    </div>
  </div><!-- /.row -->


    <!-- START THE FEATURETTES -->      
    

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>&copy; 2017–2022 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>


    <script src="../../ip/assets/dist/js/bootstrap.bundle.min.js"></script>
   
 
  </body>
</html>
