(function ($){
	"use strict";
    
    $(document).ready(function(){
      //preloader
      $(window).on('load', function () {
        $('#preloader').delay(500).fadeOut(500);

      });
    });
    //onscrooll sticky
    // window.onscroll = function() {myFunction()};

    // var header = document.getElementById("myHeader");
    // var sticky = header.offsetTop;
    
    // function myFunction() {
    //   if (window.pageYOffset > sticky) {
    //   header.classList.add("sticky");
    //   } else {
    //   header.classList.remove("sticky");
    //   }
    // }


    // Menu Click JS
    $('.close-menu button').on('click', function(){
      $('.main-navigation ').toggleClass('toggled');
      
    });
    $(window).scroll(function () {
      if($(window).scrollTop() > 20) {
        $(".main-header-menu").addClass('sticky');
      } else {
        $(".main-header-menu").removeClass('sticky');
      }
    });	
    
    //dark mode on
        $( ".change" ).on("click", function() {
          if( $( "body" ).hasClass( "dark-mode" )) {
              $( "body" ).removeClass( "dark-mode" );
              $( ".change" ).text( "Light" );
          } else {
              $( "body" ).addClass( "dark-mode" );
              $( ".change" ).text( "Dark" );
          }
      });


    //popup video
    if ($('.play-btn').length) {
      $('.play-btn').magnificPopup({
        type:'iframe',
        removalDelay: 260,
        mainClass: 'mfp-fade',
        src: jQuery(this).find('a').attr('href'), 
        
        });
    }


    
 

    $(document).ready(function(){
		// init Isotope
		var $grid = $('.portfolio-items').isotope({
            // options
          });
          // filter items on button click
              $('.portfolio-menu li').click(function(){
              $('.portfolio-menu li').removeClass('active');
              $(this).addClass('active');	
              });
              $('.portfolio-menu').on( 'click', 'li', function() {
              var filterValue = $(this).attr('data-filter');
            $grid.isotope({ filter: filterValue });
          });
        
    });
    
    //counter-number
    $('.counter').counterUp({
      delay: 10,
      time: 1000
      });
      
    //slick slider
    if ($('.testimonial-slider').length) {
      $('.testimonial-slider').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows:true,
        prevArrow:'<span class="prev-arrow"><i class="fas fa-long-arrow-alt-right"></i></span>',
        nextArrow:'<span class="next-arrow"><i class="fas fa-long-arrow-alt-left"></i></span>',
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
        });
  }

    //typeit
    new TypeIt(".text-type", {
      speed:200,
      loop:true,
      strings:['',],
      breakLines:false,
      }).go();  


    //   // scrollTop button
    // const toTop = document.querySelector('.to-top');

    // window.addEventListener('scroll', () => {
    // if(window.pageYOffset > 100){
    // toTop.classList.add("active");
    // }else{
    // toTop.classList.remove("active");
    // }
    // })

    
    //form validation
    var contactForm = document.forms['contact-form'];
    var warning = document.querySelector('#warning');

    if (typeof contactForm !== 'undefined') {
      contactForm.onsubmit = function(event){
        event.preventDefault();
        warning.innerHTML = 'Submitted Successfully!';
      }
    }


})(jQuery);