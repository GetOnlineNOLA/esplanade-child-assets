<?php

//custom block
function gon_carrollton_child_custom_blocks() {

    // register an home columns block.
    acf_register_block_type(array(
        'name'              => 'gon-columns',
        'title'             => __('GON Themed Columns'),
        'description'       => __('Include a set of columns styled like the branded columns on the home page'),
        'render_template'   => 'blocks/home-columns.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'home-columns', 'GON' ),
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'gon_carrollton_child_custom_blocks');
}