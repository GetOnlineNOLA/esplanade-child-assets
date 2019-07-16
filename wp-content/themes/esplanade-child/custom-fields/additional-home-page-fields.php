<?php




//addition of previously exported custom fields
if( function_exists('acf_add_local_field_group') ):
	
//additional home page content
acf_add_local_field_group(array(
	'key' => 'group_5sdaa0b1ff3ecbce',
	'title' => 'Additional Home Page Content',
	'fields' => array(
		array(
			'key' => '5jngdskjn_5a0b201cab7f5',
			'label' => 'Include additional homepage content?',
			'name' => 'include_additional_homepage_content',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => '5jngdskjn_5a0b20ceab7f6',
			'label' => 'Section Title',
			'name' => 'section_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => '5jngdskjn_5a0b201cab7f5',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => '5jngdskjn_5a0b42ebfbf31',
			'label' => 'Shortcodes',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => '5jngdskjn_5a0b201cab7f5',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'Paste these shortcodes to include info from the <a href=\'admin.php?page=contact-info\' target=\'_blank\'>"Contact Information"</a> section:
<strong>[gon-address] [gon-phone] [gon-office-photo] [gon-google-iframe]. </strong>
Use location="handle" to get contact information from a secondary location ( example <strong>[gon-office-photo location="baton-rouge"]</strong> )',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => '5jngdskjn_5a0c931ec2ca6',
			'label' => 'Content Columns',
			'name' => 'content_columns',
			'type' => 'repeater',
			'instructions' => 'Max 3 columns. Content will display in equal width columns depending on how many content sections you create. (ex: if you only create one column, content will display full width. If you create 2 columns, content will display in two columns, each with a width of 50%)',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => '5jngdskjn_5a0b201cab7f5',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '5jngdskjn_5a0c944933069',
			'min' => 0,
			'max' => 3,
			'layout' => 'block',
			'button_label' => 'Add Column',
			'sub_fields' => array(
				array(
					'key' => '5jngdskjn_5a0c944933069',
					'label' => 'Content Column',
					'name' => '',
					'type' => 'message',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'new_lines' => 'wpautop',
					'esc_html' => 0,
				),
				array(
					'key' => '5jngdskjn_5a0c93c7c2ca7',
					'label' => 'Content',
					'name' => 'content',
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
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
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
	'menu_order' => 10,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
