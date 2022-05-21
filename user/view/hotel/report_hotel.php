<?php
    session_start();
    require "./connect.php";
    if(isset($_GET["MaKhachSan"])){
        $makhachsan = $_GET["MaKhachSan"];
    }
    if(isset($_SESSION['phone'])) {
        $phone = $_SESSION['phone'];
        $sql_info_user = "SELECT * FROM khachhang WHERE `SDT` = $phone";
        $result_info_user = $conn->query($sql_info_user);
        $row_info_user = $result_info_user->fetch_assoc();
    }
    if (isset($_GET['submit'])) {
        $report_hotel_id=$_GET['hotel_id'];
        $report_lydo=$_GET['lydo'];
        $sql="INSERT INTO `khachsan_khieunai`(`MaKhachHang`, `MaKhachSan`, `Lydo`) VALUES ('$row_info_user[MaKhachHang]','$report_hotel_id','$report_lydo')";
        if($conn->query($sql)){
            header('location: hotel_list_new.php');
        }
    } 
    else {
        $sql_hotel = "SELECT * FROM `khachsan` where MaKhachSan = $makhachsan";
        $result_hotel = $conn->query($sql_hotel);
        $row_hotel = $result_hotel->fetch_assoc();
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
        .selection{
            height: 50px;border: none;outline: none;margin: 0;border: none;box-shadow: none;width: 100%;font-size: 14px;font-family: inherit;line-height: 50px;background: #fafafa;box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);border-radius: 5px;padding: 0 20px;font-size: 16px;color: #555; transition: all 0.4s ease;background: #FAFAFA;
        }
    </style>
</head>

<body>
    <div class="page-wrapper background_color padding font-poppins">
        <div class="wrapper">
            <div class="card">
                <div class="card-body">
                    <h2 class="title">Báo cáo <?php echo $row_hotel['TenKhachSan']?><br> [Mã Khách Sạn <?php echo $makhachsan ?>]</h2>
                    <form method="GET" action="">
                        <div class="row row-space">
                            <div class="input-group" style="width:100%">
                                <label class="label">Lý do khiếu nại</label>
                                    <select name="lydo" class="input-select selection" require >
                                    <?php
                                        $sql_lydo="SELECT*FROM khachsan_khieunai_lydo";
                                        $result_lydo=$conn->query($sql_lydo);
                                        while($row_lydo=$result_lydo->fetch_assoc()){
                                            echo "<option value={$row_lydo['id']}>{$row_lydo['lydo']}</option>";
                                        }
                                    ?>
                                    </select>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Khách hàng</label>
                                    <input type="text" name="guest_name", id="guest_name" value="<?php echo $row_info_user["TenKhachHang"]?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Số điện thoại</label>
                                    <input type="text" name="guest_phone", id='address' value="<?php echo "0".$row_info_user["SDT"]?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Mã khách sạn</label>
                                    <input type="text" name="hotel_id", id="hotel_name" value="<?php echo $row_hotel["MaKhachSan"]?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Địa chỉ</label>
                                    <input type="text" name="address", id='address' value="<?php echo $row_hotel["DiaChi"]?>" readonly>
                                </div>
                            </div>
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