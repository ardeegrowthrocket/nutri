		jQuery(document).ready(function() {
			// grab the initial top offset of the navigation 
		   	var stickyNavTop = jQuery('#header').offset().top;
		   	
		   	// our function that decides weather the navigation bar should have "fixed" css position or not.
		   	var stickyNav = function(){
			    var scrollTop = jQuery(window).scrollTop(); // our current vertical position from the top
			         
			    // if we've scrolled more than the navigation, change its position to fixed to stick to top,
			    // otherwise change it back to relative
			    if (scrollTop >= stickyNavTop) { 
			        jQuery('#header').addClass('sticky');
			    } else {
			        jQuery('#header').removeClass('sticky'); 
			    }
			};

			stickyNav();
			// and run it again every time you scroll
			jQuery(window).scroll(function() {
				stickyNav();
			});
		});

jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 50 ) {
        jQuery('.scrolltop:hidden').stop(true, true).fadeIn();
    } else {
        jQuery('.scrolltop').stop(true, true).fadeOut();
    }
});
jQuery(function(){jQuery(".scrolltop").click(function(){jQuery("html,body").animate({scrollTop:jQuery("#top-header").offset().top},"1000");return false})})