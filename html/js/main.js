$(document).ready(function(){
    $('.grid').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true,
        dots: false
    });

    $('.play-button').click(function () {
        var $this = $(this);
        var infoBlock = $(".carousel-info-block", $this.closest('.carousel-block'));
        $(infoBlock).addClass('show');
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

