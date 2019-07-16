<?php
/**
 * Template Name: sitemap
 */ 
  get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



<div class="container-fluid beige-bg">
  <div class="container">
    <div class="row" style="padding-bottom: 2em;">
      
        <section id="content" role="main">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <section class="entry-content">
            <h1><?php the_title(); ?></h1>
             <div class="col-sm-6 col-xs-12"> 
              <?php wp_list_pages('orderby=title&order= ASC'); ?> 
              </div>
              <div class="col-sm-6 col-xs-12"> 
              <?php 
		$args = array( 'post_type' => 'post', 'orderby'=> 'title', 'order' => 'ASC', 'post_status' => 'publish', 'numberposts' => '-1');
	$recent_posts = wp_get_recent_posts( $args );
	foreach( $recent_posts as $recent ){
		echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   ( __($recent["post_title"])).'</a></li>';
	}?>
              </div>
            </section>
          </article>
        </section>
     
    </div>
  </div>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
