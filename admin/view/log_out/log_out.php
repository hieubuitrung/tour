<?php 
    // bắt đầu 1 phiên 
    session_start();

    if(isset($_SESSION)) {
        // hủy bỏ tất cả các biến sesstion
        session_unset();
        // hủy bỏ session
        session_destroy();
        // chuyển hướng đến trang chủ
        header("location:../front-end/admin.php");
    }

?>