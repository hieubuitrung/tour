function checkform(){
    var tenkhachsan=document.update_hotel.hotel_name.value;
    var diachi=document.update_hotel.address.value;
    var giatien=document.update_hotel.price.value;
    var sdt=document.update_hotel.phone_number.value;
    var hinhanh=document.update_hotel.hinhanh.value;
    if(tenkhachsan==null||tenkhachsan==""){
        alert("Vui lòng nhập tên khách sạn");
        return false;
    }else if(diachi==null||diachi==""){
        alert("Vui lòng nhập địa chỉ khách sạn");
        return false;
    }else if(giatien==null||giatien==""){
        alert("Vui lòng nhập giá khách sạn");
        return false;
    }else if(sdt==null||sdt==""){
        alert("Vui lòng nhập số liên hệ khách sạn");
        return false;
    }else if(sdt.length!=10){
        alert("Số điện thoại phải có 10 chữ số")
        return false
    }else if(hinhanh==null||hinhanh==""){
        alert("Vui lòng không để trống mục hình ảnh");
        return false;
    }
}