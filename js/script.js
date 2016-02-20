/**
 * Run Javascript for the mobile collapse menu.
 */
jQuery(document).ready(function($){
  // Add in the arrow element.
  $('header nav > h2').append('<span id="menu-arrow"></span>');

  // Turn on the menu listener.
  $('header nav > h2').click(function() {
    $('#menu-arrow').toggleClass('menu-open');
    $('header nav ul').slideToggle('fast');
  });

  // Solve the disappearing menu bug.
  if ($(window).width() <= 580) {
    $('header nav ul').attr('style','');
    $('header nav > h2').removeClass('visually-hidden');
  } else {
    $('header nav > h2').addClass('visually-hidden');
  }
  $(window).resize(function() {
    if ($(window).width() <= 580) {
      $('header nav ul').attr('style','');
      $('header nav > h2').removeClass('visually-hidden');
    } else {
      $('header nav > h2').addClass('visually-hidden');
    }
  });
});
