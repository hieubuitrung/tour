<?php
    require "./connect.php";
    // lấy sđt khách hàng
    $phone_user = $_GET['phone'];
    // lấy id khách hàng
    $sql_user_id = "SELECT * FROM  khachhang WHERE khachhang.`SDT` = $phone_user";
    $result_user_id = $conn->query($sql_user_id);
    $row_user_id = $result_user_id->fetch_assoc();
    $user_id = $row_user_id["MaKhachHang"];
    echo $user_id;
    // xóa tour khách hàng đã đăng kí
    $sql_tour = "DELETE FROM phieudangkitour WHERE phieudangkitour.`MaKhachHang` = $user_id";
    $conn->query($sql_tour); 

    // xóa phản hồi khách hàng đã phản hồi
    $sql_feedback = "DELETE FROM phanhoi WHERE phanhoi.`MaKhachHang` = $user_id";
    $conn->query($sql_feedback);

    // xóa thông tin khách hàng
    $sql_info = "DELETE FROM khachhang WHERE khachhang.`MaKhachHang` = $user_id";
    $conn->query($sql_info);

    // xóa tài khoản khách hàng
    $sql_info = "DELETE FROM user WHERE user.`SDT` = $phone_user";
    $conn->query($sql_info);

    header("location: ./admin.php");
?>