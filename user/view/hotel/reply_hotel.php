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
        $reply_hotel_id=$_GET['reply_hotel_id'];
        $reply_tel=$_GET['reply_tel'];
        $reply_subject=$_GET["reply_subject"];
        $reply_textarea=$_GET["reply_textarea"];
        $sql="INSERT INTO `khachsan_phanhoi`(`MaKhachHang`, `MaKhachSan`, `TieuDe`, `NoiDung`) VALUES ('$row_info_user[MaKhachHang]','$reply_hotel_id','$reply_subject','$reply_textarea')";
        if ($conn->query($sql)){
            header('location: hotel_list_new.php');
        }else {echo "fail" ;}
    } else {
        $sql_hotel = "SELECT * FROM `khachsan` where MaKhachSan = $makhachsan";
        $result_hotel = $conn->query($sql_hotel);
        $row_hotel = $result_hotel->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/grid.css">
		<link rel="stylesheet" href="../assets/css/responsive.css">
		<link rel="stylesheet" href="css/respondsive2.css">
        <style>
            
        </style>
    </head>
    <body>
        <div class="contact" style="height: 30cm;">
            <div class="contact__background" style="bottom: 0cm;"></div>
            <div class="grid wide">
              <div class="contact__container">
                <div class="row">
                      <div class="col l-5"></div>
                  <div class="col l-7">
                    <div class="contact__container__form">
                    <form action="" method="get">
                        <div class="contact__container__form--title">
                        <h2>Phản hồi về <?php echo $row_hotel['TenKhachSan'];?></h2>
                        <h2>Mã Khách Sạn <?php echo $row_hotel['MaKhachSan'];?></h2>
                        </div>
                            <div class="contact__form">
                            <input type="text" name="reply_name" placeholder="Tên" value="<?php echo $row_info_user["TenKhachHang"] ?>" class="contact_form_name" readonly>
                            <input type="text" name="reply_tel"placeholder="Số điện thoại" value="<?php echo "0".$row_info_user["SDT"]?>" class="contact_form_email" readonly>
                            <input type="text" name="reply_hotel_name" value="<?php echo $row_hotel['TenKhachSan'] ?>" readonly class="contact_form_name" readonly>
                            <input type="text" name="reply_hotel_id" value="<?php echo $makhachsan ?>" readonly class="contact_form_email" readonly>
                            <input type="text" name="reply_subject"placeholder="Tiêu đề" name="subject" id="subject" class="contact_form_subject" >
                            <textarea name="reply_textarea" cols="30" rows="10" placeholder="Nội dung"></textarea>
                            <input type="submit" value="Submit" id="submit" type="submit" name="submit" class="form_submit_button" style="background-color: #31124b;">
                        </div>
                        </div>
                    </form>
                      
                    </div>
                    </div>
                  </div>
            </div>
            </div>
        <script src="" async defer></script>
    </body>
</html>