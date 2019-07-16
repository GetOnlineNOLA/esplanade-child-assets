<div class="cycle-slideshow"
     data-cycle-timeout="4500" 
     data-cycle-slides="> div"
     data-cycle-auto-height="container">
  <?php if (have_rows('repeatable-home-slides')): ?>
      <?php while (have_rows('repeatable-home-slides')): the_row(); ?>
	      <div class="slide" style="width:100%;">
            <div class='container'>
		      	<div class='row flex'> 
		      		<div class='col-sm-8' id="gon_sic">
			            <img src="<?php //image magic follows
						$img_src = wp_get_attachment_image_src( get_sub_field('image'), 'medium' ); //first image loaded is thumbnail
						echo $img_src[0]; ?>"
						data-gon-imgload-small="<?php $img_src = wp_get_attachment_image_src( get_sub_field('image'), 'medium-square-crop' );echo $img_src[0]; ?>" 
						data-gon-imgload-medium="<?php $img_src = wp_get_attachment_image_src( get_sub_field('image'), 'tablet-crop' );echo $img_src[0]; ?>" 
						data-gon-imgload-large="<?php $img_src = wp_get_attachment_image_src( get_sub_field('image'), 'slideshow-crop' );echo $img_src[0]; ?>" 
						class="img-responsive slideshow" 
						alt="<?php the_sub_field('title'); ?>" 
						width="100%" height="auto"/>
					</div>
					<div class='col-sm-4'>
			            <div class="slide-text flex-col flex-mid">
                            <?php the_sub_field('slideshow-text'); ?>
                            <?php if(get_sub_field('slideshow-cta')): ?>
                            	<a href='<?php echo get_sub_field('slideshow-cta-link'); ?>' class='button slide-cta'><?php echo get_sub_field('slideshow-cta'); ?></a>
                            <?php endif; ?>
			            </div>
			        </div>
			    </div>
			</div>
	      </div>
      <?php endwhile; ?>
  <?php endif; ?>
  <span class="cycle-pager"></span>
</div>
<div class="clearfix"></div>




<script type="text/javascript">
function gonSlideshow(){
	//assigns slideshow an aspect ratio and image size based on screen width
	var winWidth = window.innerWidth;
	var slideImageContainer = jQuery('#gon_sic').width();
	var aspectRatioLargeScreen = '2.72';
	var aspectRatioMediumScreen = '1.61';//for iPad size
	var aspectRatioSmallScreen = '1';//square
	// if(winWidth>769){
	// 	var slideImageHeight = (slideImageContainer/aspectRatioLargeScreen);
	// 	jQuery('img.img-responsive.slideshow').each(function () {
	// 		var newSrc = jQuery(this).data('gon-imgload-large');
	// 		jQuery(this).attr('src', newSrc);
	// 	});
	// }else 
	if(winWidth>769){
		var slideImageHeight = (slideImageContainer/aspectRatioMediumScreen);
		var fullCycleHeight = slideImageHeight;
		jQuery('img.img-responsive.slideshow').each(function () {
			var newSrc = jQuery(this).data('gon-imgload-medium');
			jQuery(this).attr('src', newSrc);
		});
	} else if(winWidth>481) {
		var slideImageHeight = slideImageContainer/aspectRatioLargeScreen;
		var fullCycleHeight = (slideImageContainer/aspectRatioLargeScreen)+jQuery('.slide-text').outerHeight()+parseInt(jQuery('.slide-text').css('margin-top'));
		jQuery('img.img-responsive.slideshow').each(function () {
			var newSrc = jQuery(this).data('gon-imgload-large');
			jQuery(this).attr('src', newSrc);
		});
	} else {
		var slideImageHeight = slideImageContainer/aspectRatioSmallScreen;
		var fullCycleHeight = (slideImageContainer/aspectRatioSmallScreen)+jQuery('.slide-text').outerHeight()+parseInt(jQuery('.slide-text').css('margin-top'));
		jQuery('img.img-responsive.slideshow').each(function () {
			var newSrc = jQuery(this).data('gon-imgload-small');
			jQuery(this).attr('src', newSrc);
		});
	}
	jQuery('.cycle-slideshow img.slideshow').height(slideImageHeight);
	jQuery('.cycle-slideshow').height(fullCycleHeight);
}
</script>