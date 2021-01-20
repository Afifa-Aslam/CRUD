<?php
/**
 * Theme Customizer Functions
 *
 * @package Online Eshop
 * @since 1.0
 */
$online_eshop_settings = online_eshop_get_theme_options();

$wp_customize->add_section('online_eshop_layout_options', array(
	'title' => __('Layout Options', 'online-eshop'),
	'priority' => 102,
	'panel' => 'online_eshop_options_panel'
));
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_disable_post_author]', array(
	'default' => $online_eshop_settings['online_eshop_disable_post_author'],
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_disable_post_author]', array(
	'priority'=>40,
	'label' => __('Disable Author', 'online-eshop'),
	'section' => 'online_eshop_layout_options',
	'type' => 'checkbox',
));
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_disable_post_date]', array(
	'default' => $online_eshop_settings['online_eshop_disable_post_date'],
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_disable_post_date]', array(
	'priority'=>50,
	'label' => __('Disable Date', 'online-eshop'),
	'section' => 'online_eshop_layout_options',
	'type' => 'checkbox',
));
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_disable_post_comments]', array(
	'default' => $online_eshop_settings['online_eshop_disable_post_comments'],
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_disable_post_comments]', array(
	'priority'=>60,
	'label' => __('Disable Comments', 'online-eshop'),
	'section' => 'online_eshop_layout_options',
	'type' => 'checkbox',
));
$wp_customize->add_setting('online_eshop_theme_options[online_eshop_sidebar_position]', array(
   'default'        => $online_eshop_settings['online_eshop_sidebar_position'],
   'sanitize_callback' => 'online_eshop_sanitize_select',
   'type'                  => 'option',
   'capability'            => 'manage_options'
));
$wp_customize->add_control('online_eshop_theme_options[online_eshop_sidebar_position]', array(
   'priority'  =>90,
   'label'      => __('Sidebar Position', 'online-eshop'),
   'section'    => 'online_eshop_layout_options',
   'type'       => 'select',
   'choices'    => array(
       'floatright' => __('On Right', 'online-eshop'),
       'floatnone' => __('On Left', 'online-eshop')
   ),
));