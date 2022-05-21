<?php
    require "./connect.php";
    $makhachsan = $_GET['MaKhachSan'];
    
    if (isset($_POST['submit'])) {
        $hotel_name=$_POST['hotel_name'];
        $address=$_POST['address'];
        $phone_number=$_POST['phone_number'];
        $price=$_POST['price'];
        $rating=$_POST['rating'];
        $hinhanh=$_POST['hinhanh'];
        $sql = "UPDATE khachsan SET `TenKhachSan` = '$hotel_name',`DiaChi`='$address',`DienThoai`='$phone_number',`HinhAnh`='$hinhanh', `TieuChuan`='$rating', GiaTien='$price' WHERE `MaKhachSan` = $makhachsan";
        if ($conn->query($sql)){
            header('location: ../hotel.php');
        }else {echo "fail" ;}
    } else {
        $sql = "SELECT * FROM `khachsan` where MaKhachSan = $makhachsan";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
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
    <script src="update_hotel_validation.js"></script>
</head>

<body>
    <div class="page-wrapper background_color padding font-poppins">
        <div class="wrapper">
            <div class="card">
                <div class="card-body">
                    <h2 class="title">Thay đổi thông tin khách sạn <br> [Mã Khách Sạn <?php echo $makhachsan ?>]</h2>
                    <form method="POST" name="update_hotel" onsubmit="return checkform()">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Tên khách sạn</label>
                                    <input type="text" name="hotel_name", id="hotel_name" value="<?php echo $row["TenKhachSan"]?>" require>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Địa chỉ</label>
                                    <input type="text" name="address", id='address' value="<?php echo $row["DiaChi"]?>" require>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Giá tiền</label>
                                    <input type="number" name="price", id="price" value="<?php echo $row["GiaTien"]?>" require>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input type="number" name="phone_number", id="phone" value="<?php echo $row["DienThoai"]?>" require>
                                </div>
                            </div>
                        </div>
                            <div class="input-group">
                                <label class="label">Link Hình Ảnh</label>
                                <input type="text" name="hinhanh", id="hinhanh" value="<?php echo $row["HinhAnh"]?>">
                            </div>
                        <div class="input-group">
                            <label class="label">Tiêu chuẩn</label>
                                <select name="rating" class="input-select" require style="height: 50px;border: none;outline: none;margin: 0;border: none;box-shadow: none;width: 100%;font-size: 14px;font-family: inherit;line-height: 50px;background: #fafafa;box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);border-radius: 5px;padding: 0 20px;font-size: 16px;color: #555; transition: all 0.4s ease;background: #FAFAFA;">
                                    <option disabled="disabled">Rating</option>
                                    <option value="1" <?php if($row["TieuChuan"]=='1') echo 'selected'?>>1 Sao</option>
                                    <option value="2" <?php if($row["TieuChuan"]=='2') echo 'selected'?>>2 Sao</option>
                                    <option value="3" <?php if($row["TieuChuan"]=='3') echo 'selected'?>>3 Sao</option>
                                    <option value="4" <?php if($row["TieuChuan"]=='4') echo 'selected'?>>4 Sao</option>
                                    <option value="5" <?php if($row["TieuChuan"]=='5') echo 'selected'?>>5 Sao</option>
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