
(function($){
    'use script';
/*---canvas menu activation---*/
    $('.canvas_open').on('click', function(){
        $('.offcanvas_menu_wrapper,.off_canvars_overlay, .mobile-menu-area,').addClass('active')
    });
    
    $('.canvas_close,.off_canvars_overlay').on('click', function(){
        $('.offcanvas_menu_wrapper,.off_canvars_overlay, .mobile-menu-area').removeClass('active')
    });
    $('.menu-toggle').on('click', function(){
        $('.mobile-menu').addClass('active')
    });
    $('.off_canvars_overlay').on('click', function(){
        $('.main-navigation').removeClass('toggled')
    });

    //has-sub-menu
    $('.has-children').on('click', function(){
        $('.has-sub-menu').addClass('active1')
    });
    
    $('.has-children').on('click', function(){
        $('.has-sub-menu').removeClass('active1')
    });

        /*---Off Canvas Menu---*/
    var $offcanvasNav = $('.offcanvas_main_menu'),
    $offcanvasNavSubMenu = $offcanvasNav.find('.sub-menu');
    $offcanvasNavSubMenu.parent().prepend('<span class="menu-expand"><a href="#"><i class="fas fa-angle-down"></i></a></span>');

    $offcanvasNavSubMenu.slideUp();

    $offcanvasNav.on('click', 'li a, li .menu-expand', function(e) {
    var $this = $(this);
    if ( ($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand')) ) {
        e.preventDefault();
        if ($this.siblings('ul:visible').length){
            $this.siblings('ul').slideUp('slow');
        }else {
            $this.closest('li').siblings('li').find('ul:visible').slideUp('slow');
            $this.siblings('ul').slideDown('slow');
        }
    }
    if( $this.is('a') || $this.is('span') || $this.attr('clas').match(/\b(menu-expand)\b/) ){
    $this.parent().toggleClass('menu-open');
    }else if( $this.is('li') && $this.attr('class').match(/\b('menu-item-has-children')\b/) ){
    $this.toggleClass('menu-open');
    }
    });
  
}(jQuery));