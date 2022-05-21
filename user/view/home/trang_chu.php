<?php 
    // if (count($_COOKIE) > 0) {
    //     header("location: ../home/trang_chu.php");
    // }
    session_start();
    // session_unset();
    // print_r($_SESSION);

    require "../../../config/config.php";
    // print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comforter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="../../../css/base/base.css">
    <link rel="stylesheet" href="../../../css/base/style.css">
    <link rel="stylesheet" href="../../../css/base/responsive.css">

    <title>Trang Chủ</title>
</head>
<body>
    <div class="page-wrap">
        
    <?php require "../base/header.php" ?>
 


        <body>
            <div class="video-banner">
                <div class="container-fluid">
                    <video  autoplay loop muted controls src="./asset/video/1847044713.mp4"></video>
                </div>
            </div>
            <!-- section: định nghĩa 1 phần của tài liệu  -->
            <section id="inspired">
                <div class="inspired-container container">
                    <h2 class="inspired-heading">get inspired</h2>
                    <p class="inspired-desc">
                        Discover the 
                        <a href="" class="inspired-active red-link">highlights</a>
                         of travelling Vietnam and find ideas for your 
                        <a href="" class="inspired-active gold-link">holidays</a>
                        with these stories.
                    </p>
                    <div class="inspires-interests">
                        <ul class="row">
                            <li class="l-2">
                                <a href="" class="allInspires btn-active">All</a>
                            </li>
                            <li class="l-2">
                                <a href="" class="allInspires">Food</a>
                            </li>
                            <li class="l-2">
                                <a href="" class="allInspires">Nature</a>
                            </li>
                            <li class="l-2">
                                <a href="" class="allInspires">Culture</a>
                            </li>
                            <li class="l-2">
                                <a href="" class="allInspires">Cities</a>
                            </li>
                            <li class="l-2">
                                <a href="" class="allInspires">Beaches</a>
                            </li>
                        </ul>

                        <div class="wrap-select">
                            <select name="" id="">
                                <option value="">All</option>
                                <option value="">Food</option>
                                <option value="">Nature</option>
                                <option value="">Culture</option>
                                <option value="">Cities</option>
                                <option value="">Beaches</option>
                            </select>
                        </div>

                        <section class="inspires">
                            <div class="row">
                                <div class="l-6 m-12">
                                    <a href="" class="inspires-link">
                                        <img src="./asset/img/Hanoi iconic dishes_0.jpg" alt="">
                                        <div class="inspire-desc">
                                            <h6>Food</h6>
                                            <p class="montserrat-bold">10 must-try Hanoian dishes </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="l-3 m-6">
                                    <a href="" class="inspires-link" style="padding-bottom: 100%;">
                                        <img src="./asset/img/Ha_Long_Bay-1970-50percent_1.jpg" alt="">
                                        <div class="inspire-desc">
                                            <h6>Nature</h6>
                                            <p class="montserrat-bold">Vietnam is honored as Asia's Leading Destination 2021</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="l-3 m-6">
                                    <a href="" class="inspires-link" style="padding-bottom: 100%;">
                                        <img src="./asset/img/how to explore Can Tho Mekong Delta_0.jpg" alt="">
                                        <div class="inspire-desc">
                                            <h6>Culture</h6>
                                            <p class="montserrat-bold">5 reasons you’ll love Can Tho</p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="l-6 m-12">
                                    <a href="" class="inspires-link">
                                        <img src="./asset/img/top museums in Vietnam_2.jpg" alt="">
                                        <div class="inspire-desc">
                                            <h6>Cities</h6>
                                            <p class="montserrat-bold">Vietnam's must-see museums</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="l-6 m-12">
                                    <a href="" class="inspires-link">
                                        <img src="./asset/img/amazing swimming pool Vietnam_2.jpg" alt="">
                                        <div class="inspire-desc">
                                            <h6>Beaches</h6>
                                            <p class="montserrat-bold">7 sensational swimming pools in Vietnam</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </section>
                    </div>

                </div>
            </section>

            <section class="discover-more">
                <div class="row" id="discover-container">
                    <div class="l-2 discover-item">
                        <a href="" class="discover-link">
                            <div class="discover-img" style="background: url('./asset/img/Vietnam Tourism-7.jpg') center center / cover no-repeat"></div>
                        </a>
                    </div>
                    <div class="l-2 m-6 discover-item show--mobile">
                        <a href="" class="discover-link">
                            <div class="discover-img" style="background: url('./asset/img/Vietnam Tourism-5_0.jpg') center center / cover no-repeat"></div>
                        </a>
                    </div>
                    <div class="l-2 discover-item">
                        <a href="" class="discover-link">
                            <div class="discover-img" style="background: url('./asset/img/Vietnam Tourism-10.jpg') center center / cover no-repeat"></div>
                        </a>
                    </div>
                    <div class="l-2 m-6 discover-item show--mobile">
                        <a href="" class="discover-link">
                            <div class="discover-img" style="background: url('./asset/img/Vietnam Tourism-2_0.jpg') center center / cover no-repeat"></div>
                        </a>
                    </div>
                    <div class="l-2 discover-item">
                        <a href="" class="discover-link">
                            <div class="discover-img" style="background: url('./asset/img/Vietnam Tourism-6_0.jpg') center center / cover no-repeat"></div>
                        </a>
                    </div>
                    <div class="l-2 discover-item">
                        <a href="" class="discover-link">
                            <div class="discover-img" style="background: url('./asset/img/Vietnam Tourism-11.jpg') center center / cover no-repeat"></div>
                        </a>
                    </div>
                </div>
                <div class="row" id="discover-container">
                    <div class="l-2 discover-item">
                        <a href="" class="discover-link">
                            <div class="discover-img" style="background: url('./asset/img/Vietnam Tourism-8.jpg') center center / cover no-repeat"></div>
                        </a>
                    </div>
                    <div class="l-4 m-12 discover-item discover-bg show--mobile">
                        <a href="" class="discover-link">
                            <div class="discover-img discover-bg-img">
                                <div class="discover-img-title">
                                    <h3>Start exploring</h3>
                                    <p class="discover-img-desc none--tablet-mobile">Click any picture to discover the country's top draws</p>
                                    <p class="discover-img-desl--mobile">
                                        Touch to navigate
                                        <i class="fas fa-chevron-right"></i>
                                        <i class="fas fa-chevron-right"></i>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="l-2 discover-item">
                        <a href="" class="discover-link">
                            <div class="discover-img" style="background: url('./asset/img/Vietnam Tourism-16.jpg') center center / cover no-repeat"></div>
                        </a>
                    </div>
                    <div class="l-2 discover-item">
                        <a href="" class="discover-link">
                            <div class="discover-img" style="background: url('./asset/img/Vietnam Tourism-4_0.jpg') center center / cover no-repeat"></div>
                        </a>
                    </div>
                    <div class="l-2 discover-item">
                        <a href="" class="discover-link">
                            <div class="discover-img" style="background: url('./asset/img/Vietnam Tourism-13.jpg') center center / cover no-repeat"></div>
                        </a>
                    </div>
                </div>
                <div class="row" id="discover-container">
                    <div class="l-2 discover-item">
                        <a href="" class="discover-link">
                            <div class="discover-img" style="background: url('./asset/img/Vietnam Tourism-3_0.jpg') center center / cover no-repeat"></div>
                        </a>
                    </div>
                    <div class="l-2 discover-item">
                        <a href="" class="discover-link">
                            <div class="discover-img" style="background: url('./asset/img/Vietnam Tourism-9.jpg') center center / cover no-repeat"></div>
                        </a>
                    </div>
                    <div class="l-2 discover-item">
                        <a href="" class="discover-link">
                            <div class="discover-img" style="background: url('./asset/img/Vietnam Tourism-15.jpg') center center / cover no-repeat"></div>
                        </a>
                    </div>
                    <div class="l-2 discover-item">
                        <a href="" class="discover-link">
                            <div class="discover-img" style="background: url('./asset/img/Vietnam Tourism-14.jpg') center center / cover no-repeat"></div>
                        </a>
                    </div>
                    <div class="l-2 m-6 discover-item show--mobile">
                        <a href="" class="discover-link">
                            <div class="discover-img" style="background: url('./asset/img/Vietnam Tourism-12.jpg') center center / cover no-repeat"></div>
                        </a>
                    </div>
                    <div class="l-2 m-6 discover-item show--mobile">
                        <a href="" class="discover-link">
                            <div class="discover-img" style="background: url('./asset/img/Vietnam Tourism_0.jpg') center center / cover no-repeat"></div>
                        </a>
                    </div>
                </div>
            </section>

            <section class="author">
                <div class="author-container container">
                    <div class="author-container-title">
                        <h2>Stay at Home</h2>
                        <p>Explore Vietnam from home and read up on the COVID-19 situation in Vietnam.</p>
                    </div>
                    <div class="author-items-container">
                        <div class="author-items">
                            <div class="row">
                                <div class="l-4 m-4 author-item" data-index="0">
                                    <a href="" class="block-item">
    
                                        <div class="item-img">
                                            <img src="./asset/img/Vietnam Travel-10_1.jpg" alt="">
                                        </div>
                                        <span>Fun at Home</span>
                                        <p>Recipes, colouring sheets, and more</p>
                                    </a>
                                </div>
                                <div class="l-4 m-4 author-item" data-index="1">
                                    <a href="" class="block-item">
    
                                        <div class="item-img">
                                            <img src="./asset/img/Vietnam Travel-24_0.jpg" alt="">
                                        </div>
                                        <span>Books, Art & Music</span>
                                        <p>A primer on Vietnamese culture</p>
                                    </a>
                                </div>
                                <div class="l-4 m-4 author-item" data-index="2">
                                    <a href="" class="block-item">
    
                                        <div class="item-img">
                                            <img src="./asset/img/Vietnam Travel-13_1.jpg" alt="">
                                        </div>
                                        <span>My Vietnam</span>
                                        <p>Local stories from north to south</p>
                                    </a>
                                </div>
                                <div class="l-4 m-4 author-item" data-index="3">
                                    <a href="" class="block-item">
    
                                        <div class="item-img">
                                            <img src="./asset/img/Vietnam Tourism-5_0 (1).jpg" alt="">
                                        </div>
                                        <span>Travel advisory</span>
                                        <p>Precautions and prevention for COVID-19</p>
                                    </a>
                                </div>
                                <div class="l-4 m-4 author-item" data-index="4">
                                    <a href="" class="block-item">
    
                                        <div class="item-img">
                                            <img src="./asset/img/Vietnam Tourism-6_0 (1).jpg" alt="">
                                        </div>
                                        <span>Safety strategy</span>
                                        <p>How Vietnam contained the virus</p>
                                    </a>
                                </div>
                                <div class="l-4 m-4 author-item" data-index="5">
                                    <a href="" class="block-item">
    
                                        <div class="item-img">
                                            <img src="./asset/img/Vietnam Tourism-7_0.jpg" alt="">
                                        </div>
                                        <span>Inspiring stories</span>
                                        <p>Kindness and community spirit</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>

            <section id="upcoming-events">
                <div class="container">
                    <h2 class="section-heading">what’s on</h2>
                    <p class="upcoming-events__subtitle">Check out upcoming events in Vietnam</p>
                    <div class="row">
                        <div class="l-12">
                            <div class="wrap-events">
                                
                                <div class="bx-viewport">
                                    <ul class="bx-viewport__list">
                                        <li class="bx-viewpor__item row">
                                            <div class="block-event l-4 c-12">
                                                <a href="">
                                                    <img src="./asset/img/Mekong festivals vietnam.jpg" alt="">
                                                    <span class="info">
                                                        <span class="date">
                                                            18 Nov 2021 - 18 Nov 2021
                                                        </span>
                                                        <h5 class="title">
                                                            Ghe Ngo Boat Race
                                                        </h5>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="block-event l-4 c-12">
                                                <a href="">
                                                    <img src="./asset/img/halong bay heritage marathon 2018-3_0.jpg" alt="">
                                                    <span class="info">
                                                        <span class="date">
                                                            07 Nov 2021 - 07 Nov 2021
                                                        </span>
                                                        <h5 class="title">
                                                            Ha Long Bay Heritage Marathon
                                                        </h5>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="block-event l-4 c-12">
                                                <a href="">
                                                    <img src="./asset/img/ooc oom bok festival-2_0.jpg" alt="">
                                                    <span class="info">
                                                        <span class="date">
                                                            18 Nov 2021 - 18 Nov 2021
                                                        </span>
                                                        <h5 class="title">
                                                            Ooc Om Bok 
                                                        </h5>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>

                                        <li class="item">
                                            <div class="block-event">
                                                <a href="">
                                                    <img src="./asset/img/new years eve vietnam-4.jfif" alt="">
                                                    <span class="info">
                                                        <span class="date">
                                                            30 Dec 2021 - 31 Dec 2021
                                                        </span>
                                                        <h5 class="title">
                                                            New Year's Eve
                                                        </h5>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                

                                <ul class="pager">
                                    <li class="page page-nov page-active">Nov</li>
                                    <li class="page page-dec">Dec</li>
                                    <li class="page">Jan</li>
                                    <li class="page">Feb</li>
                                    <li class="page">Mar</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="btn-view">
                        <div class="btn-view__event">
                            <div >
                                <a class="btn-view__link btn-active" href="">
                                    view all events
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="also-like">
                <div class="container">
                    <div class="alse-title">
                        <h2 class="section-heading">must-see sites</h2>
                        <p class="section-desc">Take a 360-degree tour of some of the country's most compelling natural wonders and cultural attractions right here.</p>
                    </div>
                    <div class="alse-list">
                        <div class="row also-like-items">
                            <div class="l-4 c-12 also-like-item">
                                <a href="">
                                    <img src="./asset/img/socialThumbnail.jpg" alt="">
                                </a>
                            </div>
                            <div class="l-4 c-12 also-like-item">
                                <a href="">
                                    <img src="./asset/img/socialThumbnail (1).jpg" alt="">
                                </a>
                            </div>
                            <div class="l-4 c-12 also-like-item">
                                <a href="">
                                    <img src="./asset/img/socialThumbnail (2).jpg" alt="">
                                </a>
                            </div>
                            <div class="l-4 c-12 also-like-item">
                                <a href="">
                                    <img src="./asset/img/socialThumbnail (3).jpg" alt="">
                                </a>
                            </div>
                            <div class="l-4 c-12 also-like-item">
                                <a href="">
                                    <img src="./asset/img/socialThumbnail (4).jpg" alt="">
                                </a>
                            </div>
                            <div class="l-4 c-12 also-like-item">
                                <a href="">
                                    <img src="./asset/img/socialThumbnail (5).jpg" alt="">
                                </a>
                            </div>
                        </div>
    
                    </div>
                </div>
            </section>

            <section id="hero-slider">
                <div class="container-slider">
                    <div class="slider-list">
                        <ul class="slider-items">
                            <li class="slider-item">
                                <a href="#" class="slider-link">
                                    <img src="./asset/img/Vietnam Rice terraces__0.jpeg" alt="">
                                    <h1 class="slider-item-title">Where to see Vietnam's rice terraces</h1>
                                </a>
                            </li>
                            <li class="slider-item">
                                <a href="#" class="slider-link">
                                    <img src="./asset/img/best-vietnamese-dishes.jpg" alt="">
                                    <h1 class="slider-item-title">
                                        21 must-try Vietnamese dishes
                                    </h1>
                                </a>
                            </li>
                            <li class="slider-item">
                                <a href="#" class="slider-link">
                                    <img src="./asset/img/top reasons to visit vietnam.jpeg" alt="">
                                    <h1 class="slider-item-title">
                                        10 reasons you'll love Vietnam
                                    </h1>
                                </a>
                            </li>
                            <li class="slider-item">
                                <a href="#" class="slider-link">
                                    <img src="./asset/img/best wellness resorts Vietnam_1_0.jpg" alt="">
                                    <h1 class="slider-item-title">
                                        Vietnam’s wonderful wellness resorts
                                    </h1>
                                </a>
                            </li>
                            <li class="slider-item">
                                <a href="#" class="slider-link">
                                    <img src="./asset/img/Vietnam top 360 Tours_0.jpg" alt="">
                                    <h1 class="slider-item-title">
                                        The ultimate virtual tour of Vietnam
                                    </h1>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="slider-dots">
                        <li class="slider-dot-item slider-dot-item-active" data-index="0"></li>
                        <li class="slider-dot-item" data-index="1"></li>
                        <li class="slider-dot-item" data-index="2"></li>
                        <li class="slider-dot-item" data-index="3"></li>
                        <li class="slider-dot-item" data-index="4"></li>
                    </ul>
                    <i class="fas fa-chevron-left btn-prev"></i>
                    <i class="fas fa-chevron-right btn-next"></i>
                </div>
            </section>

            <section id="travel-toolkit">
                <div class="container">
                    <h2 class="section-heading">travel tips</h2>
                    <p class="section-desc">Prepare for your trip with these practical articles</p>
                    <div class="toolkit-list row">
                        <div class="toolkit-item l-2-4 m-12">
                            <div class="thumbnail">
                                <a href="">
                                    <img src="./asset/img/Visas_1.jpg" alt="">
                                    <p>Visas</p>
                                </a>
                            </div>
                        </div>
                        <div class="toolkit-item l-2-4 m-12">
                            <div class="thumbnail">
                                <a href="">
                                    <img src="./asset/img/Transport_1.jpg" alt="">
                                    <p>Transport</p>
                                </a>
                            </div>
                        </div>
                        <div class="toolkit-item l-2-4 m-12">
                            <div class="thumbnail">
                                <a href="">
                                    <img src="./asset/img/Weather white_1.jpg" alt="">
                                    <p>Weather</p>
                                </a>
                            </div>
                        </div>
                        <div class="toolkit-item l-2-4 m-12">
                            <div class="thumbnail">
                                <a href="">
                                    <img src="./asset/img/Health and Safety_0.jpg" alt="">
                                    <p>Safety</p>
                                </a>
                            </div>
                        </div>
                        <div class="toolkit-item l-2-4 m-12">
                            <div class="thumbnail">
                                <a href="">
                                    <img src="./asset/img/History white_0.jpg" alt="">
                                    <p>History</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="vietnam-charm">
                <div class="container">
                    <h2 class="section-heading">share your story</h2>
                    <p class="section-desc">Tag your best #VietnamNOW moments on Instagram</p>
                    <div class="insgram-content">
                        <div class="row">
                            <div class="l-6 c-12">
                                <div class="row">
                                    <div class="l-6 c-6 wrap-thumb">
                                        <a href="">
                                            <img src="./asset/img/257492193_615326026569490_4548082279312931555_n.jpg" alt="">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </div>
                                    <div class="l-6 c-6 wrap-thumb">
                                        <a href="">
                                            <img src="./asset/img/257627211_430646655132777_7159437456154268801_n.jpg" alt="">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </div>
                                    <div class="l-6 c-6 wrap-thumb">
                                        <a href="">
                                            <img src="./asset/img/256070592_969572813658392_2093182237031569867_n.jpg" alt="">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </div>
                                    <div class="l-6 c-6 wrap-thumb">
                                        <a href="">
                                            <img src="./asset/img/247898594_433175628475406_5814096243767944716_n.jpg" alt="">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="l-6 c-12 wrap-thumb">
                                <a href="">
                                    <img src="./asset/img/247178983_131998052526838_7479123627784769811_n.jpg" alt="">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="btn-view">
                        <div class="btn-view__event instagram-story">
                            <div>
                                <a class="btn-view__link btn-active" href="">
                                    view more
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </body>

        
    <?php require "../base/footer.php" ?>

   
    </div>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
    <script src="./asset/js/index.js"></script>
    <script src="../base/user_menu.js"></script>
</body>
</html>