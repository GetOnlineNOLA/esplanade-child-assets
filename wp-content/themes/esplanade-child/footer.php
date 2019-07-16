</div><!--end #main-content-->


<div class="clearfix"></div>

<?php $footer = get_field('select_footer_style','option'); ?>

<footer role="contentinfo">
  <div id="footer" class="gon_footer-<?php echo $footer; ?>">
    <div class="container">

		<?php switch ($footer) {
		  case 'standard':
		    get_template_part('footer/standard');
		    break;
		  case 'minimal':
		    get_template_part('footer/minimal');
		    break;
		  default:
		    echo 'please select footer style in GON Theme Settings > Advanced Settings';
		    break;
		} ?>

        <div class="row">
        	<div class="col-sm-6">
        		<div id="copyright"> <?php echo sprintf( __( '%1$s %2$s %3$s.', 'blankslate' ), '&copy;', date('Y'), esc_html(get_bloginfo('name')) ); ?>
        		</div>
        	</div>
            <div class="col-sm-6">
            	<a href="http://getonlinenola.com" id="callout" target="_blank">
            		<img src="<?php if(get_field('gon-logo','option')){ the_field('gon-logo','option'); } else { echo bloginfo('template_directory'); ?>/images/gon-mini-logo.png <?php } ?> ">
            	</a>
            </div>
        </div>

    </div>
  </div>
</footer>

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

jQuery(document).ready(function(){
	jQuery('.hamburger').click(function(){
		jQuery('#header').toggleClass('open');
		jQuery('.menu-overlay').toggleClass('hidden');
	})
})

window.onload = function () {
	if (typeof gonSlideshow === "function"){ gonSlideshow(); } else { console.log('not home'); }//defined in theme 'slideshow' includes
	// ADD SLIDEDOWN ANIMATION TO DROPDOWN //
	jQuery('.dropdown').on('show.bs.dropdown', function(e){
	jQuery(this).find('.dropdown-menu').first().stop(true, true).slideDown();
	});
	
	// ADD SLIDEUP ANIMATION TO DROPDOWN //
	jQuery('.dropdown').on('hide.bs.dropdown', function(e){
	jQuery(this).find('.dropdown-menu').first().stop(true, true).slideUp();
	});
}

</script>

<?php wp_footer(); ?>

</body>
</html>