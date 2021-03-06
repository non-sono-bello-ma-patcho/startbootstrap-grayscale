import 'jquery.easing';
import 'bootstrap/js/dist/scrollspy';
import 'bootstrap/js/dist/collapse';
import 'bootstrap/js/dist/carousel';

import './components/searchForm';
import './components/signupForm';
import './common';

/* SCSS */
import '../scss/herschel.scss';
import {getCookie} from "./common";

$('.carousel').carousel({
  interval : false
});


(function($) {
  "use strict"; // Start of use strict
  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 70)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 100
  });

  // Collapse Navbar
  var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-shrink");
    } else {
      $("#mainNav").removeClass("navbar-shrink");
    }
  };
  // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);

})(jQuery); // End of use strict

$('#loglink').click(function () {
    $('#loginModal').modal('hide');
});

$(document).on("load", function () {
    $('input,textarea').attr('autocomplete', 'off');
    // load placeholder
});

// show and hide mini-form
$(window).scroll((e)=>{
  let wrap = $('#small_form_wrapper');
  if ($(window).scrollTop() > $('#big_form_wrapper').offset().top+20 && !$('.fixed-form').is(':visible')) {
    $('.carousel').carousel('next');
  } else if($(window).scrollTop() < $('#big_form_wrapper').offset().top+20 && $('.fixed-form').is(':visible')){
    $('.carousel').carousel('prev');
  }
});
