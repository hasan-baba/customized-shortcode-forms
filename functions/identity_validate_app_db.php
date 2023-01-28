<?php
/*
 * Identify Validate App table
 */
function identity_validate_app_db_table()
{
    // change the version to update db structure
    $identity_validate_app_db_version = "1.0.1";
    if ($identity_validate_app_db_version != get_option("identity_validate_app_db_version")) {
        global $wpdb;
        $identity_form_table = $wpdb->prefix . 'identity';

        $identity_validate_app_table = $wpdb->prefix . 'identity_validate_app';
        $sql = "CREATE TABLE $identity_validate_app_table (
			`id` INTEGER (10) NOT NULL AUTO_INCREMENT,
			`application_id` INTEGER (10) NOT NULL UNIQUE,
			`supervisor` longtext,
			`checker` longtext,
			`national_security` longtext,
			`passage` longtext,
			`governorate_office_supervisor` longtext,
			PRIMARY KEY (`id`),
			CONSTRAINT FK2_app_id FOREIGN KEY (application_id) REFERENCES $identity_form_table(id))";


        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        update_option('identity_validate_app_db_version', $identity_validate_app_db_version);
    }
}

add_action('after_setup_theme', 'identity_validate_app_db_table');