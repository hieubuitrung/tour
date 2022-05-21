<?php
    session_start();
    require "../../../config/config.php";
    // print_r($_SESSION);
    // nếu chưa đăng nhập thì chuyển đển page đăng nhập
    if (!isset($_SESSION['phone'])) {
        $_SESSION['page'] = 'book_tour';
        header("location: ../sign_in/sign_in.php");
    } else {
        // lấy điểm đến dựa vào mã chi tiết tour (get)
        $tour_detail_id = isset($_SESSION['tour_detal_id']) ? $_SESSION['tour_detal_id'] : '';
        $sql_info_tour = "SELECT tour.`DiemDen`, tour.`HinhAnh`, tour.`TenTour`, tour.`Gia`, chitiettour.`NgayKhoiHanh`, chitiettour.`NgayKetThuc`, chitiettour.`MaChiTietTour`, chitiettour.`SoNgay`
        FROM tour, chitiettour 
        WHERE tour.`MaTour` = chitiettour.`MaTour` AND chitiettour.`MaChiTietTour` = $tour_detail_id";
        $result_destination = $conn->query($sql_info_tour);
        if ($result_destination->num_rows > 0) {
            $row_info_tour = $result_destination->fetch_assoc();
        }


        // lấy giá trị session phone
        $session_phone = $_SESSION['phone'];

        $sql = "SELECT khachhang.`TenKhachHang`, khachhang.`HinhAnh`, khachhang.`SDT`, khachhang.`Email`, khachhang.`DiaChi`, khachhang.`CMT`
        FROM khachhang WHERE khachhang.`SDT` = '$session_phone'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
 
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
    <link rel="stylesheet" href="./book_tour.css">
    <title>Đặt tour</title>
    
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
                                <h1>Đặt tour</h1>
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
                            <form action="./insert_tour_database.php?MaChiTietTour=<?=$tour_detail_id?>" method="post" id="info-form">
                                <div class="row">
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
                                                    <input type="number" name="number" class="number" id="quantity" data-index="5" value="1" min="1" max="99" step="1" required>
                                                    <span class="message"></span>
                                                </div>
                                            </div>
                                            <div class="col l-12 c-12">
                                                <div class="form-group">
                                                    <label for="">Chọn phương thức thanh toán</label>
                                                    <select name="payment-methods" id="payment-methods">
                                                        <?php 
                                                            while($row_payment_methods = $result_payment_methods->fetch_assoc()) {
                                                                echo "<option value='{$row_payment_methods['MaPhuongThucThanhToan']}'>{$row_payment_methods['TenPhuongThucThanhToan']}</option>";
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
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="col l-4 c-12">
                        <div class="">
                            <div class="info-title-kiritm">
                                <span>Hỗ trợ giao dịch <strong>1900 1808</strong></span>
                                
                            </div>
                            <div class="book-details-info">
                                <img src="<?php echo $row_info_tour['HinhAnh'] ?>" alt="">
                                <div class="info-area">
                                    <h3>
                                        <a href=""><?php echo $row_info_tour['TenTour'] ?></a>
                                    </h3>
                                    <ul class="list-unstyled">
                                        <li>
                                            <i class="fas fa-barcode"></i>
                                            Code: <span><?php echo $row_info_tour['MaChiTietTour'] ?></span>
                                        </li>
                                        <li>
                                            <i class="far fa-calendar-minus"></i>
                                            Ngày đi: <span><?php echo date("d/m/Y", strtotime($row_info_tour['NgayKhoiHanh'])) ?></span>
                                        </li>
                                        <li>
                                            <i class="far fa-calendar-plus"></i>
                                            Ngày về: <span><?php echo date("d/m/Y", strtotime($row_info_tour['NgayKetThuc'])) ?></span>
                                        </li>
                                        <li>
                                            <i class="fas fa-calendar-alt"></i>
                                            Thời gian: <span><?php echo $row_info_tour['SoNgay'] ?></span>
                                        </li>
                                        <li>
                                            <i class="fas fa-user-secret"></i>
                                            Giá người lớn: 
                                            <span>
                                                <strong><?php echo number_format($row_info_tour['Gia'], 0 , "", ".") ?></strong>
                                                X 
                                                <strong id="quantity-bill">1</strong>                                                
                                            </span>
                                        </li>
                                        <li style="display: flex;">
                                            <i class="fas fa-dollar-sign" style="margin-top: 2px;"></i>
                                            <span>
                                                <strong class="payment-methods-bill">THANH TOÁN BẰNG THẺ NỘI ĐỊA ATM</strong>
                                            </span>
                                        </li>
                                    </ul>
                                    <div class="price-totol">
                                        <hr>
                                        <h2>Tổng: 
                                            <span>
                                                <span id="total"><?php echo number_format($row_info_tour['Gia'], 0, "", ".") ?></span>
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
        const paymentMethodsBill = document.querySelector('.payment-methods-bill'); 
        const price = <?=$row_info_tour['Gia']?>;
        
        quantity.addEventListener("input", function (e) {
            total.textContent = (e.target.value * price).toLocaleString('vi-VN');
            quantityBill.textContent = (e.target.value);
        })

        paymentMethods.addEventListener("change", function(e) {
            console.log([e]);
            //paymentMethods.options: các thẻ option
            //paymentMethods.selectedIndex: vi trí được select
            paymentMethodsBill.textContent = paymentMethods.options[paymentMethods.selectedIndex].textContent;
        })
    </script>

    <script src="../base/header.js"></script>
    <script src="../base/user_menu.js"></script>
    <script src="./book_tour.js"></script>
</body> 
</html>