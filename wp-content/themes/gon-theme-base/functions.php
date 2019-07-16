<?php
add_action('after_setup_theme', 'gon_base_theme_setup');
function gon_base_theme_setup()
{
    load_theme_textdomain('gon_base_theme', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    //add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
	if (function_exists('add_image_size')) { 
		add_image_size('shallow-crop', 9999, 200);//unlimited width but only 200 high
		add_image_size('slideshow-crop', 1500, 550, array('center', 'center'));//1500 wide by 550 high
		add_image_size('tablet-crop', 768, 480, array('center', 'center'));//1500 wide by 550 high
		add_image_size('medium-square-crop', 375, 375, array('center', 'center'));//375 wide (iPhone-6) by 375 high
	}
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'gon_base_theme'),
        'footer-menu' => __('Footer Menu', 'gon_base_theme')
    ));
}
add_action('wp_enqueue_scripts', 'gon_base_theme_load_scripts');
//conditionally checking on the function_exists means child theme can write first with same name
function gon_base_theme_enqueue_styles() {
	//register styles
	wp_register_style( 'meyer-reset', 'https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css' );
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_register_style( 'utility-classes', 'https://assets.getonlinenola.com/css/utility-classes.css' );
	wp_register_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	
	wp_enqueue_style( 'meyer-reset', 'https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css' );
	wp_enqueue_style( 'bootstrap' , get_template_directory_uri() . '/css/bootstrap.min.css', 'meyer-reset' );
	wp_enqueue_style( 'utility-classes' , 'https://assets.getonlinenola.com/css/utility-classes.css', 'bootstrap' );
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', 'utility-classes' );
}
add_action( 'wp_enqueue_scripts', 'gon_base_theme_enqueue_styles' );

if ( ! function_exists( 'gon_base_theme_load_scripts' ) ) {
	function gon_base_theme_load_scripts()
	{	
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery') );
		wp_enqueue_script( 'cycle', get_template_directory_uri() . '/js/jquery.cycle2.min.js', array('jquery') );
	}
}

add_action('comment_form_before', 'gon_base_theme_enqueue_comment_reply_script');
function gon_base_theme_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_filter('the_title', 'gon_base_theme_title');
function gon_base_theme_title($title)
{
    if ($title == '') {
        return '&rarr;';
    } else {
        return $title;
    }
}
add_filter('wp_title', 'gon_base_theme_filter_wp_title');
function gon_base_theme_filter_wp_title($title)
{
    return $title . esc_attr(get_bloginfo('name'));
}
add_action('widgets_init', 'gon_base_theme_widgets_init');
function gon_base_theme_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar Widget Area', 'gon_base_theme'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
	
	register_sidebar(array(
        'name' => 'Footer One',
        'id'   => 'footer-widget-one',
        'description'   => 'Left Footer widget position.',
        'before_widget' => '<div class="footer-widget center-block %1s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="footer-header"><h4>',
        'after_title'   => '</h4></div>'
    ));

    register_sidebar(array(
        'name' => 'Footer Two',
        'id'   => 'footer-widget-two',
        'description'   => 'Center Left Footer widget position.',
        'before_widget' => '<div class="footer-widget center-block %1s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="footer-header"><h4>',
        'after_title'   => '</h4></div>'
    ));

    register_sidebar(array(
        'name' => 'Footer Three',
        'id'   => 'footer-widget-three',
        'description'   => 'Center Right Footer widget position.',
        'before_widget' => '<div class="footer-widget center-block %1s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="footer-header"><h4>',
        'after_title'   => '</h4></div>'
    ));

    register_sidebar(array(
        'name' => 'Footer Four',
        'id'   => 'footer-widget-four',
        'description'   => 'Right Footer widget position.',
        'before_widget' => '<div class="footer-widget center-block %1s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="footer-header"><h4>',
        'after_title'   => '</h4></div>'
    ));
}
function gon_base_theme_custom_pings($comment)
{
    $GLOBALS['comment'] = $comment;
?>
<li <?php
    comment_class();
?> id="li-comment-<?php
    comment_ID();
?>"><?php
    echo comment_author_link();
?></li>
<?php
}
add_filter('get_comments_number', 'gon_base_theme_comments_number');
function gon_base_theme_comments_number($count)
{
    if (!is_admin()) {
        global $id;
        $comments_by_type =& separate_comments(get_comments('status=approve&post_id=' . $id));
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}

//alternative navwrap
function gon_base_theme_nav_wrap() {
  // default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
  // open the <ul>, set 'menu_class' and 'menu_id' values
  ob_start();
  ?><ul id="%1$s" class="%2$s">%3$s <?php if(get_field('button-cta', 'option')):?><li class="header-cta-button"><?php echo do_shortcode(get_field('button-cta', 'option'));?></li><?php endif;?>
  <?php	if( have_rows('repeatable-social', 'option') ):
		// loop through the rows of data
		while ( have_rows('repeatable-social', 'option') ) : the_row();
		?><li class="social-link">
            	<a href="<?php the_sub_field('social-link');?>" target="_blank">
                    <?php if(get_sub_field('social-select')!=='BetterBusinessBureau'){ ?><i class="fa fa-<?php echo strtolower(get_sub_field('social-select'));?>" aria-hidden="true"></i><?php } else { ?>
                    <?php ?><img src="<?php get_template_directory_uri() ?>/images/bbb.png" width='15' height='15'><?php } ?>
                </a>
            </li>
            <?php
		endwhile;
	else :
		// no rows found
	endif;?></ul><?php
  return ob_get_clean();
}

//hide the main editor by template (for home page on base_theme)
 add_action( 'admin_head', 'hide_editor' );
 function hide_editor() {
	global $pagenow;
    if( !( 'post.php' == $pagenow ) ) return;
	 
 	// Get the Post ID.
	global $post;
 	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
 	if( !isset( $post_id ) ) return;

 	// Get the name of the Page Template file.
 	$template_file = get_post_meta($post_id, '_wp_page_template', true);
    
     if($template_file == 'page-contact.php'){ 
		 // edit the template name
     	remove_post_type_support('page', 'editor');//editor added back to page-home.php design at this point
     }
 }

//make shortcode work in widgets
add_filter('widget_text', 'do_shortcode');

//custom variable sortcode function
function gon_base_theme_shortcode($atts, $content = null) {
   extract(shortcode_atts(array('link' => '#', 'class' => '', 'style' => '', 'target' => ''), $atts));
   return '<a class="button fancy-font-i '.$class.'" href="'.wp_kses($link, array('a' => array('href' => array()))).'" style="'.$style.'" target="'.$target.'"><span>' . do_shortcode($content) . '</span></a>';
}
add_shortcode('variable-button', 'gon_base_theme_shortcode');

//custom read more
if ( ! function_exists( 'gon_base_theme_excerpt_more' ) ) {
	// Replaces the excerpt "Read More" text by a link
	function gon_base_theme_excerpt_more($more) {
		   global $post;
		return '<a class="read-more button background-color-i fancy-font-i" href="'. get_permalink($post->ID) . '">Read More</a>';
	}
	add_filter('excerpt_more', 'gon_base_theme_excerpt_more');
}

//base_theme, restrict access to featured image on contact page
add_action( 'do_meta_boxes', 'gon_base_theme_remove_thumbnail_box' );
function gon_base_theme_remove_thumbnail_box() 
{
    // Not really necessary, but just in case
    if( !isset( $_GET['post'] ) )
        return;
    $template = get_post_meta( $_GET['post'] , '_wp_page_template', true );
    if( 'page-contact.php' == $template )
    {
			remove_meta_box( 'postimagediv','page','side' );
    }
}
//get page id from selected template
function gon_id_from_template($template_name_dot_php = "page-home.php"){
	$args = [
		'post_type' => 'page',
		'fields' => 'ids',
		'nopaging' => true,
		'meta_key' => '_wp_page_template',
		'meta_value' => $template_name_dot_php
	];
	$pages = get_posts( $args );
	//$pages = "anything";
	return $pages[0];
}

//remove thumbnail from pages
add_action( 'init', 'gon_remove_thumbnail');
function gon_remove_thumbnail() {
    remove_post_type_support( 'page', 'thumbnail' );
}




// ACF custom styles  
function my_acf_admin_head() { ?>
    <style type="text/css">
    .acf-repeater .acf-row:nth-child(odd) > .acf-row-handle.order,
    .acf-repeater .acf-row:nth-child(odd) > .acf-row-handle.remove,
    .acf-repeater .acf-row:nth-child(odd) > .acf-fields.-left > .acf-field:before,
    .acf-repeater .acf-row:nth-child(odd) > .acf-row-handle.order + td {
        background: #d2d2d2;
    }
    .acf-flexible-content .layout {
        border: 1px solid #666;
        box-shadow: 0px 0px 5px rgba(0,0,0,.5);
    }
    .acf-flexible-content .layout.-collapsed {
        border: 1px solid #e1e1e1;
        box-shadow: none;
    }
    .heavy-border {
        border: 1px solid #0085ba!important;
    }
    .grey1 {background-color: #ddd!important;}
    .grey2 {background-color: #ccc!important;}
    .grey3 {background-color: #bbb!important;}
    .clear-right {clear: right!important;}
    .clear-left {clear: left!important;}
    .clear-both {clear: both!important;}
    </style>
<?php }
add_action('acf/input/admin_head', 'my_acf_admin_head');

//admin styles
function gon_admin_styles() { ?>
  <style>
    li#toplevel_page_site-settings,
    #adminmenu li.wp-has-current-submenu#toplevel_page_site-settings a.wp-has-current-submenu,
    #adminmenu li.menu-top#toplevel_page_site-settings:hover, 
    #adminmenu li.opensub#toplevel_page_site-settings#toplevel_page_site-settings>a.menu-top, 
    #adminmenu li#toplevel_page_site-settings>a.menu-top:focus {
        background: linear-gradient(to right,#5ae4c0 0%,#238fa1 100%)!important;
    }

    #adminmenu #toplevel_page_site-settings div.wp-menu-image:before {
        background-image: Url(http://pagebuilder.gonstaging.com/wp-content/themes/frenchman-child/images/gonFav.png);
        background-size:  100%;
        background-repeat:  no-repeat;
        background-position: 0 8px;
        content: "";
    }
    #adminmenu li#toplevel_page_site-settings ul.wp-submenu.wp-submenu-wrap {
        background: #212643!important;
        border-bottom: 1px solid #2393a5;
    }

    #adminmenu #toplevel_page_site-settings div.wp-menu-name {
        color: #212643;
    }

    li#menu-posts-rl_gallery,
    li#toplevel_page_responsive-lightbox-settings {
        display: none;
    }
  </style>
<?php }
add_action('admin_head', 'gon_admin_styles');


// Allow SVG uploads
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');





//included files
require_once('wp_bootstrap_navwalker.php');
require_once( get_template_directory() . '/gon/gon-site-init.php');
require_once( get_template_directory() . '/custom-blocks-init.php');
require_once( get_template_directory() . '/gon/shortcodes.php');
require_once( get_template_directory() . '/gon/custom-field-config.php');

