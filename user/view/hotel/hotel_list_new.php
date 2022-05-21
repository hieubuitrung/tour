<?php 
	session_start();
	require "connect.php";
	require "../../../config/config.php";
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
		<link rel="icon" href="https://static.tuoitre.vn/tto/i/s626/2011/12/27/rxr20OFA.jpg" type="image/gif" sizes="20x20">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Grechen+Fuemen&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/base__header__footer.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/grid.css">
		<link rel="stylesheet" href="../assets/css/responsive.css">
		<link rel="stylesheet" href="css/respondsive2.css">
		<link rel="stylesheet" href="../assets/fonts/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="../base/css">
		<link rel="stylesheet" href="../../../css/base/base.css">
		<link rel="stylesheet" href="../../../css/base/style.css">
		<link rel="stylesheet" href="../../../css/base/responsive.css">
		<title>Travel Viet Nam</title>
        <!-- CSS LIST -->
		<link rel="stylesheet" href="../../../css/reset.css">
		<link rel="stylesheet" href="../../../grid/grid.css">
		<link rel="stylesheet" href="css/list.css">
	</head>
	<body>
		<div class="page-wrap">
			<?php
				require "../base/header.php"
				?>
			<body>
				<div class="content__noio" style="margin-top: 110px;">
					<div class="home__background"></div>
					<div class="search">
						<div class="grid wide">
							<form action="#" method="get">
								<div class="search__container__tabs grid wide">
									<div class="row">
										<div class="search__container__tab d-flex selected" style="background-color: #fa9e1b;">
											<a href="hotel_list_new.php" style="color: white;">Hotels</a>
										</div>
										<div class="search__container__tab d-flex">
											<span>Vehicle</span>
										</div>
										<div class="search__container__tab d-flex">
											<span>Flights</span>
										</div>
										<div class="search__container__tab d-flex">
											<span>Tourism</span>
										</div>
									</div>
								</div>
								<div class="search__container">
									<div class="row">
										<div class="search__container--item l-4 m-6 c-12">
											<div>
												<span>Destination</span>
											</div>
											<input type="text" name="des" value="<?php if(isset($des)) echo $des ?>" placeholder="Destination">
										</div>
										<div class="search__container--item l-2 m-6 c-12">
											<div>
												<span>Check-in</span>
											</div>
											<input type="date">
										</div>
										<div class="search__container--item l-2 m-6 c-12">
											<div>
												<span>Check-out</span>
											</div>
											<input type="date">
										</div>
										<div class="search__container--item l-1 m-3 c-6">
											<div>
												<span>Adult</span>
											</div>
											<select name="" id="">
												<option>01</option>
												<option>02</option>
												<option>03</option>
											</select>
										</div>
										<div class="search__container--item l-1 m-3 c-6">
											<div>
												<span>Rating</span>
											</div>
											<select name="rating" id="rating">
												<option <?php if (isset($rating) && $rating == '0') echo "selected=\"selected\"";  ?> value="0" >Tất cả</option>
												<option <?php if (isset($rating) && $rating == '1') echo "selected=\"selected\"";  ?> value="1" >1 Star</option>
												<option <?php if (isset($rating) && $rating == '2') echo "selected=\"selected\"";  ?> value="2" >2 Star</option>
												<option <?php if (isset($rating) && $rating == '3') echo "selected=\"selected\"";  ?> value="3" >3 Star</option>
												<option <?php if (isset($rating) && $rating == '4') echo "selected=\"selected\"";  ?> value="4" >4 Star</option>
												<option <?php if (isset($rating) && $rating == '5') echo "selected=\"selected\"";  ?> value="5" >5 Star</option>
											</select>
										</div>
										<div class="l-2 m-4 c-4" style="margin-top: 30px;">
                                        <input type="submit" name='submit' class="btn-custom-primary btn-button" value="Tìm kiếm">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="main-content-section">
						<div class="container">
							<div class="grid wide">
								<div class="row">
									<div class="col l-3">
										<div class="view-list-tour">
											<i class="fas fa-th icon-list-tour"></i>
											<span> | </span>
											<i class="fas fa-list icon-list-tour active"></i>
										</div>
									</div>
								</div>
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
                                                    <div class="fill">
													    <img class="tour-image" src="<?php echo $row["HinhAnh"] ?>" alt="">
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
														Bên trong khách sạn là nhà hàng chuyên phục vụ ẩm thực theo phong cách Á Âu cùng những món ăn đậm nét đặc sản vùng miền. Khách sạn có phòng tiệc, hội nghị sức chứa từ 40 đến 450 khách cùng nhiều tiện ích như: khu vui chơi giải trí, chăm sóc sức khỏe, spa, karaoke, bar, café, hồ bơi thông minh, sân tennis…
														</div>
													</div>
													<div class="col l-4">
														<div class="row">
															<div class="col l-12 row-box-price">
																<a href="../registered_tour/registered_tour.php?MaChiTietTour=<?php echo "Demo" ?>" class="box-price-tour">
																<span class="price">Đặt Ngay Bây Giờ</span>
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
																<?php
																	if(isset($_SESSION['phone'])){
																?>
																		<a href="reply_hotel.php?MaKhachSan=<?php echo $row['MaKhachSan']?>"class="box-view-more select-tour-action">
																		<span class="text">Phản Hồi</span>
																		</a>';
																		<a href="report_hotel.php?MaKhachSan=<?php echo $row['MaKhachSan']?>"class="box-view-more select-tour-action">
																		<span class="text">Báo Cáo</span>
																		</a>';
																<?php
																	}
																?>
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
		</div>
		<script src="../assets/base.js"></script>
	</body>
	<?php 
		require "../base/footer.php";
		?>
	</div>
	<!-- JS Header footer hieu -->
	<script src="https://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
	<script src="./asset/js/index.js"></script>
	<script src="../base/user_menu.js"></script>
	</body>
</html>