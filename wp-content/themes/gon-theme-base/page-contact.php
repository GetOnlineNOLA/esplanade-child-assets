<?php 

/*Template Name: page-contact*/

get_header(); ?>

<section id="contact-page-template" class="content-wrapper">

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class='container'>
        <div class='row'>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class='col-xs-12'>
                <h1 class="entry-title">
                 	<?php the_title(); ?>
            	</h1>
            </div>
                
            <div class="col-sm-6 col-xs-12">    
                <div class="entry-content">
                  <?php the_field('left_column'); ?>
                </div>    
            </div>

            <div class="col-sm-6 col-xs-12">
                <div class="entry-content">
                	<?php the_field('right_column'); ?>
                </div>
            </div>

            <?php endwhile; endif; ?>

        </div>

    </div>
  </article>
</section>

<?php get_footer(); ?>