<?php   
    require "./connect.php";
    $phone = $_GET['phone'];
    // echo $phone;
    $sql = "SELECT * FROM khachhang WHERE khachhang.`SDT` = $phone";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (isset($_POST['submit'])) {
        $phone = $_GET['phone'];
        $name_user = $_POST['TenKhachHang'];
        $avatar_user = $_POST['HinhAnh'];
        $birth_day_user = $_POST['NgaySinh'];
        $gender_user = $_POST['GioiTinh'];
        $address_user = $_POST['DiaChi'];
        $citizen_id_user = $_POST['CMT'];
        $email_user = $_POST['Email'];
        $sql_update = "UPDATE khachhang SET khachhang.`TenKhachHang` = $name_user, khachhang.`HinhAnh` = $avatar_user, khachhang.`NgaySinh` = $birth_day_user, khachhang.`GioiTinh` = $gender_user, khachhang.`DiaChi` = $address_user, khachhang.`CMT` = $email_user, khachhang.`Email` = $email_user
        WHERE khachhang.`SDT` = $phone";
        if ($conn->query($sql_update)) {
            header("location: ./admin.php");
        }
    }
?>

<form action="" method="post">
    <table border="1">
        <tr>
            <td>Ten</td>
            <td>Hình Ảnh</td>
            <td>Số Điện Thoại</td>
            <td>Ngày Sinh</td>
            <td>Giới Tính</td>
            <td>Địa Chỉ</td>
            <td>Số CCCD</td>
            <td>Email</td>
            <td>Sửa</td>
        </tr>
        <tr>
            <td>
                <input name="TenKhachHang" type="text" value="<?=$row['TenKhachHang']?>" require>
            </td>
            <td>
                <input name="HinhAnh" type="text" value="<?=$row['HinhAnh']?>" require>
            </td>
            <td>
                <input name="phone" type="number" value="<?=$phone?>" require>
            </td>
            <td>
                <input name="NgaySinh" type="date" value="<?=$row['NgaySinh']?>" require>
            </td>
            <td>
                <input name="GioiTinh" type="text" value="<?=$row['GioiTinh']?>" require>
            </td>
            <td>
                <input name="DiaChi" type="text" value="<?=$row['DiaChi']?>" require>
            </td>
            <td>
                <input name="CMT" type="number" value="<?=$row['CMT']?>" require>
            </td>
            <td>
                <input name="Email" type="email" value="<?=$row['Email']?>" require>
            </td>
            <td>
                <input type="submit" name="submit" id="" value="Xác nhận">
            </td>
        </tr>
    </table>
</form>