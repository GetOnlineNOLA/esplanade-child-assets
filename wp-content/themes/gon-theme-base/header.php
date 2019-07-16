<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri().'/images/favicon.png';?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if(function_exists('wp_body_open')){ wp_body_open(); } ?>
<?php do_action('gon_after_body_tag'); ?>

<a href="<?php echo get_home_url() ?>/wp-admin/themes.php"><h1>Install and activate child theme</h1></a>

<div id="main-content" <?php if(get_field('site-background', 'option')){ ?>style="background:url('<?php the_field('site-background', 'option');?>') repeat;"<?php } ?> >










