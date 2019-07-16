<?php 

/*Template Name: page-home*/

get_header(); 

?>

<?php $slideshow = get_field('select_slideshow_style','option'); ?>


<section id="home-slider" class="gon_slideshow-<?php echo $slideshow; ?>">
<?php switch ($slideshow) {
  case 'standard':
    get_template_part('slideshow/standard');
    break;
  case 'overlay':
    get_template_part('slideshow/overlay');
    break;
  case 'tiled':
    get_template_part('slideshow/tiled');
    break;
  case 'swoosh':
    get_template_part('slideshow/swoosh');
    break;
  case 'video':
    get_template_part('slideshow/video');
    break;
  
  default:
    echo 'please select slideshow style in GON Theme Settings > Advanced Settings';
    break;
} ?>
</section>

<?php if(get_field('select_header_style','option')=='below-slider'){ ?>
<header id="header" role="banner" class="navigation gon_header-below-slider">
	<?php get_template_part('header/below-slider'); ?>
</header>
<?php } ?>

<?php wp_reset_postdata(); ?>

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

<?php $columns = get_field('select_columns_style','option'); ?>

<section id="home-columns" class="gon_columns-<?php echo $columns; ?>">
<?php switch ($columns) {
  case 'standard':
    get_template_part('home-columns/standard');
    break;
  case 'expand':
    get_template_part('home-columns/expand');
    break;
  case 'full':
    get_template_part('home-columns/full');
    break;
  case 'overlay':
    get_template_part('home-columns/overlay');
    break;
  
  default:
    echo 'please select home-columns style in GON Theme Settings > Advanced Settings';
    break;
} ?>
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
