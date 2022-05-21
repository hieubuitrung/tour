<?php 
        session_start();
require 'connect.php';
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

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/input_restaurant.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper background_color padding font-poppins">
        <div class="wrapper">
            <div class="card">
                <div class="card-body">
                    <h2 class="title">Form đăng ký nhà hàng</h2> 
                    <!-- onsubmit="return checkform()" -->
                    <form action="input_restaurant.php" method="post" id="form" onsubmit="return checkform()">  
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <span class="nanh"></span>
                                    <label class="label">Tên Nhà Hàng</label>
                                    <input class="infor" type="text" name="restaurant_name", id="restaurant_name" require>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <span class="nanh"></span>
                                    <label class="label">Email</label>
                                    <input class="infor" type="text" name="Email", id="Email" require>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <span class="nanh"></span>
                                    <label class="label">ảnh nhà hàng(link ảnh)</label>
                                    <input class="infor" type="text" name="restaurant_image", id="restaurant_image" require>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <span class="nanh"></span>
                                    <label class="label">Địa chỉ</label>
                                    <input class="infor" type="text" name="address", id='address' require>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <span class="nanh"></span>
                                    <label class="label">Giá tiền</label>
                                    <input class="infor" type="number" name="price", id="price" require>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <span class="nanh"></span>
                                    <label class="label">Phone Number</label>
                                    <input class="infor" type="number" name="phone_number", id="phone_number" require>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="nanh"></span>
                            <label class="label">Hình Thức Phục Vụ</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="HinhThucPhucVu" require>
                                    <!-- <option disabled="disabled" selected="selected">HinhThucPhucVu</option> -->
                                    <?php 
                                        $idhinhthucphucvu="SELECT*FROM hinhthucphucvu";
                                        $ketqua=$conn->query($idhinhthucphucvu);
                                        while($rowid=$ketqua->fetch_assoc()){
                                            echo "<option value={$rowid['HinhThucPhucVu']}>{$rowid['TenHinhThucPhucVu']}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="button" >
                            <input type="submit" value="Đăng ký" id="submit" class="btn" name="submit" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="js/global.js"></script>  
    
    <?php
        require 'connect.php';
        if(isset($_POST['submit'])){
            ////////////////////////////////////////////////
            $restaurant_name=$_POST['restaurant_name'];
            $address=$_POST['address'];
            $phone_number=$_POST['phone_number'];
            $price=$_POST['price'];
            $HinhThucPhucVu=$_POST['HinhThucPhucVu'];
            $Image=$_POST['restaurant_image'];
            $Email=$_POST['Email'];
            ////////////////////////////////////////////////
            $sql="Insert into nhahang(TenNhaHang,DiaChi,SDT,HinhThucPhucVu,giatien,Email,HinhAnh) values ('{$restaurant_name}','{$address}','{$phone_number}','{$HinhThucPhucVu}','{$price}','{$Email}','{$Image}')";
            $result = $conn->query($sql);
            if (!$result) {
                trigger_error('Invalid query: '. $conn->error);
            }else
                echo "Insert Thanh Cong";
            }
    ?>
    <!-- <script src="kiemTraForm.js"></script> -->

</body>

</html>