<?php
/* Remove menus from the WordPress dashboard*/

/* Remove from the administration bar */
function remove_logo_wp_admin() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'wp-logo' );
}

function my_login_redirect( $redirect_to, $request, $user ) {
    global $user;
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        if(in_array( 'administrator', $user->roles )){
            return $redirect_to = "https://najafdacards.com/wp-admin/";
        }else if ( in_array( 'passage', $user->roles ) || in_array( 'governorate_office_supervisor', $user->roles )) {
            return $redirect_to = "https://najafdacards.com/wp-admin/admin.php?page=identification_apps";
        } else {
            return $redirect_to = "https://najafdacards.com/wp-admin/admin.php?page=vip_apps";
        }
    } else {
        return $redirect_to;
    }
}
add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );



//function custom_login_redirect( $redirect_to, $request, $user ) {
//    $users = wp_get_current_user();
//    $user_role = $users->roles;
//    if(in_array('passage',$user_role) || in_array('governorate_office_supervisor',$user_role)) {
//        $redirect_to = "https://najafdacards.com/wp-admin/admin.php?page=identification_apps";
//    }else{
//        $redirect_to = "https://najafdacards.com/wp-admin/admin.php?page=vip_apps";
//    }
//    return $redirect_to;
//}
//add_filter( 'login_redirect', 'custom_login_redirect', 10, 3 );


function wpdocs_remove_menus() {
    $user = wp_get_current_user();
    $user_role = $user->roles;
    if(!in_array('administrator',$user_role)) {
        remove_menu_page('index.php'); //Dashboard
        add_action( 'wp_before_admin_bar_render', 'remove_logo_wp_admin', 0 );
    }
}
add_action('admin_menu', 'wpdocs_remove_menus');

function my_login_logo_one() {
    ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(/wp-content/uploads/2022/11/Coat_of_arms_of_Iraq-2-2048x1883.png);
            padding-bottom: 30px;
        }
    </style>
    <?php
}
add_action( 'login_enqueue_scripts', 'my_login_logo_one' );



function upload_image_vip($tmp_name, $file_name) {
    $_filter = true;
    if($_filter == true) {
        $content = file_get_contents( $tmp_name );
        add_filter( 'upload_dir', function ( $param ) {
            $param['basedir'] = wp_normalize_path( ABSPATH . 'wp-content/uploads/najaf/vip' );
            $param['baseurl'] = home_url( '/wp-content/uploads/najaf/vip' );
            $param['path']    = $param['basedir'];
            $param['url']     = $param['baseurl'];
            $param['subdir']  = '';

            return $param;
        } );
        wp_upload_bits($file_name, null, $content );
    }
    $_filter = false;
}
function upload_image_identity($tmp_name, $file_name) {
    $_filter = true;
    if($_filter == true) {
        $content = file_get_contents( $tmp_name );
        add_filter( 'upload_dir', function ( $param ) {
            $param['basedir'] = wp_normalize_path( ABSPATH . 'wp-content/uploads/najaf/identity' );
            $param['baseurl'] = home_url( '/wp-content/uploads/najaf/identity' );
            $param['path']    = $param['basedir'];
            $param['url']     = $param['baseurl'];
            $param['subdir']  = '';

            return $param;
        } );
        wp_upload_bits($file_name, null, $content );
    }
    $_filter = false;
}

function insert_form_data(){
    $vipFourthNameImage = str_replace(array(' ', '`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-','+', '=', '{', '}', '[', ']', '<', '>', '/', ';', ','), '', sanitize_text_field(date('YmdHsi').'fourthname'.$_FILES["vip-fourth-nam-personal-image"]["name"]));

//    if($_FILES["vip-job-name1-image"]) {
//        $vipJobNameImage1 = str_replace(array(' ', '`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-','+', '=', '{', '}', '[', ']', '<', '>', '/', ';', ','), '', sanitize_text_field(date('YmdHsi').'jobname1'.$_FILES["vip-job-name1-image"]["name"]));
//    } else {
//        $vipJobNameImage1 = '';
//    }
//    if($_FILES["vip-job-name2-image"]) {
//        $vipJobNameImage2 = str_replace(array(' ', '`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-','+', '=', '{', '}', '[', ']', '<', '>', '/', ';', ','), '', sanitize_text_field(date('YmdHsi').'jobname2'.$_FILES["vip-job-name2-image"]["name"]));
//    } else {
//        $vipJobNameImage2 = '';
//    }

    $vipCardNumberImg1 = str_replace(array(' ', '`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-','+', '=', '{', '}', '[', ']', '<', '>', '/', ';', ','), '', sanitize_text_field(date('YmdHsi').'cardnb1'.$_FILES["vip-card-number1-image"]["name"]));
    $vipCardNumberImg2 = str_replace(array(' ', '`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-','+', '=', '{', '}', '[', ']', '<', '>', '/', ';', ','), '', sanitize_text_field(date('YmdHsi').'cardnb2'.$_FILES["vip-card-number2-image"]["name"]));

    $residenceCardNumberImg1 = str_replace(array(' ', '`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-','+', '=', '{', '}', '[', ']', '<', '>', '/', ';', ','), '', sanitize_text_field(date('YmdHsi').'residencenb1'.$_FILES["residence-card-number1-image"]["name"]));
    $residenceCardNumberImg2 = str_replace(array(' ', '`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-','+', '=', '{', '}', '[', ']', '<', '>', '/', ';', ','), '', sanitize_text_field(date('YmdHsi').'residencenb2'.$_FILES["residence-card-number2-image"]["name"]));

    $vipFourthName1 = $_POST['vip-fourth-name-1'];
    $vipFourthName2 = $_POST['vip-fourth-name-2'];
    $vipFourthName3 = $_POST['vip-fourth-name-3'];
    $vipFourthName4 = $_POST['vip-fourth-name-4'];
    $vipFourthName5 = $_POST['vip-fourth-name-5'];
    $vipMotherName = $_POST['vip-mother-name'];
    $dobDatepicker = $_POST['vip-user-date-of-birth'];
    $vipJobName = $_POST['vip-job-name'];
    $vipLiveLocation = $_POST['vip-live-location'];
    $vipHomeNumber = $_POST['vip-home-number'];
    $vipCardNumber = $_POST['vip-card-number'];
    $residenceCardNumber = $_POST['residence-card-number'];
    $residenceCardDate = $_POST['residence-card-date'];
    $vipPhoneNumber = $_POST['vip-phone-number'];
    $vipMokhtarName = $_POST['vip-mokhtar-name'];

    // upload images
    upload_image_vip($_FILES["vip-fourth-nam-personal-image"]["tmp_name"], $vipFourthNameImage);

//    if($_FILES["vip-job-name1-image"]) {
//        upload_image_vip($_FILES["vip-job-name1-image"]["tmp_name"], $vipJobNameImage1);
//    }
//    if($_FILES["vip-job-name2-image"]) {
//        upload_image_vip($_FILES["vip-job-name2-image"]["tmp_name"], $vipJobNameImage2);
//    }


    upload_image_vip($_FILES["vip-card-number1-image"]["tmp_name"], $vipCardNumberImg1);
    upload_image_vip($_FILES["vip-card-number2-image"]["tmp_name"], $vipCardNumberImg2);

    upload_image_vip($_FILES["residence-card-number1-image"]["tmp_name"], $residenceCardNumberImg1);
    upload_image_vip($_FILES["residence-card-number2-image"]["tmp_name"], $residenceCardNumberImg2);


    global $wpdb;
    $vip_table = $wpdb->prefix.'vip';

    $insert_record = $wpdb->insert($vip_table,array(
        'date' => date("Y-m-d H:i:s"),
        'vip_fourth_name_1' => $vipFourthName1,
        'vip_fourth_name_2' => $vipFourthName2,
        'vip_fourth_name_3' => $vipFourthName3,
        'vip_fourth_name_4' => $vipFourthName4,
        'vip_fourth_name_5' => $vipFourthName5,
        'vip_fourth_name_img' => $vipFourthNameImage,
        'vip_mother_name'   => $vipMotherName,
        'vip_date_of_birth' => date('Y-m-d', strtotime($dobDatepicker)),
        'vip_job_name' => $vipJobName,
        'vip_job_name_img1' => '',
        'vip_job_name_img2' => '',
        'vip_live_location' => $vipLiveLocation,
        'vip_home_number' => $vipHomeNumber,
        'vip_card_number' => $vipCardNumber,
        'vip_card_number_img1' => $vipCardNumberImg1,
        'vip_card_number_img2' => $vipCardNumberImg2,
        'residence_card_number' => $residenceCardNumber,
        'residence_card_date' => date('Y-m-d', strtotime($residenceCardDate)),
        'residence_card_number_img1' => $residenceCardNumberImg1,
        'residence_card_number_img2' => $residenceCardNumberImg2,
        'vip_phone_number' => '964'.$vipPhoneNumber,
        'vip_mokhtar_name' => $vipMokhtarName,
    ));
    if($insert_record) {
        wp_send_json('success');
    }
    exit();
}
add_action('wp_ajax_nopriv_insert_form_data','insert_form_data');
add_action("wp_ajax_insert_form_data", "insert_form_data");

function insert_identity_form_data(){
    $identificationFourthName1 = $_POST['identificationFourthName1'];
    $identificationFourthName2 = $_POST['identificationFourthName2'];
    $identificationFourthName3 = $_POST['identificationFourthName3'];
    $identificationFourthName4 = $_POST['identificationFourthName4'];
    $identificationFourthName5 = $_POST['identificationFourthName5'];
    $identificationFourthNameImage = str_replace(array(' ', '`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-','+', '=', '{', '}', '[', ']', '<', '>', '/', ';', ','), '', sanitize_text_field(date('YmdHsi').'fourthname'.$_FILES["identificationFourthNameImage"]["name"]));
    $identificationMotherName = $_POST['identificationMotherName'];
    $identificationDobDatepicker = $_POST['identificationDobDatepicker'];
    $identificationWork = $_POST['identificationWork'];
    $identificationHomeLocation = $_POST['identificationHomeLocation'];
    $identificationHomeNumber = $_POST['identificationHomeNumber'];
    $identificationCardNumber = $_POST['identificationCardNumber'];
    $identificationCarMohafaza = $_POST['identificationCarMohafaza'];
    $identifictionCardNumber1Image = str_replace(array(' ', '`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-','+', '=', '{', '}', '[', ']', '<', '>', '/', ';', ','), '', sanitize_text_field(date('YmdHsi').'cardnb1'.$_FILES["identifictionCardNumber1Image"]["name"]));
    $identifictionCardNumber2Image = str_replace(array(' ', '`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-','+', '=', '{', '}', '[', ']', '<', '>', '/', ';', ','), '', sanitize_text_field(date('YmdHsi').'cardnb2'.$_FILES["identifictionCardNumber2Image"]["name"]));
    $identificationLivingCard = $_POST['identificationLivingCard'];
    $identificationLivingCardDatepicker = $_POST['identificationLivingCardDatepicker'];
    $identifictionlivingCard1Image = str_replace(array(' ', '`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-','+', '=', '{', '}', '[', ']', '<', '>', '/', ';', ','), '', sanitize_text_field(date('YmdHsi').'livingcard1'.$_FILES["identifictionlivingCard1Image"]["name"]));
    $identifictionlivingCard2Image = str_replace(array(' ', '`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-','+', '=', '{', '}', '[', ']', '<', '>', '/', ';', ','), '', sanitize_text_field(date('YmdHsi').'livingcard2'.$_FILES["identifictionlivingCard2Image"]["name"]));
    $identificationPhoneNumber = $_POST['identificationPhoneNumber'];
    $identificationMokhtarName = $_POST['identificationMokhtarName'];
    $identificationCarType = $_POST['identificationCarType'];
    $identificationCarColor = $_POST['identificationCarColor'];
    $identificationCarDobDatepicker = $_POST['identificationCarDobDatepicker'];
    $identificationCarNumber = $_POST['identificationCarNumber'];
    $identificationCarYearly = $_POST['identificationCarYearly'];
    $identificationCarYearlyExpiryDatepicker = $_POST['identificationCarYearlyExpiryDatepicker'];
    $identifictionCarCard1Image = str_replace(array(' ', '`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-','+', '=', '{', '}', '[', ']', '<', '>', '/', ';', ','), '', sanitize_text_field(date('YmdHsi').'carcard1'.$_FILES["identifictionCarCard1Image"]["name"]));
    $identifictionCarCard2Image = str_replace(array(' ', '`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-','+', '=', '{', '}', '[', ']', '<', '>', '/', ';', ','), '', sanitize_text_field(date('YmdHsi').'carcard1'.$_FILES["identifictionCarCard2Image"]["name"]));
    $identificationDrivingLicence = $_POST['identificationDrivingLicence'];
    $identificationDrivingLicenceExpiryDatepicker = $_POST['identificationDrivingLicenceExpiryDatepicker'];
    $identifictionDrivinglicenceCard1Image = str_replace(array(' ', '`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-','+', '=', '{', '}', '[', ']', '<', '>', '/', ';', ','), '', sanitize_text_field(date('YmdHsi').'licencecard1'.$_FILES["identifictionDrivinglicenceCard1Image"]["name"]));
    $identifictionDrivinglicenceCard2Image = str_replace(array(' ', '`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-','+', '=', '{', '}', '[', ']', '<', '>', '/', ';', ','), '', sanitize_text_field(date('YmdHsi').'licencecard2'.$_FILES["identifictionDrivinglicenceCard2Image"]["name"]));


    // upload images
    upload_image_identity($_FILES["identificationFourthNameImage"]["tmp_name"], $identificationFourthNameImage);

    upload_image_identity($_FILES["identifictionCardNumber1Image"]["tmp_name"], $identifictionCardNumber1Image);
    upload_image_identity($_FILES["identifictionCardNumber2Image"]["tmp_name"], $identifictionCardNumber2Image);

    upload_image_identity($_FILES["identifictionlivingCard1Image"]["tmp_name"], $identifictionlivingCard1Image);
    upload_image_identity($_FILES["identifictionlivingCard2Image"]["tmp_name"], $identifictionlivingCard2Image);

    upload_image_identity($_FILES["identifictionCarCard1Image"]["tmp_name"], $identifictionCarCard1Image);
    upload_image_identity($_FILES["identifictionCarCard2Image"]["tmp_name"], $identifictionCarCard2Image);

    upload_image_identity($_FILES["identifictionDrivinglicenceCard1Image"]["tmp_name"], $identifictionDrivinglicenceCard1Image);
    upload_image_identity($_FILES["identifictionDrivinglicenceCard2Image"]["tmp_name"], $identifictionDrivinglicenceCard2Image);

    global $wpdb;
    $identity_table = $wpdb->prefix.'identity';

    $insert_record = $wpdb->insert($identity_table,array(
        'date' => date("Y-m-d H:i:s"),
        'identification_fourth_name_1' => $identificationFourthName1,
        'identification_fourth_name_2' => $identificationFourthName2,
        'identification_fourth_name_3' => $identificationFourthName3,
        'identification_fourth_name_4' => $identificationFourthName4,
        'identification_fourth_name_5' => $identificationFourthName5,
        'identification_fourth_name_personal_image' => $identificationFourthNameImage,
        'identification_mother_name' => $identificationMotherName,
        'identification_dob_datepicker' => date('Y-m-d', strtotime($identificationDobDatepicker)),
        'identification_work' => $identificationWork,
        'identification_home_location' => $identificationHomeLocation,
        'identification_home_number' => $identificationHomeNumber,
        'identification_card_number' => $identificationCardNumber,
        'identification_car_mohafaza' => $identificationCarMohafaza,
        'identifiction_card_number1_image' => $identifictionCardNumber1Image,
        'identifiction_card_number2_image' => $identifictionCardNumber2Image,
        'identification_living_card' => $identificationLivingCard,
        'identification_living_card_datepicker' => date('Y-m-d', strtotime($identificationLivingCardDatepicker)),
        'identifiction_living_card1_image' => $identifictionlivingCard1Image,
        'identifiction_living_card2_image' => $identifictionlivingCard2Image,
        'identification_phone_number' => '964'.$identificationPhoneNumber,
        'identification_mokhtar_name' => $identificationMokhtarName,
        'identification_car_type' => $identificationCarType,
        'identification_car_color' => $identificationCarColor,
        'identification_car_dob_datepicker' => date('Y-m-d', strtotime($identificationCarDobDatepicker)),
        'identification_car_number' => $identificationCarNumber,
        'identification_car_yearly' => $identificationCarYearly,
        'identification_car_yearly_expiry_datepicker' => date('Y-m-d', strtotime($identificationCarYearlyExpiryDatepicker)),
        'identifiction_car_card1_image' => $identifictionCarCard1Image,
        'identifiction_car_card2_image' => $identifictionCarCard2Image,
        'identification_driving_licence' => $identificationDrivingLicence,
        'identification_driving_licence_expiry_datepicker' => date('Y-m-d', strtotime($identificationDrivingLicenceExpiryDatepicker)),
        'identifiction_drivinglicence_card1_image' => $identifictionDrivinglicenceCard1Image,
        'identifiction_drivinglicence_card2_image' => $identifictionDrivinglicenceCard2Image,
    ));
    wp_send_json($wpdb->last_query);
    if($insert_record) {
        wp_send_json('success');
    }
    exit();
}
add_action('wp_ajax_nopriv_insert_identity_form_data','insert_identity_form_data');
add_action("wp_ajax_insert_identity_form_data", "insert_identity_form_data");

// update VIP values of backend
function update_vip_form_data(){

    $vipFourthName1 = $_POST['vip-fourth-name-1'];
    $vipFourthName2 = $_POST['vip-fourth-name-2'];
    $vipFourthName3 = $_POST['vip-fourth-name-3'];
    $vipFourthName4 = $_POST['vip-fourth-name-4'];
    $vipFourthName5 = $_POST['vip-fourth-name-5'];
    $vipMotherName = $_POST['vip-mother-name'];
    $dobDatepicker = date('Y-m-d', strtotime($_POST['vip-user-date-of-birth']));
    $vipJobName = $_POST['vip-job-name'];
    $vipLiveLocation = $_POST['vip-live-location'];
    $vipHomeNumber = $_POST['vip-home-number'];
    $vipCardNumber = $_POST['vip-card-number'];
    $residenceCardNumber = $_POST['residence-card-number'];
    $residenceCardDate = date('Y-m-d', strtotime($_POST['residence-card-date']));
    $vipPhoneNumber = $_POST['vip-phone-number'];
    $vipMokhtarName = $_POST['vip-mokhtar-name'];
    $vipID = $_POST['vipID'];


    global $wpdb;
    $vip_table = $wpdb->prefix.'vip';

    $update_record = $wpdb->query($wpdb->prepare(
        "UPDATE $vip_table 
            SET vip_fourth_name_1=%s, vip_fourth_name_2=%s, vip_fourth_name_3=%s, vip_fourth_name_4=%s, vip_fourth_name_5=%s, vip_mother_name=%s, vip_date_of_birth=%s, 
            vip_job_name=%s, vip_live_location=%s, vip_home_number=%s, vip_card_number=%s,
            residence_card_number=%s, residence_card_date=%s, vip_phone_number=%s, vip_mokhtar_name=%s
            WHERE id=%s", $vipFourthName1, $vipFourthName2, $vipFourthName3, $vipFourthName4, $vipFourthName5, $vipMotherName, $dobDatepicker, $vipJobName, $vipLiveLocation, $vipHomeNumber, $vipCardNumber, $residenceCardNumber, $residenceCardDate, $vipPhoneNumber, $vipMokhtarName,$vipID
    ));

    if($update_record) {
        wp_send_json
        ([
            'message'=>'success',
            'id'=>$vipID
        ]);
    }
    exit();
}
add_action("wp_ajax_update_vip_form_data", "update_vip_form_data");

// update Identification backend
function update_identity_form_data(){

    $identificationFourthName1 = $_POST['identificationFourthName1'];
    $identificationFourthName2 = $_POST['identificationFourthName2'];
    $identificationFourthName3 = $_POST['identificationFourthName3'];
    $identificationFourthName4 = $_POST['identificationFourthName4'];
    $identificationFourthName5 = $_POST['identificationFourthName5'];
    $identificationMotherName = $_POST['identificationMotherName'];
    $identificationDobDatepicker = date('Y-m-d', strtotime($_POST['identificationDobDatepicker']));
    $identificationWork = $_POST['identificationWork'];
    $identificationHomeLocation = $_POST['identificationHomeLocation'];
    $identificationHomeNumber = $_POST['identificationHomeNumber'];
    $identificationCardNumber = $_POST['identificationCardNumber'];
    $identificationCarMohafaza = $_POST['identificationCarMohafaza'];
    $identificationLivingCard = $_POST['identificationLivingCard'];
    $identificationLivingCardDatepicker = date('Y-m-d', strtotime($_POST['identificationLivingCardDatepicker']));
    $identificationPhoneNumber = $_POST['identificationPhoneNumber'];
    $identificationMokhtarName = $_POST['identificationMokhtarName'];
    $identificationCarType = $_POST['identificationCarType'];
    $identificationCarColor = $_POST['identificationCarColor'];
    $identificationCarDobDatepicker = $_POST['identificationCarDobDatepicker'];
    $identificationCarNumber = $_POST['identificationCarNumber'];
    $identificationCarYearly = date('Y-m-d', strtotime($_POST['identificationCarYearly']));
    $identificationCarYearlyExpiryDatepicker = date('Y-m-d', strtotime($_POST['identificationCarYearlyExpiryDatepicker']));
    $identificationDrivingLicence = $_POST['identificationDrivingLicence'];
    $identificationDrivingLicenceExpiryDatepicker = date('Y-m-d', strtotime($_POST['identificationDrivingLicenceExpiryDatepicker']));
    $editIdentityID = $_POST['editIdentityID'];

    global $wpdb;
    $identity_table = $wpdb->prefix.'identity';

    $update_record = $wpdb->query($wpdb->prepare(
        "UPDATE $identity_table 
            SET identification_fourth_name_1=%s, identification_fourth_name_2=%s, identification_fourth_name_3=%s, identification_fourth_name_4=%s, identification_fourth_name_5=%s, identification_mother_name=%s, identification_dob_datepicker=%s, 
            identification_work=%s, identification_home_location=%s, identification_home_number=%s, identification_card_number=%s,
            identification_living_card=%s, identification_living_card_datepicker=%s, identification_phone_number=%s, identification_mokhtar_name=%s,
            identification_car_type=%s, identification_car_color=%s, identification_car_dob_datepicker=%s, identification_car_number=%s, 
            identification_car_mohafaza=%s, identification_car_yearly=%s, identification_car_yearly_expiry_datepicker=%s, identification_driving_licence=%s,
            identification_driving_licence_expiry_datepicker=%s WHERE id=%s", $identificationFourthName1, $identificationFourthName2, $identificationFourthName3, $identificationFourthName4, $identificationFourthName5, $identificationMotherName, $identificationDobDatepicker, $identificationWork, $identificationHomeLocation, $identificationHomeNumber,
            $identificationCardNumber, $identificationLivingCard, $identificationLivingCardDatepicker, $identificationPhoneNumber, $identificationMokhtarName, $identificationCarType, $identificationCarColor, $identificationCarDobDatepicker,
            $identificationCarNumber, $identificationCarMohafaza, $identificationCarYearly, $identificationCarYearlyExpiryDatepicker, $identificationDrivingLicence, $identificationDrivingLicenceExpiryDatepicker, $editIdentityID
    ));
    if($update_record) {
        wp_send_json
        ([
            'message'=>'success',
            'id'=>$editIdentityID,
            'sql' => $update_record
        ]);
    }
    exit();
}
add_action("wp_ajax_update_identity_form_data", "update_identity_form_data");


// -------------------------------------------------------------------------------------
// if exist record in database
function is_application_exist($application_id,$table_name){
    global $wpdb;
    $rowcount = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE application_id=$application_id");
    if($rowcount > 0){
        return true;
    }else{
        return false;
    }
}

// insert record into single column auditing
function insert_data_auditing($item,$application_id,$col_name,$table_name){
    global $wpdb;
    $data = array();
    array_push($data, $item);

    $insert_record = $wpdb->insert($table_name,array(
        'application_id'=>$application_id,
        $col_name => serialize($data),
    ));

}

// update record into single column auditing
function update_data_vip_auditing($item,$application_id,$col_name,$user_id){
    global $wpdb;
    $vip_audit_table = $wpdb->prefix.'vip_validate_app';

    $result = $wpdb->get_row("SELECT $col_name FROM $vip_audit_table WHERE application_id=$application_id");
    $exists = 0;

    if(!empty($result->$col_name)) {
        $data = unserialize($result->$col_name);

        foreach ($data as $dt) {
            if(in_array($user_id,$dt, TRUE)) {
                $exists = 1;
            }
        }
    } else {
        $data = array();
    }

    if($exists == 0) {
        array_push($data, $item);
    }

    $update_record = $wpdb->query($wpdb->prepare(
        "UPDATE $vip_audit_table
            SET $col_name=%s WHERE application_id=%s", serialize($data),$application_id
    ));
}

// VIP status admins functionality
function audit_vip_form(){
    $status = $_POST['status'];
    $app_id = $_POST['app_id'];
    $user_role = wp_get_current_user()->roles;
    $user_id = wp_get_current_user()->id;

    if(in_array('checker',$user_role)) {
        $col = 'checker';
    }else if(in_array('national_security',$user_role)){
        $col = 'national_security';
    }else{
        $col = 'supervisor';
    }

    $item = array(
        'status'=> $status,
        'user_id' =>$user_id,
        'date'=> date('Y-m-d H:i:s')
    );

    global $wpdb;
    $vip_audit_table = $wpdb->prefix.'vip_validate_app';
    $res = is_application_exist($app_id,$vip_audit_table);
    if(!$res){
        insert_data_auditing($item,$app_id,$col,$vip_audit_table);
    }else{
        update_data_vip_auditing($item,$app_id,$col,$user_id);
    }


    wp_send_json([
        'message'=>'success'
    ]);
    exit();
}
add_action("wp_ajax_audit_vip_form", "audit_vip_form");

// -------------------------------------------------------------------------------------

// update record into single column auditing
function update_data_identity_auditing($item,$application_id,$col_name,$user_id){
    global $wpdb;
    $identity_validate_app = $wpdb->prefix.'identity_validate_app';

    $result = $wpdb->get_row("SELECT $col_name FROM $identity_validate_app WHERE application_id=$application_id");
    $exists = 0;

    if(!empty($result->$col_name)) {
        $data = unserialize($result->$col_name);

        foreach ($data as $dt) {
            if(in_array($user_id,$dt, TRUE)) {
                $exists = 1;
            }
        }
    } else {
        $data = array();
    }

    if($exists == 0) {
        array_push($data, $item);
    }

    $update_record = $wpdb->query($wpdb->prepare(
        "UPDATE $identity_validate_app
            SET $col_name=%s WHERE application_id=%s", serialize($data),$application_id
    ));
}

// Identification status admins functionality
function audit_identity_form(){
    $status = $_POST['status'];
    $app_id = $_POST['app_id'];
    $user_role = wp_get_current_user()->roles;
    $user_id = wp_get_current_user()->id;

    if(in_array('checker',$user_role)) {
        $col = 'checker';
    }else if(in_array('national_security',$user_role)){
        $col = 'national_security';
    }else if(in_array('supervisor',$user_role)){
        $col = 'supervisor';
    }else if(in_array('passage',$user_role)){
        $col = 'passage';
    }else {
        $col = 'governorate_office_supervisor';
    }

    $item = array(
        'status'=> $status,
        'user_id' =>$user_id,
        'date'=> date('Y-m-d H:i:s')
    );

    global $wpdb;
    $identity_audit_table = $wpdb->prefix.'identity_validate_app';
    $res = is_application_exist($app_id,$identity_audit_table);
    if(!$res){
        insert_data_auditing($item,$app_id,$col,$identity_audit_table);
    }else{
        update_data_identity_auditing($item,$app_id,$col,$user_id);
    }


    wp_send_json([
        'message'=>'success'
    ]);
    exit();
}
add_action("wp_ajax_audit_identity_form", "audit_identity_form");

























