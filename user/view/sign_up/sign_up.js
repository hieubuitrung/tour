const userName = document.querySelector('.name');
const phone = document.querySelector('.phone');
const gender = document.getElementsByName('gender');
const email = document.querySelector('.email');
const password = document.querySelector('.password');
const cfpassword = document.querySelector('.cfpassword');
const formSignUp = document.querySelector('#form');
const button = document.querySelector('.button');
const messages = document.querySelectorAll('.message');

var isNameOK = 0, isPhoneOK = 0, isGenderOK = 0, isEmailOK = 0, isPassOK = 0, isCfPass = 0;

// blur: khi loại bỏ con trỏ khỏi phần tử - focus: tạo tiêu điểm cho phần tử

userName.addEventListener('blur', function(e) {
    const regex = /^([aAàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤậẬbBcCdDđĐeEèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆfFgGhHiIìÌỉỈĩĨíÍịỊjJkKlLmMnNoOòÒỏỎõÕóÓọỌôÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢpPqQrRsStTuUùÙủỦũŨúÚụỤưƯừỪửỬữỮứỨựỰvVwWxXyYỳỲỷỶỹỸýÝỵỴzZ]+(\s?))+$/;
    const message = "Tên";
    isNameOK = check(e.target, regex, message);
});
userName.addEventListener('focus', function(e) {
    inputFocus(e.target);
});

phone.addEventListener('blur', function(e) {
    const regex = /(^(09|03|07|08|05)([0-9]{8})$)/g;
    // ^: so khớp ở đầu chuỗi
    // $: so khớp ở cuối chuỗi 
    // +: chuỗi có ít nhất một (09|03|07|08|05)
    // (09|03|07|08|05): hoặc 
    // [0-9]: từ 0->9
    // \b: tìm ở vị trí đâu/cuối của từ (ở đây là ở cuối)
    // /g: tìm kiếm toàn 
    const message = "Số điện thoại";
    isPhoneOK = check(e.target, regex, message);
}); 
phone.addEventListener('focus', function(e) {
    inputFocus(e.target);
});

gender.forEach(function(item){
    item.addEventListener('change', function(e) {
        const message = "Giới tính";
        isGenderOK = checkGender(e.target, message);
    });
});

email.addEventListener('blur', function(e) {
    const regex = /^[A-Za-z]\w{1,63}@[a-z]{3,}\.[a-z]{3,}(\.[a-z]{2,})*$/g;
    const message = "Email";
    isEmailOK = check(e.target, regex, message); 
});
email.addEventListener('focus', function(e) { 
    inputFocus(e.target); 
});

password.addEventListener('blur', function(e) {
    const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    // .: bất ký ký tự nào
    // .*: xuất hiện bất kì ký tự nào ít nhất 0 lần
    // ?=N: khớp với chuỗi nào theo sau bởi chuỗi N nhưng nó không nằm trong kết quả
    //?=.*[A-Za-z]: bất kì ký tự nào xuất hiện ít nhất 0 lần và ít nhất một chữ cái tiếng Anh hoa hoặc thường
    // \d: [0-9]
    const message = "";
    isPassOK = check(e.target, regex, message);
});
password.addEventListener('focus', function(e) {
    inputFocus(e.target);
});

cfpassword.addEventListener('blur', function(e) {
    const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    // .: bất ký ký tự nào
    // .*: xuất hiện bất kì ký tự nào ít nhất 0 lần
    // ?=N: khớp với chuỗi nào theo sau bởi chuỗi N nhưng nó không nằm trong kết quả
    //?=.*[A-Za-z]: bất kì ký tự nào xuất hiện ít nhất 0 lần và ít nhất một chữ cái tiếng Anh hoa hoặc thường
    // \d: [0-9]
    const message = "Nhập lại mật khẩu";
    isCfPass = checkCfpassword(e.target, regex, message);
});

cfpassword.addEventListener('focus', function(e) {
    inputFocus(e.target);
});

button.addEventListener('click', function() {
    if (isNameOK && isPhoneOK && isGenderOK && isEmailOK && isPassOK && isCfPass ) {
        alert('Đăng kí thành công!');
        formSignUp.submit(); // thực hiện submit 
    } else {
        // vì index của các element trong gender đều như nhau nên lấy của element nào cũng vậy
        const index = gender[0].dataset.index;
        if(!isGenderOK) {
            messages[index].textContent = `Giới tính không được để trống`;
        }
        check(userName, /^([aAàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤậẬbBcCdDđĐeEèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆfFgGhHiIìÌỉỈĩĨíÍịỊjJkKlLmMnNoOòÒỏỎõÕóÓọỌôÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢpPqQrRsStTuUùÙủỦũŨúÚụỤưƯừỪửỬữỮứỨựỰvVwWxXyYỳỲỷỶỹỸýÝỵỴzZ]+(\s?))+$/, "Tên");
        check(phone, /(^(09|03|07|08|05)([0-9]{8})$)/g, "Số điện thoại");
        check(email, /^[A-Za-z]\w{1,63}@[a-z]{3,}\.[a-z]{3,}(\.[a-z]{2,})*$/g, "Email");
        check(password, /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/, "");
        checkCfpassword(cfpassword, /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/, "Nhập lại mật khẩu");
    }
})

function inputFocus(element) {
    const index = parseInt(element.dataset.index);
    element.style = 'border: 1px solid transparent';
    messages[index].textContent = '';
}

function checkGender(element, message) {
    const index = parseInt(element.dataset.index);
    if (element.checked) {
        messages[index].textContent = "";
        return 1;
    } else {
        messages[index].textContent = `${message} không được để trống`;
        return 0;
    }
}

function checkCfpassword(element, regex, message) {
    const index = parseInt(element.dataset.index);
    const value = element.value;
    if (password.value == value && regex.test(value)) { 
        // nếu cfpass đúng
        element.style = 'border: 1px solid blue';
        messages[index].textContent = '';
        return 1;
    } else {
        // nếu cfpass sai
        if (value == '') {
            messages[index].textContent = `${message} không được để trống`;
        } else {
            messages[index].textContent = `${message} không chính xác`;
        }
        element.style = 'border: 1px solid red';
        messages[index].style = '';
        return 1;
    }
}

function check(element, regex, message) {
    // regex: Regular Expression - biểu thức chính quy (dùng khi: tìm kiếm, thay thế, so khớp đầu vào, đầu ra)
    // cú pháp: /mẫu_quy_ước/cách_thức_so_khớp
    // cách thức so khớp: i - không phân biệt hoa thường, g - so khớp toàn bộ thay vì dứng ở vị trí đầu tiên, m - xuất hiện nhiều hơn 1 dòng hay không
    const value = element.value;
    const index = parseInt(element.dataset.index);
    if (regex.test(value)) {
        // test: đối sánh trong một chuỗi - trả về T nếu tìm thấy chuỗi 
        element.style = 'border: 1px solid blue';
        messages[index].textContent = '';
        return 1;
    } else { 
        // nếu message khác rỗng ('' = false)
        if (message) {
            if (value == '') {
                messages[index].textContent = `${message} không được để trống`;
            } else {
                messages[index].textContent = `${message} không hợp lệ`;
            }
        }
        element.style = 'border: 1px solid red';
        return 0;
    }
}