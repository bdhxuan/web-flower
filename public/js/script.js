// $(window).on('load', function(event) {
//     $('body').removeClass('preloading');
//     $('.load').delay(1000).fadeOut('fast');
// });

$(document).ready(function() {
    $('.toast').toast('show');
});

function loader() {
    document.querySelector('.loader-container').classList.add('fade-out');
}

function fadeOut() {
    setInterval(loader, 1000);
}

window.onload = fadeOut;