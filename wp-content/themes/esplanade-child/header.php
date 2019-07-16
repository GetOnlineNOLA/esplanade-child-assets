<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri().'/images/favicon.png';?>">
<?php wp_head(); ?>
</head>

<?php 
$extra_classes = array();
if(get_field('home_page_animations','options')){ array_push($extra_classes, get_field('home_page_animations','options') ); }
if(get_field('parallax_slide_show','options')){ array_push($extra_classes, 'parallax-slideshow' ); } ?>

<body <?php body_class($extra_classes); ?>>
<?php if(function_exists('wp_body_open')){ wp_body_open(); } ?>
<?php do_action('gon_after_body_tag'); ?>


<header id="header" role="banner" class="navigation">

  <div class="hamburger">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar bar1"></span>
    <span class="icon-bar bar2"></span>
    <span class="icon-bar bar3"></span>
  </div>

  <div class="flex-vert">

    <div class="top">
        <section id="branding">
            <a id="logo" href="<?php bloginfo('url'); ?>/"><img class="img-responsive" src="<?php the_field('site-logo', 'option'); ?>" alt="<?php echo esc_html(get_bloginfo('name'))?>"></a>
        </section>
    </div>

    <div class="mid">
      <nav id="menu" role="navigation">
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div>
             <ul> 
             <?php wp_nav_menu( array(
                    'menu'              => 'primary',
                    'theme_location'    => 'main-menu',
                    'depth'             => 2,
                    'container'         => 'div',
                    'menu_class'        => 'nav nav-stacked',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'items_wrap'        => standard_nav_wrap(),
                    'walker'            => new wp_bootstrap_navwalker()));?>           
            </ul> 
          </div>
      </nav>
      
    </div>

    <div class='bottom'>

       <ul class='social'>
        <?php if( have_rows('repeatable-social', 'option') ): while ( have_rows('repeatable-social', 'option') ) : the_row();?>
        <li class="social-link">
          <a href="<?php the_sub_field('social-link');?>" target="_blank">
                <?php if(get_sub_field('social-select')!=='BetterBusinessBureau'){ ?><i class="fa fa-<?php echo strtolower(get_sub_field('social-select'));?>" aria-hidden="true"></i><?php } else { ?>
                <?php ?><img src="<?php get_template_directory_uri() ?>/images/bbb.png" width='15' height='15'><?php } ?>
            </a>
        </li>
        <?php endwhile; endif; ?>
      </ul>
    
    </div>

  </div>

</header>

<div class="menu-overlay hidden"></div>


<div id="main-content" <?php if(get_field('site-background', 'option')){ ?>style="background:url('<?php the_field('site-background', 'option');?>') repeat;"<?php } ?> >

<?php if( !is_front_page() && get_field('show_header_image', get_the_ID() ) ){?>

<section class="container-fluid head-img" style="background:url(<?php if( get_field('custom_header_image', get_the_ID()) ): the_field('custom_header_image', get_the_ID()); else : the_field('default-header-image', 'option'); endif; ?>) transparent no-repeat center center;background-size:cover;<?php if(get_field('header_height',get_the_ID())): echo 'min-height:'.get_field('header_height',get_the_ID()); else : echo 'min-height:10em;'; endif; ?>">
</section>

<?php } ?>











