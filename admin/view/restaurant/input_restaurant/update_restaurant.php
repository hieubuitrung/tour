<?php
    require "./connect.php";
    $MaNhaHang = $_GET['MaNhaHang'];
    
    if (isset($_POST['submit'])) {
        $restaurant_name=$_POST['restaurant_name'];
        $address=$_POST['address'];
        $phone_number=$_POST['phone_number'];
        $price=$_POST['price'];
        $service=$_POST['service'];
        $hinhanh=$_POST['hinhanh'];
        $sql = "UPDATE nhahang SET `TenNhaHang` = '$restaurant_name',`DiaChi`='$address',`SDT`='$phone_number',`HinhAnh`='$hinhanh', `HinhThucPhucVu`='$service', GiaTien='$price' WHERE `MaNhaHang` = $MaNhaHang";
        if ($conn->query($sql)){
            header('location: ../restaurant.php');
        }else {echo "fail" ;}
    } else {
        $sql = "SELECT * FROM `NhaHang` where MaNhaHang = $MaNhaHang";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        // print_r($row);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Đăng ký nhà hàng</title>
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/input_restaurant.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper background_color padding font-poppins">
        <div class="wrapper">
            <div class="card">
                <div class="card-body">
                    <h2 class="title">Thay đổi thông tin nhà hàng <br> [Mã nhà hàng <?php echo $MaNhaHang ?>]</h2>
                    <form method="post" action="">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Tên nhà hàng</label>
                                    <input type="text" name="restaurant_name", id="restaurant_name" value="<?php echo $row["TenNhaHang"]?>" require>
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
                                    <input type="number" name="phone_number", id="phone" value="<?php echo $row["SDT"]?>" require>
                                </div>
                            </div>
                        </div>
                            <div class="input-group">
                                <label class="label">Link Hình Ảnh</label>
                                <input type="text" name="hinhanh", id="hinhanh" value="<?php echo $row["HinhAnh"]?>">
                            </div>
                        <div class="input-group">
                            <label class="label">Hình Thức phục vụ</label>
                                <select name="service" class="input-select" require style="height: 50px;border: none;outline: none;margin: 0;border: none;box-shadow: none;width: 100%;font-size: 14px;font-family: inherit;line-height: 50px;background: #fafafa;box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);border-radius: 5px;padding: 0 20px;font-size: 16px;color: #555; transition: all 0.4s ease;background: #FAFAFA;">
                                    <option disabled="disabled">service</option>
                                    <option value="1" <?php if($row["HinhThucPhucVu"]=='1') echo 'selected'?>>buffet</option>
                                    <option value="2" <?php if($row["HinhThucPhucVu"]=='2') echo 'selected'?>>phục vụ tại bàn</option>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="js/global.js"></script>
    <link rel="stylesheet" href="">
</body>

</html>