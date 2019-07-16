<?php

/*Template Name: Sitemap*/

get_header();

if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>

<div class='container' id='sitemap'>
	<h1 class='entry-title'><?php the_title(); ?></h1>
	<div class='row'>
		<div class='col-md-4'>
			<h2>Pages</h2>
			<ul>
			<?php 
			$pages = get_pages();
			foreach ($pages as $single_page) {
				?>

				<li><a href='<?php the_permalink($single_page) ?>'><?php echo get_the_title($single_page); ?></a></li>

				<?php
			
			}

			?>
			</ul>
		</div>
		<div class='col-md-4'>
			<h2>Posts</h2>
			<ul>
			<?php
			$posts = get_posts();
			foreach ($posts as $single_post) {
				?>
				<li><a href='<?php the_permalink($single_post) ?>'><?php echo get_the_title($single_post); ?></a></li>

				<?php
				
			}


			?>
			</ul>
		</div>
		<div class='col-md-4'>
			<h2>Custom Posts</h2>



			<?php if(post_type_exists('gon_ourwork')){ ?>

			<h3>Our Work</h3>
			<ul>
				<?php
			
				$args = array(
					'post_type' => 'gon_ourwork',
					'order' => 'ASC',
					'orderby' => 'menu_order',
					'post_status' => 'publish'
				);
				$ourwork_posts = new WP_Query ($args);
				if($ourwork_posts->have_posts()){
					while($ourwork_posts->have_posts()){
						$ourwork_posts->the_post();
						?>
						<li><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></li>
						<?php
					}
					
				}
			} ?>
			</ul>



			<?php if(post_type_exists('gon_team')){ ?>

			<h3>Our Team</h3>
			<ul>
			<?php
			
				$args = array(
					'post_type' => 'gon_team',
					'order' => 'ASC',
					'orderby' => 'menu_order',
					'post_status' => 'publish'
				);
				$team_posts = new WP_Query ($args);
				if($team_posts->have_posts()){
					while($team_posts->have_posts()){
						$team_posts->the_post();
						?>
						<li><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></li>
						<?php
					}
					
				}
			} ?>
			</ul>


			<?php if(post_type_exists('gon_products')){ ?>

			<h3>Our Products</h3>
			<ul>
			<?php
			
				$args = array(
					'post_type' => 'gon_products',
					'order' => 'ASC',
					'orderby' => 'menu_order',
					'post_status' => 'publish'
				);
				$products_posts = new WP_Query ($args);
				if($products_posts->have_posts()){
					while($products_posts->have_posts()){
						$products_posts->the_post();
						?>
						<li><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></li>
						<?php
					}
					
				}
			} ?>
			</ul>

			<!--OTHER CUSTOM POST TYPE
			<h3>Our Products</h3>
			<ul>
			<?php/* uncomment this bit as well
			
				$args = array(
					'post_type' => 'otherposttype',
					'order' => 'ASC',
					'orderby' => 'menu_order',
					'post_status' => 'publish'
				);
				$otherposttype_posts = new WP_Query ($args);
				if($otherposttype_posts->have_posts()){
					while($otherposttype_posts->have_posts()){
						$otherposttype_posts->the_post();
						?>
						<li><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></li>
						<?php
					}
					
				}
			} */?>
			</ul>-->



		</div>
	</div>
</div>





<?php endwhile; endif; ?>





<?php

get_footer();

?>