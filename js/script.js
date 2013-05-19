/**
 * Run Javascript for the mobile collapse menu.
 */
jQuery(document).ready(function($){
  // Add in the arrow element.
  $('#main-nav > h2').append('<span id="menu-arrow"></span>');

  // Turn on the menu listener.
  $('#main-nav > h2').click(function() {
    $('#menu-arrow').toggleClass('menu-open');
    $('#main-menu').slideToggle('fast');
  });

  // Solve the disappearing menu bug.
  $(window).resize(function() {
    if ($(window).width() <= 580) {
      $('#main-menu').attr('style','');
    };
  });

  // Initialize fastclick for mobile devices.
  window.addEventListener('load', function() {
    FastClick.attach(document.body);
  }, false);
});
