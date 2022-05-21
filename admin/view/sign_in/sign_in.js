var password = document.querySelector('#password'); //class dùng . ,id sài #
var phone = document.querySelector('#phone');
var wrongtype = document.querySelector('.wrongtype');
var message = document.querySelector('.message');
var button = document.querySelector('#button');
var form = document.querySelector('#form');
var checkPhone=false;
var checkPassword=false;
password.addEventListener('focus', focusPassword);
phone.addEventListener('focus', focusPhone);
password.addEventListener('blur', blurPassword);
phone.addEventListener('blur', blurPhone);
button.addEventListener('click', checkSubmit);

function blurPhone() {
    if (phone.value==""){
        wrongtype.textContent="Tên không được để trống";
        checkPhone=false;
    } else if (phone.value.length<6){
        wrongtype.textContent="Tài khoản đăng nhập phải trên 6 kí tự";
        checkPhone=false;
    }else{
        wrongtype.textContent="";
        checkPhone=true;
    }
}

function blurPassword(){
    if (password.value==""){
        message.textContent="Bạn chưa nhập mật khẩu";
        checkPassword=false;
    } else if (password.value.length<6){
        message.textContent="Mật khẩu bạn nhập không đúng";
        checkPassword=false;
    }else{
        message.textContent="";
        checkPassword=true;
    }
}

function checkSubmit () {
    if(checkPhone==true && checkPassword==true){
        form.submit();
    }else if (checkPhone == false){
        blurPhone();
    }else if (checkPassword == false){
        blurPassword();
    }
}    

function focusPhone() {
    wrongtype.textContent="";
}

function focusPassword() {
    message.textContent="";
}
