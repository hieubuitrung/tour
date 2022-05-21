<?php
    require "./connect.php";
    $tour_id = $_GET['tour-id'];
    // hủy tour 
    $sql = "DELETE FROM phieudangkitour WHERE phieudangkitour.`MaChiTietTour` = $tour_id";
    $conn->query($sql);
    header("location: ./admin.php");
?>