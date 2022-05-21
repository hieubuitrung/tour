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
    <?php
            require "./connect.php";
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
                echo "<h1>Danh sách </h1><br>";
                $maphuongtien=$_GET['MaPhuongTien'];
                $sql = "SELECT * FROM phuongtien,danhgiataixe WHERE phuongtien.MaPhuongTien=danhgiataixe.MaPhuongTien AND phuongtien.MaPhuongTien=$maphuongtien";
                $result = $conn->query($sql);

                
                  if ($result->num_rows > 0) {
                    echo "<table>";
                        echo "<tr>";
                            echo "<th>";
                                echo "Mã danh gia";
                            echo "</th>";
                            echo "<th>";
                                echo "điem danh gia";
                            echo "</th>";
                            echo "<th>";
                                echo "ma phuong tien";
                            echo "</th>";
                        

                        echo "</tr>";
                while($row = $result->fetch_assoc()) {
                  
                    echo "<tr>";
                        echo "<th>";
                        echo $row["MaDanhGia"] ;
                        echo "</th>";

                        echo "<th>";
                        echo $row["SoSao"]."<a href ='danhgia.php?MaPhuongTien={$row["MaPhuongTien"]}'>Đánh Giá Khác</a>";
                        echo "</th>";

                        echo "<th>";
                        echo $row["MaPhuongTien"];
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