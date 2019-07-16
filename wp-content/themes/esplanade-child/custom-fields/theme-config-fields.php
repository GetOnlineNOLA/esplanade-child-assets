<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5c7efec50a671',
	'title' => 'Theme Config Options',
	'fields' => array(
		// array(
		// 	'key' => 'field_5c7efed658655',
		// 	'label' => 'Select Header Style',
		// 	'name' => 'select_header_style',
		// 	'type' => 'select',
		// 	'instructions' => '',
		// 	'required' => 0,
		// 	'conditional_logic' => 0,
		// 	'wrapper' => array(
		// 		'width' => '',
		// 		'class' => '',
		// 		'id' => '',
		// 	),
		// 	'choices' => array(
		// 		'standard' => 'Standard',
		// 		'banded' => 'Banded Navigation',
		// 		'transparent-top' => 'Transparent top-aligned Menu',
		// 		'transparent-bottom' => 'Transparent bottom-aligned Menu',
		// 		'below-slider' => 'Sticky header below slider (Home Page)',
		// 	),
		// 	'default_value' => array(
		// 	),
		// 	'allow_null' => 0,
		// 	'multiple' => 0,
		// 	'ui' => 0,
		// 	'return_format' => 'value',
		// 	'ajax' => 0,
		// 	'placeholder' => '',
		// ),
		array(
			'key' => 'field_5c7fe5702f294',
			'label' => 'Select Home Slideshow Style',
			'name' => 'select_slideshow_style',
			'type' => 'select',
			'instructions' => 'Note: "Video Slideshow" is only an option if the GON Video Slideshow plugin has been installed',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'standard' => 'Standard',
				'overlay' => 'Text Overlay',
				'tiled' => 'Two-tiled image and text',
				'swoosh' => 'Graphic under slideshow',
				'video' => 'Video Slideshow',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5c7fec7952bce',
			'label' => 'Select Home Columns Style',
			'name' => 'select_columns_style',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'standard' => 'Standard',
				'expand' => 'Expanding',
				'full' => 'Full Width',
				'overlay' => 'Image Overlay',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5c9e4917cc764',
			'label' => 'Select Footer Style',
			'name' => 'select_footer_style',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'standard' => 'Standard',
				'minimal' => 'Minimal',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'adv-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;