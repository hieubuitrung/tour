<?php 
    session_start();
    require "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://static.tuoitre.vn/tto/i/s626/2011/12/27/rxr20OFA.jpg" type="image/gif" sizes="20x20">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Grechen+Fuemen&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/base__header__footer.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/grid.css">
		<link rel="stylesheet" href="../assets/css/responsive.css">
		<link rel="stylesheet" href="css/respondsive2.css">
		<link rel="stylesheet" href="../assets/fonts/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="../base/css">
		<link rel="stylesheet" href="../../../css/base/base.css">
		<link rel="stylesheet" href="../../../css/base/style.css">
		<link rel="stylesheet" href="../../../css/base/responsive.css">
    <title>Travel Viet Nam</title>
		<link rel="stylesheet" href="../../../grid/grid.css">
		<link rel="stylesheet" href="css/list.css">
</head>
<body>
<div class="page-wrap">
        <?php
            require "../base/header.php"
        ?>
        <body>
        <div class="content__noio" style="margin-top: 110px;">
            <div class="home__background"></div>
            <div class="search">
                <div class="grid wide">
                  <div class="search__container__tabs grid wide">
                    <div class="row">
                      <div class="search__container__tab d-flex">
                        <span>Hotels</span>
                      </div>
                      <div class="search__container__tab d-flex">
                        <span>Vehicle</span>
                      </div>
                      <div class="search__container__tab d-flex">
                        <span>Flights</span>
                      </div>
                      <div class="search__container__tab d-flex">
                        <span>Tourism</span>
                      </div>
                    </div>
                  </div>
                <form action="hotel_list_new.php?des=<?php $_GET["des"]?>&rating=<?php $_GET["des"]?>" method="get">
                  <div class="search__container">
                    <div class="row">
                      <div class="search__container--item l-4 m-6 c-12">
                        <div>
                          <span>Destination</span>
                        </div>
                        <input type="text" name="des" value="" placeholder="Destination">
                      </div>
                      <div class="search__container--item l-2 m-6 c-12">
                        <div>
                          <span>Check-in</span>
                        </div>
                        <input type="date">
                      </div>
                      <div class="search__container--item l-2 m-6 c-12">
                        <div>
                          <span>Check-out</span>
                        </div>
                        <input type="date">
                      </div>
                      <div class="search__container--item l-1 m-3 c-6">
                        <div>
                          <span>Adult</span>
                        </div>
                        <select name="" id="">
                          <option>01</option>
                          <option>02</option>
                          <option>03</option>
                        </select>
                      </div>
                      <div class="search__container--item l-1 m-3 c-6">
                        <div>
                          <span>Rating</span>
                        </div>
                        <select name="rating" id="rating">
                          <option <?php if (isset($rating) && $rating == '0') echo "selected=\"selected\"";  ?> value="0" >Tất cả</option>
                          <option <?php if (isset($rating) && $rating == '1') echo "selected=\"selected\"";  ?> value="1" >1 Star</option>
                          <option <?php if (isset($rating) && $rating == '2') echo "selected=\"selected\"";  ?> value="2" >2 Star</option>
                          <option <?php if (isset($rating) && $rating == '3') echo "selected=\"selected\"";  ?> value="3" >3 Star</option>
                          <option <?php if (isset($rating) && $rating == '4') echo "selected=\"selected\"";  ?> value="4" >4 Star</option>
                          <option <?php if (isset($rating) && $rating == '5') echo "selected=\"selected\"";  ?> value="5" >5 Star</option>
											  </select>
                      </div>
                      <div class="l-2 m-4 c-4" style="margin-top: 30px;">
                        <input type="submit" name='submit' class="btn-custom-primary btn-button" value="Tìm kiếm">
										  </div>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            <div class="maincontent" >
                <div class="offers">
                    <div class="offers__container">
                      <div class="grid wide">
                        <h2>Best deals of the month</h2>
                        <div class="row offers__container__items">
                          <div class="col l-6 m-12 c-12 ">
                            <div class="offer__container__item">
                              <div class="row">
                                <div class="col l-6 m-6 c-6 ">
                                  <div class="offer__item__img--container">
                                    <div class="offer__item__img" style="
                                          background-image: url(diadiem/danang.png);
                                        "></div>
                                    <div class="offer__container__item-name">
                                      <a href="#">Da Nang</a>
                                    </div>
                                  </div>
                                </div>
                                <div class="l-6 m-6 c-6 ">
                                  <div class="offer__container__item--content">
                                    <div class="offers__item__price">
                                      $79
                                      <span>per night</span>
                                    </div>

                                    <p>
                                      Dubbed the "city worth visiting" with the romantic Han river and the iconic Dragon bridge of the coastal tourist city of Da Nang.
                                    </p>  
                                    <br>                     
                                    <a href="#">Read more</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col l-6 m-12 c-12">
                            <div class="offer__container__item">
                              <div class="row">
                                <div class="col l-6 m-6 c-6 ">
                                  <div class="offer__item__img--container">
                                    <div class="offer__item__img" style="
                                          background-image: url(diadiem/sapa.jpg);
                                        "></div>
                                    <div class="offer__container__item-name">
                                      <a href="#">Sapa</a>
                                    </div>
                                  </div>
                                </div>
                                <div class="l-6 m-6 c-6 ">
                                  <div class="offer__container__item--content">
                                    <div class="offers__item__price">
                                        $77
                                      <span>per night</span>
                                    </div>
                                    <p>
                                      "City in the mist" is famous for its majestic mountain scenery, pristine fresh climate, and cool year-round coolness that will help you get the right moments of relaxation 
                                    </p>
                                    <a href="#">Read more</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col l-6 m-12 c-12">
                            <div class="offer__container__item">
                              <div class="row">
                                <div class="col l-6 m-6 c-6 ">
                                  <div class="offer__item__img--container">
                                    <div class="offer__item__img" style="
                                          background-image: url(diadiem/vungtau.png);
                                        "></div>
                                    <div class="offer__container__item-name">
                                      <a href="#">Vung Tau</a>
                                    </div>
                                  </div>
                                </div>
                                <div class="l-6 m-6 c-6 ">
                                  <div class="offer__container__item--content">
                                    <div class="offers__item__price">
                                      $69
                                      <span>per night</span>
                                    </div>
                                    <p>
                                      Coming to Vung Tau, visitors will also be fascinated by the scenery of this place, being released into the waves, enjoying the specialties of the sea at extremely attractive prices. 
                                    </p>
                                    <a href="#">Read more</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col l-6 m-12 c-12">
                            <div class="offer__container__item">
                              <div class="row">
                                <div class="col l-6 m-6 c-6 ">
                                  <div class="offer__item__img--container">
                                    <div class="offer__item__img" style="
                                          background-image: url(diadiem/hoian.jpeg);">
                                    </div>
                                    <div class="offer__container__item-name">
                                      <a href="#">Hoi An</a>
                                    </div>
                                  </div>
                                </div>
                                <div class="l-6 m-6 c-6 ">
                                  <div class="offer__container__item--content">
                                    <div class="offers__item__price">
                                      $89
                                      <span>per night</span>
                                    </div>
                                    <p>
                                      Gathering many beautiful landscapes, rich cuisine and unique local festivals, Hoi An tourist attractions have become a must-visit destination in the Central region. 
                                      <br>
                                      <br>
                                    </p>
                                    <a href="#">Read more</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              
              <div class="special">
                <h1 class="" style="text-align: center;"> Benefits when using our service</h1>
                <table class="center border-spacing: 10px;">
                    <tr>
                        <th><img src="https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494407528373-a0e2c450b5cfac244d687d6fa8f5dd98.png?tr=q-75" alt=""></th>
                        <td>
                            <h4 class="">Cheap prices every day with special app-specific offers </h4>
                            <p>Book through the app to get the best deals with great promotions </p>
                        </td>
                    </tr>
                </table>
                <table class="center border-spacing: 10px;">
                    <tr>
                        <td>
                            <h4>24/7 customer support </h4>
                            <p>The customer support team is always ready to help you through every step of the booking process </p>
                        </td>
                        <th><img src="https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494407541562-61b4438f5439c253d872e70dd7633791.png?tr=q-75" alt=""></th>
                    </tr>
                </table>
                <table class="center border-spacing: 10px;">
                    <tr>
                        <th><img src="https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494407536280-ddcb70cab4907fa78468540ba722d25b.png?tr=q-75" alt=""></th>
                        <td>
                            <h4>Safe and flexible payment methods </h4>
                            <p>Safe online transactions with many options such as payment at convenience stores, bank transfer, credit card to Internet Banking. No transaction fees. </p>
                        </td>
                    </tr>
                </table>
                <table class="center border-spacing: 10px;" style="border-bottom: solid #8f8f8f;">
                    <tr>
                        <td>
                            <h4>Real reviews </h4>
                            <p>Over 10,000,000 verified reviews and votes from travelers will help you make the right choice. </p>
                        </td>
                        <th><img src="https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494407562736-ea624be44aec195feffac615d37ab492.png?tr=q-75" alt=""></th>
                    </tr>
                </table>
              </div>
              <div class="contact">
                <div class="contact__background"></div>
                <div class="grid wide">
                  <div class="contact__container">
                    <div class="row">
                      <div class="col l-5"></div>
                      <div class="col l-7">
                        <div class="contact__container__form">
                          <div class="contact__container__form--title">
                            <h2>get in touch</h2>
                          </div>
                          <div class="contact__form">
                            <input type="text" placeholder="Name" class="contact_form_name" />
                            <input type="text" placeholder="E-mail" class="contact_form_email" />
                            <input type="text" placeholder="Subject" class="contact_form_subject" />
                            <textarea name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
                            <button class="form_submit_button">
                              send message
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div> 
    <script src="../assets/base.js"></script>
    </body>
        <?php 
            require "../base/footer.php";
        ?>
    </div>
    <!-- JS Header footer hieu -->
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
    <script src="./asset/js/index.js"></script>
    <script src="../base/user_menu.js"></script>
</body>


</html>