<?php
    session_start();
    require "../../../config/config.php";
    // print_r($_SESSION);
    if (isset($_SESSION['client'])) {
        $client = $_SESSION['client'];

        $name = $_POST['name-user'];
        $email = $_POST['email-user'];
        $citizen_id = $_POST['citizen-id-user'];
        $address = $_POST['address'];

        // lấy file ảnh
        $image = $_FILES["upload-file"];
        //$ target_dir - chỉ định thư mục nơi tệp sẽ được đặt
        $target_dir = "../../image/";

        //$target_file chỉ định đường dẫn của tệp sẽ được tải lên (basename: trả về đuôi của đường dẫn)
        // $image["name"] Tên gốc của tệp trên máy khách.

        $target_file = $target_dir . basename($image["name"]);

        $uploadOk = 1;

        // $imageFileType giữ phần mở rộng tệp của tệp (chữ thường) - định dạng ảnh
        // pathinfo: trả về thông tin đường dẫn tệp ($target_file đường dẫn được kiểm tra
        // ,PATHINFO_EXTENSION chỉ trả về phần mở rộng cuối cùng, nếu đường dẫn có nhiều phần mở rộng)
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // file_exists: kiểm tra ảnh đã tồn hay không
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }

        // chỉ cho upload 1 số định dạng
        if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }

        if ($uploadOk != 0) {
            // upload ảnh 
            // move_uploaded_file: di chuyển tệp đã tải lên đến đích mới
            // $image["tmp_name"] Tên tệp tạm thời của tệp mà tệp đã tải lên được lưu trữ trên máy chủ.
            move_uploaded_file($image["tmp_name"], $target_file);
        }

        // update thông tin user
        $sql = "UPDATE khachhang SET khachhang.`TenKhachHang` = '$name', khachhang.`DiaChi` = '$address', khachhang.`CMT` = '$citizen_id' , khachhang.`Email` = '$email' 
        WHERE khachhang.`MaKhachHang` = '$client'";
        if ($conn->query($sql)) {
            // nếu cập nhật lại hình ảnh thì mới update hình ảnh
            if (!empty($image["name"])) {
                $sql = "UPDATE khachhang SET khachhang.`HinhAnh` = '$target_file' WHERE khachhang.`MaKhachHang` = '$client'";
                $conn->query($sql);
            }
            header("location: ./setting.php");
        }
    } else {
        echo '
        <h1>Oops! An Error Occurred</h1>
        <h2>The server returned a "404 Not Found".</h2>

        <div>
            Something is broken. Please let us know what you were doing when this error occurred.
            We will fix it as soon as possible. Sorry for any inconvenience caused.
        </div>';
        exit;
    }
?>