<?php
	session_start();
	require "connect.php";
	$makhachsan = $_GET['MaKhachSan'];
	$sql_hotel="SELECT * FROM `khachsan` WHERE MaKhachSan='$makhachsan'";
	$result_hotel = $conn->query($sql_hotel);
?>
<?php
	if (isset($_POST['delete'])) {
		if (isset($_POST['checkbox'])) {
			$checkbox = $_POST['checkbox'];
			foreach ($checkbox as $id) {
				$sql = "DELETE FROM khachsan_khieunai WHERE Makhieunai_KS = '$id'";
				$conn->query($sql);
				header("location: report.php?MaKhachSan={$makhachsan}");
			}
		}
	}
?>
<?php
	if(isset($_SESSION['username'])) {
	    $username = $_SESSION['username'];
	    $sql_info_admin = "SELECT * FROM nhanvien WHERE `username` = '$username'";
	    $result_info_admin = $conn->query($sql_info_admin);
	    $row_info_admin = $result_info_admin->fetch_assoc();
	}
?>
<?php
	$sql_report="SELECT Makhieunai_KS,khachhang.MaKhachHang,MaKhachSan,khachsan_khieunai_lydo.lydo,khachsan_khieunai.ThoiGian,khachhang.TenKhachHang,khachhang.SDT 
	FROM `khachsan_khieunai`,`khachhang`,`khachsan_khieunai_lydo` WHERE makhachsan={$makhachsan} AND khachsan_khieunai.MaKhachHang=khachhang.MaKhachHang AND khachsan_khieunai.Lydo=khachsan_khieunai_lydo.id" ;
	$result_report = $conn->query($sql_report);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/grid.css">
		<!-- Test -->
		<link rel="stylesheet" href="../../../fonts/fontawesome-free-5.15.4-web/css/all.css">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="../../../grid/grid.css">
		<link rel="stylesheet" href="admin.css">
		<link rel="stylesheet" href="assets/css/list.css">
		<link rel="stylesheet" href="css/dark_mode.css">
		<title>Khiếu nại khách sạn</title>
		<style>
			.alert{
				margin: auto;
				width: 80%;
				border: 3px solid wheat;
				color: whitesmoke;
				background-color: red;
				padding: 10px;
				text-align: center;
				font-size: 100px;
			}
			.alert a:link {
			text-decoration: none;
			}
			tr td:first-child{
				width: 100px;
			}
			tr td:last-child {
				width: 1000px;
			}
			td{
				font-size: 14px;
				text-align: center;
				width: 200px;
			}
			.delete_report{
				border: none;
				height: 50px;
				background-color: #ff891e;
				color: whitesmoke;
			}
		</style>
		<script>
			function dark_mode() {
				document.body.classList.toggle("dark-mode");
				var a,b,c,i;
				a=document.querySelectorAll(".fas");
				for (i = 0; i < a.length; i++) {
					a[i].classList.toggle("dark-mode");
				}
				b=document.querySelectorAll(".destinationtour-des");
				for (i = 0; i < b.length; i++) {
					b[i].classList.toggle("dark-mode");
				}
				document.querySelector(".container-navbar").classList.toggle("dark-mode");
				c=document.querySelectorAll(".detailtour-des");
				for (i = 0; i < c.length; i++) {
					c[i].classList.toggle("dark-mode");
				}
			}
		</script>
	</head>
	<body>
		<div class="container">
		<div class="grid">
		<div class="row" >
		<div class="col l-2">
			<div class="div sidevan-header">
				<a href="../front-end/admin.php" class="navbar-brand" ;>
				<img src="https://vietnam.travel/themes/custom/vietnamtourism/images/logo.jpg" alt="">
				</a>
			</div>
			<div class="navbar-inner">
				<div class="collapse navbar-collapse">
					<?php
						if(isset($_SESSION['username'])) {
							if($row_info_admin['QuyenHan']=='admin'){
							 echo '
							 <ul class="navbar-nav">
									<li class="nav-item">
										<a href="" class="nav-link">
										<i class="nav-icon fas fa-user"></i>
										<span class="nav-info">Quản lý user</span>
										</a>
									</li>';
							   }
							echo '
								 <ul class="navbar-nav">
								 <li class="nav-item">
									 <a href="" class="nav-link">
									 <i class="nav-icon fas fa-torii-gate"></i>
									 <span class="nav-info">Quản lý tour</span>
									 </a>
								 </li>
								 <li class="nav-item">
									 <a href="hotel.php" class="nav-link">
									 <i class="nav-icon fas fa-hotel"></i>
									 <span class="nav-info">Quản lý khách sạn</span>
									 </a>
								 </li>
								 <li class="nav-item">
									 <a href="" class="nav-link">
									 <i class="nav-icon fas fa-utensils"></i>
									 <span class="nav-info"" >Quản lý nhà hàng</span>
									 </a>
								 </li>
								 <li class="nav-item">
									 <a href="" class="nav-link">
									 <i class="nav-icon fas fa-motorcycle"></i>
									 <span class="nav-info"" >Quản lý phương tiện</span>
									 </a>
								 </li>
							 	</ul>
							 <hr>
							 ';
						 }
					?>
					<h6 class="navbar-heading">
						<span>Tài khoản</span>
					</h6>
					<ul class="navbar-nav">
						<?php
							if(!isset($_SESSION['username'])) {
							        echo '
							            <li class="nav-item">
							                <a href="../sign_in/sign_in.php" class="nav-link">
							                	<i class="nav-icon fas fa-sign-in-alt"></i>
							                	<span class="nav-info">Đăng nhập</span>
							                </a>
							             </li>
							        ';
							   }else{
							    	echo'
							            <li class="nav-item">
											<a href="../log_out/log_out.php" class="nav-link">
												<i class="nav-icon fas fa-sign-out-alt"></i>
												<span class="nav-info">Đăng xuất</span>
											</a>
											</li>
							            ';
							        }
							?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col l-10">
			<div class="main-content">
				<div class="navbar navbar-top">
					<div class="container-navbar">
						<div class="collapse navbar-collapse header">
							<!-- <form action="" class="navbar-search">
								</form> -->
							<ul class="header-navbar-nav">
								<li class="nav-item nav-bar-icon">
									<i class="fas fa-bell"></i>
								</li>
								<li class="nav-item nav-bar-icon">
									<i class="fas fa-layer-group"></i>
								</li>
								<li class="nav-item">
									<button class="dark-mode-button" onclick="dark_mode()"><i class="fas fa-lightbulb"></i></button>
								</li>
							</ul>
							<?php
								?>
							<ul class="navbar-nav">
								<div class="nav-item fropdown">
									<a href="" class="nav-link">
										<div class="admin">
											<span class="admin-avatar">
											<?php
												if(isset($_SESSION['username'])) {
												 echo "<img src='{$row_info_admin['HinhAnh']}'>";
												 }
												?>
											</span>
											<span class="admin-name">
												<?php
													if(isset($_SESSION['username'])) {
													 echo "<span style='color:whitesmoke'>{$row_info_admin['TenNhanVien']}</span>";
													}
													?>
												<!-- <span>Nguyễn Văn A</span> -->
											</span>
										</div>
									</a>
								</div>
							</ul>
						</div>
					</div>
				</div>
				<div class="container-fluid mt--6" style="flex-direction: column;">
					<div class="grid wide">
						<div class="row">
							<div class="col l-12">
								<!-- Page Content -->
								<?php
									if(isset($_SESSION['username'])) {
									
									?>
								<div class="main-content-section">
									<div class="container">
										<div class="grid wide">
											<div class="row">
												<?php 
													if($result_hotel->num_rows > 0) {
													while($row = $result_hotel->fetch_assoc()) {
												?>
												<div class="col l-12">
													<div class="row box-search-tour">
														<div class="col l-4">
															<div class="box-search-tour-image">
																<a href="" class="image-box-relative image-box-3x2">
																	<div class="fill" style="width: 370px;height: 245px;">
																		<img class="tour-image" src="<?php echo $row["HinhAnh"] ?>" alt="" style="width: 100%;height: 100%;">
																	</div>
																</a>
																<div class="promotion-tour">
																	<div class="text-promotion-tour" title="<?php echo"Giá từ ".number_format($row['GiaTien'],0,",",".")."đ/đêm" ?>"><?php echo"Giá từ ".number_format($row['GiaTien'],0,",",".")."đ/đêm" ?></div>
																</div>
															</div>
														</div>
														<div class="col l-8">
															<div class="row">
																<div class="col l-8">
																	<div class="title-tour" >
																		<p class="titletour-des"><?php echo $row['TenKhachSan'] ?></p>
																	</div>
																	<div class="destination-tour">
																		<p class="destinationtour-des"><?php echo $row['DiaChi'] ?></p>
																	</div>
																	<div class="detail-tour">
																		<p class="detailtour-des">Bên trong khách sạn là nhà hàng chuyên phục vụ ẩm thực theo phong cách Á Âu cùng những món ăn đậm nét đặc sản vùng miền. Khách sạn có phòng tiệc, hội nghị sức chứa từ 40 đến 450 khách cùng nhiều tiện ích như: khu vui chơi giải trí, chăm sóc sức khỏe, spa, karaoke, bar, café, hồ bơi thông minh, sân tennis… <br></p>
																	</div>
																</div>
																<div class="col l-4">
																	<div class="row">
																		<?php
																			$sql_info_admin = "SELECT * FROM nhanvien WHERE `username` = '$username'";
																			$result_info_admin = $conn->query($sql_info_admin);
																			$row_info_admin = $result_info_admin->fetch_assoc();
																			if($row_info_admin['QuyenHan']=='admin'){
																		?>
																		<div class="col l-12 row-box-price">
																			<a href="input_hotel/update_hotel.php?MaKhachSan=<?php echo $row['MaKhachSan']?>" class="box-price-tour">
																			<span class="price">Update thông tin</span>
																			</a>
																		</div>
																		<div class="col l-12 row-box-price" style="padding-top: 10px;">
																			<a href="delete.php?MaKhachSan=<?php echo $row['MaKhachSan'] ?>" class="box-price-tour">
																			<span class="price">Xóa</span>
																			</a>
																		</div>
																		<?php
																			}
																		?>
																		<div class="col l-12 row-box-view">
																			<div>
																				<ul class="list-inline details-btn">
																					<li>
																						<span class="text-info">
																						<span style="padding-left: 10px"><?php echo "Chuẩn ".$row['TieuChuan']." Sao" ?></span>
																						</span>
																					</li>
																					<li>
																						<span class="text-info">
																						<span style="text-align: center;"><?php echo "LH:0".$row['DienThoai']."" ?></span>
																						</span>
																					</li>
																				</ul>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<?php
														}
													}
													?>
											</div>
											<div class="col-12">
											<?php 
												$sql_user = "SELECT DISTINCT khachhang.MaKhachHang, khachhang.TenKhachHang,khachhang.SDT FROM `khachsan_khieunai`,`khachhang` where makhachsan='$makhachsan' AND khachsan_khieunai.MaKhachHang=khachhang.MaKhachHang";
												$sql_khieunai ="SELECT DISTINCT thoigian from khachsan_khieunai where makhachsan=$makhachsan";
											?>
											<?php
											if ($result_report->num_rows > 0) {
												?>
											<h2>Xóa theo danh sách</h2>
												<form action="" method="post">
												<input type="submit" name="delete" value="Xóa" class="delete_report" style="width:150px">
												
												<?php
												echo "<table border='1'>
													<tr>
														<td>Select</td>
														<td>Mã khách hàng</td>
														<td>Tên khách hàng</td>
														<td>Số điện thoại</td>
														<td>Thời Gian</td>
														<td>Lý do</td>
													</tr>";
												while ($row_report = $result_report->fetch_assoc()) {//Doc du lieu tung dong
													echo "
													<tr>
														<td><input type=checkbox name='checkbox[]' value='{$row_report['Makhieunai_KS']}'>
														<td>{$row_report["MaKhachHang"]}</td>
														<td>{$row_report["TenKhachHang"]}</td>
                                                        <td>0{$row_report["SDT"]}</td>
														<td>{$row_report["ThoiGian"]}</td>
                                                        <td>{$row_report["lydo"]}</td>
													</tr>";
												}
												echo '</table>
												</form>';
											}else{
												echo "<div class='alert'>Hiện chưa có khiếu nại</div>";	
											}
											?>
											</div>
										</div>
									</div>
								</div>
								<?php	
									}
									else{
									    echo "<div class='alert'>Chưa Đăng nhập
									    <a href='../sign_in/sign_in.php'>Đăng Nhập</a>
									    </div>";
									}
									?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>