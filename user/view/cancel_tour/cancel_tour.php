<?php
    require "../../../config/config.php";

    $tour_ticket_id = $_GET['MaPhieuTour']; 
    $sql = "DELETE FROM phieudangkitour WHERE phieudangkitour.`MaPhieuTour` = $tour_ticket_id";
    if ($conn->query($sql)) {
        header("location: ../registered_tour/registered_tour.php");
    }

?>