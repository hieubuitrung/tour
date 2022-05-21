<?php 
    // bắt đầu 1 phiên 
    session_start();

    if(isset($_SESSION)) {
        // $cookie_name = "phone";
        // $cookie_value = "";

        // tạo cookie trên máy người dùng - thời gian 30 ngày
        // setcookie($cookie_name, $cookie_value, time() - 3600); 
        // hủy bỏ tất cả các biến sesstion
        session_unset();
        // hủy bỏ session
        session_destroy();
        // chuyển hướng đến trang chủ
        header("location: ../sign_in/sign_in.php");
    }

?>