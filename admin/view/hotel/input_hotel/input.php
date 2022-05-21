<?php
require 'connect.php';
if(isset($_POST['submit'])){
    ////////////////////////////////////////////////
    $hotel_name=$_POST['hotel_name'];
    $address=$_POST['address'];
    $phone_number=$_POST['phone_number'];
    $price=$_POST['price'];
    $rating=$_POST['rating'];
    $hinhanh=$_POST['hinhanh'];
    ////////////////////////////////////////////////
    $sql="Insert into khachsan(tenkhachsan,diachi,dienthoai,tieuchuan,giatien, hinhanh) values (n'{$hotel_name}',n'{$address}',{$phone_number},{$rating},{$price},{$hinhanh})";
    $result = $conn->query($sql);
    if (!$result) {
        trigger_error('Invalid query: ' . $conn->error);
    }else{
        echo "Insert Thanh Cong";
        header("location: ../hotel.php");
    }   
}
?>