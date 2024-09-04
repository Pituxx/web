document.addEventListener('DOMContentLoaded', function () {
    var popups = document.querySelectorAll('.popup');
    var showPopupBtns = document.querySelectorAll('.show-popup-btn');
    var closeBtns = document.querySelectorAll('.close');
    var navigateBtns = document.querySelectorAll('.navigate-btn');

    showPopupBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var popupId = btn.getAttribute('data-popup');
            var popup = document.getElementById(popupId);
            popup.style.display = 'block';
        });
    });

    closeBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var popup = btn.closest('.popup');
            popup.style.display = 'none';
        });
    });
   

    window.addEventListener('click', function (event) {
        popups.forEach(function (popup) {
            if (event.target == popup) {
                popup.style.display = 'none';
            }
        });
    });

    navigateBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var sectionId = btn.getAttribute('data-section');
            var section = document.getElementById(sectionId);
            section.scrollIntoView({behavior: 'smooth'});
        });
    });
});

goToFormBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
        var sectionId = btn.getAttribute('data-section');
        var section = document.getElementById(sectionId);
        section.scrollIntoView({behavior: 'smooth'});

        var popup = btn.closest('.popup');
        popup.style.display = 'none';
    });
});

const menuToggle = document.querySelector('[data-toggle="menu"]');
const navLinks = document.querySelector('.nav_links');

menuToggle.addEventListener('click', () => {
  navLinks.classList.toggle('show');
});

// Cierre automático del menú al hacer clic fuera de él
document.addEventListener('click', (event) => {
  if (!event.target.closest('.nav_links') && !event.target.closest('.nav_menu')) {
    navLinks.classList.remove('show');
  }
});





