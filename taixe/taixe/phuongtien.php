<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css.css">
    </head>
    <body>
        
        <?php
            require "connect.php";
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            echo "<h1>Bảng chi tiết theo mã phương tiện đã chọn</h1>";
                $id = $_GET['MaPhuongTien'];
                $sql = "SELECT * FROM phuongtien WHERE MaPhuongTien = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table >";
                        echo "<tr>";

                        echo "<th>";
                            echo "Mã Phương Tiện";
                        echo "</th>";

                        echo "<th>";
                            echo "Loại xe";
                        echo "</th>";

                        echo "<th>";
                            echo "Kiểu xe(số ghế)";
                        echo "</th>";

                        echo "<th>";
                            echo "Biển số xe";
                        echo "</th>";

                    echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                        echo "<td>";
                            echo $row["MaPhuongTien"];
                        echo "</td>";

                        echo "<th>";
                            echo $row["TenPhuongTien"];
                        echo "</th>";

                        echo "<th>";
                            echo $row["SoGhe"];
                        echo "</th>";


                        echo "<th>";
                            echo $row["BienKiemSoat"];
                        echo "</th>";

                        echo "<th>";
                            echo "<a href ='xoa.php?MaTaiXe={$row["MaTaiXe"]}'> Xóa</a><br>";
                        echo "</th>";

                        
                    echo "</tr>";
                } echo "</table>";
            } 
            else {
                    echo "0 results";
                    }
                $conn->close();
        ?>                 
    </body>
</html>