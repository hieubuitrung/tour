<?php
	session_start();
	require "connect.php";
	$makhachsan = $_GET['MaKhachSan'];
	$sql_hotel="SELECT * FROM `khachsan` WHERE MaKhachSan='$makhachsan'";
	$result_hotel = $conn->query($sql_hotel);
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
	$sql_reply="SELECT MaPhanHoi_KS,khachhang.MaKhachHang,MaKhachSan,khachsan_phanhoi.TieuDe,khachsan_phanhoi.NoiDung,khachsan_phanhoi.ThoiGian,khachhang.TenKhachHang,khachhang.SDT 
	FROM `khachsan_phanhoi`,`khachhang` where makhachsan='$makhachsan'AND khachsan_phanhoi.MaKhachHang=khachhang.MaKhachHang";
	$result_reply = $conn->query($sql_reply);
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
		<title>Phản hồi khách sạn</title>
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
		</style>
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
						                      echo '
						                          <ul class="navbar-nav">
						                          <li class="nav-item">
						                              <a href="" class="nav-link">
						                              <i class="fas fa-torii-gate"></i>
						                              <span>Quản lý tour</span>
						                              </a>
						                          </li>
						                          <li class="nav-item">
						                              <a href="hotel.php" class="nav-link">
						                              <i class="fas fa-hotel"></i>
						                              <span>Quản lý khách sạn</span>
						                              </a>
						                          </li>
						                          <li class="nav-item">
						                              <a href="" class="nav-link">
						                              <i class="fas fa-utensils"></i>
						                              <span>Quản lý nhà hàng</span>
						                              </a>
						                          </li>
						                          <li class="nav-item">
						                              <a href="" class="nav-link">
						                              <i class="fas fa-motorcycle"></i>
						                              <span>Quản lý phương tiện</span>
						                              </a>
						                          </li>
						                          <!-- <li class="nav-item">
						                              <a href="" class="nav-link">
						                                  <i class="fab fa-accessible-icon"></i>
						                                  <span>Quản lý tour</span>
						                              </a>
						                              </li> -->
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
							                	<i class="fas fa-sign-in-alt"></i>
							                	<span>Đăng nhập</span>
							                </a>
							             </li>
							        ';
							   }else{
							    	echo'
							            <li class="nav-item">
											<a href="../log_out/log_out.php" class="nav-link">
												<i class="fas fa-sign-out-alt"></i>
												<span>Đăng xuất</span>
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
								<li class="nav-item">
									<i class="fas fa-bell" style="color: white;"></i>
								</li>
								<li class="nav-item">
									<i class="fas fa-layer-group" style="color: white;"></i>
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
													 echo "<span>{$row_info_admin['TenNhanVien']}</span>";
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
													if (!$result_hotel) {
														trigger_error('Invalid query: ' . $conn->error);
													}
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
																	<div class="title-tour">
																		<a href=""><?php echo $row['TenKhachSan'] ?></a>
																	</div>
																	<div class="destination-tour"><?php echo $row['DiaChi'] ?></div>
																	<div class="detail-tour">
																		Bên trong khách sạn là nhà hàng chuyên phục vụ ẩm thực theo phong cách Á Âu cùng những món ăn đậm nét đặc sản vùng miền. Khách sạn có phòng tiệc, hội nghị sức chứa từ 40 đến 450 khách cùng nhiều tiện ích như: khu vui chơi giải trí, chăm sóc sức khỏe, spa, karaoke, bar, café, hồ bơi thông minh, sân tennis… <br>
																	</div>
																</div>
																<div class="col l-4">
																	<div class="row">
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
											if ($result_reply->num_rows > 0) {
												echo "<table border='1'>
													<tr>
														<td>Mã khách hàng</td>
														<td>Tên khách hàng</td>
														<td>Số điện thoại</td>
														<td>Thời Gian</td>
														<td>Tiêu Đề</td>
														<td>Nội Dung</td>
													</tr>";
												while ($row_reply = $result_reply->fetch_assoc()) {//Doc du lieu tung dong
													echo "
													<tr>
														<td>{$row_reply["MaKhachHang"]}</td>
														<td>{$row_reply["TenKhachHang"]}</td>
														<td>0{$row_reply["SDT"]}</td>
														<td>{$row_reply["ThoiGian"]}</td>
														<td>{$row_reply["TieuDe"]}</td>
														<td>{$row_reply["NoiDung"]}</td>
													</tr>";
												}
												echo '</table>';
											}else{
												echo "<div class='alert'>Hiện chưa có phản hồi</div>";	
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