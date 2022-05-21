<?php 
    session_start();
    // print_r($_SESSION);

    require "../../../config/config.php";

    $MaChiTietTour = isset($_GET['MaChiTietTour']) ? $_GET['MaChiTietTour'] : '';

    $sql = "SELECT tour.`MaTour`, tour.`HinhAnh`, tour.`TenTour`, tour.`DiemKhoiHanh`, tour.`DiemDen`, tour.`Gia`, chitiettour.`SoNgay`, chitiettour.`MaChiTietTour`, chitiettour.`NgayKhoiHanh`, chitiettour.`NgayKetThuc`, tour.`MoTa`, chitiettour.`LichTrinh`, chitiettour.`LuuY`, phuongtien.`TenPhuongTien`
    FROM tour, chitiettour, phuongtien 
    WHERE tour.`MaTour` = chitiettour.`MaTour` AND tour.`MaPhuongTien` = phuongtien.`MaPhuongTien` 
    AND chitiettour.`MaChiTietTour` = '$MaChiTietTour'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        $tour_id = $row['MaTour'];
        $tour_detal_id = $row['MaChiTietTour'];

        // gán giá trị ma chi tiết tour cho biến session
        $_SESSION['tour_detal_id'] = $tour_detal_id;
        // gán giá trị mã tour cho biến session
        $_SESSION['tour_id'] = $tour_id;
        
        // lấy mã khách hàng
        $client = isset($_SESSION['client']) ? $_SESSION['client'] : null;
        if (isset($client)) {
            // lấy mã chi tiết tour (336)
            $sql_booked_tour_id = "SELECT phieudangkitour.`MaChiTietTour` FROM phieudangkitour WHERE phieudangkitour.`MaChiTietTour` = $tour_detal_id AND phieudangkitour.`MaKhachHang` = '$client'";
            $result_booked_tour_id = $conn->query($sql_booked_tour_id);
        }
    } else {
        echo '
        <h1>Oops! An Error Occurred</h1>
        <h2>The server returned a "404 Not Found".</h2>

        <div>
            Something is broken. Please let us know what you were doing when this error occurred.
            We will fix it as soon as possible. Sorry for any inconvenience caused.
        </div>';
        exit;
    }  
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../fonts/fontawesome-free-5.15.4-web/css/all.min.css">

    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/base/base.css">
    <link rel="stylesheet" href="../../../grid/grid.css">
    <link rel="stylesheet" href="../../../css/base/style.css">
    <link rel="stylesheet" href="../../../css/base/responsive.css">
    <link rel="stylesheet" href="./page_info_tour.css">
    <title>Document</title>
    
    <style>
        .main-content-section {
            padding-top: 30px;
            padding-bottom: 70px;
        }
    </style>

</head>
<body>

    <!-- header  -->
    <?php require "../base/header.php"; ?>


    <!-- main  -->


    <!-- banner  -->
    <div class="main-wapper">
        <div class="background-page-tour">
            <div class="page-image-tour-tag" style="background-image: url(<?php echo $row['HinhAnh'] ?>)"></div>
            <div class="container grid wide">
                <div class="background-description">
                    <h1 class="tour-banner-title"><?php echo "{$row['DiemKhoiHanh']} - {$row['DiemDen']}" ?></h1>
                    <!-- <div class="sticker">Tour Trong Nước</div> -->
                </div>
            </div>  
        </div>
    </div>

    <div class="main-content-section">
        <div class="container detail-tour-kiritm">
            <div class="grid wide">
                <div class="row  ">
                    <div class="col l-9 c-12">

                        <!-- thông tin tour  -->
                        <div class="info-tour">
                            <div class="promotion-tour">
                                <div class="text-promotion-tour" title="Du lịch xanh"><?php echo $row['TenTour'] ?></div>
                            </div>
                            <div class="row-info">
                                <div class="row  ">
                                    <div class="col l-6 c-12">
                                        <span class="text-uppercase">Thời gian:</span>
                                        <span class="text-strong"><?php echo $row['SoNgay'] ?></span>
                                    </div>
                                    <div class="col l-6 c-12">
                                        <span class="text-uppercase">Phương tiện:</span>
                                        <span class="text-strong"><?php echo $row["TenPhuongTien"] ?></span>
                                    </div>
                                </div>
                                <div class="row  ">
                                    <div class="col l-6 c-12">
                                        <span class="text-uppercase">Điểm xuất phát:</span>
                                        <span class="text-strong"><?php echo "{$row['DiemKhoiHanh']}" ?></span>
                                    </div>
                                    <div class="col l-6 c-12">
                                        <span class="text-uppercase">Điểm đến:</span>
                                        <span class="text-strong"><?php echo "{$row['DiemDen']}" ?></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Nếu có lịch khời hành thì mới hiện nút mua -->
                            <?php if($row['NgayKhoiHanh'] !== "9999-12-31") {?>

                            <div class="list-tour-detail">
                                <div class="row  ">
                                    <div class="col l-12 tour-detail-title-information tour-detail-header-col">
                                        <div class="row ">
                                            <div class="col l-2 m-3">Khởi hành</div>
                                            <div class="col l-2 m-3">Mã tour</div>
                                            <div class="col l-2 m-2">Giá</div>
                                            <div class="col l-2 m-2">Giá trẻ em</div>
                                            <div class="col l-2 m-2">Giá em bé</div>
                                            <div class="col l-2 m-2"></div>
                                        </div>
                                    </div>
                                    <div class="col l-12 tour-detail-content-col">
                                        <div class="list-inline">
                                            <div class="row  ">
                                                <div class="col c-12">
                                                    <h5>Thông tin tour chi tiết thứ #1</h5>
                                                </div>
                                                <div class="col l-2 m-3 c-12">
                                                    <label for="">Ngày khởi hành</label>
                                                    <strong><?php echo date("d/m/Y", strtotime($row["NgayKhoiHanh"])) ?></strong>
                                                </div>
                                                <div class="col l-2 m-3 c-12">
                                                    <label for="">Mã tour</label>
                                                    <strong><?php echo $row["MaChiTietTour"] ?></strong>
                                                </div>
                                                <div class="col l-2 m-2 c-12">
                                                    <label for="">Giá</label>
                                                    <strong class="price"><?php echo number_format($row["Gia"], 0 , "", ".") ?></strong>
                                                </div>
                                                <div class="col l-2 m-2 c-12">
                                                    <label for="">Giá trẻ em</label>
                                                    <strong class="price"><?php echo number_format($row["Gia"], 0 , "", ".") ?></strong>
                                                </div>
                                                <div class="col l-2 m-2 c-12">
                                                    <label for="">Giá trẻ sơ sinh</label>
                                                    <strong class="price">0</strong>
                                                </div>
                                                <div class="col l-2 c-12 package-info">
                                                    <label for="">Đặt/Mua tour</label>
                                                    <div class="action-book">
                                                        <a href="../book_tour/book_tour.php?MaChiTietTour=<?php echo $MaChiTietTour; ?>" class="btn btn-buy-tour">
                                                            Mua online
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>

                            <!-- Mô tả tour  -->

                            <div class="row-description">
                                <div class="title-description">Tour này có gì hay</div>
                                <div class="content-description"><?php echo $row['MoTa'] ?></div>
                            </div>


                            <div class="row-info-tour">
                                <div>
                                    <ul class="nav-tabs">
                                        <li class="active">
                                            <a href="">Chương trình tour</a>
                                        </li>
                                        <li class="">
                                            <a href="">Chính sách tour</a>
                                        </li>
                                        <li class="">
                                            <a href="">Câu hỏi thường gặp</a>
                                        </li>
                                    </ul>

                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-header-text" id="heading-one">
                                                <button class="btn btn-link-kirirm">Chương trình tour</button>
                                                <i class="fas fa-plus glyphicon"></i>
                                                <!-- <i class="fas fa-minus glyphicon"></i> -->
                                            </div>
                                        </div>

                                        <div id="collapse-one" class="tab-content">
                                            <div class="tab-pane active">
                                                <div class="row ">
                                                    <div class="col l-12">
                                                        <div class="common-info">
                                                            
                                                        <!-- text-align: justify: kéo dài chữ cho các dòng bằng nhau -->
                                                            <p style="text-align: justify;"><?php echo $row['LichTrinh'] ?></p>
    
                                                            <p style="text-align: justify;">
                                                                <em>
                                                                    <strong>* Lưu ý:</strong>
                                                                </em>
                                                                <span>- Chương trình này chỉ sử dụng xe 29C trở xuống</span>
                                                                <br>
                                                                <span>- Lịch trình có thể linh động thay đổi tùy thuộc tình hình thời tiết...</span>
                                                            </p>
    
                                                            <p style="text-align: justify;"><?php echo $row['LuuY'] ?></p>
    
                                                        
                                                            <p>
                                                                <img src="<?php echo $row['HinhAnh'] ?>" alt="">
                                                            </p>
    
                                                            <p style="text-align: center;"><?php echo $row['TenTour'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-header-text" id="heading-two">
                                                <button class="btn btn-link-kirirm">Chính sách tour</button>
                                                <i class="fas fa-plus glyphicon"></i>
                                                <!-- <i class="fas fa-minus glyphicon"></i> -->
                                            </div>
                                        </div>

                                        <div class="" id="collapse-two"></div>
                                    </div>


                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-header-text" id="heading-three">
                                                <button class="btn btn-link-kirirm">Câu hỏi thường gặp</button>
                                                <i class="fas fa-plus glyphicon"></i>
                                                <!-- <i class="fas fa-minus glyphicon"></i> -->
                                            </div>
                                        </div>

                                        <div class="" id="collapse-three"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col l-3 c-12">
                        <div class="row ">
                            <!-- Hỗ trợ khách hàng -->
                            <div class="col l-12 c-12">
                                <div class="right-detail-tour-box">
                                    <div class="title">Hỗ trợ khách hàng</div>
                                    <ul class="list-rows">
                                        <li class="item">
                                            <a href="tel: 1900 1808" class="item-line">
                                                <i class="fas fa-phone"></i>
                                                <span class="text">Hotline: 1900 1808</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="mailto: info@saigontourist.net" class="item-line">
                                                <i class="fas fa-envelope"></i>
                                                <span class="text">Email: info@saigontourist.net</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="callback-sgt">
                                        <button class="btn-callback-sgt">
                                            <i class="fas fa-phone"></i>
                                            <span> Bạn muốn được gọi lại?</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Vì sao bạn nên mua tour  -->
                            <div class="col l-12 c-12">
                                <div class="right-detail-tour-box">
                                    <div class="title">Vì sao nên mua tour online?</div>
                                    <ul class="list-rows">
                                        <li class="item">
                                            <a href="" class="item-line">
                                                <span class="text">An toàn - Bảo mật</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="" class="item-line">
                                                <span class="text">Tiện lợi, tiết kiệm thời gian</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="" class="item-line">
                                                <span class="text">Không tính phí giao dịch</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="" class="item-line">
                                                <span class="text">Giao dịch bảo đảm</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="" class="item-line">
                                                <span class="text">Nhận thêm ưu đãi</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Thương hiệu uy tín  -->
                            <div class="col l-12 c-12">
                                <div class="right-detail-tour-box">
                                    <div class="title">Thương hiệu uy tín</div>
                                    <ul class="list-rows">
                                        <li class="item">
                                            <a href="" class="item-line">
                                                <span class="text">Thành lập từ năm 1975</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="" class="item-line">
                                                <span class="text">Thương hiệu lữ hành hàng đầu</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="" class="item-line">
                                                <span class="text">Thương hiệu quốc gia</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Quảng cáo  -->
                            <p class="advertisement">
                                <a href="">
                                    <img src="https://saigontourist.net/uploads/images/for-mobile/banner-web-tai-App.jpg" alt="">
                                </a>
                            </p>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php require "../base/footer.php"; ?>
    
    
    <script>
        // var form = document.querySelector('.form-search');
        // var btnButton = document.querySelector('.btn-button');

        // btnButton.addEventListener('click', function() {
        //     form.submit();
        // })
    </script>
    <script src="../base/header.js"></script>
    <script src="../base/user_menu.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var button = document.querySelector('.btn-buy-tour');
            
            <?php 
                // nếu tour đã được đăng kí thì sẽ được chuyển hướng đến page detail tour
                if ($result_booked_tour_id -> num_rows > 0) {
                    ?>
                    button.addEventListener('click', function(e) {
                        // chặn hành vi chuyển trang của thẻ a
                        e.preventDefault();
                        var confirmRegisteredTour = confirm('Bạn đã đăng ký tour này.\nẤn OK để xem tour đã đăng kí!');
                        if (confirmRegisteredTour) {
                            // chuyển hướng trang bằng javascript
                            window.location = "../registered_tour/registered_tour.php";
                        } 
                    })
                    <?php
                }
            ?>
        })
    </script>
    
</body>
</html>
