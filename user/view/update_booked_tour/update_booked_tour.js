const form = document.querySelector('#info-form');
const userName = document.querySelector('#name');
const email = document.querySelector('#email');
const address = document.querySelector('#address');
const citizenId = document.querySelector('#citizen-id');
const button = document.querySelector('#button');
const messages = document.querySelectorAll('.message');

var checkName = 1, checkEmail = 1, checkAddress = 1, checkCitizenId = 1, checkQuantity = 1;

// khi click nút button
button.addEventListener('click', function () {
    if (checkName == 1 && checkEmail == 1 && checkAddress == 1 && checkCitizenId == 1 && checkQuantity == 1) {
        var confirmTour = confirm("Nhấn OK để tiến hành đặt tour");
        if (confirmTour == true) {
            form.submit();
        }
    }
})

userName.addEventListener('focus', function(e) {
    inputFocus(e.target);
})
userName.addEventListener('blur', function(e) {
    // regex: regular expressions
    // không cho viết khoảng trắng đầu tên
    // khoảng cách giữa các từ chỉ cho 1 khoảng trắng
    // mỗi từ tối thiểu 1 chữ
    const regex = /^([aAàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤậẬbBcCdDđĐeEèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆfFgGhHiIìÌỉỈĩĨíÍịỊjJkKlLmMnNoOòÒỏỎõÕóÓọỌôÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢpPqQrRsStTuUùÙủỦũŨúÚụỤưƯừỪửỬữỮứỨựỰvVwWxXyYỳỲỷỶỹỸýÝỵỴzZ]+(\s?))+$/;
    const message = "Tên";
    checkName = check (e.target, regex, message);
})

email.addEventListener('focus', function(e) {
    inputFocus(e.target);
})
email.addEventListener('blur', function(e) {
    // tên email: ko bắt đầu bởi số, tối thiểu 2 kí tự
    // tên miền: gôm chữ Hoa hoặc thường, tối thiểu 3 kí tự
    // tên miền mở rộng: có hoặc không đều được, tối thiểu 2 kí tự
    const regex = /^[A-Za-z]\w{1,63}@[a-z]{3,}\.[a-z]{3,}(\.[a-z]{2,})*$/;
    // ^: bắt đầu chuỗi
    // \w: tương đương với [A-Za-z0-9_]
    // +: ít nhất 1 lần
    // {3,}: 3 lần trở lên
    // \.: dấu .
    // *: ít nhất 0 lần
    // $: kết thúc chuỗi
    const message = "Email";
    checkEmail = check (e.target, regex, message);
})

address.addEventListener('focus', function(e) {
    inputFocus(e.target);
})
address.addEventListener('blur', function(e) {
    // check tỉnh thành (thực tế người dùng sẽ nhập cả huyện, xã, ....)
    // tình thành nhiều kí tự nhất là TPHCM - 21 (cả khoảng trắng)
    // tỉnh thành ít ký tự nhất là HN - 6 (cả khoảng trắng)
    const regex = /^[aAàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤậẬbBcCdDđĐeEèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆfFgGhHiIìÌỉỈĩĨíÍịỊjJkKlLmMnNoOòÒỏỎõÕóÓọỌôÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢpPqQrRsStTuUùÙủỦũŨúÚụỤưƯừỪửỬữỮứỨựỰvVwWxXyYỳỲỷỶỹỸýÝỵỴzZ\s-]{6,21}$/;
    // [abc]: có thể khớp với a hoặc b hoặc c
    // \s: khoảng trắng
    // - : chấp nhận kí tự - (Bà Rịa - Vũng Tàu)
    // $: kết thúc chuỗi
    const message = "Địa chỉ";
    checkAddress = check(e.target, regex, message);
});

citizenId.addEventListener('focus', function(e) {
    inputFocus(e.target);
})
citizenId.addEventListener('blur', function(e) {
    const regex = /^\d{12}$/;
    // ^: kí hiệu cho biết bắt đâu một dòng
    // \d: tương đương với [0-9]
    // {12}: độ dài 12
    // $ điểm kết thúc dòng
    const message = "Số CCCD";
    checkCitizenId = check(e.target, regex, message);
});

// quantity đã được khai báo bên file book_tour.php
quantity.addEventListener('focus', function(e) {
    inputFocus(e.target);
})
quantity.addEventListener('blur', function(e) {
    // cho phép tối đa 99 và tối thiểu 1
    const regex = /^(0?)*[1-9](\d?)$/;
    // 0?: có hoặc không có số 0 đều được
    // (0?)*: xuất hiện nhiều số 0 đằng trước đều được
    // [1-9]: xuất hiện 1 lần [1-9] 
    // (\d)?: có hoặc không xuất hiện [0-9] đều được
    const message = "Số lượng";
    checkQuantity = check(e.target, regex, message);
})


function check(element, regex, message) {
    const index = parseInt(element.dataset.index);
    const value = element.value;
    if (regex.test(value)) {
        messages[index].textContent = '';
        return 1;
    } else if (value == '') {
        messages[index].textContent = `${message} không được để trống`;
        return 0;
    } else {
        messages[index].textContent = `${message} không hợp lệ`;
        return 0;
    }
}

function inputFocus(element) {
    const index = parseInt(element.dataset.index);
    messages[index].textContent = '';
}