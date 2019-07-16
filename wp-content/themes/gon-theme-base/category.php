<?php get_header(); ?>

<section id="blog-category-archive" class="content-wrapper">
  <div class='container'>
    <div class='row'>

      <div class="col-sm-9">
        <h1 class="entry-title">
          <?php _e( 'Category Archives: ', 'gon_carrollton' ); ?>
          <?php single_cat_title(); ?>
        </h1>
        <?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta entry-content">' . category_description() . '</div>' ); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="entry-content">
            <?php if ( has_post_thumbnail() ) { ?><a href="<?php the_permalink();?>"><?php the_post_thumbnail('shallow-crop', array('class' => 'img-responsive','style' => 'width:100%;margin:0 auto;' )); ?></a><?php  } ?>
            <h2 class="entry-title">
              <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
            </h2>
  	        <div class='post-meta'>
              <span class='entry-date'><?php echo get_the_date(); ?> | </span>
              <span class='entry-author'>Author: <?php echo get_the_author(); ?> | </span>
              <span class='entry-category'>Categories: 
                <?php 
                $categories = get_the_category();
                $i = true;
                  foreach ($categories as $category) {
                    $cat_slug = $category->slug;
                    $cat_name = $category->name;
                    if(!$i){echo ', ';}?><a href='/category/<?php echo $cat_slug; ?>'><?php echo $cat_name; ?></a><?php 
                    $i=false;
                  }
                ?>
              </span>
            </div>
            <?php the_excerpt(); ?>
          </div>
        </article>
      <?php endwhile; endif; ?>
      </div>

      <div class="col-sm-3">
        <?php get_sidebar(); ?>
      </div>

    </div>
  </div>
</section>



<?php get_footer(); ?>
