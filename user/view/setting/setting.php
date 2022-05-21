<?php
    require "../../../config/config.php";
    session_start();
    // print_r($_SESSION);

    if (isset($_SESSION['client'])) {
        $client = $_SESSION['client'];
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

    $sql = "SELECT * FROM khachhang WHERE khachhang.`MaKhachHang` = '$client'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    // print_r($row);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comforter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/base/base.css">
    <link rel="stylesheet" href="../../../grid/grid.css">
    <link rel="stylesheet" href="../../../css/base/style.css">
    <link rel="stylesheet" href="../../../css/base/responsive.css">
    <link rel="stylesheet" href="./setting.css">
    <title>Thiết lập về tôi</title>
</head>
<body>

    <?php require "../base/header.php"; ?>
    <div class="setting-user">
        <div class="container">
            <h1 class="setting-heading">Cài đặt</h1>
            <div class="info-user">
                <h2 class="info-user-heading">Thông tin cá nhân</h2>
                <form action="./update_user.php" id="form-update" method="post" enctype="multipart/form-data">
                    <div id="name">
                        <h3>Họ tên</h3>
                        <input type="text" name="name-user" id="name-user" value="<?=$row['TenKhachHang']?>">
                    </div>
                    <div id="avatar">
                        <h3>Avatar</h3>
                        <div>
                            <img src="<?=$row['HinhAnh']?>" alt="" id="photo-avatar">
                            <!-- <div class="photo-avatar" style = "background : url('') center center / cover no-repeat; "></div> -->
                            <label for="upload-file" id="icon-photo">
                                <div class="photo-file">
                                    <img src="../../image/camera.png" alt="">
                                </div>
                            </label>
                            <!-- accept="image/*" - xác định loại tập tin nào được tải lên, * là tất cả định dạng img  -->
                            <input type="file" accept="image/*" name="upload-file" id="upload-file">
                            <img src="" alt="" id="output">
                        </div>
                        <span style="margin-top: 19px;" class="message">Nên là ảnh vuông, chấp nhận các tệp: JPG, JPEG, PNG hoặc GIF.</span>
                    </div>
                    <div id="email">
                        <h3>Email</h3>
                        <input type="email" name="email-user" id="email-user" value="<?=$row['Email']?>">
                    </div>
                    <div id="phone-number">
                        <h3>Số điện thoại</h3>
                        <input type="text" name="phone-number-user" id="phone-number-user" value="0<?=$row['SDT']?>" readonly style="opacity: .7;">
                        <span class="message">Tính năng chưa được cập nhật</span>
                    </div>
                    <div id="address">
                        <h3>Địa chỉ</h3>
                        <input type="text" name="address" value="<?=$row['DiaChi']?>" id="address-user">
                    </div>
                    <div id="citizen-id">
                        <h3>Số CCCD</h3>
                        <input type="text" name="citizen-id-user" id="citizen-id-user" value="<?=$row['CMT']?>">
                    </div>
                    <div class="update">
                        <input type="button" id="button" value="Lưu">
                        <a href="javascript: history.go(-1)" id="cancel">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require "../base/footer.php"; ?>
    
    <script src="../base/user_menu.js"></script>
    <script src="../base/header.js"></script>
    <script>
        const form = document.querySelector('#form-update');
        const button = document.querySelector('#button');
        button.addEventListener('click', function() {
            const confirmInfoChange = confirm("Thông tin tài khoản sẽ bị thay đổi");
            if (confirmInfoChange) {
                form.submit();
            }
        })
    </script>

    <!-- tham khảo -->
    <script>
        document.querySelector("#upload-file").onchange = function () {
            //Đối tượng FileReader cho phép các ứng dụng web đọc không đồng bộ nội dung của tệp (hoặc bộ đệm dữ liệu thô) được lưu trữ trên máy tính của người dùng
            //FileReader chỉ có thể truy cập nội dung của tệp mà người dùng đã chọn rõ ràng
            var reader = new FileReader();

            // onload: sự kiện xảy ra khi đỗi tượng đã được tải
            // Một trình xử lý cho FileReader.load_event sự kiện. Sự kiện này được kích hoạt mỗi khi hoàn tất thành công thao tác đọc.
            reader.onload = function (e) {
                // nhận dữ liệu đã tải và hiển thị hình thu nhỏ
                // result:  tệp dưới dạng chuỗi được mã hóa base64
                document.getElementById("photo-avatar").src = e.target.result;
            };

            // đọc tệp hình ảnh dưới dạng URL dữ liệu.
            // this: input type=file
            // readAsDataURL: phương thức đọc nội dung
            // console.log(this.files[0])
            reader.readAsDataURL(this.files[0]);
        };
    </script>
</body>
</html>