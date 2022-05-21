<?php 
    session_start();
    print_r($_SESSION);

    require "../../../config/config.php";

    $tour_ticket_id = $_GET['MaPhieuTour'];
    // lấy thông tin cần update
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $citizen_id = isset($_POST['citizen-id']) ? $_POST['citizen-id'] : '';
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
    $paymentMethods = isset($_POST['payment-methods']) ? $_POST['payment-methods'] : '';

    $client = $_SESSION['client'];

    $sql = "UPDATE khachhang SET khachhang.`TenKhachHang` = '$name', khachhang.`DiaChi` = '$address', khachhang.`CMT` = '$citizen_id', khachhang.`Email` = '$email' WHERE khachhang.`MaKhachHang` = $client ";
    if ($conn->query($sql)) {
        $sql = "UPDATE phieudangkitour SET phieudangkitour.`MaPhuongThucThanhToan` = '$paymentMethods', phieudangkitour.`SoLuong` = '$quantity' WHERE phieudangkitour.`MaPhieuTour` = $tour_ticket_id";
        if ($conn->query($sql)) {
            header("location: ../registered_tour/registered_tour.php");
        }
    }
?>