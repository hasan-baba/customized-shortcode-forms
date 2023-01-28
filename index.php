<?php
/*
Plugin Name: Forms Functionality
Description: Forms Functionality for Najafdacards.com
Author: Najaf Cards
Version: 1.0.0
*/


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if( !class_exists('WP_List_Table')) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

// calling sidebar menu
include_once dirname(__FILE__) . '/admin/admin-menu.php';
include_once dirname(__FILE__) . '/admin/pages/forms_welcome.php';
include_once dirname(__FILE__) . '/admin/pages/vip/all_applications.php';
include_once dirname(__FILE__) . '/admin/pages/vip/edit_vip_application.php';
include_once dirname(__FILE__) . '/admin/pages/vip/validate_application_vip.php';
include_once dirname(__FILE__) . '/admin/pages/identification/all_applications.php';
include_once dirname(__FILE__) . '/admin/pages/identification/edit_identification_application.php';
include_once dirname(__FILE__) . '/admin/pages/identification/validate_application_identity.php';
include_once dirname(__FILE__) . '/admin/class/vip-class-list.php';
include_once dirname(__FILE__) . '/admin/class/identification-class-list.php';
include_once dirname(__FILE__) . '/admin/class/check_current_users.php';

// enque shortcode functions
include_once dirname(__FILE__) . '/functions/shortcodes/identity_survey.php';
include_once dirname(__FILE__) . '/functions/shortcodes/vip_survey.php';
include_once dirname(__FILE__) . '/functions/functions.php';
include_once dirname(__FILE__) . '/functions/vip_db.php';
include_once dirname(__FILE__) . '/functions/identity_db.php';
include_once dirname(__FILE__) . '/functions/vip_validate_app_db.php';
include_once dirname(__FILE__) . '/functions/identity_validate_app_db.php';


// admin funcionalities and roles
include_once dirname(__FILE__) . '/admin/functions/admin-functions.php';


// including front styles and JS files
function forms_front_enque_scripts()
{
    // styles
    wp_enqueue_style('forms-main-css', plugin_dir_url(__FILE__) . 'assets/css/forms-front-styles.css', array(), time());

    // javascipt
    wp_enqueue_script('forms-main-js', plugin_dir_url(__FILE__) . 'assets/js/forms-validation.js', array('jquery'), time());
}
add_action('wp_enqueue_scripts', 'forms_front_enque_scripts');

// including backend styles
function forms_backend_enque_scripts()
{
    // styles
    wp_enqueue_style('forms-backend-css', plugin_dir_url(__FILE__) . 'assets/css/admin-styles.css', array(), time());

    // javascipt
    wp_enqueue_script('backend-main-js', plugin_dir_url(__FILE__) . 'assets/js/admin-js.js', array('jquery'), time());

}
add_action('admin_enqueue_scripts', 'forms_backend_enque_scripts');