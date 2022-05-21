<?php
    // khởi tạo phiên làm việc
    session_start();
    if (isset($_POST['username']) && isset($_POST['password'])) {
        //connect database
        require "./connect.php";

        $username = $_POST['username'];
        $password = $_POST['password'];

        // echo $username;
        // echo $password;

        $sql = "SELECT * FROM admin WHERE `username` = '$username' AND `PassWord` = '$password'";
        $result = $conn->query($sql);
        echo $result->num_rows;
        print_r($result);
        if($result->num_rows > 0) {
            // $cookie_name = "username";
            // $cookie_value = $username;
            $session_value = $username;
            // tạo cookie trên máy người dùng - thời gian 30 ngày
            // setcookie($cookie_name, $cookie_value, time() + (86400 * 30)); 
            // lưu sđt vào biến sesstion
            
            $_SESSION['username'] = $session_value;
            // chuyển hướng đến trang chủ
            header("location: taixe.php");
            
        }
    }
?>