// passive listener
jQuery.event.special.touchstart = {
  setup: function( _, ns, handle ){
    this.addEventListener("touchstart", handle, { passive: true });
  }
};

gsap.registerPlugin(ScrollTrigger);
// let foxBox = document.querySelector('body.home .site-main .intro'); // check if foxBox exists
// if (foxBox) {
  gsap.to('.fox-in-a-box img', {
    scrollTrigger: {
      trigger: '.intro-title'
    }, // start the animation when ".box" enters the viewport (once)

    // x: -500
    x: 0,
    y: 0,
    duration: 1
  });
// };

gsap.to('.newsletter-foxy', {
  scrollTrigger: {
    trigger: '.foxy-news'
  }, // start the animation when ".box" enters the viewport (once)

  // x: -500
  x: 500,
  y: 200,
  duration: 1
});

const heroSlides = new Swiper('.hero-slides', {
  slidesPerView: 1,
  loop: false,
  speed: 500,
  // autoplay: {
  //   delay: 5000,
  //   disableOnInteraction: true,
  // },
  navigation: {
    nextEl: '.image-text-button-next',
    prevEl: '.image-text-button-prev',
  },
  pagination: {
    el: '.slide-pagination',
    clickable: 'true'
  },
  effect: 'fade',
  fadeEffect: {
    crossFade: true
  },
});

const homeNewsSlides = new Swiper('.news-scroll', {
  slidesPerView: 1,
  loop: false,
  speed: 500,
  autoplay: {
    delay: 5000,
    disableOnInteraction: true,
  },
  navigation: {
    nextEl: '.button-next',
    prevEl: '.button-prev',
  },
  pagination: {
    el: '.slide-pagination',
    clickable: 'false'
  },
  effect: 'fade',
  fadeEffect: {
    crossFade: true
  },
});

const gameGallerySlides = new Swiper('.game-gallery', {
  slidesPerView: 1,
  loop: false,
  speed: 500,
  autoplay: {
    delay: 7000,
    disableOnInteraction: true,
  },
  navigation: {
    nextEl: '.gallery-next',
    prevEl: '.gallery-prev',
  },
  effect: 'fade',
  fadeEffect: {
    crossFade: true
  },
});

// rolling start!
$(document).ready(function($){
  if ('ontouchstart' in window || 'ontouch' in window) {
    $('body').addClass('touch');
  }

  // hamburger action
  $('.hamburger').click(function(){
    $(this).toggleClass('is-active');
    $('body').toggleClass('menu-active');
  });

  var galleryExists = $('.gallery').length;

  if (galleryExists) {
    $('.gallery').each(function() { // the containers for all your galleries
      $(this).magnificPopup({
        delegate: 'a', // the selector for gallery item
        type: 'image',
        gallery: {
          enabled: true,
          navigateByImgClick: true,
          preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
          tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
          /*titleSrc: function(item) {
            return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
          }*/
        }
      });
    });
  };

  $('.modal-video').magnificPopup({
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

  $('.play-trailer').magnificPopup({
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false,

    callbacks: {
      open: function() {
        // Will fire when this exact popup is opened
        // this - is Magnific Popup object
        var vid = $('.screen-one').find('video');
        if (vid.length > 0) {
          $(vid)[0].pause();
        }
      },
      close: function() {
        // Will fire when popup is closed
        var vid = $('.screen-one').find('video');
        if (vid.length > 0) {
          $(vid)[0].play();
        }
      }
    }
  });

  // Smooth scroll internal hash links
  // Select all links with hashes
  $('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
});