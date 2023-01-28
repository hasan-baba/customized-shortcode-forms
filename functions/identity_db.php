<?php


/*
 * Identity Form table
 */
function identity_form_db_table()
{
    // change the version to update db structure
    $identity_form_db_version = "1.0.2";
    if ($identity_form_db_version != get_option("identity_form_db_version")) {
        global $wpdb;

        $identity_form_table = $wpdb->prefix . 'identity';
        $sql = "CREATE TABLE $identity_form_table (
			`id` INTEGER (10) NOT NULL AUTO_INCREMENT,
			`date` DATETIME NOT NULL,
			`identification_fourth_name_1` varchar(255) NOT NULL,
			`identification_fourth_name_2` varchar(255) NOT NULL,
			`identification_fourth_name_3` varchar(255) NOT NULL,
			`identification_fourth_name_4` varchar(255) NOT NULL,
			`identification_fourth_name_5` varchar(255) NOT NULL,
			`identification_fourth_name_personal_image` varchar(255) NOT NULL,
			`identification_mother_name` varchar(255) NOT NULL,
			`identification_dob_datepicker` DATE NOT NULL,
			`identification_work` varchar(255) NOT NULL,
			`identification_home_location` varchar(255) NOT NULL,
			`identification_home_number` varchar(255) NOT NULL,
			`identification_card_number` double NOT NULL,
			`identifiction_card_number1_image` varchar(255) NOT NULL,
			`identifiction_card_number2_image` varchar(255) NOT NULL,
			`identification_living_card` double NOT NULL,
			`identification_living_card_datepicker` DATE NOT NULL,
			`identifiction_living_card1_image` varchar(255) NOT NULL,
			`identifiction_living_card2_image` varchar(255) NOT NULL,
			`identification_phone_number` double NOT NULL,
			`identification_mokhtar_name` varchar(255) NOT NULL,
			`identification_car_type` varchar(255) NOT NULL,
			`identification_car_color` varchar(255) NOT NULL,
			`identification_car_dob_datepicker` double NOT NULL,
			`identification_car_number` varchar(255) NOT NULL,
			`identification_car_mohafaza` varchar(255) NOT NULL,
			`identification_car_yearly` double NOT NULL,
			`identification_car_yearly_expiry_datepicker` DATE NOT NULL,
			`identifiction_car_card1_image` varchar(255) NOT NULL,
			`identifiction_car_card2_image` varchar(255) NOT NULL,
			`identification_driving_licence` double NOT NULL,
			`identification_driving_licence_expiry_datepicker` DATE NOT NULL,			
			`identifiction_drivinglicence_card1_image` varchar(255) NOT NULL,
			`identifiction_drivinglicence_card2_image` varchar(255) NOT NULL,	
			PRIMARY KEY (`id`))";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        update_option('identity_form_db_version', $identity_form_db_version);
    }
}

add_action('after_setup_theme', 'identity_form_db_table');