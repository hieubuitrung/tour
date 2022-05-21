<?php 
	session_start();
	require "connect.php";
	if(isset($_SESSION['username'])) {
	    $username = $_SESSION['username'];
	    $sql_info_admin = "SELECT * FROM nhanvien WHERE `username` = '$username'";
	    $result_info_admin = $conn->query($sql_info_admin);
	    $row_info_admin = $result_info_admin->fetch_assoc();
	}
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../../../fonts/fontawesome-free-5.15.4-web/css/all.css">
		<!-- <link rel="stylesheet" href="../../../css/reset.css"> -->
		<link rel="stylesheet" href="../../../grid/grid.css">
		<link rel="stylesheet" href="admin.css">
		<link rel="stylesheet" href="assets/css/list.css">
		<title>Document</title>
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

			ul {
				list-style: none;
				padding: 0;
				margin: 0;
			}

			i {
				color: #404040;
			}
			
			.nav-item:hover > .nav-link {
				background-color: #e8ebed;
			}

			.nav-item > .nav-link {
				border-radius: 4px;
				overflow: hidden;
			}

			

			.nav-item > .nav-link.active {
				background-color: #e8ebed;
			}

			table {
				width: 100%;
			}
		</style>
	</head>
	<body>
		<div class="container">
		<div class="grid">
		<div class="row" >
		<div class="col l-2" style="border-right: 1px solid #ccc">
			<div class="div sidevan-header">
				<a href="admin.php" class="navbar-brand" ;>
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
                                    <a href="../user/user.php" class="nav-link active">
										<i class="fas fa-user"></i>
										<span>Quản lý user</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                    <i class="fas fa-torii-gate"></i>
                                    <span>Quản lý tour</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../hotel/hotel.php" class="nav-link">
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
			<div class="row">
				<div class="col l-12">
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
				<?php 
					if(isset($_SESSION['username'])) {
				?>
				<div class="col l-12" style="margin: 20px 0">
					<?php 
						$sql = "SELECT * FROM user, khachhang WHERE user.`SDT` = khachhang.`SDT` ORDER BY khachhang.`SDT` ASC";
					?>
					<h2>Xóa user</h2>
					<form action="./delete_user.php" method="get">
						<select name="phone" id="phone">
							<?php  
								$result = $conn->query($sql);
								if ($result->num_rows  > 0) {
									while ($row = $result->fetch_assoc()) {
										echo "<option value='{$row['SDT']}'>0{$row['SDT']}</option>";
									}
								}
							?>
						</select>
						<input type="submit" value="Xóa" >
					</form>
				</div>

				<div class="col l-12">
					<h2>Danh sách khách hàng</h2>
					<table border=1>
						<tr>
							<th>STT</th>
							<th>Mã Khách Hàng</th>
							<th>Tên Khách Hàng</th>
							<th>Số Điện Thoại</th>
							<th>Ngày sinh</th>
							<th>Giới tính</th>
							<th>Địa Chỉ</th>
							<th>Sô CCCD</th>
							<th>Email</th>
							<th colspan="2">Hành động</th>
						</tr>
						<?php
							$result = $conn->query($sql);
							if ($result->num_rows  > 0) {
								$i = 0;
								while ($row = $result->fetch_assoc()) {
									$i++;
									echo "<tr>
											<td>{$i}</td>
											<td>{$row['MaKhachHang']}</td>
											<td>{$row['TenKhachHang']}</td>
											<td>0{$row['SDT']}</td>
											<td>{$row['NgaySinh']}</td>
											<td>{$row['GioiTinh']}</td>
											<td>{$row['DiaChi']}</td>
											<td>{$row['CMT']}</td>
											<td>{$row['Email']}</td>
											<td><a href='./update_user.php?phone={$row['SDT']}'>Sửa</a></td>
											<td><a href='./delete_user.php?phone={$row['SDT']}'>Xóa</a></td>
										</tr>";
								}
							}
						?>
					</table>
				</div>

				<div class="col l-12" style="margin: 20px 0">
					<?php 
						$sql = "SELECT tour.`DiemKhoiHanh`, phieudangkitour.`MaChiTietTour`, chitiettour.`NgayKhoiHanh`, chitiettour.`NgayKetThuc`, chitiettour.`SoNgay`, phieudangkitour.`MaKhachHang`, khachhang.`TenKhachHang`, khachhang.`DiaChi`, khachhang.`SDT`, phieudangkitour.`SoLuong`
						FROM phieudangkitour, chitiettour, khachhang, tour WHERE phieudangkitour.`MaChiTietTour` = chitiettour.`MaChiTietTour` AND tour.`MaTour` = chitiettour.`MaTour` AND khachhang.`MaKhachHang` = phieudangkitour.`MaKhachHang`  ORDER BY phieudangkitour.`MaChiTietTour` ASC";
					?>
					<h2>Hủy tour</h2>
					<form action="./delete_tour.php" method="get">
						<select name="tour-id" id="tour-id">
							<?php  
								$result = $conn->query($sql);
								if ($result->num_rows  > 0) {
									while ($row = $result->fetch_assoc()) {
										echo "<option value='{$row['MaChiTietTour']}'>{$row['MaChiTietTour']}</option>";
									}
								}
							?>
						</select>
						<input type="submit" value="Xóa" >
					</form>
				</div>

				<div class="col l-12">
					<h2>Danh sách tour khách hàng hàng đã đăng kí</h2>
					<table border=1>
						<tr>
							<th>STT</th>
							<th>Mã Tour</th>
							<th>Ngày Khởi Hành</th>
							<th>Số Ngày</th>
							<th>Điểm Khởi Hành</th>
							<th>Mã Khách Hàng</th>
							<th>Tên Khách Hàng</th>
							<th>Địa Chỉ</th>
							<th>Số Điện Thoại</th>
							<th>Số Lượng</th>
						</tr>
						<?php
							
							$result = $conn->query($sql);
							if ($result->num_rows  > 0) {
								$i = 0;
								while ($row = $result->fetch_assoc()) {
									$i++;
									// strtotime trả về số nguyên là timestamp của thời gian truyền vào
									echo "<tr>
											<td>{$i}</td>
											<td>{$row['MaChiTietTour']}</td>
											<td>".date("d/m/Y", strtotime($row['NgayKhoiHanh']))."</td>
											<td>{$row['SoNgay']}</td>
											<td>{$row['DiemKhoiHanh']}</td>
											<td>{$row['MaKhachHang']}</td>
											<td>{$row['TenKhachHang']}</td>
											<td>{$row['DiaChi']}</td>
											<td>0{$row['SDT']}</td>
											<td>{$row['SoLuong']}</td>
										</tr>";
								}
							}
						?>
					</table>
				</div>

				<?php 
					}
				?>
			</div>
		</div>
		
		
	</body>
</html>