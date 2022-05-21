
    <!-- header -->
    <div class="text-center" id="top-notify">
        <span class="notyfi-title">TƯ VẤN DU LỊCH:</span>
        Xem thông tin cập nhật và các biện pháp phòng ngừa đối với Covid-19 tại Việt Nam 
        <a href="https://vietnam.travel/things-to-do/information-travellers-novel-coronavirus-vietnam">tại đây.</a>
    </div>

    <header>
        <div class="container">
            <div class="toplinks row">

                <!-- <div class="search-icon">
                    <i class="fas fa-search"></i>
                </div>
                <div class="search-input">
                    <input type="text" placeholder="Search">
                </div> -->
                <?php 
                    if(isset($_SESSION['phone'])) {
                        $phone = $_SESSION['phone'];
                        $sql_info_user = "SELECT * FROM khachhang WHERE `SDT` = $phone";
                        $result_info_user = $conn->query($sql_info_user);
                        $row_info_user = $result_info_user->fetch_assoc();

                        // hình ảnh user
                        $image_user = !empty($row_info_user['HinhAnh']) ? $row_info_user['HinhAnh'] : '../../image/user.png';
                ?>
                        <div class='user'>
                                <div class='user-avatar' style = "background : url('<?=$image_user?>') center center / cover no-repeat; "></div>
                                <div class='user-menu'>
                                    <ul class='user-menu-list'>
                                        <li class='user-menu-user'>
                                            <div class='user-menu-avatar' style = "background : url('<?=$image_user?>') center center / cover no-repeat; "></div>
                                            <div class='user-menu-info'>
                                                <span class='name'><?=$row_info_user['TenKhachHang']?></span>
                                            </div>
                                        </li>
                                    </ul>
                                    <hr>
                                    <ul class='user-menu-list'>
                                        <li class='user-menu-log-out'>
                                            <a href='../registered_tour/registered_tour.php'>Tour đã đăng kí</a>
                                        </li>
                                    </ul>
                                    <hr>
                                    <ul class='user-menu-list'>
                                        <li class='user-menu-log-out'>
                                            <a href='../setting/setting.php'>Cài đặt</a>
                                        </li>
                                        <li class='user-menu-log-out'>
                                            <a href='../log_out/log_out.php'>Đăng xuất</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                <?php
                    } else {
                ?>
                        <div class='user-log-in'>
                                <a href='../sign_in/sign_in.php'>Đăng nhập</a>
                            </div>
                <?php
                    }
                ?>           
            </div>

            <div class="row container__mobile">
                <div id="logo">
                    <a href="../home/trang_chu.php">
                        <img src="https://vietnam.travel/themes/custom/vietnamtourism/images/logo.jpg" alt="Vietnam Tourism">
                    </a>
                </div>
                <div class="main-nav">

                    <div class="nav-icon__mobile">
                        <i class="fas fa-bars btn-bars__mobile"></i>
                        <i class="fas fa-times btn-close__mobile" style="display: none"></i>
                    </div>

                    <ul class="main-nav-list"> 
                        <li class="header__home-item">
                            <a href="../home/trang_chu.php">Trang chủ</a>
                        </li>
                        <li class="box-menu--mobile">
                            <a href="../home/trang_chu.php">Việt Nam ngày nay</a>
                            <i class="fas fa-chevron-down icon-down--mobile" data-index="0"></i>
                            <i class="fas fa-chevron-up icon-up--mobile none--tablet-mobile" data-index="0"></i>
                            <div class="flyout vietnam-now none--tablet-mobile">
                                <div class="vietnam-now-container">
                                    <ul class="vietnam-now-show">
                                        <li><a href="">Why not VN</a></li>
                                        <li><a href="">My Vietnam</a></li>
                                        <li><a href="">Virtual VN</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    
                        <li class="box-menu--mobile">
                            <a href="../page_tour/page_tour.php?LoaiHinh=1">Tour trong nước</a>
                            <i class="fas fa-chevron-down icon-down--mobile" data-index="1"></i>
                            <i class="fas fa-chevron-up icon-up--mobile none--tablet-mobile" data-index="1"></i>
                            <div class="flyout place-to-go none--tablet-mobile">
                                <div class="row place-to-go-container">
                                    <div class="l-2">
                                        <p class="place-to-go-title">
                                            <a href="">Northern Vietnam</a>
                                        </p>
                                        <a class="place-to-go-img" href="">
                                            <img src="../../../image/hanoi-vietnam.jpg" alt="">
                                            <span class="place-to-go-info">
                                                <span>Ha Noi</span>
                                            </span>
                                        </a>
                                        <ul class="place-to-go-list">
                                            <li class="place-to-go-item">
                                                <i class="fas fa-chevron-right"></i>
                                                <a href="">Ha Giang</a>
                                            </li>
                                            <li class="place-to-go-item">
                                                <i class="fas fa-chevron-right"></i>
                                                <a href="">Ha Long</a>
                                            </li>
                                            <li class="place-to-go-item">
                                                <i class="fas fa-chevron-right"></i>
                                                <a href="">Mai Chau</a>
                                            </li>
                                            <li class="place-to-go-item">
                                                <i class="fas fa-chevron-right"></i>
                                                <a href="">Ninh Binh</a>
                                            </li>
                                            <li class="place-to-go-item">
                                                <i class="fas fa-chevron-right"></i>
                                                <a href="">Sapa</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="l-2">
                                        <p class="place-to-go-title">
                                            <a href="">Northern Vietnam</a>
                                        </p>
                                        <a class="place-to-go-img" href="">
                                            <img src="../../../image/danang travel guide thumb.jpg" alt="">
                                            <span class="place-to-go-info">
                                                <span>Da Nang</span>
                                            </span>
                                        </a>
                                        <ul class="place-to-go-list">
                                            <li class="place-to-go-item">
                                                <i class="fas fa-chevron-right"></i>
                                                <a href="">Ha Giang</a>
                                            </li>
                                            <li class="place-to-go-item">
                                                <i class="fas fa-chevron-right"></i>
                                                <a href="">Ha Long</a>
                                            </li>
                                            <li class="place-to-go-item">
                                                <i class="fas fa-chevron-right"></i>
                                                <a href="">Mai Chau</a>
                                            </li>
                                            <li class="place-to-go-item">
                                                <i class="fas fa-chevron-right"></i>
                                                <a href="">Ninh Binh</a>
                                            </li>
                                            <li class="place-to-go-item">
                                                <i class="fas fa-chevron-right"></i>
                                                <a href="">Sapa</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="l-2">
                                        <p class="place-to-go-title">
                                            <a href="">Northern Vietnam</a>
                                        </p>
                                        <a class="place-to-go-img" href="">
                                            <img src="../../../image/travel-vietnam-4.jpg" alt="">
                                            <span class="place-to-go-info">
                                                <span>Ho Chi Minh City</span>
                                            </span>
                                        </a>
                                        <ul class="place-to-go-list">
                                            <li class="place-to-go-item">
                                                <i class="fas fa-chevron-right"></i>
                                                <a href="">Ha Giang</a>
                                            </li>
                                            <li class="place-to-go-item">
                                                <i class="fas fa-chevron-right"></i>
                                                <a href="">Ha Long</a>
                                            </li>
                                            <li class="place-to-go-item">
                                                <i class="fas fa-chevron-right"></i>
                                                <a href="">Mai Chau</a>
                                            </li>
                                            <li class="place-to-go-item">
                                                <i class="fas fa-chevron-right"></i>
                                                <a href="">Ninh Binh</a>
                                            </li>
                                            <li class="place-to-go-item">
                                                <i class="fas fa-chevron-right"></i>
                                                <a href="">Sapa</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="l-6 place-to-go-map">
                                        <img src="https://vietnam.travel/themes/custom/vietnamtourism/images/flyout-map.png" alt="">
                                        <a class="north" href="">
                                            <span>NORTHERN VIETNAM</span>
                                        </a>
                                        <a class="central" href="">
                                            <span>CENTRAL VIETNAM</span> 
                                        </a>
                                        <a class="south" href="">
                                            <span>SOUTHERN VIETNAM</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    
                        <li class="box-menu--mobile">
                            <a href="../page_tour/page_tour.php?LoaiHinh=2">Tour nước ngoài</a>
                            <i class="fas fa-chevron-down icon-down--mobile" data-index="2"></i>
                            <i class="fas fa-chevron-up icon-up--mobile none--tablet-mobile" data-index="2"></i>
                            <div class="flyout things-to-do none--tablet-mobile">
                                <div class="things-to-do-container">
                                    <div class="row">
                                        <div class="l-6 things-to-do-left">
                                            <div class="row">
                                                <div class="l-6 sub-box-menu--mobile">
                                                    <p class="things-to-do-title">
                                                        <a href="">HIGHLIGHTS</a>
                                                        <i class="fas fa-chevron-down sub-icon-down--mobile" data-index="0"></i>
                                                        <i class="fas fa-chevron-up sub-icon-up--mobile none--tablet-mobile" data-index="0"></i>
                                                    </p>

                                                    <ul class="things-to-do-list sub-box--mobile none--tablet-mobile">
                                                        <li class="has-arrow">
                                                            <i class="fas fa-chevron-right"></i>
                                                            <a href="">Food</a>
                                                        </li>
                                                        <li class="has-arrow">
                                                            <i class="fas fa-chevron-right"></i>
                                                            <a href="">Nature</a>
                                                        </li>
                                                        <li class="has-arrow">
                                                            <i class="fas fa-chevron-right"></i>
                                                            <a href="">Culture</a>
                                                        </li>
                                                        <li class="has-arrow">
                                                            <i class="fas fa-chevron-right"></i>
                                                            <a href="">Cities</a>
                                                        </li>
                                                        <li class="has-arrow">
                                                            <i class="fas fa-chevron-right"></i>
                                                            <a href="">Beaches</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="l-6 sub-box-menu--mobile">
                                                    <p class="things-to-do-title">
                                                        <a href="">HOLIDAYS</a>
                                                        <i class="fas fa-chevron-down sub-icon-down--mobile" data-index="1"></i>
                                                        <i class="fas fa-chevron-up sub-icon-up--mobile none--tablet-mobile" data-index="1"></i>
                                                    </p>

                                                    <ul class="things-to-do-list sub-box--mobile none--tablet-mobile">
                                                        <li class="has-arrow">
                                                            <i class="fas fa-chevron-right"></i>
                                                            <a href="">Adventure</a>
                                                        </li>
                                                        <li class="has-arrow">
                                                            <i class="fas fa-chevron-right"></i>
                                                            <a href="">Wellness</a>
                                                        </li>
                                                        <li class="has-arrow">
                                                            <i class="fas fa-chevron-right"></i>
                                                            <a href="">Family</a>
                                                        </li>
                                                        <li class="has-arrow">
                                                            <i class="fas fa-chevron-right"></i>
                                                            <a href="">Luxury</a>
                                                        </li>
                                                        <li class="has-arrow">
                                                            <i class="fas fa-chevron-right"></i>
                                                            <a href="">Golf</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="l-6 things-to-do-right sub-box-menu--mobile">
                                            <p class="things-to-do-title">
                                                <a href="">UPCOMING FESTIVALS & EVENTS</a>
                                                <i class="fas fa-chevron-down sub-icon-down--mobile" data-index="2"></i>
                                                <i class="fas fa-chevron-up sub-icon-up--mobile none--tablet-mobile" data-index="2"></i>
                                            </p>

                                            <ul class="things-to-do-festival sub-box--mobile none--tablet-mobile">
                                                <li class="things-to-do-event">
                                                    <a href="">
                                                        <img src="../../../image/events_in_vietnam-8.jpg" alt="">
                                                        <div class="fes-info">
                                                            <span class="info-content">
                                                                <span class="title">Kate Festival</span>
                                                                <span class="desc">26 Sep 2021 - 29 Sep 2021</span>
                                                            </span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="things-to-do-event">
                                                    <a href="">
                                                        <img src="../../../image/Ba Be Jungle Marathon-9.jpg" alt="">
                                                        <div class="fes-info">
                                                            <span class="info-content">
                                                                <span class="title">Ba Be Jungle Marathon</span>
                                                                <span class="desc">03 Oct 2021 - 03 Oct 2021</span>
                                                            </span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="things-to-do-event">
                                                    <a href="">
                                                        <img src="../../../image/Vietnam Trail Series-7.jpg" alt="">
                                                        <div class="fes-info">
                                                            <span class="info-content">
                                                                <span class="title">Vietnam Jungle Marathon</span>
                                                                <span class="desc">16 Oct 2021 - 16 Oct 2021</span>
                                                            </span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <a href="" class="red-link">View all</a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    
                        <li class="box-menu--mobile">
                            <a href="">Du lịch xanh</a>
                            <i class="fas fa-chevron-down icon-down--mobile" data-index="3"></i>
                            <i class="fas fa-chevron-up icon-up--mobile none--tablet-mobile" data-index="3"></i>
                            <div class="flyout plan-your-trip none--tablet-mobile">
                                <div class="plan-your-trip-container">
                                    <div class="row">
                                        <div class="l-6 plan-your-trip-left">
                                            <div class="row">
                                                <div class="l-6">
                                                    <ul class="show">
                                                        <li class="nav-mobile"><a href="">Visa Requirements</a></li>
                                                        <li class="nav-mobile"><a href="">E-visa Applications</a></li>
                                                        <li class="nav-mobile"><a href="">Getting to Vietnam</a></li>
                                                        <li class="nav-mobile"><a href="">Getting Around Vietnam</a></li>
                                                        <li class="nav-mobile"><a href="">Health & Safety</a></li>
                                                        <li class="nav-mobile"><a href="">Vietnamese Phrases</a></li>
                                                    </ul>
                                                </div>
                                                <div class="l-6 plan-your-trip-itinerasies">
                                                    <p class="plan-your-trip-title">
                                                        <a href="">ITINERARIES</a>
                                                    </p>
                                                    <ul class="plan-your-trip-list">
                                                        <li class="has-arrow">
                                                            <i class="fas fa-chevron-right"></i>
                                                            <a href="">Adventure Trails</a>
                                                        </li>
                                                        <li class="has-arrow">
                                                            <i class="fas fa-chevron-right"></i>
                                                            <a href="">Best Heritage Sites</a>
                                                        </li>
                                                        <li class="has-arrow">
                                                            <i class="fas fa-chevron-right"></i>
                                                            <a href="">Coast and Islands</a>
                                                        </li>
                                                        <li class="has-arrow">
                                                            <i class="fas fa-chevron-right"></i>
                                                            <a href="">View all trips</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="l-6  plan-your-trip-right">
                                            <div class="row">
                                                <div class="l-4 plan-your-trip-img">
                                                    <a href="">
                                                        <img src="../../../image/Adventure itinerary Vietnam_0.jpg" alt="">
                                                        <span class="info">
                                                            <p class="desc">Adventure Trails</p>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="l-4 plan-your-trip-img">
                                                    <a href="">
                                                        <img src="../../../image/World heritage sites Vietnam travel_2.jpg" alt="">
                                                        <span class="info">
                                                            <p class="desc">Best Heritage Sites</p>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="l-4 plan-your-trip-img">
                                                    <a href="">
                                                        <img src="../../../image/Beach holiday in Vietnam.jpg" alt="">
                                                        <span class="info">
                                                            <p class="desc">Coast and Islands</p>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    
                        <li>
                            <a href="">Dịch vụ</a>
                        </li>
                    
                        <li>
                            <a href="">Ưu đãi</a>
                        </li>
                    
                        <li class="main-nav-item box-menu--mobile">
                            <a href="">EN <i class="fas fa-chevron-down"></i></a>
                            <i class="fas fa-chevron-down icon-down--mobile" data-index="4"></i>
                            <i class="fas fa-chevron-up icon-up--mobile none--tablet-mobile" data-index="4"></i>
                            <div class="flyout en none--tablet-mobile">
                                <div class="en-container">
                                    <div class="span en-title">
                                        <a href="" class="en-link">
                                            日本語
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

