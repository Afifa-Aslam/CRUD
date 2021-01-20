<?php 

/**
 * Plugin Name:       Exam Management System
 * Author:            Dr Farooq
 * Description:       Handle the crud for Students Result.

 * Plugin URI:        https://example.com/plugins/the-basics/
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
  * Author URI:        https:uet.edu.pk/cse
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

if (! defined('ABSPATH'))
	die('You Cannot access this file directloy');


$pluginPath = plugin_dir_url( __FILE__ );


function scripts()
{
	$pluginPath = plugin_dir_url( __FILE__ );
	wp_enqueue_style('cssfile1',$pluginPath.'css/mycss.css');
	wp_enqueue_script('jsfile2',$pluginPath.'js/jquery.min.js');
	wp_enqueue_script('jsfile3',$pluginPath.'js/jq1.js');
	wp_enqueue_script('jsfile1',$pluginPath.'js/jScript.js');
	wp_enqueue_script('jsfile4',$pluginPath.'js/bootstrap.min.js');
	wp_enqueue_style('cssfile2',$pluginPath.'css/bootstrap.min.css');
}



function my_thank_you_text ( $content ) {
    return $content .= '<p>Thank you for reading!</p>';
}



function myMenu()
{
add_menu_page( 'Customers', 'Students', 'manage_options', 'Registrationform', 'list1');
add_submenu_page( 'Registrationform','Register', 'Add', 'manage_options', 'Reg','Registrationform' );

}

add_action('wp_enqueue_scripts','scripts');
add_action( 'admin_menu', 'myMenu');
add_action( 'the_content', 'my_thank_you_text' ); 

include 'php\functionsList.php';
add_shortcode('sc_registration','Registrationform' );
add_shortcode('sc_create','create');
add_shortcode('sc_list','list1');

include 'php\ResultSheet.php';

add_shortcode('sc_quizList','quizList');
add_shortcode('sc_displyResult','displyResult');

