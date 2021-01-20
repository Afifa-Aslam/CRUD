<?php
/**
 * Theme Customizer Functions
 *
 * @package Online Eshop
 * @since 1.0
 */

/******************** SHOPPINGCART FRONTPAGE  *********************************************/
/* Frontpage blog Online Eshop */

$online_eshop_categories_lists = online_eshop_categories_lists();

$wp_customize->add_section( 'online_eshop_frontpage_blogposts', array(
	'title' => __('Blog Posts', 'online-eshop'),
	'priority' => 20,
	'panel' =>'online_eshop_frontpage_panel'
));

// Blog Posts
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_deisable_blogpost_sec]', array(
	'default' => $online_eshop_settings['online_eshop_deisable_blogpost_sec'],
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_deisable_blogpost_sec]', array(
	'priority'=>10,
	'label' => __('Disable Blog Section', 'online-eshop'),
	'section' => 'online_eshop_frontpage_blogposts',
	'type' => 'checkbox',
));
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_blogpost_title]', array(
	'default' => $online_eshop_settings['online_eshop_blogpost_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_blogpost_title]', array(
	'priority' => 15,
	'label' => __( 'Title', 'online-eshop' ),
	'section' => 'online_eshop_frontpage_blogposts',
	'type' => 'text',
	)
);
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_blogpost_subtitle]', array(
	'default' => $online_eshop_settings['online_eshop_blogpost_subtitle'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_blogpost_subtitle]', array(
	'priority' => 20,
	'label' => __( 'Sub Title', 'online-eshop' ),
	'section' => 'online_eshop_frontpage_blogposts',
	'type' => 'text',
	)
);

$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_blogpost_category]', array(
		'default'			=> '',
		'capability'		=> 'manage_options',
		'sanitize_callback'	=> 'online_eshop_sanitize_category_select',
		'type'				=> 'option'
	));
$wp_customize->add_control('online_eshop_theme_options[online_eshop_blogpost_category]',
	array(
		'priority' 		  => 25,
		'label'			  => __('Select Post Category', 'online-eshop'),
		'description'	  => __('By default no posts is displayed', 'online-eshop'),
		'section'		  => 'online_eshop_frontpage_blogposts',
		'type'			  =>'select',
		'choices'	=>  $online_eshop_categories_lists 
	)
);

$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_num_posts]', array(
	'default' => $online_eshop_settings['online_eshop_num_posts'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_num_posts]', array(
	'priority' => 30,
	'label' => __( 'Number of Posts', 'online-eshop' ),
	'section' => 'online_eshop_frontpage_blogposts',
	'type' => 'text',
	)
);