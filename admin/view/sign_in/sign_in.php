<?php 
    if (count($_COOKIE) > 0) {
        // header("location: ../../user/home/trang_chu.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="../../../css/reset.css">
    <title>Sign in</title>
    <style>
        .form-container {
            width: 480px;
            max-width: 100%;
            margin: 30px auto 0;
            border: 5px solid #FF4B2B;
            box-shadow: 0 0 10px #000;
            padding: 30px 0;
            border-radius: 4px;
            background: #ddd;
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100%;
            padding: 0 50px;
        }

        .form-container h1 {
            font-size: 3.2rem;
            font-weight: 600;
        }

        .social-container {
            margin: 20px 0;
            display: flex;
            justify-content: center;
        }

        .social-container a {
            margin: 0 5px;
            border: 1px solid #ddd;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            position: relative;
        }

        
        .social i {
            font-size: 2.8rem;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #5f6c6f;
        }

        .form-container span {
            font-size: 1.2rem;
            color: #000;
        }

        .form-container form > input {
            padding: 12px 15px;
            margin: 8px 0;
            background-color: #eee;
            border: none;
            border-radius: 2px;
            width: 100%;
            color: #5f6c6f;
            box-sizing: border-box;
            outline: none;
        }

        .form-container #button {
            border-radius: 20px;
            border: 1px solid #FF4B2B;
            background-color: #FF4B2B;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            margin: 8px 0;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
            width: auto;
        }

        /* khi ???n v??o gi??? button  */
        .form-container #button:active { 
            transform: scale(0.95);
        }


        .sign_up {
            text-align: center;
            font-size: 1.4rem;
        }

        .sign_up a {
            display: inline-block;
            color: #f05123;
            text-decoration: none;
        }
        .page-wrapper {
            min-height: 80vh;
        }
        .background-color{
            background: #424242;
        }
        .padding{
            padding-top: 130px;
            padding-bottom: 100px;
        }

        .form-container span.wrongtype, .form-container span.message {
            height: 10px;
            line-height: 10px;
            font-size: 10px;
            color: red;
            width: 100%;
        }
    </style>
    <script src="./sign_in.js"></script>
</head>
<body>
    <div class="page-wrapper padding background-color">
        <div class="form-container">
            <form action="./sign_in_check.php" method="post" id="form" style="position: relative;">
                <h1>????ng nh???p</h1>
                <div class="social-container">
                    <a href="" class="social"><i class="fab fa-facebook"></i></a>
                    <a href="" class="social"><i class="fab fa-twitter"></i></a>
                    <a href="" class="social"><i class="fab fa-instagram"></i></a>
                </div>
                <span>ho???c s??? d???ng t??i kho???n c???a b???n</span>
                <input type="text" name="username" id="phone" placeholder="username">
                <span class='wrongtype'></span>
                <input type="password" name="password" id="password" placeholder="M???t kh???u">
                <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="btnPassword" style="position: absolute; right: 57px; bottom: 83px; border: none;">
                <span class="fas fa-eye"></span>
                </button>
                </div>
                <span class="message"></span>
                <input type="button" name="button" id="button" value="????ng nh???p">
                
            </form>
        </div>
    </div>
    <script src="./sign_in.js"></script>
    <script>// step 1
const ipnElement = document.querySelector('#password')
const btnElement = document.querySelector('#btnPassword')

// step 2
btnElement.addEventListener('click', function() {
  // step 3
  const currentType = ipnElement.getAttribute('type')
  // step 4
  ipnElement.setAttribute(
    'type',
    currentType === 'password' ? 'text' : 'password'
  )
})</script>
</body>
</html>