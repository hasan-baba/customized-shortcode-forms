<?php


/*
 * VIP Form table
 */
function vip_form_db_table()
{
    // change the version to update db structure
    $vip_form_db_version = "1.0.2";
    if ($vip_form_db_version != get_option("vip_form_db_version")) {
        global $wpdb;

        $vip_form_table = $wpdb->prefix . 'vip';
        $sql = "CREATE TABLE $vip_form_table (
			`id` INTEGER (10) NOT NULL AUTO_INCREMENT,
			`date` DATETIME NOT NULL,
			`vip_date_of_birth` DATE NOT NULL,
			`vip_fourth_name_1` varchar(255) NOT NULL,
			`vip_fourth_name_2` varchar(255) NOT NULL,
			`vip_fourth_name_3` varchar(255) NOT NULL,
			`vip_fourth_name_4` varchar(255) NOT NULL,
			`vip_fourth_name_5` varchar(255) NOT NULL,
			`vip_fourth_name_img` varchar(255) NOT NULL,
			`vip_mother_name` varchar(255) NOT NULL,
			`vip_job_name` varchar(255) NOT NULL,
			`vip_job_name_img1` varchar(255),
			`vip_job_name_img2` varchar(255),
			`vip_live_location` varchar(255) NOT NULL,
			`vip_home_number` varchar(255) NOT NULL,
			`vip_card_number` double NOT NULL,
			`vip_card_number_img1` varchar(255) NOT NULL,
			`vip_card_number_img2` varchar(255) NOT NULL,
			`residence_card_number` double NOT NULL,
			`residence_card_date` DATE NOT NULL,
			`residence_card_number_img1` varchar(255) NOT NULL,
			`residence_card_number_img2` varchar(255) NOT NULL,
			`vip_phone_number` double NOT NULL,
			`vip_mokhtar_name` varchar(255) NOT NULL,
			PRIMARY KEY (`id`))";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        update_option('vip_form_db_version', $vip_form_db_version);
    }
}

add_action('after_setup_theme', 'vip_form_db_table');