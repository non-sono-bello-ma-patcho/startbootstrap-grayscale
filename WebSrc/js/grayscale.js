import 'jquery.easing';
import 'bootstrap/js/dist/scrollspy';
import 'bootstrap/js/dist/collapse';

/* SCSS */
import '../scss/grayscale.scss';


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

/* Ajax */

/* Domani faccio refactoring */
$(document).ready(function (){
    $('#suUsername').keyup(function () {
        var currentUsername = $(this).val().toLowerCase();
        if(currentUsername!==""){
            $.get("php/rest.php", { param : currentUsername, op : "check" },(response)=>{
                let data = JSON.parse(response);
                $('#suUsername').toggleClass("is-invalid", data!=null).toggleClass("is-valid", data==null);
                $('#usernamecol').toggleClass("mb-0", data!=null).toggleClass("mb-3", data==null); // prevent form from warp
            });
        }
        // remove validation feedback if text is empty
        else
            $(this).toggleClass("is-invalid", false).toggleClass("is-valid", false);
    });
    $('#suEmail').keyup(function () {
        var re = /([^\._]+@[a-z]+.(com|it|en|es))/;
        var email = $(this).val();
        if (email !== ""){
            $(this).toggleClass("is-invalid", !re.test(email)).toggleClass("is-valid", re.test(email));
            $('#emailcol').toggleClass("mb-0", re.test(email)).toggleClass("mb-3", re.test(email));
        }
        else
            $(this).toggleClass("is-invalid", false).toggleClass("is-valid", false);
    });
    $('#suPassword').keyup(function () {
        var re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&.]).{8,10}$/;
        var email = $(this).val();
        if (email !== ""){
            $(this).toggleClass("is-invalid", !re.test(email)).toggleClass("is-valid", re.test(email));
            $('#pwcol').toggleClass("mb-0", re.test(email)).toggleClass("mb-3", re.test(email));
        }
        else
            $(this).toggleClass("is-invalid", false).toggleClass("is-valid", false);
    });
    $('#suConfirmPassword').keyup(function () {
        var pw = $('#suPassword').val();
        var conf =$(this).val();
        if (pw !== ""){
            $(this).toggleClass("is-invalid", pw!==conf).toggleClass("is-valid", pw===conf);
            $('#pwccol').toggleClass("mb-0", pw!==conf).toggleClass("mb-3", pw===conf);
        }
        else
            $(this).toggleClass("is-invalid", false).toggleClass("is-valid", false);
    });
});
