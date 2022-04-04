jQuery(function($) {

    /* -----------------------------------------
    Navigation
    ----------------------------------------- */
    $('#nav-icon').click(function() {
        $(this).toggleClass('open');
    });


    /* -----------------------------------------
    Search
    ----------------------------------------- */
    var searchModalButton = $('#search-modal-btn');
    var searchModal = $('.search-modal');
    var searchModalCloseButton = $('.search-modal_close-btn');

    searchModalButton.on('click', function(e) {
        e.preventDefault();
        searchModal.addClass('search-modal-open');
        $('body').addClass('search-modal-opened');
        setTimeout(function() {
            searchModalCloseButton.focus();
        }, 300);
    });

    searchModalCloseButton.on('click', function() {
        searchModal.removeClass('search-modal-open');
        $('body').removeClass('search-modal-opened');
        searchModalButton.focus();
    });
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape') {
            searchModal.removeClass('search-modal-open');
            $('body').removeClass('search-modal-opened');
        }
    });


    /* -----------------------------------------
    Keyboard Navigation
    ----------------------------------------- */
    $(window).on('load resize', function() {
        if ($(window).width() < 1200) {
            $('.main-navigation').find("li").last().bind('keydown', function(e) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        } else {
            $('.main-navigation').find("li").unbind('keydown');
        }
    });

    var primary_menu_toggle = $('#masthead .menu-toggle');
    primary_menu_toggle.on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;

        if (primary_menu_toggle.hasClass('open')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.main-navigation').toggleClass('toggled');
                primary_menu_toggle.removeClass('open');
            };
        }
    });

    $('.search-modal').find(".search-submit").bind('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        if (tabKey) {
            e.preventDefault();
            $('.search-modal_close-btn').focus();
        }
    });

    $('.search-modal_close-btn').on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;
        if ($('body').hasClass('search-modal-opened')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('body').find('.search-modal').removeClass('search-modal-open');
                $('body').removeClass('search-modal-opened');
                $('#search-modal-btn').focus();
            }
        }
    });


    /* -----------------------------------------
    Counter
    ----------------------------------------- */
    if ($('#educateup_counter_section').length) {
        var counted = 0;
        $(window).scroll(function() {
            var oTop = $('#educateup_counter_section').offset().top - window.innerHeight;
            if (counted == 0 && $(window).scrollTop() > oTop) {
                $('.count').each(function() {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                        countNum: countTo
                    }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                        }
                    });
                });
                counted = 1;
            }
        });
    }

    /* -----------------------------------------
     Scroll top
     ----------------------------------------- */
    var scrollTop = $('.top-link');

    $(window).scroll(function() {
        if ($(this).scrollTop() > 350) {
            scrollTop.addClass('top-link-show');
        } else {
            scrollTop.removeClass('top-link-show');
        }
    });

    scrollTop.on('click', function(e) {
        e.preventDefault();
        window.scroll({ top: 0, left: 0, behavior: 'smooth' });
    });

});