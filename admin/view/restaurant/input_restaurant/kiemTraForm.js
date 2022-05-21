function checkform(){
    var tennhahang=document.input_restaurant.restaurant_name.value;
    var diachi=document.input_restaurant.address.value;
    var giatien=document.input_restaurant.price.value;
    var sdt=document.input_restaurant.phone_number.value;
    var hinhanh=document.input_restaurant.restaurant_image.value;
    if(tennhahang==null||tennhahang==""){
        alert("Vui lòng nhập tên nhà hàng");
        return false;
    }else if(diachi==null||diachi==""){
        alert("Vui lòng nhập địa chỉ nhà hàng");
        return false;
    }else if(giatien==null||giatien==""){
        alert("Vui lòng nhập giá nhà hàng");
        return false;
    }else if(sdt==null||sdt==""){
        alert("Vui lòng nhập số liên hệ nhà hàng");
        return false;
    }else if(sdt.length!=10){
        alert("Số điện thoại phải có 10 chữ số")
        return false
    }else if(hinhanh==null||hinhanh==""){
        alert("Vui lòng không để trống mục hình ảnh");
        return false;
    }
}







// var checkTennhahang = false;
// var checkEmail = false ;
// var checkAnhnhahang = false ;
// var checkDiaChi = false ;
// var checkGia=false ;
// var checkSodienthoai =false ;
// const tennhahang = document.querySelector('#restaurant_name'); //# la lay theo id,. la lay theo class
// const nanh=document.querySelectorAll('.nanh');
// const Email = document.querySelector('#Email');
// const anhnhahang = document.querySelector('#restaurant_image');
// const diachi = document.querySelector('#address');
// const gia = document.querySelector('#price');
// const sodienthoai = document.querySelector('#phone_number');
// const button = document.querySelector('#submit');
// const form = document.querySelector('#form');

// tennhahang.addEventListener('blur', function(){
//     checkTennhahang = blurInput(tennhahang, "Ten nha hang", 0);
// })
// Email.addEventListener('blur', function(){
//     checkEmail = blurInput(Email, "Email", 1);
// })
// anhnhahang.addEventListener('blur', function(){
//     checkAnhnhahang = blurInput(anhnhahang, "Anh", 2);
// })
// diachi.addEventListener('blur', function(){
//     checkDiaChi = blurInput(diachi, "dia chi nha hang", 3);
// })
// gia.addEventListener('blur', function(){
//     checkGia = blurInput(gia, "Gia tien", 4);
// })
// sodienthoai.addEventListener('blur', function(){
//     checkSodienthoai = blurInput(sodienthoai, "so dien thoai nha hang", 5);
// })

// focusInput(tennhahang, 0);//truyen gia tri vao ham
// focusInput(Email, 1);
// focusInput(anhnhahang, 2);
// focusInput(diachi, 3);
// focusInput(gia, 4);
// focusInput(sodienthoai, 5);

// sodienthoai.addEventListener("blur", function() {
//     const regex =/(^(09|03|07|08|05)([0-9]{8})$)/g; //bieuthucchinhquy 
//     if (regex.test(sodienthoai.value)){
//         checkSodienthoai=true;
//     }else{
//         nanh[5].textContent="số điện thoại không hợp lệ";
//         checkSodienthoai=false;
//     }
// })

// function blurInput(element, message, index) {
    
//         if (element.value==""){
//             nanh[index].textContent=`${message} không được để trống`;
//             return false;
//         } else{
//             nanh[index].textContent="";
//             return true;
//         }
    
// }


// function focusInput(element, index) { 
//     element.addEventListener('focus', function(){//them su kien cho elenment
//         nanh[index].textContent="";
//     })
// }

// button.addEventListener('click', function () {
//     if(checkTennhahang==true && checkEmail==true && checkAnhnhahang==true && checkDiaChi==true && checkGia==true && checkSodienthoai==true){
//         console.log(form)
//         form.submit();
//     }else{
//         blurInput(tennhahang, "Ten nha hang", 0);
//         blurInput(Email, "Email", 1);
//         blurInput(anhnhahang, "Anh", 2);
//         blurInput(diachi, "dia chi nha hang", 3);
//         blurInput(gia, "Gia tien", 4);
//         blurInput(sodienthoai, "so dien thoai nha hang", 5);
//     }
// })

