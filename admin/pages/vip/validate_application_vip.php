<?php

function validate_vip_application(){
    global $wpdb;

    if(isset($_GET['page']) && $_GET['page'] == 'validate-app') {
        $id = $_GET['id'];
        $table_vip = $wpdb->prefix . 'vip';
        $sql = $wpdb->prepare("SELECT * FROM $table_vip WHERE id=%s", $id);
        $results = $wpdb->get_results($sql);

        $exist = new Check_user_status();
        $exists = $exist->vip_check_user($id);

        // checks if user already accepted or rejected the application

//        $vip_audit_table = $wpdb->prefix.'vip_validate_app';
//
//        $user_role = wp_get_current_user()->roles;
//        $user_id = wp_get_current_user()->id;
//
//        if(in_array('checker',$user_role)) {
//            $col = 'checker';
//        }else if(in_array('national_security',$user_role)){
//            $col = 'national_security';
//        }else{
//            $col = 'supervisor';
//        }
//
//        $result = $wpdb->get_row("SELECT $col FROM $vip_audit_table WHERE application_id=$id");
//        $exists = 0;
//
//        if(!empty($result->$col)) {
//            $data = unserialize($result->$col);
//
//            foreach ($data as $dt) {
//                if(in_array($user_id,$dt, TRUE)) {
//                    $exists = 1;
//                }
//            }
//        }
//    }
    }
    ?>

    <div class="wrap">
        <div style="text-align: end;">
            <h1 class="wp-heading-inline"><?php echo esc_html(get_admin_page_title()); ?></h1>
        </div>
        <div>
            <div class="wrap" dir="rtl">
                <form action="" method="post" id="vip_form" enctype="multipart/form-data">
                    <table class="form-table validate_table_najaf" role="presentation">
                        <tbody>
                        <tr>
                            <td>
                                <input type="hidden" id="edit_vip_id" value="<?php echo $id; ?>">
                                <label for="">الاسم الرباعي واللقب : </label>
                            </td>
                            <td>
                                <p><?php echo $results[0]->vip_fourth_name_1.' '.$results[0]->vip_fourth_name_2.' '.$results[0]->vip_fourth_name_3.' '.$results[0]->vip_fourth_name_4.' '.$results[0]->vip_fourth_name_5 ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>صورة شخصية لصاحب الهوية:</td>
                            <td><img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/vip/' . $results[0]->vip_fourth_name_img ?>" /></td>
                        </tr>
                        <tr>
                            <td><label for="">اسم الام:</label></td>
                            <td>
                                <p><?php echo $results[0]->vip_mother_name ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">تاريخ الميلاد :</label>
                            </td>
                            <td>
                                <p><?php echo date('d-m-Y', strtotime($results[0]->vip_date_of_birth)) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for=""> المهنة او الوظيفة:</label></td>
                            <td><?php echo $results[0]->vip_job_name ?></td>
                        </tr>
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <label>الكتاب او الهوية (الوجه الاول):</label>-->
<!--                            </td>-->
<!--                            <td>-->
<!--                                --><?php
//                                if(!empty($results[0]->vip_job_name_img1)){ ?>
<!--                                    <img src="--><?php //echo get_site_url() . '/wp-content/uploads/najaf/vip/' . $results[0]->vip_job_name_img1 ?><!--" />-->
<!--                                --><?php //}
//                                ?>
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <label>الكتاب او الهوية (الوجه لثاني):</label>-->
<!--                            </td>-->
<!--                            <td>-->
<!--                                --><?php
//                                if(!empty($results[0]->vip_job_name_img2)){ ?>
<!--                                    <img src="--><?php //echo get_site_url() . '/wp-content/uploads/najaf/vip/' . $results[0]->vip_job_name_img2 ?><!--"  />-->
<!--                                --><?php //}
//                                ?>
<!--                            </td>-->
<!--                        </tr>-->
                        <tr>
                            <td><label for="">عنوان السكن:</label></td>
                            <td>
                                <?php echo $results[0]->vip_live_location ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">رقم الدار:</label></td>
                            <td>
                                <p><?php echo $results[0]->vip_home_number ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">رقم البطاقة الوطنية اوالاحوال الشخصية:</label></td>
                            <td>
                                <p><?php echo $results[0]->vip_card_number ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>رقم البطاقة الوطنية اوالاحوال الشخصية (الوجه الاول):</label>
                            </td>
                            <td>
                                <img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/vip/' . $results[0]->vip_card_number_img1 ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>رقم البطاقة الوطنية اوالاحوال الشخصية (الوجه لثاني):</label>
                            </td>
                            <td>
                                <img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/vip/' . $results[0]->vip_card_number_img2 ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">رقم بطاقة السكن:</label>
                            </td>
                            <td>
                                <p><?php echo $results[0]->residence_card_number ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">تاريخ بطاقة السكن :</label>
                            </td>
                            <td>
                                <p><?php echo date('d-m-Y', strtotime($results[0]->residence_card_date))  ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>رقم بطاقة السكن (الوجه الاول):</label>
                            </td>
                            <td>
                                <img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/vip/' . $results[0]->residence_card_number_img1 ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>رقم بطاقة السكن (الوجه الثاني):</label>
                            </td>
                            <td>
                                <img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/vip/' . $results[0]->residence_card_number_img2 ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">رقم الموبايل:</label></td>
                            <td><p><?php echo $results[0]->vip_phone_number ?></p></td>
                        </tr>
                        <tr>
                            <td><label for="">اسم المختار:</label></td>
                            <td><p><?php echo $results[0]->vip_mokhtar_name ?></p></td>
                        </tr>
                        </tbody>
                    </table>
                </form>
                <?php
                    if($exists == 0) {
                        ?>
                            <div class="audit-buttons">
                                <button class="button button-primary button-large" id="audit_accept_vip">قبول</button>
                                <button class="button button-primary button-large" id="audit_reject_vip">رفض</button>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
<?php
    }