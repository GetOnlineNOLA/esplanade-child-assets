<?php




//////////////////////////////////
//////////////////////////////////
//contact information shortcodes//
//////////////////////////////////
//////////////////////////////////

if( ! function_exists('gon_the_address') ):

	//address
	function gon_the_address($atts,$content=null){ 
		//reset_rows();	
		$atts = shortcode_atts( array(
			'location'  => 0
		), $atts, 'gon-google-iframe' );
		$location_to_print = $atts['location'];
		$address_str = '';
		ob_start();	
		
		if(!$location_to_print){
			if(have_rows('primary_location','option')): while(have_rows('primary_location','option')): the_row();
				$address = get_sub_field('address');
				$city = get_sub_field('city');
				$state = get_sub_field('state');
				$zip = get_sub_field('zip_code');	
			endwhile; else: echo 'enter contact information on the admin panel.'; endif;	
		} else {
			if(have_rows('other_locations','option')): while(have_rows('other_locations','option')): the_row();
			$current_location = get_sub_field('handle');
				if( $current_location == $location_to_print ){
					$address = get_sub_field('address');
					$city = get_sub_field('city');
					$state = get_sub_field('state');
					$zip = get_sub_field('zip_code');
				}
			endwhile; else: echo 'enter contact information on the admin panel.'; endif;
		}
		
		?><span><?php echo $address.'<br>'.$city.', '.$state.' '.$zip; ?></span><?php
		
		$address_str = ob_get_clean();
		return $address_str;

	}
	add_shortcode('gon-address','gon_the_address');

endif;




if( ! function_exists('gon_the_phone') ):

	//phone
	function gon_the_phone($atts,$content=null){ 
		//reset_rows();	
		$atts = shortcode_atts( array(
			'location'  => 0
		), $atts, 'gon-google-iframe' );
		$location_to_print = $atts['location'];
		$phone_str = '';
		ob_start();	
		
		if(!$location_to_print){
			if(have_rows('primary_location','option')): while(have_rows('primary_location','option')): the_row();
				$phone_num = get_sub_field('primary_phone');		
			endwhile; else: echo 'enter contact information on the admin panel.'; endif;	
		} else {
			if(have_rows('other_locations','option')): while(have_rows('other_locations','option')): the_row();
			$current_location = get_sub_field('handle');
				if( $current_location == $location_to_print ){
					$phone_num = get_sub_field('phone_number');
				}
			endwhile; else: echo 'enter contact information on the admin panel.'; endif;
		}
			
		if(!empty($phone_num)): ?>
	       <a href="tel://+1<?php
	        $phone_field = $phone_num;
	        $new_phone = str_replace( '.', '', $phone_field);//removes . from phone number string
	        $new_phone = str_replace( '-', '', $new_phone);//removes - from phone number string
	        $new_phone = str_replace( ' ', '', $new_phone);
	        $new_phone = str_replace( ')', '', $new_phone);
	        $new_phone = str_replace( '(', '', $new_phone);
	        echo $new_phone;?>"><?php echo $phone_num; ?></a>
		<?php endif;
		
		$phone_str = ob_get_clean();
		return $phone_str;

	}
	add_shortcode('gon-phone','gon_the_phone');

endif;




if( ! function_exists('gon_the_fax') ):

	//fax
	function gon_the_fax($atts,$content=null){ 
		//reset_rows();	
		$atts = shortcode_atts( array(
			'location'  => 0
		), $atts, 'gon-google-iframe' );
		$location_to_print = $atts['location'];
		$fax_str = '';
		ob_start();	
		
		if(!$location_to_print){
			if(have_rows('primary_location','option')): while(have_rows('primary_location','option')): the_row();
				$fax = get_sub_field('fax');		
			endwhile; else: echo 'enter contact information on the admin panel.'; endif;	
		} else {
			if(have_rows('other_locations','option')): while(have_rows('other_locations','option')): the_row();
			$current_location = get_sub_field('handle');
				if( $current_location == $location_to_print ){
					$fax = get_sub_field('fax');
				}
			endwhile; else: echo 'enter contact information on the admin panel.'; endif;
		}
			
	    ?>
	    <strong>Fax:</strong>
	    <a href="#/"><?php echo $fax; ?></a>
	    <?php
		
		$fax_str = ob_get_clean();
		return $fax_str;

	}
	add_shortcode('gon-fax','gon_the_fax');

endif;




if( ! function_exists('gon_the_office_photo') ):

	//office photo
	function gon_the_office_photo($atts,$content=null){ 
		//reset_rows();	
		$atts = shortcode_atts( array(
			'location'  => 0
		), $atts, 'gon-google-iframe' );
		$location_to_print = $atts['location'];
		$office_img = '';
		ob_start();	
		
		if(!$location_to_print){
			if(have_rows('primary_location','option')): while(have_rows('primary_location','option')): the_row();
				$office = get_sub_field('office_photo');		
			endwhile; else: echo 'enter contact information on the admin panel.'; endif;	
		} else {
			if(have_rows('other_locations','option')): while(have_rows('other_locations','option')): the_row();
				$current_location = get_sub_field('handle');
				if( $current_location == $location_to_print ){
					$office = get_sub_field('office_photo');
				}	
			endwhile; else: echo 'enter contact information on the admin panel.'; endif;
		}
		
		?><img style='max-width:100%' class='office-photo' src='<?php echo $office["url"]; ?>' /><?php
		$office_img = ob_get_clean();
		return $office_img;
	}
	add_shortcode('gon-office-photo','gon_the_office_photo');

endif;




if( ! function_exists('gon_the_office_iframe') ):

	//office iframe
	function gon_the_office_iframe($atts,$content=null){ 
		//reset_rows();
		$atts = shortcode_atts( array(
			'location'  => 0
		), $atts, 'gon-google-iframe' );
		$location_to_print = $atts['location'];	
		$office_iframe = '';
		ob_start();	
		
		if(!$location_to_print){
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
		}
			
		
		$office_iframe = ob_get_clean();
		return $office_iframe;
	}
	add_shortcode('gon-google-iframe','gon_the_office_iframe');

endif;

//////////////////////////////////////
//////////////////////////////////////
//end contact information shortcodes//
//////////////////////////////////////
//////////////////////////////////////



//////////////////////////////////////
//////////////////////////////////////
/////////social media display/////////
//////////////////////////////////////
//////////////////////////////////////
if( ! function_exists('gon_social_display') ):

	function gon_social_display($atts,$content=null){

		$atts = shortcode_atts( array(
			'style'  => 'standard',
			'color' => null,
			'size' => 18,
			'hover' => 'opacity',
			'background' => null,
			'border' => null,
		), $atts, 'gon-social' );
		
		$style = $atts['style'];
		$color = $atts['color'];
		$size = $atts['size'];
		$hover = $atts['hover'];
		$bg = $atts['background'];
		$border = $atts['border'];

		if ( $color == 'native' ) { $color = ''; }
		else if($color){ $color = 'color:'.$color.';'; }
		else { $color = 'color:inherit!important;'; }

		if ( $bg == 'native' ) { $bg = ''; }
		else if($bg){ $bg = 'background-color:'.$bg.';'; }
		else { $bg = 'background-color:none;'; }

		$css = '';
		if($border){ $border_extra = 5; } else { $border_extra = 0; }

		if($style=='standard'){
			$css = $color.'font-size:'.$size.'px;';
		} else if ($style=='circle'){
			$css = $color.'font-size:'.$size.'px;width:'.($size*3/2+$border_extra).'px;height:'.($size*3/2+$border_extra).'px;line-height:'.($size*3/2).'px;border-radius:100%;'.$bg;
			if($border){ $css .= 'border:2px solid '.$border.';'; }
		} else if ($style=='square'){
			$css = $color.'font-size:'.$size.'px;width:'.($size*3/2+$border_extra).'px;height:'.($size*3/2+$border_extra).'px;line-height:'.($size*3/2).'px;'.$bg;
			if($border){ $css .= 'border:2px solid '.$border.';'; }
		}
		

		$socialHTML = '';
		ob_start();?>

		<ul style="list-style:none;margin:.5em 0;">

		<?php if( have_rows('repeatable-social', 'option') ): while ( have_rows('repeatable-social', 'option') ) : the_row(); ?>

			<li class="social-link <?php echo $style; ?>" style="list-style:none;padding:0 10px;">
	        	<a href="<?php the_sub_field('social-link');?>" target="_blank">
	            	<i class="fa fa-<?php echo strtolower(get_sub_field('social-select')); echo ' '.$hover; if($atts['color']=='native'){ echo ' native'; } if($atts['background']=='native'){ echo ' native-bg'; } ?>"
	            	   style="<?php echo $css; ?>" 
	            	   aria-hidden="true"></i>
	        	</a>
	        </li>

		<?php endwhile; endif; ?>

		</ul>

		<?php $socialHTML = ob_get_clean();
		return $socialHTML;

	}

	add_shortcode('gon-social','gon_social_display');

endif;


