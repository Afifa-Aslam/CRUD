<?php

/*
  Plugin Name: Data
  Description: Data insertion and data show
  Version: 1
  Author: Afifa Aslam Siddiqui
  Author URI: https://www.linkedin.com/in/afifa-aslam-siddiqui-516aba185/
  
 */
//creating database
/*global $at_db_version;
$at_db_version = '1.0';
function at_datatable() {
    global $wpdb;
    global $at_db_version;
    $table_name = $wpdb->prefix . 'employee_list';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name(100) DEFAULT '' NOT NULL,
        role(100) DEFAULT '' NOT NULL,
        contact(100) DEFAULT '' NOT NULL,
        UNIQUE KEY id (id)
    ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
    add_option('at_db_version', $at_db_version);
}
register_activation_hook(__FILE__, 'at_datatable');*/
global $jal_db_version;
$jal_db_version = '1.0';

function jal_install() {
    global $wpdb;
    global $jal_db_version;

    $table_name = $wpdb->prefix . 'employee_list1';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name tinytext NOT NULL,
        address text NOT NULL, 
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option( 'jal_db_version', $jal_db_version );
}
register_activation_hook( __FILE__, 'jal_install' );
//adding in menu
add_action('admin_menu', 'at_try_menu');

function at_try_menu() {
    //adding plugin in menu
    add_menu_page('employee_list', //page title
        'Employee Listing', //menu title
        'manage_options', //capabilities
        'Employee_Listing', //menu slug
        'employee_list' //function
    );
    //adding submenu to a menu
    add_submenu_page('Employee_Listing',//parent page slug
        'employee_insert',//page title
        'Employee Insert',//menu titel
        'manage_options',//manage optios
        'Employee_Insert',//slug
        'employee_insert'//function
    );
    
}


// returns the root directory path of particular plugin
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'employee_list.php');
require_once (ROOTDIR.'employee_insert.php');

?>