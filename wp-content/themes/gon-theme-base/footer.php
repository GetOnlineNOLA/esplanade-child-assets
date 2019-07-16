</div><!--end #main-content-->


<div class="clearfix"></div>


<a href="<?php echo get_home_url() ?>/wp-admin/themes.php"><h1>Install and activate child theme</h1></a>


<script>
function defer(method) {
if (window.jQuery)
	method();
else
	setTimeout(function() { defer(method) }, 50);
}

defer(function () {
	<?php if(is_home()){
		$blog_id = get_option( 'page_for_posts' );
		if ( get_field('single_page_header_image',$blog_id) ) { ?>
			var imgurl = '<?php the_post_thumbnail_url('full-size');?>';
			console.log(<?php echo $blog_id ?>);
			console.log('document is ready '+imgurl);
			jQuery('.container-fluid.head-img').css({'background':'url("<?php the_field('single_page_header_image',$blog_id);?>") transparent no-repeat center center','background-size':'cover'});	
	<?php }} else { 
		if ( get_field('single_page_header_image') ) { ?>
		var imgurl = '<?php the_post_thumbnail_url('full-size');?>';
		console.log('document is ready '+imgurl);
		jQuery('.container-fluid.head-img').css({'background':'url("<?php the_field('single_page_header_image');?>") transparent no-repeat center center','background-size':'cover'});
	<?php }}?>
	
	<?php if ( get_field('google-fonts', 'option') ) { ?>
	jQuery.getScript("//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js", function(){
		WebFont.load({
			google: { 
				   families: [<?php $fonts_string = get_field('google-fonts', 'option');
				   //doesn't work on its own - explode the string at the commas and insert with appropriate syntax 
				   $pieces = explode("|", $fonts_string);
				   $i = 0;
				   $count = count($pieces);
				   for($i=0;$i<$count;$i++){echo "'".$pieces[$i]."',";}
				   ?>] 
			 } 
		 }); 
	})
	<?php } //end if get field google fonts ~ ?>
	jQuery('body').append('<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"  media="none" onload="this.media=\'all\';" />')
	
});

window.onload = function () {
	if (typeof gonSlideshow === "function"){ gonSlideshow(); } else { console.log('not home'); }
	// ADD SLIDEDOWN ANIMATION TO DROPDOWN //
	jQuery('.dropdown').on('show.bs.dropdown', function(e){
	jQuery(this).find('.dropdown-menu').first().stop(true, true).slideDown();
	});
	
	// ADD SLIDEUP ANIMATION TO DROPDOWN //
	jQuery('.dropdown').on('hide.bs.dropdown', function(e){
	jQuery(this).find('.dropdown-menu').first().stop(true, true).slideUp();
	});
}

function gonSlideshow(){
	//assigns slideshow an aspect ratio and image size based on screen width
	var winWidth = window.innerWidth;
	var aspectRatioLargeScreen = '2.72';
	var aspectRatioMediumScreen = '1.61';//for iPad size
	var aspectRatioSmallScreen = '1';//square
	if(winWidth>769){
		var slideImageHeight = (winWidth/aspectRatioLargeScreen);
		jQuery('img.img-responsive.slideshow').each(function () {
			var newSrc = jQuery(this).data('gon-imgload-large');
			console.log(newSrc);
			jQuery(this).attr('src', newSrc);
		});
	}else if(winWidth>490){
		var slideImageHeight = (winWidth/aspectRatioMediumScreen);
		jQuery('img.img-responsive.slideshow').each(function () {
			var newSrc = jQuery(this).data('gon-imgload-medium');
			console.log(newSrc);
			jQuery(this).attr('src', newSrc);
		});
	}else{
		var slideImageHeight = (winWidth/aspectRatioSmallScreen);
		jQuery('img.img-responsive.slideshow').each(function () {
			var newSrc = jQuery(this).data('gon-imgload-small');
			console.log(newSrc);
			jQuery(this).attr('src', newSrc);
		});
	}
	jQuery('.cycle-slideshow img.slideshow').height(slideImageHeight);
	//could the following fix the sometimes loading of slideshow over content beneath?
	var fullCycleHeight = jQuery('.slide-text').outerHeight() + slideImageHeight;
	jQuery('.cycle-slideshow').height(fullCycleHeight);	
}
</script>

<?php wp_footer(); ?>

</body>
</html>