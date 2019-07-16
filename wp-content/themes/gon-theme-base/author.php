<?php get_header(); ?>

<section id="author-page">
  <div class='container'>
    <div class='row'>

      <div class="col-sm-9">
          <?php the_post(); ?>
          <h1 class="entry-title author">
            <?php _e( 'Author Archives', 'gon_carrollton' ); ?>
            :
            <?php the_author_link(); ?>
          </h1>
          <?php if ( '' != get_the_author_meta( 'user_description' ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . get_the_author_meta( 'user_description' ) . '</div>' ); ?>
          <?php rewind_posts(); ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
              <?php if ( has_post_thumbnail() ) { ?><a href="<?php the_permalink();?>"><?php the_post_thumbnail('shallow-crop', array('class' => 'img-responsive','style' => 'width:100%;margin:0 auto;' )); ?></a><?php  } ?>
              <h2 class="entry-title">
                <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
              </h2><div class="post-meta"><span class="entry-date"><?php echo get_the_date(); ?></span> | <span class="entry-category"><?php $categories = get_the_category();
      if ( ! empty( $categories ) ) {
      foreach($categories as $category){
      	$cat_link = get_category_link($categories[0]->cat_ID);
       		$resultstr[] = '<a href="'.$cat_link.'">'.$categories[0]->name.'</a>';
      }  
      $result = implode(", ",$resultstr);
      echo $result; 
      } ?></span></div>
              <?php the_excerpt(); ?>
            </div>
          </article>
        <?php endwhile; ?>
        <?php get_template_part( 'nav', 'below' ); ?>
      </div>
      <div class="col-sm-3">
        <?php get_sidebar(); ?>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
