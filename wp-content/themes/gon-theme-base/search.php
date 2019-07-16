<?php get_header(); ?>

<section id="search-results">
  <div class='container'>
    <div class='row'>

      <div class="col-sm-9">
        <?php if ( have_posts() ) : ?>
        <h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'gon_carrollton' ), get_search_query() ); ?></h1>
        <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
              <?php if ( has_post_thumbnail() ) { ?><a href="<?php the_permalink();?>"><?php the_post_thumbnail('shallow-crop', array('class' => 'img-responsive','style' => 'width:100%;margin:0 auto;' )); ?></a><?php  } ?>
              <h2 class="entry-title">
                <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
              </h2>
              <?php the_excerpt(); ?>
            </div>
          </article>
        <?php endwhile; ?>
        <?php get_template_part( 'nav', 'below' ); ?>
        <?php else : ?>
        <article id="post-0" class="post no-results not-found">
          <h2 class="entry-title">
            <?php _e( 'Nothing Found', 'gon_carrollton' ); ?>
          </h2>
          <div class="entry-content">
            <p>
              <?php _e( 'Sorry, nothing matched your search. Please try again.', 'gon_carrollton' ); ?>
            </p>
            <?php get_search_form(); ?>
          </div>
        </article>
        <?php endif; ?>
      </div>
      <div class="col-sm-3">
        <?php get_sidebar(); ?>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
