var user = document.querySelector('.user');
var userMenu = document.querySelector('.user .user-menu');

user.addEventListener('click', function() {
    userMenu.classList.toggle('active');
})