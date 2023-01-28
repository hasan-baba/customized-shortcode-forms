<?php

function validate_identity_application(){
    global $wpdb;

    if(isset($_GET['page']) && $_GET['page'] == 'validate-app-identity') {
        $id = $_GET['id'];
        $table_identity = $wpdb->prefix . 'identity';
        $sql = $wpdb->prepare("SELECT * FROM $table_identity WHERE id=%s", $id);
        $results = $wpdb->get_results($sql);

        $exist = new Check_user_status();
        $exists = $exist->identify_check_user($id);
    }
    ?>

    <div class="wrap">
        <div style="text-align: end;">
            <h1 class="wp-heading-inline"><?php echo esc_html(get_admin_page_title()); ?></h1>
        </div>        <div>
            <div class="wrap" dir="rtl">
                <form action="" method="post" id="sign_up" enctype="multipart/form-data">
                    <table class="form-table validate_table_najaf" role="presentation">
                        <tbody>
                        <tr>
                            <td>
                                <input type="hidden" value="<?php echo $id; ?>" id="editIdentityID" name="editIdentityID">
                                <label for="">الاسم الرباعي واللقب : </label>
                            </td>
                            <td>
                                <p><?php echo $results[0]->identification_fourth_name_1.' '.$results[0]->identification_fourth_name_2.' '.$results[0]->identification_fourth_name_3.' '.$results[0]->identification_fourth_name_4.' '.$results[0]->identification_fourth_name_5 ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="formFile" class="form-label"> صورة شخصية لصاحب الهوية:</label>
                            </td>
                            <td>
                                <img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/identity/' . $results[0]->identification_fourth_name_personal_image ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">اسم الام:</label></td>
                            <td>
                                <p><?php echo $results[0]->	identification_mother_name ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">تاريخ الميلاد :</label></td>
                            <td>
                                <p><?php echo date('d-m-Y', strtotime($results[0]->identification_dob_datepicker)) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for=""> المهنة او الوظيفة:</label></td>
                            <td>
                                <p><?php echo $results[0]->identification_work ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">عنوان السكن:</label></td>
                            <td>
                                <p><?php echo $results[0]->identification_home_location ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">رقم الدار:</label></td>
                            <td>
                                <p><?php echo $results[0]->identification_home_number ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">رقم البطاقة الوطنية اوالاحوال الشخصية:</label></td>
                            <td>
                                <p><?php echo $results[0]->identification_card_number ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>رقم البطاقة الوطنية اوالاحوال الشخصية (الوجه الاول):</label>
                            </td>
                            <td>
                                <img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/identity/' . $results[0]->identifiction_card_number1_image	 ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>رقم البطاقة الوطنية اوالاحوال الشخصية (الوجه لثاني):</label>
                            </td>
                            <td>
                                <img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/identity/' . $results[0]->identifiction_card_number2_image	 ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">رقم بطاقة السكن:</label>
                            </td>
                            <td>
                                <p><?php echo $results[0]->identification_living_card ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">تاريخ بطاقة السكن :</label>
                            </td>
                            <td>
                                <p><?php echo date('d-m-Y', strtotime($results[0]->identification_living_card_datepicker)) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label> بطاقة السكن (الوجه الاول):</label>
                            </td>
                            <td>
                                <img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/identity/' . $results[0]->identifiction_living_card1_image ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label> بطاقة السكن (الوجه الثاني):</label>
                            </td>
                            <td>
                                <img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/identity/' . $results[0]->identifiction_living_card2_image ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">رقم الموبايل:</label></td>
                            <td>
                                <p><?php echo $results[0]->identification_living_card ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">اسم المختار:</label></td>
                            <td>
                                <p><?php echo $results[0]->identification_mokhtar_name ?></p>
                        </tr>
                        <tr>
                            <td><label for="">نوع المركبة:</label></td>
                            <td>
                                <p><?php echo $results[0]->identification_car_type ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">لونها</label></td>
                            <td>
                                <p><?php echo $results[0]->identification_car_color ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">سنة الصنع:</label></td>
                            <td>
                                <p><?php echo $results[0]->identification_car_dob_datepicker ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">رقم المركبة</label></td>
                            <td>
                                <p><?php echo $results[0]->identification_car_number ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">المحافظة </label></td>
                            <td>
                                <p><?php echo $results[0]->identification_car_mohafaza ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">رقم السنوية:</label></td>
                            <td>
                                <p><?php echo $results[0]->identification_car_yearly ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">تاريخ نفاذ السنوية:</label></td>
                            <td>
                                <p><?php echo date('d-m-Y', strtotime($results[0]->identification_car_yearly_expiry_datepicker)) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="formFile" class="form-label"> السنوية (الوجه الاول)</label>
                            </td>
                            <td>
                                <img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/identity/' . $results[0]->identifiction_car_card1_image ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="formFile" class="form-label"> السنوية (الوجه لثاني)</label>
                            </td>
                            <td>
                                <img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/identity/' . $results[0]->identifiction_car_card2_image ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">رقم اجازة السوق:</label></td>
                            <td>
                                <p><?php echo $results[0]->identification_driving_licence ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td> <label for="">تاريخ نفاذ الإجازة:</label></td>
                            <td>
                                <p><?php echo date('d-m-Y', strtotime($results[0]->identification_driving_licence_expiry_datepicker)) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="formFile" class="form-label"> الاجازة (الوجه الاول)</label>
                            </td>
                            <td>
                                <img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/identity/' . $results[0]->identifiction_drivinglicence_card1_image ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="formFile" class="form-label"> الاجازة (الوجه لثاني)</label>
                            </td>
                            <td>
                                <img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/identity/' . $results[0]->identifiction_drivinglicence_card2_image ?>"/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <?php
                        if($exists == 0) {
                            ?>
                            <div class="audit-buttons">
                                <button class="button button-primary button-large" id="audit_accept_identity">قبول</button>
                                <button class="button button-primary button-large" id="audit_reject_identity">رفض</button>
                            </div>
                            <?php
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
<?php }