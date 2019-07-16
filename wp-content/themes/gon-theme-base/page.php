<?php get_header(); ?>

<section id="default-page-template" class="content-wrapper">
  <div class='container'>
    <div class='row'>
      <div class="col-md-9">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <article role="main" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1 class="entry-title">
              <?php the_title(); ?>
            </h1>
            <div class="entry-content">
              <?php if ( has_post_thumbnail() ) { the_post_thumbnail('large', array('class'=>'img-responsive')); } ?>
              <?php the_content(); ?>
            </div>
          </article>
          <?php endwhile; endif; ?>
      </div>
      <div class="col-md-3">
      	<?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
