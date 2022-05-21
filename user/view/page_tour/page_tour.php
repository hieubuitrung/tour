<?php 
    session_start();
    // print_r($_SESSION);

    require "../../../config/config.php";
  
    
    // số tour / trang
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 4;
    // trang hiện tại
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    // lấy tour bắt đầu từ vị trí (nếu để trang bắt đầu là 0 thì 0 phải trừ đi 1)
    $offset = ($current_page - 1) * $item_per_page;
    
    // tìm kiếm và show
    if (isset($_GET['submit'])) {
        $keyWord = isset($_GET['key-word']) ? $_GET['key-word'] : '';
        $fromDate = isset($_GET['from-date']) ? $_GET['from-date'] : '';
        $toDate = isset($_GET['to-date']) ? $_GET['to-date'] : '';

        // 1: trong nước
        // 1: ngoài nước
        // 0: tất cả
        $type = isset($_GET['type']) ? $_GET['type'] : '';

        // %: đại diện cho nhiều kí tự
        $sql = "SELECT tour.`HinhAnh`, tour.`TenTour`, tour.`DiemKhoiHanh`, tour.`DiemDen`, tour.`Gia`, chitiettour.`MaChiTietTour`, chitiettour.`NgayKhoiHanh`, chitiettour.`NgayKetThuc`, chitiettour.`SoNgay`, tour.`MoTa`, phuongtien.`TenPhuongTien`
        FROM tour, chitiettour, phuongtien 
        WHERE tour.`MaTour` = chitiettour.`MaTour` AND tour.`MaPhuongTien` = phuongtien.`MaPhuongTien`
        AND (tour.`TenTour` LIKE '%$keyWord%' OR tour.`DiemKhoiHanh` LIKE '%$keyWord%' OR tour.`DiemDen` LIKE '%$keyWord%') 
        AND chitiettour.`NgayKhoiHanh` LIKE '%$fromDate%'
        AND chitiettour.`NgayKetThuc` LIKE '%$toDate%'
        AND tour.`LoaiHinh` LIKE '%$type%'
        ORDER BY chitiettour.`NgayKhoiHanh` ASC
        LIMIT $item_per_page OFFSET $offset";
        // LIMIT: số bản ghi cần lấy
        // OFFSET: lấy từ vị trí nào

        // tổng số tour
        $totalRecords = $conn->query("SELECT * FROM chitiettour, tour WHERE tour.`MaTour` = chitiettour.`MaTour`
        AND (tour.`TenTour` LIKE '%$keyWord%' OR tour.`DiemKhoiHanh` LIKE '%$keyWord%' OR tour.`DiemDen` LIKE '%$keyWord%') 
        AND chitiettour.`NgayKhoiHanh` LIKE '%$fromDate%'
        AND chitiettour.`NgayKetThuc` LIKE '%$toDate%'
        AND tour.`LoaiHinh` LIKE '%$type%'");
    
    } else {
        $type = isset($_GET['LoaiHinh']) ? $_GET['LoaiHinh'] : '';
        $sql = "SELECT tour.`HinhAnh`, tour.`TenTour`, tour.`DiemKhoiHanh`, tour.`DiemDen`, tour.`Gia`, chitiettour.`MaChiTietTour`, chitiettour.`NgayKhoiHanh`, chitiettour.`NgayKetThuc`, chitiettour.`SoNgay`, tour.`MoTa`, phuongtien.`TenPhuongTien`
        FROM tour, chitiettour, phuongtien 
        WHERE tour.`MaTour` = chitiettour.`MaTour` AND tour.`MaPhuongTien` = phuongtien.`MaPhuongTien` AND tour.`LoaiHinh` LIKE '%$type%'
        ORDER BY chitiettour.`NgayKhoiHanh` ASC
        LIMIT $item_per_page OFFSET $offset";

        // tổng số tour
        $totalRecords = $conn->query("SELECT * FROM chitiettour, tour WHERE tour.`MaTour` = chitiettour.`MaTour`
        AND tour.`LoaiHinh` LIKE '%$type%'");
    }

    $totalRecords = $totalRecords->num_rows;
    // tổng số trang, ceil: làm tròn lên
    $totalPage = ceil($totalRecords / $item_per_page);
    
    $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comforter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/base/base.css">
    <link rel="stylesheet" href="../../../grid/grid.css">
    <link rel="stylesheet" href="../../../css/base/style.css">
    <link rel="stylesheet" href="../../../css/base/responsive.css">
    <link rel="stylesheet" href="./page_tour.css">
    <title>Tour trong nước</title>
    
</head>
<body>
    <!-- header -->
    <?php 
        require "../base/header.php";
    ?>

    <!-- main -->

    <div class="main-wapper">
        <div class="background-page-tour">
            <div class="page-image-tour-tag" style="background-image: url(https://www.saigontourist.net/uploads/Tour%20Tag/tour-tag-trong-nuoc.jpg);">

            </div>

            <div class="container grid wide">
                <div class="background-description">
                    <h1 class="tour-banner-title"><?php if($type==1) { echo "Tour trong nước"; } else { echo "Tour ngoài nước"; } ?></h1>
                    <div class="sticker"><?php if($type==1) { echo "Tour trong nước"; } else { echo "Tour ngoài nước"; } ?></div>
                </div>
            </div>  
        </div>


        <div class="search-tour-section">
            <div class="container">
                <div class="">
                    <form action="#" method="get" class="form-search grid wide">
                        <div class="row">
                            <div class="col l-4 c-12">
                                <div class="search-box-web-tour">
                                    <!-- lấy từ khóa  -->
                                    <input type="text" class="form-control" name="key-word" value="<?php if(isset($keyWord)) echo $keyWord ?>" placeholder="Tìm tour: ...">
                                    <div class="input-group-addon">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col l-6 c-0">
                                <div class="row">
                                    <div class="col l-4 c-12">
                                        <div class="input-group fromdate">
                                            <!-- lấy thời gian đi  -->
                                            <input type="date" class="form-control" name="from-date" value="<?php if(isset($fromDate)) echo $fromDate ?>" placeholder="Từ ngày">
                                            <div class="input-group-addon">
                                                <!-- <i class="far fa-calendar-alt"></i> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col l-4 c-12">
                                        <div class="input-group todate">
                                            <!-- lấy thời gian về  -->
                                            <input type="date" name="to-date" class="form-control" value="<?php if(isset($toDate)) echo $toDate ?>" placeholder="Đến ngày">
                                            <div class="input-group-addon">
                                                <!-- <i class="far fa-calendar-alt"></i> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col l-4 c-12">
                                        <div class="form-group tour-type">
                                            <div class="booking-drop">
                                                <select name="type" class="form-control select-drop">
                                                    <option value="1" <?php if(isset($type) && $type == 1) {echo "selected";} ?>>Trong nước</option>
                                                    <option value="2" <?php if(isset($type) && $type == 2) {echo "selected";} ?>>Ngoài nước</option>
                                                    <option value="" <?php if(isset($type) && $type == '') {echo "selected";} ?>>Tất cả</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col l-2 c-12">
                                <input type="submit" name='submit' class="btn-custom-primary btn-button" value="Tìm kiếm">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content-section">
        <div class="container">
            <div class="grid wide">
                <div class="row ">
                    <div class="col l-9 c-8">
                        <div class="filter-list-tour">
                            <div class="filter-text">Sắp xếp :</div>
                            <div class="filter-tour">
                                <a href="" class="filter-div active">[ Ngày gần nhất ]</a>
                                <a href="" class="filter-div">[ Giá hấp dẫn ]</a>
                                <a href="" class="filter-div">[ Hấp dẫn nhất ]</a>
                            </div>
                        </div>
                    </div>
                    <div class="col l-3 c-4">
                        <div class="view-list-tour">
                            <i class="fas fa-th icon-list-tour"></i>
                            <span>  |  </span>
                            <i class="fas fa-list icon-list-tour active"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                    <?php 
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col l-12 c-12">
                        <div class="row box-search-tour">
                            <div class="col l-4 c-12">
                                <div class="box-search-tour-image">
                                    <a href="../page_info_tour/page_info_tour.php?MaChiTietTour=<?php echo $row['MaChiTietTour'] ?>" class="image-box-relative image-box-3x2">
                                        <img class="tour-image" src="<?php echo $row["HinhAnh"] ?>" alt="">
                                    </a>
                                    <div class="promotion-tour">
                                        <div class="text-promotion-tour" title="<?php echo"Giá từ ".number_format($row['Gia'], 0, ",", ".")."đ/khách" ?>"><?php echo"Giá từ ".number_format($row['Gia'], 0, ",", ".")."đ/khách" ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col l-8 c-12">
                                <div class="row ">
                                    <div class="col l-8">
                                        <div class="title-tour">
                                            <a href="../page_info_tour/page_info_tour.php?MaChiTietTour=<?php echo $row['MaChiTietTour'] ?>"><?php echo $row['TenTour'] ?></a>
                                        </div>
                                        <div class="destination-tour"><?php echo "{$row['DiemKhoiHanh']} - {$row['DiemDen']}" ?></div>
                                        <div class="detail-tour">
                                            Thời gian : <?php echo $row['SoNgay'] ?><br>
                                            Phương tiện: <?php echo $row["TenPhuongTien"] ?> <br>
                                            <?php echo $row["MoTa"] ?>
                                        </div>
                                    </div>
                                    <div class="col l-4 c-12">
                                        <div class="row">
                                                
                                            <!-- Nếu không có lịch khởi hành thì hiện mỗi nút chi tiết -->
                                            <?php if($row['NgayKhoiHanh'] === "9999-12-31") {?>

                                                <div class="col l-12  row-box-price" style="justify-content: flex-end;">
                                                    <a href="../page_info_tour/page_info_tour.php?MaChiTietTour=<?php echo $row['MaChiTietTour'] ?>" class="box-price-tour" title="Du lịch Bến Tre - Du Lịch Về Nguồn - Sinh Thái">
                                                        <span class="text">Chi tiết</span>
                                                    </a>
                                                </div>
                                                
                                            <!-- Nếu có lịch khởi hành thì hiện giá - ngày đi - ngày về - chi tiết -->
                                            <?php } else { ?>

                                                <div class="col l-12 c-6 row-box-price">
                                                    <a href="../page_info_tour/page_info_tour.php?MaChiTietTour=<?php echo $row['MaChiTietTour'] ?>" class="box-price-tour">
                                                        <span class="text">Giá từ</span>
                                                        <span class="price"><?php echo number_format($row["Gia"], 0 , "," , ".") ?></span>
                                                    </a>
                                                </div>

                                                <div class="col l-12 c-6 row-box-view">
                                                    <div>
                                                        <ul class="list-inline details-btn" >
                                                            <li>
                                                                <span class="text-info">
                                                                    <i class="far fa-calendar-alt"></i> 
                                                                    <span><?php echo date("d/m/Y", strtotime($row["NgayKhoiHanh"])) ?></span>
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <span class="text-info">
                                                                    <i class="far fa-calendar-alt"></i> 
                                                                    <span><?php echo date("d/m/Y", strtotime($row["NgayKetThuc"])) ?></span>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <a href="../page_info_tour/page_info_tour.php?MaChiTietTour=<?php echo $row['MaChiTietTour'] ?>" class="box-view-more select-tour-action">
                                                        <i class="far fa-calendar-alt"></i> 
                                                        <span class="text">Xem thêm</span>
                                                    </a>
                                                </div>

                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                            }
                        }
                    ?>

                    <?php
                        require "./pagination.php";
                    ?>
                    <!-- <div class="col l-12">
                        <div class="row box-search-tour">
                            <div class="col l-4">
                                <div class="box-search-tour-image">
                                    <a href="" class="image-box-relative image-box-3x2">
                                        <img class="tour-image" src="https://www.saigontourist.net/uploads/destination/TrongNuoc/LongAn/LongAn-CanhDongBatTan-4.jpg" alt="">
                                    </a>
                                    <div class="promotion-tour">
                                        <div class="text-promotion-tour" title="Du lịch xanh">Giá từ 599.000đ/khách</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col l-8">
                                <div class="row">
                                    <div class="col l-8">
                                        <div class="title-tour">
                                            <a href="">Du lịch Long An – KDL Cánh Đồng Bất Tận</a>
                                        </div>
                                        <div class="destination-tour">TP. Hồ Chí Minh - Long An</div>
                                        <div class="detail-tour">
                                            Thời gian : 1 ngày <br>
                                            Phương tiện: Đi về bằng xe <br>
                                            - Tham quan KDL Cánh Đồng Bất Tận - Khu bảo tồn và phát triển ...
                                        </div>
                                    </div>
                                    <div class="col l-4">
                                        <div class="row">
                                            <div class="col l-12 row-box-price">
                                                <a href="" class="box-price-tour">
                                                    <span class="text">Chi tiết</span>
                                                    <span class="price">1.279.000</span>
                                                </a>
                                            </div>
                                            <div class="col l-12 row-box-view">
                                                <div>
                                                    <ul class="list-inline details-btn">
                                                        <li>
                                                            <span class="text-info">
                                                                <i class="far fa-calendar-alt"></i> 
                                                                <span>05/12/2021</span>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="text-info">
                                                                <i class="far fa-calendar-alt"></i> 
                                                                <span>19/12/2021</span>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <a href="" class="box-view-more select-tour-action">
                                                    <i class="far fa-calendar-alt"></i> 
                                                    <span class="text">Xem thêm</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <?php require"../base/footer.php" ?>
    
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
    <script src="../base/header.js"></script>
    <script>
        // var form = document.querySelector('.form-search');
        // var btnButton = document.querySelector('.btn-button');

        // btnButton.addEventListener('click', function() {
        //     form.submit();
        // })
    </script>
    <script src="../base/user_menu.js"></script>

</body>
</html>
