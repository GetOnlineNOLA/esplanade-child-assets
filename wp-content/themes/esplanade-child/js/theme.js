jQuery(document).on('ready', function(){
	winWidth = jQuery(window).width();
	var header = jQuery('#header');

	if(header.hasClass('gon_header-below-slider')&&!jQuery('body').hasClass('home')){
		belowSliderHeader();
	}
})

//wait until load on home page so slideshow can set. otherwise, its hard to pull the height accurately
jQuery(window).on('load', function(){
	winWidth = jQuery(window).width();
	var header = jQuery('#header');
	
	if(header.hasClass('gon_header-below-slider')&&jQuery('body').hasClass('home')){ 
		belowSliderHeaderHome();
	}

})


function belowSliderHeaderHome(){

	// use logo height height to set header height
	var logoHeight = parseInt(jQuery('#logo img').outerHeight());
	var headerPadding = parseInt(jQuery('#header').css('padding-top'))+parseInt(jQuery('#header').css('padding-bottom'));
	var headerHeight = logoHeight+headerPadding;
	jQuery('#header').css('height',headerHeight);
	jQuery('.navbar-toggle').css('height',logoHeight);



	jQuery(window).scroll(function(){
		if ( jQuery(this).scrollTop() >= jQuery('#home-slider').outerHeight() ) {
			//fix menu
			jQuery('#header').addClass('fixmenu');
			jQuery('#home-slider').css('margin-bottom',headerHeight);
			loggedInAdjustment();
		}  else if (jQuery(this).scrollTop() <= jQuery('#home-slider').outerHeight() ) {
			//reset
			jQuery('#header').removeClass('fixmenu');
			jQuery('#home-slider').css('margin-bottom','0');
			jQuery('#header').css('top',0);
		};
	});
}

function belowSliderHeader(){
	var logoHeight = parseInt(jQuery('#logo img').outerHeight());
	var headerPadding = parseInt(jQuery('#header').css('padding-top'))+parseInt(jQuery('#header').css('padding-bottom'));
	var headerHeight = logoHeight+headerPadding;
	jQuery('#header').css('height',headerHeight);
	jQuery('.navbar-toggle').css('height',logoHeight);

	loggedInAdjustment();
	jQuery('#header').addClass('fixmenu static');
	jQuery('body').css('padding-top',headerHeight);

}


function loggedInAdjustment(){
	if(jQuery('body').hasClass('logged-in')){
		var adjust = jQuery('#wpadminbar').height();
		jQuery('header#header').css('top',adjust);
	}
}


