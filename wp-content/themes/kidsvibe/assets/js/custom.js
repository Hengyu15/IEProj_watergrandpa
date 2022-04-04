jQuery(document).ready(function($)  {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader = $('#loader');
    var loader_container = $('#preloader');
    var scroll = $(window).scrollTop();  
    var scrollup = $('.backtotop');
    var menu_toggle = $('.menu-toggle');
    var dropdown_toggle = $('.main-navigation button.dropdown-toggle');
    var nav_menu = $('.main-navigation ul.nav-menu');
    var banner_slider = $('.banner-slider');
    var testimonial_slider = $('.testimonial-slider');
    var related_gallery_slider = $('.related-gallery-slider');

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");

/*------------------------------------------------
                BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
                MENU, STICKY MENU AND SEARCH
------------------------------------------------*/

   $('#top-menu .topbar-menu-toggle').click(function(e){
        e.preventDefault();
        $('#top-menu .wrapper').slideToggle();
        $('#top-menu').toggleClass('top-menu-active');
    });

    menu_toggle.click(function(){
        nav_menu.slideToggle();
       $('.menu-toggle').toggleClass('menu-open');
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

    $('#primary-menu .menu-item-has-children > a > svg').click(function(event) {
        event.preventDefault();
        $(this).parent().find('.sub-menu').first().slideToggle();
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('.site-header.sticky-header').fadeIn();
            if ($('.site-header').hasClass('sticky-header')) {
                $('.site-header.sticky-header').addClass('nav-shrink');
                $('.site-header.sticky-header').fadeIn();
            }
        } 
        else {
            $('.site-header.sticky-header').removeClass('nav-shrink');
        }
    });

    $('.social-menu ul li a.search').click(function(e) {
        e.preventDefault();
        $('.social-menu #search').toggleClass('search-open');
        $('.social-menu #search .search-field').focus();
    });

    $('.main-navigation ul li a.search').click(function(e) {
        e.preventDefault();
        $('.main-navigation #search').toggleClass('search-open');
        $('.main-navigation #search .search-field').focus();
    });

    /*--------------------------------------------------------------
     Keyboard Navigation
    ----------------------------------------------------------------*/
    if( $(window).width() < 768 ) {
        $('#top-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#top-menu').find('.topbar-menu-toggle').focus();
            }
        });
    }
    else {
        $( '#top-menu li:last-child' ).unbind('keydown');
    }

    $(window).resize(function() {
        if( $(window).width() < 768 ) {
            $('#top-menu').find("li").last().bind( 'keydown', function(e) {
                if( e.which === 9 ) {
                    e.preventDefault();
                    $('#top-menu').find('.topbar-menu-toggle').focus();
                }
            });
        }
        else {
            $( '#top-menu li:last-child' ).unbind('keydown');
        }
    });
    
    if( $(window).width() < 1024 ) {
        $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });
    }
    else {
        $( '#primary-menu li:last-child' ).unbind('keydown');
    }

    $(window).resize(function() {
        if( $(window).width() < 1024 ) {
            $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
                if( e.which === 9 ) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        }
        else {
            $( '#primary-menu li:last-child' ).unbind('keydown');
        }
    });

    $(document).keyup(function(e) {
        e.preventDefault();
        if (e.keyCode === 27) {
            $('#search').removeClass('search-open');
        }

        if (e.keyCode === 9) {
            $('#search').removeClass('search-open');
        }
    });

    $('.menu-toggle').on('keydown', function(e) {
        tabKey = e.keyCode === 9;
        shiftKey = e.shiftKey;
        if( $('.main-navigation').hasClass('toggled-on') ) {
            if ( shiftKey && tabKey ) {
                e.preventDefault();
                nav_menu.slideUp();
                $('.main-navigation').removeClass('toggled-on');
                $('.menu-toggle').removeClass('menu-open');
            };
        }
    });

/*------------------------------------------------
                TAB   
------------------------------------------------*/
$('.schedule-section .schedule-tab a.tab-heading').on('click', function(e){
    e.preventDefault();
    $('.schedule-section .schedule-tab a.tab-heading').removeClass('active');
    $('.schedule-section .tab-content').removeClass('active');

    $(this).addClass('active');
    if ( $('.schedule-section div.tab-content').hasClass( $(this).data('tab') ) ) {
        $('.schedule-section div.tab-content.' + $(this).data('tab') ).addClass('active');
    }

});

/*------------------------------------------------
                LIGHTBOX   
------------------------------------------------*/
$('#gallery a.gallery-view').simpleLightbox();

/*------------------------------------------------
                SKILLS VIDEO
------------------------------------------------*/
    $('#skills a.skills-play-btn').on('click', function(e) {
        e.preventDefault();
        $('#skills .skills-video-model').addClass('open');
        $('#skills .skills-video-model .mejs-play button').click();
    });
    $('#skills a.skills-close-btn').on('click', function(e) {
        e.preventDefault();
        $('#skills .skills-video-model').removeClass('open');
        $('#skills .skills-video-model .mejs-pause button').click();
    });


/*------------------------------------------------
                SLICK SLIDERS
------------------------------------------------*/
banner_slider.slick();
testimonial_slider.slick({
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

var status = $('.pagingInfo');


/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});