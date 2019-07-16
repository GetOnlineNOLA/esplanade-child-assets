<?php
function gon_enqueue_child_styles() { 
	//register styles
	wp_register_style( 'brand-base', get_stylesheet_directory_uri() . '/css/esplanade-brand-base.css' );
	wp_register_style( 'esplanade-child', get_stylesheet_directory_uri() . '/style.css' );
	
	//enqueue styles
	wp_enqueue_style( 'brand-base', get_stylesheet_directory_uri() . '/css/esplanade-brand-base.css' );
	wp_enqueue_style( 'esplanade-child', get_stylesheet_directory_uri() . '/style.css', 'theme-base' );
}

//theme styles triggered at 11 to ensure overwriting all other styles
add_action( 'wp_enqueue_scripts', 'gon_enqueue_child_styles', 11 );


if ( ! function_exists( 'gon_enqueue_child_scripts' ) ) {
	function gon_enqueue_child_scripts()
	{	
		wp_enqueue_script( 'theme', get_stylesheet_directory_uri() . '/js/theme.js', array('jquery'), null, true );
	}
}
add_action( 'wp_enqueue_scripts', 'gon_enqueue_child_scripts' );


//initiate custom fields
require_once( get_stylesheet_directory() . '/blocks-init.php' );

require_once( get_stylesheet_directory() . '/custom-fields/slideshow-fields.php' );
require_once( get_stylesheet_directory() . '/custom-fields/additional-home-page-fields.php' );
require_once( get_stylesheet_directory() . '/custom-fields/home-columns-fields.php' );
require_once( get_stylesheet_directory() . '/custom-fields/theme-config-fields.php' );

require_once( get_stylesheet_directory() . '/slideshow/admin-styles.php' );
require_once( get_stylesheet_directory() . '/home-columns/admin-styles.php' );


// hide advanced settings for all users other than GON
add_action('admin_head', 'remove_adv_access');
function remove_adv_access() {
	$myuser = wp_get_current_user();
	if($myuser->user_login!=='gon'){
	echo '<style>
	    a[href="admin.php?page=adv-settings"] {display:none!important;}
	</style>';
	}
}



//theme specific nav wrap
function standard_nav_wrap() {
  // default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
  // open the <ul>, set 'menu_class' and 'menu_id' values
  ob_start(); ?>
  <ul id="%1$s" class="%2$s">%3$s</ul>
  <?php 
  if(get_field('button-cta', 'option')):?>
    <?php echo do_shortcode(get_field('button-cta', 'option'));?>
  <?php endif;
    return ob_get_clean();
}