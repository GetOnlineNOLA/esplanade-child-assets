<?php 

/**
 * iFrame Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'iframe-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'gon-iframe';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$text = get_field('location') ?: false;
$width = get_field('width').'px' ?: '100%';
$height = get_field('height').'px' ?: '350px';
$location_to_print = get_field('location_handle') ?: false;


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<?php if(!$location_to_print){
		if(have_rows('primary_location','option')): while(have_rows('primary_location','option')): the_row();
			the_sub_field('google_maps_iframe');
		endwhile; else: echo 'enter contact information on the admin panel.'; endif;
	} else {
		if(have_rows('other_locations','option')): while(have_rows('other_locations','option')): the_row();
			$current_location = get_sub_field('handle');
			if( $current_location == $location_to_print ){
				the_sub_field('google_maps_iframe');
			}	
		endwhile; else: echo 'enter contact information on the admin panel.'; endif;
	} ?>
</div>
<style type="text/css">
    #<?php echo $id; ?> iframe {
        width: <?php echo $width; ?>!important;
        height: <?php echo $height; ?>!important;
        max-width: 100%!important;
    }
</style>