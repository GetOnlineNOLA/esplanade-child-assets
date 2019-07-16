<?php 

/**
 * Address Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview False during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'address-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'gon-address';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$include_phone = get_field('include_phone') ?: false;
$location_to_print = get_field('location_handle') ?: false;


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

<?php if(!$location_to_print){
		if(have_rows('primary_location','option')): while(have_rows('primary_location','option')): the_row();
			$address = get_sub_field('address');
			$city = get_sub_field('city');
			$state = get_sub_field('state');
			$zip = get_sub_field('zip_code');
			$phone_num = get_sub_field('primary_phone');
		endwhile; else: echo 'enter contact information on the admin panel.'; endif;	
	} else {
		if(have_rows('other_locations','option')): while(have_rows('other_locations','option')): the_row();
		$current_location = get_sub_field('handle');
			if( $current_location == $location_to_print ){
				$address = get_sub_field('address');
				$city = get_sub_field('city');
				$state = get_sub_field('state');
				$zip = get_sub_field('zip_code');
				$phone_num = get_sub_field('phone_number');
			}
		endwhile; else: echo 'enter contact information on the admin panel.'; endif;
	}

	echo $address.'<br>'.$city.', '.$state.' '.$zip.'<br>'; 
	if($include_phone){ ?>
		<a href="tel://+1<?php
	        $phone_field = $phone_num;
	        $new_phone = str_replace( '.', '', $phone_field);//removes . from phone number string
	        $new_phone = str_replace( '-', '', $new_phone);//removes - from phone number string
	        $new_phone = str_replace( ' ', '', $new_phone);
	        $new_phone = str_replace( ')', '', $new_phone);
	        $new_phone = str_replace( '(', '', $new_phone);
	        echo $new_phone;?>"><?php echo $phone_num; ?></a><br>
	<?php }
	 ?>
</div>







