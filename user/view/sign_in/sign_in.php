
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="./sign_in.css">
    <title>Sign in</title>
    
</head>
<body>
    <div class="sign-in">
        <div class="form-container">
            <form action="./sign_in_check.php" method="post" id="form">
                <h1>Đăng nhập</h1>
                <div class="social-container">
                    <a href="" class="social"><i class="fab fa-facebook"></i></a>
                    <a href="" class="social"><i class="fab fa-twitter"></i></a>
                    <a href="" class="social"><i class="fab fa-instagram"></i></a>
                </div>
                <span>hoặc sử dụng tài khoản của bạn</span>
                <div class="info-phone">
                    <input type="text" name="phone" id="phone" data-index="0" placeholder="Số điện thoại">
                    <span class="message"></span>
                </div>
                <div class="info-pass">
                    <input type="password" name="password" id="password" data-index="1" placeholder="Mật khẩu">
                    <span class="message"></span>
                </div>
                <input type="button" name="button" id="button" value="Đăng nhập">
            </form>
            <span class="sign_up">Bạn chưa có tài khoản? <a href="../sign_up/sign_up.php">Đăng ký</a></span>
        </div>
    </div>
        
    <script src="./sign_in.js">
        
    </script>

    <?php 
        if (isset($_GET['error'])) {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                alert('Số điện thoại hoặc mật khẩu không chính xác');
            });
            </script>";
        }
    ?>
</body>
</html>

