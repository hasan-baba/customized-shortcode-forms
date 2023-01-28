<?php

function edit_vip_application(){
        if(isset($_GET['page']) && $_GET['page'] == 'edit-app'){
            $id = $_GET['id'];
            global $wpdb;
            $table_vip = $wpdb->prefix . 'vip';
            $sql = $wpdb->prepare("SELECT * FROM $table_vip WHERE id=%s", $id);
            $results = $wpdb->get_results($sql);
        }
        // Check user status VIP
        $exist = new Check_user_status();
        $exists = $exist->vip_check_user($id);

    ?>

    <div class="wrap">
        <div style="text-align: end;">
            <h1 class="wp-heading-inline"><?php echo esc_html(get_admin_page_title()); ?></h1>
        </div>
        <div>
            <div class="wrap" dir="rtl">
                <form action="" method="post" id="vip_form" enctype="multipart/form-data">
                    <table class="form-table edit_table_najaf" role="presentation">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <input type="hidden" id="edit_vip_id" value="<?php echo $id; ?>">
                                    <div class="row">
                                        <div class="col-md-12" style="margin-bottom: 5px;">
                                            <label>الاسم الاول: </label>
                                            <input type="text" id="vip-fourth-name-1" name="vip-fourth-name-1" class="form-control" value="<?php echo $results[0]->vip_fourth_name_1 ?>" />
                                            <small style="color: red" id="vip-fourth-name-1-error"></small>
                                        </div>
                                        <div class="col-md-12" style="margin-bottom: 5px;">
                                            <label>الاسم الثاني: </label>
                                            <input type="text" id="vip-fourth-name-2" name="vip-fourth-name-2" class="form-control" value="<?php echo $results[0]->vip_fourth_name_2 ?>" />
                                            <small style="color: red" id="vip-fourth-name-2-error"></small>
                                        </div>
                                        <div class="col-md-12" style="margin-bottom: 5px;">
                                            <label>الاسم الثالث: </label>
                                            <input type="text" id="vip-fourth-name-3" name="vip-fourth-name-3" class="form-control" value="<?php echo $results[0]->vip_fourth_name_3 ?>" />
                                            <small style="color: red" id="vip-fourth-name-3-error"></small>
                                        </div>
                                        <div class="col-md-12" style="margin-bottom: 5px;">
                                            <label>الاسم الرابع: </label>
                                            <input type="text" id="vip-fourth-name-4" name="vip-fourth-name-4" class="form-control" value="<?php echo $results[0]->vip_fourth_name_4 ?>" />
                                            <small style="color: red" id="vip-fourth-name-4-error"></small>
                                        </div>
                                        <div class="col-md-12" style="margin-bottom: 5px;">
                                            <label>اللقب: </label>
                                            <input type="text" id="vip-fourth-name-5" name="vip-fourth-name-5" class="form-control" value="<?php echo $results[0]->vip_fourth_name_5 ?>" />
                                            <small style="color: red" id="vip-fourth-name-5-error"></small>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>صورة شخصية لصاحب الهوية:</td>
                                <td><img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/vip/' . $results[0]->vip_fourth_name_img ?>" /></td>
                            </tr>
                            <tr>
                                <td><label for="">اسم الام:</label></td>
                                <td>
                                    <input type="text" id="vip-mother-name" name="vip-mother-name" class="form-control" value="<?php echo $results[0]->vip_mother_name ?>" />
                                    <small style="color: red" id="vip-mother-name-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">تاريخ الميلاد :</label></td>
                                <td><input type="text" id="vip-dob-datepicker" name="vip-user-date-of-birth" value="<?php echo date('d-m-Y', strtotime($results[0]->vip_date_of_birth)) ?>" /> <small style="color: red" id="vip-user-date-of-birth-error"></small></td>
                            </tr>
                            <tr>
                                <td><label for=""> المهنة او الوظيفة:</label></td>
                                <td><input type="text" id="vip-job-name" name="vip-job-name" class="form-control" value="<?php echo $results[0]->vip_job_name ?>" /> <small style="color: red" id="vip-job-name-error"></small></td>
                            </tr>
<!--                            <tr>-->
<!--                                <td>-->
<!--                                    <label>الكتاب او الهوية (الوجه الاول):</label>-->
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?php
//                                        if(!empty($results[0]->vip_job_name_img1)){ ?>
<!--                                            <img src="--><?php //echo get_site_url() . '/wp-content/uploads/najaf/vip/' . $results[0]->vip_job_name_img1 ?><!--" />-->
<!--                                        --><?php //}
//                                    ?>
<!--                                </td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td>-->
<!--                                    <label>الكتاب او الهوية (الوجه لثاني):</label>-->
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?php
//                                    if(!empty($results[0]->vip_job_name_img2)){ ?>
<!--                                        <img src="--><?php //echo get_site_url() . '/wp-content/uploads/najaf/vip/' . $results[0]->vip_job_name_img2 ?><!--"  />-->
<!--                                    --><?php //}
//                                    ?>
<!--                                </td>-->
<!--                            </tr>-->
                            <tr>
                                <td><label for="">عنوان السكن:</label></td>
                                <td><input type="text" name="vip-live-location" id="vip-live-location" class="form-control" value="<?php echo $results[0]->vip_live_location ?>" /> <small style="color: red" id="vip-live-location-error"></small></td>
                            </tr>
                            <tr>
                                <td><label for="">رقم الدار:</label></td>
                                <td><input type="text" name="vip-home-number" id="vip-home-number" class="form-control" value="<?php echo $results[0]->vip_home_number ?>" /> <small style="color: red" id="vip-home-number-error"></small></td>
                            </tr>
                            <tr>
                                <td><label for="">رقم البطاقة الوطنية اوالاحوال الشخصية:</label></td>
                                <td>
                                    <input type="text" id="vip-card-number" name="vip-card-number" class="form-control"  value="<?php echo $results[0]->vip_card_number ?>" />
                                    <small style="color: red" id="vip-card-number-error"></small>
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
                                    <input type="text" id="residence-card-number" name="residence-card-number" class="form-control" value="<?php echo $results[0]->residence_card_number ?>" />
                                    <small style="color: red" id="residence-card-number-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">تاريخ بطاقة السكن :</label>
                                </td>
                                <td>
                                    <input type="text" id="vip-residence-card-number-datepicker" name="residence-card-date" value="<?php echo date('d-m-Y', strtotime($results[0]->residence_card_date))  ?>" />
                                    <small style="color: red" id="residence-card-date-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label> بطاقة السكن (الوجه الاول):</label>
                                </td>
                                <td>
                                    <img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/vip/' . $results[0]->residence_card_number_img1 ?>"  />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label> بطاقة السكن (الوجه الثاني):</label>
                                </td>
                                <td>
                                    <img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/vip/' . $results[0]->residence_card_number_img2 ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">رقم الموبايل:</label></td>
                                <td><input type="text" id="vip-phone-number" name="vip-phone-number" class="form-control" value="<?php echo $results[0]->vip_phone_number ?>" /> <small style="color: red" id="vip-phone-number-error"></small></td>
                            </tr>
                            <tr>
                                <td><label for="">اسم المختار:</label></td>
                                <td><input type="text" id="vip-mokhtar-name" name="vip-mokhtar-name" class="form-control" value="<?php echo $results[0]->vip_mokhtar_name ?>" /> <small style="color: red" id="vip-mokhtar-name-error"></small></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <?php
                    if($exists == 0) { ?>
                        <div>
                            <button class="button button-primary button-large" id="submit_edit_vip">تعديل </button>
                            <a href="<?php echo get_admin_url() .'admin.php?page=validate-app&id='.$id ?>" class="button button-primary button-large" >تدقيق</a>
                        </div>
                    <?php
                    }
                ?>
            </div>
        </div>
    </div>
<?php }