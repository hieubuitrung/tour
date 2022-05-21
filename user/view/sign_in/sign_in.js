const phone = document.getElementById('phone');
const password = document.getElementById('password');
const messages = document.querySelectorAll('.message');
const button = document.getElementById('button');
const form = document.getElementById('form');

var isPhoneOK = 0, isPassOK = 0;

phone.addEventListener('focus', inputFocus); 
phone.addEventListener('blur', function(e) {
    const regex = /(^(09|03|07|08|05)(\d{8})$)/g;
    // ^: so khớp ở đầu chuỗi
    // $: so khớp ở cuối chuỗi 
    // +: chuỗi có ít nhất một (09|03|07|08|05)
    // (09|03|07|08|05): hoặc 
    // [0-9]: từ 0->9
    // \d: [0-9]
    // \b: tìm ở vị trí đâu/cuối của từ (ở đây là ở cuối)
    // g: tìm kiếm toàn 
    const message = "Số điện thoại";
    isPhoneOK = check(e.target, regex, message);
});

password.addEventListener('focus', inputFocus);
password.addEventListener('blur', function(e) {
    const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    // .: bất ký ký tự nào
    // .*: xuất hiện bất kì ký tự nào ít nhất 0 lần
    // ?=N: khớp với chuỗi nào theo sau bởi chuỗi N nhưng nó không nằm trong kết quả
    //?=.*[A-Za-z]: khớp với chuỗi nào theo sau bởi chuỗi có bất kì ký tự nào xuất hiện ít nhất 0 lần và ít nhất một chữ cái tiếng Anh hoa hoặc thường
    // \d: [0-9]
    const message = "Mật khẩu";
    isPassOK = check(e.target, regex, message);
});
button.addEventListener('click', function() {
    // e: pointerEvent
    if (isPhoneOK && isPassOK ) {
        // nếu isPhoneOK và isPassOK cùng đúng (1 = true)
        form.submit();
    }
    // trường hợp người dùng ko nhập gì mà ấn đăng nhập luôn thì hiện thông báo
    isPhoneOK = check(phone, /(^(09|03|07|08|05)(\d{8})$)/g, "Số điện thoại");
    isPassOK = check(password, /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/, "Mật khẩu");
});

function check(element, regex, message) {
    // regex: Regular Expression - biểu thức chính quy (dùng khi: tìm kiếm, thay thế, so khớp đầu vào, đầu ra)
    // cú pháp: /mẫu_quy_ước/cách_thức_so_khớp
    // cách thức so khớp: i - không phân biệt hoa thường, g - so khớp toàn bộ thay vì dứng ở vị trí đầu tiên, m - xuất hiện nhiều hơn 1 dòng hay không
    const value = element.value;
    const index = parseInt(element.dataset.index);
    if (regex.test(value)) {
        // test: đối sánh trong một chuỗi - trả về T nếu tìm thấy chuỗi 
        element.style = 'border: 1px solid transparent';
        messages[index].textContent = '';
        return 1;
    } else { 
        // nếu message khác rỗng ('' = false)
        if (message) {
            if (value == '') {
                messages[index].textContent = `${message} không được để trống`;
            } else {
                messages[index].textContent = `${message} không chính xác`;
            }
        }
        element.style = 'border: 1px solid red';
        return 0;
    }
}

function inputFocus(e) {
    const index = parseInt(e.target.dataset.index);
    messages[index].textContent = '';
    e.target.style = 'border: 1px solid transparent';
}

