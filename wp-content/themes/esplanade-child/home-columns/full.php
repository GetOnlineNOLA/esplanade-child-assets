<div class='container-fluid'>
	<div class='row flex'>
	<?php if( have_rows('home_columns_row') ): $i=true; 
		while ( have_rows('home_columns_row') ) : the_row();  
		$col_width = get_sub_field('number_of_columns'); 
		$col1 = get_sub_field('column_1');
		$col2 = get_sub_field('column_2');
		$col3 = get_sub_field('column_3');
		$col4 = get_sub_field('column_4'); ?>

		<?php if(!$i){ echo '</div><div class="row flex">'; } ?>

		<div class="col-sm-<?php echo $col_width ?> text-center flex-col flex-mid p-0">
		  <div class="home-column hc1">
			  <a href="<?php echo $col1['column_link_1']; ?>">
			    <?php if(!$col1['title_below_image_1']){ ?><h3 class="entry-title"><?php echo $col1['column_title_1']; ?></h3><?php } ?>
				<img src="<?php echo $col1['column_image_1']['sizes']['tablet-crop']; ?>" class="img-responsive"/>
				<div class="clearfix"></div>
			    <?php if($col1['title_below_image_1']){ ?><h3 class="entry-title"><?php echo $col1['column_title_1']; ?></h3><?php } ?>
			  </a>
			  <div class="entry-content">
			  	<?php echo $col1['column_text_1']; ?>
				<?php if($col1['column_cta_1']){ ?>
				 <a href='<?php echo $col1['column_link_1']; ?>' class='button home-column-cta'><?php echo $col1['column_cta_1']; ?></a>
				<?php } ?>
			  </div>
		  </div>
		</div>


		<div class="col-sm-<?php echo $col_width ?> text-center flex-col flex-mid p-0">
		  <div class="home-column hc1">
			  <a href="<?php echo $col2['column_link_2']; ?>">
			    <?php if(!$col2['title_below_image_2']){ ?><h3 class="entry-title"><?php echo $col2['column_title_2']; ?></h3><?php } ?>
				<img src="<?php echo $col2['column_image_2']['sizes']['tablet-crop']; ?>" class="img-responsive"/>
				<div class="clearfix"></div>
			    <?php if($col2['title_below_image_2']){ ?><h3 class="entry-title"><?php echo $col2['column_title_2']; ?></h3><?php } ?>
			  </a>
			  <div class="entry-content">
			  	<?php echo $col2['column_text_2']; ?>
				<?php if($col2['column_cta_2']){ ?>
				 <a href='<?php echo $col2['column_link_2']; ?>' class='button home-column-cta'><?php echo $col2['column_cta_2']; ?></a>
				<?php } ?>
			  </div>
		  </div>
		</div>

		<?php if($col_width!=='6'): ?>
		<div class="col-sm-<?php echo $col_width ?> text-center flex-col flex-mid p-0">
		  <div class="home-column hc1">
			  <a href="<?php echo $col3['column_link_3']; ?>">
			    <?php if(!$col3['title_below_image_3']){ ?><h3 class="entry-title"><?php echo $col3['column_title_3']; ?></h3><?php } ?>
				<img src="<?php echo $col3['column_image_3']['sizes']['tablet-crop']; ?>" class="img-responsive"/>
				<div class="clearfix"></div>
			    <?php if($col3['title_below_image_3']){ ?><h3 class="entry-title"><?php echo $col3['column_title_3']; ?></h3><?php } ?>
			  </a>
			  <div class="entry-content">
			  	<?php echo $col3['column_text_3']; ?>
				<?php if($col3['column_cta_3']){ ?>
				 <a href='<?php echo $col3['column_link_3']; ?>' class='button home-column-cta'><?php echo $col3['column_cta_3']; ?></a>
				<?php } ?>
			  </div>
		  </div>
		</div>
		<?php endif; ?>

		<?php if($col_width=='3'): ?>
		<div class="col-sm-<?php echo $col_width ?> text-center flex-col flex-mid p-0">
		  <div class="home-column hc1">
			  <a href="<?php echo $col4['column_link_4']; ?>">
			    <?php if(!$col4['title_below_image_4']){ ?><h3 class="entry-title"><?php echo $col4['column_title_4']; ?></h3><?php } ?>
				<img src="<?php echo $col4['column_image_4']['sizes']['tablet-crop']; ?>" class="img-responsive"/>
				<div class="clearfix"></div>
			    <?php if($col4['title_below_image_4']){ ?><h3 class="entry-title"><?php echo $col4['column_title_4']; ?></h3><?php } ?>
			  </a>
			  <div class="entry-content">
			  	<?php echo $col4['column_text_4']; ?>
				<?php if($col4['column_cta_4']){ ?>
				 <a href='<?php echo $col4['column_link_4']; ?>' class='button home-column-cta'><?php echo $col4['column_cta_4']; ?></a>
				<?php } ?>
			  </div>
		  </div>
		</div>
		<?php endif; ?>

		<?php $i = false; ?>

	<?php endwhile; endif; ?>
	</div>
</div>