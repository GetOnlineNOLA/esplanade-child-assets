<?php




//addition of previously exported custom fields
if( function_exists('acf_add_local_field_group') ):

//slideshow group
acf_add_local_field_group(array(
	'key' => 'group_57854f05fdsdfd566e',
	'title' => 'Home Page Slideshow',
	'fields' => array(
		array(
			'key' => '5jngdskjn_559gfshfdgsc0frew52e54f21',
			'label' => 'Slide Text',
			'name' => 'static-slideshow-text',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'toolbar' => 'full',
			'media_upload' => 1,
			'tabs' => 'all',
		),
		array(
			'key' => 'slideshoretwgfshfdgsw-cta',
			'label' => 'Slide CTA',
			'name' => 'static-slideshow-cta',
			'type' => 'text',
			'instructions' => '*optional*',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
			),
			'taxonomy' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
		),
		array(
			'key' => 'slideshotgfshfdgsreww-cta-link',
			'label' => 'Link for CTA',
			'name' => 'static-slideshow-cta-link',
			'type' => 'text',
			'instructions' => '*optional* Copy and paste a link, don\'t forget http://',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
			),
			'taxonomy' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
		),
		array(
			'key' => '5jn85fgsdfgsdf7f6cfdsfd7feea',
			'label' => 'Swoosh Image',
			'name' => 'swoosh-image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => 'hidden',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => '5jngdskjn_57857ffsfd577fee8',
			'label' => 'Slides',
			'name' => 'repeatable-home-slides',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '5jngdskjn_57857f6cfdsfd7feea',
			'min' => '',
			'max' => '',
			'layout' => 'row',
			'button_label' => 'Add New Slide',
			'sub_fields' => array(
				array(
					'key' => '5jngdskjn_57857f6cfdsfd7feea',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => 'Upload image - exact size required 1500px x 550px @ 72dpi',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'id',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => '5jngdskjn_559c0frew52e54f21',
					'label' => 'Slide Text',
					'name' => 'slideshow-text',
					'type' => 'wysiwyg',
					'instructions' => 'Per-slide text. Note: does not display for every theme',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 1,
					'tabs' => 'all',
				),
				array(
					'key' => 'slideshoretww-cta',
					'label' => 'Slide CTA',
					'name' => 'slideshow-cta',
					'type' => 'text',
					'instructions' => 'Enter text for a CTA that sits below slideshow text ex:\'Learn More\', \'Shop Now!\'',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50%',
						'class' => '',
						'id' => '',
					),
					'post_type' => array(
					),
					'taxonomy' => array(
					),
					'allow_null' => 0,
					'multiple' => 0,
				),
				array(
					'key' => 'slideshotreww-cta-link',
					'label' => 'Link for CTA',
					'name' => 'slideshow-cta-link',
					'type' => 'text',
					'instructions' => 'Copy and paste a link, don\'t forget http://',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50%',
						'class' => '',
						'id' => '',
					),
					'post_type' => array(
					),
					'taxonomy' => array(
					),
					'allow_null' => 0,
					'multiple' => 0,
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_template',
				'operator' => '==',
				'value' => 'page-home.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));


endif;
