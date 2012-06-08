/* Foundation v2.2.1 http://foundation.zurb.com */
jQuery(document).ready(function ($) {
	
	// WordPress Nav-bar support 
	// $('.nav-bar li>a').addClass("main");
	$('.nav-bar li').has('ul').addClass("has-flyout").append('<a href="#" class="flyout-toggle"><span></span></a>');
	$('.nav-bar li>ul').addClass("flyout small");
	
	/*
	
	 add social icons to pre-header nav using ZURB social font
	 more info: http://www.zurb.com/playground/foundation-icons
	*/
	
	$('#menu-pre-header li.twitter a').html('<span class="glyph social">e </span>');
	$('#menu-pre-header li.facebook a').html('<span class="glyph social">d </span>');
	$('#menu-pre-header li.pinterest a').html('<span class="glyph social">f </span>');
	$('#menu-pre-header li.gplus a').html('<span class="glyph social">i </span>');
	$('#menu-pre-header li.youtube a').html('<span class="glyph social">m </span>');
	$('#menu-pre-header li.vimeo a').html('<span class="glyph social">n </span>');
	
	// contact and rss icons
	$('#menu-pre-header li.contact a').prepend('<span class="glyph general">h </span>');
		$('#menu-pre-header li.events a').prepend('<span class="glyph general">i </span>');
	$('#menu-pre-header li.rss a').prepend('<span class="glyph social">c </span>');
	
	
	// responsiveSlide setup
	   $(".rslides").responsiveSlides({
	     auto: false,
	     pager: true,
	     nav: true,
	     speed: 500,
	     timeout: 5000
	   });
	   
	 // Strip width and height attributes from img, video, and object in the main article so we can have fluid images
	 //	var $fluid_items = $('.entry').find('img,video,object');
	 //	$fluid_items.removeAttr('width');
	 //	$fluid_items.removeAttr('height');
	

function activateTab($tab) {
		var $activeTab = $tab.closest('dl').find('a.active'),
				contentLocation = $tab.attr("href") + 'Tab';
				
		// Strip off the current url that IE adds
		contentLocation = contentLocation.replace(/^.+#/, '#');

		//Make Tab Active
		$activeTab.removeClass('active');
		$tab.addClass('active');

    //Show Tab Content
		$(contentLocation).closest('.tabs-content').children('li').hide();
		$(contentLocation).css('display', 'block');
	}

	$('dl.tabs').each(function () {
		//Get all tabs
		var tabs = $(this).children('dd').children('a');
		tabs.click(function (e) {
			activateTab($(this));
		});
	});

	if (window.location.hash) {
		activateTab($('a[href="' + window.location.hash + '"]'));
		$.foundation.customForms.appendCustomMarkup();
	}

	/* ALERT BOXES ------------ */
	$(".alert-box").delegate("a.close", "click", function(event) {
    event.preventDefault();
	  $(this).closest(".alert-box").fadeOut(function(event){
	    $(this).remove();
	  });
	});


	/* PLACEHOLDER FOR FORMS ------------- */
	/* Remove this and jquery.placeholder.min.js if you don't need :) */

	$('input, textarea').placeholder();

	/* TOOLTIPS ------------ */
	$(this).tooltips();

	/* ie support for block grids */
	$('.block-grid.two-up>li:nth-child(2n+1)').css({clear: 'left'});
	$('.block-grid.three-up>li:nth-child(3n+1)').css({clear: 'left'});
	$('.block-grid.four-up>li:nth-child(4n+1)').css({clear: 'left'});
	$('.block-grid.five-up>li:nth-child(5n+1)').css({clear: 'left'});



	/* DROPDOWN NAV ------------- */

	var lockNavBar = false;
	$('.nav-bar a.flyout-toggle').live('click', function(e) {
		e.preventDefault();
		var flyout = $(this).siblings('.flyout');
		if (lockNavBar === false) {
			$('.nav-bar .flyout').not(flyout).slideUp(500);
			flyout.slideToggle(500, function(){
				lockNavBar = false;
			});
		}
		lockNavBar = true;
	});
  if (Modernizr.touch) {
    $('.nav-bar>li.has-flyout>a.main').css({
      'padding-right' : '75px'
    });
    $('.nav-bar>li.has-flyout>a.flyout-toggle').css({
      'border-left' : '1px dashed #eee'
    });
  } else {
    $('.nav-bar>li.has-flyout').hover(function() {
      $(this).children('.flyout').show();
    }, function() {
      $(this).children('.flyout').hide();
    })
  }


	/* DISABLED BUTTONS ------------- */
	/* Gives elements with a class of 'disabled' a return: false; */
  
});
