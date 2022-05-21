<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Thiết lập mảng lưu lỗi => Mặc định rỗng
    $error = array();
    if (empty($_POST['pay'])) {
        $error['pay'] = "Bạn cần chọn hình thức thanh toán";
    } else {
        $pay = $_POST['pay'];
    }
    // Kiểm tra có lỗi hay không
    if (empty($error)) {
        echo $pay;
        // Xử lý dữ liệu khi không gặp lỗi nhập liệu
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Nhận dữ liệu từ Drop-Down List | Hocweb123</title>
    </head>
    <body>
        <h1>Nhận dữ liệu từ Drop-Down List</h1>
        <form action="" method="POST">
            <label for="">Hình thức thanh toán</label><br/>
            <select name="pay">
                <option value="">--Chọn--</option>
                <option <?php if (isset($pay) && $pay == 'cod') echo "selected=\"selected\"";  ?> value="cod" >Thanh toán tại nhà</option>
                <option <?php if (isset($pay) && $pay == 'banking') echo "selected=\"selected\"";  ?> value="banking">Thanh toán qua Thẻ tín dụng</option>
            </select><br/><br/>
            <span style="color: red;"><?php if (isset($error['pay'])) echo $error['pay']; ?></span> <br/>
            <input type="submit" name="sm_order" value="Gửi thông tin">
        </form>
    </body>
</html>