<?php 
    session_start();
    require "../../../config/config.php";

    $booked_ticket_id = $_GET["MaPhieuTour"];

    // lấy ra thông tin của vé đã mua
    $sql = "SELECT tour.`MaTour`, chitiettour.`MaChiTietTour`, tour.`DiemDen`, tour.`TenTour`, tour.`MoTa`, tour.`HinhAnh`, khachhang.`TenKhachHang`, khachhang.`DiaChi`, khachhang.`SDT`, 
    khachhang.`Email`, chitiettour.`NgayKhoiHanh`, chitiettour.`NgayKetThuc`, chitiettour.`SoNgay`, tour.`Gia`, phieudangkitour.`SoLuong` 
    FROM khachhang, phieudangkitour, chitiettour, tour 
    WHERE khachhang.`MaKhachHang` = phieudangkitour.`MaKhachHang` AND phieudangkitour.`MaTour` = tour.`MaTour` AND phieudangkitour.`MaChiTietTour` = chitiettour.`MaChiTietTour` AND phieudangkitour.`MaPhieuTour` = $booked_ticket_id";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="../../../grid/grid.css">
    <link rel="stylesheet" href="../../../css/base/base.css">
    <link rel="stylesheet" href="../../../css/base/style.css">
    <link rel="stylesheet" href="../../../css/base/responsive.css">
    <link rel="stylesheet" href="./successful_tour_booking.css">
    <title>Đặt tour thành công</title>
   
</head>
<body>
    <?php 
        require "../base/header.php"; 
    ?>
    <!-- main  -->
    <div class="page-title" style="background-image: url(https://www.saigontourist.net/assets/img/pages/page-title-bg7.jpg);">
        <div class="container">
            <div class="row">
                <div class="col l-12">
                    <div class="title-table">
                        <div class="title-table-inner">
                            <div class="page-title-title-info">
                                <h1>Đặt chỗ thành công</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="main-content booking-container">
        <div class="container">
            <div class="row">
                <div class="col l-12 c-12">
                    <div class="alert alert-success">
                        Xin cảm ơn! Booking của bạn đã được xác nhận. Chúng tôi sẽ liên hệ sớm nhất đến bạn.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col l-8 c-12">
                    <div class="info-title">
                        <h2>Thông Tin Đặt Chỗ</h2>
                    </div>
                    <div class="confirm-detilas">
                        <div class="image-box-relative image-box-3x2">
                            <img src="<?=$row['HinhAnh']?>" alt="">
                        </div>
                    </div>
                    <div class="confirm-info">
                        <div class="info-title">
                            <h2>
                                <a href="../page_info_tour/page_info_tour.php?MaChiTietTour=101"><?=$row['TenTour']?></a>
                            </h2>
                        </div>
                        <p><?=$row['MoTa']?></p>
                    </div>
                </div>

                <div class="col l-4 c-12">
                    <aside> <!-- Định nghĩa nội dung bên ngoài nội dung chính -->
                        <div class="book-details-info">
                            <div class="info-area">
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="fa fa-barcode"></i>
                                        Mã tour: <span><?=$row['MaTour']?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-qrcode"></i>
                                        Mã: <span><?=$row['MaChiTietTour']?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-location-arrow"></i>
                                        Điểm đến: <span><?=$row['DiemDen']?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-user"></i>
                                        Tên: <span><?=$row['TenKhachHang']?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-map-marker"></i>
                                        Địa chỉ: <span><?=$row['DiaChi']?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-phone"></i>
                                        Số điện thoại: <span>0<?=$row['SDT']?></span>
                                    </li>
                                    <li>
                                        <i class="far fa-envelope"></i>
                                        Email: <span><?=$row['Email']?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar-minus"></i>
                                        Ngày đi: <span><?=date("d/m/Y", strtotime($row['NgayKhoiHanh']))?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar-plus"></i>
                                        Ngày về: <span><?=date("d/m/Y", strtotime($row['NgayKetThuc']))?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar"></i>
                                        Thời gian: <span><?=$row['SoNgay']?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-user-secret"></i>
                                        Giá người lớn: 
                                        <span><?=number_format($row['Gia'], 0, ",", ".")?></span>
                                        <span>x <?=$row['SoLuong']?> đ</span>
                                    </li>
                                </ul>
                                <div class="price-total">
                                    <h2>
                                        Tổng:
                                        <span id="total"></span>
                                        <span>đ</span>
                                    </h2>
                                </div>
                                <div class="button-price">
                                    <a href="" class="button-link">Thanh toán</a>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <?php
        require "../base/footer.php";
    ?>


    <script>
        // lấy số lượng
        const quantity = <?=$row['SoLuong']?>;
        const price = <?=$row['Gia']?>;
        const total = document.querySelector('#total');
        total.textContent = (quantity * price).toLocaleString('vi-VN');
    </script>


    <script src="../base/user_menu.js"></script>
    <script src="../base/header.js"></script>
</body>
</html>