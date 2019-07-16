<?php get_header(); ?>



<section id="blog-single" class="content-wrapper">
  <div class='container'>
    <div class='row'>
      <div class="col-sm-9">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1 class="entry-title">
            <?php the_title(); ?>
          </h1>
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
          <div class="entry-content">
          <?php if ( has_post_thumbnail() ) { the_post_thumbnail('full', array('class' => 'img-responsive alignleft' )); } ?>
  	       <?php the_content(); ?>
           <?php $tags = get_the_tags();
            if($tags): ?>
              <span class='post-tags'>Tags: 
                <?php $i = true;
                  foreach ($tags as $tag) {
                    $tag_slug = $tag->slug;
                    $tag_name = $tag->name;
                    if(!$i){echo ', ';}?><a href='/tag/<?php echo $tag_slug; ?>'><?php echo $tag_name; ?></a><?php 
                    $i=false;
                  }
                ?>            
              </span>
              <?php endif; ?>
            <?php $blog_id = get_option('page_for_posts'); ?>
            <a class='button back-to-index' href='<?php echo get_permalink($blog_id); ?>'>&larr; <?php echo get_the_title($blog_id); ?></a>
            <?php echo comment_form(); ?>
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
