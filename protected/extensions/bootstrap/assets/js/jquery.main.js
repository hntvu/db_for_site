(function ($) {

    $.fn.menumaker = function (options) {

        var cssmenu = $(this), settings = $.extend({
            title: "Menu",
            format: "dropdown",
            sticky: false
        }, options);

        return this.each(function () {
            cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
            $(this).find("#menu-button").on('click', function () {
                $(this).toggleClass('menu-opened');
                var mainmenu = $(this).next('ul');
                if (mainmenu.hasClass('open')) {
                    mainmenu.hide().removeClass('open');
                }
                else {
                    mainmenu.show().addClass('open');
                    if (settings.format === "dropdown") {
                        mainmenu.find('ul').show();
                    }
                }
            });

            cssmenu.find('li ul').parent().addClass('has-sub');

            multiTg = function () {
                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function () {
                    $(this).toggleClass('submenu-opened');
                    if ($(this).siblings('ul').hasClass('open')) {
                        $(this).siblings('ul').removeClass('open').hide();
                    }
                    else {
                        $(this).siblings('ul').addClass('open').show();
                    }
                });
            };

            if (settings.format === 'multitoggle')
                multiTg();
            else
                cssmenu.addClass('dropdown');

            if (settings.sticky === true)
                cssmenu.css('position', 'fixed');

            resizeFix = function () {
                if ($(window).width() > 768) {
                    cssmenu.find('ul').show();
                }

                if ($(window).width() <= 768) {
                    cssmenu.find('ul').hide().removeClass('open');
                }
            };
            resizeFix();
            return $(window).on('resize', resizeFix);

        });
    };
})(jQuery);


$(document).ready(function () {

    $("#cssmenu").menumaker({
        title: "Trung tâm tin học Sa Đéc",
        format: "multitoggle"
    });

    $('.sliderImages').bxSlider({
        // GENERAL
        mode: 'fade', //options: 'horizontal', 'vertical', 'fade'
        speed: 1000,
        captions: true,
        responsive: true,
        useCSS: true,
        adaptiveHeight: true,
        // PAGER
        pager: false,
        pagerType: 'full',
        pagerShortSeparator: ' / ',
        pagerSelector: null,
        buildPager: null,
        pagerCustom: null,
        // AUTO
        auto: true,
        pause: 4000,
        autoStart: true,
        autoDirection: 'next',
        autoHover: true,
        autoDelay: 0,
        autoSlideForOnePage: false,
    });
    
    $('img').addClass('img-responsive');
    
    $('.docSlider').bxSlider({
        // GENERAL
        mode: 'vertical', //options: 'horizontal', 'vertical', 'fade'
        slideSelector: '',
        infiniteLoop: true,
        hideControlOnEnd: false,
        speed: 15000,
        easing: null,
        slideMargin: 20,
        startSlide: 0,
        randomStart: false,
        captions: false,
        ticker: true,
        tickerHover: true,
        adaptiveHeight: false,
        adaptiveHeightSpeed: 500,
        video: false,
        useCSS: false,
        preloadImages: 'visible',
        responsive: true,
        slideZIndex: 50,
        wrapperClass: 'bx-wrapper',
        // TOUCH
        touchEnabled: true,
        swipeThreshold: 50,
        oneToOneTouch: true,
        preventDefaultSwipeX: true,
        preventDefaultSwipeY: false,
        // PAGER
        pager: true,
        pagerType: 'full',
        pagerShortSeparator: ' / ',
        pagerSelector: null,
        buildPager: null,
        pagerCustom: null,
        // CONTROLS
        controls: false,
        nextText: 'Next',
        prevText: 'Prev',
        nextSelector: null,
        prevSelector: null,
        autoControls: false,
        startText: 'Start',
        stopText: 'Stop',
        autoControlsCombine: false,
        autoControlsSelector: null,
        // AUTO
        auto: false,
        pause: 4000,
        autoStart: true,
        autoDirection: 'next',
        autoHover: false,
        autoDelay: 0,
        autoSlideForOnePage: false,
        // CAROUSEL
        minSlides: 6,
        maxSlides: 6,
        moveSlides: 1,
        slideWidth: 0,
    });

});

