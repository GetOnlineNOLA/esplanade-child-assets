<?php 

/*Template Name: page-home*/

get_header(); 

?>
<section id="home-slider">
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
		                        <div class="col-md-2 col-sm-3 text-center flex-col flex-center flex-mid">
		                            <a href='<?php echo get_sub_field('slideshow-cta-link'); ?>' class='button slide-cta'><?php echo get_sub_field('slideshow-cta'); ?></a>
		                        </div>
		                    </div>
		                </div>
		            </div>
		      </div>
	      <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <div class="clearfix"></div>
</section>

<section id="home-copy">
	<div class='container'>
		<div class='row'>
			<div class='col-xs-12'>
				<div class='home-copy entry-content'>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="home-columns">
	<div class='container'>
		<div class='row flex'>
		<?php if( have_rows('home_columns') ): $i=true; 
			while ( have_rows('home_columns') ) : the_row(); ?>

			<?php if(!$i){ echo '</div><div class="row flex">'; } ?>

			<div class="col-sm-4 text-center flex-col flex-mid">
			  <div class="home-column">
				  <a href="<?php the_sub_field('left_column_link'); ?>">
				    <?php if(!get_sub_field('title_below_image_left')){ ?><h3 class="entry-title"><?php the_sub_field('left_column_title');?></h3><?php } ?>
					<img src="<?php $src = get_sub_field('left_column_image'); echo $src["sizes"]["tablet-crop"];?>" class="img-responsive"/>
					<div class="clearfix"></div>
				    <?php if(get_sub_field('title_below_image_left')){ ?><h3 class="entry-title"><?php the_sub_field('left_column_title');?></h3><?php } ?>
				  </a>
				  <div class="entry-content">
				  	<?php the_sub_field('left_column_description');?>
					<?php if(get_sub_field('left_column_cta')){ ?>
					 <a href='<?php echo get_sub_field('left_column_link'); ?>' class='button home-column-cta'><?php echo get_sub_field('left_column_cta'); ?></a>
					<?php } ?>
				  </div>
			  </div>
			</div>

			<div class="col-sm-4 text-center flex-col flex-mid">
			  <div class="home-column">
				  <a href="<?php the_sub_field('middle_column_link'); ?>">
				    <?php if(!get_sub_field('title_below_image_middle')){ ?><h3 class="entry-title"><?php the_sub_field('middle_column_title');?></h3><?php } ?>
					<img src="<?php $src = get_sub_field('middle_column_image'); echo $src["sizes"]["tablet-crop"];?>" class="img-responsive"/>
					<div class="clearfix"></div>
				    <?php if(get_sub_field('title_below_image_middle')){ ?><h3 class="entry-title"><?php the_sub_field('middle_column_title');?></h3><?php } ?>
				  </a>
				  <div class="entry-content">
				  	<?php the_sub_field('middle_column_description');?>
					<?php if(get_sub_field('middle_column_cta')){ ?>
					 <a href='<?php echo get_sub_field('middle_column_link'); ?>' class='button home-column-cta'><?php echo get_sub_field('middle_column_cta'); ?></a>
					<?php } ?>
				  </div>
			  </div>
			</div>

			<div class="col-sm-4 text-center flex-col flex-mid">
			  <div class="home-column">
				  <a href="<?php the_sub_field('right_column_link'); ?>">
				    <?php if(!get_sub_field('title_below_image_right')){ ?><h3 class="entry-title"><?php the_sub_field('right_column_title');?></h3><?php } ?>
					<img src="<?php $src = get_sub_field('right_column_image'); echo $src["sizes"]["tablet-crop"];?>" class="img-responsive"/>
					<div class="clearfix"></div>
				    <?php if(get_sub_field('title_below_image_right')){ ?><h3 class="entry-title"><?php the_sub_field('right_column_title');?></h3><?php } ?>
				  </a>
				  <div class="entry-content">
				  	<?php the_sub_field('right_column_description');?>
					<?php if(get_sub_field('right_column_cta')){ ?>
					 <a href='<?php echo get_sub_field('right_column_link'); ?>' class='button home-column-cta'><?php echo get_sub_field('right_column_cta'); ?></a>
					<?php } ?>
				  </div>
			  </div>
			</div>

			<?php $i = false; ?>

		<?php endwhile; endif; ?>
		</div>
	</div>
</section>

<?php if( get_field('include_additional_homepage_content') ) { ?>

<section id="additional-home-content">
	
	<div class='container-fluid'>
	  <div class='row'>
	    <div class="col-sm-12 text-center">
	        <h1 class="entry-title">
	          <?php echo the_field('section_title'); ?>
	        </h1>
	    </div>
	  </div>
	</div>

    <div class='container'>
  		<div class='row'>
	    <?php
	    if(have_rows('content_columns')):
		  $num_rows = count( get_field('content_columns') );
		  switch($num_rows){
			  case '1':
				  $cols = '12';
				  break;
			  case '2':
				  $cols = '6';
				  break;
			  case '3':
				  $cols = '4';
				  break;
		  }
		  while(have_rows('content_columns')): the_row();
		?>
		    <div class="col-sm-<?php echo $cols; ?> col-xs-12 home-contact-column">  
		    	<?php the_sub_field('content'); ?>
		    </div>
		<?php endwhile; endif; ?>
 		</div>
	</div>

</section>

<?php } ?>

<?php get_footer(); ?>
