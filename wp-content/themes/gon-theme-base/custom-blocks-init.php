<?php


//custom block
function gon_register_custom_blocks() {

    // register an iframe block.
    acf_register_block_type(array(
        'name'              => 'iframe',
        'title'             => __('Google Maps iFrame'),
        'description'       => __('Include Google Maps iFrame from \'Contact Information\' settings.'),
        'render_template'   => 'blocks/iframe.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'iframe', 'GON' ),
    ));

    // register an address block.
    acf_register_block_type(array(
        'name'              => 'address',
        'title'             => __('Address'),
        'description'       => __('Include Address from \'Contact Information\' settings.'),
        'render_template'   => 'blocks/address.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'address', 'GON' ),
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'gon_register_custom_blocks');
}

require_once( get_template_directory() . '/block-fields.php' );

?>