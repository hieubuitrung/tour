function myFunction() {
    document.body.classList.toggle("dark-mode");
    var a,b,c,i;
    a=document.querySelectorAll(".fas");
    for (i = 0; i < a.length; i++) {
        a[i].classList.toggle("dark-mode");
    }
    b=document.querySelectorAll(".destinationtour-des");
    for (i = 0; i < b.length; i++) {
        b[i].classList.toggle("dark-mode");
    }
    document.querySelector(".container-navbar").classList.toggle("dark-mode");
    c=document.querySelectorAll(".detailtour-des");
    for (i = 0; i < c.length; i++) {
        c[i].classList.toggle("dark-mode");
    }
}