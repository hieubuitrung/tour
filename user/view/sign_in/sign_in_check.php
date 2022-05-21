<?php
    // khởi tạo phiên làm việc
    session_start();
    if (isset($_POST['phone']) && isset($_POST['password'])) {
        //connect database
        require '../../../config/config.php';

        $phone = (int)$_POST['phone'];
        $password = $_POST['password'];

        // echo $phone;
        // echo $password;

        $sql = "SELECT user.`SDT`, khachhang.`MaKhachHang` FROM user, khachhang 
        WHERE user.`SDT` = khachhang.`SDT` AND user.`SDT` = '$phone' AND user.`PassWord` = '$password'";
        $result = $conn->query($sql);
        
        // print_r($result);
        if($result->num_rows > 0) {
            // $cookie_name = "phone";
            // $cookie_value = $phone;
            // tạo cookie trên máy người dùng - thời gian 30 ngày
            // setcookie($cookie_name, $cookie_value, time() + (86400 * 30)); 
            // lưu sđt vào biến sesstion
            $row = $result->fetch_assoc();

            $session_phone = $row['SDT'];
            $_SESSION['phone'] = $session_phone;

            $session_id_client = $row['MaKhachHang'];
            $_SESSION['client'] = $session_id_client;
           
            // nếu người dùng đặt tour mà chưa đăng nhập thì sẽ chuyển đến trang đăng nhập
            // sau khi đăng nhập lại chuyển người dùng lại page tour
            if ($_SESSION['page'] == 'book_tour') {
                // chuyển hướng đến page book tour
                $session_tour_detail_id = $_SESSION['tour_detal_id'];
                header("location: ../page_info_tour/page_info_tour.php?MaChiTietTour={$session_tour_detail_id}");
            } else {
                // chuyển hướng đến trang chủ
                header("location: ../home/trang_chu.php");
            }
            
            
        } else {
            // echo "Đã";
            header("location: ../sign_in/sign_in.php?error");
        }
    }
?>