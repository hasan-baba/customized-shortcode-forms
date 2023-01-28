<?php


/*
 * VIP Validate App table
 */
function vip_validate_app_db_table()
{
    // change the version to update db structure
    $vip_validate_app_db_version = "1.0.1";
    if ($vip_validate_app_db_version != get_option("vip_validate_app_db_version")) {
        global $wpdb;
        $vip_form_table = $wpdb->prefix . 'vip';

        $vip_validate_app_table = $wpdb->prefix . 'vip_validate_app';
        $sql = "CREATE TABLE $vip_validate_app_table (
			`id` INTEGER (10) NOT NULL AUTO_INCREMENT,
			`application_id` INTEGER (10) NOT NULL UNIQUE,
			`supervisor` longtext,
			`checker` longtext,
			`national_security` longtext,
			PRIMARY KEY (`id`),
			CONSTRAINT FK_app_id FOREIGN KEY (application_id) REFERENCES $vip_form_table(id))";


        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        update_option('vip_validate_app_db_version', $vip_validate_app_db_version);
    }
}

add_action('after_setup_theme', 'vip_validate_app_db_table');