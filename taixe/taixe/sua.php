<?php
    require "./connect.php";
    $mataixe = $_GET['MaTaiXe'];
    
    if (isset($_POST['submit'])) {
        $phuongtien=$_POST['MaPhuongTien'];
        $tentaixe=$_POST['TenTaiXe'];
        $sdt=$_POST['SoDienThoai'];
        $namtrongnghe=$_POST['KinhNghiem'];
        $sql = "UPDATE taixe SET `MaPhuongTien` = '$phuongtien',`TenTaiXe`='$tentaixe',`SoDienThoai`='$sdt',`KinhNghiem`='$namtrongnghe' WHERE `MaTaiXe` = $mataixe";
        if ($conn->query($sql)){
            header('location: taixe.php');
        }else {echo "fail" ;}
    } else {
        $sql = "SELECT * FROM taixe WHERE taixe.`MaTaiXe` = $mataixe";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        // print_r($row);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="sua.php?MaTaiXe=<?=$mataixe?>" method = "post">
        <h1> Sửa thông tin tài xế </h1>
        Mã Phương tiện:<br>
        <input name="MaPhuongTien" size="15" style="height: 19px;"  type="text" value="<?=$row["MaPhuongTien"]?>" required readonly>
        <br>Tên:<br>
        <input name="TenTaiXe" size="15" style="height: 19px;"  type="text" value="<?=$row["TenTaiXe"]?>" required>
        <br>Số Điện Thoại:<br>
        <input name="SoDienThoai" size="15" style="height: 19px;"  type="text" value="<?=$row["SoDienThoai"]?>" required>
        <br><br>
        Năm Trong Nghề:<br>
        <input name="KinhNghiem"  type="text" required placeholder="" style="height: 19px;" size="30" value="<?=$row["KinhNghiem"]?>"><br><br>
        <input type ="submit" name="submit" value="send">
    </form>
</body>
</html>