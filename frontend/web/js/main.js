var slideLeft = new Menu({
    wrapper: '#o-wrapper',
    type: 'slide-left',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
});
var slideLeftBtn = document.querySelector('#c-button--slide-left');
slideLeftBtn.addEventListener('click', function (e) {
    e.preventDefault;
    slideLeft.open();
});
$(".softArrow").click(function () {
    $(".spoggle").toggleClass("highlight");
});
$(document).ready(function ($) {
// background changer
    $('.carousel').carousel();
    // slim scroll changer
    $('#miniscroll').slimScroll({height: '150px'});
    // onclick addclass removeclass
    $('.sub_navigation > li').on('click', function () {
        $(this).addClass('activa').siblings().removeClass('activa');
    });
    $('.navigation > li').on('click', function () {
        $(this).addClass('active').siblings().removeClass('active');
    });
    $('.c-menu__items > li').on('click', function () {
        $(this).addClass('active').siblings().removeClass('active');
    });
    $(".menusub a").hover(
            function () {
                $(this).next().addClass("result_hover");
            },
            function () {
                $(this).next().removeClass("result_hover");
            }
    );
    $('#form-signup').submit(function () {
        if ($('#signupform-password_repeat').val() == $('#signupform-password').val()) {
            $('#error_signup').html('');
            return true;
        } else {
            $('#error_signup').html('*Confirm password not match');
            return false;
        }

    });
});

