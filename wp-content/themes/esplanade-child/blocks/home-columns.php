<?php 

/**
 * Columns Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'columns-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'gon-columns';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.



?>

<?php $columns = get_field('select_columns_style','option'); ?>

<section id="home-columns" class="gon_columns-<?php echo $columns.' '; echo esc_attr($className); ?>">

<?php switch ($columns) {
  case 'standard':
    get_template_part('home-columns/standard');
    break;
  case 'expand':
    get_template_part('home-columns/expand');
    break;
  case 'full':
    get_template_part('home-columns/full');
    break;
  case 'overlay':
    get_template_part('home-columns/overlay');
    break;
  
  default:
    echo 'please select home-columns style in GON Theme Settings > Advanced Settings';
    break;
} ?>

</section>
