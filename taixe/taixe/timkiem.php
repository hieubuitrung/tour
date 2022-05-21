<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css.css">
    </head>
    <body>
    <h1>Danh sách tìm kiếm</h1>
    <?php
   
    require "connect.php";
    $tu_khoa = $_GET["tu-khoa"];
    // is_numeric: kiểm tra xem $tu_khoa có phải là số ko
    if (is_numeric($tu_khoa)) {
        $sql = "SELECT * FROM taixe WHERE taixe.MaTaiXe = $tu_khoa OR taixe.SoDienThoai = $tu_khoa";
    } else {
        // nếu không phải là số
        $sql = "SELECT * FROM taixe WHERE taixe.TenTaiXe LIKE '%$tu_khoa%'";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table border=1>";
            echo "<tr>";
                echo "<th>";
                    echo "Mã Số";
                echo "</th>";
                echo "<th>";
                    echo "Mã Phương Tiện";
                echo "</th>";
                echo "<th>";
                    echo "Tên";
                echo "</th>";
                echo "<th>";
                    echo "Số Điện Thoại";
                echo "</th>";
                echo "<th>";
                    echo "Năm Trong Nghề";
                echo "</th>";
                echo "<th>";
                    echo "";
                echo "</th>";
                echo "<th>";
                    echo "";
                echo "</th>";
            echo "</tr>";
        while($row = $result->fetch_assoc()) {
        
            echo "<tr>";
                echo "<th>";
                echo $row["MaTaiXe"]  ;
                echo "</th>";

                echo "<th>";
                echo $row["MaPhuongTien"]."<a href ='phuongtien.php?MaPhuongTien=".  $row["MaPhuongTien"] ."' >chi tiết</a>";
                echo "</th>"; 

                echo "<th>";
                echo $row["TenTaiXe"];
                echo "</th>"; 

                echo "<th>";
                echo $row["SoDienThoai"];
                echo "</th>"; 

                echo "<th>";
                echo $row["KinhNghiem"];
                echo "</th>";

                echo "<th>";
                echo "<a href ='sua.php?MaTaiXe={$row["MaTaiXe"]}'> Sửa</a>";
                echo "</th>";

                echo "<th>";
                echo "<a href ='xoa.php?MaTaiXe={$row["MaTaiXe"]}'> Xóa</a><br>";
                echo "</th>";

            echo "</tr>";
        } echo "</table>";
    } else {
        echo "Không có tài xế";
    }
?>
    </body>

</html>