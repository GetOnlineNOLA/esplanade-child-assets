<?php
//initialize site with included plugins suggestions

/**
 * Include the TGM_Plugin_Activation class.
 * Depending on your implementation, you may want to change the include call:
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function my_theme_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin as a zip from the themes directory.
		array(
			'name'               => 'Advanced Custom Fields Pro', // The plugin name.
			'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
			'source'             => get_template_directory_uri() . '/gon/advanced-custom-fields-pro.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
		),
		
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		/*array(
			'name'      => 'Coming Soon Page & Maintenance Mode',
			'slug'      => 'coming-soon',
			'required'  => true,
			'force_activation'  => false,
		),*/
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => true,
			'force_activation'  => false,
		),
		array(
			'name'      => 'Contact Form 7 Honeypot',
			'slug'      => 'contact-form-7-honeypot',
			'required'  => true,
			'force_activation'  => false,
		),
		array(
			'name'      => 'Contact Form Submissions',
			'slug'      => 'contact-form-submissions',
			'required'  => true,
			'force_activation'  => false,
		),
		array(
			'name'      => 'Manual Image Crop',
			'slug'      => 'manual-image-crop',
			'required'  => true,
			'force_activation'  => false,
		),
		array(
			'name'      => 'Reorder posts',
			'slug'      => 'metronet-reorder-posts',
			'required'  => true,
			'force_activation'  => false,
		),
		array(
			'name'      => 'Yoast SEO',
			'slug'      => 'wordpress-seo',
			'required'  => true,
			'force_activation'  => false,
		),		
		array(
			'name'      => 'Reorder Posts',
			'slug'      => 'metronet-reorder-posts',
			'required'  => true,
			'force_activation'  => false,
		),		
		array(
			'name'      => 'Google Analytics Dashboard for WP (GADWP)',
			'slug'      => 'google-analytics-dashboard-for-wp',
			'required'  => true,
			'force_activation'  => false,
		),		
		array(
			'name'      => 'ManageWP - Worker',
			'slug'      => 'worker',
			'required'  => true,
			'force_activation'  => false,
		),		
		array(
			'name'      => 'Regenerate Thumbnails',
			'slug'      => 'regenerate-thumbnails',
			'required'  => true,
			'force_activation'  => false,
		),
		
		//the events calendar should be tested and added here in future releases
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 * See original example for further details
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}



//clearing up
//minify everything possible

//remove user's ability to edit plugin or theme from the backend
define( 'DISALLOW_FILE_EDIT', true );

//define custom admin js and css
add_action('admin_enqueue_scripts', 'gon_carrolton_admin_style');
function gon_carrolton_admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin.css');
  wp_enqueue_script('admin-scripts', get_template_directory_uri().'/js/admin.js');
}
//additional speed and convnience fixes
//Add the ability to use shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );
//Prevent WordPress from compressing images
add_filter( 'jpeg_quality', function ( $quality ) { return 100; } );
//Disable any and all mention of emoji's
//Source code credit: http://ottopress.com/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );   
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );     
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
//* Remove items from the <head> section
remove_action( 'wp_head', 'wp_generator' );							//* Remove WP Version number
remove_action( 'wp_head', 'wlwmanifest_link' );						//* Remove wlwmanifest_link
remove_action( 'wp_head', 'rsd_link' );								//* Remove rsd_link
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );			//* Remove shortlink
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );	//* Remove previous/next post links
//white label wordpress backend
add_action('login_head', 'gon_carrolton_custom_login_logo');
function gon_carrolton_custom_login_logo() {
    echo '<style type="text/css">h1 a { background-image:url('.get_template_directory_uri().'/images/favicon.png) !important; background-size: 148px 146px !important;height: 146px !important; width: 148px !important; margin-bottom: 0 !important; padding-bottom: 0 !important; }
    .login form { margin-top: 10px !important; }
    </style>'; 
}
add_filter( 'login_headerurl', 'gon_carrolton_url_login' );
function gon_carrolton_url_login(){
	return 'https://getonlinenola.com';
	//return get_bloginfo( 'wpurl' ); //This line keeps the link on current website instead of getonlinenola or WordPress.org
}
add_filter( 'admin_footer_text', 'gon_carrolton_modify_footer_admin' );
function gon_carrolton_modify_footer_admin () {
  echo '<span id="footer-thankyou">Theme Development by <a href="http://getonlinenola.com" target="_blank">Get Online NOLA</a></span>';
}
add_action('wp_dashboard_setup', 'gon_carrolton_add_dashboard_widgets' );
function gon_carrolton_add_dashboard_widgets() {
  wp_add_dashboard_widget('wp_dashboard_widget', 'Theme Details', 'gon_carrolton_theme_info');
}
function gon_carrolton_theme_info() {
  echo '<ul>
  <li><strong>Developed By:</strong> <a href="http://getonlinenola.com" target="_blank">Get Online NOLA</a>, LLC</li>
  <li><strong>Website:</strong> <a href="http://getonlinenola.com" target="_blank">Get Online NOLA</a></li>
  <li><strong>Latest Wordpress Workshop Information:</strong> <a href="https://getonlinenola.com/category/workshops/" target="_blank">Click Here</a></li>
  </ul>';
 
}
