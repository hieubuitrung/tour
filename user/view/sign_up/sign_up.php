<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <title>Sign up</title>
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="./sign_up.css">
</head>
<body>
    <div class="form-container">
        <form action="./sign_up_insert.php" method="post" id="form">
            <h1>Đăng ký thành viên</h1>
            <div class="social-container">
                <a href="" class="social"><i class="fab fa-facebook"></i></a>
                <a href="" class="social"><i class="fab fa-twitter"></i></a>
                <a href="" class="social"><i class="fab fa-instagram"></i></a>
            </div>
            <span style="text-align: center;">hoặc sử dụng số điện thoại để đăng ký</span>
            <div class="info info-name">
                <input type="text" name="name" class="name" data-index="0" placeholder="Họ tên">
                <span class="message"></span>
            </div>
            <div class="info info-phone">
                <input type="text" name="phone" class="phone" data-index="1" placeholder="Số điện thoại">
                <span class="message"></span>
            </div>
            <div class="info-birthday">
                <span>Ngày sinh</span>
                <div class="birthday">
                    <select name="day" class="day">
                        <?php
                            $day = date("d");
                            for($i=1; $i<=30; $i++) {
                                echo "<option value='{$i}' ";
                                if($day == $i) {
                                    echo "selected";
                                }
                                echo ">{$i}</option>";
                            }
                        ?>
                    </select>
                    <select name="month" class="month">
                        <?php
                            $month = date("m");
                            for($i=1; $i<=12; $i++) {
                                echo "<option value='{$i}'";
                                if($month == $i) {
                                    echo "selected";
                                }
                                echo ">{$i}</option>";
                            }
                        ?>
                    </select>
                    <select name="year" class="year">
                        <?php
                            $year = date("Y");
                            for($i=2021; $i>=1905; $i--) {
                                echo "<option value='{$i}'";
                                if($year == $i) {
                                    echo "selected";
                                }
                                echo ">{$i}</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="info-gender">
                <span>Gender</span>
                <div class="gender">
                    <label for="nam" class="gender-female">
                        <span class="gender-title">Nam</span>
                        <input type="radio" name="gender" data-index="2" id="nam" value="Nam">
                    </label>
                    <label for="nu" class="gender-male">
                        <span class="gender-title">Nữ</span>
                        <input type="radio" name="gender" data-index="2" id="nu" value="Nữ">
                    </label>
                    <label for="khác" class="gender-custom">
                        <span class="gender-title">Khác</span>
                        <input type="radio" name="gender" data-index="2" id="khác" value="Khác">
                    </label>
                </div>
                <span class="message"></span>
            </div>
            <div class="info info-email">
                <input type="email" name="email" class="email" data-index="3" placeholder="Email">
                <span class="message"></span>
            </div>
            <div class="info info-password">
                <input type="password" name="password" class="password" data-index="4" placeholder="Mật khẩu" >
                <span>Gợi ý: Mật khẩu tối thiểu tám ký tự, ít nhất một chữ cái và một số</span>
                <span class="message"></span>
            </div>
            <div class="info info-cf-password">
                <input type="password" name="cfpassword" class="cfpassword" data-index="5" placeholder="Nhập lại mật khẩu" >
                <span class="message"></span>
            </div>
            <input type="button" class="button" value="Sign up" name="button">
        </form>
        <span class="sign_in">Bạn đã có tài khoản? <a href="../sign_in/sign_in.php">Đăng nhập</a></span>
    </div>

    <script src="./sign_up.js"></script>
</body>
</html>
