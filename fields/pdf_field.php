<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_59c51a69b86c4',
	'title' => 'File',
	'fields' => array (
		array (
			'key' => 'field_59c51a72bdf94',
			'label' => 'File',
			'name' => 'file',
			'type' => 'file',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => 'report-file',
			),
			'return_format' => 'array',
			'library' => 'all',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => 'pdf',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'monthly-reports',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'quarterly-reports',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'permalink',
		1 => 'the_content',
		2 => 'excerpt',
		3 => 'custom_fields',
		4 => 'discussion',
		5 => 'comments',
		6 => 'revisions',
		7 => 'slug',
		8 => 'author',
		9 => 'format',
		10 => 'page_attributes',
		11 => 'featured_image',
		12 => 'tags',
		13 => 'send-trackbacks',
	),
	'active' => 1,
	'description' => '',
));

endif;
