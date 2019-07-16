<?php 

/*Template Name: page-full-width*/

get_header(); ?>

<section id="page-full-width-template" class="content-wrapper">
  <div class='container'>
    <div class='row'>
      <div class="col-sm-12">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1 class="entry-title">
            <?php the_title(); ?>
          </h1>
          <div class="entry-content">
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail('full-size', array('class'=>'img-responsive')); } ?>
            <?php the_content(); ?>
          </div>
        </article>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
