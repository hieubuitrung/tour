document.addEventListener("DOMContentLoaded", function() {
    const btnCancelTour = document.querySelectorAll('#cancel-tour');
    // nếu btnCancelTour tồn tại thì chạy code
    btnCancelTour.forEach(function(item) {
        if (item !== null) {
            item.addEventListener("click", function(e) {
                const confirmCancelTour = confirm("Bạn có chắc chắn muốn hủy tour ?");
                if (!confirmCancelTour) {
                    // hủy hành vi mặc định của thẻ a
                    e.preventDefault();
                }
            })
        }
    })
})