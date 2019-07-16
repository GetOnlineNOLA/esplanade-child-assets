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
				<div class='slideshow-inner'>
					<?php the_sub_field('slideshow-text'); ?>
					<a href='<?php echo get_sub_field('slideshow-cta-link'); ?>' class='button slide-cta'><?php echo get_sub_field('slideshow-cta'); ?></a>
				</div>
	      </div>

      <?php endwhile; ?>
  <?php endif; ?>
  <span class="cycle-prev">&#8249;</span>
  <span class="cycle-next">&#8250;</span>
</div>

<div class="slide-text">
    <div class="container">
        <div class="row flex">
            <div class="<?php if(get_field('static-slideshow-cta')){ echo 'col-md-10 col-sm-9 '; } else { echo 'col-xs-12 '; } ?>flex-col flex-mid">
                <?php the_field('static-slideshow-text'); ?>
            </div>
            <?php if(get_field('static-slideshow-cta')): ?>
            <div class="col-md-2 col-sm-3 text-center flex-col flex-center flex-mid p-0">
                <a href='<?php echo get_field('static-slideshow-cta-link'); ?>' class='button slide-cta'><?php echo get_field('static-slideshow-cta'); ?></a>
            </div>
            <?php endif; ?>
        </div>
    </div>
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
	jQuery('.cycle-slideshow img.slideshow').height(slideImageHeight);
	jQuery('.cycle-slideshow').height(slideImageHeight);
}
</script>