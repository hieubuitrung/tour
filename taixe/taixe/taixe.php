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
    <div class="header">
        <div class="header-nav-top">
            <div class="max-width-1200">
                <a href=""><img src="https://static.wixstatic.com/media/a27d24_098fdfd37b514082997bfe0c192554b0~mv2.png/v1/fill/w_1000,h_625,al_c,usm_0.66_1.00_0.01/a27d24_098fdfd37b514082997bfe0c192554b0~mv2.png" alt style="max-width: 30%;display: block;margin: auto;"></a>
            </div>
        </div>
        <div id="search">
            <h1 class="search-title">Tìm kiếm tài xế<br>Tìm kiếm theo mã, tên, số điện thoại tài xế</h1>
           <table>
              
                <form id="form-search" action="timkiem.php" method="get">
                <th>
                    <input type="text" name="tu-khoa" placeholder="Tìm kiếm" id="search-input"> 
                    <input type="button" value="Tìm kiếm" id="button">
                    <span id="error-input" style='display: block; color: red; font-size: 10px; height: 10px; margin-top: 4px'></span>
                </th>
          </form>

           </table>
           
        </div>
    </div>
        <script>
            const form = document.querySelector('#form-search');
            const input = document.querySelector("#search-input");
            const button = document.querySelector("#button");
            const error = document.querySelector("#error-input");
            var checkInput = 0;

            button.addEventListener("click", function () {
                if (checkInput == 1) {
                    form.submit();
                } else {
                    inputBlur();
                }
            })

            input.addEventListener("blur", inputBlur)
            input.addEventListener("focus", inputFocus)
            function inputBlur() {
                if(input.value == "") {
                    error.innerText = "Không được để trống";
                    checkInput = 0;
                } else {
                    error.innerText = "";
                    checkInput = 1;
                }
            }

            function inputFocus() {
                error.innerText = "";
            }
        </script>
        <?php
            require "./connect.php";
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
                echo "<h1>Danh sách Tài xế</h1><br>";
                $sql = "SELECT * FROM taixe,phuongtien WHERE phuongtien.MaPhuongTien=taixe.MaPhuongTien";
                $result = $conn->query($sql);
                
            
                if ($result->num_rows > 0) {
                    echo "<table>";
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
                            
                            echo "<th>";
                            echo "Rate";
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

                        echo "<th>";
                        echo "<a href ='xemdanhgia.php?MaPhuongTien={$row["MaPhuongTien"]}'>Xem Đánh Giá </a><br>";
                        echo "</th>";


                    echo "</tr>";
                } echo "</table>";
            } 
            else {
                    echo "0 results";
                    }
                $conn->close();
        ?> 
            <form action="themtaixe.php" method = "post">
                <h1> Đăng Ký Tài Xế </h1>
                <?php
                    require "./connect.php";
                    $sql = "SELECT * FROM phuongtien";
                    $result = $conn->query($sql);
                    
                ?>
                
               
                <table >
                        <tr>
                            <th>
                            Mã Phương tiện
                            <select name="MaPhuongTien" id="">
                                <?php if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                echo "<option value={$row['MaPhuongTien']}>{$row['MaPhuongTien']}</option>";
                                    }
                                } ?>
                            </select>

                            </th>
                            <th>
                                Tên
                                <input name="TenTaiXe" size="15" style="height: 19px;"  type="text" required>
                            </th>
                            <th>
                                Số Điện Thoại
                                <input name="SoDienThoai" size="15" style="height: 19px;"  type="text" required>
                            </th>
                            <th>
                                Năm Trong Nghề
                                <input name="KinhNghiem"  type="text" required placeholder="" style="height: 19px;" size="30">      
                            </th>
                            <th>
                                <input type ="submit" name="submit" value="send">   
                            </th>
                        </tr>
                </table>
                
                
            </form>
               <div class="footer">
                    <div class="footer-contact"style="text-align: center;">
                        <h3>LIÊN HỆ</h3>
                        <p><b>Địa chỉ: </b>18 Phố Viên, Phường Đức Thắng, Quận Bắc Từ Liêm, Hà Nội</p>
                        <a href="tel: 19001091"><b>Điện thoại: </b>19001091</a>
                        <a href="emailto: dulichvietnam@gmail.com"><b>Email: </b>dulichvietnam@gmail.com</a> <!--mailto tự động dẫn đến soạn mail-->
                        <p><b>Giờ làm việc: </b>8 - 20h các ngày trong tuần</p>
                    </div>
                </div>
    
    </body>

</html>