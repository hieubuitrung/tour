<?php

    session_start();
    print_r($_SESSION);
    require "../../../config/config.php";

    // lấy mã chi tiết tour
    $id_info_tour = $_GET['MaChiTietTour'];
    // echo $id_info_tour;
    // lấy mã khách hàng
    $id_client = $_SESSION['client'];
    // số điện thoại user
    $phone = $_SESSION['phone'];
    // lấy mã tour
    $tour_id = $_SESSION['tour_id'];
    // echo $phone;

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    // $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $citizen_id = isset($_POST['citizen-id']) ? $_POST['citizen-id'] : '';
    $number = isset($_POST['number']) ? $_POST['number'] : '';
    $payment_methods = isset($_POST['payment-methods']) ? $_POST['payment-methods'] : '';
    // echo $payment_methods;

    // mặc định tình trạng là chờ xác nhận
    $status = "Chờ xác nhận";

    // bổ sung thông tin vào bảng khách hàng
    $sql = "UPDATE khachhang SET khachhang.`TenKhachHang` = '$name', khachhang.`DiaChi` = '$address', khachhang.`CMT` = '$citizen_id' , khachhang.`Email` = '$email' 
    WHERE khachhang.`SDT` = $phone";
    $conn->query($sql);

    
    // thêm bản ghi vào phiếu đăng kí tour
    $sql = "INSERT INTO phieudangkitour(`MaKhachHang`, `SoLuong`, `MaTour`, `MaChiTietTour`, `MaPhuongThucThanhToan`, `TinhTrang`) 
    VALUES ($id_client, $number, $tour_id, $id_info_tour, $payment_methods, '$status') ";

    $conn->query($sql);

    $client = $_SESSION['client'];
    $sql = "SELECT phieudangkitour.`MaPhieuTour` FROM phieudangkitour WHERE phieudangkitour.`MaKhachHang` = $client AND phieudangkitour.`MaChiTietTour` = $id_info_tour";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        header("location: ../successful_tour_booking/successful_tour_booking.php?MaPhieuTour={$row['MaPhieuTour']}");
    }
?>