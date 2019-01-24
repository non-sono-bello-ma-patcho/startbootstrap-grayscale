(function($) {
  "use strict"; // Start of use strict
  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
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

/* Ajax */
$(document).ready(function (){
    $('#suUsername').keyup(function () {
        var currentUsername = $(this).val().toLowerCase();
        $.post("php/formUtility.php", { username : currentUsername },function(data){
            $('#suUsername').toggleClass("is-invalid", data!=="").toggleClass("is-valid", data==="");
            $('#usernamecol').toggleClass("mb-0", data!="").toggleClass("mb-3", data==="");
        });
    });
});

function checkuser(username) {
    var target = "usernameinfo";
    var doc = "php/usercheck.php?q="+username+"&f=username";
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", doc, true);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //document.getElementById(target).className = this.responseText;
            if( this.responseText.toString() === 'inputerror')
                $('#'+target).toggleClass('inputerror', true).toggleClass('inputsuccess', false);
            if( this.responseText.toString() === 'inputsuccess')
                $('#'+target).toggleClass('inputsuccess', true).toggleClass('inputerror', false);
        }
    };
    xhttp.send();
}