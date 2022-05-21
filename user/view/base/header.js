
function menu() {
    var btnBars = document.querySelector('.btn-bars__mobile');
    var btnClose = document.querySelector('.btn-close__mobile');
    var boxMenu = document.querySelector('.main-nav-list');
    var iconsDownMenu = document.querySelectorAll('.icon-down--mobile'); 
    var iconsUpMenu = document.querySelectorAll('.icon-up--mobile'); 
    var itemsMenuMobile = document.querySelectorAll('.box-menu--mobile');
    var boxItemsMenu = document.querySelectorAll('.flyout');

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
    var index;
    iconsDownMenu.forEach(function(icon) {
        icon.onclick = function() { 
            //ẩn box được hiện trước đấy 
            // nếu tồn tại index và icon đc click khác vs icon trước đó đc click thì if sẽ đc thực thi
            if (typeof index !== 'undefined' && icon.dataset.index !== index) { // lần đầu index là undefined nên nó dừng luôn ở điều kiện 1 -> điều kiện 2 ko đc xét tới nên ko có lỗi
                itemsMenuMobile[index].classList.remove('height--auto');
                boxItemsMenu[index].classList.add('none--tablet-mobile');
                iconsDownMenu[index].classList.remove('none--tablet-mobile');
                iconsUpMenu[index].classList.add('none--tablet-mobile');
            }
            icon.classList.toggle('none--tablet-mobile');
            // lần đầu click sẽ hiện icon up
            iconsUpMenu[icon.dataset.index].classList.toggle('none--tablet-mobile');
            // lần đầu click sẽ hiện box
            boxItemsMenu[icon.dataset.index].classList.toggle('none--tablet-mobile');
            //  lần đầu click sẽ cho chiều cao thẻ chứa cả box item menu chiều cao = auto (chiều cao sẽ bằng nội dung của nó)
            itemsMenuMobile[icon.dataset.index].classList.toggle('height--auto');
            // gán lại index (phục vụ cho việc click vào icon khác thì box có index này sẽ bị ẩn)
            index = icon.dataset.index; // index là vị trí box được hiện, nếu onclick box khác thì box cũ sẽ ẩn (câu lệnh if ở trên)
        }
    })
    
    iconsUpMenu.forEach(function(icon) {
        icon.onclick = function() { 
            //ẩn box được hiện trước đấy
            if (typeof index !== 'undefined' && icon.dataset.index !== index) { // lần đầu index là undefined nên nó dừng luôn ở điều kiện 1 -> điều kiện 2 ko đc xét tới nên ko có lỗi
                itemsMenuMobile[index].classList.remove('height--auto');
                boxItemsMenu[index].classList.add('none--tablet-mobile');
                iconsUpMenu[index].classList.remove('none--tablet-mobile');
                iconsDownMenu[index].classList.add('none--tablet-mobile');
            }
            icon.classList.toggle('none--tablet-mobile');
            iconsDownMenu[icon.dataset.index].classList.toggle('none--tablet-mobile');
            boxItemsMenu[icon.dataset.index].classList.toggle('none--tablet-mobile');
            itemsMenuMobile[icon.dataset.index].classList.toggle('height--auto');
            index = icon.dataset.index; // index là vị trí box được hiện, nếu onclick box khác thì box cũ sẽ ẩn (câu lệnh if ở trên)
        }
    })
    

    // menu cấp 3
    var subIconsDownMenu = document.querySelectorAll('.sub-icon-down--mobile'); 
    var subIconsUpMenu = document.querySelectorAll('.sub-icon-up--mobile'); 
    var subItemsMenuMobile = document.querySelectorAll('.sub-box-menu--mobile');
    var subBoxItemsMenu = document.querySelectorAll('.sub-box--mobile');

    var subIndex;
    subIconsDownMenu.forEach(function(icon) {
        icon.onclick = function() { 
            //ẩn box được hiện trước đấy
            if (typeof subIndex !== 'undefined' && icon.dataset.index !== subIndex) { // lần đầu subIndex là undefined nên nó dừng luôn ở điều kiện 1 -> điều kiện 2 ko đc xét tới nên ko có lỗi
                // subItemsMenuMobile[subIndex].classList.remove('height--auto');
                subBoxItemsMenu[subIndex].classList.add('none--tablet-mobile');
                subIconsDownMenu[subIndex].classList.remove('none--tablet-mobile');
                subIconsUpMenu[subIndex].classList.add('none--tablet-mobile');
            }
            icon.classList.toggle('none--tablet-mobile');
            subIconsUpMenu[icon.dataset.index].classList.toggle('none--tablet-mobile');
            // subItemsMenuMobile[icon.dataset.index].classList.toggle('height--auto');
            subBoxItemsMenu[icon.dataset.index].classList.toggle('none--tablet-mobile');
            subIndex = icon.dataset.index; // subIndex là vị trí box được hiện, nếu onclick box khác thì box cũ sẽ ẩn (câu lệnh if ở trên)
        }
    })

    subIconsUpMenu.forEach(function(icon) {
        icon.onclick = function() { 
            //ẩn box được hiện trước đấy
            if (typeof subIndex !== 'undefined' && icon.dataset.index !== subIndex) { // lần đầu subIndex là undefined nên nó dừng luôn ở điều kiện 1 -> điều kiện 2 ko đc xét tới nên ko có lỗi
                // subItemsMenuMobile[subIndex].classList.remove('height--auto');
                subBoxItemsMenu[subIndex].classList.add('none--tablet-mobile');
                subIconsUpMenu[subIndex].classList.remove('none--tablet-mobile');
                subIconsDownMenu[subIndex].classList.add('none--tablet-mobile');
            }
            icon.classList.toggle('none--tablet-mobile');
            subIconsDownMenu[icon.dataset.index].classList.toggle('none--tablet-mobile');
            // subItemsMenuMobile[icon.dataset.index].classList.toggle('height--auto');
            subBoxItemsMenu[icon.dataset.index].classList.toggle('none--tablet-mobile');
            subIndex = icon.dataset.index; // subIndex là vị trí box được hiện, nếu onclick box khác thì box cũ sẽ ẩn (câu lệnh if ở trên)
        }
    })
}

menu();
