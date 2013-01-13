/**
 * Define a function for the mobile collapse menu.
 */
jQuery(document).ready(function($){
  // Add in the arrow element.
  $('#main-nav > h2').append('<span id="menu-arrow"></span>');

  // Turn on the menu listener.
  $('#main-nav > h2').click(function() {
    $('#menu-arrow').toggleClass('menu-open');
    $('#main-menu').slideToggle('fast');
  });
});
