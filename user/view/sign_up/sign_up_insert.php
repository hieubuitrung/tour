<?php
    if (!empty($_POST['phone'])){
        // connect database
        require '../../../config/config.php'; 
        // get data from form
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $day = isset($_POST['day']) ? $_POST['day'] : '';
        $month = isset($_POST['month']) ? $_POST['month'] : '';
        $year = isset($_POST['year']) ? $_POST['year'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : ''; // trả về value của input được check
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        
        $sql = "INSERT INTO user(`SDT`, `PassWord`) VALUES ('$phone', '$password') ";
        $conn->query($sql);
            

        $sql = "INSERT INTO khachhang(`TenKhachHang`, `NgaySinh`, `GioiTinh`, `DiaChi`, `SDT`, `Email`) VALUES ('$name', '$year-$month-$day', '$gender', '', '$phone', '$email') ";
        $conn->query($sql);

        header("location: ../sign_in/sign_in.php");
    }
?>