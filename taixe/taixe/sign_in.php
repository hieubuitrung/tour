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

        /* khi ấn vào giữ button  */
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
    </style>
    <script src="./sign_in.js"></script>
</head>
<body>
    <div class="page-wrapper padding background-color">
        <div class="form-container">
            <form action="./sign_in_check.php" method="post" action="#" name="register">
                <h1>Đăng nhập</h1>
                <div class="social-container">
                    <a href="" class="social"><i class="fab fa-facebook"></i></a>
                    <a href="" class="social"><i class="fab fa-twitter"></i></a>
                    <a href="" class="social"><i class="fab fa-instagram"></i></a>
                </div>
                
                <input type="text" name="username" id="userName" placeholder="">
                <span id="userError"></span>
                <input type="password" name="password" id="passWord" placeholder="">
                <span id="passError"></span>
                <input type="submit" name="button" id="button" value="Đăng nhập">
            </form>
        </div>
    </div>
<script type="text/javascript">
        
    document.addEventListener('DOMContentLoaded', function(){
        document.querySelector('#button').disabled = true;
        document.querySelector('#userName').onchange = function(){
            if(document.querySelector('#userName').value.length <8){
                document.querySelector('#userError').innerHTML ="Sai tai Khoan! Toi thieu 8 ky tu";
        
            }
            else{
                document.querySelector('#userError').innerHTML ="**************";
                document.querySelector('#button').disabled= false;
            }
            

        };

  
    });


    </script>
</body>
</html>