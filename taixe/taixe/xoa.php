<?php
    require "connect.php";
    $mataixe=$_GET['MaTaiXe'];
    $sql="DELETE FROM taixe WHERE taixe.`MaTaiXe` =$mataixe";
    if ($conn->query($sql)){
        header('location: taixe.php');
    }else {echo "fail" ;}
?>    