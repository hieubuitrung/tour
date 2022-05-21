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
	$sql_restaurant="SELECT * FROM `nhahang` ";

	if(isset($_GET['submit'])) {
		$des = isset($_GET['des']) ? $_GET['des'] : '';
		$service = isset($_GET['service']) ? $_GET['service'] : '';
		if($des==''){
			if($service==0){#k chon ra full kq
				$sql_restaurant="SELECT * FROM `nhahang` ";
			}else{#tim kiem theo hinh thuc phuc vu
				$sql_restaurant="SELECT * FROM `nhahang` 
				WHERE HinhThucPhucVu like '%$service%'";
			}

		}else{#tim kiem nha hang theo dia chi
			if($service==0){
				$sql_restaurant="SELECT * FROM `nhahang` 
				WHERE DiaChi like '{$des}'";
			}
			else{ 
				$sql_restaurant="SELECT * FROM `nhahang` 
				WHERE DiaChi like '{$des}' and HinhThucPhucVu like '%$service%'";
			}
		}
	}
	
	$result_restaurant = $conn->query($sql_restaurant);
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
		<link rel="stylesheet" href="cssfooter.css">
		<title>Quản lý nhà hàng</title>
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
                                    <a href="../front-end/admin.php" class="nav-link">
                                    <i class="fas fa-torii-gate"></i>
                                    <span>Quản lý tour</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="restaurant.php" class="nav-link">
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
												<span style="color: #ff891e;">service</span>
											</div>
											<select name="service" id="service">
												<option <?php if (isset($service) && $service == '0') echo "selected=\"selected\"";  ?> value="0" >Tất cả</option>
												<option <?php if (isset($service) && $service == '1') echo "selected=\"selected\"";  ?> value="1" >buffet</option>
												<option <?php if (isset($service) && $service == '2') echo "selected=\"selected\"";  ?> value="2" >phục vụ tại bàn</option>
												
											</select>
										</div>
										<div class="l-2 m-4 c-4" style="margin-top: 30px;">
                                        <input type="submit" name='submit' class="btn-custom-primary btn-button" value="Tìm kiếm">
										</div>
									</div>
								</div>
							</form>
							<form action="delete_des.php" method="get">
								<div class="search__container">
									<div class="row">
										<div class="search__container--item l-4 m-6 c-12">
											<div>
												<span style="color: #ff891e;">Xóa Theo Địa Điểm</span>
											</div>
											<select name="delete_destination" id="delete_destination">
												<?php
													$sql_restaurant_des="select DISTINCT(DiaChi) from nhahang";
													$result_restaurant_des= $conn->query($sql_restaurant_des);
													while($row_des = $result_restaurant_des->fetch_assoc()){
														echo "<option value='{$row_des['DiaChi']}'!=''>{$row_des['DiaChi']}</option>";
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
							<div class="l-4 row-box-price" style="margin:auto;">
								<a href="input_restaurant/input_restaurant.php" class="box-price-tour">
									<span class="price">Thêm nhà hàng</span>
								</a>
							</div>
						</div>
					</div>
					<div class="main-content-section">
						<div class="container">
							<div class="grid wide">
								<div class="row">
									<?php 
										if($result_restaurant->num_rows > 0) {
										while($row = $result_restaurant->fetch_assoc()) {
										if (!$result_restaurant) {
											trigger_error('Invalid query: ' . $conn->error);
										}
										?>
									<div class="col l-12">
										<div class="row box-search-tour">
											<div class="col l-4">
												<div class="box-search-tour-image">
													<a href="" class="image-box-relative image-box-3x2">
                                                    <div class="fill" style="width: 100%;height: auto;">
													    <img class="tour-image" src="<?php echo $row["HinhAnh"] ?>" alt="" style="width: 100%;height: 100%;">
                                                    </div>
													</a>
													<div class="promotion-tour">
														<div class="text-promotion-tour" title="<?php echo"Giá từ ".number_format($row['GiaTien'],0,",",".")."đ/người" ?>"><?php echo"Giá từ ".number_format($row['GiaTien'],0,",",".")."đ/người" ?></div>
													</div>
												</div>
											</div>
											<div class="col l-8">
												<div class="row">
													<div class="col l-8">
														<div class="title-tour">
															<a href=""><?php echo $row['TenNhaHang'] ?></a>
														</div>
														<div class="destination-tour"><?php echo $row['DiaChi'] ?></div>
														<div class="detail-tour">
														Bên trong nhà hàng là nhà hàng chuyên phục vụ ẩm thực theo phong cách Á Âu cùng những món ăn đậm nét đặc sản vùng miền. nhà hàng có phòng tiệc, hội nghị sức chứa từ 40 đến 450 khách cùng nhiều tiện ích như: khu vui chơi giải trí, chăm sóc sức khỏe, spa, karaoke, bar, café, hồ bơi thông minh, sân tennis… <br>
														
														</div>
													</div>
													<div class="col l-4">
														<div class="row">
															<div class="col l-12 row-box-price">
																<a href="input_restaurant/update_restaurant.php?MaNhaHang=<?php echo $row['MaNhaHang']?>" class="box-price-tour">
																<span class="price">Update thông tin</span>
																</a>
															</div>
															<div class="col l-12 row-box-price"style="padding-top: 10px;">
																<a href="delete.php?MaNhaHang=<?php echo $row['MaNhaHang'] ?>" class="box-price-tour">
																<span class="price">Xóa</span>
																</a>
															</div>
															<div class="col l-12 row-box-view">
																<div>
																	<ul class="list-inline details-btn">
																		<li>
																			<span class="text-info">
																			<span style="padding-left: 10px"><?php if($row['HinhThucPhucVu']==1){echo 'buffet';} else {echo 'phục vụ tại bàn';} ?></span>
																			</span>
																		</li>
																		<li>
																			<span class="text-info">
																			<span style="text-align: center;"><?php echo "LH:0".$row['SDT']."" ?></span>
																			</span>
																		</li>
																	</ul>
																</div>
																<a href="reply.php?MaNhaHang=<?php echo $row['MaNhaHang']?>" class="box-view-more select-tour-action">
																<i class="far fa-calendar-alt"></i> 
																<span class="text">Xem phản hồi</span>
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

		<div class="footer">
            <div class="footer-contents">
                <div class="footer-contact">
                    <h3 class="mgb-10">CONTACT US</h3>
                    <p><b>Address: </b>18 Pho Vien, Ward Duc Thang, District Bac Tu Liem, Ha Noi City</p>
                    <a href="tel: 19001091"><b>Hotline: </b>19001091</a>
                    <a href="mailto: dulichvietnam@gmail.com"><b>Email: </b>dulichvietnam@gmail.com</a> <!--mailto tự động dẫn đến soạn mail-->
                    <p><b>Work time: </b>7 - 20 hours on weekdays</p>
                </div>
                <div class="footer-connect">
                    <h3 class="mgb-10">FOLLOW US ON</h3>
                    <ul>
                        <li><a href=""><i class="ti-facebook"></i></a></li>
                        <li><a href=""><i class="ti-instagram"></i></a></li>
                        <li><a href=""><i class="ti-google"></i></a></li>
                        <li><a href=""><i class="ti-youtube"></i></a></li>
                        <li><a href=""><i class="ti-twitter-alt"></i></a></li>
                    </ul>
                </div>
                <div class="footer-sub">
                    <h3 class="mgb-10">SIGN UP FOR OUR NEWSLETTER</h3>
                    <p>Receive new travel stories from Vietnam once a month in your inbox.</p>
                    <div class="footer-email">
                        <input class="footer-email-text" type="text" placeholder="Your email">
                        <input class="footer-email-sub" type="submit" value="SIGN UP"></input>
                    </div>
                </div>
            </div>
            <div class="footer__license">
                <hr>
                <div class="flex">
                    <span>© 2016 Official Website Vietnam Tourism</span>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms & Conditions</a>
                </div>
            </div>
        </div>
		
	</body>
</html>