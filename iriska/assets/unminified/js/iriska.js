jQuery(document).ready(function($) {
	function iriska_body_overflow_hidden() {
		$('body').addClass('iriska-overflow-hidden');
	}

	function iriska_body_overflow_visible() {
		$('body').removeClass('iriska-overflow-hidden');
	}

	function iriska_overlay_remove() {
		$('.iriska-overlay').remove();
	}

	// Fixed Buttons
		setTimeout( function() {
			$('.iriska-fixed-button-wrapper').addClass('iriska-fixed-button-wrapper-transform');
			$('.iriska-fixed-button').addClass('iriska-fixed-button-transform');
		}, 2000);

	// Comments and Sidebar
    function iriska_comments() {
      $('.iriska-fixed-button').removeClass('iriska-fixed-button-transform');
      $('.iriska-comment-area-wrapper').addClass('iriska-comment-area-open');
      $('body').append('<span class="iriska-overlay"></span>');
      iriska_body_overflow_hidden();
    }
		$('.iriska-fixed-button-wrapper').on('click', '.iriska-comment-open-button', function() {
			iriska_comments();
		});

    // Open comments if the address bar has id "comment"
    if ( window.location.href.indexOf('#comment') != -1 ) {
      iriska_comments();
    }

		$('.iriska-fixed-button-wrapper').on('click', '.iriska-sidebar-open-button', function() {
			$('.iriska-fixed-button').removeClass('iriska-fixed-button-transform');
			$('.iriska-sidebar-wrapper').addClass('iriska-sidebar-wrapper-open');
			$('body').append('<span class="iriska-overlay"></span>');
			iriska_body_overflow_hidden();
		});

		$('body').on('click', '.iriska-overlay', function() {
			iriska_body_overflow_visible();
			iriska_overlay_remove();
			$('.iriska-comment-area-wrapper').removeClass('iriska-comment-area-open');
			$('.iriska-sidebar-wrapper').removeClass('iriska-sidebar-wrapper-open');
	  	$('.iriska-fixed-button').addClass('iriska-fixed-button-transform');
		});

		$('body').on('click', '.iriska-close-button-comment', function() {
			iriska_body_overflow_visible();
			iriska_overlay_remove();
			$('.iriska-comment-area-wrapper').removeClass('iriska-comment-area-open');
	  	$('.iriska-fixed-button').addClass('iriska-fixed-button-transform');
		});

		$('body').on('click', '.iriska-close-button-sidebar', function() {
			iriska_body_overflow_visible();
			iriska_overlay_remove();
			$('.iriska-sidebar-wrapper').removeClass('iriska-sidebar-wrapper-open');
	  	$('.iriska-fixed-button').addClass('iriska-fixed-button-transform');
		});

		$('body').keyup(function(e) {
	    if (e.keyCode == 27) {
	    	iriska_body_overflow_visible();
				iriska_overlay_remove();
				$('.iriska-comment-area-wrapper').removeClass('iriska-comment-area-open');
				$('.iriska-sidebar-wrapper').removeClass('iriska-sidebar-wrapper-open');
	    	$('.iriska-fixed-button').addClass('iriska-fixed-button-transform');
	    }
	  });

  // Menu
    $('.iriska-open-menu-button-wrapper').on('click', function() {
    	$('.iriska-main-navigation-wrapper').addClass('iriska-main-navigation-visible');
    	iriska_body_overflow_hidden();
    });

    $('.iriska-close-button-menu').on('click', function() {
    	$('.iriska-main-navigation-wrapper').removeClass('iriska-main-navigation-visible');
    	iriska_body_overflow_visible();
    });

    $('body').keyup(function(e) {
      if (e.keyCode == 27) {
      	$('.iriska-main-navigation-wrapper').removeClass('iriska-main-navigation-visible');
    		iriska_body_overflow_visible();
      }
    });

    // Correct the position of a submenu when it is hidden outside the browser window
  	$('.iriska-site-menu .menu-item-has-children').mouseleave( function() {
    	var submenu = $(this).children('.sub-menu:first');
  		$(submenu).removeClass('iriska-menu-item-change-position');
  		$(submenu).css({
        '-webkit-transform' : 'none',
        '-moz-transform' : 'none',
        '-ms-transform' : 'none',
        '-o-transform' : 'none',
        'transform' : 'none'
      });
  	});

    $('.iriska-site-menu .menu-item-has-children').hover( function() {
    	var width_screen = $(window).width();
    	var height_screen = $(window).height();
    	var submenu = $(this).children('.sub-menu:first');
      var submenu_position = $(submenu).offset();
      var scroll_top = $(window).scrollTop();
      var submenu_width = $(submenu).outerWidth();
      var submenu_height = $(submenu).outerHeight();
      var new_position_left = width_screen - (submenu_position.left + submenu_width);
      var new_position_top = Math.round(height_screen + scroll_top - (submenu_position.top + submenu_height));

  		if ( new_position_left < 0 ) {
  			$(submenu).addClass('iriska-menu-item-change-position');
  		}

  		if ( new_position_top < 0 ) {
        $(submenu).css({
          '-webkit-transform' : 'translateY(' + new_position_top + 'px)',
          '-moz-transform' : 'translateY(' + new_position_top + 'px)',
          '-ms-transform' : 'translateY(' + new_position_top + 'px)',
          '-o-transform' : 'translateY(' + new_position_top + 'px)',
          'transform' : 'translateY(' + new_position_top + 'px)'
        });
      }
  	});

    // Go to the next page
    $('body').on('click', '.iriska-site-menu .iriska-open-sub-menu-button-wrapper', function() {
      var item_parent = $(this).parent();
      $(item_parent).prevAll('.menu-item').addClass('iriska-hide-menu-item');
      $(item_parent).nextAll('.menu-item').addClass('iriska-hide-menu-item');
      $(item_parent).addClass('iriska-active-menu-item');
      $(this).nextAll('.sub-menu').addClass('iriska-sub-menu-open iriska-menu-animation');
      $('.iriska-sub-menu-open').last().prevAll('a, .iriska-open-sub-menu-button-wrapper').addClass('iriska-hide-menu-item iriska-menu-item-additional-style');

      var menu_item_text = $('.iriska-sub-menu-open').last().prevAll('a').text();
      $('.iriska-current-menu-item-text').html( menu_item_text );
      if ( $('.show-menu-item').length >= 1) {
        $('.close-menu-button').addClass('close-button-visible');
      } else {
        $('.close-menu-button').removeClass('close-button-visible');
      }

      if ( menu_item_text ) {
        $('.iriska-back-button-menu-wrapper, .iriska-current-menu-item-text-wrapper').addClass('iriska-visible-menu-controls');
      } else {
        $('.iriska-back-button-menu-wrapper, .iriska-current-menu-item-text-wrapper').removeClass('iriska-visible-menu-controls');
      }
    });

    // Return to the previous page
    $('body').on('click', '.iriska-main-navigation .iriska-back-button-menu', function() {
      var last_item = $('.iriska-sub-menu-open').last();
      var last_item_parent = $('.iriska-sub-menu-open').last().parent();
      $(last_item).prevAll('a, .iriska-open-sub-menu-button-wrapper').removeClass('iriska-hide-menu-item iriska-menu-item-additional-style');
      $(last_item_parent).prevAll('.menu-item').removeClass('iriska-hide-menu-item');
      $(last_item_parent).nextAll('.menu-item').removeClass('iriska-hide-menu-item');
      $(last_item_parent).removeClass('iriska-hidden-menu-item iriska-active-menu-item');
      $(last_item).removeClass('iriska-sub-menu-open iriska-menu-animation');
      
      var menu_item_text = $('.iriska-sub-menu-open').last().prevAll('a').text();
      if ( menu_item_text ) {
        $('.iriska-back-button-menu-wrapper, .iriska-current-menu-item-text-wrapper').addClass('iriska-visible-menu-controls');
      } else {
        $('.iriska-back-button-menu-wrapper, .iriska-current-menu-item-text-wrapper').removeClass('iriska-visible-menu-controls');
      }
      $('.iriska-current-menu-item-text').html( menu_item_text );
    });

  // Header
    // Add indent to content for the first time after loading
    var iriska_header_height = $('.iriska-site-fixed-header .iriska-site-header').outerHeight();
    $('.iriska-site-fixed-header .iriska-site-content').css('margin-top', iriska_header_height);
    // Add indent to content after changing browser window
    $(window).resize(function() {
      var iriska_header_height = $('.iriska-site-header').outerHeight();
      $('.iriska-site-fixed-header .iriska-site-content').css('margin-top', iriska_header_height);
    });

    $(window).scroll(function() {
      if ($(document).scrollTop() > 200) {
        $('.iriska-site-fixed-header .iriska-site-header').addClass('iriska-small-fixed-header');
      } else {
        $('.iriska-site-fixed-header .iriska-site-header').removeClass('iriska-small-fixed-header');
      }
    });

  // Smooth scroll
    $('body.iriska-smooth-scroll').on('click', 'a[href^="#"]', function(event) {
      event.preventDefault();
      var scroll_to = $(this).attr('href');
      $('html, body').animate({
        scrollTop: $(scroll_to).offset().top
      }, 500);
    });

  // Skip Link
  // Helps with accessibility for keyboard only users.
  // Learn more: https://git.io/vWdr2
    var isIe = /(trident|msie)/i.test( navigator.userAgent );
    if ( isIe && document.getElementById && window.addEventListener ) {
      window.addEventListener( 'hashchange', function() {
        var id = location.hash.substring( 1 ),
          element;
        if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
          return;
        }
        element = document.getElementById( id );
        if ( element ) {
          if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
            element.tabIndex = -1;
          }
          element.focus();
        }
      }, false );
    }
});