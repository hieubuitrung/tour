function searchAppear() {
    const searchInput = document.querySelector('.search-input input');
    searchInput.classList.toggle('search_focus'); // kiểm tra nếu không có class 'search_focus' thì thêm vào, nếu có class 'search_focus' thì bỏ đi
    searchInput.onclick = function(event) { // bỏ sự kiện nổi bọt khi click vào input
        event.stopPropagation(); 
    }
}

const searchIcon = document.querySelector('.toplinks');
searchIcon.addEventListener('click',searchAppear) // thêm sự kiện


function pageSlide() {
    // clientWidth: trả về chiều rông của phần tử bao gồm cả phần đệm; không bao bộng margin, thanh cuộn
    const btnPage = document.querySelectorAll('.page');
    const imgList = document.querySelector('.bx-viewport__list');
    const viewport = document.querySelector('.bx-viewport');
    const widthBody = document.querySelector('body').clientWidth;
    const heightItemDec = document.querySelector('.bx-viewport__list .item a').clientHeight;
    const heightItemNov = document.querySelector('.bx-viewpor__item').clientHeight;
    viewport.style = `height: ${heightItemNov}px`; // làm ntn thì transition ms chạy khi lần đầu ko có height
    btnPage[0].onclick = function () {
        if(!btnPage[0].classList.contains('page-active')) {
            if (widthBody <= 768) {
                viewport.style = `height: ${heightItemNov}px`;
            }
            btnPage[0].classList.add('page-active');
            btnPage[1].classList.remove('page-active');
            imgList.style.left = '0';
        }
    }
    btnPage[1].onclick = function () {
        if(!btnPage[1].classList.contains('page-active')) {
            if (widthBody <= 768) {
                viewport.style = `height: ${heightItemDec}px`;
            }
            btnPage[1].classList.add('page-active');
            btnPage[0].classList.remove('page-active');
            imgList.style.left = '-100%';
        }
    }
}

pageSlide();


function slider() {
    const btnPrev = document.querySelector('.btn-prev');
    const btnNext = document.querySelector('.btn-next');
    const sliderItems = document.querySelector('.slider-items');
    // lengthSlider: số lượng slide
    const lengthSlider = document.querySelectorAll('.slider-item').length;
    // sliderDotItems: dot
    const sliderDotItems = document.querySelectorAll('.slider-dot-item');
    // leftSlide: đơn vị %
    let leftSlide = 0;
    // indexDot: chỉ số dot
    let indexDot = 0;

    // click prev slide
    function prevSlider() {
        if (leftSlide < 0) {
            // nếu slide đang hiển thị không phải vị trí đầu tiên (vị trí > 1)
            leftSlide += 100;
            indexDot --;
        } else {
            // nếu slide đang ở vị trí đầu tiên (vị trí = 1) thì hiển thị slide cuối cùng
            leftSlide = - (lengthSlider  * 100 - 100);
            indexDot = lengthSlider - 1;
        }
        // set vị trí cho slides
        sliderItems.style.left = `${leftSlide}%`;

        // chuyển dot được active
        removeSlideActive();
        sliderDotItems[indexDot].classList.add('slider-dot-item-active');
    }

    // click next slide
    function nextSlider() {
        if (leftSlide > - (lengthSlider * 100 - 100)) {
            //slide không ở vị trí cuối cùng
            leftSlide -= 100;
            indexDot++;
        } else {
            //slide ở vị trí cuối cùng
            leftSlide = 0;
            indexDot = 0;
        }
        // set vị trí cho slides
        sliderItems.style.left = `${leftSlide}%`;
        // chuyển dot được active
        removeSlideActive();
        sliderDotItems[indexDot].classList.add('slider-dot-item-active');
    } 

    function removeSlideActive() {
        sliderDotItems.forEach(function(item){
            item.classList.remove('slider-dot-item-active');
        });
    }

    btnPrev.onclick = function() {
        prevSlider();
        // reset lại setInterval cho slider
        clearInterval(sliderInderval);
        sliderInderval = setInterval(nextSlider, 4000);
    }

    btnNext.onclick = function() {
        nextSlider();
        // reset lại setInterval cho slider
        clearInterval(sliderInderval);
        sliderInderval = setInterval(nextSlider, 4000);
    }

    sliderDotItems.forEach(function(item) { // khi ấn vào dot thì tự động chuyển slide
        item.onclick = function() {
            indexDot = parseInt(item.dataset.index); // lấy ra attribute: data-index
            leftSlide = -1 * indexDot * 100;
            sliderItems.style.left = `${leftSlide}%`;
            removeSlideActive();
            sliderDotItems[indexDot].classList.add('slider-dot-item-active');

            // reset lại setInterval cho slider
            clearInterval(sliderInderval);
            sliderInderval = setInterval(nextSlider, 4000);
        }
    })

    let sliderInderval = setInterval(nextSlider, 4000);
    
}

slider();


// MOBILE

function menu() {
    const btnBars = document.querySelector('.btn-bars__mobile');
    const btnClose = document.querySelector('.btn-close__mobile');
    const boxMenu = document.querySelector('.main-nav-list');
    const iconsDownMenu = document.querySelectorAll('.icon-down--mobile'); 
    const iconsUpMenu = document.querySelectorAll('.icon-up--mobile'); 
    const itemsMenuMobile = document.querySelectorAll('.box-menu--mobile');
    const boxItemsMenu = document.querySelectorAll('.flyout');

    // nút bars
    btnBars.onclick = function() {
        btnBars.style = 'display: none';
        btnClose.style = 'display: block';
        boxMenu.style = 'display: block';
    }
    // nút close
    btnClose.onclick = function() {
        btnClose.style = 'display: none';
        btnBars.style = 'display: block';
        boxMenu.style = 'display: none';
    }

    // menu cấp 2
    let index;
    // index là vị trí box menu bị ẩn khi box khác được hiện (vị trí trước khi box mới được hiện)
    iconsDownMenu.forEach(function(icon) {
        icon.onclick = function() { 
            if (typeof index !== 'undefined' && icon.dataset.index !== index) {
                //ẩn box được hiện trước đấy
                // lần đầu index là undefined nên nó dừng luôn ở điều kiện 1 -> điều kiện 2 ko đc xét tới nên ko có lỗi
                itemsMenuMobile[index].classList.remove('height--auto');
                boxItemsMenu[index].classList.add('none--tablet-mobile');
                iconsDownMenu[index].classList.remove('none--tablet-mobile');
                iconsUpMenu[index].classList.add('none--tablet-mobile');
            }
            // lần click đầu box sẽ được hiện, lần click thử 2 box sẽ ẩn
            icon.classList.toggle('none--tablet-mobile'); // add
            iconsUpMenu[icon.dataset.index].classList.toggle('none--tablet-mobile'); // remove
            boxItemsMenu[icon.dataset.index].classList.toggle('none--tablet-mobile'); // remove
            itemsMenuMobile[icon.dataset.index].classList.toggle('height--auto'); // add
            index = icon.dataset.index; // index là vị trí box được hiện, nếu onclick box khác thì box cũ sẽ ẩn (câu lệnh if ở trên)
        }
    })
    
    iconsUpMenu.forEach(function(icon) {
        icon.onclick = function() { 
            if (typeof index !== 'undefined' && icon.dataset.index !== index) {
                //ẩn box được hiện trước đấy
                // lần đầu index là undefined nên nó dừng luôn ở điều kiện 1 -> điều kiện 2 ko đc xét tới nên ko có lỗi
                itemsMenuMobile[index].classList.remove('height--auto');
                boxItemsMenu[index].classList.add('none--tablet-mobile');
                iconsUpMenu[index].classList.remove('none--tablet-mobile');
                iconsDownMenu[index].classList.add('none--tablet-mobile');
            }
            icon.classList.toggle('none--tablet-mobile'); // adđ
            iconsDownMenu[icon.dataset.index].classList.toggle('none--tablet-mobile'); // remove
            boxItemsMenu[icon.dataset.index].classList.toggle('none--tablet-mobile'); // add
            itemsMenuMobile[icon.dataset.index].classList.toggle('height--auto'); // remove
            index = icon.dataset.index; // index là vị trí box được hiện, nếu onclick box khác thì box cũ sẽ ẩn (câu lệnh if ở trên)
        }
    })
    

    // menu cấp 3
    const subIconsDownMenu = document.querySelectorAll('.sub-icon-down--mobile'); 
    const subIconsUpMenu = document.querySelectorAll('.sub-icon-up--mobile'); 
    const subItemsMenuMobile = document.querySelectorAll('.sub-box-menu--mobile');
    const subBoxItemsMenu = document.querySelectorAll('.sub-box--mobile');

    let subIndex;
    // index là vị trí box menu bị ẩn khi box khác được hiện (vị trí trước khi box mới được hiện)
    subIconsDownMenu.forEach(function(icon) {
        icon.onclick = function() { 
            //ẩn box được hiện trước đấy
            if (typeof subIndex !== 'undefined' && icon.dataset.index !== subIndex) { 
                // lần đầu subIndex là undefined nên nó dừng luôn ở điều kiện 1 -> điều kiện 2 ko đc xét tới nên ko có lỗi
                // subItemsMenuMobile[subIndex].classList.remove('height--auto');
                subBoxItemsMenu[subIndex].classList.add('none--tablet-mobile');
                subIconsDownMenu[subIndex].classList.remove('none--tablet-mobile');
                subIconsUpMenu[subIndex].classList.add('none--tablet-mobile');
            }
            icon.classList.toggle('none--tablet-mobile'); // add
            subIconsUpMenu[icon.dataset.index].classList.toggle('none--tablet-mobile'); // remove
            // subItemsMenuMobile[icon.dataset.index].classList.toggle('height--auto');
            subBoxItemsMenu[icon.dataset.index].classList.toggle('none--tablet-mobile'); // remove
            subIndex = icon.dataset.index; // subIndex là vị trí box được hiện, nếu onclick box khác thì box cũ sẽ ẩn (câu lệnh if ở trên)
        }
    })

    
    subIconsUpMenu.forEach(function(icon) {
        icon.onclick = function() { 
            //ẩn box được hiện trước đấy
            if (typeof subIndex !== 'undefined' && icon.dataset.index !== subIndex) {
                // lần đầu subIndex là undefined nên nó dừng luôn ở điều kiện 1 -> điều kiện 2 ko đc xét tới nên ko có lỗi
                // subItemsMenuMobile[subIndex].classList.remove('height--auto');
                subBoxItemsMenu[subIndex].classList.add('none--tablet-mobile');
                subIconsUpMenu[subIndex].classList.remove('none--tablet-mobile');
                subIconsDownMenu[subIndex].classList.add('none--tablet-mobile');
            }
            icon.classList.toggle('none--tablet-mobile'); // add
            subIconsDownMenu[icon.dataset.index].classList.toggle('none--tablet-mobile'); // remove
            // subItemsMenuMobile[icon.dataset.index].classList.toggle('height--auto');
            subBoxItemsMenu[icon.dataset.index].classList.toggle('none--tablet-mobile'); // add
            subIndex = icon.dataset.index; // subIndex là vị trí box được hiện, nếu onclick box khác thì box cũ sẽ ẩn (câu lệnh if ở trên)
        }
    })
}

menu();



function sliderStayAtHome() {
    // clientWidth: trả về chiều rông của phần tử bao gồm cả phần đệm; không bao bộng margin, thanh cuộn
    const widthMobile = document.querySelector('body').clientWidth;
    const slickSlider = document.querySelector('.author-items > div');
    const alsoItems = document.querySelector('.also-like-items');
    if(widthMobile <= 768) {
        slickSlider.classList.add('slick-slider');
        alsoItems.classList.add('slick-slider');
    }

    $(document).ready(function(){
        $('.slick-slider').slick({
            slideslidesToShow: 1, // số lượng slide được hiển thị
            infinite: false, // vòng lặp vô tận 
            dots: true, 
            arrows: false,
            cssEase: 'ease-in-out',
            mobileFirst: true // bật chế độ responsive ngay trên màn hình desktop
        });

    });
}

sliderStayAtHome();
