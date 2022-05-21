<?php
    require "./connect.php";
    $maphuongtien = $_GET['MaPhuongTien'];
    
    if (isset($_POST['submit'])) {
        $sosao=$_POST['SoSao'];
        $sql = "UPDATE danhgiataixe SET `SoSao` = '$sosao' WHERE `MaPhuongTien` = $maphuongtien";
        if ($conn->query($sql)){
            header('location: taixe.php');
        }else {echo "fail" ;}
    } else {
        $sql = "SELECT * FROM danhgiataixe WHERE danhgiataixe.`MaPhuongTien` = $maphuongtien";
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
    <form action="danhgia.php?MaPhuongTien=<?=$maphuongtien?>" method = "post">
        <h1> Đánh giá tài xế</h1>
        Mã Phương tiện:<br>
        <input name="MaPhuongTien" size="15" style="height: 19px;"  type="text" value="<?=$row["MaPhuongTien"]?>" required readonly>
        <br>Tên:<br>
        <input name="SoSao" max='5', min='1' ,size="15" style="height: 19px;"  type="number" value="<?=$row["SoSao"]?>" required>
        <input type ="submit" name="submit" value="send">
    </form>
</body>
</html>