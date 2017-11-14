<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_5a05e9c0edb76',
	'title' => 'Document',
	'fields' => array (
		array (
			'key' => 'field_5a05eafae91d4',
			'label' => 'Source',
			'name' => 'source',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'File' => 'File',
				'URL' => 'URL',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'File',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array (
			'key' => 'field_5a05ea84e91d3',
			'label' => 'File',
			'name' => 'file',
			'type' => 'file',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5a05eafae91d4',
						'operator' => '==',
						'value' => 'File',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'File' => 'all',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_5a05ebcc83354',
			'label' => 'URL',
			'name' => 'url',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5a05eafae91d4',
						'operator' => '==',
						'value' => 'URL',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'educator-documents',
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
