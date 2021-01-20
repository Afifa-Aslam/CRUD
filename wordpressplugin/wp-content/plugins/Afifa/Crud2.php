<?php

/** 
 * @package CRUD
 */
/*
Plugin Name: CRUD
Plugin URI:
Description: This is my CRUD plugin.
Version: 1.0.0
Author: Afifa

*/


 
defined('ABSPATH') or die('Hey, you cannot access this page');



class CRUDCLASS{
    function activate()
    {
        CRUDCLASS::createTable();
    }
    
    //function implimentations
    function enqueue()
    {
        wp_enqueue_style('myStyle', plugins_url('/assets/style.css', __FILE__));
        wp_enqueue_script('myScript', plugins_url('/assets/script.js', __FILE__));
    }
    function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        // add_action('wp_enqueue_scripts', array($this,'enqueue'));//for front end customization

        add_action('admin_menu', array($this, 'addAdminPages'));
    }
    
    public function addAdminPages()
    {
        add_menu_page('CRUD Plugin', "CRUD", 'manage_options', 'CRUD_plugin', array($this, 'admin_index'), '', 110);
    }
    
    public function admin_index()
    {
        require_once plugin_dir_path(__FILE__) . 'templates/home.php';
        sendDataIntoTable();
        $this->leacture_data_show_fun();
    }

    public static function leacture_data_show_fun()
    {
        require_once plugin_dir_path(__FILE__) . 'templates/leacture_data_show.php';
    }

    public static function dropdownlist()
    {
        require_once plugin_dir_path(__FILE__) . 'templates/dropdownlist.php';
    }
    

    function createTable(){
        global $wpdb;
        $table_name = $wpdb->prefix . "lecture_details";
        $my_lectures_db_version = '1.0.0';
        $charset_collate = $wpdb->get_charset_collate();
        
        if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) {
        
            $sql = "CREATE TABLE $table_name (
                    ID mediumint(9) NOT NULL AUTO_INCREMENT,
                    `lectureName` text NOT NULL,
                    `lectureDescription` text NOT NULL,
                    PRIMARY KEY  (ID)
            )    $charset_collate;";
        
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta( $sql );
            add_option( 'my_db_version', $my_products_db_version );
        }
    }
}
if (class_exists('CRUDCLASS')) {
    $CRUDCLASSObject = new CRUDCLASS();
    $CRUDCLASSObject->register();
}

//shortCodes
add_shortcode('SC_LectureSummary', array('CRUDCLASS','leacture_data_show_fun'));  
add_shortcode('SC_ResultFilter', array('CRUDCLASS','dropdownlist'));  

//activate hook
register_activation_hook( __FILE__, array('CRUDCLASS','activate') );

