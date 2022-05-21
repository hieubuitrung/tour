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
<?php 
	$sql_hotel="SELECT * FROM `khachsan` ";

	if(isset($_GET['submit'])) {
		$des = isset($_GET['des']) ? $_GET['des'] : '';
		$rating = isset($_GET['rating']) ? $_GET['rating'] : '';
		if($des==''){
			if($rating==0){
				$sql_hotel="SELECT * FROM `khachsan` ";
			}else{
				$sql_hotel="SELECT * FROM `khachsan` 
				WHERE TieuChuan={$rating}";
			}
		}else{
			if($rating==0){
				$sql_hotel="SELECT * FROM `khachsan` 
				WHERE DiaChi like '{$des}'";
			}
			else{
				$sql_hotel="SELECT * FROM `khachsan` 
				WHERE DiaChi like '{$des}' and TieuChuan={$rating}";
			}
		}
	}
	
	$result_hotel = $conn->query($sql_hotel);
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/grid.css">
		<link rel="stylesheet" href="../assets/css/responsive.css">
		<link rel="stylesheet" href="css/respondsive2.css">
		<link rel="stylesheet" href="../base/css">
		<link rel="stylesheet" href="../../../css/base/responsive.css">
		<!-- Test -->
		<link rel="stylesheet" href="../../../fonts/fontawesome-free-5.15.4-web/css/all.css">
		<link rel="stylesheet" href="../../../css/reset.css">
		<link rel="stylesheet" href="../../../grid/grid.css">
		<link rel="stylesheet" href="admin.css">
		<link rel="stylesheet" href="assets/css/list.css">
		<link rel="stylesheet" href="css/dark_mode.css">
		<title>Quản lý khách sạn</title>
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
			.alert{
				background-color: red;
			}
			#to_the_moon {
				display: none;
				position: fixed;
				bottom: 20px;
				right: 30px;
				font-size: 18px;
				border: none;
				outline: none;
				background-color: #fa9e1b;
				color: white;
				cursor: pointer;
				padding: 15px;
				border-radius: 4px;
				}
			#to_the_moon:hover {
				background-color: #555;
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
										<span class="nav-info">Quản lý nhà hàng</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="" class="nav-link">
										<i class="nav-icon fas fa-motorcycle"></i>
										<span class="nav-info">Quản lý phương tiện</span>
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
                                        <span class="nav-info" style="color: #8889AA;">Đăng nhập</span>
                                        </a>
                                    </li>
                                ';
						    }else{
                                echo'
                                <li class="nav-item">
                                    <a href="../log_out/log_out.php" class="nav-link">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <span class="nav-info" style="color: #8889AA;">Đăng xuất</span>
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
						<div class="collapse navbar-collapse header header-bar">
							<!-- <form action="" class="navbar-search">
								</form> -->
							<ul class="header-navbar-nav">
								<li class="nav-item nav-bar-icon">
									<i class="fas fa-bell"></i>
								</li>
								<li class="nav-item nav-bar-icon" >
									<button class="dark-mode-button" onclick="alert_report_count()"><i class="fas fa-layer-group"></i></i></button>
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
							<form action="" method="get">
								<div class="search__container">
									<div class="row">
										<div class="search__container--item l-4 m-6 c-12">
											<div>
												<span style="color: #ff891e;">Destination</span>
											</div>
											<input type="text" name="des" value="<?php if(isset($des)) echo $des ?>" placeholder="Destination">
										</div>
										<div class="search__container--item l-1 m-3 c-6">
											<div>
												<span style="color: #ff891e;">Rating</span>
											</div>
											<select name="rating" id="rating">
												<option <?php if (isset($rating) && $rating == '0') echo "selected";  ?> value="0" >Tất cả</option>
												<option <?php if (isset($rating) && $rating == '1') echo "selected";  ?> value="1" >1 Star</option>
												<option <?php if (isset($rating) && $rating == '2') echo "selected";  ?> value="2" >2 Star</option>
												<option <?php if (isset($rating) && $rating == '3') echo "selected";  ?> value="3" >3 Star</option>
												<option <?php if (isset($rating) && $rating == '4') echo "selected";  ?> value="4" >4 Star</option>
												<option <?php if (isset($rating) && $rating == '5') echo "selected";  ?> value="5" >5 Star</option>
											</select>
										</div>
										<div class="l-2 m-4 c-4" style="margin-top: 30px;">
                                        <input type="submit" name='submit' class="btn-custom-primary btn-button" value="Tìm kiếm">
										</div>
									</div>
								</div>
							</form>
							<?php
								if($row_info_admin['QuyenHan']=='admin'){
							?>
							<form action="delete_des.php" method="get">
								<div class="search__container">
									<div class="row">
										<div class="search__container--item l-4 m-6 c-12">
											<div>
												<span style="color: #ff891e;">Xóa Theo Địa Điểm</span>
											</div>
											<select name="delete_destination" id="delete_destination">
												<?php
													$sql_hotel_des="select DISTINCT(DiaChi) from khachsan";
													$result_hotel_des= $conn->query($sql_hotel_des);
													while($row_des = $result_hotel_des->fetch_assoc()){
														echo "<option value='{$row_des['DiaChi']}'>{$row_des['DiaChi']}</option>";
													}
												?>
											</select>
										</div>
										
										<div class="l-1 row-box-price" style="padding-top: 26px;">
											<a class="box-price-tour">
												<input type="submit" value="Xóa" class="btn-custom-primary btn-button" >
											</a>
										</div>
										
									</div>
								</div>	
							</form>
							<?php
								}
							?>
							<div class="l-4 row-box-price" style="margin:auto;">
								<a href="input_hotel/input_hotel.php" class="box-price-tour">
									<span class="price">Thêm Khách Sạn</span>
								</a>
							</div>
						</div>
					</div>
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
															<p class="titletour-des"><?php echo $row['TenKhachSan'] ?></p>
														</div>
														<div class="destination-tour">
															<p class="destinationtour-des"><?php echo $row['DiaChi'] ?></p>
														</div>
														<div class="detail-tour">
															<p class="detailtour-des">Bên trong khách sạn là nhà hàng chuyên phục vụ ẩm thực theo phong cách Á Âu cùng những món ăn đậm nét đặc sản vùng miền. Khách sạn có phòng tiệc, hội nghị sức chứa từ 40 đến 450 khách cùng nhiều tiện ích như: khu vui chơi giải trí, chăm sóc sức khỏe, spa, karaoke, bar, café, hồ bơi thông minh, sân tennis… <br></p>														</div>
													</div>
													<div class="col l-4">
														<div class="row">
															<?php
																$sql_info_admin = "SELECT * FROM nhanvien WHERE `username` = '$username'";
																$result_info_admin = $conn->query($sql_info_admin);
																$row_info_admin = $result_info_admin->fetch_assoc();
																if($row_info_admin['QuyenHan']=='admin'){
																$sql_report_count="SELECT COUNT(*)as dem  FROM `khachsan_khieunai` WHERE MaKhachSan={$row['MaKhachSan']}";
																$result_report_count=$conn->query($sql_report_count);
																$row_report_count = $result_report_count->fetch_assoc();
															?>
															<div class="col l-12 row-box-price">
																<a href="input_hotel/update_hotel.php?MaKhachSan=<?php echo $row['MaKhachSan']?>" id="#update_box" class="box-price-tour">
																<span class="price">Update thông tin</span>
																</a>
															</div>
															
															<div class="col l-12 row-box-price"style="padding-top: 10px;">
																<a href="delete.php?MaKhachSan=<?php echo $row['MaKhachSan'] ?>" id="#delete_box" class="box-price-tour">
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
																<a href="reply.php?MaKhachSan=<?php echo $row['MaKhachSan']?>" class="box-view-more select-tour-action">
																<i class="far fa-calendar-alt"></i> 
																<span class="text">Xem phản hồi</span>
																</a>
																<a href="report.php?MaKhachSan=<?php echo $row['MaKhachSan']?>" class="box-view-more select-tour-action">
																<span class="text" style="color: red;">Xem khiếu nại</span>
																<p>Số khiếu nại</p>
																<?php
																	echo "<input type='number' style='background: none;border: none;padding-left: 100px;' readonly placeholder={$row_report_count['dem']}>"
																?>
																</a>
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
		<button onclick="tothemoon()" id="to_the_moon" class="dark-mode-button"><i style="background: transparent;" class="fas fa-moon"></i></button>
	</body>
	<script>
		var tothemoon_button = document.querySelector('#to_the_moon');
		window.onscroll = function() {scrollFunction()};
		function scrollFunction() {
		if (document.documentElement.scrollTop > 20) {
			tothemoon_button.style.display = "block";
		} else {
			tothemoon_button.style.display = "none";
		}
		}
		function tothemoon() {
		document.documentElement.scrollTop = 0;
		}
	</script>
</html>