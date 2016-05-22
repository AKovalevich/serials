$(document).ready(function(){
    $('.grid').slick({
        dots: false,
        infinite: true,
        speed: 300,
//        slidesToShow: 1,
//        centerMode: true,
        variableWidth: true
    });

    $('.more-info-button img').click(function () {
        var $this = $(this);
        var infoBlock = $(".carousel-info-block", $this.closest('.carousel-block'));
        $(infoBlock).addClass('show');
        $('html, body').animate({
            scrollTop: $this.closest('.carousel-block').find('.block-title').offset().top
        }, 700);
    });

    $('.main-menu .menu__list .menu__item').click(function () {
        $('.main-menu .menu__list .menu__item').removeClass('menu__item--current');
        $(this).addClass('menu__item--current');
    });
    $('.info-block-menu .menu__list .menu__item').click(function () {
        $('.info-block-menu .menu__list .menu__item').removeClass('menu__item--current');
        $(this).addClass('menu__item--current');
    });
});

