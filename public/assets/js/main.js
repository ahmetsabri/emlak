// Fancybox Fix
$.fancybox.defaults.backFocus = false;

// Check If Safari
let isSafari = navigator.vendor.match(/apple/i) &&
    !navigator.userAgent.match(/crios/i) &&
    !navigator.userAgent.match(/fxios/i) &&
    !navigator.userAgent.match(/Opera|OPT\//);

if (isSafari) {
}
else {
    // Smooth Scroll JS
    SmoothScroll({
        animationTime: 1000,
        stepSize: 100,
        accelerationDelta: 100,
        accelerationMax: 2,
    });
}

// Smart Menu
var current_scroll_top = $(window).scrollTop();
if (current_scroll_top >= 50) $('header').addClass('hidden is-fixed');
else $('header').removeClass('hidden is-fixed');

var last_scroll_top = 0, scrolling_size = 30;
$(window).scroll(function () {
    var scroll_top = $(this).scrollTop();
    if (scroll_top > last_scroll_top) {
        $('.sticky').css('top', '30px');
        scrolling_size = 30;
        if (scroll_top > 50) $('header').addClass('hidden is-fixed');
    } else {
        $('.sticky').css('top', $('header').height() + 30 );
        scrolling_size = $('header').height() + 30;
        if (scroll_top > 50) {
            $('header').removeClass('hidden');
            $('header').addClass('is-fixed');
        } 
        else $('header').removeClass('is-fixed hidden');
    }
    last_scroll_top = scroll_top;
});

// Table Wrap
if( $('table').length ) {  $('table').each(function() { $(this).wrap('<div class="table"></div>'); }); }

// Mobile Menu Trigger
$('.mobile-trigger').click(function() {
    if( !$(this).hasClass('active') ) {
        $(this).addClass('active');
        $('body').css('overflow-y', 'hidden');
        $('header > .container .navigation .menu').show();
        $('header').addClass('white');
    }
    else {
        $(this).removeClass('active');
        $('body').css('overflow-y', 'visible');
        $('header > .container .navigation .menu').hide();
        $('header').removeClass('white');
    }
});

// Menu Trigger Span
if( $(window).width() <= 1200 ) {
    $('header .container .navigation .menu li.has-child > span.trigger').remove();
    $('header .container .navigation .menu li.has-child > a').after('<span class="trigger"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"><path d="M47.55,20H32.45A2.44,2.44,0,0,1,30,17.55V2.45A2.44,2.44,0,0,0,27.55,0h-5.1A2.44,2.44,0,0,0,20,2.45v15.1A2.44,2.44,0,0,1,17.55,20H2.45A2.44,2.44,0,0,0,0,22.45v5.1A2.44,2.44,0,0,0,2.45,30h15.1A2.44,2.44,0,0,1,20,32.45v15.1A2.44,2.44,0,0,0,22.45,50h5.1A2.44,2.44,0,0,0,30,47.55V32.45A2.44,2.44,0,0,1,32.45,30h15.1A2.44,2.44,0,0,0,50,27.55v-5.1A2.44,2.44,0,0,0,47.55,20Z"/></svg></span>')
}

$(document).on('click', 'header>.container .navigation .menu>li.has-child> span.trigger', function() {
    if( !$(this).hasClass('active') ) {
        $(this).addClass('active');
        $(this).next('.sub-menu').show();
    }
    else {
        $(this).removeClass('active');
        $(this).next('.sub-menu').hide();
    }
});

$(document).on('mouseenter', '.portfolio-item .thumbnail .fields span', function() {
    let index = $(this).index();
    let parent = $(this).closest('.thumbnail');

    console.log(parent.find('.images').children('img'))
    parent.find('.images').children('img').removeClass('active');
    parent.find('.images').children('img').eq(index).addClass('active');

    parent.find('.dots').children('span').removeClass('active');
    parent.find('.dots').children('span').eq(index).addClass('active');
});

$(document).on('mouseleave', '.portfolio-item .thumbnail .fields span', function() {
    let parent = $(this).closest('.thumbnail');

    parent.find('.images').children('img').removeClass('active');
    parent.find('.images').children('img').eq(0).addClass('active');

    parent.find('.dots').children('span').removeClass('active');
    parent.find('.dots').children('span').eq(0).addClass('active');
});

// Comment Star Change
$(document).on('input', '#comment-range', function() {
    $('#slider_value').html( $(this).val() );
    $('.comment-popup .wrapper .form-field .form .custom-range .star').removeClass('score--0 score--5 score--10 score--15 score--20 score--25 score--30 score--35 score--40 score--45 score--50');
    $('.comment-popup .wrapper .form-field .form .custom-range .star').addClass('score--' + ( $(this).val() * 10 ))
});

// Portfolio Change
$('.currency-change').on('change', function() {
    $('.form .item.currency .currency-value, .form .item .currency .currency-value').html( $(this).find(':selected').data('currency') )
});