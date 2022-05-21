<?php
    require "connect.php";
    $phuongtien=$_POST['MaPhuongTien'];
    $tentaixe=$_POST['TenTaiXe'];
    $sdt=$_POST['SoDienThoai'];
    $namtrongnghe=$_POST['KinhNghiem'];
    $sql = "INSERT INTO taixe (`MaPhuongTien`,`TenTaiXe`,`SoDienThoai`,`KinhNghiem`) VALUES ('$phuongtien','$tentaixe','$sdt','$namtrongnghe')";
    if ($conn->query($sql)){
        header('location: taixe.php');
    }else {echo "fail" ;}
?>    
