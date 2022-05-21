<?php 
    session_start();
    // print_r($_SESSION);

    require "../../../config/config.php";

    $client = $_SESSION['client'];

    $sql = "SELECT tour.`HinhAnh`, tour.`TenTour`, tour.`DiemKhoiHanh`, tour.`DiemDen`, tour.`Gia`, tour.`MoTa`, chitiettour.`MaChiTietTour`, chitiettour.`NgayKhoiHanh`, chitiettour.`NgayKetThuc`, chitiettour.`SoNgay`, phuongtien.`TenPhuongTien`, phieudangkitour.`MaPhieuTour`, phieudangkitour.`TinhTrang`, khachsan.`TenKhachSan`, nhahang.`TenNhaHang`
    FROM phieudangkitour, tour, chitiettour, phuongtien, khachsan, nhahang
    WHERE phieudangkitour.`MaTour` = tour.`MaTour` AND tour.`MaTour` = chitiettour.`MaTour`AND tour.`MaPhuongTien` = phuongtien.`MaPhuongTien` AND tour.`MaKhachSan` = khachsan.`MaKhachSan` AND tour.`MaNhaHang` = nhahang.`MaNhaHang` AND  phieudangkitour.`MaKhachHang` = $client";

    $result = $conn->query($sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../fonts/fontawesome-free-5.15.4-web/css/all.min.css">

    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../grid/grid.css">
    <link rel="stylesheet" href="../../../css/base/base.css">
    <link rel="stylesheet" href="../../../css/base/style.css">
    <link rel="stylesheet" href="../../../css/base/responsive.css">
    <link rel="stylesheet" href="./registered_tour.css">
    <title>Tour trong nước</title>
    
</head>
<body>
    <!-- header -->
    <?php 
        require "../base/header.php";
    ?>

    <!-- main -->

    <div class="main-wapper">
        <div class="background-page-tour">
            <div class="page-image-tour-tag" style="background-image: url(https://www.saigontourist.net/uploads/Tour%20Tag/tour-tag-trong-nuoc.jpg);">

            </div>

            <div class="container grid wide">
                <div class="background-description">
                    <h1 class="tour-banner-title">Tour Đã Đăng Ký</h1>
                    <!-- <div class="sticker">Chú ý: Tour của bạn đang chờ xác nhận, bạn không thể đặt thêm tour khác</div> -->
                </div>
            </div>  
        </div>
    </div>

    <div class="main-content-section">
        <div class="container">
            <div class="grid wide">
                <div class="row">
                  
                    <?php 
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                    ?>
                        <div class="col l-12">
                            <div class="row box-search-tour">
                                <div class="col l-4 c-12">
                                    <div class="box-search-tour-image">
                                        <a href="../page_info_tour/page_info_tour.php?MaChiTietTour=<?php echo $row['MaChiTietTour'] ?>" class="image-box-relative image-box-3x2">
                                            <img class="tour-image" src="<?php echo $row["HinhAnh"] ?>" alt="">
                                        </a>
                                        
                                    </div>
                                </div>
                                <div class="col l-8 c-12">
                                    <div class="row">
                                        <div class="col l-8 c-12">
                                            <div class="title-tour">
                                                <a href="../page_info_tour/page_info_tour.php?MaChiTietTour=<?php echo $row['MaChiTietTour'] ?>"><?php echo $row['TenTour'] ?></a>
                                            </div>
                                            <div class="destination-tour"><?php echo "{$row['DiemKhoiHanh']} - {$row['DiemDen']}" ?></div>
                                            <div class="detail-tour">
                                                <strong>Thời gian :</strong> <?php echo $row['SoNgay'] ?><br>
                                                <strong>Phương tiện:</strong> <?php echo $row["TenPhuongTien"] ?> <br>
                                                <strong>Thời gian đi:</strong> <?php echo date("d/m/Y", strtotime($row["NgayKhoiHanh"])) ?> <br>
                                                <strong>Thời gian về:</strong> <?php echo date("d/m/Y", strtotime($row["NgayKetThuc"])) ?> <br>
                                                <strong>Khách sạn:</strong> <?php echo $row["TenKhachSan"] ?> <br>
                                                <strong>Nhà hàng:</strong> <?php echo $row["TenNhaHang"] ?> <br>
                                                <strong>Tình trạng:</strong> <?php echo $row["TinhTrang"] ?> <br>
                                            </div>
                                        </div>
                                        <div class="col l-4 c-12">
                                            <div class="row">
                                                <div class="col l-12 c-6 row-box-price">
                                                    <a href="../successful_tour_booking/successful_tour_booking.php?MaPhieuTour=<?=$row['MaPhieuTour']?>" class="box-price-tour">
                                                        <span class="price">Chi tiết</span>
                                                    </a>
                                                </div>
                                                <div class="col l-12 c-6 row-box-view">
                                                    <div>
                                                        <ul class="list-inline details-btn">
                                                            <li>
                                                                <a href="../update_booked_tour/update_booked_tour.php?MaPhieuTour=<?=$row['MaPhieuTour']?>" class="text-info">
                                                                    <i class="far fa-file-alt"></i>
                                                                    <span>Sửa</span>
                                                                </a>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>

                                                    <a href="../cancel_tour/cancel_tour.php?MaPhieuTour=<?=$row['MaPhieuTour']?>" class="box-view-more select-tour-action" id="cancel-tour">
                                                        <i class="fas fa-plane-slash"></i>
                                                        <span class="text">Hủy tour</span>
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
                        } else {
                            echo "<h2 class='message'>Bạn chưa đăng kí tour</h2>";
                        }
                    ?>
                    <!-- <div class="col l-12">
                        <div class="row box-search-tour">
                            <div class="col l-4">
                                <div class="box-search-tour-image">
                                    <a href="" class="image-box-relative image-box-3x2">
                                        <img class="tour-image" src="https://www.saigontourist.net/uploads/destination/TrongNuoc/LongAn/LongAn-CanhDongBatTan-4.jpg" alt="">
                                    </a>
                                    <div class="promotion-tour">
                                        <div class="text-promotion-tour" title="Du lịch xanh">Giá từ 599.000đ/khách</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col l-8">
                                <div class="row">
                                    <div class="col l-8">
                                        <div class="title-tour">
                                            <a href="">Du lịch Long An – KDL Cánh Đồng Bất Tận</a>
                                        </div>
                                        <div class="destination-tour">TP. Hồ Chí Minh - Long An</div>
                                        <div class="detail-tour">
                                            Thời gian : 1 ngày <br>
                                            Phương tiện: Đi về bằng xe <br>
                                            - Tham quan KDL Cánh Đồng Bất Tận - Khu bảo tồn và phát triển ...
                                        </div>
                                    </div>
                                    <div class="col l-4">
                                        <div class="row">
                                            <div class="col l-12 row-box-price">
                                                <a href="" class="box-price-tour">
                                                    <span class="text">Chi tiết</span>
                                                    <span class="price">1.279.000</span>
                                                </a>
                                            </div>
                                            <div class="col l-12 row-box-view">
                                                <div>
                                                    <ul class="list-inline details-btn">
                                                        <li>
                                                            <span class="text-info">
                                                                <i class="far fa-calendar-alt"></i> 
                                                                <span>05/12/2021</span>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="text-info">
                                                                <i class="far fa-calendar-alt"></i> 
                                                                <span>19/12/2021</span>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <a href="" class="box-view-more select-tour-action">
                                                    <i class="far fa-calendar-alt"></i> 
                                                    <span class="text">Xem thêm</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <?php require"../base/footer.php" ?>

    <script>
        // var form = document.querySelector('.form-search');
        // var btnButton = document.querySelector('.btn-button');

        // btnButton.addEventListener('click', function() {
        //     form.submit();
        // })
    </script>
    <script src="../base/header.js"></script>
    <script src="./registered_tour.js"></script>
    <script src="../base/user_menu.js"></script>

</body>
</html>
