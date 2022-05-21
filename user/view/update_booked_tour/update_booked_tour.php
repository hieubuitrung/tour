



<?php
    session_start();
    require "../../../config/config.php";
    // print_r($_SESSION);

    $tour_ticket_id = isset($_GET['MaPhieuTour']) ? $_GET['MaPhieuTour'] : null;
    if (isset($tour_ticket_id)) {

        $sql = "SELECT tour.`MaTour`, tour.`DiemDen`, tour.`HinhAnh`, tour.`TenTour`, tour.`Gia`, chitiettour.`NgayKhoiHanh`, chitiettour.`NgayKetThuc`, chitiettour.`MaChiTietTour`, chitiettour.`SoNgay`,
        khachhang.`TenKhachHang`,khachhang.`SDT`, khachhang.`Email`, khachhang.`DiaChi`, khachhang.`CMT`,
        phieudangkitour.`MaPhieuTour`, phieudangkitour.`SoLuong`, phuongthucthanhtoan.`MaPhuongThucThanhToan`, phuongthucthanhtoan.`TenPhuongThucThanhToan`
        FROM phieudangkitour, tour, chitiettour, khachhang, phuongthucthanhtoan
        WHERE phieudangkitour.`MaKhachHang` = khachhang.`MaKhachHang` AND phieudangkitour.`MaTour` = tour.`MaTour` AND phieudangkitour.`MaPhuongThucThanhToan` = phuongthucthanhtoan.`MaPhuongThucThanhToan` AND tour.`MaTour` = chitiettour.`MaTour` AND phieudangkitour.`MaPhieuTour` = '$tour_ticket_id'";
       
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        // hình thức thanh toán
        $sql_payment_methods = "SELECT * FROM phuongthucthanhtoan";
        $result_payment_methods = $conn->query($sql_payment_methods);
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
    <link rel="stylesheet" href="./update_booked_tour.css">
    <title>Chỉnh sửa thông tin</title>
    
</head>
<body>
    <!-- header  -->
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
                                <h1>Sửa thông tin tour</h1>
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
                    <div class="col l-8 c-12">
                        <div class="payment-wrap booking-form">
                            <form action="./update_booked_tour_in_database.php?MaPhieuTour=<?=$row["MaPhieuTour"]?>" method="post" id="info-form">
                                <div class="col l-12 c-12">
                                    <div class="title">
                                        <h3>Thông tin liên hệ</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col l-6 c-12">
                                            <div class="form-group">
                                                <label for="name">Tên (*)</label>
                                                <input type="text" name="name" id="name" class="name" data-index="0" value="<?php echo $row['TenKhachHang']; ?>" required>
                                                <span class="message"></span>
                                            </div>
                                        </div>
                                        <div class="col l-6 c-12">
                                            <div class="form-group">
                                                <label for="phone">Số điện thoại (*)</label>
                                                <input type="text" name="phone" id="phone" class="phone" data-index="1" value="<?php echo "0{$row['SDT']}"; ?>" style="opacity: .8;" readonly required>
                                                <span class="message"></span>
                                            </div>
                                        </div>
                                        <div class="col l-6 c-12">
                                            <div class="form-group">
                                                <label for="email">Email (*)</label>
                                                <input type="email" name="email" id="email" class="email" data-index="2" value="<?php echo $row['Email']; ?>" required>
                                                <span class="message"></span>
                                            </div>
                                        </div>
                                        <div class="col l-6 c-12">
                                            <div class="form-group">
                                                <label for="address">Địa chỉ (*)</label>
                                                <input type="text" name="address" id="address" class="address" data-index="3" value="<?php if(!empty($row['DiaChi'])) echo $row['DiaChi']?>" required>
                                                <span class="message"></span>
                                            </div>
                                        </div>
                                        <div class="col l-6 c-12">
                                            <div class="form-group">
                                                <label for="citizen-id">Số CCCD (*)</label>
                                                <input type="number" name="citizen-id" id="citizen-id" class="citizen-id" data-index="4" value="<?php if(!empty($row['CMT'])) echo $row['CMT'] ?>" required>
                                                <span class="message"></span>
                                            </div>
                                        </div>
                                        <div class="col l-6 c-12">
                                            <div class="form-group">
                                                <label for="number">Số lượng (*)(1 - 99)</label>
                                                <input type="number" name="quantity" class="quantity" id="quantity" data-index="5" value="<?=$row["SoLuong"]?>" min="1" max="99" step="1" required>
                                                <span class="message"></span>
                                            </div>
                                        </div>
                                        <div class="col l-12 c-12">
                                            <div class="form-group">
                                                <label for="">Chọn phương thức thanh toán</label>
                                                <select name="payment-methods" id="payment-methods">
                                                    <?php 
                                                        while($row_payment_methods = $result_payment_methods->fetch_assoc()) {
                                                    ?>
                                                        <option value="<?=$row_payment_methods['MaPhuongThucThanhToan']?>" <?php if($row_payment_methods['MaPhuongThucThanhToan'] == $row['MaPhuongThucThanhToan'])  echo "selected"; ?> ><?=$row_payment_methods['TenPhuongThucThanhToan']?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col l-12 c-12">
                                    <div class="button-area gallery-btn-area">
                                        <ul class="list-inline">
                                            <li>
                                                <a href="javascript: history.go(-1)">Trở về</a>
                                            </li>
                                            <li class="pull-right">
                                                <!-- giá trị form trong button tương đương vs id của form, button có thể đặt ngoài form -->
                                                <input type="button" id="button" value="Tiếp tục">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="col l-4 c-12">
                        <div class="div">
                            <div class="info-title-kiritm">
                                <span>Hỗ trợ giao dịch <strong>1900 1808</strong></span>
                                
                            </div>
                            <div class="book-details-info">
                                <img src="<?=$row['HinhAnh']?>" alt="">
                                <div class="info-area">
                                    <h3>
                                        <a href=""><?=$row['TenTour']?></a>
                                    </h3>
                                    <ul class="list-unstyled">
                                        <li>
                                            <i class="fas fa-barcode"></i>
                                            Code: <span><?=$row['MaChiTietTour']?></span>
                                        </li>
                                        <li>
                                            <i class="far fa-calendar-minus"></i>
                                            Ngày đi: <span><?=date("d/m/Y", strtotime($row['NgayKhoiHanh']))?></span>
                                        </li>
                                        <li>
                                            <i class="far fa-calendar-plus"></i>
                                            Ngày về: <span><?=date("d/m/Y", strtotime($row['NgayKetThuc']))?></span>
                                        </li>
                                        <li>
                                            <i class="fas fa-calendar-alt"></i>
                                            Thời gian: <span><?=$row['SoNgay']?></span>
                                        </li>
                                        <li>
                                            <i class="fas fa-user-secret"></i>
                                            Giá người lớn: 
                                            <span>
                                                <strong><?=number_format($row['Gia'], 0 , "", ".")?></strong>
                                                X 
                                                <strong id="quantity-bill"><?=$row["SoLuong"]?></strong>
                                            </span>
                                        </li>
                                        <li style="display: flex;">
                                            <i class="fas fa-dollar-sign" style="margin-top: 2px;"></i>
                                            <span>
                                                <strong id="payment-methods-bill"><?=$row['TenPhuongThucThanhToan']?></strong>
                                            </span>
                                        </li>
                                    </ul>
                                    <div class="price-totol">
                                        <hr>
                                        <h2>Tổng: 
                                            <span>
                                                <span id="total"><?=number_format($row['Gia'], 0, "", ".")?></span>
                                                <span class="price-label">đồng</span>
                                            </span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- footer  -->
    <?php
        require "../base/footer.php";
    ?>

    <script>
        
        // update giá tiền 
        const quantity = document.querySelector('#quantity');
        const total = document.querySelector('#total');
        const quantityBill = document.querySelector('#quantity-bill');
        const paymentMethods = document.querySelector('#payment-methods'); 
        const paymentMethodsBill = document.querySelector('#payment-methods-bill'); 
        const price = <?=$row['Gia']?>;
        
        quantity.addEventListener("input", function (e) {
            total.textContent = (e.target.value * price).toLocaleString('vi-VN');
            quantityBill.textContent = (e.target.value);
        })

        paymentMethods.addEventListener("change", function(e) {
            paymentMethodsBill.textContent = paymentMethods.options[paymentMethods.selectedIndex].textContent;
        })
    </script>

    <script src="../base/user_menu.js"></script>
    <script src="./update_booked_tour.js"></script>
</body> 
</html>