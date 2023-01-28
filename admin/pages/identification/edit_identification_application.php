<?php

function edit_identification_application(){
        if(isset($_GET['page']) && $_GET['page'] == 'edit-identification'){
            $id = $_GET['id'];
            global $wpdb;
            $table_identity = $wpdb->prefix . 'identity';
            $sql = $wpdb->prepare("SELECT * FROM $table_identity WHERE id=%s", $id);
            $results = $wpdb->get_results($sql);

            // check if user validate or no
            $exist = new Check_user_status();
            $exists = $exist->identify_check_user($id);
        }
    ?>

    <div class="wrap" >
        <div style="text-align: end;">
            <h1 class="wp-heading-inline"><?php echo esc_html(get_admin_page_title()); ?></h1>
        </div>
        <div>
            <div class="wrap" dir="rtl">
                <form action="" method="post" id="sign_up" enctype="multipart/form-data">
                    <table class="form-table edit_table_najaf" role="presentation">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <input type="hidden" value="<?php echo $id; ?>" id="editIdentityID" name="editIdentityID">
                                    <div class="row">
                                        <div class="col-md-12" style="margin-bottom: 5px;">
                                            <label>الاسم الاول: </label>
                                            <input type="text" id="identification-fourth-name-1" name="identification-fourth-name-1" class="form-control" value="<?php echo $results[0]->identification_fourth_name_1 ?>" />
                                            <small style="color:red;" id="identification-fourth-name-1-error"></small>
                                        </div>
                                        <div class="col-md-12" style="margin-bottom: 5px;">
                                            <label>الاسم الثاني: </label>
                                            <input type="text" id="identification-fourth-name-2" name="identification-fourth-name-2" class="form-control" value="<?php echo $results[0]->identification_fourth_name_2 ?>" />
                                            <small style="color:red;" id="identification-fourth-name-2-error"></small>
                                        </div>
                                        <div class="col-md-12" style="margin-bottom: 5px;">
                                            <label>الاسم الثالث: </label>
                                            <input type="text" id="identification-fourth-name-3" name="identification-fourth-name-3" class="form-control" value="<?php echo $results[0]->identification_fourth_name_3 ?>" />
                                            <small style="color:red;" id="identification-fourth-name-3-error"></small>
                                        </div>
                                        <div class="col-md-12" style="margin-bottom: 5px;">
                                            <label>الاسم الرابع: </label>
                                            <input type="text" id="identification-fourth-name-4" name="identification-fourth-name-4" class="form-control" value="<?php echo $results[0]->identification_fourth_name_4 ?>" />
                                            <small style="color:red;" id="identification-fourth-name-4-error"></small>
                                        </div>
                                        <div class="col-md-12" style="margin-bottom: 5px;">
                                            <label>اللقب: </label>
                                            <input type="text" id="identification-fourth-name-5" name="identification-fourth-name-5" class="form-control" value="<?php echo $results[0]->identification_fourth_name_5 ?>" />
                                            <small style="color:red;" id="identification-fourth-name-5-error"></small>
                                        </div>
                                    </div>
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
                                    <input type="text" id="identification-mother-name" class="form-control" value="<?php echo $results[0]->	identification_mother_name ?>">
                                    <small style="color:red;" id="identification-mother-name-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">تاريخ الميلاد :</label></td>
                                <td>
                                    <input type="text" id="identification-dob-datepicker" name="identification-user-date-of-birth" value="<?php echo date('d-m-Y', strtotime($results[0]->identification_dob_datepicker)) ?>" />
                                    <small style="color:red;" id="identification-dob-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td><label for=""> المهنة او الوظيفة:</label></td>
                                <td>
                                    <input type="text" id="identification-work" class="form-control" value="<?php echo $results[0]->identification_work ?>">
                                    <small style="color:red;" id="identification-work-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">عنوان السكن:</label></td>
                                <td>
                                    <input type="text" id="identification-home-location" class="form-control" value="<?php echo $results[0]->identification_home_location ?>">
                                    <small style="color:red;" id="identification-home-location-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">رقم الدار:</label></td>
                                <td>
                                    <input type="text" id="identification-home-number" class="form-control" value="<?php echo $results[0]->identification_home_number ?>">
                                    <small style="color:red;" id="identification-home-number-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">رقم البطاقة الوطنية اوالاحوال الشخصية:</label></td>
                                <td>
                                    <input type="text" id="identification-card-number" name="" class="form-control" value="<?php echo $results[0]->identification_card_number ?>">
                                    <small style="color:red;" id="identification-card-number-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label> البطاقة الوطنية اوالاحوال الشخصية (الوجه الاول):</label>
                                </td>
                                <td>
                                    <img src="<?php echo get_site_url() . '/wp-content/uploads/najaf/identity/' . $results[0]->identifiction_card_number1_image	 ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label> البطاقة الوطنية اوالاحوال الشخصية (الوجه لثاني):</label>
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
                                    <input type="text" id="identification-living-card" name="identification-living-card" class="form-control" value="<?php echo $results[0]->identification_living_card ?>" />
                                    <small style="color: red" id="identification-living-card-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">تاريخ بطاقة السكن :</label>
                                </td>
                                <td>
                                    <input type="text" id="identification-living-card-datepicker" name="identification-living-card-date" value="<?php echo date('d-m-Y', strtotime($results[0]->identification_living_card_datepicker)) ?>" />
                                    <small style="color:red;" id="identification-living-card-date-error"></small>
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
                                    <input type="text" id="identification-phone-number" class="form-control phone_number_input" value="<?php echo $results[0]->identification_living_card ?>" autocomplete="off" style="height: 40px; padding-left: 100px;">
                                    <small style="color:red;" id="identification-phone-number-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">اسم المختار:</label></td>
                                <td><input type="text" id="identification-mokhtar-name" name="identification-mokhtar-name" class="form-control" value="<?php echo $results[0]->identification_mokhtar_name ?>" />
                                    <small style="color: red" id="identification-mokhtar-name-error"></small></td>
                            </tr>
                            <tr>
                                <td><label for="">نوع المركبة:</label></td>
                                <td>
                                    <input type="text" id="identification-car-type" class="form-control" value="<?php echo $results[0]->identification_car_type ?>">
                                    <small style="color:red;" id="identification-car-type-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">لونها</label></td>
                                <td>
                                    <input type="text" id="identification-car-color" class="form-control" value="<?php echo $results[0]->identification_car_color ?>">
                                    <small style="color:red;" id="identification-car-color-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">سنة الصنع:</label></td>
                                <td>
                                    <input type="text" id="identification-car-dob-datepicker" value="<?php echo $results[0]->identification_car_dob_datepicker ?>" />
                                    <small style="color:red;" id="identification-car-dob-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">رقم المركبة</label></td>
                                <td>
                                    <input type="text" id="identification-car-number"  class="form-control" value="<?php echo $results[0]->identification_car_number ?>">
                                    <small style="color:red;" id="identification-car-number-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">المحافظة </label></td>
                                <td>
                                    <select id="identification-car-mohafaza" >
                                        <option value="0"></option>
                                        <option value="محافظة بغداد" <?php echo ($results[0]->identification_car_mohafaza == "محافظة بغداد") ? 'selected' : ''; ?> >محافظة بغداد</option>
                                        <option value="محافظة البصرة" <?php echo ($results[0]->identification_car_mohafaza == "محافظة البصرة") ? 'selected' : ''; ?>>محافظة البصرة</option>
                                        <option value="محافظة نينوى" <?php echo ($results[0]->identification_car_mohafaza == "محافظة نينوى") ? 'selected' : ''; ?>>محافظة نينوى</option>
                                        <option value="محافظة أربيل" <?php echo ($results[0]->identification_car_mohafaza == "محافظة أربيل") ? 'selected' : ''; ?>>محافظة أربيل</option>
                                        <option value="محافظة النجف" <?php echo ($results[0]->identification_car_mohafaza == "محافظة النجف") ? 'selected' : ''; ?>>محافظة النجف</option>
                                        <option value="محافظة ذي قار" <?php echo ($results[0]->identification_car_mohafaza == "محافظة ذي قار") ? 'selected' : ''; ?>>محافظة ذي قار</option>
                                        <option value="محافظة كركوك" <?php echo ($results[0]->identification_car_mohafaza == "محافظة كركوك") ? 'selected' : ''; ?>>محافظة كركوك</option>
                                        <option value="محافظة الأنبار" <?php echo ($results[0]->identification_car_mohafaza == "محافظة الأنبار") ? 'selected' : ''; ?>>محافظة الأنبار</option>
                                        <option value="محافظة ديالى" <?php echo ($results[0]->identification_car_mohafaza == "محافظة ديالى") ? 'selected' : ''; ?>>محافظة ديالى</option>
                                        <option value="محافظة المثنى" <?php echo ($results[0]->identification_car_mohafaza == "محافظة المثنى") ? 'selected' : ''; ?>>محافظة المثنى</option>
                                        <option value="محافظة القادسية" <?php echo ($results[0]->identification_car_mohafaza == "محافظة القادسية") ? 'selected' : ''; ?>>محافظة القادسية</option>
                                        <option value="محافظة ميسان" <?php echo ($results[0]->identification_car_mohafaza == "محافظة ميسان") ? 'selected' : ''; ?>>محافظة ميسان</option>
                                        <option value="محافظة واسط" <?php echo ($results[0]->identification_car_mohafaza == "محافظة واسط") ? 'selected' : ''; ?>>محافظة واسط</option>
                                        <option value="محافظة صلاح الدين" <?php echo ($results[0]->identification_car_mohafaza == "محافظة صلاح الدين") ? 'selected' : ''; ?>>محافظة صلاح الدين</option>
                                        <option value="محافظة دهوك" <?php echo ($results[0]->identification_car_mohafaza == "محافظة دهوك") ? 'selected' : ''; ?>>محافظة دهوك</option>
                                        <option value="محافظة السليمانية" <?php echo ($results[0]->identification_car_mohafaza == "محافظة السليمانية") ? 'selected' : ''; ?>>محافظة السليمانية</option>
                                        <option value="محافظة بابل" <?php echo ($results[0]->identification_car_mohafaza == "محافظة بابل") ? 'selected' : ''; ?>>محافظة بابل</option>
                                        <option value="محافظة كربلاء" <?php echo ($results[0]->identification_car_mohafaza == "محافظة كربلاء") ? 'selected' : ''; ?>>محافظة كربلاء</option>
                                    </select>
                                    <small style="color:red;" id="identification-car-mohafaza-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">رقم السنوية:</label></td>
                                <td>
                                    <input type="text" id="identification-car-yearly" class="form-control" value="<?php echo $results[0]->identification_car_yearly ?>">
                                    <small style="color:red;" id="identification-car-yearly-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">تاريخ نفاذ السنوية:</label></td>
                                <td>
                                    <input type="text" id="identification-car-yearly-expiry-datepicker" name="identification-car-yearly-expiry"  value="<?php echo date('d-m-Y', strtotime($results[0]->identification_car_yearly_expiry_datepicker)) ?>"/>
                                    <small style="color:red;" id="identification-car-yearly-expiry-error"></small>
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
                                    <input type="text" id="identification-driving-licence" class="form-control" value="<?php echo $results[0]->identification_driving_licence ?>">
                                    <small style="color:red;" id="identification-driving-licence-error"></small>
                                </td>
                            </tr>
                            <tr>
                                <td> <label for="">تاريخ نفاذ الإجازة:</label></td>
                                <td>
                                    <input type="text" id="identification-driving-licence-expiry-datepicker" class="form-control" value="<?php echo date('d-m-Y', strtotime($results[0]->identification_driving_licence_expiry_datepicker)) ?>">
                                    <small style="color:red;" id="identification-driving-licence-expiry-datepicker-error"></small>
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
                        if($exists == 0) { ?>
                            <div>
                                <button class="button button-primary button-large" id="submit_edit_identification">تعديل </button>
                                <a href="<?php echo get_admin_url() .'admin.php?page=validate-app-identity&id='.$id ?>" class="button button-primary button-large" >تدقيق</a>
                            </div>
                            <?php
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
<?php }