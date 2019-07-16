<?php get_header(); ?>

<section id="page-not-found">
  <div class='container'>
    <div class='row'>

      <div class="col-sm-9">
        <article id="post-0" class="post not-found">
          <h1 class="entry-title">
            <?php _e( 'Not Found', 'gon_carrollton' ); ?>
          </h1>
          <section class="entry-content">
            <p>
              <?php _e( 'Nothing found for the requested page. Try a search instead?', 'gon_carrollton' ); ?>
            </p>
            <?php get_search_form(); ?>
          </section>
        </article>
      </div>
      <div class="col-sm-3">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>

</section>

<?php get_footer(); ?>
