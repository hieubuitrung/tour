<?php 
        session_start();
        require 'connect.php';
        if(isset($_POST['submit'])){
            ////////////////////////////////////////////////
            $hotel_name=$_POST['hotel_name'];
            $address=$_POST['address'];
            $phone_number=$_POST['phone_number'];
            $price=$_POST['price'];
            $rating=$_POST['rating'];
            $hinhanh=$_POST['hinhanh'];
            ////////////////////////////////////////////////
            $sql="Insert into khachsan(tenkhachsan,diachi,dienthoai,tieuchuan,giatien, hinhanh) values (n'{$hotel_name}',n'{$address}',{$phone_number},{$rating},{$price},{$hinhanh})";
            $result = $conn->query($sql);
            if (!$result) {
                trigger_error('Invalid query: ' . $conn->error);
            }else{
                echo "Insert Thanh Cong";
                header("location: ../hotel.php");
            }    
            }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng ký khách sạn</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/input_hotel.css" rel="stylesheet" media="all">
    <style>
        .star::after{
            content:" *";
            color: red;
        }
    </style>
    <script src="input_hotel_validation.js"></script>
</head>

<body>
    <div class="page-wrapper background_color padding font-poppins">
        <div class="wrapper">
            <div class="card">
                <div class="card-body">
                    <h2 class="title">Form đăng ký khách sạn</h2>
                    <form method="POST" action="" name="input_hotel" onsubmit="return checkform()">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label star">Tên khách sạn</label>
                                    <input type="text" name="hotel_name", id="hotel_name">
                                </div>
                            </div> 
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label star">Địa chỉ</label>
                                    <input type="text" name="address", id='address'>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label star">Giá tiền</label>
                                    <input type="number" name="price", id="price">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label star">Phone Number</label>
                                    <input type="number" name="phone_number", id="phone_number">
                                </div>
                            </div>
                        </div>
                                <div class="input-group">
                                    <label class="label star">Link Hình Ảnh</label>
                                    <input type="text" name="hinhanh", id="hinhanh">
                                </div>
                        <div class="input-group">
                            <label class="label star">Tiêu chuẩn</label>
                                <select name="rating" class="input-select" require style="height: 50px;border: none;outline: none;margin: 0;border: none;box-shadow: none;width: 100%;font-size: 14px;font-family: inherit;line-height: 50px;background: #fafafa;box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);border-radius: 5px;padding: 0 20px;font-size: 16px;color: #555; transition: all 0.4s ease;background: #FAFAFA;">
                                    <!-- <option disabled="disabled" selected="selected">Rating</option> -->
                                    <option value="1" selected="selected">1 Sao</option>
                                    <option value="2">2 Sao</option>
                                    <option value="3">3 Sao</option>
                                    <option value="4">4 Sao</option>
                                    <option value="5">5 Sao</option>
                                </select>
                        </div>
                        <div class="button" >
                            <input type="submit" value="Submit" id="submit" class="btn" type="submit" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <link rel="stylesheet" href="">
</body>

</html>