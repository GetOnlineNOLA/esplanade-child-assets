<div class="cycle-slideshow"
     data-cycle-timeout="4500" 
     data-cycle-slides="> div"
     data-cycle-auto-height="container">
  <?php if (have_rows('repeatable-home-slides')): ?>
      <?php while (have_rows('repeatable-home-slides')): the_row(); ?>
	      <div class="slide" style="width:100%;"> 
	            <img src="<?php //image magic follows
				$img_src = wp_get_attachment_image_src( get_sub_field('image'), 'medium' ); //first image loaded is thumbnail
				echo $img_src[0]; ?>"
				data-gon-imgload-small="<?php $img_src = wp_get_attachment_image_src( get_sub_field('image'), 'medium-square-crop' );echo $img_src[0]; ?>" 
				data-gon-imgload-medium="<?php $img_src = wp_get_attachment_image_src( get_sub_field('image'), 'tablet-crop' );echo $img_src[0]; ?>" 
				data-gon-imgload-large="<?php $img_src = wp_get_attachment_image_src( get_sub_field('image'), 'slideshow-crop' );echo $img_src[0]; ?>" 
				class="img-responsive slideshow" 
				alt="<?php the_sub_field('title'); ?>" 
				width="100%" height="auto"/>
	            <div class="slide-text">
	                <div class="container">
	                    <div class="row flex">
	                        <div class="col-md-10 col-sm-9 flex-col flex-mid">
	                            <?php the_sub_field('slideshow-text'); ?>
	                        </div>
	                        <div class="col-md-2 col-sm-3 text-center flex-col flex-center flex-mid p-0">
	                            <a href='<?php echo get_sub_field('slideshow-cta-link'); ?>' class='button slide-cta'><?php echo get_sub_field('slideshow-cta'); ?></a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	      </div>
      <?php endwhile; ?>
  <?php endif; ?>
  <span class="cycle-prev">&#8249;</span>
  <span class="cycle-next">&#8250;</span>
</div>
<div class="clearfix"></div>


<script type="text/javascript">
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
			jQuery(this).attr('src', newSrc);
		});
	}else if(winWidth>490){
		var slideImageHeight = (winWidth/aspectRatioMediumScreen);
		jQuery('img.img-responsive.slideshow').each(function () {
			var newSrc = jQuery(this).data('gon-imgload-medium');
			jQuery(this).attr('src', newSrc);
		});
	}else{
		var slideImageHeight = (winWidth/aspectRatioSmallScreen);
		jQuery('img.img-responsive.slideshow').each(function () {
			var newSrc = jQuery(this).data('gon-imgload-small');
			jQuery(this).attr('src', newSrc);
		});
	}
	slideTextHeights = [];
	jQuery('.slide-text').each(function(){ slideTextHeights.push(jQuery(this).outerHeight()); }); //find max slide text
	var maxText = Math.max.apply(Math, slideTextHeights);
	jQuery('.slide-text').each(function(){ jQuery(this).css('height',maxText); });
	jQuery('.cycle-slideshow img.slideshow').height(slideImageHeight);
	var fullCycleHeight = maxText + slideImageHeight;
	jQuery('.cycle-slideshow').height(fullCycleHeight);



}
</script>